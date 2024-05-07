

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
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('administrator/account_dashboard'); ?>">Dashboard</a></li>
          	  <li class="breadcrumb-item"><a href="<?php echo site_url();?>administrator/accounts/create">Add Account</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo site_url();?>administrator/accounts">List Account</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><?php echo $title; ?> Info</h3>

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
          
                                        
          <?php echo form_open_multipart('administrators/accounts/update'); ?>
          <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>A/C Holder Name</label>
                  <input class="form-control" required   value="<?php if(set_value('ac_name')=="") echo $post['ac_name']; else echo set_value('ac_name');  ?>" name="ac_name" placeholder="A/C Holder Name" type="text">
                 
                </div>
                </div>
                
                
                 <div class="col-md-6">
                <div class="form-group">
                  <label>A/C Number</label>
                  <input class="form-control" required  value="<?php if(set_value('ac_number')=="") echo $post['ac_number']; else echo set_value('ac_number');  ?>" name="ac_number" placeholder="A/C Number" type="text">
                 
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                  <label>IFSC Code</label>
                  <input class="form-control" required  value="<?php if(set_value('branch_locn')=="") echo $post['branch_locn']; else echo set_value('branch_locn');  ?>" name="branch_locn" placeholder="IFSC" type="text">
                 
                </div>
                </div>
                
                  <div class="col-md-6">
                <div class="form-group">
                  <label>Bank Name</label>

                  
                  
         		  <select name="bank_name" required class="form-control select2" style="width: 100%;">
            <option <?php  echo 'selected="selected"';  ?> value=" <?php if(set_value('bank_name')=="") echo $post['bank_name']; else echo set_value('bank_name');  ?>"> <?php if(set_value('bank_name')=="") echo $post['bank_name']; else echo set_value('bank_name');  ?> </option>
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
                  
                  <!--<select class="form-control white" name="ser_bankname" id="ser_bankname">
					<option value="">Select Bank</option>
					<option value="AB-BANK">AB BANK</option>
					<option value="ABHYUDAYA-CO-OPERATIVE-BANK-LTD">Abhyudaya Co-operative Bank Ltd</option>
					<option value="ABU-DHABI-COMMERCIAL-BANK">Abu Dhabi Commercial Bank</option>
					<option value="ADITYA-BIRLA-PAYMENT-BANK">Aditya Birla Payment Bank</option>
					<option value="AHMEDABAD-MERCANTILE-CO-OP-BANK-LTD">Ahmedabad Mercantile Co-Op. Bank Ltd.</option>
					<option value="AIRTEL-PAYMENTS-BANK-LIMITED">AIRTEL PAYMENTS BANK LIMITED</option>
					<option value="ALLAHABAD-BANK">Allahabad Bank</option>
					<option value="ALMORA-URBAN-CO-OP-BANK">Almora Urban Co-Op Bank</option>
					<option value="AMBARNATH-JAI-HIND-CO-OP-BANK-LTD">Ambarnath Jai-Hind Co-Op Bank Ltd.</option>
					<option value="AMERICAN-EXPRESS-BANK">American Express Bank</option>
					<option value="ANDHRA-BANK">Andhra Bank</option>
					<option value="ANDHRA-PRADESH-GRAMEENA-VIKAS-BANK">Andhra Pradesh Grameena Vikas Bank</option>
					<option value="ANDHRA-PRAGATHI-GRAMEENA-BANK">Andhra Pragathi Grameena Bank</option>
					<option value="APNA-SAHAKARI-BANK">Apna Sahakari Bank</option>
					<option value="AU-SMALL-FINANCE-BANK-LTD">AU Small Finance Bank Ltd.</option>
					<option value="AUSTRALIA-AND-NEW-ZEALAND-BANKING-GROUP">Australia And New Zealand Banking Group</option>
					<option value="AXIS-BANK">Axis Bank</option>
					<option value="BANDHAN-BANK">Bandhan Bank</option>
					<option value="BANK-INTERNASIONAL-INDONESIA--MAYA-BANK-INDONESIA-">Bank Internasional Indonesia (Maya Bank Indonesia)</option><option value="BANK-OF-AMERICA">Bank Of America</option>
					<option value="BANK-OF-BAHRAIN-AND-KUWAIT">Bank Of Bahrain And Kuwait</option>
					<option value="BANK-OF-BARODA--BOB-">Bank Of Baroda (BOB)</option>
					<option value="BANK-OF-CEYLON">Bank Of Ceylon</option>
					<option value="BANK-OF-INDIA--BOI-">Bank Of India (BOI)</option>
					<option value="BANK-OF-MAHARASHTRA">Bank Of Maharashtra</option>
					<option value="BANK-OF-RAJASTHAN">Bank Of Rajasthan</option>
					<option value="BARCLAYS-BANK">Barclays Bank</option>
					<option value="BASSEIN-CATHOLIC-CO-OPERATIVE-BANK">Bassein Catholic Co-operative Bank</option>
					<option value="BHAGINI-NIVEDITA-SAHAKARI-BANK-LTD-PUNE">Bhagini Nivedita Sahakari Bank Ltd. Pune</option>
					<option value="BHARATIYA-MAHILA-BANK--BMB-">Bharatiya Mahila Bank (BMB)</option>
					<option value="BNP-PARIBAS-BANK">BNP Paribas Bank</option>
					<option value="CANARA-BANK">Canara Bank</option>
					<option value="CAPITAL-SMALL-FINANCE-BANK">Capital Small Finance Bank</option>
					<option value="CATHOLIC-SYRIAN-BANK">Catholic Syrian Bank</option>
					<option value="CENTRAL-BANK-OF-INDIA">Central Bank Of India</option>
					<option value="CITIBANK">Citibank</option>
					<option value="CITIZEN-CREDIT-CO-OPERATIVE-BANK">Citizen Credit Co-operative Bank</option>
					<option value="CITY-UNION-BANK">City Union Bank</option>
					<option value="COMMONWEALTH-BANK-OF-AUSTRALIA">Commonwealth Bank Of Australia</option>
					<option value="CORPORATION-BANK">Corporation Bank</option>
					<option value="COSMOS-BANK">Cosmos Bank</option>
					<option value="CREDIT-AGRICOLE-CORPORATE-AND-INVESTMENT-BANK">Credit Agricole Corporate And Investment Bank</option>
					
					
					<option value="CREDIT-SUISSE-BANK">Credit Suisse Bank</option>
					<option value="CTBC-BANK">CTBC Bank</option>
					<option value="DBS-BANK">DBS Bank</option>
					<option value="DELHI-STATE-CO-OP-BANK">Delhi State Co-Op Bank</option>
					<option value="DENA-BANK">Dena Bank</option>
					<option value="DEOGIRI-NAGARI-SAHAKARI-BANK-LTD-AURANGABAD">Deogiri Nagari Sahakari Bank Ltd. Aurangabad</option>
					<option value="DEPOSIT-INSURANCE-AND-CREDIT-GUARANTEE-CORPORATION-BANK">Deposit Insurance And Credit Guarantee Corporation Bank</option>
					<option value="DEUTSCHE-BANK">Deutsche Bank</option>
					<option value="DEVELOPMENT-CREDIT-BANK">Development Credit Bank</option>
					<option value="DHANLAXMI-BANK">Dhanlaxmi Bank</option>
					<option value="DMK-JAOLI-BANK">DMK JAOLI BANK</option>
					<option value="DOHA-BANK-QSC">Doha Bank QSC</option>
					<option value="DOMBIVLI-NAGARI-SAHAKARI-BANK">Dombivli Nagari Sahakari Bank</option>
					<option value="DURGAPUR-STEEL-PEOPLES-CO-OP-BANK-LTD">Durgapur Steel Peoples Co Op Bank Ltd.</option>
					<option value="EMIRATES-NBD-BANK-P-J-S-C">EMIRATES NBD BANK P J S C</option>
					<option value="EQUITAS-SMALL-FINANCE-BANK-LIMITED">EQUITAS SMALL FINANCE BANK LIMITED</option>
					<option value="ESAF-SMALL-FINANCE-BANK-LTD">ESAF Small Finance Bank Ltd.</option>
					<option value="EXIM-BANK--EXPORT-IMPORT-BANK-OF-INDIA-">Exim Bank (Export-Import Bank Of India)</option>
					<option value="FEDERAL-BANK">Federal Bank</option><option value="FINCARE-SMALL-FINANCE-BANK">Fincare Small Finance Bank</option><option value="FINO-PAYMENTS-BANK">Fino Payments Bank</option><option value="FIRST-RAND-BANK">First Rand Bank</option><option value="G-P-PARSIK-BANK">G P Parsik Bank</option><option value="GURGAON-GRAMIN-BANK">Gurgaon Gramin Bank</option><option value="HDFC-BANK">HDFC Bank</option><option value="HIMACHAL-PRADESH-STATE-CO-OPERATIVE-BANK-LTD">Himachal Pradesh State Co-Operative Bank Ltd.</option><option value="HSBC-BANK">HSBC Bank</option><option value="HSBC-BANK-OMAN">HSBC Bank Oman</option><option value="ICICI-BANK">ICICI Bank</option><option value="IDBI-BANK">IDBI Bank</option><option value="IDFC-FIRST-BANK">IDFC First BANK</option><option value="IDRBT-BANK">IDRBT Bank</option><option value="IDUKKI-DISTRICT-CO-OPERATIVE-BANK-LTD">IDUKKI DISTRICT CO OPERATIVE BANK LTD</option><option value="INDIA-POST-PAYMENTS-BANK">India Post Payments Bank</option><option value="INDIAN-BANK">Indian Bank</option><option value="INDIAN-OVERSEAS-BANK--IOB-">Indian Overseas Bank (IOB)</option><option value="INDUSIND-BANK">IndusInd Bank</option><option value="INDUSTRIAL-AND-COMMERCIAL-BANK-OF-CHINA">Industrial And Commercial Bank Of China</option><option value="INDUSTRIAL-BANK-OF-KOREA">Industrial Bank Of Korea</option><option value="ING-VYSYA-BANK">ING Vysya Bank</option><option value="IRINJALAKUDA-TOWN-CO-OPERATIVE-BANK-LTD">Irinjalakuda Town Co-Operative Bank Ltd</option><option value="JALGAON-JANATA-SAHAKARI-BANK">Jalgaon Janata Sahakari Bank</option><option value="JAMMU---KASHMIR-BANK--J-AND-K-BANK-">Jammu &amp; Kashmir Bank (J And K Bank)</option><option value="JANA-SMALL-FINANCE-BANK">Jana Small Finance Bank</option><option value="JANAKALYAN-SAHAKARI-BANK">Janakalyan Sahakari Bank</option><option value="JANASEVA-SAHAKARI-BANK--BORIVLI-">Janaseva Sahakari Bank (Borivli)</option><option value="JANASEVA-SAHAKARI-BANK--PUNE-">Janaseva Sahakari Bank (pune)</option><option value="JANATA-SAHAKARI-BANK-LTD">Janata Sahakari Bank Ltd.</option><option value="JIO-PAYMENTS-BANK">Jio Payments Bank</option>
<option value="JPMORGAN-CHASE-BANK">JPMorgan Chase Bank</option><option value="KALLAPPANNA-AWADE-ICHALKARANJI-JANATA-SAHAKARI-BANK">Kallappanna Awade Ichalkaranji Janata Sahakari Bank</option><option value="KALUPUR-COMMERCIAL-COOPERATIVE-BANK">Kalupur Commercial Cooperative Bank</option><option value="KALYAN-JANATA-SAHAKARI-BANK">Kalyan Janata Sahakari Bank</option><option value="KANGRA-CO-OPERATIVE-BANK">Kangra Co-Operative Bank</option><option value="KAPOL-CO-OPERATIVE-BANK">Kapol Co-Operative Bank</option><option value="KARAD-URBAN-CO-OPERATIVE-BANK">Karad Urban Co-Operative Bank</option><option value="KARNATAKA-BANK">Karnataka Bank</option><option value="KARNATAKA-VIKAS-GRAMEENA-BANK">Karnataka Vikas Grameena Bank</option><option value="KARUR-VYSYA-BANK">Karur Vysya Bank</option><option value="KAVERI-GRAMEENA-BANK">Kaveri Grameena Bank</option><option value="KEB-HANA-BANK">KEB Hana Bank</option><option value="KERALA-GRAMIN-BANK">Kerala Gramin Bank</option><option value="KOOKMIN-BANK">Kookmin Bank</option><option value="KOTAK-MAHINDRA-BANK">Kotak Mahindra Bank</option><option value="KOZHIKODE-DISTRICT-CO--OPERATIVE-BANK">Kozhikode District Co- Operative Bank</option><option value="KRUNG-THAI-BANK">Krung Thai Bank</option><option value="LAKSHMI-VILAS-BANK">Lakshmi Vilas Bank</option><option value="MAHANAGAR-CO-OPERATIVE-BANK">Mahanagar Co-Operative Bank</option><option value="MAHARASHTRA-GRAMIN-BANK">Maharashtra Gramin Bank</option><option value="MAHARASHTRA-STATE-CO-OP-BANK">Maharashtra State Co-Op. Bank</option><option value="MAHESH-SAHAKARI-BANK-LTD-PUNE">Mahesh Sahakari Bank Ltd. Pune</option><option value="MASHREQ-BANK">Mashreq Bank</option><option value="MEHSANA-URBAN-CO-OP-BANK">Mehsana Urban Co-Op. Bank</option><option value="MIZUHO-CORPORATE-BANK">Mizuho Corporate Bank</option><option value="MODEL-CO-OPERATIVE-BANK-LTD">Model Co-operative Bank Ltd.</option><option value="MUMBAI-DISTRICT-CENTRAL-CO-OP-BANK">Mumbai District Central Co-Op. Bank</option><option value="MUNICIPAL-CO-OPERATIVE-BANK">Municipal Co-Operative Bank</option><option value="MUSLIM-CO-OP-BANK">Muslim Co Op Bank</option><option value="NAGAR-URBAN-CO-OP-BANK">Nagar Urban Co-Op. Bank</option><option value="NAGPUR-NAGARIK-SAHAKARI-BANK">Nagpur Nagarik Sahakari Bank</option><option value="NAINITAL-BANK">Nainital Bank</option><option value="NASIK-MERCHANTS-CO-OP-BANK">Nasik Merchants Co-Op. Bank</option><option value="NATIONAL-AUSTRALIA-BANK">National Australia Bank</option><option value="NATIONAL-BANK-FOR-AGRICULTURE-AND-RURAL-DEVELOPMENT">National Bank For Agriculture And Rural Development</option><option value="NATIONAL-BANK-OF-ABU-DHABI-PJSC">National Bank Of Abu Dhabi PJSC</option><option value="NAV-JEEVAN-CO-OP-BANK-LTD">Nav Jeevan Co Op Bank Ltd.</option><option value="NEW-INDIA-CO-OP-BANK">New India Co-Op. Bank</option><option value="NILAMBUR-CO-OPERATIVE-URBAN-BANK">Nilambur Co Operative Urban Bank</option><option value="NKGSB-CO-OP-BANK">NKGSB Co-Op. Bank</option><option value="NORTH-EAST-SMALL-FINANCE-BANK">North East Small Finance Bank</option><option value="NORTH-MALABAR-GRAMIN-BANK">North Malabar Gramin Bank</option><option value="NSDL-PAYMENT-BANK">NSDL Payment Bank</option><option value="NUTAN-NAGARIK-SAHAKARI-BANK-LTD">Nutan Nagarik Sahakari Bank Ltd.</option><option value="ODISHA-STATE-COOPERATIVE-BANK">Odisha State Cooperative Bank</option><option value="OMAN-INTERNATIONAL-BANK">Oman International Bank</option><option value="ORIENTAL-BANK-OF-COMMERCE--OBC-">Oriental Bank Of Commerce (OBC)</option><option value="PAYTM-PAYMENTS-BANK-LTD">Paytm Payments Bank Ltd.</option><option value="PRAGATHI-KRISHNA-GRAMIN-BANK">Pragathi Krishna Gramin Bank</option><option value="PRATHAMA-BANK">Prathama Bank</option><option value="PRIME-CO--OPERATIVE-BANK-LTD">Prime Co- Operative Bank Ltd.</option><option value="PUNJAB---SIND-BANK">Punjab &amp; Sind Bank</option><option value="PUNJAB-AND-MAHARASHTRA-CO-OP-BANK">Punjab And Maharashtra Co-Op. Bank</option><option value="PUNJAB-NATIONAL-BANK--PNB-">Punjab National Bank (PNB)</option><option value="PUSAD-URBAN-CO-OPERATIVE-BANK-LTD">Pusad Urban Co Operative Bank Ltd.</option><option value="QATAR-NATIONAL-BANK-SAQ">QATAR NATIONAL BANK SAQ</option><option value="RABOBANK">Rabobank</option><option value="RAJARAMBAPU-SAHAKARI-BANK-LTD">Rajarambapu Sahakari Bank Ltd.</option><option value="RAJARSHI-SHAHU-SAHAKARI-BANK">Rajarshi Shahu Sahakari Bank</option><option value="RAJASTHAN-MARUDHARA-GRAMIN-BANK">Rajasthan Marudhara Gramin Bank</option><option value="RAJASTHAN-STATE-CO-OPERATIVE-BANK">Rajasthan State Co-operative Bank</option><option value="RAJGURUNAGAR-SAHAKARI-BANK">Rajgurunagar Sahakari Bank</option><option value="RAJKOT-NAGARIK-SAHAKARI-BANK">Rajkot Nagarik Sahakari Bank</option><option value="RBL-BANK--RATNAKAR-BANK-">RBL Bank (Ratnakar Bank)</option><option value="RESERVE-BANK-OF-INDIA--RBI-">Reserve Bank Of India (RBI)</option><option value="SAHEBRAO-DESHMUKH-CO-OP-BANK">Sahebrao Deshmukh Co-Op Bank</option><option value="SAMARTH-SAHAKARI-BANK-LTD">Samarth Sahakari Bank Ltd.</option><option value="SANT-SOPANKAKA-SAHAKARI-BANK-LTD">SANT SOPANKAKA SAHAKARI BANK LTD</option><option value="SARASPUR-NAGRIK-CO-OPERATIVE-BANK-LTD">Saraspur Nagrik Co Operative Bank Ltd.</option><option value="SARASWAT-BANK">Saraswat Bank</option><option value="SBER-BANK">SBER Bank</option><option value="SCOTIA-BANK">Scotia Bank</option><option value="SEVA-VIKAS-CO-OP-BANK">Seva Vikas Co-op Bank</option><option value="SHIKSHAK-SAHAKARI-BANK">Shikshak Sahakari Bank</option><option value="SHINHAN-BANK">Shinhan Bank</option><option value="SHIVALIK-MERCANTILE-COOPERATIVE-BANK-LTD">Shivalik Mercantile Cooperative Bank Ltd.</option><option value="SHRI-CHHATRAPATI-RAJARSHI-SHAHU-URBAN-CO-OP-BANK">Shri Chhatrapati Rajarshi Shahu Urban Co-op Bank</option><option value="SHRI-VEERSHAIV-CO-OP-BANK-LTD">Shri Veershaiv Co-Op Bank Ltd.</option><option value="SIR-M-VISVESVARAYA-CO-OP-BANK-LTD">SIR M. Visvesvaraya Co-Op Bank Ltd.</option><option value="SMALL-INDUSTRY-DEVELOPMENT-BANK-OF-INDIA">Small Industry Development Bank Of India</option><option value="SOCIETE-GENERALE">Societe Generale</option><option value="SOLAPUR-JANATA-SAHAKARI-BANK">Solapur Janata Sahakari Bank</option><option value="SONALI-BANK-LTD">Sonali Bank Ltd.</option><option value="SOUTH-INDIAN-BANK">South Indian Bank</option><option value="STANDARD-CHARTERED-BANK--SCB-">Standard Chartered Bank (SCB)</option><option value="STATE-BANK-OF-BIKANER---JAIPUR">State Bank Of Bikaner &amp; Jaipur</option><option value="STATE-BANK-OF-HYDERABAD--SBH-">State Bank Of Hyderabad (SBH)</option><option value="STATE-BANK-OF-INDIA--SBI-">State Bank Of India (SBI)</option><option value="STATE-BANK-OF-MAURITIUS">State Bank Of Mauritius</option><option value="STATE-BANK-OF-MYSORE">State Bank Of Mysore</option><option value="STATE-BANK-OF-PATIALA">State Bank Of Patiala</option><option value="STATE-BANK-OF-TRAVANCORE">State Bank Of Travancore</option><option value="SUCO-BANK">SUCO Bank</option><option value="SUMITOMO-MITSUI-BANKING-CORPORATION">Sumitomo Mitsui Banking Corporation</option><option value="SURAT-NATIONAL-CO-OP-BANK-SNCB-">Surat National Co-Op Bank(SNCB)</option><option value="SURYODAY-SMALL-FINANCE-BANK-LIMITED">Suryoday Small Finance Bank Limited</option><option value="SYNDICATE-BANK">Syndicate Bank</option><option value="TAMILNAD-MERCANTILE-BANK-LIMITED">Tamilnad Mercantile Bank Limited</option><option value="TELANGANA-STATE-CO-OPERATIVE-APEX-BANK-LTD">Telangana State Co-Operative Apex Bank Ltd.</option><option value="TEXTILE-TRADERS-CO-OPERATIVE-BANK-LTD">Textile Traders Co-Operative Bank Ltd</option><option value="THANE-BHARAT-SAHAKARI-BANK">Thane Bharat Sahakari Bank</option><option value="THE-A-P-MAHESH-CO-OP-URBAN-BANK">The A P Mahesh Co-Op Urban Bank</option><option value="THE-AHMEDNAGAR-MERCHANT-CO-OP-BANK-LTD">The Ahmednagar Merchant Co-Op Bank Ltd.</option><option value="THE-AJARA-URBAN-COOPERATIVE-BANK-LIMITED-AJARA">The Ajara Urban Cooperative Bank Limited, Ajara</option><option value="THE-AKOLA-DISTRICT-CENTRAL-CO-OP-BANK">The Akola District Central Co-Op. Bank</option><option value="THE-AKOLA-JANATA-COMMERCIAL-CO-OP-BANK">The Akola Janata Commercial Co-Op. Bank</option><option value="THE-ANDHRA-PRADESH-STATE-CO-OP-BANK">The Andhra Pradesh State Co-Op Bank</option><option value="THE-BANK-OF-TOKYO-MITSUBISHI-UFJ">The Bank Of Tokyo-Mitsubishi UFJ</option><option value="THE-BARAMATI-SAHAKARI-BANK-LTD">The Baramati Sahakari Bank Ltd.</option><option value="THE-BHARAT-CO-OPERATIVE-BANK-MUMBAI">The Bharat Co-operative Bank Mumbai</option><option value="THE-GADCHIROLI-DISTRICT-CENTRAL-CO-OP-BANK">The Gadchiroli District Central Co-Op Bank</option><option value="THE-GREATER-BOMBAY-CO-OP-BANK">The Greater Bombay Co-op Bank</option><option value="THE-GUJARAT-STATE-CO-OP-BANK">The Gujarat State Co-Op Bank</option><option value="THE-HARYANA-STATE-CO-OP-APEX-BANK-LTD">The Haryana State Co-Op Apex Bank Ltd.</option><option value="THE-HASTI-CO-OP-BANK">The Hasti Co-Op. Bank</option><option value="THE-JALGAON-PEOPLES-CO-OP-BANK">The Jalgaon Peoples Co-Op Bank</option><option value="THE-KANGRA-CENTRAL-CO-OP-BANK">The Kangra Central Co-Op Bank</option><option value="THE-KARNATAKA-STATE-CO-OP-APEX-BANK">The Karnataka State Co-Op Apex Bank</option><option value="THE-KERALA-STATE-CO-OPERATIVE-BANK-LTD">The Kerala State Co Operative Bank Ltd</option><option value="THE-KURMANCHAL-NAGAR-SAHAKARI-BANK">The Kurmanchal Nagar Sahakari Bank</option><option value="THE-MALKAPUR-URBAN-CO-OP-BANK-LTD-MALKAPUR">The Malkapur Urban Co Op Bank Ltd. Malkapur</option><option value="THE-NAVNIRMAN-CO-OP-BANK-LTD">The Navnirman Co-Op Bank Ltd.</option><option value="THE-PANDHARPUR-URBAN-CO-OP-BANK">The Pandharpur Urban Co-Op Bank</option><option value="THE-ROYAL-BANK-OF-SCOTLAND">The Royal Bank Of Scotland</option><option value="THE-SATARA-SAHAKARI-BANK-LTD">The Satara Sahakari Bank Ltd.</option><option value="THE-SHAMRAO-VITHAL-CO-OPERATIVE-BANK">The Shamrao Vithal Co-operative Bank</option><option value="THE-SINDHUDURG-DISTRICT-CENTRAL-CO--OP-BANK-LTD">The Sindhudurg District Central Co- Op Bank Ltd.</option><option value="THE-SURAT-DISTRICT-CO-OP-BANK">The Surat District Co-Op Bank</option><option value="THE-SURAT-PEOPLES-CO-OP-BANK">The Surat Peoples Co-Op Bank</option><option value="THE-SUTEX-CO-OP-BANK">The Sutex Co-Op Bank</option><option value="THE-TAMILNADU-STATE-APEX-CO-OP-BANK">The Tamilnadu State Apex Co-Op Bank</option><option value="THE-THANE-DISTRICT-CENTRAL-CO-OP-BANK">The Thane District Central Co-Op Bank</option><option value="THE-UDAIPUR-URBAN-COOPERATIVE-BANK">The Udaipur Urban Cooperative Bank</option><option value="THE-URBAN-CO-OPERATIVE-BANK-LTD-PERINTHALMANNA">THE URBAN CO OPERATIVE BANK Ltd, PERINTHALMANNA</option><option value="THE-VARACHHA-CO--OPERATIVE-BANK">The Varachha Co- Operative Bank</option><option value="THE-VIJAY-CO-OPERATIVE-BANK">The Vijay Co Operative Bank</option><option value="THE-VISHWESHWAR-SAHAKARI-BANK">The Vishweshwar Sahakari Bank</option><option value="THE-WEST-BANGAL-STATE-CO-OPERATIVE-BANK">The West Bangal State Co-Operative Bank</option><option value="THRISSUR-DISTRICT-CO-OP-BANK-LTD">Thrissur District Co Op Bank Ltd.</option><option value="TJSB-SAHAKARI-BANK">TJSB Sahakari Bank</option><option value="TUMKUR-GRAIN-MERCHANTS-CO-OP-BANK">Tumkur Grain Merchants Co-Op Bank</option><option value="UBS-AG-BANK">UBS AG Bank</option><option value="UCO-BANK">UCO Bank</option><option value="UJJIVAN-SMALL-FINANCE-BANK-LTD">Ujjivan Small Finance Bank Ltd.</option><option value="UNION-BANK-OF-INDIA">Union Bank Of India</option><option value="UNITED-BANK-OF-INDIA">United Bank Of India</option><option value="UNITED-OVERSEAS-BANK">United Overseas Bank</option><option value="UTKARSH-SMALL-FINANCE-BANK">Utkarsh Small Finance Bank</option><option value="UTTAR-PRADESH-CO-OPERATIVE-BANK-LTD">Uttar Pradesh Co Operative Bank Ltd.</option><option value="VASAI-JANATA-SAHAKARI-BANK-LTD">Vasai Janata Sahakari Bank Ltd.</option><option value="VASAI-VIKAS-SAHAKARI-BANK">Vasai Vikas Sahakari Bank</option><option value="VIJAYA-BANK">Vijaya Bank</option><option value="VTB-BANK">VTB BANK</option><option value="WESTPAC-BANKING-CORPORATION">Westpac Banking Corporation</option><option value="WOORI-BANK">Woori Bank</option><option value="YES-BANK">Yes Bank</option><option value="ZILA-SAHAKARI-BANK-GAZIABAD">Zila Sahakari Bank Gaziabad</option><option value="ZOROASTRIAN-BANK">Zoroastrian Bank</option>
</select>-->
                 
                </div>
                </div>
                
                  <div class="col-md-6">
                <div class="form-group">
                  <label>Branch</label>
                  <input class="form-control" required  value="<?php if(set_value('branch_name')=="") echo $post['branch_name']; else echo set_value('branch_name');  ?>" name="branch_name" placeholder="Branch Name" type="text">
                 
                </div>
                </div>
                
                    <div class="col-md-6">
                <div class="form-group">
                  <label>Franchise/Admin - Unique ID  <a href="#">click here for find ID</a></label>
                  <input class="form-control" required  value="<?php if(set_value('franch_id')=="") echo $post['franch_id']; else echo set_value('franch_id');  ?>" name="franch_id" placeholder="Franchise Id" type="text">
                 
                </div>
                </div>
                
                 <div class="col-md-6">
                <div class="form-group">
                  <label>Created Date</label>
                    <input class="form-control" readonly   value="<?php echo $post['created_date']; ?>" name="type" placeholder="DateTime" type="text">
                </div>
                <!-- /.form-group -->
                
                
              </div>
               
                <div class="col-md-6">              
               	<div class="form-group">
                  <label>Select Status</label>
                  <select name="status" required class="form-control select2" style="width: 100%;">
                    		<option <?php if($post['status'] ==1 ){ echo 'selected="selected"'; } ?> value="1">Active </option>

                                                                    <option value="">Select a Status</option>
                                                                    <option <?php if($post['status'] ==1 ){ echo 'selected="selected"'; } ?> value="1">Active</option>
                                                                    <option <?php if($post['status'] ==0 ){ echo 'selected="selected"'; } ?> value="0">Closed</option>
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
           Please edit General Account information and set a status for it.
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

