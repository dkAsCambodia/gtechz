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

    if($Currency=='CNY'){
        $merchant_account='902099';
        $merchantcontrol='1300400043CA5837DDE95474193D5F31';
    }elseif($curr=='USD'){
        $merchant_account='902093';
        $merchantcontrol='1DBB26A26CBFF08A16F6BCD456A42CF8';
    }elseif($curr=='THB'){
        $merchant_account='902097';
        $merchantcontrol='98E0C175D2D081BCDEDA2219BA55E6D0';
    }
		date_default_timezone_set('Asia/Phnom_Penh');
		$created_date=date("Y-m-d H:i:s");
		include("../../connection.php");
		try {
			$query2 = "INSERT INTO `m_payout`( `client_ip`, `payout_api_token`, `vstore_id`, `action`, `source`, `source_url`, `source_type`, `price`, `curr`, `product_name`, `remarks`, 
            `narration`,`customer_name`, `customer_email`, `customer_addressline_1`, `customer_addressline_2`, `customer_city`, `customer_state`, `customer_country`, `customer_zip`,
             `customer_phone`, `customer_bank_name`, `customer_bank_code`, `customer_account_number`, `payout_request_id`, `payout_membercode`, `payout_notify_url`, `payout_success_url`, `payout_error_url`, `orderstatus`, `created_date`)
             VALUES ( '$client_ip', '$payout_api_token', '$vstore_id', '$action', '$source', '$source_url', '$source_type', '$Amount', '$curr', '$product_name', '$remarks', '$narration',
              '$customer_name', '$customer_email', '$customer_addressline_1', '$customer_addressline_2', '$customer_city', '$customer_state', '$customer_country', '$customer_zip',
               '$customer_phone', '$customer_bank_name', '$customer_bank_code', '$customer_account_number', '$payout_request_id', '$payout_membercode', '$payout_notify_url', '$payout_success_url', '$payout_error_url', 'Pending', '$created_date')";
			$result = mysqli_query($link, $query2);
			if (!empty($result)) {
				// echo "Data inserted successfully!";
			} else {
				throw new Exception("Query execution failed: " . mysqli_error($link));  die;
			}
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage(); die;
		}
    ?>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://gtechz.implogix.com/api/V2/sha1.js"></script>
        <script>
            function generatecontrol(pform)
            {
                var morder = parseInt(new Date().valueOf()/1000); //generate a unique number
                    pform.merchantorder.value = morder;
                var cname = window.btoa(unescape(encodeURIComponent(pform.customername.value))); 
                
                var s = SHA1(pform.merchantaccount.value + 
                        pform.merchantorder.value +
                        pform.amount.value +
                        pform.currency.value +
                        cname +
                        pform.bankcode.value +
                        pform.bankaccountnumber.value +
                        pform.merchantcontrol.value);
                //alert('hash : ' + s);
                console.log(s);
                pform.control.value = s;
                pform.submit();
            }
        </script>
         <form action="https://payment.quicktransfer.asia/Credit" method="POST">
                         <!-- Version -->
                <input id="version" name="version" type="hidden" value="11">
                         <!-- Merchant Account -->
                  <input id="merchantaccount" name="merchantaccount"  type="hidden" placeholder="Your merchant account" required="" value="<?php echo $merchant_account; ?>">
                         <!-- Merchant Partner Control -->
                  <input id="merchantcontrol" name="merchantcontrol" type="hidden" placeholder="You merchant partner control" required="" value="<?php echo $merchantcontrol; ?>">
                         <!-- Merchant Order -->
                  <input id="merchantorder" name="merchantorder" type="hidden" value="<?php echo $payout_request_id; ?>">
                         <!-- Customer Name -->
                  <input id="customername" name="customername" type="hidden" value="<?php echo $customer_name; ?>">
                         <!-- Amount (amount * 100) non floating value -->
                  <input id="amount" name="amount" type="hidden" placeholder="1000" value="<?php echo $Amount; ?>00">
                         <!-- Currency -->
                  <input id="currency" name="currency" type="hidden" placeholder="THB|USD|CNY" value="<?php echo $Currency; ?>">
                         <!-- Bank Province Code -->
                  <input id="bankprovincecode" name="bankprovincecode" type="hidden" value="110000">
                         <!-- Bank City Code -->
                  <input id="bankcitycode" name="bankcitycode" type="hidden" value="110100">
                         <!-- Bank Code -->
                  <input id="bankcode" name="bankcode" type="hidden" value="<?php echo $customer_bank_name; ?>">
                         <!-- Bank Branch Address -->
                  <input id="bankbranchaddress" name="bankbranchaddress" type="hidden" value="Guangdong Branch Guangzhou Beijing Road Sub-branch">
                         <!-- Bank Account Number -->
                  <input id="bankaccountnumber" name="bankaccountnumber" type="hidden" value="<?php echo $customer_account_number; ?>">
                         <!-- serverReturnURL -->
                  <input id="serverreturnurl" name="serverreturnurl" type="hidden" value="https://gtechz.implogix.com/api/status/">                 
                         <!-- Control (Generated by SHA1) -->
                  <input id="control" name="control" type="hidden" value="" readonly>
              <!-- Button -->  
                  <button id="cartCheckout" style="display: none;" class="btn btn-primary" OnClick="generatecontrol(this.form);">Submit</button>
          </form>
          <script type="text/javascript">
            jQuery(function(){
                jQuery('#cartCheckout').click();
            });   
        </script>
<?php
}else{
        echo "No Data Available or Invalid Request";
} ?>
   
