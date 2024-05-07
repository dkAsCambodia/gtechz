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
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/showroomrfp">List Finsihed Goods</a></li>
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
              <div class="card-header">
                <h3 class="card-title"><?php echo $titlez; ?><br/>
                </h3>

                
              </div>

              <div class="card-header">
                
                  
                <h3 class="card-title">   Sales Type : <span class="text-danger"><?php echo $postz['salestype']; ?></span></h3>
              </div>
              <!-- /.card-header -->
                     
               
               <div class="card-body">
                <div class="table-responsive text-sm"> 
                <table id="exampleshaj" class="table table-bordered table-hover dataTable dtr-inline">
                       <!-- <table id="exampleshaj" class="table table-bordered table-hover dataTable dtr-inline" style="width:auto;" > -->
                  <thead  class="bg-info">
                  <tr>

                    <!--<th class="text-xs">Id</th>-->
                                        <th class="text-xs">#</th>
                                        <th class="text-xs">SL.NO</th>
                                        <th class="text-xs">Product.Name</th>
                                        <th class="text-xs">SqFT</th>
                                        <th class="text-xs">Total_SqFT</th>
                                        <th class="text-xs">Unti_Price</th>
                                        <th class="text-xs">Frame_Type</th>
                                        <th class="text-xs">Frame_Color</th>
                                        <th class="text-xs">Mesh_Type</th>
                                        <th class="text-xs">Mesh_Color</th>
                                        <th class="text-xs">Qnty</th>
                                        <th class="text-xs">HSN_Code</th>
                                        <th class="text-xs">GST(%)</th>
                                        <th class="text-xs">Prod.Price</th>
                                        <th class="text-xs">Addon_Price</th>
                                        <th class="text-xs">Total_Amount</th>
                                        <th class="text-xs">Action</th>

                                        
                    
                  </tr>
                  </thead>
                   <!--               1 cm=0.0328084 feet
                                      1 squarecm = 0.00107639 square feet
                                      round upto 3 digits after point -->
                  <tbody class="text-xs">
                    <?php $i=1; foreach($posts as $post) : ?>
                                  
                                  <tr>
                                    

                                     <!-- d/m/Y h:i:s A; -->
                                      <td align="left" class="text-xs"><input type="checkbox" name="checking" ></td>
                                      <td align="left" class="text-xs"><?php echo $i++;?></td>
                                      <td align="left" class="text-xs"><?php echo $post['prod_name'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['prodsize'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['prodsizetotal'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['purc'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['frametype'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['framecolor'];?></td>

                                      <td align="left" class="text-xs"><?php echo $post['meshtype'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['meshcolor'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['qnty'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['hsn'];?></td>
                                      <td align="left" class="text-xs"><?php echo $post['tax_per'];?></td>
                                      <td align="left" class="text-xs"><?php echo round($post['purctotal_amt'],2);?></td>
                                      <td align="left" class="text-xs"><?php echo round($post['additional'],2);?></td>
                                      <td align="left" class="text-xs"><?php echo round($post['purcnetamount'],2);?></td>
                                      <td align="left" class="text-xs"><a class="text-primary" href='#modal-lg' data-toggle="modal" data-target="#modal-lg<?php echo $post['pid'];?>"  data-product_id="<?php echo $post['pid'];?>"><i class="fas fa-arrow-alt-circle-right"></i></a></td>
                                     
                                  </tr>
                                  <div class="modal fade" id="modal-lg<?php echo $post['pid'];?>">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          
                                          <h4 class="modal-title">Details View<?php echo $post['pid'];?></h4>
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
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['prodwidth']; ?>" required id="prodwidthcm" name="prodwidthcm" placeholder="Width (Cm)">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Width (Ft)</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo intval($post['prodwidth'])*0.0328084; ?>" required id="prodwidthft" name="prodwidthft" placeholder="Width (Ft)">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Middele Input</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['middle_input']; ?>" required id="middle_input" name="middle_input" placeholder="Middle_Input">
                                                </div>
                                              </div>


                                              
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Height (Cm)</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['prodheight']; ?>" required id="prodheight" name="prodheight" placeholder="Height (Cm)">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Height (Ft)</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo intval($post['prodheight'])*0.0328084; ?>" required id="prodheightft" name="prodheightft" placeholder="Height (Ft)">
                                                </div>
                                              </div>
                                              <div class="form-group row">
                                                <label for="order_id" class="col-sm-4 col-form-label text-sm">Remarks</label>
                                                <div class="col-sm-8">
                                                <input type="text" readonly class="form-control form-control-sm" value="<?php echo $post['remarks']; ?>" required id="remarks" name="remarks" placeholder="Remarks">
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
                               

                               
      
                  </tbody>
                
                  <tfoot  class="text-xs">
                  <tr>

                                     <!--  1 cm=0.0328084 feet
                                      1 squarecm = 0.00107639 square feet
                                      round upto 3 digits after point -->

                                         
                                        <th class="text-xs">#</th>
                                        <th colspan="8"></th>
                                       <!-- <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th> 
                                        <th></th>
                                        <th></th>  
                                        <th></th>  -->
                                        
                                        <th class="text-xs">Tot.Qty</th>
                                        <th class="text-xs"><?php echo $post['totqnty'];?></th>
                                        <th class="text-xs"></th>
                                        <th class="text-xs">Tot.Amt</th>
                                        <th class="text-xs"><?php echo $post['tottoal'];?></th>
                                        <th class="text-xs"><?php echo $post['totaddi'];?></th>
                                        <th class="text-xs"><?php echo $post['totnet'];?></th>
                                        <th class="text-xs"></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
                
              </div>
              <!-- /.card-body -->

               <div class="card-footer text-center">
                  <button type="submit" hidden class="btn btn-info">Approve Purchase</button>
                  <button type="button" class="btn btn-warning" onClick="window.location.href = '<?php echo base_url();?>staff/showroomrfp';return false;">Back</button>
                                                                
              </div>

               
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



