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
          	  <li class="breadcrumb-item"><a  class="btn-sm btn bg-warning" href="<?php echo site_url();?>staff/create-leads">Add Leads</a></li>
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $titlez; ?> </h3>
              </div>
              <!-- /.card-header -->
                     
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" style="width:auto;">
                  <thead>
                  <tr>

 										<!--<th>Id</th>-->
                                        <th>Lead Id</th>
                                        <th>Asigned Date</th>
                                        <th>Customer Name</th>
                                        <th>Contact No</th>
                                        <th>Alternate No</th>
                                        <th>Lead_Status</th>
                                        <th>Scheduled Date</th>
                                        <th>Executive Name</th>
                                        <th>Office Remarks</th>
                                        <th>Lead Source</th>
                                        <th>CallBack Status</th>
                                        <th>Action</th>
                                        <th>Customer Address</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                   <?php $i=1; foreach($posts as $post) : ?>
                                  <tr>
                                    
                                     <!-- d/m/Y h:i:s A; -->
                                      <td  align="left" ><?php echo $post['order_id']; ?></td>
                                      <td><?php echo date("d/m/Y h:i:s A", strtotime($post['created_date'])); ?></td>
                                      <td  align="left"><?php echo $post['name']; ?></td>
                                      <td  align="left"><?php echo $post['username']; ?></td>
                                      <td  align="left"><?php echo $post['contact']; echo $post['authorise']; ?></td>

                                      <td  align="left" >





                                        <?php if($post['leadstatus']=="Lead In Pipeline"){?>
                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-info' href='<?php echo base_url(); ?>staff/process-leads/<?php echo $post['order_id']; ?>'><?php echo $post['leadstatus']; ?></a></small>
                                        
                                        <?php } else if($post['leadstatus']=="CPO Approval Pending"){
                                          if($post['cleadssalesid']!="") { if($post['authorise']!=0){?>

                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-success' href='<?php echo base_url(); ?>staff/edited-quotes-process/<?php echo $post['order_id']; ?>/<?php echo $post['cleadssalesid']; ?>'><?php echo $post['leadstatus']; ?></a></small>

                                           <?php } else {  ?>
                                            <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-success' href='<?php echo base_url(); ?>staff/edited-quotes-process/<?php echo $post['order_id']; ?>/<?php echo $post['cleadssalesid']; ?>'><?php echo $post['leadstatus']; ?></a></small>

                                            <?php }} else {  ?>
                                              <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-success' href='<?php echo base_url(); ?>staff/add-quotes-process/<?php echo $post['order_id']; ?>'><?php echo $post['leadstatus']; ?></a></small>

                                        
                                        <?php } }else if($post['leadstatus']=="Lead Assigned"){?>
                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-primary gradiant' href='<?php echo base_url(); ?>staff/edit-leads/<?php echo $post['order_id']; ?>'><?php echo $post['leadstatus']; ?></a></small>


                                        <?php } else if($post['leadstatus']=="Meeting Proposed"){?>
                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-warning' href='<?php echo base_url(); ?>staff/meeting-tracker-add/<?php echo $post['order_id']; ?>'><?php echo $post['leadstatus']; ?></a></small>

                                        <?php } else if($post['leadstatus']=="Presentation Given"){?>
                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-pink' href='<?php echo base_url(); ?>staff/meeting-tracker-add/<?php echo $post['order_id']; ?>'><?php echo $post['leadstatus']; ?></a></small>

                                          <?php } else if($post['leadstatus']=="Order Created"){
                                            if($post['cleadssalesid']!="") { if($post['authorise']!=0){?>

                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-pink' href='<?php echo base_url(); ?>staff/edited-quotes-process/<?php echo $post['order_id']; ?>/<?php echo $post['cleadssalesid']; ?>'><?php echo $post['leadstatus']; ?></a></small>

                                          <?php } else {  ?>

                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-pink' href='<?php echo base_url(); ?>staff/edited-quotes-process/<?php echo $post['order_id']; ?>/<?php echo $post['cleadssalesid']; ?>'><?php echo $post['leadstatus']; ?></a></small>
                                          <?php }} else {  ?>

                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-pink' href='<?php echo base_url(); ?>staff/add-quotes-process/<?php echo $post['order_id']; ?>'><?php echo $post['leadstatus']; ?></a></small>
                                          <!-- edit-leads-quotes -->

                                        <?php }} else if($post['leadstatus']=="Lead Cancelled"){?>
                                          <small><a style="white-space: nowrap; width: 50px; overflow: hidden;text-overflow: ellipsis; border: 1px solid #dee2e6;" title="<?php echo $post['leadstatus']; ?>" class='px-2 bg-danger' href='<?php echo base_url(); ?>staff/edit-leads/<?php echo $post['order_id']; ?>'><?php echo $post['leadstatus']; ?></a></small>

                                        <?php }?>
                                        
                                        </td>
                                      <td><?php echo date("d/m/Y h:i:s A", strtotime($post['pdate']));  ?></td>
                                      <td  align="left" ><?php echo $post['executivename']; ?></td>
                                      <td  align="left"><?php echo $post['custremarks']; ?></td>
                                      <td  align="left"><?php echo $post['referal']; ?></td>
                                      <td  align="left"><?php echo $post['approachstatus']; ?></td>
                                  
                                       
                                    
                                      <td  align="left">
                                        <a class="text-primary" href='<?php echo base_url(); ?>staff/process-leads/<?php echo $post['order_id']; ?>'><i class="fas fa-eye"></i></a> &nbsp;
                                        <!-- Edit Button -->
                                        <a class="text-danger" href='<?php echo base_url(); ?>staff/edit-leads/<?php echo $post['order_id']; ?>'><i class="fas fa-pencil-alt"></i></a>
                                      </td>
                                      <td  align="left" class="text-sm"><?php echo $post['address'].', '.$post['location'];?>
                                       <br/>
                                      <?php echo $post['district'].', ';?><br/>
                                      <?php echo $post['landmark'].','.$post['zipcode']; ?></td>
                                       
                                    </tr>
                                <?php endforeach; ?>

                                <!-- <div class="paginate-link">
                                    <?php //echo $this->pagination->create_links(); ?>
                                    </div>  -->
      
                  </tbody>
                  <tfoot>
                  <tr>
                 					              <th>Lead Id</th>
                                        <th>Asigned Date</th>
                                        <th>Customer Name</th>
                                        <th>Contact No</th>
                                        <th>Alternate No</th>
                                        <th>Lead_Status</th>
                                        <th>Scheduled Date</th>
                                        <th>Executive Name</th>
                                        <th>Office Remarks</th>
                                        <th>Lead Source</th>
                                        <th>CallBack Status</th>
                                        <th>Action</th>
                                        <th>Customer Address</th>
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

