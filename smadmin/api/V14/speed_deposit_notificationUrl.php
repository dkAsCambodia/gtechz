<?php
$input = file_get_contents('php://input');
$results = json_decode($input, true);
if(!empty($results)){
    // Decode JSON data
    $payin_all=json_encode($results, true);
    $payin_request_id=$results['RefID'];
    date_default_timezone_set('Asia/Phnom_Penh');
    $pt_timestamp=date("Y-m-d h:i:sA");
    $orderstatus=$results['Status'];
       
    
    // Code for update Transaction status START
    include("../../connection.php");
    $query1 = "UPDATE `m_payin` SET `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payin_all`='$payin_all' WHERE payin_request_id='$payin_request_id' ";
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

