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
              <li class="breadcrumb-item active"><a  class="btn-sm btn bg-success" href="<?php echo site_url();?>staff/products">List Products</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="card card-default">

      <?php echo form_open_multipart('staff/update_products'); ?>

          <input type="hidden" name="id" value="<?php echo $post['proid']; ?>">
          <input type="hidden" name="mproductedi_id" id="mproductedi_id" value="<?php echo 1; //$post['id']; ?>">
           <input type="hidden" name="fu" id="fu" value="<?php echo $post['image']; ?>">
    
                 
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

        
            
                   
      <div class="card-body" >

         <br/>
        <div class="row" >
          <!-- left column -->
          <div class="col-md-6" >
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!--<form class="form-horizontal">-->
                <?php //var_dump($post);  ?>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label text-sm">Product Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo $post['prodname'];  ?>" required id="name" name="name" placeholder="Product Name">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="category" class="col-sm-4 col-form-label text-sm">Category</label>
                    <div class="col-sm-8">
                      
                      <input  type="hidden" class="form-control"  value="<?php if($post['catname']!="") echo $post['catname'] ;  ?>"  id="categoryname" name="categoryname" placeholder="Enter Category">

                      <select name="category" required id="category"  class="form-control  form-control-sm select2" style="width: 100%;">
                        <option value="">Select a Category</option>
                        <?php foreach ($maincategories as $categoryu) { ?>
                        <option <?php if($categoryu['id'] ==$post['cat_id']){ echo 'selected="selected"'; } ?> value="<?php echo $categoryu['id'] ?>"><?php echo $categoryu['name']?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="subcategory" class="col-sm-4 col-form-label text-sm">Sub Category</label>
                    <div class="col-sm-8">

                      <input type="hidden" class="form-control form-control-sm" id="subcategoryid" value="<?php if($post['subcat_id']!="") echo $post['subcat_id'] ; else echo set_value('subcategoryid') ; ?>" name="subcategoryid" placeholder="Enter Sub Category">

                    <input type="hidden" class="form-control form-control-sm"  value="<?php if($post['subname']!="") echo $post['subname'] ;  ?>"  id="subcategoryname" name="subcategoryname" placeholder="Enter Sub Category">

                      <select name="subcategory" required  id="subcategory"  class="form-control  form-control-sm select2" style="width: 100%;">
                 
                        <option value="">Select a Sub Category </option>set_select 
                        <option <?php if($post['subcat_id'] !="" ){ echo 'selected="selected"'; } ?> value="<?php echo $post['subcat_id'];  ?>"><?php echo  $post['subcategoryname'];  ?></option>
                
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="prodtype" class="col-sm-4 col-form-label text-sm">Product Type</label>
                    <div class="col-sm-8">
                       <select name="prodtype"  id="prodtype" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Product Type</option>

                        <option <?php if($post['prodtype'] =="1" ){ echo 'selected="selected"'; } ?> value="1">Finished</option>
                        <option <?php if($post['prodtype'] =="2" ){ echo 'selected="selected"'; } ?> value="2">Assembly</option>
                        <option <?php if($post['prodtype'] =="3" ){ echo 'selected="selected"'; } ?> value="3">Components</option>

                      
                                                                                        
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="shownweb" class="col-sm-4 col-form-label text-sm">Show In Web</label>
                    <div class="col-sm-8">
                      <select name="shownweb"  id="shownweb" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Any</option>

                        <option <?php if($post['shownweb'] =="1" ){ echo 'selected="selected"'; } ?> value="1">YES</option>
                        <option <?php if($post['shownweb'] =="0" ){ echo 'selected="selected"'; } ?> value="0">NO</option>

                      
                                                                                        
                      </select>

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="userfile" class="col-sm-4 col-form-label text-sm">Upload Main Image <b class="text-danger">* </b></label>
                    <div class="col-sm-8">
                    <div class="input-group">
                      <div class="custom-file form-control form-control-sm">
                        <input type="file" <?php if($post['image']=="") echo "required"; ?> name="userfile" class="custom-file-input form-control form-control-sm" id="exampleInputFile">
                        <label class="custom-file-label col-form-label text-sm" for="exampleInputFile"><?php if($post['image']!="") echo $post['image']; else echo "Choose file" ?></label>
                      </div>
                     <!-- <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>-->
                    </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="district" class="col-sm-4 col-form-label text-sm">Status</label>
                    <div class="col-sm-8">

                      <select name="status"  id="status" required class="form-control form-control-sm select2" style="width: 100%;">
                        <option value="">Select Status</option>
                        <option <?php if($post['prodstatus'] =="1" ){ echo 'selected="selected"'; } ?>  value="1">Active</option>
                        <option <?php if($post['prodstatus'] =="0" ){ echo 'selected="selected"'; } ?>  value="0">Closed</option>

                       
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="unittype" class="col-sm-4 col-form-label text-sm">Unit Type</label>
                    <div class="col-sm-8">

                     <select name="unittype" required class="form-control form-control-sm select2" style="width: 100%;">
                        
                      <option value="">Select a Unit</option>
                      <option <?php if($post['unittype'] ==1 ){ echo 'selected="selected"'; } ?> value="1">Unit/Per SqFt</option>
                      

                    </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="unit" class="col-sm-4 col-form-label text-sm">Units (Sq.Ft)</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo $post['unit'];  ?>" required id="unit" name="unit" placeholder="Enter Unit Digit">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="hsn" class="col-sm-4 col-form-label text-sm">HSN Code</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control form-control-sm" value="<?php echo $post['hsn'];  ?>" required id="hsn" name="hsn" placeholder="Enter HSN">
                    </div>
                  </div>


                
                </div>
               
              <!--</form>-->

            </div>
            <!-- /.card card-primary Customer-->

          </div>
          <!-- left column Ends-->

          <!-- right column Starts-->
          <div class="col-md-6">
            <!-- Form leads information -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Price Information</h3>
              </div>
              
                <!--<form class="form-horizontal">-->
                  <!-- /.card-body -->
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="seller_id" class="col-sm-4 col-form-label text-sm">Supplier Name</label>

                      <div class="col-sm-8">

                         <input type="hidden" class="form-control"  value="<?php if($post['seller_name']!="") echo $post['seller_name'] ;  ?>"  id="seller_name" name="seller_name" placeholder="Enter Seller Name">

                        <select name="seller_id" required id="seller_id"  class="form-control  form-control-sm select2" style="width: 100%;">

                        <option value="">Select supplier</option>
                        <?php foreach ($mainvendors as $categoryv) { ?>
                        <option <?php if($categoryv['user_id'] ==$post['seller_id']){ echo 'selected="selected"'; } ?> value="<?php echo $categoryv['user_id'] ?>"><?php echo $categoryv['name']?> </option>
                          <?php } ?>
                        </select>                             
                      
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="ops" class="col-sm-4 col-form-label text-sm">Stock Quantity</label>
                      <div class="col-sm-8">
                          <input type="number" name="ops" required  value="<?php echo $post['stockstatus'];  ?>" id="ops" class="form-control form-control-sm number amc" placeholder="0" min="0"  step="0.01" title="Opening Stock">
                        

                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="prate" class="col-sm-4 col-form-label text-sm">Purchase Rate</label>
                      <div class="col-sm-8">
                      <input type="number" name="prate" required value="<?php echo $post['purc'];  ?>" id="prate" class="form-control form-control-sm number amc" placeholder="0.00" min="0"  step="0.01" title="Purchase Rate">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="tax" class="col-sm-4 col-form-label text-sm">Tax %</label>
                      <div class="col-sm-8">
                        <select name="tax"  id="tax"  class="form-control  form-control-sm select2" style="width: 100%;">
                          <!-- <option value="">Select Tax</option>-->
                          <option <?php if($post['tax'] =="0" ){ echo 'selected="selected"'; } ?>   value="0% GST">0% GST</option>
                          <option <?php if($post['tax'] =="1" ){ echo 'selected="selected"'; } ?>   value="1% GST">1% GST</option>
                          <option <?php if($post['tax'] =="5" ){ echo 'selected="selected"'; } ?>   value="5% GST">5% GST</option>
                          <option <?php if($post['tax'] =="12" ){ echo 'selected="selected"'; } ?>   value="12% GST">12% GST</option>
                          <option <?php if($post['tax'] =="18" ){ echo 'selected="selected"'; } ?>   value="18% GST">18% GST</option>
                          <option <?php if($post['tax'] =="28" ){ echo 'selected="selected"'; } ?>   value="28% GST">28% GST</option>
                        </select>
                        
               
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="cost" class="col-sm-4 col-form-label text-sm">Cost</label>
                      <div class="col-sm-8">
                        <input type="number" readonly name="cost" required value="<?php echo $post['cost'];  ?>" id="cost" class="form-control form-control-sm number amc" placeholder="0.00" min="0"  step="0.01" title="Cost">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="mrp" class="col-sm-4 col-form-label text-sm">MRP</label>
                      <div class="col-sm-8">
                        <input type="number" name="mrp" required value="<?php echo $post['mrp'];  ?>" id="mrp" class="form-control form-control-sm number amc" placeholder="0.00" min="0"  step="0.01" title="MRP">
                      </div>
                    </div>

                    

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label text-sm"  for="sellerper">Sales Margin</label>
                      <div class="col-sm-8">
                        <select name="sellerper"  id="sellerper"  class="form-control  form-control-sm select2" style="width: 100%;">
                          <!--<option value="">Margin</option>-->
                          <option <?php if($post['sellerper'] =="0" ){ echo 'selected="selected"'; } ?> value="0">0</option>
                          <option <?php if($post['sellerper'] =="5" ){ echo 'selected="selected"'; } ?> value="5">5</option>
                          <option <?php if($post['sellerper'] =="10" ){ echo 'selected="selected"'; } ?> value="10">10</option>
                          <option <?php if($post['sellerper'] =="11" ){ echo 'selected="selected"'; } ?> value="11">11</option>
                          <option <?php if($post['sellerper'] =="12" ){ echo 'selected="selected"'; } ?> value="12">12</option>
                          <option <?php if($post['sellerper'] =="13" ){ echo 'selected="selected"'; } ?> value="13">13</option>
                          <option <?php if($post['sellerper'] =="14" ){ echo 'selected="selected"'; } ?> value="14">14</option>
                          <option <?php if($post['sellerper'] =="15" ){ echo 'selected="selected"'; } ?> value="15">15</option>
                          <option <?php if($post['sellerper'] =="16" ){ echo 'selected="selected"'; } ?> value="16">16</option>
                          <option <?php if($post['sellerper'] =="17" ){ echo 'selected="selected"'; } ?> value="17">17</option>
                          <option <?php if($post['sellerper'] =="18" ){ echo 'selected="selected"'; } ?> value="18">18</option>
                          <option <?php if($post['sellerper'] =="19" ){ echo 'selected="selected"'; } ?> value="19">19</option>
                          <option <?php if($post['sellerper'] =="20" ){ echo 'selected="selected"'; } ?> value="20">20</option>
                          <option <?php if($post['sellerper'] =="21" ){ echo 'selected="selected"'; } ?> value="21">21</option>
                          <option <?php if($post['sellerper'] =="22" ){ echo 'selected="selected"'; } ?> value="22">22</option>
                          <option <?php if($post['sellerper'] =="23" ){ echo 'selected="selected"'; } ?> value="23">23</option>
                          <option <?php if($post['sellerper'] =="24" ){ echo 'selected="selected"'; } ?> value="24">24</option>
                          <option <?php if($post['sellerper'] =="25" ){ echo 'selected="selected"'; } ?> value="25">25</option>
                          <option <?php if($post['sellerper'] =="26" ){ echo 'selected="selected"'; } ?> value="26">26</option>
                          <option <?php if($post['sellerper'] =="27" ){ echo 'selected="selected"'; } ?> value="27">27</option>
                          <option <?php if($post['sellerper'] =="28" ){ echo 'selected="selected"'; } ?> value="28">28</option>
                          <option <?php if($post['sellerper'] =="29" ){ echo 'selected="selected"'; } ?> value="29">29</option>
                          <option <?php if($post['sellerper'] =="30" ){ echo 'selected="selected"'; } ?> value="30">30</option>
                          <option <?php if($post['sellerper'] =="31" ){ echo 'selected="selected"'; } ?> value="31">31</option>
                          <option <?php if($post['sellerper'] =="32" ){ echo 'selected="selected"'; } ?> value="32">32</option>
                          <option <?php if($post['sellerper'] =="33" ){ echo 'selected="selected"'; } ?> value="33">33</option>
                          <option <?php if($post['sellerper'] =="34" ){ echo 'selected="selected"'; } ?> value="34">34</option>
                          <option <?php if($post['sellerper'] =="35" ){ echo 'selected="selected"'; } ?> value="35">35</option>
                          <option <?php if($post['sellerper'] =="36" ){ echo 'selected="selected"'; } ?> value="36">36</option>
                          <option <?php if($post['sellerper'] =="37" ){ echo 'selected="selected"'; } ?> value="37">37</option>
                          <option <?php if($post['sellerper'] =="38" ){ echo 'selected="selected"'; } ?> value="38">38</option>
                          <option <?php if($post['sellerper'] =="39" ){ echo 'selected="selected"'; } ?> value="39">39</option>
                          <option <?php if($post['sellerper'] =="40" ){ echo 'selected="selected"'; } ?> value="40">40</option>
                          <option <?php if($post['sellerper'] =="41" ){ echo 'selected="selected"'; } ?>  value="41">41</option>
                          <option <?php if($post['sellerper'] =="42" ){ echo 'selected="selected"'; } ?>  value="42">42</option>
                          <option <?php if($post['sellerper'] =="43" ){ echo 'selected="selected"'; } ?>  value="43">43</option>
                          <option <?php if($post['sellerper'] =="44" ){ echo 'selected="selected"'; } ?>  value="44">44</option>
                          <option <?php if($post['sellerper'] =="45" ){ echo 'selected="selected"'; } ?>  value="45">45</option>
                          <option <?php if($post['sellerper'] =="46" ){ echo 'selected="selected"'; } ?>  value="46">46</option>
                          <option <?php if($post['sellerper'] =="47" ){ echo 'selected="selected"'; } ?>  value="47">47</option>
                          <option <?php if($post['sellerper'] =="48" ){ echo 'selected="selected"'; } ?>  value="48">48</option>
                          <option <?php if($post['sellerper'] =="49" ){ echo 'selected="selected"'; } ?>  value="49">49</option>
                          <option <?php if($post['sellerper'] =="50" ){ echo 'selected="selected"'; } ?>  value="50">50</option>
                          <option <?php if($post['sellerper'] =="55" ){ echo 'selected="selected"'; } ?>  value="55">55</option>
                          <option <?php if($post['sellerper'] =="60" ){ echo 'selected="selected"'; } ?>  value="60">60</option>
                          <option <?php if($post['sellerper'] =="65" ){ echo 'selected="selected"'; } ?>  value="65">65</option>
                          <option <?php if($post['sellerper'] =="70" ){ echo 'selected="selected"'; } ?>  value="70">70</option>
                          <option <?php if($post['sellerper'] =="75" ){ echo 'selected="selected"'; } ?>  value="75">75</option>
                  
                    </select>
                       
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label text-sm" for="srate">Sale Rate</label>
                      <div class="col-sm-8">
                        <input type="number" name="srate" required value="<?php echo $post['srater'];  ?>" id="srate" class="form-control form-control-sm number amc" placeholder="0.00" min="0"  step="0.01" title="Sales Rate">
                       
                      </div>
                    </div>
                  
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label text-sm" for="description">Product Description</label>
                      <div class="col-sm-8">
                        <textarea style="min-height: 90px;" class="form-control form-control-sm" required value="<<?php echo $post['description'];  ?>" name="description" id="description" placeholder="Description" ><?php echo $post['description'];  ?></textarea>
                      </div>
                    </div>
  
              
                  <!-- /.card-body -->
                  <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-info">Sign in</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  </div> -->
                  <!-- /.card-footer -->
                <!--</form>-->
             
            </div>
            <!-- /.card Leads card-success-->
          </div>
          <!-- right column Ends-->

        </div>
        <!-- /.row -->

      </div>

      <!-- /.card-body -->
      

      <div class="card-footer">
        <button type="submit" class="btn btn-info">Update Product</button>
        <button type="button" class="btn btn-default" onClick="window.location.href = '<?php echo base_url();?>staff/products';return false;">Cancel</button>
                                                                
      </div>
      </form>
    </div>
          <!-- /.card card-default -->

  </div>
  <!-- /.container-fluid -->
</section>

</div>

