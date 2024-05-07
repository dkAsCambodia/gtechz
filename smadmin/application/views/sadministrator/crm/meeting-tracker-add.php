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
           <!--  <li class="breadcrumb-item"><a  class="btn-sm btn bg-info" href="<?php //echo site_url();?>staff/create-customers">Create Customer</a></li> -->
               <?php if(empty($post)){ //echo "emty";?>
               <?php } else { ?>
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/meetingstracker/<?php echo $post['order_id'];?>">List MeetingTracker</a></li>
              <?php } ?>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
<section class="content">
  <div class="container-fluid">
<?php if(empty($post)){ echo "No Data Available";?>
<?php } else { ?>

    <div class="card card-default">

      <?php echo form_open_multipart('staff/meeting_tracker_update'); ?>
      <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
      <input type="hidden" name="orderid" value="<?php echo $post['order_id']; ?>">
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
                      <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['name']; ?>" required id="name" name="name" placeholder="Customer Name">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-sm">Email</label>
                    <div class="col-sm-8">
                      <input type="email" readonly value="<?php echo $post['email']; ?>" class="form-control form-control-sm" name="email" id="email" placeholder="Email">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label text-sm">Mobile Number</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo $post['username'];  ?>" required readonly id="username"  name="username"  placeholder="Mobile Number">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contact" class="col-sm-4 col-form-label text-sm">Alternate Contact</label>
                    <div class="col-sm-8">
                      <input class="form-control number form-control-sm" required value="<?php echo $post['contact'];  ?>" name="contact" readonly id="contact" placeholder="Alternate Contact" type="text">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label text-sm">Customer Address</label>
                    <div class="col-sm-8">

                      <textarea  class="form-control form-control-sm" required value="<?php echo $post['address'];  ?>" name="address" readonly id="address" placeholder="Address"><?php echo $post['address'];  ?></textarea>
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

                      <select disabled name="district" name="district"  id="district" required class="form-control form-control-sm select2" style="width: 100%;">

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

                      <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['location'];  ?>" required id="location" name="location" placeholder="Location">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="landmark" class="col-sm-4 col-form-label text-sm">Landmark</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['landmark'];  ?>" required id="landmark" name="landmark" placeholder="Landmark">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="zipcode" class="col-sm-4 col-form-label text-sm">PinCode</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['zipcode'];  ?>" required id="zipcode" name="zipcode" placeholder="PinCode">
                    </div>
                  </div> 
                  <div class="form-group row">
                      <label for="executivename" class="col-sm-4 col-form-label text-sm">Executive Name</label>
                      <div class="col-sm-8">
                        <input readonly type="hidden" class="form-control"  value="<?php if($post['executivename']!="") echo $post['executivename'] ;  ?>"  id="executivenamez" name="executivenamez" placeholder="Enter Executive Name">
                        <input readonly type="hidden" class="form-control"  value="<?php if($post['executivenameid']!="") echo $post['executivenameid'] ;  ?>"  id="executivenameid" name="executivenameid" placeholder="Enter Executive Name">

                        <select disabled name="executivename"  id="executivename" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Executive Name</option>

                         <?php foreach ($staffs as $staffsu) { ?>
                          <option <?php if($staffsu['user_id'] ==$post['executivenameid']){ echo 'selected="selected"'; } ?> value="<?php echo $staffsu['user_id'] ?>"><?php echo $staffsu['name']?> </option>
                          <?php } ?>
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
                <h3 class="card-title">Meeting Process-
                  <?php if($post['id']>0) echo " Edit Comment";  else echo " Add Comment";?></h3>
              </div>
              
                <!--<form class="form-horizontal">-->
                  <!-- /.card-body -->
                  <div class="card-body">

                    <div class="form-group row">
                      <label for="inquiredfor" class="col-sm-4 col-form-label text-sm">Inquired For</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $post['inquiredfor'];  ?>" required id="inquiredfor" readonly name="inquiredfor" placeholder="Inquired For">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label text-sm" for="product_name">Product Name</label>
                      <div class="col-sm-8">
                        <input readonly type="hidden" class="form-control form-control-sm" id="productid" value="<?php if($post['product_id']!="") echo $post['product_id'] ;  ?>" name="productid" placeholder="Enter productid">
                        <input readonly type="hidden" class="form-control form-control-sm"  value="<?php if($post['product_name']!="") echo $post['product_name'] ;  ?>"  id="productname" name="productname" placeholder="Enter Sub Category">
                        <select disabled name="product_name" required  id="product_name"  class="form-control form-control-sm select2" style="width: 100%;">
                 
                          <option value="">Select a Product </option>set_select 
                          <option <?php if($post['product_id'] !="" ){ echo 'selected="selected"'; } ?> value="<?php echo $post['product_id'];  ?>"><?php echo $post['product_name'];  ?></option>
                
                        </select>
                      </div>
                    </div>

    

                    <div class="form-group row">
                      <label for="meetorganized" class="col-sm-4 col-form-label text-sm">Meeting Organized
                      </label>
                      <div class="col-sm-8">
                       <input type="text" readonly required class="form-control form-control-sm" value="<?php echo $post['meetorganiz'];  ?>" required id="meetorganized" name="meetorganized" placeholder="Meeting Organized"> 
                        
                      </div>
                    </div>


          
                  <div class="form-group row">
                      <label for="leadstatus" class="col-sm-4 col-form-label text-sm">Leads Status</label>
                      <div class="col-sm-8">
                        <select disabled name="leadstatus"  id="leadstatus" required class="form-control form-control-sm select2" style="width: 100%;">
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
                      <label for="mmeetingresult" class="col-sm-4 col-form-label text-sm">Meetings Result</label>
                      <div class="col-sm-8">

                        <select name="mmeetingresult"  id="mmeetingresult" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Meetings Result</option>

                        <option <?php if($post['mmeetingresult'] =="Meeting/Visit Done" ){ echo 'selected="selected"'; } ?> value="Meeting/Visit Done">Meeting/Visit Done</option>

                        <option <?php if($post['mmeetingresult'] =="Meeting/Visit Cancelled" ){ echo 'selected="selected"'; } ?> value="Meeting/Visit Cancelled">Meeting/Visit Cancelled</option>
                        <option <?php if($post['mmeetingresult'] =="Meeting/Visit Postponed" ){ echo 'selected="selected"'; } ?> value="Meeting/Visit Postponed">Meeting/Visit Postponed</option>
                        <option <?php if($post['mmeetingresult'] =="Meeting/Visit Processing" ){ echo 'selected="selected"'; } ?> value="Meeting/Visit Processing">Meeting/Visit Processing</option>


                      </select>
               
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="mprestatus" class="col-sm-4 col-form-label text-sm">Presentation Status</label>
                      <div class="col-sm-8">
                     
                       <select name="mprestatus"  id="mprestatus" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Presentation Status</option>

                        <option <?php if($post['mprestatus'] =="Presentation Given" ){ echo 'selected="selected"'; } ?> value="Presentation Given">Presentation Given</option>

                         <option <?php if($post['mprestatus'] =="Presentation Processing" ){ echo 'selected="selected"'; } ?> value="Presentation Processing">Presentation Processing</option>

                          <option <?php if($post['mprestatus'] =="Presentation Not Given" ){ echo 'selected="selected"'; } ?> value="Presentation Not Given">Presentation Not Given</option>

                           <option <?php if($post['mprestatus'] =="Presentation Not Interested" ){ echo 'selected="selected"'; } ?> value="Presentation Not Interested">Presentation Not Interested</option>



                       
                      </select>
               
               
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="mccustremarks" class="col-sm-4 col-form-label text-sm">CustomerCare Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $post['mccustremarks'];  ?>" required id="mccustremarks" name="mccustremarks" placeholder="CustomerCare Remarks">
               
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="mcustremarks" class="col-sm-4 col-form-label text-sm">Customer Remarks</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $post['mcustremarks'];  ?>" required id="mcustremarks" name="mcustremarks" placeholder="Customer Remarks">
               
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="mcomments" class="col-sm-4 col-form-label text-sm">Comments</label>
                      <div class="col-sm-8">
                        <textarea  class="form-control form-control-sm" required value="<?php echo $post['mcomments'];  ?>" name="mcomments" id="mcomments" placeholder="Comments"><?php echo $post['mcomments'];  ?></textarea>
               
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="mstatus" class="col-sm-4 col-form-label text-sm">Status</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?php if($post['mstatus']==1){echo "ACTIVE";}else{echo "CLOSED";}   ?>" required id="mstatus" readonly name="mstatus" placeholder="Status">
                        
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="approachstatus" class="col-sm-4 col-form-label text-sm">Approach Status</label>

                      <div class="col-sm-8">

                        <select disabled name="approachstatus"  id="approachstatus" required class="form-control form-control-sm select2" style="width: 100%;">
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
        <button type="submit" class="btn btn-info">Update Meeting</button>
        <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>staff/leads';return false;">Cancel</button>
                                                                
      </div>
      </form>
    </div>
      <!-- /.card card-default -->

    <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $titlez; ?> </h3>
              </div>
              <!-- /.card-header -->
                     
              <div class="card-body">
                <?php if($post['id']>0) {?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <!--<th>Id</th>-->
                                        <th>Meeting Id</th>
                                        <th>Asigned Date</th>
                                        <th>Meeting Result</th>
                                        <th>CustomerCare Remarks</th>
                                        <th>Presentation Status</th>
                                        <th>Lead_Status</th>
                                        <th>Comments</th>
                                        <th>Updated Date</th>
                                        
                    
                  </tr>
                  </thead>
                  <tbody>
                  
                                  
                                  <tr>
                                    
                                     <!-- d/m/Y h:i:s A; -->
                                      <td  align="left" ><?php echo $post['id']; ?></td>
                                      <td><?php echo date("d/m/Y", strtotime($post['mcreated_date'])); ?></td>
                                      <td  align="left" ><?php echo $post['mmeetingresult']; ?></td>
                                      <td  align="left" ><?php echo $post['mccustremarks']; ?></td>
                                      <td  align="left"><?php echo $post['mprestatus']; ?></td>
                                      <td  align="left"><?php echo $post['leadstatus']; ?></td>
                                      <td  align="left"><?php echo $post['mcomments']; ?></td>
                                      <td><?php echo date("d/m/Y", strtotime($post['mmodified_date']));  ?></td>  
                                    </tr>
                               

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->
      
                  </tbody>
                
                  <tfoot>
                  <tr>
                                        <th>Meeting Id</th>
                                        <th>Asigned Date</th>
                                        <th>Meeting Result</th>
                                        <th>CustomerCare Remarks</th>
                                        <th>Presentation Status</th>
                                        <th>Lead_Status</th>
                                        <th>Comments</th>
                                        <th>Updated Date</th>
                  </tr>
                  </tfoot>
                </table>
                <?php }else echo "No Data Available";?>
              </div>
              <!-- /.card-body -->
               
    </div>

  </div>
  <!-- /.container-fluid -->
  <?php } ?>
</section>

</div>

