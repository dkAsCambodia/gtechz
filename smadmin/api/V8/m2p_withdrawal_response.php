<?php
// echo "This is M2p Response created by DK";
$results=$_POST;
$payout_request_id=$results['payout_request_id'];
unset($results['payout_request_id']);
// echo "<pre>"; print_r($results);

$apiUrl = 'https://wallet.fe-prime.com/api/v2/withdraw/crypto_agent';
$jsonData = json_encode($results);
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'
));
$res = curl_exec($ch);
if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}
curl_close($ch);

$response=json_decode($res);
echo "<pre>"; print_r($response);
if(!empty($response->paymentId)){
    include("../../connection.php");
    if(!empty($response->errorList[0])){
        @$orderremarks=$response->errorList[0];
        $orderstatus=$response->status;
    }else{
        $orderremarks='DONE';
        $orderstatus='Success';
    }

    $query1 = "UPDATE `m_payout` SET `orderid`='$response->paymentId', `orderremarks`='$orderremarks', `orderstatus`='$orderstatus', `status`='1', `payout_aar`='$res' WHERE payout_request_id='$payout_request_id' ";
    mysqli_query($link,$query1);
}

?>
