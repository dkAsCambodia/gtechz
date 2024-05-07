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
                  <li class="breadcrumb-item"  aria-current="page">Merchants</li>
                  <li class="breadcrumb-item active"  aria-current="page"><a href="<?php echo base_url('sadministrator/transactions/payout-others'); ?>">List Payout Transactions</a></li>
                </ol>
              </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->

            <input type="hidden" name="maddpgsalt" id="maddpgsalt" value="<?php echo 1; //$post['id']; ?>">
            <div class="row">
            </div>
            <!-- ROW-1 END-->
            <!-- Row -->
              <div class="row row-sm">
                <div class="col-lg-12">
                  <div class="card">
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
                    <div class="card-header border-bottom">
                      <h3 class="card-title">Merchants</h3><?php //echo $this->uri->segment(3); ?>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100" >
                          <thead>
                            <tr>
                              
                              <th class="bg-transparent border-bottom-0">#</th>
                              <th class="bg-transparent border-bottom-0">Order-ID</th>
                              <th class="bg-transparent border-bottom-0">Name</th>
                              <th class="bg-transparent border-bottom-0">Source</th>
                              <th class="bg-transparent border-bottom-0">Amount</th>
                              <th class="bg-transparent border-bottom-0">Currency</th>
                              <th class="bg-transparent border-bottom-0">Status</th>
                              <th class="bg-transparent border-bottom-0">Dated</th>
                              <th class="bg-transparent border-bottom-0">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach($posts as $blog) : ?>
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
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['customer_name']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['source_type']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['price']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['curr']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['orderstatus']; ?></td>
                              <td class="text-info fs-12 fw-semibold"><?php echo $blog['created_date']; ?></td>
                              <td class="text-muted fs-12 fw-semibold">
                                <div class="d-flex align-items-stretch">
                                  <a href="#" class="border br-5 px-2 py-1 text-muted d-flex align-items-center" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                  <div class="dropdown-menu dropdown-menu-start  btn btn-outline">
                                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>sadministrator/paymentgateways/edit/<?php //echo $blog['id']; ?>"><i class="fe fe-edit-2 fs-13  me-2"></i> Edit</a> -->
                                    <a class="dropdown-item" href="#modal-dialog" data-bs-target="#viewsalt<?php echo $blog['id']; ?>" data-bs-toggle="modal" title="" data-bs-original-title=""><i class="fe fe-eye fs-13  me-2"></i> View</a>
                                    
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <!--VIEW MERCHANT MODAL-->
                            <div class="modal fade viewsalt" id="viewsalt<?php echo $blog['id']; ?>">
                              <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
                                <div class="modal-content modal-content-demo">
                                  <div class="modal-header p-5 bg-primary">
                                    <h4 class="modal-title text-white">#<?php echo $blog['id'].' - '.$blog['vstore_id'].' - '.$blog['orderstatus']; ?></h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
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
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Narration</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['narration'];?></p>
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
                                        <p class="m-0 wp-30 text-muted">Bank Name</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_bank_name'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Bank Code</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_bank_code'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Bank Account Number</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['customer_account_number'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Reference No.</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['payout_request_id'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Member Code</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['payout_membercode'];?></p>
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
