<?php
echo "This is powerpay payout Response page created by DK";
$xml_data = file_get_contents("php://input");
if(!empty($xml_data)){

    $xml = json_encode($xml_data, true);
    // $xml = 'MerchantCode=G0313&TransactionID=GZTRN1702114174c6n&CurrencyCode=THB&Amount=180.00&TransactionDatetime=12/9/2023 9:30:56 AM&Key=C897325C5D19784AF366D6F1820A041C&Status=000&MemberCode=GZ-1081702114253fo1&ID=6812511&PayoutFee=20.00&Message=';
   
    // Parse the XML string
   parse_str($xml, $results);
//    echo "<pre>"; print_r($results['Status']);
        $payout_aar=json_encode($results, true);
        $transactionId=$results['ID'];
        $payout_request_id=$results['TransactionID'];
        date_default_timezone_set('Asia/Phnom_Penh');
        $pt_timestamp=date("Y-m-d h:i:sA");
        $orderstatus=$results['Status'];
        if($orderstatus=='000'){
            $orderstatus='Success';
        }else{
            $orderstatus='Failed';
        }
       
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