

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
            <h1><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/account_dashboard'); ?>">Dashboard</a></li>
          	  <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/accounts/create-wallets">Add Payment Wallets</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url();?>administrator/accounts/wallets">List Payment Wallets</a></li>
           </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><?php echo $title; ?> Info</h3>

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
     
          <?php echo form_open_multipart('administrators/accounts/update_wallets'); ?>
          <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Gateway Name</label>
                  <input class="form-control" required  value="<?php if(set_value('wname')=="") echo $post['wname']; else echo set_value('wname');  ?>" name="wname" placeholder="Title" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                <div class="form-group">
                  <label>Gateway ID</label>
                  <input class="form-control"  required value="<?php if(set_value('number')=="") echo $post['number']; else echo set_value('number');  ?>" name="number" placeholder="Title" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                <div class="form-group">
                  <label>Gateway Query</label>
                  <input class="form-control"  required value="<?php if(set_value('qrcode')=="") echo $post['qrcode']; else echo set_value('qrcode');  ?>" name="qrcode" placeholder="Title" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                <div class="form-group">
                  <label>Created Date</label>
                    <input class="form-control" readonly   value="<?php echo $post['created_date']; ?>" name="type" placeholder="DateTime" type="text">
                </div>
                <!-- /.form-group -->
                
                
              </div>
                 <div class="col-md-6">
                <div class="form-group">
                  <label>Franchise/Admin - Unique ID  <a href="#">click here for find ID</a></label>
                  <input class="form-control" required  value="<?php if(set_value('franch_id')=="") echo $post['franch_id']; else echo set_value('franch_id'); ?>" name="franch_id" placeholder="Franchise Id" type="text">
                 
                </div>
                </div>
            
              
       
              
               <div class="col-md-6"> 
             <div class="form-group">
                    <label for="exampleInputFile">Upload Image </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="userfile" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"><?php if($post['lgo']!="") echo $post['lgo']; else echo "Choose file" ?></label>
                      </div>
                     <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>-->
                    </div>
                  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
                <div class="col-md-6">              
               	<div class="form-group">
                  <label>Select Status</label>
                  <select name="status" class="form-control select2" style="width: 100%;">
                    		<option <?php if($post['status'] ==1 ){ echo 'selected="selected"'; } ?> value="1">Active </option>

                                                                    <option value="">Select a Status</option>
                                                                    <option <?php if($post['status'] ==1 ){ echo 'selected="selected"'; } ?> value="1">Active</option>
                                                                    <option <?php if($post['status'] ==0 ){ echo 'selected="selected"'; } ?> value="0">Closed</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
                 <div class="col-md-6">              
               	<div class="form-group">
                  <label>Current Logo</label>
         
               
               <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                
                  
                   <a href="<?php echo base_url(); ?>assets/images/wallets/<?php echo $post['lgo'];?>" data-toggle="lightbox" data-title="<?php echo $post['wname']; ?>">
                  <img style="padding:10px" class="card-img-top img-fluid mb-2" src="<?php echo base_url(); ?>assets/images/wallets/<?php echo $post['lgo'];?>" alt="<?php echo base_url(); ?>assets/images/wallets/<?php echo $post['lgo']; ?>">
                  
                      </a>
                 
                </div>
              </div>
               
                </div>
                <!-- /.form-group -->
              </div>
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
           Please edit Payment Wallet Info with image with aspect ratio and set a status for it.
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

