<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gtechz PSP – Payment Service Provider Admin & Dashboard">
    <meta name="author" content="Gtechz PSP – Payment Service Provider">
    <meta name="keywords" content="Gtechz PSP sadmin,Gtechz PSP sadmin dashboard,Gtechz PSP sadmin panel.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/adminz/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Gtechz PSP – Payment Service Provider | Log in</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?php echo base_url(); ?>assets/adminz/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/adminz/assets/css/style.css" rel="stylesheet"/>
    <link href="<?php echo base_url(); ?>assets/adminz/assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="<?php echo base_url(); ?>assets/adminz/assets/css/icons.css" rel="stylesheet"/>
    <!-- <link href="assets/adminz/assets/css/icons.css" rel="stylesheet"/> -->

  </head>
<body class="ltr login-img">
        <!-- GLOABAL LOADER -->
      <div id="global-loader">
        <img src="<?php echo base_url(); ?>assets/adminz/assets/images/loader.svg" class="loader-img" alt="Loader">
      </div>
      <!-- /GLOABAL LOADER -->

      <!-- PAGE -->
      <div class="page">
        <div>
            <!-- CONTAINER OPEN -->
          <div class="col col-login mx-auto text-center">
            <a href="" class="text-center">
              <img src="<?php echo base_url(); ?>assets/adminz/assets/images/brand/logo-3.png" class="header-brand-img" alt="">
            </a>
          </div>
          <div class="container-login100">
            <div class="wrap-login100 p-0">
              <div class="card-body">
                <!-- <form class="login100-form validate-form"> -->
                <?php echo form_open('sadministrator/sadminLogin', array('class' => 'login100-form validate-form')); ?>
                  <span class="login100-form-title">
                    Login
                  </span>
                  <div class="col-md-12" style="margin-bottom: 20px;">
                    <?php if($this->session->flashdata('success')): ?>
                      <?php echo '<div class="alert alert-success icons-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fas icofont-close-line-circled"></i>
                      </button>
                      <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('danger')): ?>
                      <?php echo '<div class="alert alert-danger icons-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled"></i>
                      </button>
                      <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
                    <?php endif; ?>
                    <?php if(validation_errors() != null): ?>
                      <?php echo '<div class="alert alert-warning icons-alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled"></i>
                      </button>
                      <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
                    <?php endif; ?>
                        
                  </div>
                  <div class="wrap-input100 validate-input" data-bs-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="zmdi zmdi-email" aria-hidden="true"></i>
                    </span>
                  </div>
                  <div class="wrap-input100 validate-input" data-bs-validate = "Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="zmdi zmdi-lock" aria-hidden="true"></i>
                    </span>
                  </div>
                  <div class="text-end pt-1">
                    <p class="mb-0"><a href="#" class="text-primary ms-1">Forgot Password?</a></p>
                  </div>
                  <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn btn-primary">Login</button>
                    <!-- <a href="index.html" class="login100-form-btn btn-primary">
                      Login
                    </a> -->
                  </div>
                  <div class="text-center pt-3">
                    <p class="text-dark mb-0">Not a member?<a href="#" class="text-primary ms-1">Create an Account</a></p>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <div class="d-flex justify-content-center my-3">
                  <a href="javascript:void(0)" class="social-login  text-center me-4">
                    <i class="fa fa-google"></i>
                  </a>
                  <a href="javascript:void(0)" class="social-login  text-center me-4">
                    <i class="fa fa-facebook"></i>
                  </a>
                  <a href="javascript:void(0)" class="social-login  text-center">
                    <i class="fa fa-twitter"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- CONTAINER CLOSED -->
        </div>
      </div>
      <!-- End PAGE -->


    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="<?php echo base_url(); ?>assets/adminz/assets/js/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="<?php echo base_url(); ?>assets/adminz/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

    <!-- STICKY JS -->
    <script src="<?php echo base_url(); ?>assets/adminz/assets/js/sticky.js"></script>

    <!-- COLOR THEME JS -->
    <script src="<?php echo base_url(); ?>assets/adminz/assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="<?php echo base_url(); ?>assets/adminz/assets/js/custom.js"></script>
</body>
</html>
