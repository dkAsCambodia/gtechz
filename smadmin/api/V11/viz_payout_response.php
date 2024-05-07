<?php
echo "This is VIZPAY Response page created by DK";
$results= json_decode(file_get_contents('php://input'), true);
if(!empty($results)){

    // $results = '{
    //     "type": "WITHDRAW",
    //     "status": "SUCCESS",
    //     "status_code": "OK",
    //     "stm_ref_id": "",
    //     "stm_date": "2023-10-27 14:00:00",
    //     "stm_amount": "1000.00",
    //     "stm_bank_name": "",
    //     "stm_bank_code": "",
    //     "stm_last_4account": "",
    //     "stm_remark": "",
    //     "txn_ref_id": "xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx",
    //     "txn_order_id": "xxxxxxxx",
    //     "txn_user_id": "",
    //     "timestamp": "2023-10-27 14:02:46",
    //     "account_no": "3482511463",
    //     "account_bank_name": "SCB",
    //     "agent_confirm": "",
    //     "stm_account_no": "",
    //     "deposit_balance": "1.00",
    //     "withdraw_balance": "1.00",
    //     "remark": "",
    //     "signature": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
    // }';

    // Decode JSON data
        $payout_aar=json_encode($results, true);
        $transactionId=$results['txn_ref_id'];
        $payout_request_id=$results['txn_order_id'];
        date_default_timezone_set('Asia/Phnom_Penh');
        $pt_timestamp=date("Y-m-d h:i:sA");
        $orderstatus=$results['status'];
       
    
    // Code for update Transaction status START
    include("../../connection.php");
    $query1 = "UPDATE `m_payout` SET `orderid`='$transactionId', `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payout_aar`='$payout_aar' WHERE payout_request_id='$payout_request_id' ";
    mysqli_query($link,$query1);
    // Code for update Transaction status END

     // Send To callback URL Code START
    $query2 = "SELECT price,customer_email,payout_request_id,payout_notify_url,payout_success_url,payout_error_url,orderid,orderremarks,orderstatus FROM `m_payout` WHERE payout_request_id='$payout_request_id' ";
    $qrv=mysqli_query($link,$query2);
    $row=mysqli_fetch_assoc($qrv);
    if(!empty($row)){
        // echo "<pre>"; print_r($row); die;
        if($row['orderstatus']=='Success' || $row['orderstatus']=='Approved' ){
            $redirecturl=$row['payout_success_url'];
        }elseif($row['orderstatus']=='Failed' || $row['orderstatus']=='Rejected'  || $row['orderstatus']=='Cancelled'){
            $redirecturl=$row['payout_notify_url'];
        }elseif($row['orderstatus']=='Pending'){
            $redirecturl=$row['payout_error_url'];
        }else{
            $redirecturl=$row['payout_success_url'];
        }
       
        if(!empty($redirecturl)){
            $callbackURL=$redirecturl.'?pt_transactionId='.base64_encode($row['orderid']).'&dkstatus='.$results['Status'].'&pt_email='.base64_encode($row['customer_email']).'&pt_reference='.base64_encode($row['payout_request_id']).'&pt_amount='.base64_encode($row['price']).'&pt_timestamp='.base64_encode($row['orderremarks']).'&pt_status='.base64_encode($row['orderstatus']);
            // header("Location:$callbackURL"); 
            ?>
            <script>
                window.location.href = '<?php echo $callbackURL; ?>';
            </script>
            <?php
        }else{
            echo "Callback URL not Found or Invalid Request!";
        }
    }else{
        echo "No Data Available or Invalid Request!";
    }
     // Send To callback URL Code END
    
}else{
    echo "No Data Available or Invalid Request!";
}
?>