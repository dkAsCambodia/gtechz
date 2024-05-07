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
                  <li class="breadcrumb-item active"  aria-current="page"><a href="<?php echo base_url('sadministrator/merchants/index'); ?>">Active Merchants</a>
                </li>
                </ol>
              </div>
            </div>
            <!-- PAGE-HEADER END -->
            <!-- ROW-1 -->
            <?php echo form_open_multipart('sadministrator/merchants/update', array('id' => 'mupdatemerchant', 'class'=>'row g-3 needs-validation','novalidate' =>'novalidate'))?>
            <input type="hidden" name="meditmerchant" id="meditmerchant" value="<?php echo 1; //$post['id']; ?>">
            <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
            <input type="hidden" name="fu" id="fu" value="<?php echo $post['mkyc']; ?>">
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
                      <h4 class="mb-0">Merchant Information</h4>
                    </div>
                    <div class="card-body p-0 task-edit-main">
                      <div class="row p-5 border-bottom">
                        <div class="col-sm-12 col-md-12 col-xl-2">
                          <div class="form-group">
                            <label class="form-label text-muted">Salution:</label>
                            <select class="form-control select2 form-select select2-hidden-accessible text-dark" id="msalutation" name="msalutation" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                              <!-- <option label="Choose one"></option>
                              <option value="empty" selected>---</option> -->
                              <option value="">---</option>
                              <option <?php if($post['msalutation'] =="Mr." ){ echo 'selected="selected"'; } ?> value="Mr.">Mr.</option>
                              <option <?php if($post['msalutation'] =="Ms." ){ echo 'selected="selected"'; } ?> value="Ms.">Ms.</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose a Salution!</div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-4">
                          <div class="form-group">
                            <label class="form-label text-muted">Merchant Name:</label>
                            <div class="input-group" id="client-name">
                              <input type="text" class="form-control text-dark" value="<?php if(set_value('mname')=="") echo $post['mname']; else echo set_value('mname');  ?>" required id="mname" name="mname" placeholder="Enter Merchant Name">
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter a valid Name!</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">User Name:</label>
                            <div class="input-group" id="client-username">
                              <input type="text" class="form-control text-dark" value="<?php if(set_value('musername')=="") echo $post['musername']; else echo set_value('musername');  ?>" required id="musername" name="musername" placeholder="Enter User Name">
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter a valid Username!</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Password:</label>
                            <div class="input-group" id="client-password">
                              <input type="password" value="<?php if(set_value('mpassword')=="") echo $post['mfpassword']; else echo set_value('mpassword');  ?>" required id="passwordElement" name="mpassword" class="form-control text-dark input-password" placeholder="Enter Password">
                              <span class="input-group-text btn btn-primary text-white show-password" id="showBtn">
                                 <i class="fe fe-eye text-white d-none" id="eyeOpen"></i>
                                <i class="fe fe-eye-off text-white" id="eyeClose"></i>
                              </span>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter 8 digit Password!</div>
                            </div>
                          </div>
                          <!-- <div class="input-group">
                              <input class="form-control" id="passwordElement" placeholder="Enter Your Password" type="text">
                              <button type="button"  class="input-group-text btn btn-primary text-white" id="showBtn">
                                <i class="fe fe-eye text-white d-none" id="eyeOpen"></i>
                                <i class="fe fe-eye-off text-white" id="eyeClose"></i>
                              </button>
                            </div> -->
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Email:</label>
                            <div class="input-group" id="client-email">
                              <input type="text" class="form-control text-dark" value="<?php if(set_value('memail')=="") echo $post['memail']; else echo set_value('memail');  ?>" required id="memail" name="memail" placeholder="Enter Merchant Email">
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter a valid EmaidID!</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Contact Number:</label>
                            <div class="input-group" id="client-mobilenumber">
                              <input type="number" class="form-control text-dark" value="<?php if(set_value('mcontact')=="") echo $post['mcontact']; else echo set_value('mcontact');  ?>" required id="mcontact" name="mcontact"  placeholder="Enter Contact Number">
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter a valid Contact!</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Gender:</label>
                            <select class="form-control select2 form-select select2-hidden-accessible text-dark" data-placeholder="---" required id="mgender" name="mgender" tabindex="-1" aria-hidden="true">
                              <option value="" >---</option>
                              <option <?php if($post['mgender'] =="Male" ){ echo 'selected="selected"'; } ?> value="Male">Male</option>
                              <option <?php if($post['mgender'] =="Female" ){ echo 'selected="selected"'; } ?> value="Female">Female</option>
                              <option <?php if($post['mgender'] =="Others" ){ echo 'selected="selected"'; } ?> value="Others">Others</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose a valid Gender!</div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Designation:</label>
                            <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" data-placeholder="Select Designation" required id="mdesignation" name="mdesignation" tabindex="-1" aria-hidden="true">
                              <!-- <option value="empty" selected>---</option> -->
                              <option value="">---</option>
                              <option <?php if($post['mdesignation'] =="Owner" ){ echo 'selected="selected"'; } ?> value="Owner">Owner</option>
                              <option <?php if($post['mdesignation'] =="Entrepreneur" ){ echo 'selected="selected"'; } ?> value="Entrepreneur">Entrepreneur</option>
                              <option <?php if($post['mdesignation'] =="Developer" ){ echo 'selected="selected"'; } ?> value="Developer">Developer</option>
                              <option <?php if($post['mdesignation'] =="Project Manager" ){ echo 'selected="selected"'; } ?> value="Project Manager">Project Manager</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose a valid Designation!</div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-2">
                          <div class="form-group">
                            <label class="form-label text-muted">Merchant IM’S:</label>
                            <select class="form-control select2 form-select select2-hidden-accessible text-dark" required id="mimstype" name="mimstype" data-placeholder="---" tabindex="-1" aria-hidden="true">
                              <option value="">---</option>
                              <option <?php if($post['mimstype'] =="Skype" ){ echo 'selected="selected"'; } ?> value="Skype">Skype</option>
                              <option <?php if($post['mimstype'] =="Telegram" ){ echo 'selected="selected"'; } ?> value="Telegram">Telegram</option>
                              <option <?php if($post['mimstype'] =="Whatsapp" ){ echo 'selected="selected"'; } ?> value="Whatsapp">Whatsapp</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose a valid IM!</div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-4">
                          <div class="form-group">
                            <label class="form-label text-muted">Merchant IM’S-ID:</label>
                            <div class="input-group" id="company-city">
                              <input type="text" class="form-control text-dark" value="<?php if(set_value('mimsid')=="") echo $post['mimsid']; else echo set_value('mimsid');  ?>" required id="mimsid" name="mimsid"  placeholder="Merchant IM’S-ID:">
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter a valid ID!</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-6">
                          <div class="form-group">
                            <label class="form-label text-muted">Merchant Address:</label>
                            <textarea class="form-control" value="<?php if(set_value('maddress')=="") echo $post['maddress']; else echo set_value('maddress');  ?>" required id="maddress" name="maddress" cols="30" rows="1" placeholder="House Name, Building No, Street, Lane No, City"><?php if(set_value('maddress')=="") echo $post['maddress']; else echo set_value('maddress');  ?></textarea>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Enter a valid Address!</div>
                          </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">City:</label>
                            <div class="input-group" id="company-city">
                              <input type="text" class="form-control text-dark" value="<?php if(set_value('mcity')=="") echo $post['mcity']; else echo set_value('mcity');  ?>" placeholder="City" required id="mcity" name="mcity"/>
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter a valid City!</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">State:</label>
                            <div class="input-group" id="company-state">
                              <input type="text" class="form-control text-dark" value="<?php if(set_value('mstate')=="") echo $post['mstate']; else echo set_value('mstate');  ?>" placeholder="State" required id="mstate" name="mstate">
                              <div class="valid-feedback">Looks good!</div>
                              <div class="invalid-feedback">Please Enter a valid State!</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Postal Code:</label>
                            <div class="input-group" id="company-postalcode">
                              <input type="text" class="form-control text-dark" value="<?php if(set_value('mzipcode')=="") echo $post['mzipcode']; else echo set_value('mzipcode');  ?>" placeholder="Postal Code" required id="mzipcode" name="mzipcode"/> 
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
                                <select class="form-control select2-country-search" data-placeholder="Select Country"  required id="mcountry" name="mcountry">
                                  <option value="">Select Country</option>
                                  <option <?php if($post['mcountry'] =="UM" ){ echo 'selected="selected"'; } ?> value="UM">United States of America</option>
                                  <option <?php if($post['mcountry'] =="AF" ){ echo 'selected="selected"'; } ?> value="AF">Afghanistan</option>
                                  <option <?php if($post['mcountry'] =="AL" ){ echo 'selected="selected"'; } ?> value="AL">Albania</option>
                                  <option <?php if($post['mcountry'] =="AD" ){ echo 'selected="selected"'; } ?> value="AD">Andorra</option>
                                  <option <?php if($post['mcountry'] =="AG" ){ echo 'selected="selected"'; } ?> value="AG">Antigua and Barbuda</option>
                                  <option <?php if($post['mcountry'] =="AU" ){ echo 'selected="selected"'; } ?> value="AU">Australia</option>
                                  <option <?php if($post['mcountry'] =="AM" ){ echo 'selected="selected"'; } ?> value="AM">Armenia</option>
                                  <option <?php if($post['mcountry'] =="AO" ){ echo 'selected="selected"'; } ?> value="AO">Angola</option>
                                  <option <?php if($post['mcountry'] =="AR" ){ echo 'selected="selected"'; } ?> value="AR">Argentina</option>
                                  <option <?php if($post['mcountry'] =="AT" ){ echo 'selected="selected"'; } ?> value="AT">Austria</option>
                                  <option <?php if($post['mcountry'] =="AZ" ){ echo 'selected="selected"'; } ?> value="AZ">Azerbaijan</option>
                                  <option <?php if($post['mcountry'] =="BA" ){ echo 'selected="selected"'; } ?> value="BA">Bosnia and Herzegovina</option>
                                  <option <?php if($post['mcountry'] =="BB" ){ echo 'selected="selected"'; } ?> value="BB">Barbados</option>
                                  <option <?php if($post['mcountry'] =="BD" ){ echo 'selected="selected"'; } ?> value="BD">Bangladesh</option>
                                  <option <?php if($post['mcountry'] =="BE" ){ echo 'selected="selected"'; } ?> value="BE">Belgium</option>
                                  <option <?php if($post['mcountry'] =="BF" ){ echo 'selected="selected"'; } ?> value="BF">Burkina Faso</option>
                                  <option <?php if($post['mcountry'] =="BG" ){ echo 'selected="selected"'; } ?> value="BG">Bulgaria</option>
                                  <option <?php if($post['mcountry'] =="BH" ){ echo 'selected="selected"'; } ?> value="BH">Bahrain</option>
                                  <option <?php if($post['mcountry'] =="BJ" ){ echo 'selected="selected"'; } ?> value="BJ">Benin</option>
                                  <option <?php if($post['mcountry'] =="BN" ){ echo 'selected="selected"'; } ?> value="BN">Brunei</option>
                                  <option <?php if($post['mcountry'] =="BO" ){ echo 'selected="selected"'; } ?> value="BO">Bolivia</option>
                                  <option <?php if($post['mcountry'] =="BT" ){ echo 'selected="selected"'; } ?> value="BT">Bhutan</option>
                                  <option <?php if($post['mcountry'] =="BY" ){ echo 'selected="selected"'; } ?> value="BY">Belarus</option>
                                  <option <?php if($post['mcountry'] =="CD" ){ echo 'selected="selected"'; } ?> value="CD">Congo</option>
                                  <option <?php if($post['mcountry'] =="CA" ){ echo 'selected="selected"'; } ?> value="CA">Canada</option>
                                  <option <?php if($post['mcountry'] =="CF" ){ echo 'selected="selected"'; } ?> value="CF">Central African Republic</option>
                                  <option <?php if($post['mcountry'] =="CI" ){ echo 'selected="selected"'; } ?> value="CI">Cote d'Ivoire</option>
                                  <option <?php if($post['mcountry'] =="CL" ){ echo 'selected="selected"'; } ?> value="CL">Chile</option>
                                  <option <?php if($post['mcountry'] =="CM" ){ echo 'selected="selected"'; } ?> value="CM">Cameroon</option>
                                  <option <?php if($post['mcountry'] =="CN" ){ echo 'selected="selected"'; } ?> value="CN">China</option>
                                  <option <?php if($post['mcountry'] =="CO" ){ echo 'selected="selected"'; } ?> value="CO">Colombia</option>
                                  <option <?php if($post['mcountry'] =="CU" ){ echo 'selected="selected"'; } ?> value="CU">Cuba</option>
                                  <option <?php if($post['mcountry'] =="CV" ){ echo 'selected="selected"'; } ?> value="CV">Cabo Verde</option>
                                  <option <?php if($post['mcountry'] =="CY" ){ echo 'selected="selected"'; } ?> value="CY">Cyprus</option>
                                  <option <?php if($post['mcountry'] =="DJ" ){ echo 'selected="selected"'; } ?> value="DJ">Djibouti</option>
                                  <option <?php if($post['mcountry'] =="DK" ){ echo 'selected="selected"'; } ?> value="DK">Denmark</option>
                                  <option <?php if($post['mcountry'] =="DM" ){ echo 'selected="selected"'; } ?> value="DM">Dominica</option>
                                  <option <?php if($post['mcountry'] =="DO" ){ echo 'selected="selected"'; } ?> value="DO">Dominican Republic</option>
                                  <option <?php if($post['mcountry'] =="EC" ){ echo 'selected="selected"'; } ?> value="EC">Ecuador</option>
                                  <option <?php if($post['mcountry'] =="EE" ){ echo 'selected="selected"'; } ?> value="EE">Estonia</option>
                                  <option <?php if($post['mcountry'] =="ER" ){ echo 'selected="selected"'; } ?> value="ER">Eritrea</option>
                                  <option <?php if($post['mcountry'] =="ET" ){ echo 'selected="selected"'; } ?> value="ET">Ethiopia</option>
                                  <option <?php if($post['mcountry'] =="FI" ){ echo 'selected="selected"'; } ?> value="FI">Finland</option>
                                  <option <?php if($post['mcountry'] =="FJ" ){ echo 'selected="selected"'; } ?> value="FJ">Fiji</option>
                                  <option <?php if($post['mcountry'] =="FR" ){ echo 'selected="selected"'; } ?> value="FR">France</option>
                                  <option <?php if($post['mcountry'] =="GA" ){ echo 'selected="selected"'; } ?> value="GA">Gabon</option>
                                  <option <?php if($post['mcountry'] =="GD" ){ echo 'selected="selected"'; } ?> value="GD">Grenada</option>
                                  <option <?php if($post['mcountry'] =="GE" ){ echo 'selected="selected"'; } ?> value="GE">Georgia</option>
                                  <option <?php if($post['mcountry'] =="GH" ){ echo 'selected="selected"'; } ?> value="GH">Ghana</option>
                                  <option <?php if($post['mcountry'] =="HN" ){ echo 'selected="selected"'; } ?> value="HN">Honduras</option>
                                  <option <?php if($post['mcountry'] =="HT" ){ echo 'selected="selected"'; } ?> value="HT">Haiti</option>
                                  <option <?php if($post['mcountry'] =="HU" ){ echo 'selected="selected"'; } ?> value="HU">Hungary</option>
                                  <option <?php if($post['mcountry'] =="ID" ){ echo 'selected="selected"'; } ?> value="ID">Indonesia</option>
                                  <option <?php if($post['mcountry'] =="IE" ){ echo 'selected="selected"'; } ?> value="IE">Ireland</option>
                                  <option <?php if($post['mcountry'] =="IL" ){ echo 'selected="selected"'; } ?> value="IL">Israel</option>
                                  <option <?php if($post['mcountry'] =="IN" ){ echo 'selected="selected"'; } ?> value="IN">India</option>
                                  <option <?php if($post['mcountry'] =="IQ" ){ echo 'selected="selected"'; } ?> value="IQ">Iraq</option>
                                  <option <?php if($post['mcountry'] =="IR" ){ echo 'selected="selected"'; } ?> value="IR">Iran</option>
                                  <option <?php if($post['mcountry'] =="IS" ){ echo 'selected="selected"'; } ?> value="IS">Iceland</option>
                                  <option <?php if($post['mcountry'] =="IT" ){ echo 'selected="selected"'; } ?> value="IT">Italy</option>
                                  <option <?php if($post['mcountry'] =="JM" ){ echo 'selected="selected"'; } ?> value="JM">Jamaica</option>
                                  <option <?php if($post['mcountry'] =="JO" ){ echo 'selected="selected"'; } ?> value="JO">Jordan</option>
                                  <option <?php if($post['mcountry'] =="JP" ){ echo 'selected="selected"'; } ?> value="JP">Japan</option>
                                  <option <?php if($post['mcountry'] =="KE" ){ echo 'selected="selected"'; } ?> value="KE">Kenya</option>
                                  <option <?php if($post['mcountry'] =="KG" ){ echo 'selected="selected"'; } ?> value="KG">Kyrgyzstan</option>
                                  <option <?php if($post['mcountry'] =="KI" ){ echo 'selected="selected"'; } ?> value="KI">Kiribati</option>
                                  <option <?php if($post['mcountry'] =="KW" ){ echo 'selected="selected"'; } ?> value="KW">Kuwait</option>
                                  <option <?php if($post['mcountry'] =="KZ" ){ echo 'selected="selected"'; } ?> value="KZ">Kazakhstan</option>
                                  <option <?php if($post['mcountry'] =="LA" ){ echo 'selected="selected"'; } ?> value="LA">Laos</option>
                                  <option <?php if($post['mcountry'] =="LB" ){ echo 'selected="selected"'; } ?> value="LB">Lebanons</option>
                                  <option <?php if($post['mcountry'] =="LI" ){ echo 'selected="selected"'; } ?> value="LI">Liechtenstein</option>
                                  <option <?php if($post['mcountry'] =="LR" ){ echo 'selected="selected"'; } ?> value="LR">Liberia</option>
                                  <option <?php if($post['mcountry'] =="LS" ){ echo 'selected="selected"'; } ?> value="LS">Lesotho</option>
                                  <option <?php if($post['mcountry'] =="LT" ){ echo 'selected="selected"'; } ?> value="LT">Lithuania</option>
                                  <option <?php if($post['mcountry'] =="LU" ){ echo 'selected="selected"'; } ?> value="LU">Luxembourg</option>
                                  <option <?php if($post['mcountry'] =="LV" ){ echo 'selected="selected"'; } ?> value="LV">Latvia</option>
                                  <option <?php if($post['mcountry'] =="LY" ){ echo 'selected="selected"'; } ?> value="LY">Libya</option>
                                  <option <?php if($post['mcountry'] =="MA" ){ echo 'selected="selected"'; } ?> value="MA">Morocco</option>
                                  <option <?php if($post['mcountry'] =="MC" ){ echo 'selected="selected"'; } ?> value="MC">Monaco</option>
                                  <option <?php if($post['mcountry'] =="MD" ){ echo 'selected="selected"'; } ?> value="MD">Moldova</option>
                                  <option <?php if($post['mcountry'] =="ME" ){ echo 'selected="selected"'; } ?> value="ME">Montenegro</option>
                                  <option <?php if($post['mcountry'] =="MG" ){ echo 'selected="selected"'; } ?> value="MG">Madagascar</option>
                                  <option <?php if($post['mcountry'] =="MH" ){ echo 'selected="selected"'; } ?> value="MH">Marshall Islands</option>
                                  <option <?php if($post['mcountry'] =="MK" ){ echo 'selected="selected"'; } ?> value="MK">Macedonia (FYROM)</option>
                                  <option <?php if($post['mcountry'] =="ML" ){ echo 'selected="selected"'; } ?> value="ML">Mali</option>
                                  <option <?php if($post['mcountry'] =="MM" ){ echo 'selected="selected"'; } ?> value="MM">Myanmar (formerly Burma)</option>
                                  <option <?php if($post['mcountry'] =="MN" ){ echo 'selected="selected"'; } ?> value="MN">Mongolia</option>
                                  <option <?php if($post['mcountry'] =="MR" ){ echo 'selected="selected"'; } ?> value="MR">Mauritania</option>
                                  <option <?php if($post['mcountry'] =="MT" ){ echo 'selected="selected"'; } ?> value="MT">Malta</option>
                                  <option <?php if($post['mcountry'] =="MV" ){ echo 'selected="selected"'; } ?> value="MV">Maldives</option>
                                  <option <?php if($post['mcountry'] =="MW" ){ echo 'selected="selected"'; } ?> value="MW">Malawi</option>
                                  <option <?php if($post['mcountry'] =="MX" ){ echo 'selected="selected"'; } ?> value="MX">Mexico</option>
                                  <option <?php if($post['mcountry'] =="MZ" ){ echo 'selected="selected"'; } ?> value="MZ">Mozambique</option>
                                  <option <?php if($post['mcountry'] =="NA" ){ echo 'selected="selected"'; } ?> value="NA">Namibia</option>
                                  <option <?php if($post['mcountry'] =="NG" ){ echo 'selected="selected"'; } ?> value="NG">Nigeria</option>
                                  <option <?php if($post['mcountry'] =="NO" ){ echo 'selected="selected"'; } ?> value="NO">Norway</option>
                                  <option <?php if($post['mcountry'] =="NP" ){ echo 'selected="selected"'; } ?> value="NP">Nepal</option>
                                  <option <?php if($post['mcountry'] =="NR" ){ echo 'selected="selected"'; } ?> value="NR">Nauru</option>
                                  <option <?php if($post['mcountry'] =="NZ" ){ echo 'selected="selected"'; } ?> value="NZ">New Zealand</option>
                                  <option <?php if($post['mcountry'] =="OM" ){ echo 'selected="selected"'; } ?> value="OM">Oman</option>
                                  <option <?php if($post['mcountry'] =="PA" ){ echo 'selected="selected"'; } ?> value="PA">Panama</option>
                                  <option <?php if($post['mcountry'] =="PF" ){ echo 'selected="selected"'; } ?> value="PF">Paraguay</option>
                                  <option <?php if($post['mcountry'] =="PG" ){ echo 'selected="selected"'; } ?> value="PG">Papua New Guinea</option>
                                  <option <?php if($post['mcountry'] =="PH" ){ echo 'selected="selected"'; } ?> value="PH">Philippines</option>
                                  <option <?php if($post['mcountry'] =="PK" ){ echo 'selected="selected"'; } ?> value="PK">Pakistan</option>
                                  <option <?php if($post['mcountry'] =="PL" ){ echo 'selected="selected"'; } ?> value="PL">Poland</option>
                                  <option <?php if($post['mcountry'] =="QA" ){ echo 'selected="selected"'; } ?> value="QA">Qatar</option>
                                  <option <?php if($post['mcountry'] =="RO" ){ echo 'selected="selected"'; } ?> value="RO">Romania</option>
                                  <option <?php if($post['mcountry'] =="RU" ){ echo 'selected="selected"'; } ?> value="RU">Russia</option>
                                  <option <?php if($post['mcountry'] =="RW" ){ echo 'selected="selected"'; } ?> value="RW">Rwanda</option>
                                  <option <?php if($post['mcountry'] =="SA" ){ echo 'selected="selected"'; } ?> value="SA">Saudi Arabia</option>
                                  <option <?php if($post['mcountry'] =="SB" ){ echo 'selected="selected"'; } ?> value="SB">Solomon Islands</option>
                                  <option <?php if($post['mcountry'] =="SC" ){ echo 'selected="selected"'; } ?> value="SC">Seychelles</option>
                                  <option <?php if($post['mcountry'] =="SD" ){ echo 'selected="selected"'; } ?> value="SD">Sudan</option>
                                  <option <?php if($post['mcountry'] =="SE" ){ echo 'selected="selected"'; } ?> value="SE">Sweden</option>
                                  <option <?php if($post['mcountry'] =="SG" ){ echo 'selected="selected"'; } ?> value="SG">Singapore</option>
                                  <option <?php if($post['mcountry'] =="TG" ){ echo 'selected="selected"'; } ?> value="TG">Togo</option>
                                  <option <?php if($post['mcountry'] =="TH" ){ echo 'selected="selected"'; } ?> value="TH">Thailand</option>
                                  <option <?php if($post['mcountry'] =="TJ" ){ echo 'selected="selected"'; } ?> value="TJ">Tajikistan</option>
                                  <option <?php if($post['mcountry'] =="TL" ){ echo 'selected="selected"'; } ?> value="TL">Timor-Leste</option>
                                  <option <?php if($post['mcountry'] =="TM" ){ echo 'selected="selected"'; } ?> value="TM">Turkmenistan</option>
                                  <option <?php if($post['mcountry'] =="TN" ){ echo 'selected="selected"'; } ?> value="TN">Tunisia</option>
                                  <option <?php if($post['mcountry'] =="TO" ){ echo 'selected="selected"'; } ?> value="TO">Tonga</option>
                                  <option <?php if($post['mcountry'] =="TR" ){ echo 'selected="selected"'; } ?> value="TR">Turkey</option>
                                  <option <?php if($post['mcountry'] =="TT" ){ echo 'selected="selected"'; } ?> value="TT">Trinidad and Tobago</option>
                                  <option <?php if($post['mcountry'] =="TW" ){ echo 'selected="selected"'; } ?> value="TW">Taiwan</option>
                                  <option <?php if($post['mcountry'] =="UA" ){ echo 'selected="selected"'; } ?> value="UA">Ukraine</option>
                                  <option <?php if($post['mcountry'] =="UG" ){ echo 'selected="selected"'; } ?> value="UG">Uganda</option>
                                  <option <?php if($post['mcountry'] =="UY" ){ echo 'selected="selected"'; } ?> value="UY">Uruguay</option>
                                  <option <?php if($post['mcountry'] =="UZ" ){ echo 'selected="selected"'; } ?> value="UZ">Uzbekistan</option>
                                  <option <?php if($post['mcountry'] =="VA" ){ echo 'selected="selected"'; } ?> value="VA">Vatican City (Holy See)</option>
                                  <option <?php if($post['mcountry'] =="VE" ){ echo 'selected="selected"'; } ?> value="VE">Venezuela</option>
                                  <option <?php if($post['mcountry'] =="VN" ){ echo 'selected="selected"'; } ?> value="VN">Vietnam</option>
                                  <option <?php if($post['mcountry'] =="VU" ){ echo 'selected="selected"'; } ?> value="VU">Vanuatu</option>
                                  <option <?php if($post['mcountry'] =="YE" ){ echo 'selected="selected"'; } ?> value="YE">Yemen</option>
                                  <option <?php if($post['mcountry'] =="ZM" ){ echo 'selected="selected"'; } ?> value="ZM">Zambia</option>
                                  <option <?php if($post['mcountry'] =="ZW" ){ echo 'selected="selected"'; } ?> value="ZW">Zimbabwe</option>
                                </select>
                                
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Please Choose a Country!</div>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Currency:</label>
                            <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" data-placeholder="---" required id="mcurrency" name="mcurrency" tabindex="-1" aria-hidden="true">
                              <option value="">---</option>
                              <option <?php if($post['mcurrency'] =="AUD" ){ echo 'selected="selected"'; } ?> value="AUD">AUD</option>
                              <option <?php if($post['mcurrency'] =="BTC" ){ echo 'selected="selected"'; } ?> value="BTC">BTC</option>
                              <option <?php if($post['mcurrency'] =="CAD" ){ echo 'selected="selected"'; } ?> value="CAD">CAD</option>
                              <option <?php if($post['mcurrency'] =="CNY" ){ echo 'selected="selected"'; } ?> value="CNY">CNY</option>
                              <option <?php if($post['mcurrency'] =="CZK" ){ echo 'selected="selected"'; } ?> value="CZK">CZK</option>
                              <option <?php if($post['mcurrency'] =="EUR" ){ echo 'selected="selected"'; } ?> value="EUR">EUR</option>
                              <option <?php if($post['mcurrency'] =="GBP" ){ echo 'selected="selected"'; } ?> value="GBP">GBP</option>
                              <option <?php if($post['mcurrency'] =="HKD" ){ echo 'selected="selected"'; } ?> value="HKD">HKD</option>
                              <option <?php if($post['mcurrency'] =="IDR" ){ echo 'selected="selected"'; } ?> value="IDR">IDR</option>
                              <option <?php if($post['mcurrency'] =="INR" ){ echo 'selected="selected"'; } ?> value="INR">INR</option>
                              <option <?php if($post['mcurrency'] =="JPY" ){ echo 'selected="selected"'; } ?> value="JPY">JPY</option>
                              <option <?php if($post['mcurrency'] =="KHR" ){ echo 'selected="selected"'; } ?> value="KHR">KHR</option>
                              <option <?php if($post['mcurrency'] =="MXN" ){ echo 'selected="selected"'; } ?> value="MXN">MXN</option>
                              <option <?php if($post['mcurrency'] =="MYR" ){ echo 'selected="selected"'; } ?> value="MYR">MYR</option>
                              <option <?php if($post['mcurrency'] =="PHP" ){ echo 'selected="selected"'; } ?> value="PHP">PHP</option>
                              <option <?php if($post['mcurrency'] =="PLN" ){ echo 'selected="selected"'; } ?> value="PLN">PLN</option>
                              <option <?php if($post['mcurrency'] =="SGD" ){ echo 'selected="selected"'; } ?> value="SGD">SGD</option>\
                              <option <?php if($post['mcurrency'] =="THB" ){ echo 'selected="selected"'; } ?> value="THB">THB</option>
                              <option <?php if($post['mcurrency'] =="USD" ){ echo 'selected="selected"'; } ?> value="USD">USD</option>
                              <option <?php if($post['mcurrency'] =="VND" ){ echo 'selected="selected"'; } ?> value="VND">VND</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose a currency!</div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Profile Status:</label>
                            <select class="form-control select2-show-search form-select select2-hidden-accessible text-dark" id="status" name="status" required data-placeholder="---" tabindex="-1" aria-hidden="true">
                              <option value="">---</option>
                              <option <?php if($post['status'] =="1" ){ echo 'selected="selected"'; } ?> value="1">Approved</option>
                              <option <?php if($post['status'] =="0" ){ echo 'selected="selected"'; } ?> value="0">Pending</option>
                              <option <?php if($post['status'] =="2" ){ echo 'selected="selected"'; } ?> value="2">Hold</option>
                            </select>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose a valid status!</div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Can User Login To App?</label>
                            <div class="d-flex align-items-center mt-3">
                              <label class="custom-control custom-radio me-3">
                                <input type="radio" class="custom-control-input" name="login-radio" value="yes" <?php echo set_value('login-radio', $post['logintoapp']) == 1 ? "checked" : ""; ?>>
                                <span class="custom-control-label">Yes</span>
                              </label>
                              <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="login-radio" value="no" <?php echo set_value('login-radio', $post['logintoapp']) == 0 ? "checked" : ""; ?>>
                                <span class="custom-control-label">No</span>
                              </label>
                            </div>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose Any!</div>
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-3">
                          <div class="form-group">
                            <label class="form-label text-muted">Can User Receive Email Notifications?</label>
                            <div class="d-flex align-items-center mt-3">
                              <label class="custom-control custom-radio me-3">
                                <input type="radio" class="custom-control-input" name="notifications-radio" value="yes"   <?php echo set_value('notifications-radio', $post['email_notifications']) == 1 ? "checked" : ""; ?>>
                                <span class="custom-control-label">Yes</span>
                              </label>
                              <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="notifications-radio" value="no" <?php echo set_value('notifications-radio', $post['email_notifications']) == 0 ? "checked" : ""; ?>>
                                <span class="custom-control-label">No</span>
                              </label>
                            </div>
                          </div>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Choose Any!</div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-xl-12">
                          <div class="form-group">
                            <label class="form-label text-muted">Upload KYC Document:-<?php if(set_value('mkyc')=="") echo $post['mkyc']; else echo set_value('mkyc');  ?></label>
                            <div class="input-group btn btn-outline-primary" id="company-city" >
                              <input type="file" id="mkyc" name="mkyc" value="<?php if(set_value('mkyc')=="") echo $post['mkyc']; else echo set_value('mkyc');  ?>" class="dropify" data-height="100" />  
                            </div>
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please Upload a valid Document!</div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="row p-5">
                        <div class="btn-list text-end">
                          <button class="btn btn-outline-danger"> <i class="fe fe-x-circle"></i> Cancel</button>
                          <button class="btn btn-primary" type="submit"> <i class="fe fe-check-circle"></i> Save</button>
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