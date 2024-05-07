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
                  <li class="breadcrumb-item active"  aria-current="page"><a href="<?php echo base_url('sadministrator/accounts'); ?>">Bank Accounts</a></li>
                </ol>
              </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->

            <input type="hidden" name="maddbankac" id="maddbankac" value="<?php echo 1; //$post['id']; ?>">
            <div class="row">
              <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
                <div class="card overflow-hidden">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <!-- <a href="#" class="" data-bs-target="#addbankac" data-bs-toggle="modal" >test
                        </a> -->
                          <a href="#" class=""  data-backdrop="static" data-keyboard="false"  data-bs-target="#addbankac" data-bs-toggle="modal" >

                          <h3 class="mb-2 fw-semibold">Add New</h3>
                          <p class="text-muted fs-13 mb-0">Bank Account</p>
                          <p class="text-muted mb-0 mt-2 fs-12">
                            <span class="icn-box text-success fw-semibold fs-13 me-1">
                              <i class='fa fa-long-arrow-up'></i>
                              For</span>
                            Zaffran PSP
                          </p>
                        </a>
                      </div>
                    
                      <div class="col col-auto top-icn dash">
                        <div class="counter-icon bg-primary dash ms-auto box-shadow-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M12,8c-2.2091675,0-4,1.7908325-4,4s1.7908325,4,4,4c2.208252-0.0021973,3.9978027-1.791748,4-4C16,9.7908325,14.2091675,8,12,8z M12,15c-1.6568604,0-3-1.3431396-3-3s1.3431396-3,3-3c1.6561279,0.0018311,2.9981689,1.3438721,3,3C15,13.6568604,13.6568604,15,12,15z M21.960022,11.8046875C19.9189453,6.9902344,16.1025391,4,12,4s-7.9189453,2.9902344-9.960022,7.8046875c-0.0537109,0.1246948-0.0537109,0.2659302,0,0.390625C4.0810547,17.0097656,7.8974609,20,12,20s7.9190063-2.9902344,9.960022-7.8046875C22.0137329,12.0706177,22.0137329,11.9293823,21.960022,11.8046875z M12,19c-3.6396484,0-7.0556641-2.6767578-8.9550781-7C4.9443359,7.6767578,8.3603516,5,12,5s7.0556641,2.6767578,8.9550781,7C19.0556641,16.3232422,15.6396484,19,12,19z"/></svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
                <div class="card overflow-hidden">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h3 class="mb-2 fw-semibold"><?php echo count($posts);//$posts[0]['ac_name']; ?></h3>
                        <p class="text-muted fs-13 mb-0">Bank Accounts</p>
                        <p class="text-muted mb-0 mt-2 fs-12">
                          <span class="icn-box text-danger fw-semibold fs-13 me-1">
                            <i class='fa fa-long-arrow-down'></i>
                            For</span>
                          Zaffran PSP
                        </p>
                      </div>
                      <div class="col col-auto top-icn dash">
                        <div class="counter-icon bg-secondary dash ms-auto box-shadow-secondary">
                          <svg xmlns="http://www.w3.org/2000/svg" class="fill-white" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M19.5,7H16V5.9169922c0-2.2091064-1.7908325-4-4-4s-4,1.7908936-4,4V7H4.5C4.4998169,7,4.4996338,7,4.4993896,7C4.2234497,7.0001831,3.9998169,7.223999,4,7.5V19c0.0018311,1.6561279,1.3438721,2.9981689,3,3h10c1.6561279-0.0018311,2.9981689-1.3438721,3-3V7.5c0-0.0001831,0-0.0003662,0-0.0006104C19.9998169,7.2234497,19.776001,6.9998169,19.5,7z M9,5.9169922c0-1.6568604,1.3431396-3,3-3s3,1.3431396,3,3V7H9V5.9169922z M19,19c-0.0014038,1.1040039-0.8959961,1.9985962-2,2H7c-1.1040039-0.0014038-1.9985962-0.8959961-2-2V8h3v2.5C8,10.776123,8.223877,11,8.5,11S9,10.776123,9,10.5V8h6v2.5c0,0.0001831,0,0.0003662,0,0.0005493C15.0001831,10.7765503,15.223999,11.0001831,15.5,11c0.0001831,0,0.0003662,0,0.0006104,0C15.7765503,10.9998169,16.0001831,10.776001,16,10.5V8h3V19z"/></svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
                              <!-- <th class="border-bottom-0">Salary</th> -->
                              <th class="bg-transparent border-bottom-0">#</th>
                              <th class="bg-transparent border-bottom-0">Account Holder</th>
                              <th class="bg-transparent border-bottom-0">Acc.Number</th>
                              <th class="bg-transparent border-bottom-0">IFSC/Routing</th>
                              <th class="bg-transparent border-bottom-0">SWIFT</th>
                              <th class="bg-transparent border-bottom-0">Bank Name</th>
                              <th class="bg-transparent border-bottom-0">Bank Address</th>
                              <th class="bg-transparent border-bottom-0">Action</th>
                              <th class="bg-transparent border-bottom-0">Dated</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach($posts as $blog) : ?>
                            <tr>
                              <td class="text-muted fs-12 fw-semibold"><a href="#" class="text-dark" data-bs-target="#editbankac<?php echo $blog['id'];?>" data-bs-toggle="modal" ><?php echo $i++; //echo $blog['id']; ?></a></td>
                              <td class="text-muted fs-12 fw-semibold"><a href="#" class="text-dark" data-bs-target="#editbankac<?php echo $blog['id'];?>" data-bs-toggle="modal" ><?php echo $blog['ac_name']; ?></a></td>
                              <td class="text-primary fs-12 fw-semibold"><?php echo $blog['ac_number']; ?></td>
                              <td class="text-success fs-12 fw-semibold"><?php echo $blog['bank_ifsc']; ?></td>
                              <td class="text-success fs-12 fw-semibold"><?php echo $blog['bank_swiftcode']; ?></td>
                              <td class="text-success fs-12 fw-semibold"><?php echo $blog['bank_name']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['branch_name']; ?></td>
                              <td class="text-muted fs-12 fw-semibold">
                                <div class="d-flex align-items-stretch">
                                  <?php if($blog['status'] == 1){ ?>
                                  <a href='<?php echo base_url(); ?>sadministrator/enableoth/<?php echo $blog['id']; ?>?table=<?php echo base64_encode('m_banks'); ?>' class="btn btn-info-light btn-square  br-50 m-1" data-bs-toggle="tooltip" title="" data-bs-original-title="Active"><i class="fe fe-check-circle fs-13"></i> </a>
                                  <?php }else{ ?>
                                  <a href='<?php echo base_url(); ?>sadministrator/desableoth/<?php echo $blog['id']; ?>?table=<?php echo base64_encode('m_banks'); ?>' class="btn btn-danger-light btn-square  br-50 m-1" data-bs-toggle="tooltip" title="" data-bs-original-title="Hold"><i class="fe fe-x-circle fs-13"></i> </a> 
                                  <?php } ?>
                                  <a href="#modal-dialog" class="btn btn-primary-light btn-square  br-50 m-1" data-bs-target="#editbankac<?php echo $blog['id'];?>" data-bs-toggle="modal" title="" data-bs-original-title="Quick View"><i class="fe fe-eye fs-13"></i></a>
                                  <!-- <a href="cart.html" class="btn btn-danger-light btn-square  br-50 m-1" data-bs-toggle="tooltip" title="" data-bs-original-title="add to cart"><i class="fe fe-trash fs-13"></i> </a> -->
                                  
                                  
                                </div>
                              </td>
                              <td class="text-info fs-12 fw-semibold"><?php echo $blog['created_date']; ?></td>
                            </tr>
                            <!--Edit ZAFFRAN BANK ACCOUNTS-->
                            <div class="modal fade editbankac" id="editbankac<?php echo $blog['id'];?>"  role="document">
                              <div class="modal-dialog modal-dialog-centered task-view-modal">
                                <div class="modal-content modal-content-demo">
                                  <div class="modal-header bg-primary  p-3">
                                    <h4 class="modal-title text-white">#Edit Zaffran PSP Bank Account - <?php echo $blog['ac_name'];?></h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Row Elements -->
                                    <div class="row">
                                      <!-- <form class="needs-validation" novalidate> -->
                                        <?php  echo form_open_multipart('ssadministrator/accounts/update-zaffran-bank-account', array('id' => 'editbankacformc'.$blog['id'], 'class'=>'editbankacform'))?>
                                        <input type="hidden" name="zedbankid" id="zedbankid" value="<?php echo $blog['id']; ?>">
                                        <p id="" align="center" class="alert-success statusMsg"></p>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbname" class="mb-2 m-0 text-muted text-sm">Name</label>
                                            <input type="text" class="form-control form-control-sm" id="edbname" name="edbname" placeholder="Account Holder's Name" value="<?php echo $blog['ac_name']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbaddress" class="mb-2 m-0 text-muted text-sm">Address</label>
                                            <input type="text" class="form-control form-control-sm" id="edbaddress" name="edbaddress" placeholder="Account Holder's Address" value="<?php echo $blog['ac_address']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbaccno" class="mb-2 m-0 text-muted text-sm">Account Number</label>
                                            <input type="text" class="form-control form-control-sm" id="edbaccno" name="edbaccno" placeholder="Account Number" value="<?php echo $blog['ac_number']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbaccifsc" class="mb-2 m-0 text-muted text-sm">IFSC/Routing Number</label>
                                            <input type="text" class="form-control form-control-sm" id="edbaccifsc" name="edbaccifsc" placeholder="IFSC/Routing Number" value="<?php echo $blog['bank_ifsc']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbaccswift" class="mb-2 m-0 text-muted text-sm">SWIFT CODE</label>
                                            <input type="text" class="form-control form-control-sm" id="edbaccswift" name="edbaccswift" placeholder="SWIFT CODE" value="<?php echo $blog['bank_swiftcode']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbbankname">Bank Name</label>
                                            <input type="text" class="form-control form-control-sm" id="edbbankname" name="edbbankname" placeholder="Bank Name" value="<?php echo $blog['bank_name']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbbankaddress" class="mb-2 m-0 text-muted text-sm">Bank Address</label>
                                            <input type="text" class="form-control form-control-sm" id="edbbankaddress" name="edbbankaddress" placeholder="Account Holder's Name" value="<?php echo $blog['branch_name']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div id="edbcurrent" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5" >
                                            <label for="edbcurrency" class="mb-1 m-0 text-muted text-sm">Requested Currency</label>
                                            <select class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Currency" tabindex="-1" aria-hidden="true" id="edbcurrency" name="edbcurrency">

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
                                            <input type="number" class="form-control form-control-sm" id="edbfee" name="edbfee" placeholder="Withdraw Fee- %" value="<?php echo $blog['withdrafee']; ?>"  required>
                                            <div class="invalid-feedback">Please provide a valid Number.</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                              <label for="edbadditional">Additional Information</label>
                                              <input type="text" class="form-control form-control-sm" id="edbadditional" name="edbadditional" placeholder="Additional Information" value="<?php echo $blog['description']; ?>" >
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
                                            <input class="form-control file-input form-control-sm" id="edbdocument" name="edbdocument" type="file" value="<?php echo $blog['documen']; ?>">
                                            <input type="hidden" name="fu" id="fu" value="<?php echo $blog['documen']; ?>">
                                            <div class="invalid-feedback">Please provide a valid document.</div>
                                          </div>
                                          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                                            <label for="edbnickname">Account Nick Name</label>
                                            <input type="text" class="form-control form-control-sm" id="edbnickname" name="edbnickname" placeholder="Account Nick Name" value="<?php echo $blog['nickname']; ?>" >
                                            <div class="invalid-feedback">Please provide a nick name.</div>
                                          </div>
                                          <div id="edbdefau" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                                            <label for="edbdefault">Mark as Default</label>
                                            <select class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Default" tabindex="-1" aria-hidden="true" id="edbdefault" name="edbdefault" >
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
                                          <button class="btn btn-primary me-sm-0 me-2"><span  class="fe fe-check-circle p-1"></span>Update Bank</button>
                                          <button  class="btn btn-outline-danger me-sm-0 me-2" aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span  class="fe fe-x-circle p-1"></span>Cancel</button>
                                        </div>
                                      </form>
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
                          
                          <!-- <tbody>
                            <tr>
                              <td>Tiger Nixon</td>
                              <td>System Architect</td>
                              <td>Edinburgh</td>
                              <td>61</td>
                              <td>2011/04/25</td>
                              <td>$320,800</td>
                              <td>$320,800</td>
                              <td>$320,800</td>
                              <td>$320,800</td>
                              <td>$320,800</td>
                            </tr>
                            
                            <tr>
                              <td>Donna Snider</td>
                              <td>Customer Support</td>
                              <td>New York</td>
                              <td>27</td>
                              <td>2011/01/25</td>
                              <td>$112,000</td>
                              <td>$112,000</td>
                              <td>$112,000</td>
                              <td>$112,000</td>
                              <td>$112,000</td>
                            </tr>
                          </tbody> -->
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

    <!--CREATE ZAFFRAN BANK ACCOUNTS-->
    <div class="modal fade addbankac"  data-backdrop="static" data-keyboard="false"  id="addbankac"  role="document">
      <div class="modal-dialog modal-dialog-centered task-view-modal">
        <div class="modal-content modal-content-demo">
          <div class="modal-header bg-primary  p-3">
            <h4 class="modal-title text-white"># Create Zaffran PSP Bank Account</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <!-- Row Elements -->
            <div class="row">
              <!-- <form class="needs-validation" novalidate> -->
              <!-- <form class="needs-validation"> -->
                <?php  echo form_open_multipart('ssadministrator/accounts/create-zaffran-bank-account', array('id' => 'addbankacformc'))?>
                <p id="" align="center" class="alert-success statusMsg"></p>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adbname" class="mb-2 m-0 text-muted text-sm">Name</label>
                    <input type="text" class="form-control form-control-sm" id="adbname" name="adbname" placeholder="Account Holder's Name" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adbaddress" class="mb-2 m-0 text-muted text-sm">Address</label>
                    <input type="text" class="form-control form-control-sm" id="adbaddress" name="adbaddress" placeholder="Account Holder's Address" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adbaccno" class="mb-2 m-0 text-muted text-sm">Account Number</label>
                    <input type="text" class="form-control form-control-sm number" name="adbaccno" id="adbaccno" placeholder="Account Number" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adbaccifsc" class="mb-2 m-0 text-muted text-sm">IFSC/Routing Number</label>
                    <input type="text" class="form-control form-control-sm" id="adbaccifsc" name="adbaccifsc" placeholder="IFSC/Routing Number" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adbaccswift" class="mb-2 m-0 text-muted text-sm">SWIFT CODE</label>
                    <input type="text" class="form-control form-control-sm" id="adbaccswift" name="adbaccswift" placeholder="SWIFT CODE" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adbbankname">Bank Name</label>
                    <input type="text" class="form-control form-control-sm" id="adbbankname" name="adbbankname" placeholder="Bank Name" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adbbankaddress" class="mb-2 m-0 text-muted text-sm">Bank Address</label>
                    <input type="text" class="form-control form-control-sm" id="adbbankaddress" name="adbbankaddress" placeholder="Account Holder's Name" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div id="adbcurrent"  class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5" >
                    <label for="adbcurrency" class="mb-1 m-0 text-muted text-sm">Requested Currency</label>
                    <select  id="adbcurrency" name="adbcurrency" class="form-control form-control-sm select2-show-search form-select" data-placeholder="Choose one">
                      <option label="Choose one"></option>
                      <option value="AUD">AUD</option>
                      <option value="BTC">BTC</option>
                      <option value="CAD">CAD</option>
                      <option value="CNY">CNY</option>
                      <option value="CZK">CZK</option>
                      <option value="EUR">EUR</option>
                      <option value="GBP">GBP</option>
                      <option value="HKD">HKD</option>
                      <option value="IDR">IDR</option>
                      <option value="INR">INR</option>
                      <option value="JPY">JPY</option>
                      <option value="KHR">KHR</option>
                      <option value="MXN">MXN</option>
                      <option value="MYR">MYR</option>
                      <option value="PHP">PHP</option>
                      <option value="PLN">PLN</option>
                      <option value="SGD">SGD</option>
                      <option value="THB">THB</option>
                      <option value="USD">USD</option>
                      <option value="VND">VND</option>
                    </select>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-1">
                    <label for="adbfee">Withdraw Fee- %</label>
                    <input type="number" class="form-control form-control-sm number" id="adbfee" name="adbfee" placeholder="Withdraw Fee- %" value="2"  required>
                    <div class="invalid-feedback">Please provide a valid Number.</div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-1">
                    <div class="form-group">
                      <label for="adbadditional">Additional Information</label>
                      <input type="text" class="form-control form-control-sm" id="adbadditional" name="adbadditional" placeholder="Additional Information" value="" >
                      <div class="invalid-feedback">Please provide a valid Number.</div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                      <label for="adbdocument">Bank Document</label>
                      <input class="form-control file-input form-control-sm" accept="application/pdf" id="adbdocument" name="adbdocument" type="file">
                      <div class="invalid-feedback">Please provide a valid document.</div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                    <label for="adbnickname">Account Nick Name</label>
                    <input type="text" class="form-control form-control-sm" id="adbnickname" name="adbnickname" placeholder="Account Nick Name" value="" >
                    <div class="invalid-feedback">Please provide a nick name.</div>
                  </div>
                  <div id="adbdefau" class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                    <label for="edbdefault">Mark as Default</label>
                    <select class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Default" tabindex="-1" aria-hidden="true" id="adbdefault" name="adbdefault" >
                      <option label="Choose one"></option>
                      <option value="1">YES</option>
                      <option value="0">NO</option>
                    </select>
                    <div class="invalid-feedback">Please provide a default.</div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 mb-5 bg-primary">
                </div>
                <div class="form-group text-center">
                  <!-- <label class="ckbox">
                    <input type="checkbox" id="invalidCheck3" required>
                    <span class="text-13">I agree terms and conditions</span>
                    </label>-->
                    <button class="btn btn-primary me-sm-0 me-2"><span  class="fe fe-check-circle p-1"></span>Add Bank</button>
                    <button  class="btn btn-outline-danger me-sm-0 me-2" aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span  class="fe fe-x-circle p-1"></span>Cancel</button>
                    <!-- <button class="btn btn-outline-danger"><i class="fe fe-x-circle"></i>Cancel</button>
                    <button  class="btn btn-secondary" aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true"></span>Cancel</button>
                    <button class="btn btn-primary me-sm-0 me-2" type="submit"><i class="fe fe-check-circle"></i></span>Submit</button>
                    <button class="btn btn-secondary" type="reset">Cancel</button>
                    <button  class="btn btn-secondary" aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true"></span>Cancel</button> -->
                </div>
              </form>
            </div>
            <!-- Row Elements -->
          </div>
          <!-- Modal-Body -->
          <div class="modal-footer p-0 border-top-0">
          </div>
        </div>
      </div>
    </div>
    <!--CREATE ZAFFRAN BANK ACCOUNTS-->

    
    <!--TASK MODAL-->
    <div class="modal fade" id="Vertically">
      <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
        <div class="modal-content modal-content-demo">

          <div class="modal-header p-5">
            <h4 class="modal-title text-dark">#1. Sit sed takimata sanctus invidunt</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 d-flex mb-4">
                <p class="m-0 wp-30 text-muted">Project Name</p>
                <p class="m-0 wp-70 text-dark">Noa Dashboard UI</p>
              </div>
              <div class="col-md-12 d-flex mb-4">
                <p class="m-0 wp-30 text-muted">Assigned To</p>
                <div class="m-0 wp-70 text-dark d-flex align-items-center">
                  <div class="me-2">
                    <img alt="User Avatar" class="rounded-circle avatar-sm" src="<?php echo base_url(); ?>assets/adminz/assets/images/users/7.jpg">
                  </div>
                  <div>
                    <p class="mb-1">Daniel Obrien</p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 d-flex mb-4">
                <p class="m-0 wp-30 text-muted">Start Date</p>
                <p class="m-0 wp-70 text-dark">30-10-2021</p>
              </div>
              <div class="col-md-12 d-flex mb-4">
                <p class="m-0 wp-30 text-muted">Status</p>
                <div class="m-0 wp-70 text-dark">
                  <span class="mb-0 mt-1 status-main in-progress">In Progress</span>
                </div>
              </div>
              <div class="col-md-12 d-flex mb-4">
                <p class="m-0 wp-30 text-muted">End Date</p>
                <p class="m-0 wp-70 text-dark">---</p>
              </div>
              <div class="col-md-12 d-flex mb-4">
                <p class="m-0 wp-30 text-muted">Description</p>
                <p class="m-0 wp-70 text-dark">Kasd dolore lorem eos stet at, dolor ipsum elitr sea amet amet stet justo, sed.</p>
              </div>
            </div>
          </div>

          <div class="modal-footer p-0 border-top-0">

            <!-- Tabs -->
            <div class="tabs-menu4 w-100">
              <nav class="nav border-bottom px-4 d-block d-lg-flex flex-2">
                <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1 active" data-bs-toggle="tab" href="#task-files">
                  Files
                </a>
                <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-subtask">
                  Sub Task
                </a>
                <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-tracktime">
                  Track Time
                </a>
                <a class="nav-link border border-bottom-0 py-1 br-5 mx-1 mx-md-1" data-bs-toggle="tab" href="#task-comments">
                  Comments
                </a>
              </nav>
            </div>
            <!-- /Tabs -->

            <div class="tab-content w-100">
              <div class="tab-pane active task-files-tab" id="task-files">
                <div class="row">
                  <div class="file-upload-text">
                    <input type="file" id="task-file-input" multiple>
                    <label for="task-file-input" class="text-primary">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-primary" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
                      Upload Files
                      <span class="text-muted"></span>
                    </label>
                    <i class="fa fa-times-circle remove"></i>
                  </div>
                </div>
                <div class="row">
                  <div class="mt-3">
                    <table class="table table-bordered br-7">
                      <thead>
                        <tr class="row-first">
                          <th>File Name</th>
                          <th>Date</th>
                          <th>Type</th>
                          <th>Size</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="recent-files">
                              <svg class="file-manager-icon w-icn me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#b6dfff" d="M20,8.99969l-7-7H7a3,3,0,0,0-3,3v14a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z"/><path fill="#86cbff" d="M20 8.99969H15a2 2 0 0 1-2-2v-5zM19 22a.99974.99974 0 0 1-1-1V19a1 1 0 0 1 2 0v2A.99974.99974 0 0 1 19 22zM19 17a1.03391 1.03391 0 0 1-.71-.29.99108.99108 0 0 1-.21045-1.08984A1.14883 1.14883 0 0 1 18.29 15.29a1.02673 1.02673 0 0 1 .32959-.21.91433.91433 0 0 1 .76025 0 1.03418 1.03418 0 0 1 .33008.21 1.15772 1.15772 0 0 1 .21.33008A.98919.98919 0 0 1 19.71 16.71a1.15384 1.15384 0 0 1-.33008.21A.9994.9994 0 0 1 19 17zM15 18H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM15 14H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zM10 10H9A1 1 0 0 1 9 8h1a1 1 0 0 1 0 2z"/></svg>
                              <span class="mb-1 font-weight-semibold">noa documentation</span>
                            </div>
                          </td>
                          <td>
                            <span class="text-muted modified-date">07/10/21, 03:30</span>
                          </td>
                          <td>
                            <span>doc</span>
                          </td>
                          <td>
                            <span class="text-muted file-size">15kb</span>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="recent-files">
                              <svg class="file-manager-icon w-icn me-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path fill="#f2c8db" d="M14,18H5c-1.65611-0.00181-2.99819-1.34389-3-3V9c0.00181-1.65611,1.34389-2.99819,3-3h9c1.65611,0.00181,2.99819,1.34389,3,3v6C16.99819,16.65611,15.65611,17.99819,14,18z"/><path fill="#eaa4c4" d="M21.89465,7.55359c-0.24683-0.49432-0.8476-0.69495-1.34192-0.44812l-3.56421,1.7821C16.98999,8.92572,16.99994,8.96149,17,9v6c-0.00006,0.03851-0.01001,0.07428-0.01147,0.11243l3.56421,1.7821C20.69165,16.96381,20.84479,16.99994,21,17c0.55212-0.00037,0.99969-0.44788,1-1V8C21.99994,7.84503,21.96387,7.6922,21.89465,7.55359z"/></svg>

                              <span class="mb-1 font-weight-semibold">sample video</span>
                            </div>
                          </td>
                          <td>
                            <span class="text-muted modified-date">07/10/21, 03:30</span>
                          </td>
                          <td>
                            <span>mp4</span>
                          </td>
                          <td>
                            <span class="text-muted file-size">30mb</span>
                          </td>
                        </tr>
                        <tr class="row-last">
                          <td>
                            <div class="recent-files">
                              <svg class="file-manager-icon w-icn me-2"  xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path fill="#c8e4a6" d="M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z"/><path fill="#add679" d="M19,2H5C3.34515,2.00483,2.00483,3.34515,2,5v8.86l3.88-3.88c1.18747-1.13,3.05253-1.13,4.24,0l2.87139,2.887l0.88752-0.88751c1.17344-1.16662,3.06874-1.16662,4.24218,0L22,15.8584V5C21.99517,3.34515,20.65485,2.00483,19,2z M13.5,9C12.67157,9,12,8.32843,12,7.5S12.67157,6,13.5,6S15,6.67157,15,7.5C14.9991,8.32805,14.32805,8.9991,13.5,9z"/><path fill="#8FBD56" d="M10.12,9.98c-1.18747-1.13-3.05253-1.13-4.24,0L2,13.86V19c0.00484,1.65484,1.34516,2.99516,3,3h14c0.81512-0.00034,1.59497-0.3325,2.16-0.92L10.12,9.98z"/><path fill="#c8e4a6" d="M22,15.8584l-3.87891-3.87891c-1.17345-1.1666-3.06873-1.1666-4.24218,0L12.99139,12.867l8.16425,8.20856C21.69776,20.5208,22.00089,19.77567,22,19V15.8584z"/></svg>
                              <span class="mb-1 font-weight-semibold">sample image</span>
                            </div>
                          </td>
                          <td>
                            <span class="text-muted modified-date">07/10/21, 03:30</span>
                          </td>
                          <td>
                            <span>jpeg</span>
                          </td>
                          <td>
                            <span class="text-muted file-size">15kb</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="task-subtask">
                <div class="row">
                  <div class="col-md-12">
                    <div class="d-flex add-task-container">
                      <input type="text" class="form-control wp-40 subtask-input" placeholder="Type Task Here..." id="subTaskInput">
                      <a href="javascript:void(0)" role="button" class="text-teritary text-center ms-2 me-2" id="addTask">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-teritary" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
                        Add
                      </a>
                      <a href="javascript:void(0)" role="button" class="text-primary text-center ms-2" id="completedAll">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-primary" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M15.8085327,8.6464844l-5.6464233,5.6464844l-2.4707031-2.4697266c-0.0023804-0.0023804-0.0047607-0.0047607-0.0072021-0.0071411c-0.1972046-0.1932373-0.5137329-0.1900635-0.7069702,0.0071411c-0.1932983,0.1972656-0.1900635,0.5137939,0.0071411,0.7070312l2.8242188,2.8232422C9.9022217,15.4474487,10.02948,15.5001831,10.1621094,15.5c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l6-6c0.0023804-0.0023804,0.0047607-0.0046997,0.0071411-0.0071411c0.1932373-0.1972046,0.1900635-0.5137329-0.0071411-0.7069702C16.3183594,8.446106,16.0018311,8.4493408,15.8085327,8.6464844z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5201416-0.0064697,9.9935303-4.4798584,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9683228,0.0054321,8.9945679,4.0316772,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
                        Mark All
                      </a>
                    </div>
                    <label for="subTaskInput" class="w-100 d-block text-danger" id="errorNote"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mt-3">
                    <ul class="sub-list-container">
                      <li class="sub-list-item task-completed">
                        <div class="sub-list-main">
                          <div class="check-btn"></div>
                          <span class="sub-list-text text-muted" onclick="taskCompleted(event)">Gubergren vero nonumy vero no.</span>
                        </div>
                        <i class="fe fe-trash delete-main text-muted"></i>
                      </li>
                      <li class="sub-list-item">
                        <div class="sub-list-main">
                          <div class="check-btn"></div>
                          <span class="sub-list-text text-muted" onclick="taskCompleted(event)">Duo no elitr diam labore sit invidunt. Magna gubergren erat.</span>
                        </div>
                        <i class="fe fe-trash delete-main text-muted"></i>
                      </li>
                      <li class="sub-list-item">
                        <div class="sub-list-main">
                          <div class="check-btn"></div>
                          <span class="sub-list-text text-muted" onclick="taskCompleted(event)">Consetetur clita diam est eos invidunt. Eirmod magna.</span>
                        </div>
                        <i class="fe fe-trash delete-main text-muted"></i>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 text-end mt-3">
                    <a href="javascript:void(0)" role="button" class="text-danger" id="deleteAllTasks">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn text-danger" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path d="M16,11.5h-3.5V8c0-0.276123-0.223877-0.5-0.5-0.5S11.5,7.723877,11.5,8v3.5H8c-0.276123,0-0.5,0.223877-0.5,0.5s0.223877,0.5,0.5,0.5h3.5v3.5005493C11.5001831,16.2765503,11.723999,16.5001831,12,16.5h0.0006104C12.2765503,16.4998169,12.5001831,16.276001,12.5,16v-3.5H16c0.276123,0,0.5-0.223877,0.5-0.5S16.276123,11.5,16,11.5z M12,2C6.4771729,2,2,6.4771729,2,12s4.4771729,10,10,10c5.5202026-0.0062866,9.9937134-4.4797974,10-10C22,6.4771729,17.5228271,2,12,2z M12,21c-4.9705811,0-9-4.0294189-9-9s4.0294189-9,9-9c4.9682617,0.0056152,8.9943848,4.0317383,9,9C21,16.9705811,16.9705811,21,12,21z"/></svg>
                      Delete All
                    </a>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="task-tracktime">
                <div class="row">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="row-first">
                        <th class="bg-transparent border-bottom-0">Team Member</th>
                        <th class="bg-transparent border-bottom-0">Start Date & Time</th>
                        <th class="bg-transparent border-bottom-0">End Date & Time</th>
                        <th class="bg-transparent border-bottom-0">Total Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="me-2">
                              <img alt="User Avatar" class="rounded-circle avatar-md" src="<?php echo base_url(); ?>assets/adminz/assets/images/users/8.jpg">
                            </div>
                            <div>
                              <h6 class="mb-1">Skyler Hilda</h6>
                              <span class="text-muted fs-12">member@spruko.com</span>
                            </div>
                          </div>
                        </td>
                        <td class="text-muted fs-13 fw-semibold">31 Oct 21 & 14:56</td>
                        <td class="text-muted fs-13 fw-semibold">01 Nov 21 & 09:35</td>
                        <td class="text-dark fs-13 fw-semibold">Days: 4<br>Hours: 10<br>Minutes: 22</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="me-2">
                              <img alt="User Avatar" class="rounded-circle avatar-md" src="<?php echo base_url(); ?>assets/adminz/assets/images/users/2.jpg">
                            </div>
                            <div>
                              <h6 class="mb-1">Lisa Morgan</h6>
                              <span class="text-muted fs-12">member@spruko.com</span>
                            </div>
                          </div>
                        </td>
                        <td class="text-muted fs-13 fw-semibold">30 Oct 21 & 12:56</td>
                        <td class="text-muted fs-13 fw-semibold">11 Nov 21 & 09:35</td>
                        <td class="text-dark fs-13 fw-semibold">Days: 15<br>Hours: 12<br>Minutes: 52</td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="me-2">
                              <img alt="User Avatar" class="rounded-circle avatar-md" src="<?php echo base_url(); ?>assets/adminz/assets/images/users/11.jpg">
                            </div>
                            <div>
                              <h6 class="mb-1">Tyler Durder</h6>
                              <span class="text-muted fs-12">member@spruko.com</span>
                            </div>
                          </div>
                        </td>
                        <td class="text-muted fs-13 fw-semibold">15 Oct 21 & 15:56</td>
                        <td class="text-muted fs-13 fw-semibold">01 Nov 21 & 16:40</td>
                        <td class="text-dark fs-13 fw-semibold">Days: 18<br>Hours: 8<br>Minutes: 52</td>
                      </tr>
                      <tr class="row-last">
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="me-2">
                              <img alt="User Avatar" class="rounded-circle avatar-lg" src="<?php echo base_url(); ?>assets/adminz/assets/images/users/14.jpg">
                            </div>
                            <div>
                              <h6 class="mb-1">Jorah Randy</h6>
                              <span class="text-muted fs-12">member@spruko.com</span>
                            </div>
                          </div>
                        </td>
                        <td class="text-muted fs-13 fw-semibold">18 Oct 21 & 10:30</td>
                        <td class="text-muted fs-13 fw-semibold">09 Nov 21 & 09:45</td>
                        <td class="text-dark fs-13 fw-semibold">Days: 22<br>Hours: 10<br>Minutes: 12</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane" id="task-comments">
                <div class="row">
                  <div class="mt-5">
                    <div class="media mb-5 overflow-visible">
                      <div class="me-3">
                        <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?php echo base_url(); ?>assets/adminz/assets/images/users/5.jpg"> </a>
                      </div>
                      <div class="media-body overflow-visible">
                        <div class="border mb-5 p-4 br-5">
                          <nav class="nav float-end">
                            <div class="dropdown">
                              <a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="fe fe-edit me-1"></i> Edit</a>
                                <a class="dropdown-item" href="#"><i class="fe fe-corner-up-left me-1"></i> Reply</a>
                                <a class="dropdown-item" href="#"><i class="fe fe-flag me-1"></i> Report Abuse</a>
                                <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-1"></i> Delete</a>
                              </div>
                            </div>
                          </nav>
                          <h5 class="mt-0">Gavin Murray <span class="text-muted fs-12 ms-1">1 Day ago</span></h5>
                          <span><i class="fe fe-thumb-up text-danger"></i></span>
                          <p class="font-13 text-muted">Lorem ipsum dolor sit amet, quis Neque porro quisquam est, nostrud exercitation ullamco laboris commodo consequat. There’s an old maxim that states, “No fun for the writer, no fun for the reader.”No matter
                            what industry you’re working in, as a blogger, you should live and die by this statement.</p>
                          <a class="like" href="javascript:;">
                            <span class="badge btn-danger-light rounded-pill py-2 px-3">
                              <i class="fe fe-heart me-1"></i>56</span>
                          </a>
                          <span class="reply" id="1">
                            <a href="javascript:;"><span class="badge btn-info-light rounded-pill py-2 px-3"><i class="fe fe-corner-up-left me-1"></i>Reply</span></a>
                          </span>
                        </div>
                        <div class="media mb-5 overflow-visible">
                          <div class="me-3">
                            <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="<?php echo base_url(); ?>assets/adminz/assets/images/users/2.jpg"> </a>
                          </div>
                          <div class="media-body border p-4 overflow-visible br-5">
                            <nav class="nav float-end">
                              <div class="dropdown">
                                <a class="nav-link text-muted fs-16 p-0 ps-4" href="javascript:;" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" href="#"><i class="fe fe-edit me-1"></i> Edit</a>
                                  <a class="dropdown-item" href="#"><i class="fe fe-corner-up-left me-1"></i> Reply</a>
                                  <a class="dropdown-item" href="#"><i class="fe fe-flag me-1"></i> Report Abuse</a>
                                  <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-1"></i> Delete</a>
                                </div>
                              </div>
                            </nav>
                            <h5 class="mt-0">Mozelle Belt <span class="text-muted fs-12 ms-1 bg-normal-light">Reply to Gavin Murray</span><span class="text-muted fs-12 ms-1">2 min ago</span></h5>
                            <span><i class="fe fe-thumb-up text-danger"></i></span>
                            <p class="font-13 text-muted">Nostrud exercitation ullamco laboris commodo consequat. There’s an old maxim that states, “No fun for the writer, no fun for the reader.”No matter what industry you’re working in, as a blogger, you should
                              live and die by this statement.</p>
                            <a class="like" href="javascript:;"><span class="badge btn-danger-light rounded-pill py-2 px-3"><i class="fe fe-heart me-1"></i>56</span></a>
                            <span class="reply" id="2">
                              <a href="javascript:;"><span class="badge btn-info-light rounded-pill py-2 px-3"><i class="fe fe-corner-up-left me-1"></i>Reply</span></a>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--TASK MODAL ENDS-->

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