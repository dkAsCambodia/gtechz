<?php
  if(!empty($_POST)){ 
    // echo "dk "; print_r($_POST); die; M2p
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
            `customer_phone`, `customer_bank_name`, `customer_bank_code`, `payin_request_id`, `payin_notify_url`, `payin_success_url`, `payin_error_url`, `orderstatus`, `created_date`)
            VALUES ( '$client_ip', '$payin_api_token', '$vstore_id', '$action', '$source', '$source_url', '$source_type', '$Amount', '$curr', '$product_name', '$remarks',
            '$customer_name', '$customer_email', '$customer_addressline_1', '$customer_addressline_2', '$customer_city', '$customer_state', '$customer_country', '$customer_zip',
            '$customer_phone', '$customer_bank_name', '$customer_bank_code', '$payin_request_id', '$payin_notify_url', '$payin_success_url', '$payin_error_url', 'pending', '$created_date')";
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
    
  ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
     <script>
        function generatecontrol(pform)
            {
                // {amount}{apiToken}{callbackUrl}{currency}{paymentCurrency}{paymentGatewayName}{timestamp}{tradingAccountLogin}{apiSecret}
                var s  =pform.amount.value+
                        pform.apiToken.value+
                        pform.callbackUrl.value+
                        pform.currency.value+
                        pform.paymentCurrency.value+
                        pform.paymentGatewayName.value+
                        pform.timestamp.value;   
                var secretKey='mI7SosPOnQBJ8L8eBrPvCSP7fqD1X5T9GNKZ';
                var finalString=s+secretKey;
                // alert(finalString);
                // Calculate the SHA-384 hash
                var hash = CryptoJS.SHA384(finalString);
                // Get the hexadecimal representation of the hash
                var hexHash = hash.toString(CryptoJS.enc.Hex);
                pform.signature.value = hexHash;
                pform.submit();
            }
        </script>
        <form  method="post" action="https://gtechz.implogix.com/api/V4/m2p_deposit_response.php">
            <!-- payin_request_id -->
                 <input  name="payin_request_id" type="hidden" placeholder="1" value="<?php echo $payin_request_id; ?>">
            <!-- Amount -->
                  <input id="amount" name="amount" type="hidden" placeholder="1" value="<?php echo $Amount; ?>">
              <!-- ApiToken -->
                  <input name="apiToken" id="apiToken" type="hidden" value="xoC0b9Mak2r2P4ZBECG23B5qMsbqVLXmor8g">
			        <!-- CallbackUrl -->
                  <input  name="callbackUrl" id="callbackUrl" type="hidden" value="https://gtechz.implogix.com/api/V4/final_response.php">
              <!-- Currency -->
                  <input id="currency" name="currency" type="hidden" placeholder="USD|CNY" value="<?php echo $Currency; ?>">
              <!-- PaymentCurrency -->
                  <input name="paymentCurrency" id="paymentCurrency" type="hidden" value="USX">              
              <!-- PaymentGatewayName -->
                  <input name="paymentGatewayName" id="paymentGatewayName" type="hidden" value="USDT TRC20">
              <!-- Signature -->
                  <input name="signature" id="signature" type="hidden" value="" readonly>
              <!-- Timestamp -->
                  <input name="timestamp" id="timestamp" type="hidden" value="<?php echo time(); ?>">
              <!-- TradingAccountLogin <input name="tradingAccountLogin" id="tradingAccountLogin" type="hidden" value="tradingAccountLogin"> -->
                <button id="cartCheckout" class="btn btn-primary" OnClick="generatecontrol(this.form);" style="display:none;">Submit</button>
        </form>
        <script type="text/javascript">
           jQuery(function(){
                jQuery('#cartCheckout').click();
            });  
        </script>
<?php }else{
    echo "No Data Available or Invalid Request";
} ?>
     