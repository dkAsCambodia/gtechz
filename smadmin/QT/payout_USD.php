<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
  <meta charset="utf-8">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>

  <title>Payout Demo USD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
  <style type="text/css">
  .control-group {margin-bottom:15px;};
  </style>
  <script type="text/javascript" language="JavaScript" src="sha1.js"></script>
  <script type="text/javascript"  language="JavaScript">

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
 
</head>
<body>
  <div class="container">
    <div class="row clearfix">
      <!-- Building Form. -->
      <div class="span10 offset1">
        <div class="clearfix">
          <h2>Payout Demo USD</h2>
          <hr>
          <form action="https://payment.quicktransfer.asia/Credit" method="POST" name="testform" class="form-horizontal" enctype="application/x-www-form-urlencoded">
              <!-- Text input-->
              <div class="control-group">
                <label class="control-label" for="">Version</label>
                <div class="controls">
                  <input id="version" name="version" type="text" placeholder="" class="input-xlarge" required="" value="11">
                </div>
              </div>
              <!-- Text input-->
              <div class="control-group">
                <label class="control-label" for="">USD Merchant Account</label>
                <div class="controls">
                  <input id="merchantaccount" name="merchantaccount"  type="text" placeholder="Your merchant account" class="input-xlarge" required="" value="902093">
                </div>
              </div>
			  <!-- Text input-->
              <div class="control-group">
                <label class="control-label" for="">USD Merchant Partner Control</label>
                <div class="controls">
                  <input id="merchantcontrol" name="merchantcontrol" type="text" placeholder="You merchant partner control" class="input-xlarge" required="" value="1DBB26A26CBFF08A16F6BCD456A42CF8">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="">Merchant Order</label>
                <div class="controls">
                  <input id="merchantorder" name="merchantorder" type="text" placeholder="" value="<?php echo time(); ?>" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Bank Account Holder Name</label> 
                <div class="controls">
                  <input id="customername" name="customername" type="text" placeholder="Enter correct name here" value="" class="input-xlarge" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Amount For payout 5 USD, it should be value 500 non floating value</label>
                <div class="controls">
                  <input id="amount" name="amount" type="text" placeholder="500" value="500" class="input-xlarge">
                   <!-- For payout 5 USD, it should be value 500 -->
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Currency</label>
                <div class="controls">
                  <input id="currency" name="currency" type="text" placeholder="THB|INR|USD|CNY|MYR|IDR" value="USD" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Bank Province Code</label>
                <div class="controls">
                  <input id="bankprovincecode" name="bankprovincecode" type="text" placeholder="110000" value="" class="input-xlarge" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Bank City Code</label>
                <div class="controls">
                  <input id="bankcitycode" name="bankcitycode" type="text" placeholder="110100" value="" class="input-xlarge" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Bank Code</label>
                <div class="controls">
                  <input id="bankcode" name="bankcode" type="text" placeholder="ABC" value="" class="input-xlarge" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Bank Branch Address</label>
                <div class="controls">
                  <input id="bankbranchaddress" name="bankbranchaddress" type="text" placeholder="Guangdong Branch Guangzhou Beijing Road Sub-branch" value="" class="input-xlarge" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Bank Account Number</label>
                <div class="controls">
                  <input id="bankaccountnumber" name="bankaccountnumber" type="text" placeholder="1234567890" value="" class="input-xlarge" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">serverReturnURL</label>
                <div class="controls">
                  <input id="serverreturnurl" name="serverreturnurl" type="text" placeholder="" value="https://gtechz.implogix.com/QT/Quicktransfer_response.php" class="input-xlarge">
                </div>
              </div>                 
              <div class="control-group">
                <label class="control-label" for="">Control (Generated by SHA1)</label>
                <div class="controls">
                  <input id="control" name="control" type="text" placeholder="" value="" class="input-xlarge" readonly>
                </div>
              </div>
              <!-- Button -->
              <div class="control-group">
                <label class="control-label" for=""></label>
                <div class="controls">
                  <button id="" name="" class="btn btn-primary" OnClick="generatecontrol(this.form);">Submit</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / Building Form. -->

  </div>


</body></html>
