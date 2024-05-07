<?php
  if(!empty($_POST)){ 
      $client_ip =$_POST['client_ip'];
      $payin_request_id= $_POST['payin_request_id']; // Should be unique from Merchant Reference
      $Customer = $_POST['customer_name'];
      $Currency=$_POST['curr'];
      $customer_bank_name=$_POST['customer_bank_name'];
      $Amount=$_POST['price'];
      $payin_api_token	=$_POST['payin_api_token']; // For Gtechz Official
      $vstore_id	=$_POST['vstore_id']; // For Gtechz Official
      $action=$_POST['action'];
      $source=$_POST['source'];
      $source_url=$_POST['source_url'];
      $source_type =$_POST['source_type'];
      $curr = $_POST['curr'];
      $product_name= $_POST['product_name'];// Any Thing
      $remarks= $_POST['remarks'];
      $customer_name=$_POST['customer_name']; // Customer Name
      $customer_email=$_POST['customer_email'];
      $customer_addressline_1=$_POST['customer_addressline_1']; // Customer Address Line 1
      $customer_addressline_2=$_POST['customer_addressline_2']; // Customer Address Line 2
      $customer_city=$_POST['customer_city']; // Customer City
      $customer_state=$_POST['customer_state']; // Customer State
      $customer_country=$_POST['customer_country']; // Customer Country
      $customer_zip=$_POST['customer_zip']; // Customer Zipcode
      $customer_phone=$_POST['customer_phone']; // Customer 78760
      $customer_bank_code=$_POST['customer_bank_code'];
      $payin_notify_url=$_POST['payin_notify_url'];
      $payin_success_url=$_POST['payin_success_url']; // Success CallBack URL
      $payin_error_url=$_POST['payin_error_url'];

        if(!empty($_POST)){
            //echo "<pre>"; print_r($_POST); die;
            date_default_timezone_set('Asia/Phnom_Penh');
            $created_date=date("Y-m-d H:i:s");
            include("../../connection.php");
            try {
                $query2 = "INSERT INTO `m_payin`( `client_ip`, `payin_api_token`, `vstore_id`, `action`, `source`, `source_url`, `source_type`, `price`, `curr`, `product_name`, `remarks`, 
            `customer_name`, `customer_email`, `customer_addressline_1`, `customer_addressline_2`, `customer_city`, `customer_state`, `customer_country`, `customer_zip`,
            `customer_phone`, `customer_bank_name`, `customer_bank_code`, `payin_request_id`, `payin_notify_url`, `payin_success_url`, `payin_error_url`, `orderstatus`, `orderremarks`, `created_date`)
            VALUES ( '$client_ip', '$payin_api_token', '$vstore_id', '$action', '$source', '$source_url', '$source_type', '$Amount', '$curr', '$product_name', '$remarks',
            '$customer_name', '$customer_email', '$customer_addressline_1', '$customer_addressline_2', '$customer_city', '$customer_state', '$customer_country', '$customer_zip',
            '$customer_phone', '$customer_bank_name', '$customer_bank_code', '$payin_request_id', '$payin_notify_url', '$payin_success_url', '$payin_error_url', 'pending', '$created_date', '$created_date')";
                $result = mysqli_query($link, $query2);
                if (!empty($result)) {
                    // echo "Data inserted successfully!";
                } else {
                    throw new Exception("Query execution failed: " . mysqli_error($link));  die;
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage(); die;
            }
        }
   // Akurateco Deposit API START
   $description='Important gift';
   $password='85236c06163862a6ac796f3747064984';
   $signature = sha1(md5(strtoupper($payin_request_id .$Amount .$Currency .$description .$password)));
     $post='{  
      "merchant_key":"d6943bec-c1e2-11ee-adec-b21a174a55fc",      
      "operation":"purchase",
      "methods":[
          "card"
      ],
      "order":{
         "number": "'. $payin_request_id .'",
         "amount": "'. $Amount .'",
         "currency": "'. $Currency .'",
         "description": "'. $description .'"
      },
      "cancel_url":"https://gtechz.implogix.com/api/V12/akuratecoResponse2.php?payin_request_id='. base64_encode($payin_request_id) .'",
      "success_url":"https://gtechz.implogix.com/api/V12/akuratecoResponse1.php?payin_request_id='. base64_encode($payin_request_id) .'",
      "customer":{
         "name": "'. $customer_name .'",
         "email": "'. $customer_email .'"
      },
      "billing_address":{
         "country": "'. $customer_country .'",
         "state": "'. $customer_state .'",
         "city": "'. $customer_city .'",
         "address": "'. $customer_addressline_1 .'",
         "zip": "'. $customer_zip .'",
         "phone": "'. $customer_phone .'"
        },
      "recurring_init": "true",
      "hash": "'. $signature .'"
   }
   ';
   // die;
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
   // echo "<pre>"; print_r($response);
   ?>
   <script>
       window.location.href = '<?php echo $response->redirect_url; ?>';
   </script>
   <!-- // Akurateco Deposit API END -->
<?php }else{
    echo "No Data Available or Invalid Request";
} ?>
     