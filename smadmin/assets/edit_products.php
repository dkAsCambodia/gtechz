

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
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/seller_dashboard'); ?>">Dashboard</a></li>
          	  <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/sellers/create">Add Seller</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url();?>administrator/sellers">List Sellers</a></li>
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
          
          <?php echo form_open_multipart('administrators/sellers/update'); ?>
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
                  <label>UserName/Mobile Number</label>
                  <input class="form-control number" required  value="<?php if(set_value('username')=="") echo $post['username']; else echo set_value('username');  ?>" name="username" placeholder="UserName/Mobile Number" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Taluk</label>
                  <input class="form-control"   value="<?php if(set_value('taluk')=="") echo $post['taluk']; else echo set_value('taluk');  ?>" name="taluk" placeholder="Taluk" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>District</label>
                  <input class="form-control"   value="<?php if(set_value('location')=="") echo $post['location']; else echo set_value('location');  ?>" name="location" placeholder="District" type="text">
                 
                </div>
                </div>
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>GSTN No: (Optional)</label>
                  <input class="form-control" value="<?php if(set_value('education')=="") echo $post['education']; else echo set_value('education');  ?>" name="education" placeholder="GSTN" type="text">
                 
                </div>
                </div>
                <!-- 
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Firm Started From [DD/MM/YYYY] Format</label>
                  <input class="form-control" required value="<?php //if(set_value('dob')=="") echo $post['dob']; else echo set_value('dob');  ?>" name="dob" placeholder="Firm Started From" type="text">
                 
                </div>
                </div>
                -->
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Address</label>
                  <input class="form-control" value="<?php if(set_value('address')=="") echo $post['address']; else echo set_value('address');  ?>" name="address" placeholder="Address" type="text">
                 
                </div>
                </div>
                
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Your Features</label>
                  <input class="form-control" value="<?php if(set_value('profession')=="") echo $post['profession']; else echo set_value('profession');  ?>" name="profession" placeholder="Your Features" type="text">
                 
                </div>
                </div>
                
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Zipcode</label>
                  <input class="form-control number" required value="<?php if(set_value('zipcode')=="") echo $post['zipcode']; else echo set_value('zipcode');  ?>" name="zipcode" placeholder="Zipcode" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Subscription Mode</label>
                  <input class="form-control" readonly required value="FREE" name="subscri" placeholder="Subscription Mode" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                 <div class="form-group">
                  <label>Amount Payable</label>
                  <input class="form-control" required readonly value="0" name="subscriprice" placeholder="subscriprice" type="text">
                 
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
              
         
              
               <div class="col-md-6"> 
             <div class="form-group">
                    <label for="exampleInputFile">Upload Image </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  name="userfile" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"><?php if($post['image']!="") echo $post['image']; else echo "Choose file" ?></label>
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
                  <label>Current Password</label>
                    <input class="form-control" readonly   value="<?php echo $post['fpassword']; ?>" name="fpassword" placeholder="Password" type="text">
                </div>
                <!-- /.form-group -->
                
                
              </div>
                 <div class="col-md-6">              
               	<div class="form-group">
                  <label>Current Banner</label>
         
               
               <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  
                 
                 <a href="<?php echo site_url();?>../mayaveeapi/assets/images/sellers/<?php echo $post['image'];?>" data-toggle="lightbox" data-title="<?php echo $post['name']; ?>">
                  <img style="padding:10px" class="card-img-top img-fluid mb-2" src="<?php echo site_url();?>../mayaveeapi/assets/images/sellers/<?php echo $post['image'];?>" alt="<?php echo site_url();?>../mayaveeapi/assets/images/sellers/<?php echo $post['image']; ?>">
                  
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
           Please enter banner image with aspect ratio for slider and set a status for it.
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!--Name,Email,Username,Subsciption,Subsciption Amount,Pincode,Password-->
