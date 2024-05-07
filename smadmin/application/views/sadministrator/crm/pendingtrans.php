<!--app-content open-->
<div class="app-content main-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Transactions</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Payments</a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                  <label for="validationCustom01" class="form-label">First name</label>
                                  <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="validationCustom02" class="form-label">Last name</label>
                                  <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="validationCustomUsername" class="form-label">Username</label>
                                  <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                      Please choose a username.
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom03" class="form-label">City</label>
                                  <input type="text" class="form-control" id="validationCustom03" required>
                                  <div class="invalid-feedback">
                                    Please provide a valid city.
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label for="validationCustom04" class="form-label">State</label>
                                  <select class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option>...</option>
                                  </select>
                                  <div class="invalid-feedback">
                                    Please select a valid state.
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label for="validationCustom05" class="form-label">Zip</label>
                                  <input type="text" class="form-control" id="validationCustom05" required>
                                  <div class="invalid-feedback">
                                    Please provide a valid zip.
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                      Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                      You must agree before submitting.
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Custom Validation</h3>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationCustom011">First name</label>
                                        <input type="text" class="form-control" id="validationCustom011" value="Mark" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationCustom12">Last name</label>
                                        <input type="text" class="form-control" id="validationCustom12" value="Otto" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationCustom13">City</label>
                                        <input type="text" class="form-control" id="validationCustom13" required>
                                        <div class="invalid-feedback">Please provide a valid city.</div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationCustom14">State</label>
                                        <select class="form-select" id="validationCustom14" data-placeholder="select state" required>
                                            <option label="Choose"></option>
                                            <option>New york</option>
                                            <option>USA</option>
                                            <option>Berlin</option>
                                            <option>Manchester</option>
                                            <option>Flynn</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid state.</div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
                                        <label for="validationCustom15">Zip</label>
                                        <input type="number" class="form-control" id="validationCustom15" required>
                                        <div class="invalid-feedback">Please provide a valid zip.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" id="invalidCheck3" required>
                                        <span class="text-13">I agree terms and conditions</span>
                                    </label>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-botto">
                            <h3 class="card-title"></h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationServer01">First name</label>
                                        <input type="text" class="form-control is-valid" id="validationServer01" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationServer02">Last name</label>
                                        <input type="text" class="form-control is-valid" id="validationServer02" value="" required>
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationServer03">City</label>
                                        <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                        <div id="validationServer03Feedback" class="invalid-feedback">Please provide a valid city.</div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationServer04">State</label>
                                        <select class="form-select select2 form-control is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>...</option>
                                        </select>
                                        <div id="validationServer04Feedback" class="invalid-feedback">Please select a valid state.</div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
                                        <label for="validationServer05">Zip</label>
                                        <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                                        <div id="validationServer05Feedback" class="invalid-feedback">Please provide a valid zip.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="ckbox">
                                        <input type="checkbox" id="invalidCheck2" required>
                                        <span class="text-13">I agree terms and conditions</span>
                                    </label>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Details</h3>
                        </div>
                        <div class="card-body">
                            <form class="was-validated">
                                <div class="mb-3">
                                  <label for="validationTextarea" class="form-label">Address</label>
                                  <textarea class="form-control is-invalid" id="validationTextarea" placeholder="" required></textarea>
                                  <div class="invalid-feedback">
                                
                                  </div>
                                </div>

                                <div class="form-check mb-3">
                                  <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
                                  <label class="form-check-label" for="validationFormCheck1">Present Address</label>
                                  <div class="invalid-feedback"></div>
                                </div>

                                <!--<div class="form-check">
                                  <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                                  <label class="form-check-label" for="validationFormCheck2">Toggle</label>
                                </div>
                                <div class="form-check mb-3">
                                  <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                                  <label class="form-check-label" for="validationFormCheck3"></label>
                                  <div class="invalid-feedback">.......</div>
                                </div>-->

                                <div class="mb-3">
                                  <select class="form-select" required aria-label="select example">
                                    <option value="">Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                                  <div class="invalid-feedback"></div>
                                </div>

                                <div class="mb-3">
                                  <input type="file" class="form-control" aria-label="file example" required>
                                  <div class="invalid-feedback"></div>
                                </div>

                                <div class="mb-3">
                                  <button class="btn btn-primary" type="submit" disabled>Submit form</button>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h3 class="card-title">Tooltips</h3>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationTooltip01">First name</label>
                                        <input type="text" class="form-control" id="validationTooltip01" value="Mark" required>
                                        <div class="valid-tooltip">Looks good!</div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationTooltip02">Last name</label>
                                        <input type="text" class="form-control" id="validationTooltip02" value="Otto" required>
                                        <div class="valid-tooltip">Looks good!</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationTooltip03">City</label>
                                        <input type="text" class="form-control" id="validationTooltip03" required>
                                        <div class="invalid-tooltip">Please provide a valid city.</div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                                        <label for="validationTooltip04">State</label>
                                        <select class="form-select form-control" id="validationTooltip04" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>...</option>
                                        </select>
                                        <div class="invalid-tooltip">Please select a valid state.</div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 mb-3">
                                        <label for="validationTooltip05">Zip</label>
                                        <input type="text" class="form-control" id="validationTooltip05" required>
                                        <div class="invalid-tooltip">Please provide a valid zip.</div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW CLOSED -->

        </div>
    </div>
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
                            <span class="country-selector"><img alt="unitedstates" src="../assets/images/flags/us_flag.jpg" class="me-2 language"></span>United States
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="italy" src="../assets/images/flags/italy_flag.jpg" class="me-2 language"></span>Italy
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="spain" src="../assets/images/flags/spain_flag.jpg" class="me-2 language"></span>Spain
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="india" src="../assets/images/flags/india_flag.jpg" class="me-2 language"></span>India
                    </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="french" src="../assets/images/flags/french_flag.jpg" class="me-2 language"></span>French
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="russia" src="../assets/images/flags/russia_flag.jpg" class="me-2 language"></span>Russia
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="germany" src="../assets/images/flags/germany_flag.jpg" class="me-2 language"></span>Germany
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="argentina" src="../assets/images/flags/argentina_flag.jpg" class="me-2 language"></span>Argentina
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="uae" src="../assets/images/flags/uae_flag.jpg" class="me-2 language"></span>UAE
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="austria" src="../assets/images/flags/austria_flag.jpg" class="me-2 language"></span>Austria
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="mexico" src="../assets/images/flags/mexico_flag.jpg" class="me-2 language"></span>Mexico
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="china" src="../assets/images/flags/china_flag.jpg" class="me-2 language"></span>China
                    </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="poland" src="../assets/images/flags/poland_flag.jpg" class="me-2 language"></span>Poland
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="canada" src="../assets/images/flags/canada_flag.jpg" class="me-2 language"></span>Canada
                        </a>
                    </li>
                    <li class="col-lg-4 mb-2">
                        <a class="btn btn-country btn-lg btn-block">
                            <span class="country-selector"><img alt="malaysia" src="../assets/images/flags/malaysia_flag.jpg" class="me-2 language"></span>Malaysia
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Country-selector modal-->