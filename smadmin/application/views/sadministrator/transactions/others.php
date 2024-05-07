<!--app-content open-->
<!--       <style type="text/css">
        table {
margin: 0 auto;
width: 100%;
clear: both;
border-collapse: collapse;
table-layout: fixed; // ***********add this
word-wrap:break-word; // ***********and this

}
      </style> -->

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
                  <li class="breadcrumb-item"  aria-current="page">Merchants</li>
                  <li class="breadcrumb-item active"  aria-current="page"><a href="<?php echo base_url('sadministrator/transactions/transactions-others'); ?>">List Payin Transactions</a></li>
                </ol>
              </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->
            
            <!-- <div class="row mb-4 justify-content-center"> -->
          <input type="hidden" name="muploadbank" id="muploadbank" value="<?php echo 1; //$post['id']; ?>">
          <form id="msearchtrnfrm" method="POST" action="<?php echo base_url('sadministrator/transactions/transactions-others'); ?>">
            <div class="row p-3 border-bottom mx-auto bg-white rounded-2">
              <div class="col-sm-12 col-md-12 col-xl-4">
                <label for="start-datepicker">Start Date</label>
                <div class="input-group mb-4">
                  <div class="input-group-text bg-primary-transparent text-primary">
                    <i class="fe fe-calendar text-20"></i>
                  </div>
                  <input class="form-control start-datepicker" name="startdate" id="start-datepicker" placeholder="DD/MM/YYYY" type="text" value="<?php date_default_timezone_set('Asia/Phnom_Penh') ; if(set_value('startdate')==""){ echo date("d-m-Y"); } else {echo set_value('startdate');}  ?>">
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-xl-4">
                <label for="end-datepicker">End Date</label>
                <div class="input-group">
                  <div class="input-group-text bg-primary-transparent text-primary">
                    <i class="fe fe-calendar text-20"></i>
                  </div>
                  <input class="form-control end-datepicker" name="enddate"  id="end-datepicker" placeholder="DD/MM/YYYY" type="text" value="<?php date_default_timezone_set('Asia/Phnom_Penh') ; if(set_value('enddate')==""){ echo date("d-m-Y"); } else {echo set_value('enddate');}  ?>">
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-xl-4">
                <label class="">&nbsp;</label>
                <div class="btn-list text-start mt-0">
                  <button class="btn btn-primary bg-gray-900" id="viewdate" name="submitForm" value="viewdate" type="submit"> <i class="fe fe-check-circle"></i> Search</button>
                  <button class="btn btn-warning bg-gray-800" id="viewall"  name="submitForm" value="viewall" type="submit"> <i class="fe fe-check-circle p-1"></i>All</button>
                  <button class="btn btn-warning bg-gray-800" id="viewtoday"  name="submitForm" value="viewtoday" type="submit"> <i class="fe fe-check-circle p-1"></i>Today</button>
                </div>
              </div>
                       
            </div>
          </form>
            
            <div class="row mb-4 row-cols-1 row-cols-md-3 g-4">
              <div class="col-md-12">

                    <?php if($this->session->flashdata('success')): ?>
                      <?php echo '<div class="alert alert-success alert-dismissible fade show p-0 mb-4" role="alert">
                            <p class="py-3 px-5 mb-0 border-bottom border-bottom-success-light">
                              <span class="alert-inner--icon me-2"><i class="fe fe-thumbs-up"></i></span>
                              <strong>Success! &nbsp;&nbsp;</strong>
                            </p>
                            <p class="py-3 px-5">'.$this->session->flashdata('success').'</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>'; ?>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('danger')): ?>
                      <?php echo '<div class="alert alert-danger alert-dismissible fade show p-0 mb-0" role="alert">
                            <p class="py-3 px-5 mb-0 border-bottom border-bottom-danger-light">
                              <span class="alert-inner--icon me-2"><i class="fe fe-slash"></i></span>
                              <strong>Error! &nbsp;&nbsp;</strong>
                            </p>
                            <p class="py-3 px-5">'.$this->session->flashdata('danger').'</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                        </div>'; ?>
                    <?php endif; ?>
                     <?php if($this->session->flashdata('warning')): ?>
                      <?php echo '<div class="alert alert-warning alert-dismissible fade show p-3 mb-4" role="alert">
                            <p class="py-3 px-5 mb-0 border-bottom border-bottom-warning-light">
                              <span class="alert-inner--icon me-2"><i class="fe fe-alert-triangle"></i></span>
                              <strong>Warning! &nbsp;&nbsp;</strong>
                            </p>
                            <p class="py-3 px-5">'.$this->session->flashdata('warning').'</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>'; ?>
                    <?php endif; ?>
                    <?php if(validation_errors() != null): ?>
                      <?php echo '<div class="alert alert-warning alert-dismissible fade show p-3 mb-4" role="alert">
                            <p class="py-3 px-5 mb-0 border-bottom border-bottom-warning-light">
                              <span class="alert-inner--icon me-2"><i class="fe fe-alert-triangle"></i></span>
                              <strong>Warning! &nbsp;&nbsp;</strong>
                            </p>
                            <p class="py-3 px-5">'.validation_errors().'</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>'; ?>
                    <?php endif; ?>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="card h-100">
                    <div class="card-header border-bottom  bg-gray-900 text-white">
                      <h3 class="card-title">Deposit</h3>
                    </div>
                    <div class="card-body">
                      <p class="text-muted"></p>
                        <div class="row mb-2">
                          <label for="firstName" class="col-md-4 form-label">Deposit</label>
                          <div class="col-md-8">
                            <input class="form-control text-muted" readonly name="deposit_info" id="deposit_info" class="deposit_info" placeholder="0" type="text" value="<?php if($cashcounts[0]!="" ) echo(number_format($cashcounts[0]['totprice'],2, '.', '')); else echo "0"; ?>">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="Charge" class="col-md-4 form-label">Charges</label>
                          <div class="col-md-8">
                            <input class="form-control text-muted" id="deposit_charge" readonly   placeholder="0" type="text" value="<?php if(isset($cashcounts[0]['deposit_charge']) && $cashcounts[0]['deposit_charge']!="" ) echo$cashcounts[0]['deposit_charge']; else echo "0"; ?>%">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="firstName" class="col-md-4 form-label">Net Deposit</label>
                          <div class="col-md-8">
                            <input class="form-control text-muted" readonly class="net_deposit" placeholder="0" type="text" value="<?php if(isset($cashcounts[0]['net_deposit']) && $cashcounts[0]['net_deposit']!="" ) echo(number_format($cashcounts[0]['net_deposit'],2, '.', '')); else echo "0"; ?>">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="firstName" class="col-md-4 form-label">Balance Available</label>
                          <div class="col-md-8">
                            <input class="form-control text-muted" readonly placeholder="0" type="text" value="<?php if(isset($cashcounts['saving_amt']) && $cashcounts['saving_amt']!="" ) echo(number_format($cashcounts['saving_amt'],2, '.', '')); else echo "0"; ?>">
                          </div>
                        </div>
                        <!-- <div class="row mb-2">
                          <label for="lastName" class="col-md-4 form-label">Fee</label>
                          <div class="col-md-8">
                            <input class="form-control text-muted" readonly name="deposit_fee_info" id="deposit_fee_info" placeholder="0" type="text" value="">
                          </div>
                        </div>
                        <div class="row">
                          <label for="email" class="col-md-4 form-label">Balance</label>
                          <div class="col-md-8 text-info ">
                            <input class="form-control text-light bg-gray-900" readonly name="deposit_balance_info" id="deposit_balance_info" placeholder="0" type="text" value="">
                          </div>
                        </div> -->
                    </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                  <div class="card h-100">
                    <div class="card-header border-bottom bg-gray-900 text-white">
                      <h3 class="card-title">Withdrawal Amount</h3>
                    </div>
                    <div class="card-body">
                      <p class="text-muted"></p>
                        <div class="row mb-2">
                          <label for="firstName" class="col-md-5 form-label">Withdrawal</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly name="withdrawal_info" id="withdrawal_info" placeholder="0" type="text" value="<?php if (count($cashcounts)>2){if(isset($cashcounts[2]['totprice']) && $cashcounts[2]['totprice']!="") echo(number_format($cashcounts[2]['totprice'],2, '.', ''));  else echo "0"; } else echo "0"; ?>">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="firstName" class="col-md-5 form-label">Charges</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly id="withdrawal_charges" placeholder="0" type="text" value="<?php if(isset($cashcounts[2]['withdrawal_charge']) && $cashcounts[2]['withdrawal_charge']!="" ) echo $cashcounts[2]['withdrawal_charge']; else echo "0"; ?>%">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="firstName" class="col-md-5 form-label">Net Withdrawal</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly id="net_withdrawal" placeholder="0" type="text" value="<?php if(isset($cashcounts[2]['net_withdrawal']) && $cashcounts[2]['net_withdrawal']!="" ) echo(number_format($cashcounts[2]['net_withdrawal'],2, '.', '')); else echo "0"; ?>">
                          </div>
                        </div>
                        <!-- <div class="row mb-2">
                          <label for="lastName" class="col-md-5 form-label">Fee</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly name="withdrawal_fee_info" id="withdrawal_fee_info" placeholder="0" type="text" value="">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="email" class="col-md-5 form-label">Balance</label>
                          <div class="col-md-7 text-info ">
                            <input class="form-control text-light bg-gray-900" readonly name="withdrawal_balance_info" id="withdrawal_balance_info" placeholder="0" type="text" value="">
                          </div>
                        </div> -->
                    </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6">
                  <div class="card h-100 ">
                    <div class="card-header border-bottom  bg-gray-900 text-white">
                    <!-- <h3 class="card-title">Waiting Clear</h3> -->
                      <h3 class="card-title">Total</h3>
                    </div>
                    <div class="card-body">
                      <p class="text-muted"></p>
                        <!-- <div class="row mb-2">
                          <label for="firstName" class="col-md-5 form-label">Deposit</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly name="waiting_deposit_info" id="waiting_deposit_info" placeholder="0" type="text" value="<?php if (count($cashcounts)>1){if($cashcounts[1]!="") echo(number_format($cashcounts[1]['totprice'],2, '.', ''));  else echo "0"; } else echo "0"; ?>">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="lastName" class="col-md-5 form-label">Withdrawal</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly name="waiting_withdrawal_info" id="waiting_withdrawal_info" placeholder="0" type="text" value="<?php if (count($cashcounts)>3){if($cashcounts[3]!="") echo(number_format($cashcounts[3]['totprice'],2, '.', ''));  else echo "0"; } else echo "0"; ?>">
                          </div>
                        </div> -->
                        <div class="row mb-2">
                          <label for="lastName" class="col-md-5 form-label">Total Deposit</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly placeholder="0" type="text" value="<?php if(isset($cashcounts[0]['net_deposit']) && $cashcounts[0]['net_deposit']!="" ) echo(number_format($cashcounts[0]['net_deposit'],2, '.', '')); else echo "0"; ?>">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="lastName" class="col-md-5 form-label">Total Withdrawal</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly placeholder="0" type="text" value="<?php if(isset($cashcounts[2]['net_withdrawal']) && $cashcounts[2]['net_withdrawal']!="" ) echo(number_format($cashcounts[2]['net_withdrawal'],2, '.', '')); else echo "0"; ?>">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="lastName" class="col-md-5 form-label">Total Balance</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly placeholder="0" type="text" value="<?php if(isset($cashcounts['saving_amt']) && $cashcounts['saving_amt']!="" ) echo(number_format($cashcounts['saving_amt'],2, '.', '')); else echo "0"; ?>">
                          </div>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                  <div class="card h-100">
                    <div class="card-header border-bottom  bg-gray-900 text-white">
                      <h3 class="card-title">Total Items</h3>
                    </div>
                    <div class="card-body">
                      <p class="text-muted"></p>
                        <div class="row mb-2">
                          <label for="firstName" class="col-md-5 form-label">Deposit</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly name="total_deposit_info" id="total_deposit_info" placeholder="0" type="text" value="<?php if (count($cashcounts)>1){ if(isset($cashcounts[0]['totcount']) && isset($cashcounts[1]['totcount']) && $cashcounts[0]!="" && $cashcounts[1]!="") echo(number_format(($cashcounts[0]['totcount']+$cashcounts[1]['totcount']),2, '.', ''));  else echo "0"; } else echo "0"; ?>">
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label for="lastName" class="col-md-5 form-label">Withdrawal</label>
                          <div class="col-md-7">
                            <input class="form-control text-muted" readonly name="total_withdrawal_info" id="total_withdrawal_info" placeholder="0" type="text" value="<?php if (count($cashcounts)>3){ if(isset($cashcounts[2]['totcount']) && isset($cashcounts[3]['totcount']) &&  $cashcounts[2]['totcount']!="" && $cashcounts[3]['totcount']="") echo(number_format(($cashcounts[2]['totcount']+$cashcounts[3]['totcount']),2, '.', '')); else echo "0"; } else echo "0"; ?>">
                          </div>
                        </div>
                        
                    </div>
                  </div>
              </div> -->
            </div>
            <!-- ROW-1 END-->

            <!-- ROW-1 -->

            <input type="hidden" name="mviewothers" id="mviewothers" value="<?php echo 1; //$post['id']; ?>">
            <!-- ROW-1 END-->
            <!-- Row -->
              <div class="row row-sm">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header border-bottom bg-primary text-white">
                      <h3 class="card-title">Deposit-Trnasactions</h3><?php //echo $this->uri->segment(3); ?>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive export-table" >
                        <table id="trnfile-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100"  style="white-space: break-spaces;">
                          <thead>
                            <tr class="">
                              
                              <th class="all col-sm-1 bg-transparent border-bottom-0">#</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Order-ID</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Store-ID</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">TRN-ID</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Ref-ID</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Source</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Amount</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Currency</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Status</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Dated</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">Action</th>
                              <th class="all col-sm-1 bg-transparent border-bottom-0">BankSlip</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach($posts as $blog) : ?>
                            <?php if ($blog['documen']!=""): ?>
                            <tr class="bg-gray-900">
                              <td class="text-white fs-12 fw-semibold"><?php echo $i++; //echo $blog['id']; ?></td>
                              <td class="text-white fs-12 fw-semibold">
                                <a href="#" class="text-white">
                                  <div class="btn-list btn-animation">
                                    <button type="button" class="btn btn-success btn-spinners ms-2"><span class="loading"><?php echo $blog['id']; ?></span>
                                    </button>
                                  </div>
                                </a>
                              </td>
                              <td class="text-white fs-12 fw-semibold"><?php echo $blog['vstore_id']; ?></td>
                              <td class="text-white fs-12 fw-semibold"><?php echo $blog['orderid']; ?></td>
                              <td class="text-white fs-12 fw-semibold"><?php echo $blog['payin_request_id']; ?></td>
                              <td class="text-white fs-12 fw-semibold"><?php echo $blog['source_type']; ?></td>
                              <td class="text-white fs-12 fw-semibold"><?php echo $blog['price']; ?></td>
                              <td class="text-white fs-12 fw-semibold"><?php echo $blog['curr']; ?></td>
                              <td class="text-white fs-12 fw-semibold"><?php echo $blog['orderstatus']; ?></td>
                              <td class="text-white fs-12 fw-semibold"><?php echo $blog['created_date']; ?></td>
                              <td class="text-white fs-12 fw-semibold">
                                <div class="d-flex align-items-stretch">
                                  <a href="#" class="border br-5 px-2 py-1 text-white d-flex align-items-center" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                  <div class="dropdown-menu dropdown-menu-start  btn btn-outline">
                                    <a class="dropdown-item" href="#modal-dialog" data-bs-target="#viewsalt<?php echo $blog['id']; ?>" data-bs-toggle="modal" title="" data-bs-original-title=""><i class="fe fe-eye fs-13  me-2"></i> View</a>
                                    <a class="dropdown-item" href="#modal-dialog" data-bs-target="#viewsalt<?php echo $blog['id']; ?>" data-bs-toggle="modal" title="" data-bs-original-title=""><i class="fe fe-refresh-ccw fs-13  me-2"></i> Refresh</a>
                                    
                                  </div>
                                </div>
                              </td>
                              <td class="text-white fs-12 fw-semibold wp-30 lightgallery">
                                <a href="<?php echo site_url();?>assets/images/banks/<?php echo $blog['documen']; ?>"   data-responsive="../assets/images/media" data-src="<?php echo site_url();?>assets/images/banks/<?php echo $blog['documen']; ?>"  data-sub-html="<?php echo $blog['documen']; ?>" alt="<?php echo $blog['documen']; ?>">
                                  <img width="40px;" src="<?php echo site_url();?>assets/images/banks/<?php echo $blog['documen']; ?> ">
                                  </a>     
                              </td>

                              <!-- <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0" data-responsive="../assets/images/media" data-src="../assets/images/media/1.jpg" data-sub-html="<h4>Gallery Image 1</h4><p> Many desktop publishing packages and web page editors now use Lorem Ipsum</p>">
                      <a href="javascript:void(0)">
                        <img class="img-responsive br-5 wp-100" src="../assets/images/media/1.jpg" alt="Thumb-1">
                      </a>
                    </li> -->
                              <!-- http://gtechz.implogix.com/smadmin/assets/images/banks/1691048783zbanks.jpg -->
                            </tr>
                             <?php else: ?>
                            <tr>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $i++; //echo $blog['id']; ?></td>
                              <td class="text-muted fs-12 fw-semibold">
                                <a href="#" class="text-dark">
                                  <div class="btn-list btn-animation">
                                    <button type="button" class="btn btn-success btn-spinners ms-2"><span class="loading"><?php echo $blog['id']; ?></span>
                                    </button>
                                  </div>
                                </a>
                              </td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['vstore_id']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['orderid']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['payin_request_id']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['source_type']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['price']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['curr']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['orderstatus']; ?></td>
                              <td class="text-info fs-12 fw-semibold"><?php echo $blog['created_date']; ?></td>
                              <td class="text-muted fs-12 fw-semibold">
                                <div class="d-flex align-items-stretch">
                                  <a href="#" class="border br-5 px-2 py-1 text-muted d-flex align-items-center" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                  <div class="dropdown-menu dropdown-menu-start  btn btn-outline">
                                    <a class="dropdown-item" href="#modal-dialog" data-bs-target="#viewsalt<?php echo $blog['id']; ?>" data-bs-toggle="modal" title="" data-bs-original-title=""><i class="fe fe-eye fs-13  me-2"></i> View</a>
                                    <a class="dropdown-item" href="#modal-dialog" data-bs-target="#viewsalt<?php echo $blog['id']; ?>" data-bs-toggle="modal" title="" data-bs-original-title=""><i class="fe fe-refresh-ccw fs-13  me-2"></i> Refresh</a>
                                    
                                  </div>
                                </div>
                              </td>
                              <td class="text-info fs-12 fw-semibold wp-30">NA</td>
                            </tr>
                             <?php endif; ?>
                            <!--VIEW MERCHANT MODAL-->
                            <div class="modal fade viewsalt" id="viewsalt<?php echo $blog['id']; ?>">
                              <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
                                <div class="modal-content modal-content-demo">
                                  <div class="modal-header p-5 bg-primary">
                                    <h4 class="modal-title text-white">#<?php echo $blog['id'].' - '.$blog['vstore_id'].' - '.$blog['orderstatus']; ?></h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <?php  echo form_open_multipart('sadministrator/transactions/update-trnz', array('id' => 'edittrnzacformc'.$blog['id'], 'class'=>'edittrnzacform'))?>
                                        <input type="hidden" name="zedtrnzid" id="zedtrnzid" value="<?php echo $blog['id']; ?>">
                                        
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Order Id</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['id'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Merchant_ID</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['vstore_id'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Client IP</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['client_ip'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Action</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['action'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Source</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['source'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Source Url</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['source_url'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Source Type</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['source_type'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Amount</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['price'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Currency</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['curr'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Product Name</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['product_name'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Remarks</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['remarks'];?></p>
                                      </div>
                                      <div class="mb-1">
                                        <h6 class="text-uppercase text-info"></h6>
                                        <!-- Gradient divider -->
                                        <hr data-content="" class="hr-text">
                                      </div>
                                      <div class="mb-4">
                                        <h6 class="text-uppercase text-info">Customer Informtion</h6>
                                        <!-- Gradient divider -->
                                        <hr data-content="" class="hr-text">
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Customer Name</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_name'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Email</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_email'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Addressline 1</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_addressline_1'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Addressline 2</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_addressline_2'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">City</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_city'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">State</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_state'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Country</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_country'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">ZipCode</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_zip'];?></p>
                                      </div>
                                       <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Phone</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_phone'];?></p>
                                      </div>
                                      <div class="mb-1">
                                        <h6 class="text-uppercase text-info"></h6>
                                        <!-- Gradient divider -->
                                        <hr data-content="" class="hr-text">
                                      </div>
                                      <div class="mb-4">
                                        <h6 class="text-uppercase text-info">Payment Informtion</h6>
                                        <!-- Gradient divider -->
                                        <hr data-content="" class="hr-text">
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Bank Document</p>
                                        <p class="m-0 wp-70 text-dark"><?php if($blog['documen']!="") { ?>
                                              <a target="_blank" href="<?php echo site_url();?>assets/images/banks/<?php echo $blog['documen']; ?>"><?php echo $blog['documen']; ?></a>
                                            <?php } else {?>
                                              <?php echo "Choose File"; } ?>
                                          <input class="form-control file-input form-control-sm" id="edbdocument" name="edbdocument" type="file" value="<?php echo $blog['documen']; ?>">
                                            <input type="hidden" name="fu" id="fu" value="<?php echo $blog['documen']; ?>">
                                            <div class="invalid-feedback">Please provide a valid document.</div>
                                            <button class="mb-0 mt-5 status-main in-progress"><span  class="fe fe-check-circle p-1"></span>Upload</button></p>
                                            <!-- ALTER TABLE `m_payin` ADD `documen` VARCHAR(1000) NULL AFTER `status`; -->
                                            
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p id="" align="center" class="alert-success statusMsg">Its staus message</p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Bank Name</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_bank_name'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Bank Code</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_bank_code'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Reference No.</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['payin_request_id'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Transaction Id</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['orderid'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Transaction Status</p>
                                        <p class="m-0 wp-70 text-dark"><span class="mb-0 mt-1 status-main on-hold"><?php if($blog['orderstatus']=="") echo "Processing"; else echo $blog['orderstatus']; ?></span></p>
                                        <!-- completed,progress,on-hold -->

                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Transaction Remarks</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['orderremarks'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Order Date</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['pdate'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Gateway Modified Date</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['created_date'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Status</p>
                                        <div class="m-0 wp-70 text-dark">
                                          <span class="mb-0 mt-1 status-main in-progress"><?php if($blog['status']==1) echo "Approved"; elseif($blog['status']==0) echo "Pending"; else echo "Hold"; ?></span>
                                        </div>
                                      </div>
                                      
                                      <div class="col-md-12 d-flex mb-4">
                                        <div class="col-md-12">
                                      
                                        </div>
                                      </div> 
                                    </form>
                                  </div>
                                </div>
                                  <div class="modal-footer p-0 border-top-0">
                                   
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--VIEW MERCHANT MODAL-->
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
