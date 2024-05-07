<?php
session_start();
ob_start();
include("../connection.php");
$selrev = "SELECT * FROM `m_currency`";
$qrv=mysqli_query($link,$selrev);
$vstore_idz	="GZ-108";
$referenceNo="GZTRN".time().generateRandomString(3);
if(array_key_exists('paynow',$_POST)){
	payout();
}
function payout(){
	// $baseurl = "http://localhost/gtechz/smadmin";	
	$baseurl = "https://gtechz.implogix.com";
	$payout_api_token		="noadf49CKEYSWsBFHZQ0Oe2MPIb1T5"; // For GTECHZ Official
	$vstore_id	="GZ-108"; // For GTECHZ Official
	// PayOut API Token & STORE-ID
	if($_POST['source_type']=='psource1'){
		$payout_url=$baseurl."/api/V2/"; 		//QT								
	}else if($_POST['source_type']=='psource2'){     
		$payout_url=$baseurl."/api/V6/";      //powerpay
	}else if($_POST['source_type']=='psource3'){     
		$payout_url=$baseurl."/api/V9/";  		//H2p
	}else if($_POST['source_type']=='psource4'){     
		$payout_url=$baseurl."/api/V8/";      //M2p
	}else if($_POST['source_type']=='psource5'){     
		$payout_url=$baseurl."/api/V13/";      // Akurateco
	}else if($_POST['source_type']=='psource6'){     
		$payout_url=$baseurl."/api/V11/";      //VIZPAY
	}else{
		$payout_url=$baseurl."/api/V6/";
	}
	$protocol	= isset($_SERVER["HTTPS"])?'https://':'http://';
	$referer	= $protocol.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; 
	$pramPost=array();
	$pramPost['client_ip'] =(isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
	$pramPost["payout_api_token"] = $payout_api_token;
	$pramPost['vstore_id']	=$vstore_id;
	$pramPost['action']		='payout';
	$pramPost['source']		='payout-Encode';
	$pramPost['source_url']	=$referer;
	$pramPost['source_type'] =$_POST['source_type'];
	$pramPost['price'] =  $_POST['totalAmount'];
	if($_POST['currency_namez']=="USD(Cambodia)"){
	    $pramPost['curr'] = "USD";
	}else{
	    $pramPost['curr'] = $_POST['currency_namez'];
	}
	$pramPost['product_name']	= 'testing'; // Any Thing
	$pramPost['remarks']	= "Payout for gtechz";
	$pramPost['narration']	= "Payout narration";
	$pramPost['customer_name']	=$_POST['customer_name']; // Customer Name
	$pramPost['customer_email']	=$_POST['customer_emailz'];
	$pramPost['customer_addressline_1']	=$_POST['customer_addressline_1']; // Customer Address Line 1
	$pramPost['customer_addressline_2']	=$_POST['customer_addressline_2']; // Customer Address Line 2
	$pramPost['customer_city']		=$_POST['customer_city']; // Customer City
	$pramPost['customer_state']		=$_POST['customer_state']; // Customer State
	$pramPost['customer_country']	=$_POST['customer_country']; // Customer Country
	$pramPost['customer_zip']		=$_POST['customer_zip']; // Customer Zipcode
	$pramPost['customer_phone']		=$_POST['customer_phone']; // Customer 787602
	$pramPost['customer_bank_name']	= $_POST['bank_type']; //Bank Code//PPTP,SCB
	if($_POST['currency_namez']=="USD(Cambodia)"){
	    $pramPost['customer_bank_code'] = "USD";
	}else{
	    $pramPost['customer_bank_code'] = $_POST['currency_namez'];
	}
	
	$pramPost['customer_account_number']	= $_POST['customer_account_number'];  // customer BankAccount Number 
	$pramPost['payout_request_id']	= $_POST['payout_request_id']; // Should be unique from Merchant
	$pramPost['payout_membercode']	= $vstore_id.time().generateRandomString(3); // Should be unique from Merchant
    $pramPost['payout_notify_url']	='https://gtechz.implogix.com/payout/payin_notify_url.php'; // Notify URL
    $pramPost['payout_success_url']	='https://gtechz.implogix.com/payout/payin_success_url.php'; // Success CallBack URL
    $pramPost['payout_error_url']	='https://gtechz.implogix.com/payout/payin_error_url.php';
	

	$curl_cookie="";
	$curl = curl_init(); 
	curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
	curl_setopt($curl, CURLOPT_URL, $payout_url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($curl, CURLOPT_REFERER, $referer);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $pramPost);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($curl);
	curl_close($curl);
  	print_r($response); die;
}

function generateRandomString($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {$randomString .= $characters[rand(0, $charactersLength - 1)];}
    return $randomString;
}	
?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Gtechz  – Payment Service Provider Admin & Dashboard">
		<meta name="author" content="Gtechz  – Payment Service Provider">
		<meta name="keywords" content="Gtechz  sadmin,Gtechz  sadmin dashboard,Gtechz  sadmin panel">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="https://gtechz.implogix.com/assets/adminz/assets/images/brand/favicon.ico" />

		<!-- TITLE -->
		<title>Gtechz  – Payment Service Provider</title>

		<!-- BOOTSTRAP CSS -->
		<link id="style" href="https://gtechz.implogix.com/assets/adminz/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="https://gtechz.implogix.com/assets/adminz/assets/css/style.css" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="https://gtechz.implogix.com/assets/adminz/assets/css/icons.css" rel="stylesheet"/>
		<style>
			.wallet_address_label{
				display:none;
			}
			.paymentID_label{
				display:none;
			}
		</style>
	</head>

	<body class="ltr app horizontal landing-page">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="https://gtechz.implogix.com/assets/adminz/assets/images/loader.svg" class="loader-img" alt="Loader">
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
							<a class="logo-horizontal " href="index.php">
								<img src="https://gtechz.implogix.com/assets/adminz/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
								<img src="https://gtechz.implogix.com/assets/adminz/assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
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
										<img alt="" class="logo-2" src="https://gtechz.implogix.com/assets/adminz/assets/images/brand/logo-3.png" width="100px">
										<img alt="" class="dark-landinglogo" src="https://gtechz.implogix.com/assets/adminz/assets/images/brand/logo.png">
									</a>
									<ul class="side-menu">
										<li class="slide">
											<a class="side-menu__item active" data-bs-toggle="slide" href="#home"><span class="side-menu__label"></span></a>
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
										<!-- <a href="#" target="_blank" class="btn btn-pill btn-outline-primary btn-w-md py-2 me-1 my-auto  d-lg-none d-xl-block d-block">
											Sign up
										</a>
										<a href="#" target="_blank" class="btn btn-pill btn-primary btn-w-md py-2 my-auto d-lg-none d-xl-block d-block">
											Get Started
										</a> -->
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
										<img alt="" class="logo-2" src="https://gtechz.implogix.com/assets/adminz/assets/images/landing/market.png">
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
											<h3 class="header-family">Merchant - Payout</h3>
											<p class="text-default sub-text">Merchant transfer or deposit.</p>
										</div>
									</div>

									<!-- row -->
							<div class="row row-deck">
								<!-- <div class="col-lg-12 col-md-12 text-default"> -->
								<div class="col-md-10 col-lg-8 col-xl-9 mx-auto d-block bg-white">
									<div class="card bg-primary">
										<div class="card-header border-bottom ">
											<h3 class="card-title text-center text-white "></h3>
										</div>
										<div class="card-body bg-white">
											<p class="text-muted"></p>
											<form class="form-horizontal" enctype="multipart-formdata" method="post" action="#">
												<div class="row mb-4">
													<label for="firstName" class="col-md-3 form-label">Reference ID</label>
													<div class="col-md-9">
														<input class="form-control" name="payout_request_id" id="payout_request_id" placeholder="Enter Reference ID" value="<?php echo $referenceNo; ?>" required readonly type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="lastName" class="col-md-3 form-label">Source</label>
													<div class="col-md-9">
														<select class="form-control select2-show-search form-select  text-dark" id="source_type" name="source_type" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            								<option value="">---</option>
                            								<option value="psource1">Psource1</option>
															<option value="psource2">Psource2</option>
															<option value="psource3">Psource3</option>
															<option value="psource4">Psource4 (Crypto Payment)</option>
															<option value="psource5">Psource5 (Card Payment)</option>
															<option value="psource6">Psource6</option>
                          								</select>
													</div>
												</div>
												<div class="row mb-4">
													<label for="lastName" class="col-md-3 form-label">Currency</label>
													<div class="col-md-9">
													    <input type="hidden" name="currency_namez" id="currency_namez"/>
													    <select class="form-control select2-show-search form-select  text-dark" id="currency" name="currency" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            								<option value="">---</option>
                            								<?php while($rowrv=mysqli_fetch_array($qrv)){ ?>
                            								<option value="<?php echo $rowrv['id']?>"><?php echo $rowrv['currency_name']?></option>
                            								<?php } ?>
                          								</select>
													 
													</div> 
												</div>
												<div class="row mb-4">
													<label for="bank_type" class="col-md-3 form-label">Bank Code</label>
													<div class="col-md-9">
														<select class="form-control select2-show-search form-select  text-dark" id="bank_type" name="bank_type"  data-placeholder="---" tabindex="-1" aria-hidden="true">

                            								<option value="">---</option>
                          								</select>
														
												    </div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Amount</label>
													<div class="col-md-9">
														<input class="form-control" required name="totalAmount" id="totalAmount" placeholder="Enter your Amount" value="100.00" type="text">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Customer Name</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_name" id="customer_name" placeholder="Enter Customer Name" type="text" value="">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label account_number_label">Bank Account Number</label>
													<label for="" class="col-md-3 form-label wallet_address_label">Enter Wallet Address</label>
													<label for="" class="col-md-3 form-label paymentID_label">Enter Payment ID</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_account_number" id="customer_account_number" type="text" value="">
													</div>
												</div>
												<!--<div class="row mb-4">
													<label for="lastName" class="col-md-3 form-label">Select Bank</label>
													<div class="col-md-9">
														<select class="form-control select2-show-search form-select  text-dark" id="customer_bank_name" name="customer_bank_name" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            								<option value="">---</option>
                            								<option value="BBL">Bangkok Bank</option>
															<option value="BOA">Bank Of Ayudhya</option>
															<option value="CIMBT">CIMB Thai</option>
															<option value="KKR">KasiKorn Bank</option>
															<option value="KNK">Kiatnakin Bank</option>
															<option value="KTB">KTB Net Bank</option>
															<option value="SCB">Siam Commercial Bank</option>
															<option value="TMB">TMB Bank Public Company Limited</option>
                          								</select>
													</div>
												</div>-->
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Customer Email</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_emailz" id="customer_emailz" placeholder="Enter Customer email" type="email" value="" >
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Address Line 1</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_addressline_1" id="customer_addressline_1" placeholder="Enter Customer Address Line 1" type="text" value="">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Address Line 2</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_addressline_2" id="customer_addressline_2" placeholder="Enter Customer Address Line 2" type="text" value="">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">City</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_city" id="customer_city" placeholder="" type="text" value="">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">State</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_state" id="customer_state" placeholder="Enter Customer State" type="text" value="">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Country</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_country" id="customer_country" placeholder="Enter Customer Country" type="text" value="">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">ZipCode - 6 digit</label>
													<div class="col-md-9">
														<input class="form-control" required name="customer_zip" id="customer_zip" placeholder="Enter Customer ZipCode" type="text" value="">
													</div>
												</div>
												<div class="row mb-4">
													<label for="" class="col-md-3 form-label">Phone Number -10 digit</label>
													<div class="col-md-9">
														<input class="form-control" name="customer_phone" id="customer_phone" placeholder="Enter Customer Phone Number" type="text" value="" required>
													</div>
												</div>
												<div class="row">
													<div class="form-group text-center">
														<input class="btn btn-primary col-6 m-4 py-2" name="paynow" id="paynow" value="Pay Now" type="submit"/>
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
														href="mailto:sales@Gtechz.com">sales@Gtechz.com</a></h6>
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
														href="mailto:sales@Gtechz.com">sales@Gtechz.com</a></h6>
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
											<footer class="main-footer px-0 pb-0">
												<div class="row ">
													<div class="col-xl-8 col-lg-12 col-md-12 footer1">Copyright © 2023 <a
															href="javascript:void(0)">Gtechz</a>.
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
		<script src="https://gtechz.implogix.com/assets/adminz/assets/js/jquery.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="https://gtechz.implogix.com/assets/adminz/assets/plugins/bootstrap/js/popper.min.js"></script>
		<script src="https://gtechz.implogix.com/assets/adminz/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Owl carousel JS -->
		<script src="https://gtechz.implogix.com/assets/adminz/assets/plugins/company-slider/slider.js"></script>
		<script src="https://gtechz.implogix.com/assets/adminz/assets/plugins/owl-carousel/owl.carousel.js"></script>

		<!-- landing JS -->
		<script src="https://gtechz.implogix.com/assets/adminz/assets/js/landing.js"></script>
        <script src="https://gtechz.implogix.com/payout/js/custom.js"></script>
	</body>
</html>
