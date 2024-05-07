<?php
$results=$_POST;
$pt_transactionId=$results['pt_transactionId'];
$pt_email=$results['pt_email'];
$pt_reference=$results['pt_reference'];
$pt_amount=$results['pt_amount'];
$pt_timestamp=$results['pt_timestamp'];
$pt_status=$results['pt_status'];
?>
<?php if($results){ 
/*echo "Transaction Information as follows".'<br/>'.
"TransactionId : ".$pt_transactionId.'<br/>'.
"Email : ".$pt_email.'<br/>'.
"ReferenceNo : ".$pt_reference.'<br/>'.
"Amount : ".$pt_amount.'<br/>'.
"Datetime : ".$pt_timestamp.'<br/>'.
"Status : ".$pt_status;*/?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Gtechz PSP – Payment Service Provider Admin & Dashboard">
		<meta name="author" content="Gtechz PSP – Payment Service Provider">
		<meta name="keywords" content="Gtechz PSP sadmin,Zaffran PSP sadmin dashboard,Zaffran PSP sadmin panel">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="http://gtechz.implogix.com/assets/adminz/assets/images/brand/favicon.ico" />

		<!-- TITLE -->
		<title>Gtechz – Payment Service Provider</title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="http://gtechz.implogix.com/assets/adminz/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="http://gtechz.implogix.com/assets/adminz/assets/css/style.css" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="http://gtechz.implogix.com/assets/adminz/assets/css/icons.css" rel="stylesheet"/>

	</head>
	<style type="text/css">
		.sweet-alertprimar{
			display: block; 
			margin-top: -300px; 
			overflow: scroll !important;

		}
		.sweet-alertdivi{
			display: flex; justify-content: space-between;

		}
		.sweet-alertpivil{
			flex-basis: 29.5%; background-color: papayawhip !important;
		}
		.sweet-alertpivir{
			flex-basis: 69.5%; background-color: palegoldenrod !important;

		}
		
		.sweet-alertpiv{
			display: block;

		}
		
	</style>

	<body class="ltr app horizontal landing-page">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="http://gtechz.implogix.com/assets/adminz/assets/images/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">

                <!--app-content open-->
				<div class="hor-content main-content mt-0">
					<div class="side-app">
						<!-- CONTAINER -->
						<div class="main-container">

							<!-- Our motto section-->
							<div class="section pb-5">
								<div class="container px-5 px-md-0">
									<div class="row text-center">
										
												<div class="sweet-alert showSweetAlert visible sweet-alertprimar"  data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null">
												<?php ob_start(); if($orderstatus=="Success" || $orderstatus=="Approved"){ ?>
    											<div class="sa-icon sa-success animate" style="display: block;">
      												<span class="sa-line sa-tip animateSuccessTip"></span>
      												<span class="sa-line sa-long animateSuccessLong"></span>

      												<div class="sa-placeholder"></div>
      												<div class="sa-fix"></div>
    											</div>
    											<?php } else if($orderstatus=="Failed" || $orderstatus=="Rejected" || $orderstatus=="Cancelled"){ ?>
    											<div class="sa-icon sa-error animateErrorIcon" style="display: block;">
      												<span class="sa-x-mark animateXMark">
        												<span class="sa-line sa-left"></span>
        												<span class="sa-line sa-right"></span>
     												</span>
      												<div class="sa-placeholder"></div>
      												<div class="sa-fix"></div>
    											</div>
    											<?php } else { ?>
    											<div class="sa-icon sa-info" style="display: block;">
      												<span class="sa-x-mark animateXMark">
        												<span class="sa-line sa-left"></span>
        												<span class="sa-line sa-right"></span>
     												</span>
      												<div class="sa-placeholder"></div>
      												<div class="sa-fix"></div>
    											</div>
    											<?php } ?>
    											<h2>Transaction Summary</h2>
    											<p class="text-default sub-text">Thank you for the payment</p>
    											<div class="sweet-alertdivi">
  													<p class="sweet-alertpivil">TRN ID :</p>
  													<p class="sweet-alertpivir"><?php echo $pt_transactionId; ?></p>
												</div>
												<div class="sweet-alertdivi">
  													<p class="sweet-alertpivil">Status :</p>
  													<p class="sweet-alertpivir"><?php echo $pt_status; ?></p>
												</div>
												<div class="sweet-alertdivi">
  													<p class="sweet-alertpivil">Email :</p>
  													<p class="sweet-alertpivir"><?php echo $pt_email; ?></p>
												</div>
												<div class="sweet-alertdivi">
  													<p class="sweet-alertpivil">Amount :</p>
  													<p class="sweet-alertpivir"><?php echo $pt_amount; ?></p>
												</div>
												<!--<form class="form-horizontal"  name="paymentform"  id="paymentform" method="post" action="http://gtechz.implogix.com/office/payment-collection.php">-->
												    <input type="hidden" name="pt_transactionId" value="<?php echo $pt_transactionId; ?>"/>
                                                    <input type="hidden" name="pt_email" value="<?php echo $pt_email; ?>"/>
                                                    <input type="hidden" name="pt_reference" value="<?php echo $pt_reference; ?>"/>
                                                    <input type="hidden" name="pt_amount" value="<?php echo $pt_amount; ?>"/>
                                                    <input type="hidden" name="pt_timestamp" value="<?php echo $pt_timestamp; ?>"/>
                                                    <input type="hidden" name="pt_status" value="<?php echo $pt_status; ?>"/>
    											    <!--<p class="sweet-alertpiv"><span id="timer">Redirecting within <span id="time"></span> Seconds</span></p>-->
    											    <!--<button></button>-->
    											    <a href="http://gtechz.implogix.com/office/payment-collection.php" class="btn btn-primary col-6 m-4 py-2" id="backto" >Click Here to Pay Again</a>
    											<!--</form>-->
											</div>
										
									</div>
								</div>
							</div>
							<!-- Our motto section end-->



							<!--Support-->
							<div class="demo-screen-skin" style="background-color: transparent;">
								<div class="container text-center text-white px-5 px-md-0">
									
								</div>
							</div>
							<!--Support close-->

							

						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

		<!-- JQUERY JS -->
		<script src="http://gtechz.implogix.com/assets/adminz/assets/js/jquery.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="http://gtechz.implogix.com/assets/adminz/assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="http://gtechz.implogix.com/assets/adminz/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Owl carousel JS -->
		<script src="http://gtechz.implogix.com/assets/adminz/assets/plugins/company-slider/slider.js"></script>
		<script src="http://gtechz.implogix.com/assets/adminz/assets/plugins/owl-carousel/owl.carousel.js"></script>

		<!-- landing JS -->
		<script src="http://gtechz.implogix.com/assets/adminz/assets/js/landing.js"></script>
		<!-- Sweet-alert js  -->
		<script src="http://gtechz.implogix.com/assets/plugins/sweet-alert/sweetalert.min.js"></script>
		<script src="http://gtechz.implogix.com/assets/plugins/sweet-alert/jquery.sweet-alert.js"></script>

	</body>
</html>


<?php }
else{ echo "No Data Available or Invalid Request"; ?>
    
<?php } ?>
