

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
              <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
           <li class="breadcrumb-item active"><a href="<?php echo site_url();?>staff/orders">List Orders</a></li> 
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
  <?php echo form_open_multipart('staff/add-ordersfollowups'); ?>
    <div class="row">
      <div class="col-12">
         <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for generating Estimates, Assign Staff for Implemetation Process with Orders. Then forward Order to Invoice Billing. 
         </div>



   
      <input type="hidden" name="mpurc_id" id="mpurc_id" value="<?php echo 1; //$post['id']; ?>">
      <input type="hidden" name="mpurcorder_id" id="mpurcorder_id" value="<?php echo $post['orders_id']; ?>">
          <!-- general form elements -->
            <div class="card card-success">
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
                    <span class="float-right">Lead Date: <?php echo date("d/m/Y h:i:s A", strtotime($post['created_date']));  ?></span>
                  </h6>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <?php echo $post['address_name'] ?>
                  <address>
                    <strong><?php echo ucfirst($post['name']);?></strong><br>
                    <?php echo $post['door_no'] ?>,<br>
                     <?php echo $post['user_address'] ?><br>
                     <?php echo $post['landmark'].','.$post['pincode'] ?><br>
                    Phone: (+91) <?php echo $post['username'] ?><br>
                    Email: <?php echo $post['email'] ?>
                  </address>
                </div>
                 <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Enquired For Product:
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
                  <b class="float-left">Work Date:   <span class="text-info"> <?php echo date("d/m/Y h:i:s A", strtotime($post['created_date'])); ?></span></b><br>
                  <b>Order_ID:  # <span class="text-info"><?php echo $post['orders_id'] ?></span></b>
                  <b class="ml-5">Lead_ID:  #  <span class="text-info"><?php echo $post['order_id'] ?></span></b><br>
                  
                  <b>Assign Staff : 

                    <?php if($post['staff_id']==0){?>
                    <a style="margin-left: 3.7em; padding-right: 2.5em;" class="btn btn-info btn-xs enable" href='<?php echo base_url(); ?>staff/addtostaff/<?php echo $post['orders_id']; ?>?table=<?php echo base64_encode('leads'); ?>'><i class="fas fa-users">&nbsp; Assign Staff</i></a>
                  <?php } else {?>

                  <a  style="margin-left: 3.7em; padding-right: 1.5em;" class="btn btn-warning btn-xs enable" href='<?php echo base_url(); ?>staff/view_orders/<?php echo $post['orders_id']; ?>'><i class="fas fa-users">&nbsp; Assigned Staff</i></a>
                   <?php } ?>
                  </b><br>
                  <b>Generate Invoice # 

                  <a style="margin-left: 0.45em" target="_blank" class="btn btn-success btn-xs enable" href='<?php echo base_url(); ?>staff/view_estimates/<?php echo $post['orders_id']; ?>'><i class="fas fa-clipboard-list">&nbsp;Generate Estimate</i></a>
                </b><br>

                  <b>Cancel Order # 

                     <?php if($post['status']==1){?>

                  <a style="margin-left: 2.7em; padding-right: 2.4em;" class="btn btn-danger btn-xs enable" href='<?php echo base_url(); ?>staff/desableleads/<?php echo $post['orders_id']; ?>?table=<?php echo base64_encode('orders'); ?>'><i class="fas fa-trash">&nbsp;Cancel Order</i></a>
                  <?php } else {?>
                  <a style="margin-left: 2.7em; padding-right: 2.3em;" class="btn btn-warning btn-xs enable" href='<?php echo base_url(); ?>staff/enableleads/<?php echo $post['orders_id']; ?>?table=<?php echo base64_encode('orders'); ?>'><i class="fas fa-trash">&nbsp;Enable Order</i></a>
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
      <div class="card card-navy">
          <div class="card-header">
            <h3 class="card-title">Track Order - Implementation Process</h3>

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
                  </div>
                </div>
                
                <div class="col-md-2">
                  <div class="form-group">
                  <label class="text-xs" >Process Narration</label>
                   <input class="form-control form-control-sm" required  value="<?php //echo $post['subname']; ?>" name="meeting" 
                   id="meeting" placeholder="Process Narration" type="text">
                  </div>
                  <!-- /.form-group -->
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                  <label class="text-xs" >Work Type</label>
                  <select name="online"  id="online" required class="form-control form-control-sm select2" style="width: 100%;">
                  <option value="">Select a Type</option> 
                  <option value="1">Screwing</option> 
                  <option value="2">Cutting</option> 
                  <option value="3">Mason</option>
                  <option value="4">Helper</option>
                  <option value="5">Polish</option>
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
                    <button type="submit" name="btnadd" id="btnadd" class="form-control text-xs form-control-sm btn-danger">Add</button>
                    
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
                                        <th>Process</th>
                                        <th>Work Type</th>
                                        <th>Status</th>
                                        <th>ScheduleDate</th>
                                        <th>Action</th>
                    
                    </tr>
                  </thead>
                    <tbody>
                    <?php $j=1; foreach($ordersfollowups as $ordersfollowup) : ?>
                                  <tr>
                                       
                                       <td  align="left" ><small><?php echo $j++;//$post['user_id']; ?></small></td>
                                       <td  align="left" ><small><?php echo $ordersfollowup['staff_name']; ?></small></td>
                                       <td  align="left" ><small><?php echo $ordersfollowup['meeting']; ?></small></td>
                                       <td  align="left" ><small>

                                        <?php if($ordersfollowup['online']==1) echo 'Screwing';
                                              else if($ordersfollowup['online']==2)echo 'Cutting';
                                              else if($ordersfollowup['online']==3)echo 'Mason';
                                              else if($ordersfollowup['online']==4)echo 'Helper';
                                              else if($ordersfollowup['online']==5)echo 'Polish';
                                         ?></small></td>
                                       <td  align="left" ><small><?php if($ordersfollowup['status']==1) echo 'Scheduled';
                                              else echo 'Closed';?></small></td>

                                       <td><small><?php echo date("d/m/Y h:i:s A", strtotime($ordersfollowup['created_date']));  ?></small></td>
                                       
                                    
                                        <td  align="left"  ><small>
                                               

                                                <a class="btn btn-warning btn-xs enable" href='<?php echo base_url(); ?>staff/deleteordersfollowup/<?php echo $ordersfollowup['id']; ?>'><i class="fas fa-trash"></i></a>
                                                
                                                  
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
                                        <th>Process</th>
                                        <th>Work Type</th>
                                        <th>Status</th>
                                        <th>ScheduleDate</th>
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
           <li>Track Order - Implementation Process and can Generate Estimate. </li>
           <li>Once assigned to staff and Invoice, follow instructions in Billing. </li>
          </div>

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

