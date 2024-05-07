
<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <title>Payment Demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <style type="text/css">
  .control-group {margin-bottom:15px;};
  </style>
</head>
<body>
  <div class="container">
    <div class="row clearfix">
      <!-- Building Form. -->
      <div class="span10 offset1">
        <div class="clearfix">
          <h2>M2P Withdrawal USD & CNY</h2>
           <hr>    
          <form action="https://gtechz.implogix.com/m2p/m2p_withdrawal_response.php" method="POST" class="form-horizontal">
              <div class="control-group">
                <label class="control-label" for="">Currency</label>
                <div class="controls">
                  <input id="currency" name="currency" type="text" placeholder="USD|CNY" value="" class="input-xlarge" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">PaymentGatewayName</label>
                <div class="controls">
                  <input name="paymentGatewayName" id="paymentGatewayName" type="text" value="USDT TRC20" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Amount</label>
                <div class="controls">
                  <input id="amount" name="amount" type="text" placeholder="1" value="1" class="input-xlarge" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">WithdrawCurrency</label>
                <div class="controls">
                  <input name="withdrawCurrency" id="withdrawCurrency" type="text" value="USX" class="input-xlarge">
                </div>
              </div>   
              <div class="control-group">
                <label class="control-label" for="">Cryptocurrency wallet address to withdraw</label>
                <div class="controls">
                <!-- TET4gNYMDM7vCGwYhKZ1tiFS454i1FH7yD -->
                  <input name="address" id="address" type="text" placeholder="Enter Your Withdrawal Address" value="" class="input-xlarge" required> 
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label" for="">CallbackUrl</label>
                <div class="controls">
                  <input  name="callbackUrl" id="callbackUrl" type="text" class="input-xlarge" value="https://gtechz.implogix.com/m2p/final_response.php">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Signature</label>
                <div class="controls">
                  <input name="signature" id="signature" type="text" value="" class="input-xlarge" readonly>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">ApiToken</label>
                <div class="controls">
                  <input name="apiToken" id="apiToken" type="text" class="input-xlarge" value="xoC0b9Mak2r2P4ZBECG23B5qMsbqVLXmor8g">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Timestamp</label>
                <div class="controls">
                  <input name="timestamp" id="timestamp" type="text" value="<?php echo time(); ?>" class="input-xlarge">
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label" for="">TradingAccountLogin</label>
                <div class="controls">
                  <input name="tradingAccountLogin" id="tradingAccountLogin" type="text" value="tradingAccountLogin" class="input-xlarge">
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label" for=""></label>
                <div class="controls">
                  <button id="cartCheckout" name="" class="btn btn-primary" OnClick="generatecontrol(this.form);">Submit</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / Building Form. -->

<script>
  function generatecontrol(pform)
      {
        if(pform.currency.value=='' || pform.address.value==''){
            exit;
        }
        // {"address": "amount": "apiToken" : "callbackUrl" : "currency" :"paymentGatewayName" :"timestamp":"withdrawCurrency" }
        var s  =pform.address.value+
                pform.amount.value+
                pform.apiToken.value+
                pform.callbackUrl.value+
                pform.currency.value+
                pform.paymentGatewayName.value+
                pform.timestamp.value+
                pform.withdrawCurrency.value;   
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

  </div>
</body>
</html>
