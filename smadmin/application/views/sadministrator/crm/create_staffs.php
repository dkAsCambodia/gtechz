

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
          	  <li class="breadcrumb-item"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/create-staffs">Add Staffs</a></li>
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-pink" href="<?php echo site_url();?>staff//staffs">List Staffs</a></li> </ol>
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
          
          <?php echo form_open_multipart('staff/create_staffs'); ?>
       <input type="hidden" name="mproduct_id" id="mproduct_id" value="<?php echo 1; //$post['id']; ?>">
         
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Staff Name</label>
                  <input class="form-control"  required value="<?php echo set_value('name');  ?>" name="name" placeholder="Staff Name" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" required  value="<?php echo set_value('email');  ?>" name="email" placeholder="Email" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>UserName/Mobile Number</label>
                  <input class="form-control number" required  value="<?php echo set_value('username');  ?>" name="username" placeholder="UserName/Mobile Number" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Area</label>
                  <input class="form-control" required  value="<?php echo set_value('taluk');  ?>" name="taluk" placeholder="Area" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>District</label>
                  <select required name="location" class="form-control select2" style="width: 100%;">
          <option value="">Select a District</option>
          <option <?php if(set_value('location') =="Thiruvananthapuram" ){ echo 'selected="selected"'; } ?> value="Thiruvananthapuram"> Thiruvananthapuram</option>
         <option <?php if(set_value('location') =="Kollam" ){ echo 'selected="selected"'; } ?> value="Kollam">Kollam</option>
         <option <?php if(set_value('location') =="Alappuzha" ){ echo 'selected="selected"'; } ?> value="Alappuzha">Alappuzha</option>
         <option <?php if(set_value('location') =="Pathanamthitta" ){ echo 'selected="selected"'; } ?> value="Pathanamthitta"> Pathanamthitta</option>
         <option <?php if(set_value('location') =="Kottayam" ){ echo 'selected="selected"'; } ?> value="Kottayam">Kottayam</option>
         <option <?php if(set_value('location') =="Idukki" ){ echo 'selected="selected"'; } ?> value="Idukki">Idukki</option>
         <option <?php if(set_value('location') =="Ernakulam" ){ echo 'selected="selected"'; } ?> value="Ernakulam">Ernakulam</option>
         <option <?php if(set_value('location') =="Thrissur" ){ echo 'selected="selected"'; } ?> value="Thrissur">Thrissur</option>
         <option <?php if(set_value('location') =="Palakkad" ){ echo 'selected="selected"'; } ?> value="Palakkad">Palakkad</option>
         <option <?php if(set_value('location') =="Malappuram" ){ echo 'selected="selected"'; } ?> value="Malappuram">Malappuram</option>
         <option <?php if(set_value('location') =="Kozhikode" ){ echo 'selected="selected"'; } ?> value="Kozhikode">Kozhikode</option>
         <option <?php if(set_value('location') =="Wayanadu" ){ echo 'selected="selected"'; } ?> value="Wayanadu">Wayanadu</option>
         <option <?php if(set_value('location') =="Kannur" ){ echo 'selected="selected"'; } ?> value="Kannur">Kannur</option>
         <option <?php if(set_value('location') =="Kasaragod" ){ echo 'selected="selected"'; } ?> value="Kasaragod">Kasaragod</option> 
                                                                                                                              
                  </select>
                 
                </div>
                </div>
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Staff Identification No: (Optional)</label>
                  <input class="form-control" value="<?php echo set_value('education');  ?>" name="education" placeholder="Staff Identification No" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Joined From [DD/MM/YYYY] Format</label>
                  <input class="form-control" required value="<?php echo set_value('dob');  ?>" name="dob" placeholder="Joined From" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" required value="<?php echo set_value('address');  ?>" name="address" placeholder="Address" type="text">
                 
                </div>
                </div>
                
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Employee Type</label>
                  <select  name="profession" required class="form-control select2" style="width: 100%;">
                   		 		
                                                   			                         			
                                                           			

                                                           			<option value="">Select a type</option>
                                                                    <option <?php if(set_value('profession') =="ADMIN" ){ echo 'selected="selected"'; } ?>  value="ADMIN">ADMIN</option>
                                                                    <option <?php if(set_value('profession') =="FIELD EXECUTIVE" ){ echo 'selected="selected"'; } ?>  value="FIELD EXECUTIVE">FIELD EXECUTIVE</option>
                                                                    <option <?php if(set_value('profession') =="ACCOUNTS" ){ echo 'selected="selected"'; } ?>  value="ACCOUNTS">ACCOUNTS</option>
                                                                    <option <?php if(set_value('profession') =="OFFICE STAFF" ){ echo 'selected="selected"'; } ?>  value="OFFICE STAFF">OFFICE STAFF</option>
                                                                    
                  </select>
                 
                </div>
                </div>
                
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Pincode</label>
                  <input class="form-control number" required value="<?php echo set_value('zipcode');  ?>" name="zipcode" placeholder="Pincode" type="text">
                 
                </div>
                </div>
                
                
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Enter password</label>
                  <input class="form-control" required value="<?php echo set_value('password');  ?>" name="password" placeholder="Enter password" type="password">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Confirm Password</label>
                  <input class="form-control" required value="<?php echo set_value('cpassword');  ?>" name="cpassword" placeholder="Confirm password" type="password">
                 
                </div>
                </div>
                
           
                <div class="col-md-6">              
               	<div class="form-group">
                  <label>Select Status</label>
                  <select name="status" class="form-control select2" style="width: 100%;">
                    		 
                  <option value="">Select a Status</option>
                  <option <?php if(set_value('status') =="1" ){ echo 'selected="selected"'; } ?>  value="0">Active</option>
                  <option <?php if(set_value('status') =="0" ){ echo 'selected="selected"'; } ?>  value="1">Closed</option>
                    
                  </select>
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
           Please enter staff with required fields with aspect ratio for image and set a status for it.
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

