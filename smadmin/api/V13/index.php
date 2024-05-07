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
	$curr = $_POST['curr'];
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
		$created_date=date("Y-m-d H:i:s");
		include("../../connection.php");
		try {
			$query2 = "INSERT INTO `m_payout`( `client_ip`, `payout_api_token`, `vstore_id`, `action`, `source`, `source_url`, `source_type`, `price`, `curr`, `product_name`, `remarks`, 
            `narration`,`customer_name`, `customer_email`, `customer_addressline_1`, `customer_addressline_2`, `customer_city`, `customer_state`, `customer_country`, `customer_zip`,
             `customer_phone`, `customer_bank_name`, `customer_bank_code`, `customer_account_number`, `payout_request_id`, `payout_membercode`, `payout_notify_url`, `payout_success_url`, `payout_error_url`, `orderstatus`, `created_date`)
             VALUES ( '$client_ip', '$payout_api_token', '$vstore_id', '$action', '$source', '$source_url', '$source_type', '$Amount', '$curr', '$product_name', '$remarks', '$narration',
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

       // Akurateco Refund API Code START
            $payment_id=$customer_account_number;
            $password='85236c06163862a6ac796f3747064984';
            $signature = sha1(md5(strtoupper($payment_id.$Amount.$password)));
            $post='{  
                                "merchant_key":"d6943bec-c1e2-11ee-adec-b21a174a55fc",
                                "payment_id": "'. $payment_id .'",
                                "amount": "'. $Amount .'",
                                "hash":"'. $signature .'"
                                }';
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://pay.zaffrantech.com/api/v1/payment/refund',
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

            if(!empty($response->payment_id)){
                include("../../connection.php");
                if($response->result=='accepted'){
                    $orderremarks=$response->result;
                    $orderstatus=$response->result;
                }else{
                    $orderremarks='Declined';
                    $orderstatus='Declined';
                }
            
                $query1 = "UPDATE `m_payout` SET `orderid`='$response->payment_id', `orderremarks`='$orderremarks', `orderstatus`='$orderstatus', `status`='1', `payout_aar`='$res' WHERE payout_request_id='$payout_request_id' ";
                mysqli_query($link,$query1);
                echo "<pre>"; print_r($response);die;
            }
            
  // Akurateco Refund API Code END

}else{
        echo "No Data Available or Invalid Request";
} ?>
   
