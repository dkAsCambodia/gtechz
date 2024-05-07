

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
            <h1>Add General Account Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/account_dashboard'); ?>">Dashboard</a></li>
          	  <li class="breadcrumb-item active"><a href="<?php echo site_url();?>administrator/accounts/create">Add Account</a></li>
              <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/accounts">List Account</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        
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
                                            
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Bank Account Information of Admin or Franchise</h3>

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
          
           <?php echo form_open_multipart('administrators/accounts/create'); ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>A/C Holder Name</label>
                  <input class="form-control" required   value="<?php echo set_value('ac_name');  ?>" name="ac_name" placeholder="A/C Holder Name" type="text">
                 
                </div>
                </div>
                
                
                 <div class="col-md-6">
                <div class="form-group">
                  <label>A/C Number</label>
                  <input class="form-control" required  value="<?php echo set_value('ac_number');  ?>" name="ac_number" placeholder="A/C Number" type="text">
                 
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                  <label>IFSC Code</label>
                  <input class="form-control" required  value="<?php echo set_value('branch_locn');  ?>" name="branch_locn" placeholder="IFSC" type="text">
                 
                </div>
                </div>
                
                  <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Name</label>

                  
                  
         		  <select name="bank_name" required class="form-control select2" style="width: 100%;">
            <option <?php  echo 'selected="selected"';  ?> value=" <?php echo set_value('bank_name');  ?>"> <?php echo set_value('bank_name');  ?> </option>
                  <option value="">Select Bank</option>
                  <option value="Bank of Baroda">Bank of Baroda</option>
                  <option value="Bank of India">Bank of India</option>
                  <option value="Bank of Maharashtra">Bank of Maharashtra</option>
                  <option value="Canara Bank">Canara Bank</option>
                  <option value="Central Bank of India">Central Bank of India</option>
                  <option value="Indian Bank">Indian Bank</option>
                  <option value="Indian Overseas Bank">Indian Overseas Bank</option>
                  <option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
                  <option value="Punjab National Bank">Punjab National Bank</option>
                  <option value="State Bank of India">	State Bank of India</option>
                  <option value="Union Bank of India">	Union Bank of India</option>
                  <option value="UCO Bank">UCO Bank</option>
                  <option value="Kerala Bank">Kerala Bank</option>
                  <option value="Co-Operative Bank">Co-Operative Bank</option>
                  
                  <option value="Axis Bank Ltd">Axis Bank Ltd</option>
                  <option value="Bandhan Bank Ltd">Bandhan Bank Ltd</option>
                  <option value="CSB Bank Limited">CSB Bank Limited</option>
                  <option value="City Union Bank Ltd">City Union Bank Ltd</option>
                  <option value="DCB Bank Ltd">DCB Bank Ltd</option>
                  <option value="Dhanlaxmi Bank Ltd">Dhanlaxmi Bank Ltd</option>
                  <option value="Federal Bank Ltd">Federal Bank Ltd</option>
                  <option value="HDFC Bank Ltd">HDFC Bank Ltd</option>
                  <option value="ICICI Bank Ltd">ICICI Bank Ltd</option>
                  <option value="IndusInd Bank Ltd">IndusInd Bank Ltd</option>
                  <option value="IDFC FIRST Bank Limited">IDFC FIRST Bank Limited</option>
                  <option value="Jammu & Kashmir Bank Ltd">Jammu & Kashmir Bank Ltd</option>
                  <option value="Karnataka Bank Ltd">Karnataka Bank Ltd</option>
                  <option value="Karur Vysya Bank Ltd">Karur Vysya Bank Ltd</option>
                  <option value="Kotak Mahindra Bank Ltd">Kotak Mahindra Bank Ltd</option>
                  <option value="Lakshmi Vilas Bank Ltd">Lakshmi Vilas Bank Ltd</option>
                  <option value="Nainital Bank Ltd">Nainital Bank Ltd</option>
                  <option value="RBL Bank Ltd">RBL Bank Ltd</option>
                  <option value="South Indian Bank Ltd">South Indian Bank Ltd</option>
                  <option value="Tamilnad Mercantile Bank Ltd">Tamilnad Mercantile Bank Ltd</option>
                  <option value="YES Bank Ltd">YES Bank Ltd</option>                 
                  <option value="IDBI Bank Ltd">IDBI Bank Ltd</option>
                  
                  <option value="Coastal Local Area Bank Ltd">Coastal Local Area Bank Ltd</option>
                  <option value="Krishna Bhima Samruddhi LAB Ltd">Krishna Bhima Samruddhi LAB Ltd</option>
                  <option value="Subhadra Local Bank Ltd">Subhadra Local Bank Ltd</option>
                  
                  <option value="Au Small Finance Bank Ltd">Au Small Finance Bank Ltd</option>
                  <option value="Capital Small Finance Bank Ltd">Capital Small Finance Bank Ltd</option>
                  <option value="Fincare Small Finance Bank Ltd">Fincare Small Finance Bank Ltd</option>
                  <option value="Equitas Small Finance Bank Ltd">Equitas Small Finance Bank Ltd</option>
                  <option value="ESAF Small Finance Bank Ltd">ESAF Small Finance Bank Ltd</option>
                  <option value="Suryoday Small Finance Bank Ltd">Suryoday Small Finance Bank Ltd</option>
                  <option value="Ujjivan Small Finance Bank Ltd">Ujjivan Small Finance Bank Ltd</option>
                  <option value="Utkarsh Small Finance Bank Ltd">Utkarsh Small Finance Bank Ltd</option>
                  <option value="North East Small Finance Bank Ltd">North East Small Finance Bank Ltd</option>
                  <option value="Jana Small Finance Bank Ltd">Jana Small Finance Bank Ltd</option>
                  
                  
                  <option value="Airtel Payments Bank Ltd">Airtel Payments Bank Ltd</option>
                  <option value="India Post Payments Bank Ltd">India Post Payments Bank Ltd</option>
                  <option value="FINO Payments Bank Ltd">FINO Payments Bank Ltd</option>
                  <option value="Paytm Payments Bank Ltd">Paytm Payments Bank Ltd</option>
                  <option value="Jio Payments Bank Ltd">Jio Payments Bank Ltd</option>
					  <option value="NSDL Payments Bank Limited">NSDL Payments Bank Limited</option>
                  
                  <option value="National Bank for Agriculture and Rural Development">National Bank for Agriculture and Rural Development</option>
                  <option value="Export-Import Bank of India Bank">Export-Import Bank of India Bank</option>
                  <option value="National Housing Bank">National Housing Bank</option>
                  <option value="Small Industries Development Bank of India">Small Industries Development Bank of India</option>
                  
                  
                  <option value="Assam Gramin Vikash Bank">Assam Gramin Vikash Bank</option>
                  <option value="Andhra Pradesh Grameena Vikas Bank">Andhra Pradesh Grameena Vikas Bank</option>
                  <option value="Andhra Pragathi Grameena Bank">Andhra Pragathi Grameena Bank</option>
                  <option value="Arunachal Pradesh Rural Bank">Arunachal Pradesh Rural Bank</option>
                  <option value="Aryavart Bank">Aryavart Bank</option>
                  <option value="Bangiya Gramin Vikash Bank">Bangiya Gramin Vikash Bank</option>
                  <option value="Baroda Gujarat Gramin Bank">Baroda Gujarat Gramin Bank</option>
                  <option value="Baroda Rajasthan Kshetriya Gramin Bank">Baroda Rajasthan Kshetriya Gramin Bank</option>
                  <option value="Baroda UP Bank">Baroda UP Bank</option>
                  <option value="Chaitanya Godavari GB">Chaitanya Godavari GB</option>
                  <option value="Chhattisgarh Rajya Gramin Bank">Chhattisgarh Rajya Gramin Bank</option>
                  <option value="Dakshin Bihar Gramin Bank">Dakshin Bihar Gramin Bank</option>
                  <option value="Ellaquai Dehati Bank">Ellaquai Dehati Bank</option>
                  <option value="Himachal Pradesh Gramin Bank">Himachal Pradesh Gramin Bank</option>
                  <option value="J&K Grameen Bank">J&K Grameen Bank</option>
                  <option value="Jharkhand Rajya Gramin Bank">Jharkhand Rajya Gramin Bank</option>
                  <option value="Karnataka Gramin Bank">Karnataka Gramin Bank</option>
                  <option value="Karnataka Vikas Gramin Bank">Karnataka Vikas Gramin Bank</option>
                  <option value="Kerala Gramin Bank">Kerala Gramin Bank</option>
                  <option value="Madhya Pradesh Gramin Bank">Madhya Pradesh Gramin Bank</option>
                  <option value="Madhyanchal Gramin Bank">Madhyanchal Gramin Bank</option>
                  <option value="Maharashtra Gramin Bank">Maharashtra Gramin Bank</option>
                  <option value="Manipur Rural Bank">Manipur Rural Bank</option>
                  <option value="Meghalaya Rural Bank">Meghalaya Rural Bank</option>
                  <option value="Mizoram Rural Bank">Mizoram Rural Bank</option>
                  <option value="Nagaland Rural Bank">Nagaland Rural Bank</option>
                  <option value="Odisha Gramya Bank">Odisha Gramya Bank</option>
                  <option value="Paschim Banga Gramin Bank">Paschim Banga Gramin Bank</option>
                  <option value="Prathama U.P. Gramin Bank">Prathama U.P. Gramin Bank</option>
                  <option value="Puduvai Bharathiar Grama Bank">Puduvai Bharathiar Grama Bank</option>
                  <option value="Punjab Gramin Bank">Punjab Gramin Bank</option>
                  <option value="Rajasthan Marudhara Gramin Bank">Rajasthan Marudhara Gramin Bank</option>
                  <option value="Saptagiri Grameena Bank">Saptagiri Grameena Bank</option>
                  <option value="Sarva Haryana Gramin Bank">Sarva Haryana Gramin Bank</option>
                  <option value="Saurashtra Gramin Bank">Saurashtra Gramin Bank</option>
                  <option value="Tamil Nadu Grama Bank">Tamil Nadu Grama Bank</option>
                  <option value="Telangana Grameena Bank">Telangana Grameena Bank</option>
                  <option value="Tripura Gramin Bank">Tripura Gramin Bank</option>
                  <option value="Uttar Bihar Gramin Bank">Uttar Bihar Gramin Bank</option>
                  <option value="Utkal Grameen Bank">Utkal Grameen Bank</option>
                  <option value="Uttarbanga Kshetriya Gramin Bank">Uttarbanga Kshetriya Gramin Bank</option>
                  <option value="Vidharbha Konkan Gramin Bank">Vidharbha Konkan Gramin Bank</option>
                  <option value="Uttarakhand Gramin Bank">Uttarakhand Gramin Bank</option>
                  
                  <option value="Australia and New Zealand Banking Group Ltd">Australia and New Zealand Banking Group Ltd</option>
                  <option value="National Australia Bank">National Australia Bank</option>
                  <option value="Westpac Banking Corporation">Westpac Banking Corporation</option>
                  <option value="Bank of Bahrain & Kuwait BSC">Bank of Bahrain & Kuwait BSC</option>
                  <option value="AB Bank Ltd">AB Bank Ltd</option>
                  <option value="Sonali Bank Ltd">Sonali Bank Ltd</option>
                  <option value="Bank of Nova Scotia">Bank of Nova Scotia</option>
                  <option value="Industrial & Commercial Bank of China Ltd">Industrial & Commercial Bank of China Ltd</option>
                  <option value="BNP Paribas">BNP Paribas</option>
                  <option value="Credit Agricole Corporate & Investment Bank">Credit Agricole Corporate & Investment Bank</option>
                  <option value="Societe Generale">Societe Generale</option>
                  <option value="Deutsche Bank">Deutsche Bank</option>
                  <option value="HSBC Ltd">HSBC Ltd</option>
                  <option value="PT Bank Maybank Indonesia TBK">PT Bank Maybank Indonesia TBK</option>
                  <option value="Mizuho Bank Ltd">Mizuho Bank Ltd</option>
                  <option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
                  <option value="The Bank of Tokyo- Mitsubishi UFJ, Ltd">The Bank of Tokyo- Mitsubishi UFJ, Ltd</option>
                  <option value="Cooperatieve Rabobank U.A">Cooperatieve Rabobank U.A</option>
                  <option value="Doha Bank">Doha Bank</option>
                  <option value="Qatar National Bank SAQ">Qatar National Bank SAQ</option>
                  <option value="JSC VTB Bank">JSC VTB Bank</option>
                  <option value="Sberbank">Sberbank</option>
                  <option value="DBS Bank Ltd">DBS Bank Ltd</option>
                  <option value="United Overseas Bank Ltd">United Overseas Bank Ltd</option>
                  <option value="FirstRand Bank Ltd">FirstRand Bank Ltd</option>
                  <option value="Shinhan Bank">Shinhan Bank</option>
                  <option value="Woori Bank">Woori Bank</option>
                  <option value="KEB Hana Bank">KEB Hana Bank</option>
                  <option value="Industrial Bank of Korea">Industrial Bank of Korea</option>
                  <option value="Bank of Ceylon">Bank of Ceylon</option>
                  <option value="Credit Suisse A.G">Credit Suisse A.G</option>
                  <option value="CTBC Bank Co., Ltd">CTBC Bank Co., Ltd</option>
                  <option value="Krung Thai Bank Public Co. Ltd">Krung Thai Bank Public Co. Ltd</option>
                  <option value="Abu Dhabi Commercial Bank Ltd">Abu Dhabi Commercial Bank Ltd</option>
                  <option value="Mashreq Bank PSC">Mashreq Bank PSC</option>
                  <option value="First Abu Dhabi Bank PJSC">First Abu Dhabi Bank PJSC</option>
                  <option value="Emirates NBD Bank PJSC">Emirates NBD Bank PJSC</option>
                  <option value="Barclays Bank Plc">Barclays Bank Plc</option>
                  <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                  <option value="The Royal Bank of Scotland plc">The Royal Bank of Scotland plc</option>
                  <option value="American Express Banking Corp">American Express Banking Corp</option>
                  <option value="Bank of America">Bank of America</option>
                  <option value="Citibank N.A">Citibank N.A</option>
                  <option value="J.P. Morgan Chase Bank N.A">J.P. Morgan Chase Bank N.A</option>
                  
					  </select>
                
                
                </div>
                </div>
                
                  <div class="col-md-6">
                <div class="form-group">
                  <label>Branch</label>
                  <input class="form-control" required  value="<?php echo set_value('branch_name');  ?>" name="branch_name" placeholder="Branch Name" type="text">
                 
                </div>
                </div>
                
                    <div class="col-md-6">
                <div class="form-group">
                  <label>Franchise/Admin - Unique ID  <a href="#">click here for find ID</a></label>
                  <input class="form-control" required  value="<?php echo set_value('franch_id');  ?>" name="franch_id" placeholder="Franchise Id" type="text">
                 
                </div>
                </div>
                
                
              
                <div class="col-md-6">              
               	<div class="form-group">
                  <label>Select Status</label>
                  <select name="status" required class="form-control select2" style="width: 100%;">
                        <option <?php  echo 'selected="selected"';  ?> required value=" <?php set_value('status'); ?>"> <?php echo set_value('status'); ?> </option>
                  
                    <option value="">Select a Status</option>
                    <option value="1">Active</option>
                    <option value="0">Closed</option>
                  </select>
                </div>
                <!-- /.form-group -->
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
       Please add General Account information and set a status for it. 
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

