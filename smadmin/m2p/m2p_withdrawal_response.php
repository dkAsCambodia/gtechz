<?php
$results=$_POST;
// echo "<pre>"; print_r($results); die;
$fields=json_encode($results);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://m2p.match-trade.com/api/v2/withdraw/crypto_agent',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$fields,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$res = curl_exec($curl);
if (curl_errno($curl)) {
  echo 'Error: ' . curl_error($curl); die;
}
$response=json_decode($res);
echo "<pre>"; print_r($response);
curl_close($curl);
?>
