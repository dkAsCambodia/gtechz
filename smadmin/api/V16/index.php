<?php
  if(!empty($_POST)){ 
   // echo "dk "; print_r($_POST); die; //Xprizo card payment
    $client_ip =$_POST['client_ip'];
    $payin_request_id= $_POST['payin_request_id']; // Should be unique from Merchant Reference
    $payin_api_token	=$_POST['payin_api_token']; // For Gtechz Official
	$vstore_id	=$_POST['vstore_id']; // For Gtechz Official
	$action=$_POST['action'];
	$source=$_POST['source'];
    $source_url=$_POST['source_url'];
	$source_type =$_POST['source_type'];
    $Currency=$_POST['curr'];
    $Amount=$_POST['price'];
	$customer_name=$_POST['customer_name']; // Customer Name
	$customer_email=$_POST['customer_email'];
	$customer_phone=$_POST['customer_phone']; // Customer 78760
    $card_number =$_POST['card_number'];
    $expiration =$_POST['expiration'];
    list($expiryMonth, $expiryYear) = explode('/', $expiration);
    $cvv =$_POST['cvv'];

	$payin_notify_url=$_POST['payin_notify_url'];
	$payin_success_url=$_POST['payin_success_url']; // Success CallBack URL
	$payin_error_url=$_POST['payin_error_url'];

        if(!empty($_POST)){
            // echo "<pre>"; print_r($_POST); die;
            date_default_timezone_set('Asia/Phnom_Penh');
            $created_date=date("Y-m-d H:i:s");
            $TransactionDateTime=date("Y-m-d h:i:sA");
            include("../../connection.php");
            try {
                $query2 = "INSERT INTO `m_payin`( `client_ip`, `payin_api_token`, `vstore_id`, `action`, `source`, `source_url`, `source_type`, `price`, `curr`, 
            `customer_name`, `customer_email`, 
            `customer_phone`, `payin_request_id`, `payin_notify_url`, `payin_success_url`, `payin_error_url`, `orderstatus`, `created_date`)
            VALUES ( '$client_ip', '$payin_api_token', '$vstore_id', '$action', '$source', '$source_url', '$source_type', '$Amount', '$Currency',
            '$customer_name', '$customer_email', '$customer_phone', '$payin_request_id', '$payin_notify_url', '$payin_success_url', '$payin_error_url', 'pending', '$created_date')";
                $result = mysqli_query($link, $query2);
                if (!empty($result)) {
                    // echo "Data inserted successfully!";

                    $redirect_url="https://gtechz.implogix.com/api/V16/deposit_response.php";

                    $postFields='{
                    "description": "success",
                    "reference": "'. $payin_request_id .'",
                    "amount": "'. $Amount .'",
                    "currencyCode": "'. $Currency .'",
                    "accountId": 1665,
                    "transferAccountId": 1665,
                    "customer": "'. $customer_email .'",
                    "creditCard": {
                        "name": "'. $customer_name .'",
                        "number": "'. $card_number .'",
                        "expiryMonth": "'. $expiryMonth .'",
                        "expiryYear": "'. $expiryYear .'",
                        "cvv": "'. $cvv .'"
                    },
                    "productCode": "",
                    "redirect": "'. $redirect_url .'",
                    "sourceType": ""
                    }';
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://test.xprizo.com/api/Transaction/CardDeposit?useApprovalProcess=false',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => $postFields,
                        CURLOPT_HTTPHEADER => array(
                            'x-api-version: 1.0',
                            'x-api-key: 844-66c4d6df-373f-4ed7-8846-0ed08cf44ee6',
                            'Accept: text/plain',
                            'Content-Type: application/json'
                        ),
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $result= json_decode($response, true);
                    echo "<pre>"; print_r($result);
                    if($result['status']== 'Active'){
                        echo "success";
                    }elseif($result['status']== 'Pending'){
                        echo "Pending";
                    }elseif($result['status']== 'Redirect'){
                      
                            ?>
                                <script>
                                    window.location.href = '<?php echo $result['value']; ?>';
                                </script>
                                <?php
                    }else{
                        echo "Failed";
                    }
                    
                 } else {
                    throw new Exception("Query execution failed: " . mysqli_error($link));  die;
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage(); die;
            }
        }

    }else{
    echo "No Data Available or Invalid Request";
} ?>
     