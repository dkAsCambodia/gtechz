<?php
if (function_exists('curl_init')) {
  echo 'cURL is enabled on this server.';
} else {
  echo 'cURL is not enabled on this server.';
}
$curl_version = curl_version();
echo '<pre>';
print_r($curl_version);
echo '</pre>';

echo phpinfo();
echo "dddddd";
// Show just the module information.
// phpinfo(8) yields identical results.
echo phpinfo(INFO_MODULES); die;
//Your authentication key
// $authKey = "309858ARyj9Zpx5e01e33bP1";



//$numbers = array($username);
// $numbers = "7907272830";
// $otp=rand(1111,9999);
                   
//                  	$template_id=rawurlencode('5f185f66d6fc0571795e8e0f');
//                     //$numbers = implode(',', $numbers);
// 					$otp_length=4;
                 
//                     // Prepare data for POST request
                   

// $curl = curl_init();

// curl_setopt_array($curl, array(
  //CURLOPT_URL => "https://api.msg91.com/api/v5/otp?unicode=&authkey=309858ARyj9Zpx5e01e33bP1&template_id=5f185f66d6fc0571795e8e0f&extra_param=%7B%22Param1%22%3A%22Value1%22%2C%20%22Param2%22%3A%22Value2%22%2C%20%22Param3%22%3A%20%22Value3%22%7D&mobile=917907272830&invisible=1&otp=&otp_length=4&otp_expiry=",
	//working otp
// 	CURLOPT_URL => "https://api.msg91.com/api/v5/otp?unicode=&authkey=$authKey&template_id=$template_id&extra_param=%7B%22Param1%22%3A%22Value1%22%2C%20%22Param2%22%3A%22Value2%22%2C%20%22Param3%22%3A%20%22Value3%22%7D&mobile=$numbers&invisible=1&otp=$otp&otp_length=$otp_length&otp_expiry=",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_SSL_VERIFYHOST => 0,
//   CURLOPT_SSL_VERIFYPEER => 0,
//   CURLOPT_HTTPHEADER => array(
//     "content-type: application/json"
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

/*if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}*/
?>

