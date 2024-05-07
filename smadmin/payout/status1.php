<?php
$responsez=$_POST;
$PmtStatus;
$PmtDescriptions;

if($responsez['Status']=="000"){
	$PmtStatus="Success";
	$PmtDescriptions="Withdrawal process is successful";
}
else if($responsez['Status']=="001"){
	$PmtStatus="Failed";
	$PmtDescriptions="Transfer process is incomplete. Possible reasons: The Bank or the user terminates the process before it is completed.";
}
else if($responsez['Status']=="006"){
	$PmtStatus="Approved";
	$PmtDescriptions="The transfer approved by Gateway after verified that the transfer was completed.";
}
else if($responsez['Status']=="007"){
	$PmtStatus="Rejected";
	$PmtDescriptions="The transfer reject by Gateway after verifying the transfer was not completed or failed.";
}
else if($responsez['Status']=="008"){
	$PmtStatus="Canceled";
	$PmtDescriptions="The transfer has been canceled.";
}
else if($responsez['Status']=="009"){
	$PmtStatus="Pending";
	$PmtDescriptions="The transfer still in pending status.";
}
else{
	$PmtStatus="";
	$PmtDescriptions="";
}

if(array_key_exists('backto',$_POST)){

		    header("Location: checkout.php");
   }
//print_r($_POST);
//Array ( [mcptid] => 3123010038 [currency] => SGD [amount] => 0.01 [referenceNo] => ZCust1677757249ruv 
//[returnUrl] => https://www.zaffranpsp.com/api/OXPAY/oxpay-checkout-response.php 
//[statusUrl] => 
//[transactionId] => 8427153 [responseCode] => 90 [responseMsg] => Payment declined - User Cancelled Txn. 
//[transactionState] => 5 [stan] => [receiptNumber] => [cardHolderName] => 
//[truncatedPan] => [brandName] => enetsHost 
//[tokenize] => N [itemDetail] => [brands] => SCB_PayNow,enetsHost [sessionTimeout] => 1800000 ) 




//$referenceNo="mcptid=3123010038&currency=SGD&amount=0.01&referenceNo=ZCust16777565801Yu&returnUrl=https%3A%2F%2Fwww.zaffranpsp.com%2Fdemos%2Fapi%2Foxpay%2Ftest%2Ftest-responses.php&statusUrl=&transactionId=8427042&responseCode=90&responseMsg=Payment+declined+-+User+Cancelled+Txn.&transactionState=5&stan=&receiptNumber=&cardHolderName=&truncatedPan=&brandName=enetsHost&tokenize=N&itemDetail=&brands=SCB_PayNow%2CenetsHost&sessionTimeout=1800000";
$outtext="TXN STATUS.";
//echo responseCode;
//echo responseMsg;

?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Zaffran PSP – Payment Service Provider Admin & Dashboard">
		<meta name="author" content="Zaffran PSP – Payment Service Provider">
		<meta name="keywords" content="Zaffran PSP sadmin,Zaffran PSP sadmin dashboard,Zaffran PSP sadmin panel">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="http://gtechz.implogix.com/assets/adminz/assets/images/brand/favicon.ico" />

		<!-- TITLE -->
		<title>ZaffranPSP – Payment Service Provider</title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="http://gtechz.implogix.com/assets/adminz/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="http://gtechz.implogix.com/assets/adminz/assets/css/style.css" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="http://gtechz.implogix.com/assets/adminz/assets/css/icons.css" rel="stylesheet"/>

	</head>

	<body class="ltr app horizontal landing-page">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="http://gtechz.implogix.com/assets/adminz/assets/images/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">

				<!-- app-Header -->
				<div class="hor-header header">
					<div class="container main-container">
						<div class="d-flex">
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar" href="javascript:void(0)"></a>
							<!-- sidebar-toggle-->
							<a class="navbar-brand ps-0 d-none d-lg-block" href="index.html">
								<img alt="" class="logo-2" src="http://gtechz.implogix.com/assets/adminz/assets/images/brand/logo-3.png">
								<img alt="" class="dark-landinglogo" src="http://gtechz.implogix.com/assets/adminz/assets/images/brand/logo.png">
							</a>
							<!-- LOGO -->
							
							<div class="d-flex order-lg-2 ms-auto header-right-icons">
								<button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button"
									data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
									aria-controls="navbarSupportedContent-4" aria-expanded="false"
									aria-label="Toggle navigation">
									<span class="navbar-toggler-icon fe fe-more-vertical"></span>
								</button>
								<div class="navbar navbar-collapse responsive-navbar p-0">
									<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
										<div class="d-flex order-lg-2 m-4 m-lg-0 m-md-1">
											<a href="#" target="_blank" class="btn btn-pill btn-outline-primary btn-w-md py-2 me-1">
												Sign up
											</a>
											<a href="#" target="_blank" class="btn btn-pill btn-primary btn-w-md py-2">
												Get Started
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /app-Header -->

				<!--APP-SIDEBAR-->
				<div class="landing-top-header overflow-hidden">
					<div class="top sticky overflow-hidden">

						<!--APP-SIDEBAR-->
						<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
						<div class="app-sidebar bg-transparent horizontal-main">
							<div class="container">
								<div class="main-sidemenu navbar px-0">
									<a class="navbar-brand ps-0 d-none d-lg-block" href="index.html">
										<img alt="" class="logo-2" src="http://gtechz.implogix.com/assets/adminz/assets/images/brand/logo-3.png">
										<img alt="" class="dark-landinglogo" src="http://gtechz.implogix.com/assets/adminz/assets/images/brand/logo.png">
									</a>
									<ul class="side-menu">
										<li class="slide">
											<a class="side-menu__item active" data-bs-toggle="slide" href="#home"><span class="side-menu__label">Home</span></a>
										</li>
										<li class="slide">
											<!-- <a class="side-menu__item" data-bs-toggle="slide" href="#About"><span class="side-menu__label">About</span></a> -->
										</li>
										<li class="slide">
											<!-- <a class="side-menu__item" data-bs-toggle="slide" href="#Clients"><span class="side-menu__label">Clients</span></a> -->
										</li>
										<li class="slide">
											<!-- <a class="side-menu__item" data-bs-toggle="slide" href="#Features"><span class="side-menu__label">Features</span></a> -->
										</li>
										<li class="slide">
											<!-- <a class="side-menu__item" data-bs-toggle="slide" href="#Faq"><span class="side-menu__label">Faq's</span></a> -->
										</li>
										<li class="slide">
											<!-- <a class="side-menu__item" data-bs-toggle="slide" href="#Team"><span class="side-menu__label">Team</span></a> -->
										</li>
										<li class="slide">
											<!-- <a class="side-menu__item" data-bs-toggle="slide" href="#Contact"><span class="side-menu__label">Contact</span></a> -->
										</li>
									</ul>
									<div class="header-nav-right d-flex">
										<a href="#" target="_blank" class="btn btn-pill btn-outline-primary btn-w-md py-2 me-1 my-auto  d-lg-none d-xl-block d-block">
											Sign up
										</a>
										<a href="#" target="_blank" class="btn btn-pill btn-primary btn-w-md py-2 my-auto d-lg-none d-xl-block d-block">
											Get Started
										</a>
									</div>
								</div>
							</div>
						</div>
						<!--/APP-SIDEBAR-->
					</div>
							
					<!-- Header Main-->
					<!-- <div class="demo-screen-headline main-demo main-demo-1 overflow-hidden pb-0 mb-6" id="home">
						<div class="container px-5 px-md-0">
							<div class="overflow-hidden">
								<div class="row">
									<div class="col-lg-6 text-left pos-relative overflow-hidden p-3">
										<h1 class="text-shadow text-dark">Choose correct path to boost your business with <span
												class="text-primary">Noa.</span></h1>
										<h6 class="mt-3">Noa-Now you can use this admin template to design stunning dashboards that
											will wow your target viewers or users to no end. To create a good and well-structured
											dashboard, you need to start from scratch with HTML, SCSS, CSS, and JS and with lots of
											coding, but by using this Noa-Admin template, you can customise your dashboard
											effortlessly within no time.</h6>
										<h6 class="mb-4">We create our templates in a very professional manner to satisfy our
											clients.</h6>
										<a href="#" class="btn btn-pill btn-primary btn-w-md py-2 me-2 mb-1">Buy Now<i
												class="fe fe-activity ms-2"></i></a>
										<a href="#" class="btn btn-pill btn-secondary btn-w-md py-2 mb-1">Demo<i
												class="fe fe-file-text mx-2"></i></a>
									</div>
									<div class="col-lg-6 text-left pos-relative overflow-hidden market-image">
										<img alt="" class="logo-2" src="http://gtechz.implogix.com/assets/adminz/assets/images/landing/market.png">
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!-- Header Main Close-->

				</div>
				<!--/APP-SIDEBAR-->

                <!--app-content open-->
				<div class="hor-content main-content mt-0">
					<div class="side-app">
						<!-- CONTAINER -->
						<div class="main-container">

							<!-- Our motto section-->
							<div class="section pb-5">
								<div class="container px-5 px-md-0">
									<div class="row text-center">
										<div class="col-lg-12">
											<h3 class="header-family">Responses Page- Source 1</h3>
											<p class="text-default sub-text">Responses after transfer or deposit.</p>
										</div>
									</div>

									<!-- row -->
							<div class="row row-deck">
								<!-- <div class="col-lg-12 col-md-12 text-default"> -->
								<div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block bg-white">
									<div class="card bg-primary">
										<div class="card-header border-bottom ">
											<h3 class="card-title text-center text-white "></h3>
										</div>
										<div class="card-body bg-white">
											<p class="text-muted"></p>
											
											<form class="form-horizontal" method="post" action="#">

												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">StatusCode</label>
													<div class="col-md-9">
														<input class="form-control" name="Status" id="Status" placeholder="Enter Status" value="<?php echo $responsez['Status']; ?>" type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Status</label>
													<div class="col-md-9">
														<input class="form-control" name="Status" id="Status" placeholder="Enter Status" value="<?php echo $PmtStatus; ?>" type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Status Description</label>
													<div class="col-md-9">
														<input class="form-control" name="Status" id="Status" placeholder="Enter Status" value="<?php echo $PmtDescriptions; ?>" type="text">
													</div>
												</div>
												
												<div class="row mb-4">
													<label for="firstName" class="col-md-3 form-label">TRN-ID</label>
													<div class="col-md-9">
														<input class="form-control" name="TRN-ID" id="TRN-ID" placeholder="Enter your TRN-ID" value="<?php echo $responsez['ID']; ?>" readonly type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="lastName" class="col-md-3 form-label">Customer</label>
													<div class="col-md-9">
														<input class="form-control" name="Customer" id="Customer" placeholder="Enter your Currency" value="<?php echo $responsez['Customer']; ?>" readonly type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="firstName" class="col-md-3 form-label">Reference ID</label>
													<div class="col-md-9">
														<input class="form-control" name="Reference" id="Reference" placeholder="Enter Reference ID" value="<?php echo $responsez['Reference']; ?>" readonly type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="lastName" class="col-md-3 form-label">Currency</label>
													<div class="col-md-9">
														<input class="form-control" name="Currency" id="Currency" placeholder="Enter your Currency" value="<?php echo $responsez['Currency']; ?>" readonly type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Amount</label>
													<div class="col-md-9">
														<input class="form-control" name="Amount" id="Amount" placeholder="Enter your Amount" value="<?php echo $responsez['Amount']; ?>" type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Note</label>
													<div class="col-md-9">
														<input class="form-control" name="Note" id="Note" placeholder="Enter your Note" value="<?php echo $responsez['Note']; ?>" type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Datetime</label>
													<div class="col-md-9">
														<input class="form-control" name="Datetime" id="Datetime" placeholder="Enter Datetime" value="<?php echo $responsez['Datetime']; ?>" type="text">
													</div>
												</div>
												
												
												
												<!-- <div class="row mb-4">
													<label for="" class="col-md-3 form-label">Email</label>
													<div class="col-md-9">
														<input class="form-control" name="email" id="email" placeholder="Enter your email" type="email" value="shajushahina@gmail.com">
													</div>
												</div> 
												
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Item Detail</label>
													<div class="col-md-9">
														<input class="form-control" name="itemDetail" id="itemDetail" placeholder="Enter itemDetail" type="text" value="test Item">
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<label class="ckbox">
															<input type="checkbox" name="tokenize" id="tokenize" checked="checked" disabled><span class="text-13">Tokenize</span>
														</label>
													</div>
												</div>-->
												<div class="row">
													<div class="form-group col-md-12 text-center">
														<a href="index.php" class="btn btn-primary col-9 m-4 py-2" >Back to Home</a>
														<!-- <input class="btn btn-primary col-9 m-4 py-2" name="backto" id="backto" value="Back to Home" type="submit"/> -->
													</div>
												</div>
												
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /row -->
									
								</div>
							</div>
							<!-- Our motto section end-->



							<!--Support-->
							<div class="demo-screen-skin bg-primary">
								<div class="container text-center text-white px-5 px-md-0">
									<div id="demo" class="row">
										<div class="col-lg-6">
											<div class="feature-1">
												<a href="#"></a>
												<div class="mb-3">
													<i class="si si-earphones-alt"></i>
												</div>
												<h4 class="fs-25">Get Support</h4>
												<p class="mb-1 text-white">Need Help? Don't worry. Please visit our support website. Our
													dedicated team will help you.</p>
												<h6 class="mb-0">Support : <a class="text-dark"
														href="mailto:sales@zaffranpsp.com">sales@zaffranpsp.com</a></h6>
											</div>
										</div>
										<div class="col-lg-6 mt-5 mt-xl-0 mt-lg-0">
											<div class="feature-1">
												<a href="#"></a>
												<div class="mb-3">
													<i class="si si-bubbles"></i>
												</div>
												<h4 class="fs-25">Pre-Sale Questions</h4>
												<p class="mb-1 text-white">Please feel free to ask any questions before making the purchase.</p>
												<h6 class="mb-0">Ask : <a class="text-dark"
														href="mailto:sales@zaffranpsp.com">sales@zaffranpsp.com</a></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--Support close-->

							<!-- </Footer> -->
							<div class="demo-footer">
								<div class="container px-5 px-md-0">
									<div class="card mb-0 px-0">
										<div class="card-body px-0">
											<!-- <div class="top-footer">
												<div class="row">
													<div class="col-lg-4 col-sm-12 col-md-12">
														<h6 class="text-uppercase mb-3 font-weight-semibold">About</h6>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
															laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
															architecto beatae vitae dicta sunt
															explicabo.
														</p>
														<p class="mb-5 mb-lg-2">Duis aute irure dolor in reprehenderit in voluptate velit esse
															cillum dolore eu fugiat nulla pariatur Excepteur sint occaecat .</p>
													</div>
													<div class="col-lg-2 col-sm-6 col-md-4">
														<h6 class="text-uppercase mb-2 font-weight-semibold">Pages</h6>
														<ul class="list-unstyled mb-5 mb-lg-0">
															<li><a href="index.html">Dashboard</a></li>
															<li><a href="alerts.html">Elements</a></li>
															<li><a href="form-elements.html">Forms</a></li>
															<li><a href="charts.html">Charts</a></li>
															<li><a href="datatable.html">Tables</a></li>
															<li><a href="file-attachments.html">Other Pages</a></li>
														</ul>
													</div>
													<div class="col-lg-2 col-sm-6 col-md-4">
														<h6 class="text-uppercase mb-2 font-weight-semibold">Information</h6>
														<ul class="list-unstyled mb-5 mb-lg-0">
															<li><a href="about.html">Our Team</a></li>
															<li><a href="about.html">Contact US</a></li>
															<li><a href="about.html">About</a></li>
															<li><a href="services.html">Services</a></li>
															<li><a href="blog.html">Blog</a></li>
															<li><a href="terms.html">Terms and Services</a></li>
														</ul>
													</div>
													<div class="col-lg-4 col-sm-12 col-md-4">
														<h6 class="text-uppercase mb-2 font-weight-semibold">Contact</h6>
														<p><i class="fa fa-home me-3 mb-2"></i> New York, NY 10012, US</p>
														<p><i class="fa fa-envelope me-3 mb-2"></i> info@gmail.com</p>
														<p><i class="fa fa-phone me-3 mb-2"></i> + 01 234 567 88</p>
														<p><i class="fa fa-print me-3 mb-2"></i> + 01 234 567 89</p>
														<hr>
														<h6 class="text-uppercase mb-0 font-weight-semibold">Payments</h6>
														<ul class="footer-payments">
															<li><a href="javascript:void(0);"><i class="fa fa-cc-amex text-muted"
																		aria-hidden="true"></i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-cc-visa text-muted"
																		aria-hidden="true"></i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-credit-card-alt text-muted"
																		aria-hidden="true"></i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-cc-mastercard text-muted"
																		aria-hidden="true"></i></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-cc-paypal text-muted"
																		aria-hidden="true"></i></a></li>
														</ul>
													</div>
												</div>
											</div> -->
											<footer class="main-footer px-0 pb-0">
												<div class="row ">
													<div class="col-xl-8 col-lg-12 col-md-12 footer1">Copyright © 2023 <a
															href="javascript:void(0)">Zaffran PSP</a>. Designed with <span
															class="fa fa-globe text-danger"></span> by <a href="https://acuteinfos.in" target="_blank"> Acute Info Solutions </a>
													</div>
													<div class="col-xl-4 col-lg-12 col-md-12 ms-auto text-end">
														<ul class="footer-social-list ">
															<li><a href="https://www.facebook.com/" target="_blank"><i
																		class="fa fa-facebook"></i></a></li>
															<li><a href="https://www.google.com/" target="_blank"><i class="fa fa-google"></i></a>
															</li>
															<li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
															</li>
															<li><a href="https://www.linkedin.com/" target="_blank"><i
																		class="fa fa-linkedin"></i></a></li>
														</ul>
													</div>
												</div>
											</footer>
										</div>
									</div>
								</div>
							</div>
							<!-- Footer close -->

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

	</body>
</html>
