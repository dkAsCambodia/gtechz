<?php
// print_r($_GET); die;
$pt_transactionId=base64_decode($_GET['pt_transactionId']);
$pt_email=base64_decode($_GET['pt_email']);
$pt_reference=base64_decode($_GET['pt_reference']);
$pt_amount=base64_decode($_GET['pt_amount']);
$pt_timestamp=base64_decode($_GET['pt_timestamp']);
$pt_status=base64_decode($_GET['pt_status']);
if(!empty($_GET)){
    echo "Transaction Information as follows".'<br/>'.
    "Temperory TransactionId : ".$pt_transactionId.'<br/>'.
    "Email : ".$pt_email.'<br/>'.
    "ReferenceNo : ".$pt_reference.'<br/>'.
    "Amount : ".$pt_amount.'<br/>'.
    "Datetime : ".$pt_timestamp.'<br/>'.
    "Status : ".$pt_status;
}
else{
    echo "No Data Available or Invalid Request";
}
?>