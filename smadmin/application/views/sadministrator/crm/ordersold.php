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
              <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
          	  <li class="breadcrumb-item"><a href="<?php echo site_url();?>staff/create-leads">Add Leads</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url();?>staff/leads">List Leads</a></li>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>

                    <!-- SELECT leads.`order_id`, leads.`user_id`,users.name,users.username, leads.`address_id`,customer_addresses.door_no, customer_addresses.landmark, customer_addresses.address_name,customer_addresses.pincode, leads.`totalarea`, leads.`totalorg`, leads.`created_date`, leads.`workstatus`, leads.`work_date`, leads.`orderidz`, leads.`staff_id`, leads.`staff_date`, leads.`payment_id`, leads.`payment_method`, leads.`transaction_id`, leads.`payment_status`, leads.`status` FROM `leads` join users on users.user_id=leads.user_id join customer_addresses on customer_addresses.address_id=leads.address_id  -->
 										<th>Id</th>
                                        <th>OrderId</th>
                                        <th>Cust.Name</th>
                                        <th>Cust.Mobile</th>
                                        <th>Cust.Address</th>
                                        <th>Area</th>
                                        <th>WorkStatus</th>
                                        <th>WorkDate</th>
                                        <th>Staff</th>
                                        <th>StaffDate</th>
										<th>Payment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                   <?php $i=1; foreach($posts as $post) : ?>
                                  <tr>
                                       
                                       <td><?php echo $i++;//$post['user_id']; ?></td>

                                       <td><?php echo $post['payment_id']; ?></td>
                                       <td><?php echo $post['name']; ?></td>
                                       <td><?php echo $post['username']; ?></td>
                                       <td><small><?php echo $post['address_name'].', '.$post['door_no'].', '.$post['user_address'].', '.$post['landmark'].','.$post['pincode']; ?></small></td>
                                       

                                       <td><small><?php echo $post['totalarea']; ?></small></td>
                                       
                                       <td><small>
                                         <?php if($post['workstatus'] == 0){ ?>
                                           <a class="btn btn-success btn-sm enable" href="">Booking</a>
                                                <?php }else if($post['workstatus'] == 1){ ?> 
                                                <a class="btn btn-warning btn-sm disable" href="">Order</a>
                                                 <?php }else if($post['workstatus'] == 2){ ?> 
                                                <a class="btn btn-warning btn-sm disable" href="">Processing</a>
                                                 <?php }else if($post['workstatus'] == 3){ ?> 
                                                <a class="btn btn-success btn-sm disable" href="">Finished</a>
                                                 <?php }else if($post['workstatus'] == 4){ ?> 
                                                <a class="btn btn-danger btn-sm disable" href="">Cancelled</a>


                                                <?php } ?>
                                                 
                                       </small></td>
                                        <td><small>
                                             <?php 
                                             if($post['workstatus'] == 0){ echo "NA"; } 
                                            else { echo date("d/m/Y h:i:s A", strtotime($post['work_date']));} ?>
                                               </small> </td>

                                       <td><small>
                                         <?php if($post['staff_id'] == 0){ echo "NA";} else { echo "Assigned";} ?>
                                           
                                             
                                                 
                                       </small></td>
                                       <td><small>
                                             <?php 
                                             if($post['staff_id'] == 0){ echo "NA"; } 
                                            else { echo date("d/m/Y h:i:s A", strtotime($post['staff_date']));} ?>
                                               </small> </td>

                                       <td  align="left"><small>
                                         <?php if($post['payment_status'] == 0){ ?>
                                            <a class="btn btn-warning btn-sm enable" href="">Not Paid</a>
                                        <?php }else { ?> 
                                            <a class="btn btn-success btn-sm enable" href="">Paid</a>
                                             <?php } ?>
                                                 
                                       </small></td>

                                        <td><?php echo date("d/m/Y h:i:s A", strtotime($post['created_date']));  ?></td>
                                       
                                    
                                        <td  align="left" >
                                                <?php if($post['status'] == 1){ ?>
                                               <a class="btn btn-success btn-sm enable" href='<?php echo base_url(); ?>staff/enableoth/<?php echo $post['order_id']; ?>?table=<?php echo base64_encode('leads'); ?>'>Active</a>
                                                <?php }else{ ?> 
                                                <a class="btn btn-warning btn-sm disable" href='<?php echo base_url(); ?>staff/desableoth/<?php echo $post['order_id']; ?>?table=<?php echo base64_encode('leads'); ?>'>Disabled</a>
                                                <?php } ?>

                                                <a class="btn btn-success btn-sm enable" href='<?php echo base_url(); ?>staffs/edit_leads/<?php echo $post['order_id']; ?>'><i class="fas fa-eye">&nbsp;</i>&nbsp;View</a>
                                                
                                                 <!-- Edit Button -->
                                                <a class="btn btn-info btn-sm" href='<?php echo base_url(); ?>staff/edit_leads/<?php echo $post['order_id']; ?>'><i class="fas fa-edit">&nbsp;</i>&nbsp;Edit</a>
                                                 <!-- Add to Order Button -->
                                                <a class="btn btn-warning btn-sm" href='<?php echo base_url(); ?>staff/addtoorder/<?php echo $post['order_id']; ?>?table=<?php echo base64_encode('leads'); ?>'><i class="fas fa-clipboard-list">&nbsp;</i>&nbsp;Add To Order</a>
                                             
                                                <!-- Delete Button -->
                                                	
                                               <!--  <a class="btn btn-danger btn-sm delete" href='<?php //echo base_url(); ?>staff/deleteleads/<?php //echo $post['order_id']; ?>'><i class="fas fa-trash">&nbsp;</i>&nbsp;Delete</a> -->
                                       </td>
                                       
                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->
      
                  </tbody>
                  <tfoot>
                  <tr>
                 					    <th>Id</th>
                                        <th>OrderId</th>
                                        <th>Cust.Name</th>
                                        <th>Cust.Mobile</th>
                                        <th>Cust.Address</th>
                                        <th>Area</th>
                                        <th>WorkStatus</th>
                                        <th>WorkDate</th>
                                        <th>Staff</th>
                                        <th>StaffDate</th>
                                        <th>Payment</th>
                                        <th>Date</th>
                                        <th>Action</th>
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

