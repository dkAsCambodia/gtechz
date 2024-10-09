<?php
if(!empty($_POST)){
    $client_ip =$_POST['client_ip'];
    $payout_request_id= $_POST['payout_request_id']; // Should be unique from Merchant Reference
    $Customer = $_POST['customer_name'];
    $Currency=$_POST['curr'];
    $customer_bank_name=$_POST['customer_bank_name'];
    $Amount=$_POST['price'];
    $payout_api_token	=$_POST['payout_api_token']; // For Gtechz Official
	$vstore_id	=$_POST['vstore_id']; // For Gtechz Official
	$action=$_POST['action'];
	$source=$_POST['source'];
    $source_url=$_POST['source_url'];
	$source_type =$_POST['source_type'];
	$product_name= $_POST['product_name'];// Any Thing
	$remarks= $_POST['remarks'];
    $narration= $_POST['narration'];
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
    $customer_account_number=$_POST['customer_account_number'];
    $payout_membercode=$_POST['payout_membercode'];
	$payout_notify_url=$_POST['payout_notify_url'];
	$payout_success_url=$_POST['payout_success_url']; // Success CallBack URL
	$payout_error_url=$_POST['payout_error_url'];

		date_default_timezone_set('Asia/Phnom_Penh');
        $TransactionDateTime=date("Y‐m‐d h:i:sA");
		$created_date=date("Y-m-d H:i:s");
		include("../../connection.php");
		try {
			$query2 = "INSERT INTO `m_payout`( `client_ip`, `payout_api_token`, `vstore_id`, `action`, `source`, `source_url`, `source_type`, `price`, `curr`, `product_name`, `remarks`, 
            `narration`,`customer_name`, `customer_email`, `customer_addressline_1`, `customer_addressline_2`, `customer_city`, `customer_state`, `customer_country`, `customer_zip`,
             `customer_phone`, `customer_bank_name`, `customer_bank_code`, `customer_account_number`, `payout_request_id`, `payout_membercode`, `payout_notify_url`, `payout_success_url`, `payout_error_url`, `orderstatus`, `created_date`)
             VALUES ( '$client_ip', '$payout_api_token', '$vstore_id', '$action', '$source', '$source_url', '$source_type', '$Amount', '$Currency', '$product_name', '$remarks', '$narration',
              '$customer_name', '$customer_email', '$customer_addressline_1', '$customer_addressline_2', '$customer_city', '$customer_state', '$customer_country', '$customer_zip',
               '$customer_phone', '$customer_bank_name', '$customer_bank_code', '$customer_account_number', '$payout_request_id', '$payout_membercode', '$payout_notify_url', '$payout_success_url', '$payout_error_url', 'Failed', '$created_date')";
			$result = mysqli_query($link, $query2);
			if (!empty($result)) {
				// echo "Data inserted successfully!";
			} else {
				throw new Exception("Query execution failed: " . mysqli_error($link));  die;
			}
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage(); die;
		}

       //Code for payout API call START
        $postFields = http_build_query(array(
            'ClientIp' => $client_ip,
            'RefID' => $payout_request_id,
            'CustomerID' => 'ZCUST1001',
            'ToCurrencyCode' => $Currency,
            'ToAmount' => $Amount,
            'TransactionDateTime' => $TransactionDateTime,
            'Remark' => $remarks,
            'ToBankAccountName' => $customer_name,
            'ToBankAccountNumber' => $customer_account_number,
            'ToBankCode' => $customer_bank_name,
            'ToProvince' => '',
            'ToCity' => '',
            'ToBranch' => '',
        ));

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://agent-demo.99speedpay.com/api/services/RequestPayout',
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
            'API-KEY: o11SZxncRMu37KtJ1N4L1ApGcAZCSjiA',
            'API-AGENT-USER-NAME: zaffran',
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $result= json_decode($response, true);

        if($result['success'] == '1'){
            $RefId = $result['RefId'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://agent-demo.99speedpay.com/api/services/CheckPayout',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => "RefID=$RefId",
                CURLOPT_HTTPHEADER => array(
                'API-AGENT-CODE: PGA001',
                'API-KEY: o11SZxncRMu37KtJ1N4L1ApGcAZCSjiA',
                'API-AGENT-USER-NAME: zaffran',
                'Content-Type: application/x-www-form-urlencoded'
                ),
            ));
            $response2 = curl_exec($curl);
            curl_close($curl);
            $result2= json_decode($response2, true);
            // echo "<pre>"; print_r($result2);

            if(!empty($result2)){
                // Code for update Transaction status START
                $Transactionid = $result2['info']['PayoutID'];
                if($result2['success']=='1'){
                    $orderstatus='Processing';
                    $redirecturl=$payout_success_url;
                }else{
                    $orderstatus='Failed';
                    $redirecturl=$payout_error_url;
                }
                @$orderremarks=$result2['info']['UpdatedDate'].' '.$result2['message'];
                if(!empty($orderremarks)){
                    $status='1';
                }else{
                    $status='0';
                }
                $query = "UPDATE `m_payout` SET `orderid`='$Transactionid', `orderremarks`='$orderremarks', `orderstatus`='$orderstatus', `status`='$status', `payout_aar`='$response2' WHERE payout_request_id='$payout_request_id' ";
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


        }else{
        echo "<pre>"; print_r($result); die;
        }
       //Code for payout API call END
        
        
}else{
        echo "No Data Available or Invalid Request";
} ?>
   
