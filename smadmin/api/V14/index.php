<?php
  if(!empty($_POST)){ 
    // echo "dk "; print_r($_POST); die; M2p
    $client_ip =$_POST['client_ip'];
    $payin_request_id= $_POST['payin_request_id']; // Should be unique from Merchant Reference
    $Customer = $_POST['customer_name'];
    $Currency=$_POST['curr'];
    $customer_bank_name=$_POST['customer_bank_name'];
    $customer_account_number =$_POST['customer_account_number']; 
    $Amount=$_POST['price'];

    $payin_api_token	=$_POST['payin_api_token']; // For Gtechz Official
	$vstore_id	=$_POST['vstore_id']; // For Gtechz Official
	$action=$_POST['action'];
	$source=$_POST['source'];
    $source_url=$_POST['source_url'];
	$source_type =$_POST['source_type'];
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
            $TransactionDateTime=date("Y-m-d h:i:sA");
            $created_date=date("Y-m-d H:i:s");
            include("../../connection.php");
            try {
                $query2 = "INSERT INTO `m_payin`( `client_ip`, `payin_api_token`, `vstore_id`, `action`, `source`, `source_url`, `source_type`, `price`, `curr`, `product_name`, `remarks`, 
            `customer_name`, `customer_email`, `customer_addressline_1`, `customer_addressline_2`, `customer_city`, `customer_state`, `customer_country`, `customer_zip`,
            `customer_phone`, `customer_bank_name`, `customer_bank_code`, `payin_request_id`, `payin_notify_url`, `payin_success_url`, `payin_error_url`, `orderstatus`, `created_date`)
            VALUES ( '$client_ip', '$payin_api_token', '$vstore_id', '$action', '$source', '$source_url', '$source_type', '$Amount', '$Currency', '$product_name', '$remarks',
            '$customer_name', '$customer_email', '$customer_addressline_1', '$customer_addressline_2', '$customer_city', '$customer_state', '$customer_country', '$customer_zip',
            '$customer_phone', '$customer_bank_name', '$customer_bank_code', '$payin_request_id', '$payin_notify_url', '$payin_success_url', '$payin_error_url', 'pending', '$created_date')";
                $result = mysqli_query($link, $query2);
                if (!empty($result)) {
                    // echo "Data inserted successfully!";
                    $postFields = http_build_query(array(
                        'ClientIp' => $client_ip,
                        'RefID' => $payin_request_id,
                        'CustomerID' => 'ZCUST1001',
                        'CurrencyCode' => $Currency,
                        'Amount' => $Amount,
                        'TransactionDateTime' => $TransactionDateTime,
                        'Remark' => 'payment by Gtech demo',
                        'CustomerFullName' => $customer_name,
                        'BankCode' => 'THAIQR',
                        'UrlFront' => 'https://gtechz.implogix.com/api/V14/speed_deposit_notificationUrl.php',
                        'CustomerAccountNumber' => $customer_account_number,
                        'CustomerAccountBankCode' => $customer_bank_name
                    ));
                    echo "<pre>"; print_r($postFields);
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://agent-demo.99speedpay.com/api/services/RequestDeposit',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => $postFields,
                        CURLOPT_HTTPHEADER => array(
                            'API-AGENT-CODE: PGA001',
                            'API-KEY: H0pX4tg2IzboclO5Q7ah6oF8L7xft23o',
                            'API-AGENT-USER-NAME: zaffran',
                            'Content-Type: application/x-www-form-urlencoded'
                        ),
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $result= json_decode($response, true);
                    echo "<pre>"; print_r($result); die; 
                    ?>
                    <script>
                        window.location.href = '<?php echo $result['RedirectionUrl'] ?>';
                    </script>
        
                    <?php
                    
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
     