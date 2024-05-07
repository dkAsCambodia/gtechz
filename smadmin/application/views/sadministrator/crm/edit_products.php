

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
          	  <li class="breadcrumb-item"><a  class="btn-sm btn bg-warning" href="<?php echo site_url();?>staff/create-products">Add Products</a></li>
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/products">List Products</a></li>
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
          <!-- /.card-header -->
          
          <?php echo form_open_multipart('staff/update_products'); ?>
          <input type="hidden" name="id" value="<?php echo $post['proid']; ?>">
          <input type="hidden" name="mproductedi_id" id="mproductedi_id" value="<?php echo 1; //$post['id']; ?>">
           <input type="hidden" name="fu" id="fu" value="<?php echo $post['image']; ?>">
          <div class="card-body">
            <div class="row">
            
  
                 <div class="col-md-6">
                <div class="form-group">
                  <label>Product Name</label>
                  <input class="form-control"  required value="<?php if(set_value('name')=="") echo $post['prodname']; else echo set_value('name');  ?>" name="name" placeholder="Product Name" type="text">
                 
                </div>
                </div>

            <div class="col-md-3">
              <div class="form-group">
                    <label class="text-sm"  for="category">Category</label>
                        <input type="hidden" class="form-control form-control-sm"  value="<?php if(set_value('categoryname')!="") echo set_value('categoryname') ;  ?>"  id="categoryname" name="categoryname" placeholder="Enter Category">
                <select name="category" required id="category"  class="form-control  form-control-sm select2" style="width: 100%;">
                  <option value="">Select a Category</option>
                  <?php foreach ($maincategories as $categoryu) { ?>
                  <option <?php if($categoryu['id'] ==$post['cat_id']){ echo 'selected="selected"'; } ?> value="<?php echo $categoryu['id'] ?>"><?php echo $categoryu['name']?> </option>
                  <?php } ?>
                </select>
              </div>
            </div>
                  
             <div class="col-md-3">
                   <div class="form-group">
                    <label class="text-sm" for="subcategory">Sub Category</label>
                      <input type="hidden" class="form-control form-control-sm" id="subcategoryid" value="<?php if($post['subcat_id']!="") echo $post['subcat_id'] ; else echo set_value('subcategoryid') ; ?>" name="subcategoryid" placeholder="Enter Sub Category">
     
                      <input type="hidden" class="form-control form-control-sm"  value="<?php if(set_value('subcategoryname')!="") echo set_value('subcategoryname') ;  ?>"  id="subcategoryname" name="subcategoryname" placeholder="Enter Sub Category">
     
                      <input type="hidden" class="form-control form-control-sm" id="subcategoryide" value="<?php if($post['subcat_id']!="") echo $post['subcat_id'] ; else echo set_value('subcategoryide') ; ?>" name="subcategoryide" placeholder="Enter Sub Categoryde">

                 
                  <select name="subcategory" required  id="subcategory"  class="form-control  form-control-sm select2" style="width: 100%;">
                 
                    <option value="">Select a Sub Category </option>set_select 
                    <option <?php if(set_value ('subcategoryid') !="" ){ echo 'selected="selected"'; } ?> value="<?php echo set_value('subcategoryid');  ?>"><?php echo set_value('subcategoryname');  ?></option>
                    <option <?php if($post['subcat_id']!="" ){ echo 'selected="selected"'; } ?> value="<?php echo $post['subcat_id'];  ?>"><?php echo set_value('subcategoryname');   ?></option>
                  </select>
                </div>
              </div>
              
                 
                
                
                
            <div class="col-md-6"> 
             <div class="form-group">
                    <label for="exampleInputFile">Upload Main Image- [Required] </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" <?php if($post['image']=="") echo "required"; ?> name="userfile" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile"><?php if($post['image']!="") echo $post['image']; else echo "Choose file" ?></label>
                      </div>
                     <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>-->
                    </div>
                  </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
       
                
                
                 <div class="col-md-3">
                 <div class="form-group">
                  <label>Price</label>
                  <input class="form-control number"   value="<?php if(set_value('price')=="") echo $post['srater']; else echo set_value('price');  ?>" name="price" placeholder="Price" type="text">
                 
                </div>
                </div>

                 <div class="col-md-3">              
               	<div class="form-group">
                  <label>Select Status</label>
                  <select name="status" class="form-control select2" style="width: 100%;">
                    <option <?php if($post['prodstatus'] ==1 ){ echo 'selected="selected"'; } ?> value="1">Active </option>

                                                                    <option value="">Select a Status</option>
                                                                    <option <?php if($post['prodstatus'] ==1 ){ echo 'selected="selected"'; } ?> value="1">Active</option>
                                                                    <option <?php if($post['prodstatus'] ==0 ){ echo 'selected="selected"'; } ?> value="0">Closed</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
               
               
              <div class="col-md-12" style="margin-top:10px ">
                <div class="form-group">
                  <label>Write description</label>
                  
                   
                   <textarea id="summernote"  class="form-control" name="description" placeholder="Edit description">
               <?php if(set_value('description')=="") echo $post['description']; else echo set_value('description'); ?></textarea>
                </div>
                <!-- /.form-group -->
                
                
              </div> 
                
            
             <div class="col-md-2">              
               	<div class="form-group">
                  <label>Current Main Image</label>
         
               
               <div class="col-md-12">
                <div class="card mb-2 bg-gradient-dark">
                
                  
                   <a href="<?php echo site_url();?>assets/images/products/<?php echo $post['image']; ?>" data-toggle="lightbox" data-title="<?php echo "Product Image"; ?>">
                  <img style="padding:10px;object-fit: cover ;
width: 100%;
height: 200px;" class="card-img-top img-fluid mb-2" src="<?php echo site_url();?>assets/images/products/<?php echo $post['image']; ?>" alt="<?php echo site_url();?>assets/images/products/<?php echo $post['image']; ?>">
                  
                      </a>
                 
                </div>
              </div>
               
                </div>
                <!-- /.form-group -->
              </div>    
              
              
             
            
                                                  
                                                        
            
            <!-- /.row -->
          </div>
                  <div class="col-md-6">     
           <div class="form-group">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
          </div>                                                     
        </div>   
          <!-- /.card-body -->
			</form>
          <div class="card-footer">
            Please enter products with required fields with aspect ratio for image and set a status for it.
            <li>Price should be digit like 100 or 95. Dont put <span class="text-danger">'#.00'</span> here</li>
            <li>Main Image- is <span class="text-danger">'Required'</span> others are optional   here</li>
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!--Name,Email,Username,Subsciption,Subsciption Amount,Pincode,Password-->
