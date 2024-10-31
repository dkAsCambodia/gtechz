<?php
// echo "This is Xprizo Response created by DK";
$response= $_GET;
$res=json_encode($response, true);
// echo "<pre>"; print_r($response); die;
$payin_request_id=$response['reference'];
$Transactionid=$response['key'];

if($response['status']== 'Active'){
     $orderstatus='success';
}elseif($response['status']== 'Pending'){
     $orderstatus='pending';
}else{
    $orderstatus='failed';
}
date_default_timezone_set('Asia/Phnom_Penh');
$pt_timestamp=date("Y-m-d h:i:sA");

 // Code for update Transaction status START
 if(!empty($Transactionid)){
    include("../../connection.php");
    $query1 = "UPDATE `m_payin` SET `orderid`='$Transactionid',  `orderremarks`='$pt_timestamp', `orderstatus`='$orderstatus', `status`='1', `payin_aar`='$res' WHERE payin_request_id='$payin_request_id' ";
    mysqli_query($link,$query1);

    $query2 = "SELECT price, curr, orderremarks, orderstatus FROM `m_payin` WHERE payin_request_id='$payin_request_id' ";
    $qrv=mysqli_query($link,$query2);
    $row=mysqli_fetch_assoc($qrv);
    if(!empty($row)){

      echo "Transaction Information as follows".'<br/>'.
      "TransactionId : ".$Transactionid.'<br/>'.
      "ReferenceNo : ".$payin_request_id.'<br/>'.
      "Currency : ".$row['curr'].'<br/>'.
      "Amount : ".$row['price'].'<br/>'.
      "Datetime : ".$row['orderremarks'].'<br/>'.
      "Status : ".$row['orderstatus'];
      die;

    }else{
      echo "Data not Found!"; die;
    }

    
 }
 // Code for update Transaction status END
?>
