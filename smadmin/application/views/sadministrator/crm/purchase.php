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
  <!--  <style type="text/css">
    div.dataTables_wrapper {
        width: 800px;
       margin: 0 auto;
    }
  </style>-->
  

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
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/showroomrfp">List Purchase</a></li>
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
                <h3 class="card-title"><?php echo $titlez; ?> </h3>
              </div>
              <!-- /.card-header -->
                     
              <div class="card-body">
                <div class="table-responsive text-sm">
                <table id="exampleshaj" class="display nowrap table table-bordered table-hover dataTable dtr-inline" style="width:100%">
                  <thead  class="bg-info">
                  <tr>

 										<!--<th>Id</th>-->
                                        <th>Lead.Id</th>
                                        <th>Bill.No</th>
                                        <th>OrderID</th>
                                        <th>OrderDate</th>
                                        <th>SupplierName</th>
                                        <th>LeadCost</th>
                                        <th>PayMode</th>
                                        <th>Amount</th>
                                        <th>Credit_Amount</th>
                                        <th>Paid_Amount</th>
                                        <th>Pending_Amount</th>
                                        <th>Last_Paid_Date</th>
                                        <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody  class="text-xs" >
                   <?php $i=1; foreach($posts as $post) : ?>
                                  <tr>

                                    
                                    
                                     <!-- d/m/Y h:i:s A; -->
                                      <td  align="left"><?php echo $post['order_id']; ?></td>
                                      <td  align="left"><?php echo $post['bill_no']; ?></td>
                                      <td  align="left"><?php echo $post['bill_no']; ?></td>
                                      <td>
                                        <?php echo date("d/m/Y", strtotime($post['created_at']));?></td>
                                      <td  align="left"><?php echo $post['vendorname']; ?></td>
                                      <td  align="left"><?php echo round($post['netamount'],2); ?></td>
                                      <td  align="left"><?php if($post['id']!=null){ if($post['paymode']!=0){echo "Bank";} else if($post['paymode']!=1){echo "Cash";}}else{} ?></td>
                                      
                                      <td><?php echo round($post['purc_totamtax'],2);?></td>
                                      <td><?php if($post['id']!=null){ echo round($post['credit_amt'] ,2);} else { echo "0";} ?></td>
                                      <td><?php if($post['id']!=null){ echo round($post['paidamount'],2) ;} else { echo "0";} ?></td>

                                      <td><?php if($post['id']!=null){ echo round($post['balance_amt'],2) ;} else { echo "0";} ?></td>

                                      <td>
                                        <?php if($post['id']!="") { echo date("d/m/Y", strtotime($post['created_date']));} else{echo "NA";}?></td>  

                                      <td  align="left" >

                                        <a class="text-danger" href='<?php echo base_url(); ?>staff/viewpurchase-payments/<?php echo trim($post['bill_no']); ?>/<?php echo $post['cleadssalesid']; ?>'><i class="fas fa-arrow-alt-circle-right"></i></a>
                                      
                                      </td>
                                      
                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->
      
                  </tbody>
                  <tfoot class="text-xs">
                  <tr>
                 					              <th>Lead.Id</th>
                                        <th>Bill.No</th>
                                        <th>OrderID</th>
                                        <th>OrderDate</th>
                                        <th>SupplierName</th>
                                        <th>LeadCost</th>
                                        <th>PayMode</th>
                                        <th>Amount</th>
                                        <th>Credit_Amount</th>
                                        <th>Paid_Amount</th>
                                        <th>Pending_Amount</th>
                                        <th>Last_Paid_Date</th>
                                        <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
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

