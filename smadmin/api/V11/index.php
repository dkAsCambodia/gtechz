
<?php
// echo "<h2 style='color:red'>Technical error, Bank system under maintenance<h2/>";
// die;
include("../../connection.php");
$currentDate = date("Y-m-d");
$query = "SELECT price FROM m_payin WHERE source_type ='source6' and orderstatus ='SUCCESS' and DATE(created_date) = '$currentDate'";
$qrv = mysqli_query($link, $query);
$payinCount= mysqli_num_rows($qrv);
if (mysqli_num_rows($qrv) > 0) {
    $totalpayinSum=0;
    while ($row = mysqli_fetch_assoc($qrv)) {
        $totalpayinSum += $row['price'];
        // echo "<pre>"; print_r($row);
    }
    // payout query
    $query3 = "SELECT price FROM m_payout WHERE source_type ='psource6' and orderstatus ='SUCCESS' and DATE(created_date) = '$currentDate'";
    $qrv3 = mysqli_query($link, $query3);
    $payoutCount= mysqli_num_rows($qrv3);
    $payoutSum=0;
    while($row3 = mysqli_fetch_assoc($qrv3)){
        $payoutSum += $row3['price'];
        // echo "<pre>"; print_r($row3);
    }

    if($payoutCount > 0) {

        if($totalpayinSum <= $payoutSum){
            echo "<h2 style='color:red'>Balance not available in Gateway Wallet Please Deposit first!</h2>"; die;
        }
        $Amount=$_POST['price'];
        $transaction_charge =$payinCount*20;
        $AvailableforPayout=$totalpayinSum-$transaction_charge;
        @$finalAmount=$AvailableforPayout-$payoutSum;
        if($finalAmount < $Amount){
            echo "<h2 style='color:red'>Balance not enough in Gateway Wallet!</h2>"; die;
        }else{
            $payout="yes";
        }

        // if($payinCount > $payoutCount){
        //     $payout="yes";
        // }else{
        //     echo "<h2 style='color:red'>Balance not available in Gateway wallet Please Deposit first!</h2>"; die;
        // }
    }else{
        // echo "payout record not found"; 
        $payout="yes";
    }

}else{
    echo "<h2 style='color:red'>Balance not available in Gateway wallet Please Deposit first!!</h2>"; die;
}
// echo $totalpayinSum;
// echo $payout;
// echo $payoutSum;
if($totalpayinSum <= $payoutSum){
    echo "<h2 style='color:red'>Balance not available in Gateway Wallet Please Deposit first!!!</h2>"; die;
}
$Amount=$_POST['price'];
$transaction_charge =$payinCount*20;
$AvailableforPayout=$totalpayinSum-$transaction_charge;
@$finalAmount=$AvailableforPayout-$payoutSum;
if($finalAmount < $Amount){
    echo "<h2 style='color:red'>Balance not enough in Gateway Wallet!!</h2>"; die;
}else{
    $payout="yes";
}
if(!empty($_POST) && $payout=='yes'){
    // echo $payout; die;
    $client_ip =$_POST['client_ip'];
    $payout_request_id= $_POST['payout_request_id']; // Should be unique from Merchant Reference
    $Currency=$_POST['curr'];
    $customer_bank_name=$_POST['customer_bank_name'];
    $Amount=$_POST['price'];
    date_default_timezone_set('Asia/Kuala_Lumpur');
	$dated=date("Y-m-d h:i:sA");
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
        	// Code for VIZPAY START
        Class Vizpay{
            private $api_key;
            private $secret_key;
            private$version;
            public $api_url;

            function __construct($config){
                $this->api_key = $config['api_key'];
                $this->secret_key = $config['secret_key'];
                $this->version = $config['version'];
                $this->api_url = $config['api_url'];
            }

            public function gen_signature($array_data){
                $array_data['key'] = $this->secret_key;
                ksort($array_data);
                $json_string = json_encode($array_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
                $signature = MD5($json_string);
                return $signature;
            }

            public function call_url($path, $method, $array_data){
                $curl = curl_init();
                $url = $this->api_url.$this->version.$path;
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => $method,
                    CURLOPT_POSTFIELDS =>json_encode($array_data),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic '.base64_encode($this->api_key.":"),
                        'Content-Type: application/json'
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                return json_decode($response, true);
            }
        }
        $config = [
            'api_key' => '86591ce6-685603e2-a5bd552d-dcb29058',
			'secret_key' => 'b3e9c45a-f64342da-20837e7b-8b54479b',
            'version' => 'v1',
            'api_url' => 'https://apipoint.first2pay.io/'
        ];
        $vizpay = new Vizpay($config);

        /* Withdraw */
        $post_data = [
            "order_id" => $payout_request_id,
            "amount" => $Amount,
            "to_bank_code" =>  $customer_bank_name,
            "to_account_no" =>  $customer_account_number,
            "to_name" =>  $customer_name,
            "callback_url" =>  "https://gtechz.implogix.com/api/V11/viz_payout_response.php"
        ];
        $post_data['signature'] = $vizpay->gen_signature($post_data);
        $resArray = $vizpay->call_url('/withdraw','POST', $post_data);
        // Code for VIZPAY END
        // echo "<pre>"; print_r($resArray['code']); die;
        if(!empty($resArray)){
            // Code for update Transaction status START
            if($resArray['code']=='200'){
                $orderstatus='Success';
                $redirecturl=$payout_success_url;
            }else{
                $orderstatus='Failed';
                $redirecturl=$payout_error_url;
            }
            @$orderremarks=$dated.' '.$resArray['message'];
            if(!empty($orderremarks)){
                $status='1';
            }else{
                $status='0';
            }
            $payout_aar=json_encode($resArray, true);
            $query = "UPDATE `m_payout` SET `orderremarks`='$orderremarks', `orderstatus`='$orderstatus', `status`='$status', `payout_aar`='$payout_aar' WHERE payout_request_id='$payout_request_id' ";
            $res=mysqli_query($link,$query);
            // Code for update Transaction status END
            $callbackURL=$redirecturl.'?pt_transactionId='.base64_encode($payout_request_id).'&dkstatus='.$resArray['code'].'&pt_email='.base64_encode($customer_email).'&pt_reference='.base64_encode($payout_request_id).'&pt_amount='.base64_encode($Amount).'&pt_timestamp='.base64_encode($orderremarks).'&pt_status='.base64_encode($orderstatus);
            // header("Location:$callbackURL"); 
            ?>
            <script>
                window.location.href = '<?php echo $callbackURL; ?>';
            </script>
            <?php
        }
}else{
        echo "No Data Available or Invalid Request";
} ?>
   
