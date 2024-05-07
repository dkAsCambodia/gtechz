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
               
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/view-leadquotes">List Sales Orders</a></li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
<section class="content">
  <div class="container-fluid">


    <div class="card card-default">

      <?php echo form_open_multipart('staff/update-leadquotes-process'); ?>
      <input type="hidden" name="id" value="<?php echo $post['order_id']; ?>">
      <input type="hidden" name="mcreate_leadsquotes" id="mcreate_leads" value="<?php echo 1; //$post['id']; ?>">
           
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
                  <?php //var_dump($post); ?>
                  <div class="form-group row">
                    <label for="order_id" class="col-sm-4 col-form-label text-sm">Lead ID</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['order_id']; ?>" required id="order_id" name="order_id" placeholder="Lead ID">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="pdate" class="col-sm-4 col-form-label text-sm">Enquiry Date</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo date("d/m/Y", strtotime($post['pdate']));?>" required readonly id="pdate"  name="pdate"  placeholder="Enquiry Date">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label text-sm">Customer Name</label>
                    <div class="col-sm-8">
                      <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['name']; ?>" required id="name" name="name" placeholder="Customer Name">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label text-sm">Mobile Number</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo $post['username'];  ?>" required readonly id="username"  name="username"  placeholder="Mobile Number">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="address" class="col-sm-4 col-form-label text-sm">Customer Address</label>
                    <div class="col-sm-8">

                      <textarea  class="form-control form-control-sm" required value="<?php echo $post['address'].','.$post['location'].','.$post['district'].','.$post['landmark'].','.$post['zipcode'];  ?>" name="address" readonly id="address" placeholder="Address"><?php echo $post['address'].','.$post['location'].','.$post['district'].','.$post['landmark'].','.$post['zipcode'];  ?></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="cusshipping" class="col-sm-4 col-form-label text-sm">Shipping Address</label>
                    <div class="col-sm-8">
                      <input type="checkbox" checked disabled readonly required class="col-form-label" value="same" required id="cusshipping" name="cusshipping" placeholder="Shipping Addres">
                      Same as Above
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="custype" class="col-sm-4 col-form-label text-sm">Cusotmer Type</label>
                    <div class="col-sm-8">
                      
                      <input type="text" readonly required class="form-control form-control-sm" value="<?php echo $post['custype']; ?>" required id="custype" name="custype" placeholder="custype">
                        
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
                <h3 class="card-title">Supplier Information</h3>
              </div>
              
                <!--<form class="form-horizontal">-->
                  <!-- /.card-body -->
                  <div class="card-body">

                    <div class="form-group row">
                      <label for="ordertakenby" class="col-sm-4 col-form-label text-sm">Order Taken By</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $post['ordertakenby']; ?>" required id="ordertakenby" readonly name="ordertakenby" placeholder="Order Taken By">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="entitycateg" class="col-sm-4 col-form-label text-sm">Enitity Category</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" value="<?php echo $post['entitycateg']; ?>" required id="entitycateg" readonly name="entitycateg" placeholder="Enitity Category">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label text-sm" for="seller_id">Associated Entity</label>
                      <div class="col-sm-8">
                         <input type="hidden" class="form-control"  value="<?php if($post['entityaffili']!="") echo $post['entityaffili'] ;  ?>"  id="seller_name" name="seller_name" placeholder="Enter Seller Name">

                        <select name="seller_id" required id="seller_id"  class="form-control  form-control-sm select2" style="width: 100%;">
                        <option value="">Select supplier</option>
                        <?php foreach ($mainvendors as $categoryv) { ?>
                        <option <?php if($categoryv['user_id'] ==$post['vendor_id']){ echo 'selected="selected"'; } ?> value="<?php echo $categoryv['user_id'] ?>"><?php echo $categoryv['name']?> </option>
                          <?php } ?>
                        </select>       
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="salestype" class="col-sm-4 col-form-label text-sm">Sales Tax Type</label>

                      <div class="col-sm-8">

                        <select name="salestype"  id="salestype" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Sales Tax Type</option>

                        <option <?php if($post['salestype'] =="General Tax" ){ echo 'selected="selected"'; } ?> value="General Tax">General Tax</option>                                                                                                                         
                        </select>
                      </div>
                    </div>

                     <div class="form-group row">
                      <label for="firmname" class="col-sm-4 col-form-label text-sm">Firm Name</label>

                      <div class="col-sm-8">

                         <input type="text" readonly required class="form-control form-control-sm" value="<?php echo $post['firmname']; ?>" required id="firmname" name="firmname" placeholder="Firm Name"> 
                      </div>
                    </div>

                     <div class="form-group row">
                      <label for="firmaddress" class="col-sm-4 col-form-label text-sm">Firm Address</label>

                      <div class="col-sm-8">

                       <textarea  class="form-control form-control-sm" required value="Kurumbe Parambil Complex Ammadam,Peringottukara Rd,Kizhakkummuri Peringottukara,Thrissur, Kerala 680571" name="firmaddress" readonly id="firmaddress" placeholder="Firm Address">Kurumbe Parambil Complex Ammadam, Peringottukara Rd, Kizhakkummuri Peringottukara, Thrissur, Kerala 680571</textarea>
                      </div>
                    </div>

    

               

                    <div class="form-group row">
                      <label for="pdate" class="col-sm-4 col-form-label text-sm">Scheduled Date</label>
                      <div class="col-sm-8">

                       <div class="input-group date" id="billdt2" data-target-input="nearest">
                          <input type="text" required name="pdate" id="pdate" value="<?php if($post['dispatch_date']!=""){echo date("d/m/Y h:i:s A", strtotime($post['dispatch_date']));} else echo set_value('pdate');  ?>" class="form-control form-control-sm datetimepicker-input" data-target="#billdt2"/>
                          <div class="input-group-append" data-target="#billdt2" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>

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
      <!-- /.Generate List-->

          <div class="card">
              <div class="card-header" >
                <h3 class="card-title">Generate Product List </h3>
                <button type="button" class="float-right btn btn-primary btn-sm enable">Add</button>

              </div>
              <!-- /.card-header -->

                    
              <div class="card-body">
              <div class="table-responsive text-sm">
               
                <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" style="width:auto;" >
                  <thead  class="bg-info">
                  <tr>

                    <!--<th class="text-xs">Id</th>-->
                                        <th class="text-xs">#</th>
                                        <th class="text-xs">SL.NO</th>
                                        <th class="text-xs">Product.Name</th>
                                        <th class="text-xs">Width<br/>(CM)</th>
                                        <th class="text-xs">Height<br/>(CM)</th>
                                        <th class="text-xs">Qty<br/>(Nos)</th>
                                        <th class="text-xs">Unti Price</th>
                                        <th class="text-xs">Total SqFT</th>
                                        <th class="text-xs">Middle Input</th>
                                        <th class="text-xs">FrameType</th>
                                        <th class="text-xs">Frame Color</th>
                                        <th class="text-xs">Mesh Type</th>
                                        <th class="text-xs">Mesh Color</th>
                                        <th class="text-xs">HSN Code</th>
                                        <th class="text-xs">GST %</th>
                                        <th class="text-xs">Amount</th>
                                        <th class="text-xs">Add Amount</th>
                                        <th class="text-xs">Total Amount</th>
                                        <th class="text-xs">Remarks</th>
                                        <th class="text-xs">Action</th>
                                        
                    
                  </tr>
                  </thead>
                  <tbody class="text-xs">
                  
                                  
                                  <tr>
                                    
                                     <!-- d/m/Y h:i:s A; -->
                                      <td align="left" class="text-xs"><input type="checkbox" name="checking" ></td>
                                      <td align="left" class="text-xs"><?php echo "2";?></td>
                                      <td align="left" class="text-xs"><?php echo "3";?></td>
                                      <td align="left" class="text-xs"><?php echo "4";?></td>
                                      <td align="left" class="text-xs"><?php echo "5";?></td>
                                      <td align="left" class="text-xs"><?php echo "6";?></td>
                                      <td align="left" class="text-xs"><?php echo "7";?></td>
                                      <td align="left" class="text-xs"><?php echo "8";?></td>

                                      <td align="left" class="text-xs"><?php echo "9";?></td>
                                      <td align="left" class="text-xs"><?php echo "10";?></td>
                                      <td align="left" class="text-xs"><?php echo "11";?></td>
                                      <td align="left" class="text-xs"><?php echo "12";?></td>
                                      <td align="left" class="text-xs"><?php echo "13";?></td>
                                      <td align="left" class="text-xs"><?php echo "14";?></td>
                                      <td align="left" class="text-xs"><?php echo "15";?></td>
                                      <td align="left" class="text-xs"><?php echo "16";?></td>

                                      <td align="left" class="text-xs"><?php echo "17";?></td>
                                      <td align="left" class="text-xs"><?php echo "18";?></td>
                                      <td align="left" class="text-xs"><?php echo "19";?></td>
                                      <td align="left" class="text-xs"><?php echo "20";?></td>
                                     
                                    </tr>
                               

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->
      
                  </tbody>
                
                  <tfoot  class="text-xs">
                  <tr>

                                     <!--  1 cm=0.0328084 feet
                                      1 squarecm = 0.00107639 square feet
                                      round upto 3 digits after point -->

                                         
                                        <th class="text-xs">#</th>
                                        <th class="text-xs">SL.NO</th>
                                        <th class="text-xs">Product.Name</th>
                                        <th class="text-xs">Width<br/>(CM)</th>
                                        <th class="text-xs">Height<br/>(CM)</th>
                                        <th class="text-xs">Qty<br/>(Nos)</th>
                                        <th class="text-xs">Unti Price</th>
                                        <th class="text-xs">Total SqFT</th>
                                        <th class="text-xs">Middle Input</th>
                                        <th class="text-xs">FrameType</th>
                                        <th class="text-xs">Frame Color</th>
                                        <th class="text-xs">Mesh Type</th>
                                        <th class="text-xs">Mesh Color</th>
                                        <th class="text-xs">HSN Code</th>
                                        <th class="text-xs">GST %</th>
                                        <th class="text-xs">Amount</th>
                                        <th class="text-xs">Add Amount</th>
                                        <th class="text-xs">Total Amount</th>
                                        <th class="text-xs">Remarks</th>
                                        <th class="text-xs">Action</th>
                  </tr>
                  </tfoot>
                </table>
                
              </div>



              <!-- /.Tax Calculaiton -->
              <div class="row" >
                
                <!-- left column -->
                <div class="col-md-6" >
                  
                </div>
                <!-- left column -->

                <!-- right column -->
                <div class="col-md-6  bg-pink" >
                  Tax Calculaiton
                </div>
                <!-- right column -->
              </div>


              <!-- /.Tax Calculaiton -->



              </div>
              <!-- /.card-body -->
               
          </div>

      <!-- /.Generate List -->
      




      <div class="card-footer">
        <button type="submit" class="btn btn-info">Submit</button>
        
        <button type="button" class="btn btn-warning"><?php if ($post['authorise']==1) echo "Authorised"; else echo "Authorise";?></button>
        
       
        <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>staff/view-leadquotes';return false;">Cancel</button>
                                                                
      </div>
      </form>
    </div>
      <!-- /.card card-default -->


  </div>
  <!-- /.container-fluid -->

</section>

</div>

