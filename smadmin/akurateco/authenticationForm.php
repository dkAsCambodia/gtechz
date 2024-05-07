
<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <title>Payment Demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
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
          <h2>Authentication Deposit Demo</h2>
           <hr> 
          <form action="https://gtechz.implogix.com/akurateco/authenticationCurl.php" method="POST" class="form-horizontal">
          	 <div class="control-group">
                <label class="control-label" for="">OrderNumber</label>
                <div class="controls">
                  <input name="number" id="number" type="text" value="<?php echo time(); ?>" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Amount</label>
                <div class="controls">
                  <input id="amount" name="amount" type="text" placeholder="1000" value="100.99" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="">Currency</label>
                <div class="controls">
                  <input id="currency" name="currency" type="text" placeholder="USD|CNY" value="USD" class="input-xlarge">
                </div>
              </div>     
              <div class="control-group">
                <label class="control-label" for="">Description</label>
                <div class="controls">
                  <input name="description" id="description" type="text" value="Important gift" class="input-xlarge">
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label" for="">Signature</label>
                <div class="controls">
                  <input name="signature" id="signature" type="text" value="" class="input-xlarge" readonly>
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label" for=""></label>
                <div class="controls">
                  <button id="cartCheckout" type="submit" class="btn btn-primary" >Submit</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!-- / Building Form. -->

  </div>
</body>
</html>
