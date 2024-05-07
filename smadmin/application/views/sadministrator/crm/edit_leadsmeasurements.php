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
            <h1><?php echo $title; ?></h1>
          </div>
          <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url();?>staff/create_leadsmeasurements/<?php echo $idm;?>">Add Leads</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url();?>staff/view_leads/<?php echo $idm; ?>">Back to Current Lead</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
                 
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
          <div class="card-header">
            <h3 class="card-title"><?php echo $title; ?> </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header https://candidhomes.in/crm/staff/-->
          
          <?php echo form_open_multipart('staff/update_leadsmeasurements'); ?>
          <input type="hidden" name="id" value="<?php echo $idm; ?>">
          <input type="hidden" name="order_id" value="<?php echo $posts['order_id']; ?>">
          <input type="hidden" name="mleadsmeasure_id" id="mleadsmeasure_id" value="<?php echo 1; //$post['id']; ?>">
         
          <div class="card-body">
            <div class="row">
                          

              <div class="col-md-6">
                <div class="form-group">
                  <label text-sm for="name">Customer Name</label>
                  <input class="form-control form-control-sm"  required readonly value="<?php echo $posts['cust_name'];?>" name="name" placeholder="Customer Name" type="text">
                  <input class="form-control form-control-sm"  required readonly value="<?php echo $posts['cust_id'];?>" name="cid" placeholder="Customer ID" type="hidden">
                 
                </div>
              </div>

              <div class="col-md-3">
                 <div class="form-group">
                    <label class="text-sm"  for="resitype">Residential/Commercial</label>
                        
                  <select name="resitype" required id="resitype"  class="form-control  form-control-sm select2" style="width: 100%;">
                   <option value="">Select Any</option>
                   <option <?php if($posts['resitype'] =="residential" ){ echo 'selected="selected"'; } ?> value="residential">Residential</option>
                  <option <?php if($posts['resitype'] =="commercial" ){ echo 'selected="selected"'; } ?> value="commercial">Commercial</option>


                  </select>
                </div>
              </div>

               <div class="col-md-3">
                 <div class="form-group">
                    <label class="text-sm"  for="roomtype">RoomType</label>
                        
                  <select name="roomtype" required id="roomtype"  class="form-control  form-control-sm select2" style="width: 100%;">
                   <option value="">Select Any</option>
                   <option <?php if($posts['roomtype'] =="Living" ){ echo 'selected="selected"'; } ?> value="Living">Living</option>
                  <option <?php if($posts['roomtype'] =="Hall" ){ echo 'selected="selected"'; } ?> value="Hall">Hall</option>
                  <option <?php if($posts['roomtype'] =="Kitchen" ){ echo 'selected="selected"'; } ?> value="Kitchen">Kitchen</option>
                  <option <?php if($posts['roomtype'] =="BedRoom" ){ echo 'selected="selected"'; } ?> value="BedRoom">BedRoom</option>
                  <option <?php if($posts['roomtype'] =="Dining" ){ echo 'selected="selected"'; } ?> value="Dining">Dining</option>
                 
                  </select>
                </div>
              </div>

                
              <div class="col-md-6">
                 <div class="form-group">
                  <label class="text-sm"  for="materialtype">Material Type</label>

                  <select name="materialtype" required id="materialtype"  class="form-control  form-control-sm select2" style="width: 100%;">
                   <option value="">Select a material</option>
                  <?php foreach ($products as $product) { ?>
                  <option <?php if($product['name'] ==$posts['materialtype']){ echo 'selected="selected"'; } ?> value="<?php echo $product['name'] ?>"><?php echo $product['name']?> </option>
                  <?php } ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label text-sm>Material Name</label>
                  <input class="form-control form-control-sm"  required  value="<?php echo $posts['materialname'];?>" name="materialname" placeholder="Material Name" type="text">
                 
                </div>
              </div>

              <div class="col-md-4">
                 <div class="form-group">
                  <label text-sm>Width</label>
                  <input class="form-control number  form-control-sm"  required value="<?php echo $posts['width'];?>" name="width"  id="width" placeholder="Width" type="text">
                 
                </div>
              </div>

              <div class="col-md-4">
                 <div class="form-group">
                  <label text-sm>Height</label>
                  <input class="form-control number  form-control-sm"  required value="<?php echo $posts['hight'];?>" name="height"  id="height" placeholder="Height" type="text">
                 
                </div>
              </div>


              <div class="col-md-4">
                 <div class="form-group">
                  <label text-sm>Sq.Ft</label>
                  <input class="form-control number  form-control-sm" readonly  required value="<?php echo $posts['sqft'];?>" name="sqft" id="sqft" placeholder="Sq.Ft" type="text">
                 
                </div>
              </div>

 
                
                 
            </div>
            <!-- /.row -->

           <div class="form-group">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                                                                </button>
                                                            </div>
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
			</form>
          <div class="card-footer">
           Please enter required fields.
            <li>Width, Height should be digit like 100 or 95. Dont put <span class="text-danger">'#.00'</span> here</li>
           
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

