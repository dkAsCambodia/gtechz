  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/adminz/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminz/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminz/plugins/lightbox2/dist/css/lightbox.css">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

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
              <li class="breadcrumb-item active">
                 <a class="btn-sm btn bg-success" href='#modal-lgcreate' data-toggle="modal" data-target="#modal-lgcreate"  data-product_id="<?php echo $posts[0]['bill_no'];?>">Add Payments</a>
              </li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                                        
            <!-- /.card -->

            <div class="card">
        <input type="hidden" name="msalespayedi_id" id="msalespayedi_id" value="<?php echo 1; //$post['mproductedi_id']; ?>">
              <div class="card-header">
                <h3 class="card-title"><?php echo $titlez; ?> </h3>
              </div>
              <!-- /.card-header -->
                     
              <div class="card-body">
                <div class="row bg-info text-center mb-4">
                  <?php if($posts!=null){ ?>
                  <div class="col-md-3">

                    <span>Customer Name: </span><label for="Customer Name" class="col-form-label text-sm"><?php echo $posts[0]['name'];?></label>
                    
                  </div>
                  <div class="col-md-3">
                    <span>Total: </span><label for="Total" class="col-form-label text-sm"><?php if($posts[0]['netamount']!="" || $posts[0]['netamount']!="0") echo round($posts[0]['netamount'],2); else echo "0;"?></label>
                    
                  </div>
                  <div class="col-md-3">
                    <span> Total Paid: </span><label for="Total Paid" class="col-form-label text-sm"><?php if($posts[0]['totpaid']!="" || $posts[0]['totpaid']!="0") echo round($posts[0]['totpaid'],2); else echo "0;"?></label>

                   
                  </div>
                  <div class="col-md-3">
                    <span> Balance Amount: </span>
                    <label for="Balance Amount" class="col-form-label text-sm">
                      <?php //echo round(intval($posts[0]['netamount'])- intval($posts[0]['totpaid']),2) ;?>
                      <?php echo round($posts[0]['netamount']- $posts[0]['totpaid'],2) ;?>
                    </label>

                    
                  </div>

                  <?php } else{ echo "No Record Found"; } ?>
                </div> 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

 										
                                        <th>SL.NO</th>
                                        <th>PayMode</th>
                                        <th>Paid_Amount</th>
                                        <th>Remarks</th>
                                        <th>created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                                        
                                        
                    
                  </tr>
                  </thead>

                  <tbody>
                    
                   <?php $i=1; foreach($posts as $post) : ?>
                                  <tr>

                                    <?php  if($post['id']!=null) { ?>
                                    
                                     <!-- d/m/Y h:i:s A; -->
                                      <td  align="left"><?php  if($post['id']!=null) echo $i++; ?></td>
                                      <td  align="left"><?php if($post['id']!=null){ if($post['paymode']!=0){echo "Bank";} else if($post['paymode']!=1){echo "Cash";}}else{} ?></td>
                                      <td  align="left"><?php echo $post['paidamount']; ?></td>
                                      <td  align="left"><?php echo $post['remarks']; ?></td>
                                      
                                      <td>
                                        <?php  if($post['created_date']!="") { echo date("d/m/Y", strtotime($post['created_date']));} ?></td>
                                      <td>

                                        <?php  if($post['modified_date']!="") { echo date("d/m/Y", strtotime($post['modified_date']));}  ?></td>

                                      <td  align="left" >


                                        <?php if($post['id']!=null){ ?>
                                            <!--<a href="#" class="btn btn-danger btn-sm btn-delete"
                                           data-id="<?php //echo $post['bill_no'];?>">Delete</a>


                                      <a class="text-danger" href='<?php //echo base_url(); ?>staff/editsales-payments/<?php //echo $post['bill_no']; ?>/<?php //echo $post['id']; ?>'><i class="fas fa-arrow-alt-circle-right"></i></a> -->

                                       <a class="text-primary" href='#modal-lg' data-toggle="modal" data-target="#modal-lg<?php echo $post['id'];?>"  data-product_id="<?php echo $post['id'];?>"><i class="fas fa-arrow-alt-circle-right"></i></a>

                                       &nbsp;
                                      <a class="text-danger" target="_blank" href='<?php echo base_url(); ?>staff/viewsales-paymentspdf/<?php echo $post['bill_no']; ?>/<?php echo $post['id']; ?>'><i class="fas fa-file-pdf"></i></a> &nbsp;

                                        <?php } ?>


                                      </td>

                                    <?php }  else{ echo "No Data Available";} ?>
                                     
                                     
                                      
                                    </tr>

                                  <div class="modal fade updsalespayfm" id="modal-lg<?php echo $post['id'];?>">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                      
                                     
                                      <?php  echo form_open_multipart('staff/update-salespayment', array('id' => 'basicform'.$post['id'], 'class'=>'updsalespay') )?>
                                        <input type="hidden" name="mpid" id="mpid" value="<?php echo $post['id']; ?>"> 
                                        <div class="modal-header">
                                          
                                          <h4 class="modal-title">Payment Details ID - <?php echo $post['id'];?></h4>
                                          
                                          
                                          
                                          <button type="button" class="close" data-dismiss="modal" id="modalBtn" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                          
                                        </div>
                                        <div class="modal-body">
                                          
                                          <p>Please Edit Payment Recieved From Customer</p>
                                          <p id="" align="center" class="alert-success statusMsg"></p>
                                          <div class="row">
                                            <div class="col-sm-6">

                                              <div class="form-group row">
                                                <label for="cname" class="col-sm-4 col-form-label text-sm">Customer Name</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['name']; ?>" required id="cname" name="cname" placeholder="Customer Name">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="bill_no" class="col-sm-4 col-form-label text-sm">Bill ID</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['bill_no']; ?>" required id="bill_no" name="bill_no" placeholder="Bill ID">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="netamount" class="col-sm-4 col-form-label text-sm">Total Amount</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo round($post['netamount'],2); ?>" required id="netamount" name="netamount" placeholder="Total Amount">
                                                </div>
                                              </div>


                                              
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="form-group row">
                                                <label for="paymode" class="col-sm-4 col-form-label text-sm">PayMode</label>
                                                <div class="col-sm-8">
                                                 
                                                 <select name="paymode" class="form-control form-control-sm " style="width: 100%;">
                                                  <option value="">Select a Status</option>
                                                  <option <?php if($post['paymode'] ==1 ){ echo 'selected="selected"'; } ?> value="1">Bank</option>
                                                  <option <?php if($post['paymode'] ==0 ){ echo 'selected="selected"'; } ?> value="0">Cash</option>
                                                  </select>
                                                
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="paidamount" class="col-sm-4 col-form-label text-sm">Paid Amount</label>
                                                <div class="col-sm-8">
                                                <input type="number"  class="form-control form-control-sm number amc" value="<?php echo $post['paidamount']; ?>" required id="paidamount" name="paidamount" placeholder="Paid Amount">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="remarks" class="col-sm-4 col-form-label text-sm">Remarks</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" value="<?php echo $post['remarks']; ?>" required id="remarks" name="remarks" placeholder="Remarks">
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                          <!-- <form name="basicform" id="basicform">

                                            
                                            <div class="form-group" id="submit_div">
                                              <div class="col-lg-6 col-lg-offset-3">
                                              </div>
                                            </div>
                                            <div class="form-group" id="next_div">
                                              <div class="col-lg-6 col-lg-offset-3">
                                              <input class="btn btn-primary open" id="btn_updatez" type="button" value="Update" name="submit">
                                              </div>
                                            </div>

                                            <div class="form-group" id="submit_div">
                                            <div class="col-lg-6 col-lg-offset-3">
                                            <input class="btn btn-primary send_mail" type="button" value="Send Mail" name="submit">
                                            </div>
                                            </div>

                                          </form>-->
                                        </div>
                                        <!-- <div class="modal-footer justify-content-between"> -->

                                        <div class="modal-footer ">
                                           <button  type="submit"  id="btn_update"  class="btn btn-info">Save changes</button>
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                         
                                        </div>
                                      </form>
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
                  <tfoot>
                  <tr>
                                        <th>SL.NO</th>
                                        <th>PayMode</th>
                                        <th>Paid_Amount</th>
                                        <th>Remarks</th>
                                        <th>created</th>
                                        <th>Updated</th>
                                        <th>Action</th>
                    
                  </tr>
                  </tfoot>
                </table>

                  <!-- Modal Delete Product-->
    <form action="/productz/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Are you sure want to delete this product?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="text" name="product_id" class="productID"  id="productID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
              </div>
              <!-- /.card-body -->
               
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


                              

  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
 $(document).ready(function(){
        $(".delete").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });
$(document).ready(function(){
	alert('hi');
        $(".enable").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });

$(document).ready(function(){
        $(".disable").click(function(e){ alert('as');
            $this  = $(this);
            e.preventDefault();
            var url = $(this).attr("href");
            $.get(url, function(r){
                if(r.success){
                    $this.closest("tr").remove();
                }
            })
        });
    });

</script>
    <div class="modal fade" id="modal-lgcreate">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                      
                                     
                                      <?php  echo form_open_multipart('staff/create-salespayment', array('id' => 'basicformc'))?>
                                        <input type="hidden" name="mrpid" id="mrpid" value="<?php echo $posts[0]['bill_no']; ?>"> 
                                        <div class="modal-header">
                                          
                                          <h4 class="modal-title">Add Payment Information - <?php echo $posts[0]['bill_no'];?></h4>
                                          
                                          
                                          
                                          <button type="button" class="close" data-dismiss="modal" id="modalBtn" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                          
                                        </div>
                                        <div class="modal-body">
                                          
                                          <p>Please Add Payment Recieved From Customer</p>
                                          <p id="statusMsg" align="center" class="alert-success"></p>
                                          <div class="row">
                                            <div class="col-sm-6">

                                              <div class="form-group row">
                                                <label for="crname" class="col-sm-4 col-form-label text-sm">Customer Name</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $posts[0]['name']; ?>" required id="crname" name="crname" placeholder="Customer Name">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="crbill_no" class="col-sm-4 col-form-label text-sm">Bill ID</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $posts[0]['bill_no']; ?>" required id="crbill_no" name="crbill_no" placeholder="Bill ID">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="crnetamount" class="col-sm-4 col-form-label text-sm">Total Amount</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo round($posts[0]['netamount'],2); ?>" required id="crnetamount" name="crnetamount" placeholder="Total Amount">
                                                </div>
                                              </div>


                                              
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="form-group row">
                                                <label for="crpaymode" class="col-sm-4 col-form-label text-sm">PayMode</label>
                                                <div class="col-sm-8">
                                                 
                                                 <select name="crpaymode" required class="form-control form-control-sm " style="width: 100%;">
                                                  <option value="">Select a Status</option>
                                                  <option value="1">Bank</option>
                                                  <option value="0">Cash</option>
                                                  </select>
                                                
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="crpaidamount" class="col-sm-4 col-form-label text-sm">Paid Amount</label>
                                                <div class="col-sm-8">
                                                <input type="number"  class="form-control form-control-sm number amc" value="1" min="1"  required id="crpaidamount" name="crpaidamount" placeholder="Paid Amount">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="crremarks" class="col-sm-4 col-form-label text-sm">Remarks</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" value="" required id="crremarks" name="crremarks" placeholder="Remarks">
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                          <!-- <form name="basicform" id="basicform">

                                            
                                            <div class="form-group" id="submit_div">
                                              <div class="col-lg-6 col-lg-offset-3">
                                              </div>
                                            </div>
                                            <div class="form-group" id="next_div">
                                              <div class="col-lg-6 col-lg-offset-3">
                                              <input class="btn btn-primary open" id="btn_updatez" type="button" value="Update" name="submit">
                                              </div>
                                            </div>

                                            <div class="form-group" id="submit_div">
                                            <div class="col-lg-6 col-lg-offset-3">
                                            <input class="btn btn-primary send_mail" type="button" value="Send Mail" name="submit">
                                            </div>
                                            </div>

                                          </form>-->
                                        </div>
                                        <!-- <div class="modal-footer justify-content-between"> -->

                                        <div class="modal-footer ">
                                           <button  type="submit"  id="btn_create"  class="btn btn-info">Submit</button>
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                         
                                        </div>
                                      </form>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>

