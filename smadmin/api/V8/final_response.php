<?php
echo "This is M2p withdrawal Response page created by DK";
$results= json_decode(file_get_contents('php://input'), true);
if(!empty($results)){
    
    // $results = '{
    //     "address":"0640043054",
    //     "tempTransactionId":"",
    //     "cryptoTransactionInfo":[],
    //     "paymentId":"c6242ee0-9eea-11ee-a5be-bbd3984d8e9d",
    //     "status":"DECLINED",
    //     "transactionAmount":0.685753,
    //     "netAmount":0.678895,
    //     "transactionCurrency":"USX",
    //     "processingFee":0.006858,
    //     "finalAmount":5,
    //     "finalCurrency":"CNY",
    //     "conversionRate":7.29125
    // }';
    // $results=json_decode($results, true);
    // echo "<pre>"; print_r($results['status']); die;

    // Decode JSON data
    $payout_aar=json_encode($results, true);
    $transactionId=$results['paymentId'];
    $payout_request_id=$results['paymentId'];
    date_default_timezone_set('Asia/Phnom_Penh');
    $pt_timestamp=date("Y-m-d h:i:sA");
    $orderstatus=$results['status'];
       
    // Code for update Transaction status START
    include("../../connection.php");
    $query1 = "UPDATE `m_payout` SET `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payout_aar`='$payout_aar' WHERE orderid='$payout_request_id' ";
    mysqli_query($link,$query1);
    // Code for update Transaction status END

     // Send To callback URL Code START
    $query2 = "SELECT price,customer_email,payout_request_id,payout_notify_url,payout_success_url,payout_error_url,orderid,orderremarks,orderstatus FROM `m_payout` WHERE orderid='$payout_request_id' ";
    $qrv=mysqli_query($link,$query2);
    $row=mysqli_fetch_assoc($qrv);
    if(!empty($row)){
        // echo "<pre>"; print_r($row); die;
        if($row['orderstatus']=='DONE' ){
            $redirecturl=$row['payout_success_url'];
        }elseif($row['orderstatus']=='DECLINED'){
            $redirecturl=$row['payout_notify_url'];
        }elseif($row['orderstatus']=='PENDING' || $row['orderstatus']=='ADMIN CONFIRMATION' || $row['orderstatus']=='NEW'){
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