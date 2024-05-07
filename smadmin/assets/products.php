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
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/seller_dashboard'); ?>">Dashboard</a></li>
          	  <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/sellers/create">Add Seller</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url();?>administrator/sellers">List Sellers</a></li>
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
 										<th>Id</th>
 										<th>Seller_ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
										<th>Email</th>
                                        <th>Contact</th>
                                         <th>Reg-Date</th> 
                                        <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                   <?php $i=1; foreach($posts as $post) : ?>
                                  <tr>
                                       
                                       <td><?php echo $i++;//$post['user_id']; ?></td>
                                       <td><?php echo $post['user_id']; ?></td>
                                        <td>
                                            <?php if($post['image'] == ''){ ?>
                                                <img width="20px;" src="<?php echo site_url();?>../mayaveeapi/assets/images/sellers/avatar-blank.jpg"> 
                                            <?php } else { ?>
                                             <a href="<?php echo site_url();?>../mayaveeapi/assets/images/sellers/<?php echo $post['image']; ?>"  data-toggle="lightbox" data-title="<?php echo $post['name']; ?>" alt="<?php echo $post['name']; ?>">
                                            <img width="20px;" src="<?php echo site_url();?>../mayaveeapi/assets/images/sellers/<?php echo $post['image']; ?> ">
                                            <?php } ?> </a>                                          
                                        </td>
                                        
                                        
                                            
                                        <td><?php echo $post['name']; ?></td>
                                        <td><?php echo $post['email']; ?></td>
                                        <td><?php echo $post['username']; ?></td>
                                        <td><?php echo date("M d,Y h:i:s", strtotime($post['created_date'])); ?></td>
                                        
                                      
                                        <td  align="left">
                                                <?php if($post['status'] == 1){ ?>
                                               <a class="btn btn-success btn-sm enable" href='<?php echo base_url(); ?>administrator/enable/<?php echo $post['user_id']; ?>?table=<?php echo base64_encode('sellers'); ?>'>Enabled</a>
                                                <?php }else{ ?> 
                                                <a class="btn btn-warning btn-sm disable" href='<?php echo base_url(); ?>administrator/desable/<?php echo $post['user_id']; ?>?table=<?php echo base64_encode('sellers'); ?>'>Disabled</a>
                                                <?php } ?>
                                                
                                                 <!-- Edit Button -->
                                                <a class="btn btn-info btn-sm" href='<?php echo base_url(); ?>administrators/sellers/edit/<?php echo $post['user_id']; ?>'><i class="fas fa-edit">&nbsp;</i>&nbsp;Edit</a>
                                             
                                                <!-- Delete Button -->
                                                	
                                                <a class="btn btn-danger btn-sm delete" href='<?php echo base_url(); ?>administrators/sellers/deleteseller/<?php echo $post['user_id']; ?>'><i class="fas fa-trash">&nbsp;</i>&nbsp;Delete</a>
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
                 						<th>Seller_ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
										<th>Email</th>
                                        <th>Contact</th>
                                         <th>Reg-Date</th> 
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

