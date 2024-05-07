      <!--app-content open-->
      <div class="app-content main-content mt-0">
        <div class="side-app">
           <!-- CONTAINER -->
          <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
              <div>
                <h1 class="page-title"><?php echo $title; ?></h1>
              </div>
              <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('sadministrator/dashboard'); ?>">Home</a></li>
                  <li class="breadcrumb-item"  aria-current="page">Accounts</li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url('sadministrator/accounts/merchants-banks'); ?>">Merchant-Bank Accounts</a></li>
                </ol>
              </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->

            <input type="hidden" name="mlistbankac" id="mlistbankac" value="<?php echo 1; //$post['id']; ?>">
            <div class="row">
            </div>
            <!-- ROW-1 END-->
            <!-- Row -->
              <div class="row row-sm">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header border-bottom">
                      <h3 class="card-title">Bank Accounts</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100" >
                          <thead>
                            <tr>                              
                              <th class="bg-transparent border-bottom-0">#</th>
                              <th class="bg-transparent border-bottom-0">Merchant_ID</th>
                              <th class="bg-transparent border-bottom-0">Merchant_Name</th>
                              <th class="bg-transparent border-bottom-0">Account Holder</th>
                              <th class="bg-transparent border-bottom-0">Acc.Number</th>
                              <th class="bg-transparent border-bottom-0">IFSC/Routing</th>
                              <th class="bg-transparent border-bottom-0">SWIFT</th>
                              <th class="bg-transparent border-bottom-0">Bank Name</th>
                              <th class="bg-transparent border-bottom-0">Dated</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach($posts as $blog) : ?>
                            <tr>
                              <td class="text-muted fs-12 fw-semibold"><a href="#" class="text-dark" data-bs-target="#editmbankac<?php echo $blog['id'];?>" data-bs-toggle="modal" ><?php echo $i++; //echo $blog['id']; ?></a></td>
                              <td class="text-primary fs-12 fw-semibold">
                                <a href="#" class="text-dark" data-bs-target="#editmbankac<?php echo $blog['id'];?>" data-bs-toggle="modal" >
                                  <div class="btn-list btn-animation">
                                    <button type="button" class="btn btn-info btn-spinners ms-2"><span class="loading"><?php echo $blog['merchant_id']; ?></span>
                                    </button>
                                  </div>
                                </a>
                              </td>
                              <td class="text-primary fs-12 fw-semibold"><a href="#" class="" data-bs-target="#editmbankac<?php echo $blog['id'];?>" data-bs-toggle="modal" ><?php echo $blog['merchant_name']; ?></a></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['ac_name']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['ac_number']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['bank_ifsc']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['bank_swiftcode']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['bank_name']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['created_date']; ?></td>
                            </tr>
                            <!--Edit ZAFFRAN BANK ACCOUNTS-->
                            <div class="modal fade editmbankac" id="editmbankac<?php echo $blog['id'];?>"  role="document">
                              <div class="modal-dialog modal-dialog-centered task-view-modal">
                                <div class="modal-content modal-content-demo">
                                  <div class="modal-header bg-primary  p-3">
                                    <h4 class="modal-title text-white">#Merchant ID - <?php echo $blog['merchant_id'];?></h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Row Elements -->
                                    <div class="row">
                                        <input type="hidden" name="zedbankid" id="zedbankid" value="<?php echo $blog['id']; ?>">
                                        <p id="" align="center" class="alert-success statusMsg"></p>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbname" class="mb-2 m-0 text-muted text-sm">Name</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edbname" name="edbname" placeholder="Account Holder's Name" value="<?php echo $blog['ac_name']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbaddress" class="mb-2 m-0 text-muted text-sm">Address</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edbaddress" name="edbaddress" placeholder="Account Holder's Address" value="<?php echo $blog['ac_address']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbaccno" class="mb-2 m-0 text-muted text-sm">Account Number</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edbaccno" name="edbaccno" placeholder="Account Number" value="<?php echo $blog['ac_number']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbaccifsc" class="mb-2 m-0 text-muted text-sm">IFSC/Routing Number</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edbaccifsc" name="edbaccifsc" placeholder="IFSC/Routing Number" value="<?php echo $blog['bank_ifsc']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbaccswift" class="mb-2 m-0 text-muted text-sm">SWIFT CODE</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edbaccswift" name="edbaccswift" placeholder="SWIFT CODE" value="<?php echo $blog['bank_swiftcode']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbbankname">Bank Name</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edbbankname" name="edbbankname" placeholder="Bank Name" value="<?php echo $blog['bank_name']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbbankaddress" class="mb-2 m-0 text-muted text-sm">Bank Address</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edbbankaddress" name="edbbankaddress" placeholder="Account Holder's Name" value="<?php echo $blog['branch_name']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div id="edbcurrent" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5" >
                                            <label for="edbcurrency" class="mb-1 m-0 text-muted text-sm">Requested Currency</label>
                                            <select class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Currency" readonly disabled tabindex="-1" aria-hidden="true" id="edbcurrency" name="edbcurrency">

                                              <option label="Choose one"></option>
                                              <option <?php if($blog['currency'] =="AUD" ){ echo 'selected="selected"'; } ?> value="AUD">AUD </option>
                                              <option <?php if($blog['currency'] =="BTC" ){ echo 'selected="selected"'; } ?> value="BTC">BTC</option>
                                              <option <?php if($blog['currency'] =="CAD" ){ echo 'selected="selected"'; } ?> value="CAD">CAD</option>
                                              <option <?php if($blog['currency'] =="CNY" ){ echo 'selected="selected"'; } ?> value="CNY">CNY</option>
                                              <option <?php if($blog['currency'] =="CZK" ){ echo 'selected="selected"'; } ?> value="CZK">CZK</option>
                                              <option <?php if($blog['currency'] =="EUR" ){ echo 'selected="selected"'; } ?> value="EUR">EUR</option>
                                              <option <?php if($blog['currency'] =="GBP" ){ echo 'selected="selected"'; } ?> value="GBP">GBP</option>
                                              <option <?php if($blog['currency'] =="HKD" ){ echo 'selected="selected"'; } ?> value="HKD">HKD</option>
                                              <option <?php if($blog['currency'] =="IDR" ){ echo 'selected="selected"'; } ?> value="IDR">IDR</option>
                                              <option <?php if($blog['currency'] =="INR" ){ echo 'selected="selected"'; } ?> value="INR">INR</option>
                                              <option <?php if($blog['currency'] =="JPY" ){ echo 'selected="selected"'; } ?> value="JPY">JPY</option>
                                              <option <?php if($blog['currency'] =="KHR" ){ echo 'selected="selected"'; } ?> value="KHR">KHR</option>
                                              <option <?php if($blog['currency'] =="MXN" ){ echo 'selected="selected"'; } ?> value="MXN">MXN</option>
                                              <option <?php if($blog['currency'] =="MYR" ){ echo 'selected="selected"'; } ?> value="MYR">MYR</option>
                                              <option <?php if($blog['currency'] =="PHP" ){ echo 'selected="selected"'; } ?> value="PHP">PHP</option>
                                              <option <?php if($blog['currency'] =="PLN" ){ echo 'selected="selected"'; } ?> value="PLN">PLN</option>
                                              <option <?php if($blog['currency'] =="SGD" ){ echo 'selected="selected"'; } ?> value="SGD">SGD</option>
                                              <option <?php if($blog['currency'] =="THB" ){ echo 'selected="selected"'; } ?> value="THB">THB</option>
                                              <option <?php if($blog['currency'] =="USD" ){ echo 'selected="selected"'; } ?> value="USD">USD</option>
                                              <option <?php if($blog['currency'] =="VND" ){ echo 'selected="selected"'; } ?> value="VND">VND</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbfee">Withdraw Fee- %</label>
                                            <input type="number" readonly class="form-control form-control-sm" id="edbfee" name="edbfee" placeholder="Withdraw Fee- %" value="<?php echo $blog['withdrafee']; ?>"  required>
                                            <div class="invalid-feedback">Please provide a valid Number.</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                              <label for="edbadditional">Additional Information</label>
                                              <input type="text" readonly class="form-control form-control-sm" id="edbadditional" name="edbadditional" placeholder="Additional Information" value="<?php echo $blog['description']; ?>" >
                                              <div class="invalid-feedback">Please provide Information.</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbdocument">Bank Document-
                                            <?php if($blog['documen']!="") { ?>
                                              <a target="_blank" href="<?php echo site_url();?>assets/images/banks/<?php echo $blog['documen']; ?>"><?php echo $blog['documen']; ?></a>
                                            <?php } else {?>
                                              <?php echo "Choose File"; } ?>

                                              </label>
                                            <input class="form-control file-input form-control-sm" id="edbdocument" name="edbdocument" type="file" disabled readonly value="<?php echo $blog['documen']; ?>">
                                            <input type="hidden" name="fu" id="fu" value="<?php echo $blog['documen']; ?>">
                                            <div class="invalid-feedback">Please provide a valid document.</div>
                                          </div>
                                          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                                            <label for="edbnickname">Account Nick Name</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edbnickname" name="edbnickname" placeholder="Account Nick Name" value="<?php echo $blog['nickname']; ?>" >
                                            <div class="invalid-feedback">Please provide a nick name.</div>
                                          </div>
                                          <div id="edbdefau" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                                            <label for="edbdefault">Mark as Default</label>
                                            <select readonly disabled class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Default" tabindex="-1" aria-hidden="true" id="edbdefault" name="edbdefault" >
                                              <option <?php if($blog['defaul'] ==1 ){ echo 'selected="selected"'; } ?> value="1">YES</option>
                                              <!-- defaul -->
                                              <option label="Choose one"></option>
                                              <option <?php if($blog['defaul'] ==1 ){ echo 'selected="selected"'; } ?> value="1">YES</option>
                                              <option <?php if($blog['defaul'] ==0 ){ echo 'selected="selected"'; } ?> value="0">NO</option>
                                            </select>
                                            <div class="invalid-feedback">Please provide a valid document.</div>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-5 bg-primary">
                                        </div>
                                        <div class="form-group text-center">
                                          
                                        </div>
                                      
                                    </div>
                                    <!-- Row Elements -->
                                  </div>
                                  <!-- Modal-Body -->
                                  <div class="modal-footer p-0 border-top-0">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--Edit ZAFFRAN BANK ACCOUNTS-->
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Row -->

          </div>
        </div>
      </div>
      <!-- CONTAINER END -->
    </div>

    <!-- Country-selector modal-->
    <div class="modal fade" id="country-selector">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content country-select-modal">
          <div class="modal-header">
            <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <ul class="row row-sm p-3">
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block active">
                  <span class="country-selector"><img alt="unitedstates" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/us_flag.jpg" class="me-2 language"></span>United States
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="italy" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/italy_flag.jpg" class="me-2 language"></span>Italy
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="spain" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/spain_flag.jpg" class="me-2 language"></span>Spain
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="india" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/india_flag.jpg" class="me-2 language"></span>India
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="french" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/french_flag.jpg" class="me-2 language"></span>French
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="russia" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/russia_flag.jpg" class="me-2 language"></span>Russia
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="germany" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/germany_flag.jpg" class="me-2 language"></span>Germany
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="argentina" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/argentina_flag.jpg" class="me-2 language"></span>Argentina
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                    <span class="country-selector"><img alt="uae" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/uae_flag.jpg" class="me-2 language"></span>UAE
                                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="austria" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/austria_flag.jpg" class="me-2 language"></span>Austria
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="mexico" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/mexico_flag.jpg" class="me-2 language"></span>Mexico
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                    <span class="country-selector"><img alt="china" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/china_flag.jpg" class="me-2 language"></span>China
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="poland" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/poland_flag.jpg" class="me-2 language"></span>Poland
                  </a>
              </li>
              <li class="col-lg-4 mb-2">\
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="canada" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/canada_flag.jpg" class="me-2 language"></span>Canada
                </a>
              </li>
              <li class="col-lg-4 mb-2">
                <a class="btn btn-country btn-lg btn-block">
                  <span class="country-selector"><img alt="malaysia" src="<?php echo base_url(); ?>assets/adminz/assets/images/flags/malaysia_flag.jpg" class="me-2 language"></span>Malaysia
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /Country-selector modal-->