      <!--app-content open-->
      <div class="app-content main-content mt-0">
        <div class="side-app">
           <!-- CONTAINER -->
          <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header">
              <div>
                <h1 class="page-title"><?php echo $title; ?> - <?php echo $post['merchantid']; ?></h1>
              </div>
              <div class="ms-auto pageheader-btn">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url('sadministrator/dashboard'); ?>">Home</a></li>
                  <li class="breadcrumb-item"  aria-current="page">Merchants</li>
                  <li class="breadcrumb-item active"  aria-current="page"><a href="<?php echo base_url('sadministrator/merchants/business-profile'); ?>">Business-Profile</a></li>
                </ol>
              </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->
            <?php echo form_open_multipart('sadministrator/merchants/update-business-profile', array('id' => 'maddbusinessf', 'class'=>'row g-3 needs-validation','novalidate' =>'novalidate'))?>
            <input type="hidden" name="maddbusiness" id="maddbusiness" value="<?php echo 1; //$post['id']; ?>">
            <!--ROW OPENED-->
            <div class="row">
              <div class="col-lg-12 col-md-12">
               <div  class="card">
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
                  <div class="card-header border-bottom bg-primary">
                    <h4 class="mb-0 text-white">Payment Settings</h4>
                  </div>
                  <div class="card-body p-0 task-edit-main">
                    <div class="row p-5 border-bottom">
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Select Merchant ID:</label>
                          <select class="form-control select2 form-select select2-hidden-accessible text-dark" id="merchantid" name="merchantid"  required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <?php foreach ($categories as $categoryu) { ?>
                            <option <?php if($categoryu['merchantid']==$post['merchantid']){ echo 'selected="selected"'; } ?> value="<?php echo $categoryu['merchantid'] ?>"><?php echo $categoryu['merchantid']?> </option>
                            <?php } ?>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose a Merchant ID!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-9">
                        <div class="form-group">
                          <label class="form-label text-muted">Merchant Name:</label>
                          <div class="input-group" id="client-username">
                            <input type="text" readonly class="form-control text-dark" value="<?php echo $post['mname'];  ?>" required id="mname" name="mname" placeholder="Enter Merchant Name">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose Merchant Name!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Wire fee:</label>
                          <input type="text"  required id="mbwirefee" name="mbwirefee"  class="form-control text-dark" value="<?php echo $post['mbwirefee'];  ?>" placeholder="1">
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Enter Wire fee Amount!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Monthly fee:</label>
                          <input type="text"  required id="mbmonthlyfee" name="mbmonthlyfee"  class="form-control text-dark" value="<?php echo $post['mbmonthlyfee'];  ?>" placeholder="1">
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Enter Monthly fee Amount!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Withdraw Minimum Amount:</label>
                          <input type="text"  required id="mbwithdraw_minamt" name="mbwithdraw_minamt"  class="form-control text-dark" value="<?php echo $post['mbwithdraw_minamt'];?>" placeholder="1">
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Enter Withdraw Minimum Amount!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Withdraw Maximum Amount:</label>
                          <input type="text"  required id="mbwithdraw_maxamt" name="mbwithdraw_maxamt" class="form-control text-dark" value="<?php echo $post['mbwithdraw_maxamt'];?>" placeholder="20000">
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Enter Withdraw Maximum Amount!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-6">
                        <div class="form-group">
                          <label class="form-label text-muted">Frozen Balance:</label>
                            <div class="input-group mb-3">
                              <span class="input-group-text bg-primary-transparent text-primary">$</span>
                              <input aria-label="Amount (to the nearest dollar)" class="form-control" placeholder="100" id="basic-addon3"  required id="mbfrozenbalance" name="mbfrozenbalance"  type="number" value="<?php echo $post['mbfrozenbalance'];?>" >
                              <span class="input-group-text bg-primary-transparent text-primary text-small">.% of Rolling Balance</span>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter Frozen Balance %!</div>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-2">
                        <div class="form-group">
                          <label class="form-label text-muted">Request Funds:</label>
                          <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" id="requestfunds"  name="requestfunds" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <option <?php if($post['requestfunds'] =="1" ){ echo 'selected="selected"'; } ?> value="1">Enable</option>
                            <option <?php if($post['requestfunds'] =="0" ){ echo 'selected="selected"'; } ?> value="0">Disable</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose One!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-2">
                        <div class="form-group">
                          <label class="form-label text-muted">MOTO:</label>
                          <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" id="mbmoto" name="mbmoto"  required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <option <?php if($post['mbmoto'] =="1" ){ echo 'selected="selected"'; } ?> value="1">Enable</option>
                            <option <?php if($post['mbmoto'] =="0" ){ echo 'selected="selected"'; } ?> value="0">Disable</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose One!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-2">
                        <div class="form-group">
                          <label class="form-label text-muted">Payout Gateway:</label>
                          <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" id="mbpayoutgateway"  name="mbpayoutgateway" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <option <?php if($post['mbpayoutgateway'] =="0" ){ echo 'selected="selected"'; } ?> value="0">Disable</option>
                            <option <?php if($post['mbpayoutgateway'] =="1" ){ echo 'selected="selected"'; } ?> value="1">Live</option>
                            <option <?php if($post['mbpayoutgateway'] =="2" ){ echo 'selected="selected"'; } ?> value="2">Test</option>
                            <option <?php if($post['mbpayoutgateway'] =="3" ){ echo 'selected="selected"'; } ?> value="3">Inactive</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose One!</div>
                        </div>
                      </div>
                    </div>
                    <div class="row p-5 border-bottom bg-primary">
                      <div class="col-xl-12">
                        <h4 class="mb-0 text-white">Business Information</h4>
                      </div>
                    </div>
                    <div class="row p-5 border-bottom">
                      <div class="col-sm-12 col-md-12 col-xl-6">
                        <div class="form-group">
                          <label class="form-label text-muted">Business Name:</label>
                          <div class="input-group" id="client-username">
                            <input type="text"  class="form-control text-dark" value="<?php echo $post['mbname'];  ?>" required id="mbname" name="mbname" placeholder="Enter Business Name">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter Business Name!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Business Category:</label>
                          <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" id="mbcategory"  name="mbcategory" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <option <?php if($post['mbcategory'] =="Marketing" ){ echo 'selected="selected"'; } ?> value="Marketing">Marketing</option>
                            <option <?php if($post['mbcategory'] =="IT Development" ){ echo 'selected="selected"'; } ?> value="IT Development">IT Development</option>
                            <option <?php if($post['mbcategory'] =="Cloud Computing" ){ echo 'selected="selected"'; } ?> value="Cloud Computing">Cloud Computing</option>
                            <option <?php if($post['mbcategory'] =="Medical Research" ){ echo 'selected="selected"'; } ?> value="Medical Research">Medical Research</option>
                            <option <?php if($post['mbcategory'] =="Ecommerce" ){ echo 'selected="selected"'; } ?> value="Ecommerce">Ecommerce</option>
                            <option <?php if($post['mbcategory'] =="Trading" ){ echo 'selected="selected"'; } ?> value="Trading">Trading</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose a Business Category!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                         <label class="form-label text-muted">Business Sub Category:</label>
                          <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" id="mbsubcategory"  name="mbsubcategory" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <option <?php if($post['mbsubcategory'] =="Shops" ){ echo 'selected="selected"'; } ?> value="Shops">Shops</option>
                            <option <?php if($post['mbsubcategory'] =="Manufacturing" ){ echo 'selected="selected"'; } ?> value="Manufacturing">Manufacturing</option>
                            <option <?php if($post['mbsubcategory'] =="Marketing" ){ echo 'selected="selected"'; } ?> value="Marketing">Marketing</option>
                            <option <?php if($post['mbsubcategory'] =="Sales" ){ echo 'selected="selected"'; } ?> value="Sales">Sales</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose a Sub Category!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-6">
                        <div class="form-group">
                          <label class="form-label text-muted">Business Website:</label>
                          <div class="input-group" id="company-website">
                            <input type="text" class="form-control text-dark" value="<?php echo $post['mbwebsite'];  ?>" required  id="mbwebsite" name="mbwebsite" placeholder="ex: http://www.domain.com/">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter Business Name!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Business Registration ID:</label>
                          <div class="input-group" id="company-gstnumber">
                            <input type="text" class="form-control text-dark"  value="<?php echo $post['mbcinno'];  ?>" required id="mbcinno" name="mbcinno" placeholder="Enter VAT/Licence Number">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter Registration ID!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Office Phone Number:</label>
                          <div class="input-group" id="company-phonenumber">
                            <input type="number" class="form-control text-dark" value="<?php echo $post['mbcontact'];  ?>"  required id="mbcontact" name="mbcontact" placeholder="Enter Phone Number">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter Phone Number!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="form-group">
                          <label class="form-label text-muted">Business Address:</label>
                          <textarea class="form-control" value="<?php echo $post['mbaddress'];  ?>" required id="mbaddress"  name="mbaddress" cols="30" rows="1" placeholder="Office Name, Building No, Street, Lane No, City"><?php echo $post['mbaddress'];  ?></textarea>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Enter a valid Address!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="form-group">
                          <label class="form-label text-muted">Business Description:</label>
                          <textarea class="form-control" value="<?php echo set_value('mbdescri');  ?>" required id="mbdescri"  name="mbdescri" cols="30" rows="1" placeholder="Business Activities"><?php echo $post['mbdescri'];  ?></textarea>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Enter a valid Description!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">City:</label>
                          <div class="input-group" id="company-city">
                            <input type="text"  class="form-control text-dark" value="<?php echo set_value('mbcity');  ?>" value="<?php echo $post['mbcity'];  ?>" placeholder="City" required id="mbcity" name="mbcity"/>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter a valid City!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">State:</label>
                          <div class="input-group" id="company-state">
                            <input type="text" class="form-control text-dark" value="<?php echo $post['mbstate'];  ?>" placeholder="State"  required id="mbstate" name="mbstate">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter a valid State!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Postal Code:</label>
                          <div class="input-group" id="company-postalcode">
                            <input type="text"  class="form-control text-dark" value="<?php echo $post['mbzipcode'];  ?>" placeholder="Postal Code" required id="mbzipcode" name="mbzipcode"/> 
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter a valid Postal Code!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <label class="form-label text-muted">Country: </label>
                        <div class="form-group">
                          <ul>
                            <li class="select-client">
                              <select class="form-control select2-country-search" data-placeholder="Select Country"  required id="mbcountry" name="mbcountry">
                                <option value="">Select Country</option>
                                <option <?php if($post['mbcountry'] =="UM" ){ echo 'selected="selected"'; } ?> value="UM">United States of America</option>
                                <option <?php if($post['mbcountry'] =="AF" ){ echo 'selected="selected"'; } ?> value="AF">Afghanistan</option>
                                <option <?php if($post['mbcountry'] =="AL" ){ echo 'selected="selected"'; } ?> value="AL">Albania</option>
                                <option <?php if($post['mbcountry'] =="AD" ){ echo 'selected="selected"'; } ?> value="AD">Andorra</option>
                                <option <?php if($post['mbcountry'] =="AG" ){ echo 'selected="selected"'; } ?> value="AG">Antigua and Barbuda</option>
                                <option <?php if($post['mbcountry'] =="AU" ){ echo 'selected="selected"'; } ?> value="AU">Australia</option>
                                <option <?php if($post['mbcountry'] =="AM" ){ echo 'selected="selected"'; } ?> value="AM">Armenia</option>
                                <option <?php if($post['mbcountry'] =="AO" ){ echo 'selected="selected"'; } ?> value="AO">Angola</option>
                                <option <?php if($post['mbcountry'] =="AR" ){ echo 'selected="selected"'; } ?> value="AR">Argentina</option>
                                <option <?php if($post['mbcountry'] =="AT" ){ echo 'selected="selected"'; } ?> value="AT">Austria</option>
                                <option <?php if($post['mbcountry'] =="AZ" ){ echo 'selected="selected"'; } ?> value="AZ">Azerbaijan</option>
                                <option <?php if($post['mbcountry'] =="BA" ){ echo 'selected="selected"'; } ?> value="BA">Bosnia and Herzegovina</option>
                                <option <?php if($post['mbcountry'] =="BB" ){ echo 'selected="selected"'; } ?> value="BB">Barbados</option>
                                <option <?php if($post['mbcountry'] =="BD" ){ echo 'selected="selected"'; } ?> value="BD">Bangladesh</option>
                                <option <?php if($post['mbcountry'] =="BE" ){ echo 'selected="selected"'; } ?> value="BE">Belgium</option>
                                <option <?php if($post['mbcountry'] =="BF" ){ echo 'selected="selected"'; } ?> value="BF">Burkina Faso</option>
                                <option <?php if($post['mbcountry'] =="BG" ){ echo 'selected="selected"'; } ?> value="BG">Bulgaria</option>
                                <option <?php if($post['mbcountry'] =="BH" ){ echo 'selected="selected"'; } ?> value="BH">Bahrain</option>
                                <option <?php if($post['mbcountry'] =="BJ" ){ echo 'selected="selected"'; } ?> value="BJ">Benin</option>
                                <option <?php if($post['mbcountry'] =="BN" ){ echo 'selected="selected"'; } ?> value="BN">Brunei</option>
                                <option <?php if($post['mbcountry'] =="BO" ){ echo 'selected="selected"'; } ?> value="BO">Bolivia</option>
                                 <option <?php if($post['mbcountry'] =="BT" ){ echo 'selected="selected"'; } ?> value="BT">Bhutan</option>
                                <option <?php if($post['mbcountry'] =="BY" ){ echo 'selected="selected"'; } ?> value="BY">Belarus</option>
                                <option <?php if($post['mbcountry'] =="CD" ){ echo 'selected="selected"'; } ?> value="CD">Congo</option>
                                <option <?php if($post['mbcountry'] =="CA" ){ echo 'selected="selected"'; } ?> value="CA">Canada</option>
                                <option <?php if($post['mbcountry'] =="CF" ){ echo 'selected="selected"'; } ?> value="CF">Central African Republic</option>
                                <option <?php if($post['mbcountry'] =="CI" ){ echo 'selected="selected"'; } ?> value="CI">Cote d'Ivoire</option>
                                <option <?php if($post['mbcountry'] =="CL" ){ echo 'selected="selected"'; } ?> value="CL">Chile</option>
                                <option <?php if($post['mbcountry'] =="CM" ){ echo 'selected="selected"'; } ?> value="CM">Cameroon</option>
                                <option <?php if($post['mbcountry'] =="CN" ){ echo 'selected="selected"'; } ?> value="CN">China</option>
                                <option <?php if($post['mbcountry'] =="CO" ){ echo 'selected="selected"'; } ?> value="CO">Colombia</option>
                                <option <?php if($post['mbcountry'] =="CU" ){ echo 'selected="selected"'; } ?> value="CU">Cuba</option>
                                <option <?php if($post['mbcountry'] =="CV" ){ echo 'selected="selected"'; } ?> value="CV">Cabo Verde</option>
                                <option <?php if($post['mbcountry'] =="CY" ){ echo 'selected="selected"'; } ?> value="CY">Cyprus</option>
                                <option <?php if($post['mbcountry'] =="DJ" ){ echo 'selected="selected"'; } ?> value="DJ">Djibouti</option>
                                <option <?php if($post['mbcountry'] =="DK" ){ echo 'selected="selected"'; } ?> value="DK">Denmark</option>
                                <option <?php if($post['mbcountry'] =="DM" ){ echo 'selected="selected"'; } ?> value="DM">Dominica</option>
                                <option <?php if($post['mbcountry'] =="DO" ){ echo 'selected="selected"'; } ?> value="DO">Dominican Republic</option>
                                <option <?php if($post['mbcountry'] =="EC" ){ echo 'selected="selected"'; } ?> value="EC">Ecuador</option>
                                <option <?php if($post['mbcountry'] =="EE" ){ echo 'selected="selected"'; } ?> value="EE">Estonia</option>
                                <option <?php if($post['mbcountry'] =="ER" ){ echo 'selected="selected"'; } ?> value="ER">Eritrea</option>
                                <option <?php if($post['mbcountry'] =="ET" ){ echo 'selected="selected"'; } ?> value="ET">Ethiopia</option>
                                <option <?php if($post['mbcountry'] =="FI" ){ echo 'selected="selected"'; } ?> value="FI">Finland</option>
                                <option <?php if($post['mbcountry'] =="FJ" ){ echo 'selected="selected"'; } ?> value="FJ">Fiji</option>
                                <option <?php if($post['mbcountry'] =="FR" ){ echo 'selected="selected"'; } ?> value="FR">France</option>
                                <option <?php if($post['mbcountry'] =="GA" ){ echo 'selected="selected"'; } ?> value="GA">Gabon</option>
                                <option <?php if($post['mbcountry'] =="GD" ){ echo 'selected="selected"'; } ?> value="GD">Grenada</option>
                                <option <?php if($post['mbcountry'] =="GE" ){ echo 'selected="selected"'; } ?> value="GE">Georgia</option>
                                <option <?php if($post['mbcountry'] =="GH" ){ echo 'selected="selected"'; } ?> value="GH">Ghana</option>
                                <option <?php if($post['mbcountry'] =="HN" ){ echo 'selected="selected"'; } ?> value="HN">Honduras</option>
                                <option <?php if($post['mbcountry'] =="HT" ){ echo 'selected="selected"'; } ?> value="HT">Haiti</option>
                                <option <?php if($post['mbcountry'] =="HU" ){ echo 'selected="selected"'; } ?> value="HU">Hungary</option>
                                <option <?php if($post['mbcountry'] =="ID" ){ echo 'selected="selected"'; } ?> value="ID">Indonesia</option>
                                <option <?php if($post['mbcountry'] =="IE" ){ echo 'selected="selected"'; } ?> value="IE">Ireland</option>
                                <option <?php if($post['mbcountry'] =="IL" ){ echo 'selected="selected"'; } ?> value="IL">Israel</option>
                                <option <?php if($post['mbcountry'] =="IN" ){ echo 'selected="selected"'; } ?> value="IN">India</option>
                                <option <?php if($post['mbcountry'] =="IQ" ){ echo 'selected="selected"'; } ?> value="IQ">Iraq</option>
                                <option <?php if($post['mbcountry'] =="IR" ){ echo 'selected="selected"'; } ?> value="IR">Iran</option>
                                <option <?php if($post['mbcountry'] =="IS" ){ echo 'selected="selected"'; } ?> value="IS">Iceland</option>
                                <option <?php if($post['mbcountry'] =="IT" ){ echo 'selected="selected"'; } ?> value="IT">Italy</option>
                                <option <?php if($post['mbcountry'] =="JM" ){ echo 'selected="selected"'; } ?> value="JM">Jamaica</option>
                                <option <?php if($post['mbcountry'] =="JO" ){ echo 'selected="selected"'; } ?> value="JO">Jordan</option>
                                <option <?php if($post['mbcountry'] =="JP" ){ echo 'selected="selected"'; } ?> value="JP">Japan</option>
                                <option <?php if($post['mbcountry'] =="KE" ){ echo 'selected="selected"'; } ?> value="KE">Kenya</option>
                                <option <?php if($post['mbcountry'] =="KG" ){ echo 'selected="selected"'; } ?> value="KG">Kyrgyzstan</option>
                                <option <?php if($post['mbcountry'] =="KI" ){ echo 'selected="selected"'; } ?> value="KI">Kiribati</option>
                                <option <?php if($post['mbcountry'] =="KW" ){ echo 'selected="selected"'; } ?> value="KW">Kuwait</option>
                                <option <?php if($post['mbcountry'] =="KZ" ){ echo 'selected="selected"'; } ?> value="KZ">Kazakhstan</option>
                                <option <?php if($post['mbcountry'] =="LA" ){ echo 'selected="selected"'; } ?> value="LA">Laos</option>
                                <option <?php if($post['mbcountry'] =="LB" ){ echo 'selected="selected"'; } ?> value="LB">Lebanons</option>
                                <option <?php if($post['mbcountry'] =="LI" ){ echo 'selected="selected"'; } ?> value="LI">Liechtenstein</option>
                                <option <?php if($post['mbcountry'] =="LR" ){ echo 'selected="selected"'; } ?> value="LR">Liberia</option>
                                <option <?php if($post['mbcountry'] =="LS" ){ echo 'selected="selected"'; } ?> value="LS">Lesotho</option>
                                <option <?php if($post['mbcountry'] =="LT" ){ echo 'selected="selected"'; } ?> value="LT">Lithuania</option>
                                <option <?php if($post['mbcountry'] =="LU" ){ echo 'selected="selected"'; } ?> value="LU">Luxembourg</option>
                                <option <?php if($post['mbcountry'] =="LV" ){ echo 'selected="selected"'; } ?> value="LV">Latvia</option>
                                <option <?php if($post['mbcountry'] =="LY" ){ echo 'selected="selected"'; } ?> value="LY">Libya</option>
                                <option <?php if($post['mbcountry'] =="MA" ){ echo 'selected="selected"'; } ?> value="MA">Morocco</option>
                                <option <?php if($post['mbcountry'] =="MC" ){ echo 'selected="selected"'; } ?> value="MC">Monaco</option>
                                <option <?php if($post['mbcountry'] =="MD" ){ echo 'selected="selected"'; } ?> value="MD">Moldova</option>
                                <option <?php if($post['mbcountry'] =="ME" ){ echo 'selected="selected"'; } ?> value="ME">Montenegro</option>
                                <option <?php if($post['mbcountry'] =="MG" ){ echo 'selected="selected"'; } ?> value="MG">Madagascar</option>
                                <option <?php if($post['mbcountry'] =="MH" ){ echo 'selected="selected"'; } ?> value="MH">Marshall Islands</option>
                                <option <?php if($post['mbcountry'] =="MK" ){ echo 'selected="selected"'; } ?> value="MK">Macedonia (FYROM)</option>
                                <option <?php if($post['mbcountry'] =="ML" ){ echo 'selected="selected"'; } ?> value="ML">Mali</option>
                                <option <?php if($post['mbcountry'] =="MM" ){ echo 'selected="selected"'; } ?> value="MM">Myanmar (formerly Burma)</option>
                                <option <?php if($post['mbcountry'] =="MN" ){ echo 'selected="selected"'; } ?> value="MN">Mongolia</option>
                                <option <?php if($post['mbcountry'] =="MR" ){ echo 'selected="selected"'; } ?> value="MR">Mauritania</option>
                                <option <?php if($post['mbcountry'] =="MT" ){ echo 'selected="selected"'; } ?> value="MT">Malta</option>
                                <option <?php if($post['mbcountry'] =="MV" ){ echo 'selected="selected"'; } ?> value="MV">Maldives</option>
                                <option <?php if($post['mbcountry'] =="MW" ){ echo 'selected="selected"'; } ?> value="MW">Malawi</option>
                                <option <?php if($post['mbcountry'] =="MX" ){ echo 'selected="selected"'; } ?> value="MX">Mexico</option>
                                <option <?php if($post['mbcountry'] =="MZ" ){ echo 'selected="selected"'; } ?> value="MZ">Mozambique</option>
                                <option <?php if($post['mbcountry'] =="NA" ){ echo 'selected="selected"'; } ?> value="NA">Namibia</option>
                                <option <?php if($post['mbcountry'] =="NG" ){ echo 'selected="selected"'; } ?> value="NG">Nigeria</option>
                                <option <?php if($post['mbcountry'] =="NO" ){ echo 'selected="selected"'; } ?> value="NO">Norway</option>
                                <option <?php if($post['mbcountry'] =="NP" ){ echo 'selected="selected"'; } ?> value="NP">Nepal</option>
                                <option <?php if($post['mbcountry'] =="NR" ){ echo 'selected="selected"'; } ?> value="NR">Nauru</option>
                                <option <?php if($post['mbcountry'] =="NZ" ){ echo 'selected="selected"'; } ?> value="NZ">New Zealand</option>
                                <option <?php if($post['mbcountry'] =="OM" ){ echo 'selected="selected"'; } ?> value="OM">Oman</option>
                                <option <?php if($post['mbcountry'] =="PA" ){ echo 'selected="selected"'; } ?> value="PA">Panama</option>
                                <option <?php if($post['mbcountry'] =="PF" ){ echo 'selected="selected"'; } ?> value="PF">Paraguay</option>
                                <option <?php if($post['mbcountry'] =="PG" ){ echo 'selected="selected"'; } ?> value="PG">Papua New Guinea</option>
                                <option <?php if($post['mbcountry'] =="PH" ){ echo 'selected="selected"'; } ?> value="PH">Philippines</option>
                                <option <?php if($post['mbcountry'] =="PK" ){ echo 'selected="selected"'; } ?> value="PK">Pakistan</option>
                                <option <?php if($post['mbcountry'] =="PL" ){ echo 'selected="selected"'; } ?> value="PL">Poland</option>
                                <option <?php if($post['mbcountry'] =="QA" ){ echo 'selected="selected"'; } ?> value="QA">Qatar</option>
                                <option <?php if($post['mbcountry'] =="RO" ){ echo 'selected="selected"'; } ?> value="RO">Romania</option>
                                <option <?php if($post['mbcountry'] =="RU" ){ echo 'selected="selected"'; } ?> value="RU">Russia</option>
                                <option <?php if($post['mbcountry'] =="RW" ){ echo 'selected="selected"'; } ?> value="RW">Rwanda</option>
                                <option <?php if($post['mbcountry'] =="SA" ){ echo 'selected="selected"'; } ?> value="SA">Saudi Arabia</option>
                                <option <?php if($post['mbcountry'] =="SB" ){ echo 'selected="selected"'; } ?> value="SB">Solomon Islands</option>
                                <option <?php if($post['mbcountry'] =="SC" ){ echo 'selected="selected"'; } ?> value="SC">Seychelles</option>
                                <option <?php if($post['mbcountry'] =="SD" ){ echo 'selected="selected"'; } ?> value="SD">Sudan</option>
                                <option <?php if($post['mbcountry'] =="SE" ){ echo 'selected="selected"'; } ?> value="SE">Sweden</option>
                                <option <?php if($post['mbcountry'] =="SG" ){ echo 'selected="selected"'; } ?> value="SG">Singapore</option>
                                <option <?php if($post['mbcountry'] =="TG" ){ echo 'selected="selected"'; } ?> value="TG">Togo</option>
                                <option <?php if($post['mbcountry'] =="TH" ){ echo 'selected="selected"'; } ?> value="TH">Thailand</option>
                                <option <?php if($post['mbcountry'] =="TJ" ){ echo 'selected="selected"'; } ?> value="TJ">Tajikistan</option>
                                <option <?php if($post['mbcountry'] =="TL" ){ echo 'selected="selected"'; } ?> value="TL">Timor-Leste</option>
                                <option <?php if($post['mbcountry'] =="TM" ){ echo 'selected="selected"'; } ?> value="TM">Turkmenistan</option>
                                <option <?php if($post['mbcountry'] =="TN" ){ echo 'selected="selected"'; } ?> value="TN">Tunisia</option>
                                <option <?php if($post['mbcountry'] =="TO" ){ echo 'selected="selected"'; } ?> value="TO">Tonga</option>
                                <option <?php if($post['mbcountry'] =="TR" ){ echo 'selected="selected"'; } ?> value="TR">Turkey</option>
                                <option <?php if($post['mbcountry'] =="TT" ){ echo 'selected="selected"'; } ?> value="TT">Trinidad and Tobago</option>
                                <option <?php if($post['mbcountry'] =="TW" ){ echo 'selected="selected"'; } ?> value="TW">Taiwan</option>
                                <option <?php if($post['mbcountry'] =="UA" ){ echo 'selected="selected"'; } ?> value="UA">Ukraine</option>
                                <option <?php if($post['mbcountry'] =="UG" ){ echo 'selected="selected"'; } ?> value="UG">Uganda</option>
                                <option <?php if($post['mbcountry'] =="UY" ){ echo 'selected="selected"'; } ?> value="UY">Uruguay</option>
                                <option <?php if($post['mbcountry'] =="UZ" ){ echo 'selected="selected"'; } ?> value="UZ">Uzbekistan</option>
                                <option <?php if($post['mbcountry'] =="VA" ){ echo 'selected="selected"'; } ?> value="VA">Vatican City (Holy See)</option>
                                <option <?php if($post['mbcountry'] =="VE" ){ echo 'selected="selected"'; } ?> value="VE">Venezuela</option>
                                <option <?php if($post['mbcountry'] =="VN" ){ echo 'selected="selected"'; } ?> value="VN">Vietnam</option>
                                <option <?php if($post['mbcountry'] =="VU" ){ echo 'selected="selected"'; } ?> value="VU">Vanuatu</option>
                                <option <?php if($post['mbcountry'] =="YE" ){ echo 'selected="selected"'; } ?> value="YE">Yemen</option>
                                <option <?php if($post['mbcountry'] =="ZM" ){ echo 'selected="selected"'; } ?> value="ZM">Zambia</option>
                                <option <?php if($post['mbcountry'] =="ZW" ){ echo 'selected="selected"'; } ?> value="ZW">Zimbabwe</option>
                              </select>                              
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Choose a Country!</div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-2">
                        <div class="form-group">
                          <label class="form-label text-muted">Business IM’S:</label>
                          <select class="form-control select2 form-select select2-hidden-accessible text-dark" required id="mbimstype"  name="mbimstype" data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <option <?php if($post['mbimstype'] =="Skype" ){ echo 'selected="selected"'; } ?> value="Skype">Skype</option>
                            <option <?php if($post['mbimstype'] =="Telegram" ){ echo 'selected="selected"'; } ?> value="Telegram">Telegram</option>
                            <option <?php if($post['mbimstype'] =="Whatsapp" ){ echo 'selected="selected"'; } ?> value="Whatsapp">Whatsapp</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose a valid IM!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-4">
                        <div class="form-group">
                          <label class="form-label text-muted">Business IM’S-ID:</label>
                          <div class="input-group" id="company-city">
                            <input type="text" class="form-control text-dark" value="<?php echo $post['mbimsid'];  ?>" required id="mbimsid" name="mbimsid"   placeholder="Business IM’S-ID:">
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter a valid ID!</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Business Proof Type:</label>
                          <select class="form-control select2 form-select select2-hidden-accessible text-dark" required id="mbdocumentype"  name="mbdocumentype" data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <option <?php if($post['mbdocumentype'] =="Firm Licence" ){ echo 'selected="selected"'; } ?> value="Firm Licence">Firm Licence</option>
                            <option <?php if($post['mbdocumentype'] =="Tax Certificate" ){ echo 'selected="selected"'; } ?> value="Tax Certificate">Tax Certificate</option>
                            <option <?php if($post['mbdocumentype'] =="CIN" ){ echo 'selected="selected"'; } ?> value="CIN">CIN</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose a valid Proof!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-3">
                        <div class="form-group">
                          <label class="form-label text-muted">Business Status:</label>
                          <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" id="mbstatus"  name="mbstatus" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                            <option value="">---</option>
                            <option <?php if($post['mbstatus'] =="1" ){ echo 'selected="selected"'; } ?> value="1">Approved</option>
                            <option <?php if($post['mbstatus'] =="0" ){ echo 'selected="selected"'; } ?> value="0">Pending</option>
                            <option <?php if($post['mbstatus'] =="2" ){ echo 'selected="selected"'; } ?> value="2">Hold</option>
                          </select>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Choose a valid status!</div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-12 col-xl-12">
                        <div class="form-group">
                          <label class="form-label text-muted">Upload Business Document:
                            <?php if($post['mbdocumen'] != ""):?>
                              <a target="_blank" href="<?php echo site_url();?>assets/images/merchantsbuz/<?php echo $post['mbdocumen']; ?>">
                                <button type="button" href="<?php echo site_url();?>assets/images/merchantsbuz/<?php echo $post['mbdocumen']; ?>" class="btn btn-pill attachment-pill btn-success"><i class="mdi mdi-file-pdf tx-24 me-1"></i><?php echo $post['mbdocumen']; ?></button>
                              </a>
                            <?php else:?>
                                No Data Found
                            <?php endif;?>
                          </label>
                          <div class="input-group btn btn-outline-primary" id="company-city" >
                            <input type="file"   id="mbdocumen"  name="mbdocumen" value="<?php echo $post['mbdocumen'];  ?>" class="dropify" data-height="100" />  
                          </div>
                          <div class="valid-feedback">Looks good!</div>
                          <div class="invalid-feedback">Please Upload a valid Document!</div>
                        </div>
                      </div>
                    </div>
                    <div class="row p-5">
                      <div class="btn-list text-end">
                        <button class="btn btn-outline-danger"> <i class="fe fe-x-circle"></i> Cancel</button>
                        <button class="btn btn-primary"> <i class="fe fe-check-circle"></i> Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ROW-1 END-->
            </form>
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