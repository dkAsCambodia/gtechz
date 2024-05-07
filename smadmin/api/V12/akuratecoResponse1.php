<?php
// echo "This is Success Response page created by DK";
    $payin_request_id=base64_decode($_GET['payin_request_id']);
    // Code for update Transaction status START
    include("../../connection.php");
    $query1 = "UPDATE `m_payin` SET  `orderid`='$payin_request_id', `orderstatus`='Success', `status`='1' WHERE payin_request_id='$payin_request_id' ";
    mysqli_query($link,$query1);
    // Code for update Transaction status END

     // Send To callback URL Code START
    $query2 = "SELECT price,customer_email,payin_request_id,payin_notify_url,payin_success_url,payin_error_url,orderid,orderremarks,orderstatus FROM `m_payin` WHERE payin_request_id='$payin_request_id' ";
    $qrv=mysqli_query($link,$query2);
    $row=mysqli_fetch_assoc($qrv);
    if(!empty($row)){
        // echo "<pre>"; print_r($row); die;
        if($row['orderstatus']=='Success' ){
            $redirecturl=$row['payin_success_url'];
        }elseif($row['orderstatus']=='Cancelled'){
            $redirecturl=$row['payin_notify_url'];
        }elseif($row['orderstatus']=='Pending'){
            $redirecturl=$row['payin_error_url'];
        }else{
            $redirecturl=$row['payin_success_url'];
        }
       
        if(!empty($redirecturl)){
            $callbackURL=$redirecturl.'?pt_transactionId='.base64_encode($row['orderid']).'&pt_email='.base64_encode($row['customer_email']).'&pt_reference='.base64_encode($row['payin_request_id']).'&pt_amount='.base64_encode($row['price']).'&pt_timestamp='.base64_encode($row['orderremarks']).'&pt_status='.base64_encode($row['orderstatus']);
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
    

?>

