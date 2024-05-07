<?php
session_start();
ob_start();
//$payout_url=$baseurl."/api/V2/";
$protocol	= isset($_SERVER["HTTPS"])?'https://':'http://';
$referer	= $protocol.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; 
$client_ip =(isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
$vstore_id	="ZM-109";
$referenceNo="ZMerch".time().generateRandomString(3);
$payout_membercode= $vstore_id.time().generateRandomString(3);
$Merchant="PA020";
$TransactionID=$referenceNo;
$MemberCode=$payout_membercode;
$Amount="52.00";
$Currency="THB";
date_default_timezone_set('Asia/Kuala_Lumpur');	          
$dated=date("Y-m-d h:i:sA");
$Datetime=date("YmdHis");
$toBankAccountNumber="12345678";
$SecurityCode="r0fxPapA1OFmT1DO4cMu";
$Customer = "shajushahina";
$toBankAccountName = "SHAJU S";
$toProvince = "Kannur";
$toCity = "Kerala";
//$Reference=time();
$Note="Test Purpose";
$Language="en-us";
$Bank="SCB";
//$Bank="PPTP";
$CompanyName="Demotest";
$ReturnURI="https://www.zaffranpsp.com/api/PAY88/pay88-checkout-status.php";
$BackURI="https://www.zaffranpsp.com/api/PAY88/pay88-checkout-status.php";

$Keystring= $Merchant.$TransactionID.$MemberCode.$Amount.$Currency.$Datetime.$toBankAccountNumber.$SecurityCode;
$Key= MD5($Keystring);
print_r('<br/>'.$Key).'<br/>';
print_r('<br/>'.$Keystring);

//$gateway_urlpayment="https://api.securepaymentapi.com/MerchantTransfer";
$gateway_urlpayment="https://service.powerpay88test.com/MerchantPayout/PA020";

function generateRandomString($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {$randomString .= $characters[rand(0, $charactersLength - 1)];}
    return $randomString;
}

?>
<form method="post" action="<?php echo $gateway_urlpayment; ?>" name="paymentform">
	<table>
		<tr><td>Key </td><td><input type="text" size="50"  size="50" name="Key" value="<?php echo $Key; ?>"/></td></tr>
		<tr><td>client_ip </td><td><input type="text" size="50"  name="ClientIP" value="<?php echo $client_ip; ?>"/></td></tr>
		<tr><td>ReturnURI </td><td><input type="text" size="50"  name="ReturnURI" value="<?php echo $ReturnURI; ?>"/></td></tr>
		<tr><td>Merchant </td><td><input type="text" size="50"  name="MerchantCode" value="<?php echo $Merchant; ?>"/></td></tr>
		<tr><td>TransactionID </td><td><input type="text" size="50"  name="TransactionID" value="<?php echo $TransactionID; ?>"/></td></tr>
		<tr><td>Currency </td><td><input type="text" size="50"  name="CurrencyCode" value="<?php echo $Currency; ?>"/></td></tr>
		<tr><td>MemberCode </td><td><input type="text" size="50"  name="MemberCode" value="<?php echo $MemberCode; ?>"/></td></tr>
		<tr><td>Amount </td><td><input type="text" size="50"  name="Amount" value="<?php echo $Amount; ?>"/></td></tr>
		<tr><td>dated </td><td><input type="text" size="50"  name="TransactionDateTime" value="<?php echo $dated; ?>"/></td></tr>
		<tr><td>Bank </td><td><input type="text" size="50"  name="BankCode" value="<?php echo $Bank; ?>"/></td></tr>
		<tr><td>toBankAccountName </td><td><input type="text" size="50"  name="toBankAccountName" value="<?php echo $toBankAccountName; ?>"/></td></tr>
		<tr><td>toBankAccountNumber </td><td><input type="text" size="50"  name="toBankAccountNumber" value="<?php echo $toBankAccountNumber; ?>"/></td></tr>
		<tr><td>toProvince </td><td><input type="text" size="50"  name="toProvince" value="<?php echo $toProvince; ?>"/></td></tr>
		<tr><td>toCity </td><td><input type="text" size="50"  name="toCity" value="<?php echo $toCity; ?>"/></td></tr>
		<tr><td></td><td><input type="submit" name="submit" value="SUBMIT"/></td>
		<script>document.paymentform.submit();</script>
	</table>
</form>
