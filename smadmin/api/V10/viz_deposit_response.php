<?php
// echo "This is VIZPAY Response page created by DK";
$results= json_decode(file_get_contents('php://input'), true);
if(!empty($results)){
    // echo "<pre>"; print_r($results); die;
    // $jsonString = '{
    //     "type": "DEPOSIT",
    //     "status": "SUCCESS",
    //     "status_code": "DEPOSIT_AUTO",
    //     "agent_confirm": "WAIT",
    //     "stm_ref_id": "d6c623ab-d62e812c-5597a81f-7bca944a",
    //     "stm_date": "YYYY-MM-DD hh:mm:ss",
    //     "stm_amount": "100.50",
    //     "stm_bank_name": "SCB",
    //     "stm_account_no": "1234567890",
    //     "stm_remark": "TR fr 004-1234567890 โอนเงินเข้าพร้อมเพย์",
    //     "txn_ref_id": "ca3c3757-ffa8-49db-89df-e314cc5ecf60",
    //     "txn_order_id": "xxxxxxxx",
    //     "txn_user_id": "xxxxxxxx",  
    //     "deposit_balance": "100.00",
    //     "withdraw_balance": "0.00",
    //     "remark": "",
    //     "signature": "d95ba17d99c862a44ebb6f1c3039e6b4"
    //  }';
        $payin_aar=json_encode($results);
        $transactionId=$results['txn_ref_id'];
        $payin_request_id=$results['txn_order_id'];
        date_default_timezone_set('Asia/Phnom_Penh');
        $pt_timestamp=date("Y-m-d h:i:sA");
        $orderstatus=$results['status'];
       
    
    // Code for update Transaction status START
    include("../../connection.php");
    $query1 = "UPDATE `m_payin` SET `orderid`='$transactionId', `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payin_aar`='$payin_aar' WHERE payin_request_id='$payin_request_id' ";
    mysqli_query($link,$query1);
    // Code for update Transaction status END

     // Send To callback URL Code START
    $query2 = "SELECT price,customer_email,payin_request_id,payin_notify_url,payin_success_url,payin_error_url,orderid,orderremarks,orderstatus FROM `m_payin` WHERE payin_request_id='$payin_request_id' ";
    $qrv=mysqli_query($link,$query2);
    $row=mysqli_fetch_assoc($qrv);
    if(!empty($row)){
        // echo "<pre>"; print_r($row); die;
        if($row['orderstatus']=='Success' || $row['orderstatus']=='Approved' ){
            $redirecturl=$row['payin_success_url'];
        }elseif($row['orderstatus']=='Failed' || $row['orderstatus']=='Rejected'  || $row['orderstatus']=='Cancelled'){
            $redirecturl=$row['payin_notify_url'];
        }elseif($row['orderstatus']=='Pending'){
            $redirecturl=$row['payin_error_url'];
        }else{
            $redirecturl=$row['payin_success_url'];
        }
       
        if(!empty($redirecturl)){
            $callbackURL=$redirecturl.'?pt_transactionId='.base64_encode($row['orderid']).'&dkstatus='.$results['Status'].'&pt_email='.base64_encode($row['customer_email']).'&pt_reference='.base64_encode($row['payin_request_id']).'&pt_amount='.base64_encode($row['price']).'&pt_timestamp='.base64_encode($row['orderremarks']).'&pt_status='.base64_encode($row['orderstatus']);
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

