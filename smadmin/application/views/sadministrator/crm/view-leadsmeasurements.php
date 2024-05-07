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
               <li class="breadcrumb-item"><a href="<?php echo site_url();?>staff/create_leadsmeasurements/<?php echo $idm;?>">Add Leads Measurements</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url();?>staff/view_leads/<?php echo $idm; ?>">Back to Current Lead</a></li>
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
                    

 										                    <th class="text-sm">SL</th>
                                        <th class="text-sm">Leads_id</th>
                                        <th class="text-sm">Cust_Name</th>
                                        <th class="text-sm">Res.Type</th>
                                        <th class="text-sm">RoomType</th>
                                        <th class="text-sm">Material</th>
                                        <th class="text-sm">MaterialName</th>
                                        <th class="text-sm">Width</th>
                                        <th class="text-sm">Hight</th>
                                        <th class="text-sm">Sq.Ft</th>
                                        <th class="text-sm">Date</th>
                                        <th class="text-sm">Edit</th>
                                        <th class="text-sm">Delete</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                   <?php $i=1; foreach($posts as $post) : ?>
                                  <tr>
                                       
                                      <td><small><?php echo $i++;//$post['user_id']; ?></small></td>
                                      <td><small><?php echo $post['order_id']; ?></small></td>
                                      <td><small><?php echo $post['cust_name']; ?></small></td>
                                      <td><small><?php echo $post['resitype']; ?></small></td>
                                      <td><small><?php echo $post['roomtype']; ?></small></td>
                                      <td><small><?php echo $post['materialtype']; ?></small></td>
                                      <td><small><?php echo $post['materialname']; ?></small></td>
                                      <td><small><?php echo $post['width']; ?></small></td>
                                      <td><small><?php echo $post['hight']; ?></small></td>
                                      <td><small><?php echo $post['sqft']; ?></small></td>
                                      <td><small><?php echo date("d/m/Y h:i:s A", strtotime($post['created_date']));  ?></small></td>


                                      <td><small>
                                         <!-- Edit Button -->
                                                <a class="btn btn-info btn-xs" href='<?php echo base_url(); ?>staff/edit_leadsmeasurements/<?php echo $post['id']; ?>'><i class="fas fa-edit">&nbsp;</i></a>
                                      </small></td>
                                      <td>
                                        <a class="btn btn-danger btn-xs delete" href='<?php echo base_url(); ?>staff/deleteleadsmeasurements/<?php echo $post['id']; ?>'><i class="fas fa-trash">&nbsp;</i></a>
                                      </small></td>

                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->
      
                  </tbody>
                  <tfoot>
                  <tr>
                 					    
                                       
                                        <th class="text-sm">SL</th>
                                        <th class="text-sm">Leads_id</th>
                                        <th class="text-sm">Cust_Name</th>
                                        <th class="text-sm">Res.Type</th>
                                        <th class="text-sm">RoomType</th>
                                        <th class="text-sm">Material</th>
                                        <th class="text-sm">MaterialName</th>
                                        <th class="text-sm">Width</th>
                                        <th class="text-sm">Hight</th>
                                        <th class="text-sm">Sq.Ft</th>
                                        <th class="text-sm">Date</th>
                                        <th class="text-sm">Edit</th>
                                        <th class="text-sm">Delete</th>
                    
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

