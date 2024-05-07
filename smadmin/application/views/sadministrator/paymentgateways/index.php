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
                  <li class="breadcrumb-item active"  aria-current="page"><a href="<?php echo base_url('sadministrator/paymentgateways/index'); ?>">List Patment Gateway</a></li>
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
                      <h3 class="card-title">Merchants</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100" >
                          <thead>
                            <tr>
                              
                              <th class="bg-transparent border-bottom-0">#</th>
                              <th class="bg-transparent border-bottom-0">Priority</th>
                              <th class="bg-transparent border-bottom-0">Merchant_ID</th>
                              <th class="bg-transparent border-bottom-0">Salt Key</th>
                              <th class="bg-transparent border-bottom-0">Source</th>
                              <th class="bg-transparent border-bottom-0">Source_Type</th>
                              <th class="bg-transparent border-bottom-0">Action</th>
                              <th class="bg-transparent border-bottom-0">Dated</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=1; foreach($posts as $blog) : ?>
                            <tr>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $i++; //echo $blog['id']; ?></td>
                              <td class="text-muted fs-12 fw-semibold">
                                <a href="#" class="text-dark">
                                  <div class="btn-list btn-animation">
                                    <button type="button" class="btn btn-info btn-spinners ms-2"><span class="loading"><?php echo $blog['id']; ?></span>
                                    </button>
                                  </div>
                                </a>
                              </td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['m_smvstore_id']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo str_repeat("*", strlen($blog['m_smsaltkey'])-4) . substr($blog['m_smsaltkey'], -4); ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['m_smsaltcomment']; ?></td>
                              <td class="text-muted fs-12 fw-semibold"><?php echo $blog['m_smsalttitle']; ?></td>
                              
                              <td class="text-muted fs-12 fw-semibold">
                                <div class="d-flex align-items-stretch">
                                  <a href="#" class="border br-5 px-2 py-1 text-muted d-flex align-items-center" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                  <div class="dropdown-menu dropdown-menu-start  btn btn-outline">
                                    <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>sadministrator/paymentgateways/edit/<?php //echo $blog['id']; ?>"><i class="fe fe-edit-2 fs-13  me-2"></i> Edit</a> -->
                                    <a class="dropdown-item" href="#modal-dialog" data-bs-target="#viewsalt<?php echo $blog['id']; ?>" data-bs-toggle="modal" title="" data-bs-original-title=""><i class="fe fe-eye fs-13  me-2"></i> View</a>
                                    
                                  </div>
                                </div>
                              </td>
                              <td class="text-info fs-12 fw-semibold">CD: 
                                <?php echo $blog['m_smsaltcreateddate']; ?><br/>UD: <?php echo $blog['m_smsaltmodifydate']; ?></td>
                            </tr>
                            <!--VIEW MERCHANT MODAL-->
                            <div class="modal fade viewsalt" id="viewsalt<?php echo $blog['id']; ?>">
                              <div class="modal-dialog modal-dialog-centered task-view-modal" role="document">
                                <div class="modal-content modal-content-demo">
                                  <div class="modal-header p-5 bg-primary">
                                    <h4 class="modal-title text-white">#<?php echo $blog['id'].' - '.$blog['m_smsaltkey'].' - '.$blog['m_smsaltcomment']; ?></h4><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Priority</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['m_saltpgid'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Merchant_ID</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['m_smvstore_id'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Salt Key</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['m_smsaltkey'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Source</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['m_smsaltcomment'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Source_Type</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['m_smsalttitle'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Salt Cr.Date</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['m_smsaltcreateddate'];?></p>
                                      </div>
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Salt Mod.Date</p>
                                        <p class="m-0 wp-70 text-dark"><?php echo $blog['m_smsaltmodifydate'];?></p>
                                      </div>
                                      
                                      <div class="col-md-12 d-flex mb-4">
                                        <p class="m-0 wp-30 text-muted">Status</p>
                                        <div class="m-0 wp-70 text-dark">
                                          <span class="mb-0 mt-1 status-main in-progress"><?php if($blog['m_smsaltacstatus']==1) echo "Active"; elseif($blog['m_smsaltacstatus']==0) echo "Hold"; else echo "pending"; ?></span>
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