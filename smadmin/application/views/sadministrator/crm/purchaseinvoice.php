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
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/leads">List leads</a></li>
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

          <input type="hidden" name="mupdate_purcbill" id="mupdate_purcbill" value="<?php echo 1; //$post['mproductedi_id']; ?>">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $titlez; ?> </h3>
              </div>
              <!-- /.card-header -->
                     
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped  text-sm">
                  <thead>
                  <tr>

 										<!--<th>Id</th>-->
                                        <th>Lead Id</th>
                                        <th>CPO ID</th>
                                        <th>Customer Name</th>
                                        <th>Supplier Name</th>
                                        <th>Recieved Quantity</th>
                                        <th>Recieved Date</th>
                                        <th>Status</th>
                                        <th>Generated PDF</th>
                                        <th>OG Bill</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                   <?php $i=1; foreach($posts as $post) : ?>
                                  <tr>

                                    
                                    
                                     <!-- d/m/Y h:i:s A; -->
                                      <td  align="left"><?php echo $post['order_id']; ?></td>
                                      <td  align="left"><?php if($post['id']!=""){echo $post['bill_no'];} else{echo "NIL";} ?></td>
                                      <td  align="left"><?php echo $post['name']; ?></td>
                                      <td  align="left"><?php echo $post['vendorname']; ?></td>
                                      <td  align="left"><?php echo $post['qnty']; ?></td>
                                      
                                      <td>
                                        <?php if($post['id']!="") { echo date("d/m/Y", strtotime($post['modified_date']));} else{echo "NA";}?></td>

                                      <td  align="left" width="100px"><?php echo $post['leadstatus']; ?></td>  

                                      <td  align="left" >

                                      
                                        <a class="text-danger" href='<?php echo base_url(); ?>staff/viewpurchase-invoice/<?php echo $post['order_id']; ?>/<?php echo $post['id']; ?>'><i class="fas fa-file-pdf"></i></a>

                                    
                                      </td>

                                      <td>
                                      

                                       <a class="text-primary" href='#modal-lg' data-toggle="modal" data-target="#modal-lg<?php echo $post['order_id'];?>"  data-product_id="<?php echo $post['order_id'];?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                                      
                                      </td>
                                      
                                    </tr>

                                    <div class="modal fade updsalespayfm" id="modal-lg<?php echo $post['order_id'];?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                      
                                     
                                      <?php  echo form_open_multipart('staff/update-purcbill', array('id' => 'basicform'.$post['order_id'], 'class'=>'updsalespay') )?>
                                        <input type="hidden" name="mpid" id="mpid" value="<?php echo $post['id']; ?>"> 
                                        <div class="modal-header">
                                          
                                          <h4 class="modal-title">Upload Original Purchase Invoice For ID - <?php echo $post['order_id'];?></h4>
                                          
                                                                                    
                                          <button type="button" class="close" data-dismiss="modal" id="modalBtn" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                          
                                        </div>
                                        <div class="modal-body">
                                          
                                          <p>Please Upload Original Purchase Invoice</p>
                                          <p id="" align="center" class="alert-success statusMsg"></p>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">OrderID</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['order_id']; ?>" required id="order_id" name="order_id" placeholder="OrderID">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="bill_no" class="col-sm-4 col-form-label text-sm">Bill ID</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo trim($post['bill_no']); ?>" required id="bill_no" name="bill_no" placeholder="Bill ID">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="userfile" class="col-sm-4 col-form-label text-sm">Upload</label>
                                                <div class="col-sm-8">
                                                 
                                                 <input type="file" accept="application/pdf" required id="userfile"  name="userfile" class="form-control form-control-sm">
                                                <!-- ,application/vnd.ms-excel" -->
                                                </div>
                                              </div>
                                              <?php if($post['image']!="") { ?>
                                              <div class="form-group row">
                                                <label for="image" class="col-sm-4 col-form-label text-sm">View Original Bill</label>
                                                <div class="col-sm-8">
                                                <a class="text-danger text-sm" target="_blank" href='<?php echo site_url();?>assets/images/purchase/<?php echo $post['image']; ?>'><i class="fas fa-file-pdf">&nbsp;&nbsp;Download </i></a>

                                               
                     
                                                </div>
                                              </div>
                                            <?php } ?>

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
                                           <button  type="submit"  id="btn_update"  class="btn btn-info">Upload File</button>
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
                 					              <th>Lead Id</th>
                                        <th>CPO ID</th>
                                        <th>Customer Name</th>
                                        <th>Supplier Name</th>
                                        <th>Recieved Quantity</th>
                                        <th>Recieved Date</th>
                                        <th>Status</th>
                                        <th>Generated PDF</th>
                                        <th>OG Bill</th>
                    
                  </tr>
                  </tfoot>
                </table>
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

