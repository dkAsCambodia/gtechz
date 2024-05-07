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
              <li class="breadcrumb-item"><a  class="btn-sm btn bg-info" href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/leads-complaints">List Complaints</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="card card-default">

      <?php echo form_open_multipart('staff/create-complaints'); ?>
      <input type="hidden" name="mcreate_servi" id="mcreate_servi" value="<?php echo 1; //$post['id']; ?>">
                 
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

      <div class="card-body mb-2">


        <div class="form-group row">
          <label for="bill_no" class="col-sm-2 col-form-label text-sm"> Order ID/Bill No</label>
          <div class="col-sm-4">
            <select name="bill_no"  id="bill_no" required class="form-control form-control-sm select2" style="width: 100%;">
              <option value="">Select Order_ID</option>
              <?php foreach ($sales as $salesu) { ?>
              <option <?php if($salesu['bill_no'] ==set_value('bill_no')){ echo 'selected="selected"'; } ?> value="<?php echo $salesu['bill_no'] ?>"><?php echo $salesu['bill_no']?> </option>
                          <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label text-sm">Customer Name</label>
          <div class="col-sm-4">
            <input type="text" readonly class="form-control form-control-sm" value="<?php if(set_value('name')!="") echo set_value('name') ;  ?>" required id="name" name="name" placeholder="Customer Name">

            <input type="hidden" class="form-control form-control-sm"  value="<?php if(set_value('user_id')!="") echo set_value('user_id') ;  ?>"  id="user_id" name="user_id" placeholder="Customer ID">

          
          </div>
        </div>

        <div class="form-group row">
          <label for="servicemode" class="col-sm-2 col-form-label text-sm">Complaint Mode</label>
          <div class="col-sm-4">
            <input type="text" readonly class="form-control form-control-sm" value="office" required id="servicemode" name="servicemode" placeholder="Service Mode">
          </div>
        </div>

        <div class="form-group row">
          <label for="service" class="col-sm-2 col-form-label text-sm">Complaint Request</label>
          <div class="col-sm-4">
              <textarea  class="form-control form-control-sm" required value="<?php echo set_value('service');  ?>" name="service" id="service" placeholder="Service Request"><?php echo set_value('service');  ?></textarea>
          </div>
        </div>

        <div class="form-group row">
                    <label for="remarks" class="col-sm-2 col-form-label text-sm">Remarks</label>
                    <div class="col-sm-4">
                       <textarea  class="form-control form-control-sm" required value="<?php echo set_value('remarks');  ?>" name="remarks" id="remarks" placeholder="Remarks"><?php echo set_value('remarks');  ?></textarea>
                    </div>
        </div>
        <div class="form-group row">
                    <label for="servicecharge" class="col-sm-2 col-form-label text-sm">Service Charge -  If not enter 0.</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form-control-sm number" value="<?php echo set_value('servicecharge');  ?>" required id="servicecharge"  name="servicecharge"  placeholder="Service Charge">
                    </div>
        </div>
        
        <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label text-sm">Select Status</label>
                    <div class="col-sm-4">

                    

                       <select name="status"  id="status" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Status</option>
                        <option <?php if(set_value('status') =="1" ){ echo 'selected="selected"'; } ?>  value="0">Active</option>
                        <option <?php if(set_value('status') =="0" ){ echo 'selected="selected"'; } ?>  value="1">Closed</option>

                       
                      </select>
                    </div>
        </div>

      </div>


      <!-- /.card-body -->
      

      <div class="card-footer">
        <button type="submit" class="btn btn-info">Save Complaints</button>
        <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>staff/leads-complaints';return false;">Cancel</button>
                                                                
      </div>
      </form>
    </div>
          <!-- /.card card-default -->

  </div>
  <!-- /.container-fluid -->
</section>

</div>

