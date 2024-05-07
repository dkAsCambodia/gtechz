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
                  <li class="breadcrumb-item active"  aria-current="page"><a href="<?php echo base_url('sadministrator/accounts/merchants-crypto'); ?>">Merchant-Crypto Accounts</a></li>
                </ol>
              </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->

            <input type="hidden" name="mlistcryptoac" id="mlistcryptoac" value="<?php echo 1; //$post['id']; ?>">
            <div class="row">
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
                              <th class="bg-transparent border-bottom-0">Merchant_ID</th>
                              <th class="bg-transparent border-bottom-0">Merchant_Name</th>
                              <th class="bg-transparent border-bottom-0">Account Name</th>
                              <th class="bg-transparent border-bottom-0">Coins</th>
                              <th class="bg-transparent border-bottom-0">Network</th>
                              <th class="bg-transparent border-bottom-0">Address</th>
                              <th class="bg-transparent border-bottom-0">Provider</th>
                              <th class="bg-transparent border-bottom-0">Currency</th>
                              <th class="bg-transparent border-bottom-0">Dated</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach($posts as $blog) : ?>
                            <tr>
                              <td class="text-muted fs-12 fw-semibold"><a href="#" class="text-dark" data-bs-target="#editmcryptoac<?php echo $blog['id'];?>" data-bs-toggle="modal" ><?php echo $i++; //echo $blog['id']; ?></a></td>
                              <td class="text-primary fs-12 fw-semibold">
                                <a href="#" class="text-dark" data-bs-target="#editmcryptoac<?php echo $blog['id'];?>" data-bs-toggle="modal" >
                                  <div class="btn-list btn-animation">
                                    <button type="button" class="btn btn-info btn-spinners ms-2"><span class="loading"><?php echo $blog['merchant_id']; ?></span>
                                    </button>
                                  </div>
                                </a>
                              </td>
                              <td class="text-primary fs-12 fw-semibold"><a href="#" class="" data-bs-target="#editmcryptoac<?php echo $blog['id'];?>" data-bs-toggle="modal" ><?php echo $blog['merchant_name']; ?></a></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['ac_name']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['ac_coins']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['ac_network']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['ac_address']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['wallet_provider']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['currency']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['created_date']; ?></td>
                            </tr>
                            <!--Edit ZAFFRAN BANK ACCOUNTS-->
                            <div class="modal fade editmcryptoac" id="editmcryptoac<?php echo $blog['id'];?>"  role="document">
                              <div class="modal-dialog modal-dialog-centered task-view-modal">
                                <div class="modal-content modal-content-demo">
                                  <div class="modal-header bg-primary  p-3">
                                    <h4 class="modal-title text-white">#Merchant ID - <?php echo $blog['merchant_id'];?></h4>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <!-- Row Elements -->
                                    <div class="row">
                                        <input type="hidden" name="zedcryptoid" id="zedcryptoid" value="<?php echo $blog['id']; ?>">
                                        <p id="" align="center" class="alert-success statusMsg"></p>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edcname" class="mb-2 m-0 text-muted text-sm">Name</label>
                                            <input type="text" readonly class="form-control form-control-sm" id="edcname" name="edcname" placeholder="Account Name" value="<?php echo $blog['ac_name']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div id="edccoin" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5" >
                                            <label for="edccoins" class="mb-1 m-0 text-muted text-sm">Requested Coins</label>
                                            <select readonly disabled class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Requested Coins" tabindex="-1" aria-hidden="true" id="edccoins" name="edccoins">
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
                                            <select readonly disabled id="edcnetworks" name="edcnetworks" class="form-control select2 form-select select2-hidden-accessible" data-placeholder="Choose Network">
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
                                            <input readonly type="text" class="form-control form-control-sm" id="edcaddress" name="edcaddress" placeholder="Address" value="<?php echo $blog['ac_address']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edcwallet_provider" class="mb-2 m-0 text-muted text-sm">Crypto Provider</label>
                                            <input readonly type="text" class="form-control form-control-sm" id="edcwallet_provider" name="edcwallet_provider" placeholder="Crypto Provider" value="<?php echo $blog['wallet_provider']; ?>" required>
                                            <div class="valid-feedback">Looks good!</div>
                                          </div>
                                          <div id="edccurrent" class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-5" >
                                            <label for="edccurrency" class="mb-1 m-0 text-muted text-sm">Requested Currency</label>
                                            <select readonly disabled id="edccurrency" name="edccurrency" class="form-control form-control-sm select2-show-search form-select" data-placeholder="Choose one">
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
                                            <input readonly class="form-control file-input form-control-sm" id="edcdocument" name="edcdocument" type="file" disabled value="<?php echo $blog['documen']; ?>">
                                            <input type="hidden" name="fu" id="fu" value="<?php echo $blog['documen']; ?>">
                                            <div class="invalid-feedback">Please provide a valid document.</div>
                                          </div>
                                          <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 mb-5">
                                            <label for="edbfee">Withdraw Fee- %</label>
                                            <input readonly readonly type="number" class="form-control form-control-sm" id="edcfee" name="edcfee" placeholder="Withdraw Fee- %" value="<?php echo $blog['withdrafee']; ?>"  required>
                                            <div class="invalid-feedback">Please provide a valid Number.</div>
                                          </div>
                                          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-5">
                                            <label for="edcnickname">Account Nick Name</label>
                                            <input readonly type="text" class="form-control form-control-sm" id="edcnickname" name="edcnickname" placeholder="Account Nick Name" value="<?php echo $blog['nickname']; ?>" >
                                            <div class="invalid-feedback">Please provide a nick name.</div>
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