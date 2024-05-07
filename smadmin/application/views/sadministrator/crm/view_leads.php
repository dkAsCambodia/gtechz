

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
            <h4><?php echo $title; ?></h4>
          </div>
          <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a  class="btn-sm btn bg-info" href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a  class="btn-sm btn bg-warning" href="<?php echo site_url();?>staff/create-leads">Add Leads</a></li>
           <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/leads">List Leads</a></li> 
           </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
        <!-- SELECT2 EXAMPLE -->
   <?php  //echo form_open_multipart('staff/edit_leads', array('id' => 'contactForm') )?>
  <?php echo form_open_multipart('staff/add-leadsfollowups'); ?>
    <div class="row">
      <div class="col-12">
         <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for generating Quotes, Measurements, Assign team for discussion with Leads. Then forward Leads to Order. 
         </div>

      <input type="hidden" name="mpurc_id" id="mpurc_id" value="<?php echo 1; //$post['id']; ?>">
      <input type="hidden" name="mpurcorder_id" id="mpurcorder_id" value="<?php echo $post['order_id']; ?>">
          <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title; ?></h3>
              
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!--<button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                  </button>-->
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <!-- <form>-->
               <!--<div class="fieldset">-->
          <div class="card-body"  style="margin: 0 !important; padding: 0 !important; border:0px solid transparent;">
        
          
            <div class="invoice p-3 mb-3"   style="border:0px solid transparent;">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h6>
                    <!--<i class="fas fa-globe"></i>-->
                    <img height="30px" width="30px" src="<?php echo base_url();?>assets/images/logo-small.png">
                      Customer Information.
                    <span class="float-right">Date: <?php echo date("d/m/Y h:i:s A", strtotime($post['created_date']));  ?></span>
                  </h6>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <?php echo $post['address_name'] ?>
                  <a class="btn btn-warning btn-xs enable"  target="_blank" href='<?php echo base_url(); ?>staff/view-address/<?php echo $post['user_id']; ?>'><i class="fas fa-edit">&nbsp;</i></a>
                  <address>
                    <strong><?php echo ucfirst($post['name']);?></strong><br>
                    <?php echo $post['door_no'] ?>,<br>
                     <?php echo $post['user_address'] ?><br>
                     <?php echo $post['landmark'].','.$post['pincode'] ?><br>
                    Phone: (+91) <?php echo $post['username'] ?><br>
                    Email: <?php echo $post['email'] ?><a class="btn btn-warning btn-xs enable"  target="_blank" href='<?php echo base_url(); ?>staff/edit_customers/<?php echo $post['user_id']; ?>'><i class="fas fa-edit">&nbsp;</i></a>
                  </address>
                </div>
                 <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Enquired For Product:
                  <a class="btn btn-warning btn-xs enable" href='<?php echo base_url(); ?>staff/view_leads/<?php echo $post['order_id']; ?>'><i class="fas fa-edit">&nbsp;</i></a>
                  <address>
                     <strong><?php echo ucfirst($post['product_name']);?></strong>(<?php echo ucfirst($post['catname']);?>-<?php echo ucfirst($post['subname']);?>)<br>
                    Total Area: <?php echo $post['totalarea'] ?> Sq.Ft<br>
                    Total Amount:  <?php echo "₹".$post['totalorg'] ?>/-<br>
                    <b>Payment Expected:</b>  <?php echo date("d/m/Y h:i:s A", strtotime($post['created_date']));  ?><br>
                    <b>Account:</b> <?php if($post['payment_method']==1) echo "Online"; else echo "COD"; ?>
                  </address>
                </div>
                <!-- /.col -->

                 <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Leads_ID:  #<?php echo $post['order_id'] ?>
                    
                     <a style="margin-left: 4.85em; padding-right: 1.3em; " target="_blank" class="btn btn-info btn-xs enable" href='<?php echo base_url(); ?>staff/view-leadsmeasurements/<?php echo $post['order_id']; ?>'><i class="fas fa-clipboard-list">&nbsp;Measurements</i></a>

                  </b><br>
                  <b>Assign To Order # 

                    <?php if($post['workstatus']==0){?>
                    <a style="margin-left: 2.9em; padding-right: 1em;" class="btn btn-info btn-xs enable" href='<?php echo base_url(); ?>staff/addtoorder/<?php echo $post['order_id']; ?>?table=<?php echo base64_encode('leads'); ?>'><i class="fas fa-shopping-cart">&nbsp; Assign Order</i></a>
                  <?php } else {?>

                  <a  style="margin-left: 2.85em; padding-right: 0.1em;" class="btn btn-warning btn-xs enable" href='<?php echo base_url(); ?>staff/view_orders/<?php echo $post['order_id']; ?>'><i class="fas fa-shopping-cart">&nbsp; Assigned Order</i></a>
                   <?php } ?>
                  </b><br>
                  <b>Generate Quotation # 

                  <a style="margin-left: 0.45em" target="_blank" class="btn btn-success btn-xs enable" href='<?php echo base_url(); ?>staff/view_quotes/<?php echo $post['order_id']; ?>'><i class="fas fa-eye">&nbsp;Generate Quote</i></a>
                </b><br>

                  <b>Cancel Lead # 

                     <?php if($post['status']==1){?>

                  <a style="margin-left: 5em; padding-right: 2em;" class="btn btn-danger btn-xs enable" href='<?php echo base_url(); ?>staff/desableleads/<?php echo $post['order_id']; ?>?table=<?php echo base64_encode('leads'); ?>'><i class="fas fa-trash">&nbsp;Cancel Lead</i></a>
                  <?php } else {?>
                  <a style="margin-left: 5em; padding-right: 2em;" class="btn btn-warning btn-xs enable" href='<?php echo base_url(); ?>staff/enableleads/<?php echo $post['order_id']; ?>?table=<?php echo base64_encode('leads'); ?>'><i class="fas fa-trash">&nbsp;Enable Lead</i></a>
                   <?php } ?>
                </b><br>                  
                </div>
                <!-- /.col -->

              </div>
              <!-- /.row invoice-info-->

              </div>
             <!-- /.invoice p-3 mb-3-->

           
          </div>
            <!-- /.card-body -->
        </div>
            <!-- /.card-primary -->
      </div>
      <!-- /.col -->


    <div class="col-md-12">
      <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Track FollowUps - Discussions</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
               <!--<button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>-->
            </div>
          </div>
            <!-- /.card-header -->


        <div class="card-body">

              <div class="row">
                  
                <div class="col-md-2">
                  <div class="form-group">
                  <label class="text-xs" >Select a Staff</label>
                  <select name="staffname" required id="staffname" class="form-control form-control-sm select2" style="width: 100%;">


                  <option value="">Select a Staff</option>
                  <?php foreach ($staffs as $staffsu) { ?>
                  <option <?php if($staffsu['user_id'] ==set_value('name')){ echo 'selected="selected"'; } ?> value="<?php echo $staffsu['user_id'] ?>"><?php echo $staffsu['name']?> </option>
                  <?php } ?>
          </select>

                  </select>
                  </div>
                </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                  <label class="text-xs" >Meeting/Discussion</label>
                   <input class="form-control form-control-sm" required  value="<?php //echo $post['subname']; ?>" name="meeting" 
                   id="meeting" placeholder="Meeting or Discussion Team" type="text">
                  </div>
                  <!-- /.form-group -->
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                  <label class="text-xs" >Online/Walkin</label>
                  <select name="online"  id="online" required class="form-control form-control-sm select2" style="width: 100%;">
                  <option value="">Select a Type</option> 
                  <option value="1">GoogleMeet</option> 
                  <option value="2">Whatsapp</option> 
                  <option value="3">Candid-Office</option> 
                  <option value="4">Customer-Home</option> 
                  <option value="5">Customer-Office</option> 
                  </select>
                  </div>
                </div>
               
                <div class="col-md-2">              
                  <div class="form-group">
                  <label class="text-xs" >Select Status</label>
                  <select name="shstatus" required  id="shstatus" class="form-control form-control-sm select2" style="width: 100%;">
                  <option value="">Select a Status</option>
                  <option value="1">Scheduled</option>
                  <option value="0">Closed</option>
                  </select>
                  </div>
                  <!-- /.form-group -->
                </div>
              

                <div class="col-md-2">
                <div class="form-group">
                  <label class="text-xs">#Date</label>
                    <div class="input-group date" id="reservationdatetime2" data-target-input="nearest">
                        <input type="text" required name="start_date" id="start_date" value="" class="form-control form-control-sm datetimepicker-input" data-target="#reservationdatetime2"/>
                        <div class="input-group-append" data-target="#reservationdatetime2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                </div>
             

                <div class="col-sm-1">
                      <!-- text input -->
                      <div class="form-group">
                       <label class="text-xs" for="btnadd">&nbsp;</label>
                    <button type="submit" name="btnadd" id="btnadd" class="form-control text-xs form-control-sm btn-primary">Add</button>
                    
                     </div>
                </div>
                <div class="col-sm-1">
                      <!-- text input -->
                      <div class="form-group">
                       <label class="text-xs" for="btnclear">&nbsp;</label>
                    <button type="button" name="btnclear"  id="btnclear" class="form-control text-xs form-control-sm btn-warning">Clear</button>
                    
                     </div>
                </div>

              </div>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                                        <th>Id</th>
                                        <th>Staff</th>
                                        <th>Meeting</th>
                                        <th>Place</th>
                                        <th>Status</th>
                                        <th>CreatedDate</th>
                                        <th>Action</th>
                    
                    </tr>
                  </thead>
                    <tbody>
                    <?php $j=1; foreach($leadsfollowups as $leadsfollowup) : ?>
                                  <tr>
                                       
                                       <td  align="left" ><small><?php echo $j++;//$post['user_id']; ?></small></td>
                                       <td  align="left" ><small><?php echo $leadsfollowup['staff_name']; ?></small></td>
                                       <td  align="left" ><small><?php echo $leadsfollowup['meeting']; ?></small></td>
                                       <td  align="left" ><small>
                                        <?php if($leadsfollowup['online']==1) echo 'GoogleMeet';
                                              else if($leadsfollowup['online']==2)echo 'Whatsapp';
                                              else if($leadsfollowup['online']==3)echo 'Candid-Office';
                                              else if($leadsfollowup['online']==4)echo 'Customer-Home';
                                              else if($leadsfollowup['online']==5)echo 'Customer-Office';
                                         ?></small></td>
                                       <td  align="left" ><small><?php if($leadsfollowup['status']==1) echo 'Scheduled';
                                              else echo 'Closed';?></small></td>

                                       <td><small><?php echo date("d/m/Y h:i:s A", strtotime($leadsfollowup['created_date']));  ?></small></td>
                                       
                                    
                                        <td  align="left"  ><small>
                                               

                                                <a class="btn btn-danger btn-sm enable" href='<?php echo base_url(); ?>staff/deleteleadsfollowup/<?php echo $leadsfollowup['id']; ?>'><i class="fas fa-trash"></i></a>
                                                
                                                  
                                       </small></td>
                                       
                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->
      
                  </tbody>
                  <tfoot>
                  <tr>
                                        <th>Id</th>
                                        <th>Staff</th>
                                        <th>Meeting</th>
                                        <th>Place</th>
                                        <th>Status</th>
                                        <th>CreatedDate</th>
                                        <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
        </div>

      </div>
    </div>


    </div>
      <!-- /.row -->
      </form>
          <div class="card-footer">
           <li>You can manage Followup, Customer, Product and can Generate Quotation. </li>
           <li>Once assigned to order, follow instructions in orders. </li>
          </div>

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

