<?php
  if(!empty($_POST)){ 
   // echo "dk "; print_r($_POST); die; //Xprizo card payment
    $client_ip =$_POST['client_ip'];
    $payout_request_id= $_POST['payout_request_id']; // Should be unique from Merchant Reference
    $payout_api_token	=$_POST['payout_api_token']; // For Gtechz Official
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
    $payout_notify_url=$_POST['payout_notify_url'];
	$payout_success_url=$_POST['payout_success_url']; // Success CallBack URL
	$payout_error_url=$_POST['payout_error_url'];

        if(!empty($_POST)){
            // echo "<pre>"; print_r($_POST); die;
            date_default_timezone_set('Asia/Phnom_Penh');
            $created_date=date("Y-m-d H:i:s");
            include("../../connection.php");
            try {
                $query2 = "INSERT INTO `m_payout`( `client_ip`, `payout_api_token`, `vstore_id`, `action`, `source`, `source_url`, `source_type`, `price`, `curr`,
            `customer_name`, `customer_email`,
             `customer_phone`, `customer_bank_name`, `customer_bank_code`, `customer_account_number`, `payout_request_id`,  `payout_notify_url`, `payout_success_url`, `payout_error_url`, `orderstatus`, `created_date`)
             VALUES ( '$client_ip', '$payout_api_token', '$vstore_id', '$action', '$source', '$source_url', '$source_type', '$Amount', '$Currency',
              '$customer_name', '$customer_email', 
               '$customer_phone', '$expiration', '$cvv', '$card_number', '$payout_request_id', '$payout_notify_url', '$payout_success_url', '$payout_error_url', 'Failed', '$created_date')";
                $result = mysqli_query($link, $query2);
                if (!empty($result)) {
                    // echo "Data inserted successfully!";

                    $redirect_url="https://gtechz.implogix.com/api/V17/payoutResponse.php";
                     $postFields='{
                    "description": "pass",
                    "reference": "'. $payout_request_id .'",
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
                        CURLOPT_URL => 'https://test.xprizo.com/api/Transaction/CardWidthdrawal',
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
                    $result2= json_decode($response, true);
                    echo "<pre>"; print_r($result2);
                    
                    if(!empty($result2)){
                        // Code for update Transaction status START
                        if($result2['status']== 'Active'){
                            $orderstatus='Processing';
                            $redirecturl=$payout_success_url;
                        }elseif($result2['status']== 'Pending'){
                            $orderstatus='Pending';
                            $redirecturl=$payout_error_url;
                        }else{
                            $orderstatus=$result2['status'];
                            $redirecturl=$payout_error_url;
                        }
                        @$orderremarks=$created_date.' '.$result2['value'].' '.$result2['description'];
                        if(!empty($orderremarks)){
                            $status='1';
                        }else{
                            $status='0';
                        }
                        $query = "UPDATE `m_payout` SET `orderremarks`='$orderremarks', `orderstatus`='$orderstatus', `status`='$status', `payout_aar`='$response' WHERE payout_request_id='$payout_request_id' ";
                        $res=mysqli_query($link,$query);
                        // Code for update Transaction status END
                        $callbackURL=$redirecturl.'?pt_transactionId='.base64_encode($payout_request_id).'&pt_email='.base64_encode($customer_email).'&pt_reference='.base64_encode($payout_request_id).'&pt_amount='.base64_encode($Amount).'&pt_timestamp='.base64_encode($orderremarks).'&pt_status='.base64_encode($orderstatus);
                        // header("Location:$callbackURL"); 
                        ?>
                        <script>
                            window.location.href = '<?php echo $callbackURL; ?>';
                        </script>
                        <?php
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
     