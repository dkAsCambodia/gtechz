<?php
// echo "This is speed pay Response created by DK";
$payin_request_id=$_GET['RefId'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://agent.99speedpay.com/api/services/CheckDeposit',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => "RefID=$payin_request_id",
  CURLOPT_HTTPHEADER => array(
    'API-AGENT-CODE: PGA001',
    'API-KEY: o11SZxncRMu37KtJ1N4L1ApGcAZCSjiA',
    'API-AGENT-USER-NAME: zaffran',
    'Content-Type: application/x-www-form-urlencoded'
  ),
));
$response = curl_exec($curl);
curl_close($curl);
$result= json_decode($response, true);
// echo "<pre>";
// print_r($result);
$Transactionid = $result['info']['DepositID'];

 // Code for update Transaction status START
 if(!empty($Transactionid)){
    include("../../connection.php");
    $query1 = "UPDATE `m_payin` SET `orderid`='$Transactionid',  `orderstatus`='Processing', `status`='1', `payin_aar`='$response' WHERE payin_request_id='$payin_request_id' ";
    mysqli_query($link,$query1);

    echo "Transaction Information as follows".'<br/>'.
    "TransactionId : ".$Transactionid.'<br/>'.
    "ReferenceNo : ".$payin_request_id.'<br/>'.
    "Currency : ".$result['info']['CurrencyCode'].'<br/>'.
    "Amount : ".$result['info']['PayableAmount'].'<br/>'.
    "Datetime : ".$result['info']['UpdatedDate'].'<br/>'.
    "Status : ".$result['info']['Status'];
    die;
 }
 // Code for update Transaction status END
?>
