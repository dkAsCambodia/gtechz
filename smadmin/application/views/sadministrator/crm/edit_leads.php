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
            <h1><?php echo $titlez; ?></h1>
          </div>
          <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a  class="btn-sm btn bg-info" href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a  class="btn-sm btn bg-warning" href="<?php echo site_url();?>staff/create-leads">Add Leads</a></li>
           <!--  <li class="breadcrumb-item"><a  class="btn-sm btn bg-info" href="<?php //echo site_url();?>staff/create-customers">Create Customer</a></li> -->
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/leads">List Leads</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="card card-default">

      <?php echo form_open_multipart('staff/update_leadsc'); ?>
      <input type="hidden" name="id" value="<?php echo $post['order_id']; ?>">
      <input type="hidden" name="mcreate_leads" id="mcreate_leads" value="<?php echo 1; //$post['id']; ?>">
    
                 
      <?php if($this->session->flashdata('success')): ?>
      <?php echo '<div class="alert alert-success  icons-alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times-circle"></i></button><p><strong>Success! &nbsp;&nbsp;</strong>'.$this->session->flashdata('success').'</p></div>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('danger')): ?>
      <?php echo '<div class="alert alert-danger icons-alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fas fa-times-circle"></i>
      </button><p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
      <?php endif; ?>

      <?php if(validation_errors() != null): ?>
      <?php echo '<div class="alert alert-warning icons-alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <i class="fas fa-times-circle"></i></button><p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
      <?php endif; ?>


      <div class="card-header">
        <h3 class="card-title"><?php echo $title; ?> </h3>

        <div class="card-tools">
              
        </div>
      </div>

        
      <div class="card-body" >
        <div class="row" >
          <!-- left column -->
          <div class="col-md-6" >
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customer Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!--<form class="form-horizontal">-->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label text-sm">Customer Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo $post['name']; ?>" required id="name" name="name" placeholder="Customer Name">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-sm">Email</label>
                    <div class="col-sm-8">
                      <input type="email" value="<?php echo $post['email']; ?>" class="form-control form-control-sm" name="email" id="email" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label text-sm">Mobile Number</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo $post['username'];  ?>" required id="username"  name="username"  placeholder="Mobile Number">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contact" class="col-sm-4 col-form-label text-sm">Alternate Contact</label>
                    <div class="col-sm-8">
                      <input class="form-control number form-control-sm" required value="<?php echo $post['contact'];  ?>" name="contact"  id="contact" placeholder="Alternate Contact" type="text">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label text-sm">Customer Address</label>
                    <div class="col-sm-8">

                      <textarea  class="form-control form-control-sm" required value="<?php echo $post['address'];  ?>" name="address"  id="address" placeholder="Address"><?php echo $post['address'];  ?></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="state" class="col-sm-4 col-form-label text-sm">State</label>
                    <div class="col-sm-8">
                      <input type="text" readonly required class="form-control form-control-sm" value="<?php echo $post['state'];  ?>" required id="state" name="state" placeholder="State">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="district" class="col-sm-4 col-form-label text-sm">District</label>
                    <div class="col-sm-8">

                      <select  name="district" name="district"  id="district" required class="form-control form-control-sm select2" style="width: 100%;">

                        <option value="">Select a District</option>
                        <option <?php if($post['district'] =="Thiruvananthapuram" ){ echo 'selected="selected"'; } ?> value="Thiruvananthapuram">Thiruvananthapuram </option>                                                           
                        <option <?php if($post['district'] =="Kollam" ){ echo 'selected="selected"'; } ?> value="Kollam">Kollam </option>                       
                        <option <?php if($post['district'] =="Alappuzha" ){ echo 'selected="selected"'; } ?> value="Alappuzha">Alappuzha </option>
                        <option <?php if($post['district'] =="Pathanamthitta" ){ echo 'selected="selected"'; } ?> value="Pathanamthitta">Pathanamthitta </option>
                        <option <?php if($post['district'] =="Kottayam" ){ echo 'selected="selected"'; } ?> value="Kottayam">Kottayam </option>                   
                        <option <?php if($post['district'] =="Idukki" ){ echo 'selected="selected"'; } ?> value="Idukki">Idukki </option>                        
                        <option <?php if($post['district'] =="Ernakulam" ){ echo 'selected="selected"'; } ?> value="Ernakulam">Ernakulam </option>               
                        <option <?php if($post['district'] =="Thrissur" ){ echo 'selected="selected"'; } ?> value="Thrissur">Thrissur </option>        
                        <option <?php if($post['district'] =="Palakkad" ){ echo 'selected="selected"'; } ?> value="Palakkad">Palakkad </option>                   
                        <option <?php if($post['district'] =="Malappuram" ){ echo 'selected="selected"'; } ?> value="Malappuram">Malappuram </option>             
                        <option <?php if($post['district'] =="Kozhikode" ){ echo 'selected="selected"'; } ?> value="Kozhikode">Kozhikode </option>               
                        <option <?php if($post['district'] =="Wayanadu" ){ echo 'selected="selected"'; } ?> value="Wayanadu">Wayanadu </option>               
                        <option <?php if($post['district'] =="Kannur" ){ echo 'selected="selected"'; } ?> value="Kannur">Kannur </option>               
                        <option <?php if($post['district'] =="Kasaragod" ){ echo 'selected="selected"'; } ?> value="Kasaragod">Kasaragod </option>                                                                  
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="location" class="col-sm-4 col-form-label text-sm">Location / Area</label>
                    <div class="col-sm-8">

                      <input type="text"  class="form-control form-control-sm" value="<?php echo $post['location'];  ?>" required id="location" name="location" placeholder="Location">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="landmark" class="col-sm-4 col-form-label text-sm">Landmark</label>
                    <div class="col-sm-8">
                      <input type="text"  class="form-control form-control-sm" value="<?php echo $post['landmark'];  ?>" required id="landmark" name="landmark" placeholder="Landmark">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="zipcode" class="col-sm-4 col-form-label text-sm">PinCode</label>
                    <div class="col-sm-8">
                      <input type="text"  class="form-control form-control-sm" value="<?php echo $post['zipcode'];  ?>" required id="zipcode" name="zipcode" placeholder="PinCode">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="referal" class="col-sm-4 col-form-label text-sm">Referred From</label>
                    <div class="col-sm-8">
                      
                      <select  name="referal"  id="referal" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Referal</option>

                        <option <?php if($post['referal'] =="Facebook Forms" ){ echo 'selected="selected"'; } ?> value="Facebook Forms">Facebook Forms</option>
                        <option <?php if($post['referal'] =="Whatsapp Forms" ){ echo 'selected="selected"'; } ?> value="Whatsapp Forms">Whatsapp Forms</option>
                        <option <?php if($post['referal'] =="Google Adwards Mail" ){ echo 'selected="selected"'; } ?> value="Google Adwards Mail">Google Adwards Mail</option>
                        <option <?php if($post['referal'] =="Customer Referal" ){ echo 'selected="selected"'; } ?> value="Customer Referal">Customer Referal</option>
                        <option <?php if($post['referal'] =="Showroom Call" ){ echo 'selected="selected"'; } ?> value="Showroom Call">Showroom Call</option>
                        <option <?php if($post['referal'] =="Direct Visit" ){ echo 'selected="selected"'; } ?> value="Direct Visit">Direct Visit</option>
                        <option <?php if($post['referal'] =="Website" ){ echo 'selected="selected"'; } ?> value="Website">Website</option>
                        
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="handledby" class="col-sm-4 col-form-label text-sm">Handled BY</label>
                    <div class="col-sm-8">
                      <input type="text" readonly  class="form-control form-control-sm" value="Candid Homes" required id="handledby" name="handledby" placeholder="Handled BY">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="requiredfor" class="col-sm-4 col-form-label text-sm">Required For</label>
                    <div class="col-sm-8">
                      <select name="requiredfor"  id="requiredfor" required class="form-control form-control-sm select2" style="width: 100%;">

                        <option value="">Select Required Type</option>
                        <option <?php if($post['requiredfor'] =="Home" ){ echo 'selected="selected"'; } ?> value="Home">Home</option> 

                        <option <?php if($post['requiredfor'] =="Office" ){ echo 'selected="selected"'; } ?> value="Office">Office</option>

                        <option <?php if($post['requiredfor'] =="Shop" ){ echo 'selected="selected"'; } ?> value="Shop">Shop</option>
                      </select>
                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="totarea" class="col-sm-4 col-form-label text-sm">Total Area (SqFt)</label>
                    <div class="col-sm-8">
                      <input type="text"  minlength="3" maxlength="6"  class="form-control form-control-sm number amc" value="<?php echo $post['totarea'];  ?>" required id="totarea" name="totarea" placeholder="Total Area Required">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="csuggesttime" class="col-sm-4 col-form-label text-sm">Customer Suggested Time</label>
                    <div class="col-sm-8">
                      <select  name="csuggesttime"  id="csuggesttime" required class="form-control form-control-sm select2" style="width: 100%;">

                        <option value="">Select Suggested Time</option>
                        <option <?php if($post['csuggesttime'] =="Morning" ){ echo 'selected="selected"'; } ?> value="Morning">Morning</option> 

                        <option <?php if($post['csuggesttime'] =="Afternoon" ){ echo 'selected="selected"'; } ?> value="Afternoon">Afternoon</option>

                        <option <?php if($post['csuggesttime'] =="Evening" ){ echo 'selected="selected"'; } ?> value="Evening">Evening</option>
                      </select>
                    </div>
                  </div>

                  
                   

                
                </div>
               
              <!--</form>-->

            </div>
            <!-- /.card card-primary Customer-->

          </div>
          <!-- left column Ends-->

          <!-- right column Starts-->
          <div class="col-md-6">
            <!-- Form leads information -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Leads Information</h3>
              </div>
              
                <!--<form class="form-horizontal">-->
                  <!-- /.card-body -->
                  <div class="card-body">

                     <div class="form-group row">
                      <label for="leadstatus" class="col-sm-4 col-form-label text-sm">Leads Status</label>
                      <div class="col-sm-8">
                        <select  name="leadstatus"  id="leadstatus" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Lead Status</option>


                        <option <?php if($post['leadstatus'] =="Lead Assigned" ){ echo 'selected="selected"'; } ?> value="Lead Assigned">Lead Assigned</option>

                        <option <?php if($post['leadstatus'] =="Lead In Pipeline" ){ echo 'selected="selected"'; } ?> value="Lead In Pipeline">Lead In Pipeline</option>
                        <option <?php if($post['leadstatus'] =="CPO Approval Pending" ){ echo 'selected="selected"'; } ?> value="CPO Approval Pending">CPO Approval Pending</option>
                        <option <?php if($post['leadstatus'] =="Meeting Proposed" ){ echo 'selected="selected"'; } ?> value="Meeting Proposed">Meeting Proposed</option>
                        <option <?php if($post['leadstatus'] =="Presentation Given" ){ echo 'selected="selected"'; } ?> value="Presentation Given">Presentation Given</option>
                        <option <?php if($post['leadstatus'] =="Order Created" ){ echo 'selected="selected"'; } ?> value="Order Created">Order Created</option>
                        <option <?php if($post['leadstatus'] =="Lead Cancelled" ){ echo 'selected="selected"'; } ?> value="Lead Cancelled">Lead Cancelled</option>
                      </select>
                      </div>
                    </div>

                    <div class="form-group row">

                      <label for="approachstatus" class="col-sm-4 col-form-label text-sm">Approach Status</label>

                      <div class="col-sm-8">

                        <select name="approachstatus" disabled  id="approachstatus" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Approach Status</option>

                        <option <?php if($post['approachstatus'] =="Appointment Confirmed" ){ echo 'selected="selected"'; } ?> value="Appointment Confirmed">Appointment Confirmed</option>                                                           
                        <option <?php if($post['approachstatus'] =="Appointment given to another vendor" ){ echo 'selected="selected"'; } ?> value="Appointment given to another vendor">Appointment given to another vendor</option>

                        <option <?php if($post['approachstatus'] =="Caller Not answered/Out of Reach/Switched off" ){ echo 'selected="selected"'; } ?> value="Caller Not answered/Out of Reach/Switched off">Caller Not answered/Out of Reach/Switched off</option>

                        <option <?php if($post['approachstatus'] =="Customer Finalized another product" ){ echo 'selected="selected"'; } ?> value="Customer Finalized another product">Customer Finalized another product</option>

                        <option <?php if($post['approachstatus'] =="Feels It Is Expensive" ){ echo 'selected="selected"'; } ?> value="Feels It Is Expensive">Feels It Is Expensive</option>                   
                        <option <?php if($post['approachstatus'] =="Franchise FIxed Re-Appointment" ){ echo 'selected="selected"'; } ?> value="Franchise FIxed Re-Appointment">Franchise FIxed Re-Appointment</option>

                        <option <?php if($post['approachstatus'] =="He said He Will visit Store" ){ echo 'selected="selected"'; } ?> value="He said He Will visit Store">He said He Will visit Store</option>

                        <option <?php if($post['approachstatus'] =="He Said will Call back" ){ echo 'selected="selected"'; } ?> value="He Said will Call back">He Said will Call back</option>


                        <option <?php if($post['approachstatus'] =="Looking Mesh Only/Service" ){ echo 'selected="selected"'; } ?> value="Looking Mesh Only/Service">Looking Mesh Only/Service</option>

                        <option <?php if($post['approachstatus'] =="Looking other products" ){ echo 'selected="selected"'; } ?> value="Looking other products">Looking other products</option>

                        <option <?php if($post['approachstatus'] =="Meeting Scheduled" ){ echo 'selected="selected"'; } ?> value="Meeting Scheduled">Meeting Scheduled</option>

                        <option <?php if($post['approachstatus'] =="Not Interested" ){ echo 'selected="selected"'; } ?> value="Not Interested">Not Interested</option>

                        <option <?php if($post['approachstatus'] =="Price Inquiry only" ){ echo 'selected="selected"'; } ?> value="Price Inquiry only">Price Inquiry only</option>               
                                                                                        
                      </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="pdate" class="col-sm-4 col-form-label text-sm">Scheduled Date</label>
                      <div class="col-sm-8">

                       <div class="input-group date" id="billdt2" data-target-input="nearest">
                          <input readonly disabled type="text" required name="pdate" id="pdate" value="<?php if(set_value('pdate')==""){echo date("d/m/Y h:i:s A", strtotime($post['pdate']));} else echo set_value('pdate');  ?>" class="form-control form-control-sm datetimepicker-input" data-target="#billdt2"/>
                          <div class="input-group-append" data-target="#billdt2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="meetorganized" class="col-sm-4 col-form-label text-sm">Meeting Organized</label>
                      <div class="col-sm-8">
                       <input type="text" readonly  required class="form-control form-control-sm" value="<?php echo $post['meetorganiz'];  ?>" required id="meetorganized" name="meetorganized" placeholder="Meeting Organized"> 
                        
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="custremarks" class="col-sm-4 col-form-label text-sm">Customer Remarks</label>
                      <div class="col-sm-8">
                        <textarea   class="form-control form-control-sm" required value="<?php echo $post['custremarks'];  ?>" name="custremarks" id="custremarks" placeholder="Customer Remarks" ><?php echo $post['custremarks'];  ?></textarea>
               
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="leadcordremarks" class="col-sm-4 col-form-label text-sm">Lead Coordinator Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['leadcordremarks'];  ?>"   required id="leadcordremarks" name="leadcordremarks" placeholder="Lead Coordinator Remarks">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inquiredfor" class="col-sm-4 col-form-label text-sm">Inquired For</label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['inquiredfor'];  ?>" required id="inquiredfor"  name="inquiredfor" placeholder="Inquired For">
                      </div>
                    </div>

                    

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label text-sm"  for="Product Category">Product Category</label>
                      <div class="col-sm-8">
                        <input  type="hidden" class="form-control"  value="<?php if($post['categoryname']!="") echo $post['categoryname'] ;  ?>"  id="categoryname" name="categoryname" placeholder="Enter Category">
                        <select  name="category" required id="category"  class="form-control form-control-sm  select2" style="width: 100%;">
                          <option value="">Select a Category</option>
                          <?php foreach ($maincategories as $categoryu) { ?>
                          <option <?php if($categoryu['id'] ==$post['cat_id']){ echo 'selected="selected"'; } ?> value="<?php echo $categoryu['id'] ?>"><?php echo $categoryu['name']?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label text-sm" for="subcategory">Product Sub Category</label>
                      <div class="col-sm-8">
                        <input  type="hidden" class="form-control" id="subcategoryid" value="<?php if($post['subcat_id']!="") echo $post['subcat_id'] ;  ?>" name="subcategoryid" placeholder="Enter Sub Category">

                        <input  type="hidden" class="form-control"  value="<?php if($post['subcategoryname']!="") echo $post['subcategoryname'] ;  ?>"  id="subcategoryname" name="subcategoryname" placeholder="Enter Sub Category">
                      
                        <select  name="subcategory" required  id="subcategory"  class="form-control form-control-sm select2" style="width: 100%;">
                 
                          <option value="">Select a Sub Category </option>set_select 
                          <option <?php if($post['subcat_id'] !="" ){ echo 'selected="selected"'; } ?> value="<?php echo $post['subcat_id'];  ?>"><?php echo $post['subcategoryname'];  ?></option>
                
                        </select>
                      </div>
                    </div>


                  
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label text-sm" for="product_name">Product Name</label>
                      <div class="col-sm-8">
                        <input  type="hidden" class="form-control form-control-sm" id="productid" value="<?php if($post['product_id']!="") echo $post['product_id'] ;  ?>" name="productid" placeholder="Enter productid">
                        <input  type="hidden" class="form-control form-control-sm"  value="<?php if($post['product_name']!="") echo $post['product_name'] ;  ?>"  id="productname" name="productname" placeholder="Enter Sub Category">
                        <select  name="product_name" required  id="product_name"  class="form-control form-control-sm select2" style="width: 100%;">
                 
                          <option value="">Select a Product </option>set_select 
                          <option <?php if($post['product_id'] !="" ){ echo 'selected="selected"'; } ?> value="<?php echo $post['product_id'];  ?>"><?php echo $post['product_name'];  ?></option>
                
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inquiryassigned" class="col-sm-4 col-form-label text-sm">Inquiry Assigned Level</label>
                      <div class="col-sm-8">
                        <input type="text" readonly  class="form-control form-control-sm" value="<?php echo $post['inquiryassigned']; ?>" required name="inquiryassigned" id="inquiryassigned" placeholder="Inquiry Assigned Level">
                      </div>
                    </div>

                   
                    <div class="form-group row">
                      <label for="inquryassigneduser" class="col-sm-4 col-form-label text-sm">Inquiry Assigned User</label>

                      <div class="col-sm-8">
                        <input  type="hidden" class="form-control"  value="<?php if($post['inquryassigneduser']!="") echo $post['inquryassigneduser'] ;  ?>"  id="inquryassignedusername" name="inquryassignedusername" placeholder="Enter Inquiry Assigned User">
                        <select  name="inquryassigneduser" required id="inquryassigneduser" class="form-control form-control-sm select2" style="width: 100%;">
                          <option value="">Select Assigned User</option>
                          <?php foreach ($staffs as $staffsu) { ?>
                          <option <?php if($staffsu['user_id'] ==$post['inquryassigneduserid']){ echo 'selected="selected"'; } ?> value="<?php echo $staffsu['user_id'] ?>"><?php echo $staffsu['name']?> </option>
                          <?php } ?>


                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="executivename" class="col-sm-4 col-form-label text-sm">Executive Name</label>
                      <div class="col-sm-8">
                        <input type="hidden" readonly class="form-control"  value="<?php if($post['executivename']!="") echo $post['executivename'] ;  ?>"  id="executivenamez" name="executivenamez" placeholder="Enter Executive Name">

                        <select disabled name="executivename"  id="executivename" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Executive Name</option>

                         <?php foreach ($staffs as $staffsu) { ?>
                          <option <?php if($staffsu['user_id'] ==$post['executivenameid']){ echo 'selected="selected"'; } ?> value="<?php echo $staffsu['user_id'] ?>"><?php echo $staffsu['name']?> </option>
                          <?php } ?>
                      </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="franchiseeremarks" class="col-sm-4 col-form-label text-sm">Franchisee Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $post['franchiseeremarks']; ?>" required id="franchiseeremarks" name="franchiseeremarks" placeholder="Franchisee Remarks">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="executivecontact" class="col-sm-4 col-form-label text-sm">Executive Contact</label>
                      <div class="col-sm-8">
                        <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['executivecontact'];  ?>"  required id="executivecontact" name="executivecontact" placeholder="Executive Contact">
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div> -->
                  <!-- /.card-footer -->
                <!--</form>-->
             
            </div>
            <!-- /.card Leads card-success-->
          </div>
          <!-- right column Ends-->

        </div>
        <!-- /.row -->

      </div>

      <!-- /.card-body -->
      

      <div class="card-footer">
        <button type="submit" class="btn btn-info">Save Lead</button>
        <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>staff/leads';return false;">Cancel</button>
                                                                
      </div>
      </form>
    </div>
          <!-- /.card card-default -->

  </div>
  <!-- /.container-fluid -->
</section>

</div>

