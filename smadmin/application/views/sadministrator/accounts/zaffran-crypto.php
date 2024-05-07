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
                  <li class="breadcrumb-item active"  aria-current="page"><a href="<?php echo base_url('sadministrator/accounts/zaffran-crypto'); ?>">Crypto Accounts</a></li>
                </ol>
              </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->

            <input type="hidden" name="maddcryptoac" id="maddcryptoac" value="<?php echo 1; //$post['id']; ?>">
            <div class="row">
              <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
                <div class="card overflow-hidden">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <!-- <a href="#" class="" data-bs-target="#addbankac" data-bs-toggle="modal" >test
                        </a> -->
                          <a href="#" class=""  data-backdrop="static" data-keyboard="false"  data-bs-target="#addcryptoac" data-bs-toggle="modal" >

                          <h3 class="mb-2 fw-semibold">Add New</h3>
                          <p class="text-muted fs-13 mb-0">Crypto Account</p>
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
                        <p class="text-muted fs-13 mb-0">Crypto Accounts</p>
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
                      <h3 class="card-title">Crypto Accounts</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100" >
                          <thead>
                            <tr>
                              <th class="bg-transparent border-bottom-0">#</th>
                              <th class="bg-transparent border-bottom-0">Account Name</th>
                              <th class="bg-transparent border-bottom-0">Coins</th>
                              <th class="bg-transparent border-bottom-0">Network</th>
                              <th class="bg-transparent border-bottom-0">Address</th>
                              <th class="bg-transparent border-bottom-0">Provider</th>
                              <th class="bg-transparent border-bottom-0">Currency</th>
                              <th class="bg-transparent border-bottom-0">Action</th>
                              <th class="bg-transparent border-bottom-0">Dated</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach($posts as $blog) : ?>
                            <tr>
                              <td class="text-muted fs-12 fw-semibold"><a href="#" class="text-dark" data-bs-target="#editcryptoac<?php echo $blog['id'];?>" data-bs-toggle="modal" ><?php echo $i++; //echo $blog['id']; ?></a></td>
                              <td class="text-muted fs-12 fw-semibold"><a href="#" class="text-dark" data-bs-target="#editcryptoac<?php echo $blog['id'];?>" data-bs-toggle="modal" ><?php echo $blog['ac_name']; ?></a></td>
                              <td class="text-success fs-12 fw-semibold"><?php echo $blog['ac_coins']; ?></td>
                              <td class="text-success fs-12 fw-semibold"><?php echo $blog['ac_network']; ?></td>
                              <td class="text-success fs-12 fw-semibold"><?php echo $blog['ac_address']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['wallet_provider']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['currency']; ?></td>
                              <td class="text-muted fs-12 fw-semibold">
                                <div class="d-flex align-items-stretch">
                                  <?php if($blog['status'] == 1){ ?>
                                  <a href='<?php echo base_url(); ?>sadministrator/enableoth/<?php echo $blog['id']; ?>?table=<?php echo base64_encode('m_cryptos'); ?>' class="btn btn-info-light btn-square  br-50 m-1" data-bs-toggle="tooltip" title="" data-bs-original-title="Active"><i class="fe fe-check-circle fs-13"></i> </a>
                                  <?php }else{ ?>
                                  <a href='<?php echo base_url(); ?>sadministrator/desableoth/<?php echo $blog['id']; ?>?table=<?php echo base64_encode('m_cryptos'); ?>' class="btn btn-danger-light btn-square  br-50 m-1" data-bs-toggle="tooltip" title="" data-bs-original-title="Hold"><i class="fe fe-x-circle fs-13"></i> </a> 
                                  <?php } ?>
                                  <a href="#modal-dialog" class="btn btn-primary-light btn-square  br-50 m-1" data-bs-target="#editcryptoac<?php echo $blog['id'];?>" data-bs-toggle="modal" title="" data-bs-original-title="Quick View"><i class="fe fe-eye fs-13"></i></a>
                                  <!-- <a href="cart.html" class="btn btn-danger-light btn-square  br-50 m-1" data-bs-toggle="tooltip" title="" data-bs-original-title="add to cart"><i class="fe fe-trash fs-13"></i> </a> -->
                                  
                                  
                                </div>
                              </td>
                              <td class="text-info fs-12 fw-semibold"><?php echo $blog['created_date']; ?></td>
                            </tr>
                            <!--Edit ZAFFRAN BANK ACCOUNTS-->
                            <div class="modal fade editcryptoac" id="editcryptoac<?php echo $blog['id'];?>"  role="document">
                              <div class="modal-dialog modal-dialog-centered task-view-modal">
                                <div class="modal-content modal-content-demo">
                                  <div class="modal-header bg-primary  p-3">
                                    <h4 class="modal-title text-white">#Edit Zaffran PSP Crypto Account - <?php echo $blog['ac_name'];?></h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Row Elements -->
                                    <div class="row">
                                      <!-- <form class="needs-validation" novalidate> -->
                                        <?php  echo form_open_multipart('sadministrator/accounts/update-zaffran-crypto-account', array('id' => 'editcryptoacformc'.$blog['id'], 'class'=>'editcryptoacform'))?>
                                        <input type="hidden" name="zedcryptoid" id="zedcryptoid" value="<?php echo $blog['id']; ?>">
                                        <p id="" align="center" class="alert-success statusMsg"></p>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edcname" class="mb-2 m-0 text-muted text-sm">Name</label>
                                            <input type="text" class="form-control form-control-sm" id="edcname" name="edcname" placeholder="Account Name" value="<?php echo $blog['ac_name']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div id="edccoin" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5" >
                                            <label for="edccoins" class="mb-1 m-0 text-muted text-sm">Requested Coins</label>
                                            <select class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Requested Coins" tabindex="-1" aria-hidden="true" id="edccoins" name="edccoins">
                                              <option label="Requested Coins For Payout"></option>
                                              <option <?php if($blog['ac_coins'] =="BTC" ){ echo 'selected="selected"'; } ?> value="BTC">BTC</option>
                                              <option <?php if($blog['ac_coins'] =="USDT" ){ echo 'selected="selected"'; } ?> value="USDT">USDT</option>
                                              <option <?php if($blog['ac_coins'] =="USDC" ){ echo 'selected="selected"'; } ?> value="USDC">USDC</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div id="edcnetwork" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edcnetworks" class="mb-2 m-0 text-muted text-sm">Network</label>
                                            <select  id="edcnetworks" name="edcnetworks" class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Choose Network">
                                              <option label="Choose Network"></option>
                                              <option <?php if($blog['ac_network'] =="BTC" ){ echo 'selected="selected"'; } ?> value="BTC">BTC</option>
                                              <option <?php if($blog['ac_network'] =="ERC20" ){ echo 'selected="selected"'; } ?> value="ERC20">ERC20</option>
                                              <option <?php if($blog['ac_network'] =="TRC20" ){ echo 'selected="selected"'; } ?> value="TRC20">TRC20</option>
                                              <option <?php if($blog['ac_network'] =="BEP2" ){ echo 'selected="selected"'; } ?> value="BEP2">BEP2</option>
                                              <option <?php if($blog['ac_network'] =="BEP20" ){ echo 'selected="selected"'; } ?> value="BEP20">BEP20</option>
                                              <option <?php if($blog['ac_network'] =="BSC" ){ echo 'selected="selected"'; } ?> value="BSC">BSC</option>
                                              <option <?php if($blog['ac_network'] =="Other" ){ echo 'selected="selected"'; } ?> value="Other">Other</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edcaddress" class="mb-2 m-0 text-muted text-sm">Address</label>
                                            <input type="text" class="form-control form-control-sm" id="edcaddress" name="edcaddress" placeholder="Address" value="<?php echo $blog['ac_address']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edcwallet_provider" class="mb-2 m-0 text-muted text-sm">Crypto Provider</label>
                                            <input type="text" class="form-control form-control-sm" id="edcwallet_provider" name="edcwallet_provider" placeholder="Crypto Provider" value="<?php echo $blog['wallet_provider']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div id="edccurrent"  class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5" >
                                            <label for="edccurrency" class="mb-1 m-0 text-muted text-sm">Requested Currency</label>
                                            <select  id="edccurrency" name="edccurrency" class="form-control form-control-sm select2-show-search form-select" data-placeholder="Choose one">
                                              <option label="Choose one"></option>
                                              <option <?php if($blog['currency'] =="USD" ){ echo 'selected="selected"'; } ?> value="USD">USD</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edcdocument">Bank Document-
                                            <?php if($blog['documen']!="") { ?>
                                              <a target="_blank" href="<?php echo site_url();?>assets/images/banks/<?php echo $blog['documen']; ?>"><?php echo $blog['documen']; ?></a>
                                            <?php } else {?>
                                              <?php echo "Choose File"; } ?>

                                              </label>
                                            <input class="form-control file-input form-control-sm" id="edcdocument" name="edcdocument" type="file" value="<?php echo $blog['documen']; ?>">
                                            <input type="hidden" name="fu" id="fu" value="<?php echo $blog['documen']; ?>">
                                            <div class="invalid-feedback">Please provide a valid document.</div>
                                          </div>
                                          <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbfee">Withdraw Fee- %</label>
                                            <input type="number" class="form-control form-control-sm" id="edcfee" name="edcfee" placeholder="Withdraw Fee- %" value="<?php echo $blog['withdrafee']; ?>"  required>
                                            <div class="invalid-feedback">Please provide a valid Number.</div>
                                          </div>
                                          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                                            <label for="edcnickname">Account Nick Name</label>
                                            <input type="text" class="form-control form-control-sm" id="edcnickname" name="edcnickname" placeholder="Account Nick Name" value="<?php echo $blog['nickname']; ?>" >
                                            <div class="invalid-feedback">Please provide a nick name.</div>
                                          </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-5 bg-primary">
                                        </div>
                                        <div class="form-group text-center">
                                          <button class="btn btn-primary me-sm-0 me-2"><span  class="fe fe-check-circle p-1"></span>Update Crypto</button>
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
    <div class="modal fade addcryptoac"  data-backdrop="static" data-keyboard="false"  id="addcryptoac"  role="document">
      <div class="modal-dialog modal-dialog-centered task-view-modal">
        <div class="modal-content modal-content-demo">
          <div class="modal-header bg-primary  p-3">
            <h4 class="modal-title text-white"># Create Zaffran PSP Crypto Account</h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <!-- Row Elements -->
            <div class="row">
              <!-- <form class="needs-validation" novalidate> -->
              <!-- <form class="needs-validation"> -->
                <?php  echo form_open_multipart('sadministrator/accounts/create-zaffran-crypto-account', array('id' => 'addcryptoacformc'))?>
                <p id="" align="center" class="alert-success statusMsg"></p>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adcname" class="mb-2 m-0 text-muted text-sm">Name</label>
                    <input type="text" class="form-control form-control-sm" id="adc_name" name="adc_name" placeholder="Account Name" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div id="adccoin" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adccoins" class="mb-2 m-0 text-muted text-sm">Requested Coins</label>
                    <select  id="adccoins" name="adccoins" class="form-control form-control-sm select2-show-search form-select" data-placeholder="Requested Coins For Payout">
                      <option label="Choose one"></option>
                      <option value="BTC">BTC</option>
                      <option value="USDT">USDT</option>
                      <option value="USDC">USDC</option>
                    </select>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div id="adcnetwork" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adcnetworks" class="mb-2 m-0 text-muted text-sm">Network</label>
                    <select  id="adcnetworks" name="adcnetworks" class="form-control form-control-sm select2-show-search form-select" data-placeholder="Choose Network">
                      <option label="Choose one"></option>
                      <option value="BTC">BTC</option>
                      <option value="ERC20">ERC20</option>
                      <option value="TRC20">TRC20</option>
                      <option value="BEP2">BEP2</option>
                      <option value="BEP20">BEP20</option>
                      <option value="BSC">BSC</option>
                      <option value="Other">Other</option>
                    </select>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adc_address" class="mb-2 m-0 text-muted text-sm">Address</label>
                    <input type="text" class="form-control form-control-sm" id="adc_address" name="adc_address" placeholder="Address" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                    <label for="adcwallet_provider" class="mb-2 m-0 text-muted text-sm">Crypto Provider</label>
                    <input type="text" class="form-control form-control-sm" id="adcwallet_provider" name="adcwallet_provider" placeholder="Crypto Provider" value="" required>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                  <div id="adccurrent"  class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5" >
                    <label for="adccurrency" class="mb-1 m-0 text-muted text-sm">Requested Currency</label>
                    <select  id="adccurrency" name="adccurrency" class="form-control form-control-sm select2-show-search form-select" data-placeholder="Choose one">
                      <option label="Choose one"></option>
                      <option value="USD">USD</option>
                    </select>
                    <div class="valid-feedback">Looks good!</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                      <label for="adcdocument">Upload Screenshot</label>
                      <input class="form-control file-input form-control-sm" accept="application/pdf" id="adcdocument" name="adcdocument" type="file">
                      <div class="invalid-feedback">Please provide a valid document.</div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 mb-1">
                    <label for="adcfee">Withdraw Fee- %</label>
                    <input type="number" class="form-control form-control-sm number" id="adcfee" name="adcfee" placeholder="Withdraw Fee- %" value="2"  required>
                    <div class="invalid-feedback">Please provide a valid Number.</div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                    <label for="adcnickname">Account Nick Name</label>
                    <input type="text" class="form-control form-control-sm" id="adcnickname" name="adcnickname" placeholder="Account Nick Name" value="" >
                    <div class="invalid-feedback">Please provide a nick name.</div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 mb-5 mt-5 bg-primary">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary me-sm-0 me-2"><span  class="fe fe-check-circle p-1"></span>Add Crypto Account</button>
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
    <!--CREATE ZAFFRAN CRYPTO ACCOUNTS-->

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