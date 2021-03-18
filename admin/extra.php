<a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold"><?php  echo $msg ?></span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>


              <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Documentation</h1>

  </div>
  <button type="button" class="btn btn-primary" id="piinfo" data-toggle="modal" data-target="#exampleModalCenter">
    Personal information
  </button>
  <button type="button" class="btn btn-primary" id="piinfo" data-toggle="modal" data-target="#exampleModalCenterbank">
    Bank information
  </button>
  <button type="button" class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#exampleModalCentersi">
    Superannuation information
  </button>
  <button type="button" class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#exampleModalCentervi">
    Visa information
  </button>
  <button type="button"  <?php if($passfile != 1) { echo'style="background-color: red"';} ?> class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#uploadModalpass">
    Passport Copy
  </button>
  <button  <?php if($visafile != 1) { echo'style="background-color: red"';} ?> type="button" class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#uploadModalvisa">
    Visa Copy
  </button>