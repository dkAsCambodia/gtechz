<?php
$results=$_POST;
echo "<pre>"; 
// $signature=$results['signature'];
$number=$results['number'];
$amount=$results['amount'];
$currency=$results['currency'];
$description=$results['description'];

$password='85236c06163862a6ac796f3747064984';
$signature = sha1(md5(strtoupper($results['number'] .$results['amount'] .$results['currency'] .$results['description'] .$password)));
echo $post='{  
   "merchant_key":"d6943bec-c1e2-11ee-adec-b21a174a55fc",
   "operation":"purchase",
   "methods":[
       "card"
   ],
   "order":{
      "number": "'. $number .'",
      "amount": "'. $amount .'",
      "currency": "'. $currency .'",
      "description": "'. $description .'"
   },
   "cancel_url":"https://gtechz.implogix.com/akurateco/dummy.php",
   "success_url":"https://gtechz.implogix.com/akurateco/DepositResponse.php",
   "customer":{
      "name":"John Doe",
      "email":"test@email.com"
   },
   "billing_address":{
      "country":"US",
      "state": "CA",
      "city":"Los Angeles",
      "address":"Moor Building 35274",
      "zip":"123456",
      "phone":"347771112233"
     },
   "recurring_init": "true",
   "hash": "'. $signature .'"
}
';

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://pay.zaffrantech.com/api/v1/session',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));
$res = curl_exec($curl);
curl_close($curl);

$response=json_decode($res);
echo "<pre>"; print_r($response);
?>
<script>
    window.location.href = '<?php echo $response->redirect_url; ?>';
</script>
