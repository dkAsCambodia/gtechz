<?php
// echo "This is M2p deposit Response page created by DK";
$results= json_decode(file_get_contents('php://input'), true);
if(!empty($results)){
    
    // $results = '{
    //     "depositAddress":"C9wic7ex7etARjPGQPKBHGLr2cRcCD17aZ",
    //     "cryptoTransactionInfo":
    //       [
    //         {
    //         "txid":"b20feab400c3cd61a9d0daec8526d739a2335fe1900415f24835001e58a837a7",
    //         "confirmations":2,
    //         "amount":0.10000000,
    //         "confirmedTime":"Mar 20, 2019 7:06:38PM",
    //         "status":"DONE",
    //         "processingFee":0.00500000,
    //         "conversionRate":3198.64800
    //         }
    //       ],
    //     "paymentId":"99ca8c34-5191-41d9-a1a2-666b9badf1ce",
    //     "status":"DONE",
    //     "transactionAmount":0.10000000,
    //     "netAmount":0.09500000,
    //     "transactionCurrency":"BTC",
    //     "processingFee":0.00500000,
    //     "finalAmount":303.87,
    //     "finalCurrency":"USD",
    //     "conversionRate":3198.65
    //     }';
    //     $results=json_decode($results, true);
        // echo "<pre>"; print_r($results); die;

    // Decode JSON data
    $payin_aar=json_encode($results, true);
    $transactionId=$results['paymentId'];
    $payin_request_id=$results['paymentId'];
    date_default_timezone_set('Asia/Phnom_Penh');
    $pt_timestamp=date("Y-m-d h:i:sA");
    $orderstatus=$results['status'];
       
    
    // Code for update Transaction status START
    include("../../connection.php");
    $query1 = "UPDATE `m_payin` SET `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payin_aar`='$payin_aar' WHERE orderid='$payin_request_id' ";
    mysqli_query($link,$query1);
    // Code for update Transaction status END

     // Send To callback URL Code START
    $query2 = "SELECT price,customer_email,payin_request_id,payin_notify_url,payin_success_url,payin_error_url,orderid,orderremarks,orderstatus FROM `m_payin` WHERE orderid='$payin_request_id' ";
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

