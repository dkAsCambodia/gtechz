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


<style type="text/css">
    .no-border{
    border: 0;
     box-shadow: none;
    -webkit-box-shadow: none;
   }
   .input:focus{
      border-color: inherit;
      -webkit-box-shadow: none;
      box-shadow: none;
   }
</style>
<?php
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    //$paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    $paise = ($decimal > 0) ? "" . ($words[(int)($decimal/10)*10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') .' and '. $paise;

}

?>
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

                        <select name="seller_id" disabled required id="seller_id"  class="form-control  form-control-sm select2" style="width: 100%;">
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

                        <select name="salestype" disabled  id="salestype" required class="form-control form-control-sm select2" style="width: 100%;">
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
                          <input type="text" readonly disabled required name="pdate" id="pdate" value="<?php if($post['dispatch_date']!=""){echo date("d/m/Y h:i:s A", strtotime($post['dispatch_date']));} else echo set_value('pdate');  ?>" class="form-control form-control-sm datetimepicker-input" data-target="#billdt2"/>
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
                <button type="button"  class="float-right btn btn-primary btn-sm enable"  onClick="window.location.href = '<?php echo base_url();?>staff/edited-quotes-process/<?php echo $post['order_id']; ?>/<?php echo $post['id']; ?>';return false;">Edit</button>

              </div>
              <!-- /.card-header -->

                    
              <div class="card-body">
              <div class="table-responsive text-sm">
               
                <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" style="width:auto;" >
                  <thead  class="bg-info">
                  <tr>

                    <!--<th class="text-xs">Id</th>-->
                                        <th class="text-xs">#SL.NO</th>
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
                  <?php $i=1; foreach($postd as $postq) : ?>
                                  
                                    <tr>
                                    
                                     <!-- d/m/Y h:i:s A; -->
                                    <!--  `pid`, `sales_id`, `pro_id`, `prod_name`, `hsn`, `bill_no`, `qnty`, `prodwidth`, `prodheight`, `prodsize`, `prodsizetotal`, `middle_input`, `sales_rate`, `purc`, `tax_per`, `tax_amount`, `dis_per`, `additional`, `total_amt`, `netamount`, `frametype`, `framecolor`, `meshtype`, `meshcolor`, `remarks` -->
                                      <td align="left" class="text-xs"><?php echo $i++;?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['prod_name'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['prodwidth'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['prodheight'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['qnty'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['sales_rate'];?></td>
                                      <td align="left" class="text-xs"><?php echo round($postq['prodsizetotal'],6);?></td>

                                      <td align="left" class="text-xs"><?php echo $postq['middle_input'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['frametype'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['framecolor'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['meshtype'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['meshcolor'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['hsn'];?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['tax_per'];?></td>
                                      <td align="left" class="text-xs"><?php echo round($postq['total_amt'],2);?></td>


                                      <td align="left" class="text-xs"><?php echo round($postq['additional'],2);?></td>
                                      <td align="left" class="text-xs"><?php echo round($postq['netamount'],2);?></td>
                                      <td align="left" class="text-xs"><?php echo $postq['remarks'];?></td>
                                      
                                      <td align="left" class="text-xs"><a class="text-primary" href='#modal-lg' data-toggle="modal" data-target="#modal-lg<?php echo $postq['pid'];?>"  data-product_id="<?php echo $postq['pid'];?>"><i class="fas fa-eye"></i></a></td>
                                     
                                    </tr>

                                    <div class="modal fade" id="modal-lg<?php echo $postq['pid'];?>">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          
                                          <h4 class="modal-title">Details View<?php echo $postq['pid'];?></h4>
                                          <button type="button" class="close" data-dismiss="modal" id="modalBtn" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p id="statusMsg" align="center" class="alert-success"></p>
                                          <p>You can change this only by making effect in CPO</p>
                                          <div class="row">
                                            <div class="col-sm-6">

                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Width (Cm)</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $postq['prodwidth']; ?>" required id="prodwidthcm" name="prodwidthcm" placeholder="Width (Cm)">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Width (Ft)</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo intval($postq['prodwidth'])*0.0328084; ?>" required id="prodwidthft" name="prodwidthft" placeholder="Width (Ft)">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Middele Input</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $postq['middle_input']; ?>" required id="middle_input" name="middle_input" placeholder="Middle_Input">
                                                </div>
                                              </div>


                                              
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Height (Cm)</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $postq['prodheight']; ?>" required id="prodheight" name="prodheight" placeholder="Height (Cm)">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Height (Ft)</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo intval($postq['prodheight'])*0.0328084; ?>" required id="prodheightft" name="prodheightft" placeholder="Height (Ft)">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Remarks</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $postq['remarks']; ?>" required id="remarks" name="remarks" placeholder="Remarks">
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                          <form name="basicform" id="basicform">

                                            
                                            <div class="form-group" id="submit_div">
                                              <div class="col-lg-6 col-lg-offset-3">
                                              </div>
                                            </div>
                                            <div class="form-group" id="next_div">
                                              <div class="col-lg-6 col-lg-offset-3">
                                              <!--<input class="btn btn-primary open" id="btn_updatez" type="button" value="Update" name="submit">-->
                                              </div>
                                            </div>

                                            <!-- <div class="form-group" id="submit_div">
                                            <div class="col-lg-6 col-lg-offset-3">
                                            <input class="btn btn-primary send_mail" type="button" value="Send Mail" name="submit">
                                            </div>
                                            </div>-->

                                          </form>
                                        </div>
                                        <!-- <div class="modal-footer justify-content-between"> -->
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                          <button hidden type="button"  id="btn_update"  class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                  <?php endforeach; ?>
                               

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->
      
                  </tbody>
                
                  <tfoot  class="text-xs">
                  <tr>

                                     <!--  1 cm=0.0328084 feet
                                      1 squarecm = 0.00107639 square feet
                                      round upto 3 digits after point -->

                                         
                                        <th class="text-xs">#SL.NO</th>
                                        <th colspan="12"></th>
                                       <!--  <th class="text-xs">Product.Name</th>
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
                                        <th class="text-xs">GST %</th> -->
                                        <th class="text-xs">TotalAmount</th>
                                        <th class="text-xs"><?php echo round($postq['tottotal'],2);  ?></th>
                                        <th class="text-xs"><?php echo round($postq['totaddi'],2);  ?></th>
                                        <th class="text-xs"><?php echo round($postq['totnet'],2);  ?></th>
                                        <th class="text-xs"></th>
                                        <th class="text-xs"></th>
                  </tr>
                  </tfoot>
                </table>
                
              </div>



              <!-- /.Tax Calculaiton -->
              <div class="row" style="margin-top: 20px;" >

                
                <!-- left column -->
                <div class="col-md-8" >
                  <div class="table-responsive text-sm">

                  <div class="form-group">
                    <table id="examplep3" class="table table-bordered table-hover  dataTable dtr-inline">
                      <thead  class="bg-info">
                        <tr>
                          <th class="text-xs">Package</th>
                          <th class="text-xs">Commision</th>
                          <th class="text-xs">Custom cost</th>
                          <th class="text-xs">Other cost</th>
                          <th class="text-xs bg-secondary">Rounded</th>
                          <th class="text-xs bg-secondary">Discount</th>
                    
                        </tr>
                      </thead>
                      <tbody>
                   
                        <tr>
                          <td class="text-xs"><?php echo $postm['packing'];  ?></td>
                          <td class="text-xs"><?php echo $postm['commission'];  ?></td>
                          <td class="text-xs"><?php echo $postm['cusotmcost'];  ?></td>
                          <td class="text-xs"><?php echo $postm['othercost'];  ?></td>
                          <td class="text-xs"><?php echo $postm['roudoffamt'];  ?></td>
                          <td class="text-xs"><?php echo $postm['totdiscount'];  ?></td>
               
                        </tr>
                        <!--   <tr> -->
                        <tr>
                          <!-- <td class="text-xs">Net Amount</td>-->
                          <td colspan="2" align="left" class="text-lg"  colspan="2">Net Amount: &nbsp;
                            <span class="text-danger"><strong><?php echo round($postm['netamount'],2);  ?></span></strong>
                          </td>
                          <td colspan="4"><span class="text-center" style="vertical-align: middle; "><?php echo ucwords(getIndianCurrency(floatval(round($postm['netamount'],2)))); ?></span>
                          </td>
                          <!--  Date &nbsp;<input size="10" type="text" floatval(round($postm['netamount'],2/>-->
                 
                          <!-- </td>
                  
                          </tr> -->
                        </tr>
                  
                
                      </tbody>
                      <tfoot>
              
                      </tfoot>
                    </table>
                  </div>
                  </div>
                  
                </div>
                <!-- left column -->

                <!-- right column -->
                <div class="col-md-4" >
                  
                  <div class="form-group">
                  <table id="examplep4" class="table table-bordered table-hover dataTable dtr-inline">
                  <thead  class="bg-warning">
                  <tr>
                    <th class="text-xs" colspan="4" align="right" style="text-align: right">
                      <strong>Amount</strong>
                    </th>
                    <th class="text-xs" colspan="4"  align="right" style="text-align: right">
                      <strong><?php echo round($postm['amount'],2);  ?>
                        
                      </strong>
                    </th>
                                   
                    
                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td class="text-xs" colspan="5">Transport Cost</td>
                    <td class="text-xs" colspan="1"><?php echo round($postm['freight'],2);  ?></td>
                    <td class="text-xs" colspan="1"><?php echo round($postm['freighttax'],2);  ?></td>
                    <td class="text-xs" colspan="1"><?php echo round($postm['freightot'],2);  ?></td>
                  
                  </tr>

                   
                  <tr>
                  <td class="text-xs" colspan="4"><strong>Grand Total</strong></td>
                  <td class="text-lg" colspan="4"><strong><?php echo round($postm['netamount'],2);  ?></strong></td>
                  
                  </tr>
                  
                 
                
          </tbody>
          <tfoot>
                      
          </tfoot>
          </table>
        </div>
                </div>
                <!-- right column -->
              </div>


              <!-- /.Tax Calculaiton -->



              </div>
              <!-- /.card-body -->
               
          </div>

      <!-- /.Generate List -->
      




      <div class="card-footer">
        <button type="submit" hidden class="btn btn-info">Submit</button>
        
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

