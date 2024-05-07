

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
               <li class="breadcrumb-item"><a  class="btn-sm btn bg-info" href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
          	  <li class="breadcrumb-item"><a  class="btn-sm btn bg-warning" href="<?php echo site_url();?>staff/create-vendors">Add Vendors</a></li>
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/vendors">List Vendors</a></li>
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
         
          <div class="card-header">
            <h3 class="card-title"><?php echo $title; ?> </h3>

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
          
          <?php echo form_open_multipart('staff/update_vendors'); ?>
          <input type="hidden" name="id" value="<?php echo $post['user_id']; ?>">
          <input type="hidden" name="mproduct_id" id="mproduct_id" value="<?php echo 1; ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Business/Firm/Brand Name</label>
                  <input class="form-control"  required value="<?php if(set_value('name')=="") echo $post['name']; else echo set_value('name');  ?>" name="name" placeholder="Business/Firm/Brand Name" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" required  value="<?php if(set_value('email')=="") echo $post['email']; else echo set_value('email');  ?>" name="email" placeholder="Email" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Mobile Number</label>
                  <input class="form-control number" required  value="<?php if(set_value('username')=="") echo $post['username']; else echo set_value('username');  ?>" name="username" placeholder="UserName/Mobile Number" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>State</label>
                  <input class="form-control"   value="<?php if(set_value('state')=="") echo $post['state']; else echo set_value('state');  ?>" name="state" placeholder="Taluk" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>District</label>
                  <input class="form-control"   value="<?php if(set_value('district')=="") echo $post['district']; else echo set_value('district');  ?>" name="district" placeholder="District" type="text">
                 
                </div>
                </div>
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>GSTN No: (Optional)</label>
                  <input class="form-control" value="<?php if(set_value('gstn')=="") echo $post['gstn']; else echo set_value('gstn');  ?>" name="gstn" placeholder="GSTN" type="text">
                 
                </div>
                </div>
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" value="<?php if(set_value('address')=="") echo $post['address']; else echo set_value('address');  ?>" name="address" placeholder="Address" type="text">
                 
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
           Please enter vendor info set a status for it.
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!--Name,Email,Username,Subsciption,Subsciption Amount,Pincode,Password-->
