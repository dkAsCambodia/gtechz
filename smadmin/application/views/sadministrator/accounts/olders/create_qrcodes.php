

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/dist/css/adminlte.min.css">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add QR Codes - UPI </h1>
          </div>
          <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/account_dashboard'); ?>">Dashboard</a></li>
          	  <li class="breadcrumb-item active"><a href="<?php echo site_url();?>administrator/accounts/create-qrcodes">Add QR Codes - UPI</a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/accounts/qrcodes">List QR Codes - UPI</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        
          <?php if($this->session->flashdata('success')): ?>
                                              <?php echo '<div class="alert alert-success  icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                           <i class="fas fa-times-circle"></i>
                                                        </button>
                                                        <p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
                                            <?php endif; ?>
                                            <?php if($this->session->flashdata('danger')): ?>
                                              <?php echo '<div class="alert alert-danger icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <i class="fas fa-times-circle"></i>
                                                        </button>
                                                        <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
                                            <?php endif; ?>

                                             <?php if(validation_errors() != null): ?>
                                              <?php echo '<div class="alert alert-warning icons-alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                           <i class="fas fa-times-circle"></i>
                                                        </button>
                                                        <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
                                            <?php endif; ?>
                                            
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add QR Codes - UPI </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          
           <?php echo form_open_multipart('administrator/accounts/create-qrcodes'); ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>QR Codes - UPI Name</label>
                  <input class="form-control" required name="wname" value="<?php echo set_value('wname'); ?>" placeholder="Payment Gateway Name" type="text">
                </div>
                </div>
                
                 <div class="col-md-6">
                <div class="form-group">
                  <label>QR Codes - UPI ID</label>
                  <input class="form-control" required name="number" value="<?php echo set_value('number'); ?>" placeholder="Payment Gateway Number" type="text">
                </div>
                </div>
                
                  <div class="col-md-6">
                <div class="form-group">
                  <label>QR Codes - UPI Query</label>
                  <input class="form-control" required name="qrcode" value="<?php echo set_value('qrcode'); ?>" placeholder="Payment Gateway Query" type="text">
                </div>
                </div>
                 <div class="col-md-6">
                <div class="form-group">
                  <label>Franchise/Admin - Unique ID  <a href="#">click here for find ID</a></label>
                  <input class="form-control" required  value="<?php echo set_value('franch_id'); ?>" name="franch_id" placeholder="Franchise Id" type="text">
                 
                </div>
                </div>
                 <div class="col-md-6"> 
             <div class="form-group">
                    <label for="exampleInputFile">Upload Image </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" required  name="userfile" required class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                     <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>-->
                    </div>
                  </div>
                <!-- /.form-group -->
              </div>
               
                <div class="col-md-6">              
               	<div class="form-group">
                  <label>Select Status</label>
                  <select name="status" required class="form-control select2" style="width: 100%;">
                   <option <?php  echo 'selected="selected"';  ?> required value=" <?php set_value('status'); ?>"> <?php echo set_value('status'); ?> </option>
                  
                    <option value="">Select a Status</option>
                    <option value="1">Active</option>
                    <option value="0">Closed</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            
              <!-- /.col -->
            </div>
            <!-- /.row -->

           <div class="form-group">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                                                                </button>
                                                            </div>
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
			</form>
          <div class="card-footer">
       Please enter QR Codes - UPI info image with aspect ratio and set a status for it.
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

