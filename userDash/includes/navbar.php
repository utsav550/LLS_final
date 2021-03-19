<!-------- Log-in user-------------->
<?php
session_start();
$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["emp_id"];
if (empty($username)) {

  header("Location:../index.php");

}
 require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';
    include('includes/checkdata.php');

    $sql = " SELECT * FROM register WHERE emp_id = $empid ";
   
    
   $result = mysqli_query($conn, $sql);
   $result_check = mysqli_num_rows($result);
      // output data of each row
      if ($result_check > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $empid = $row["emp_id"];
        $fname = $row["fname"];
        $lname =  $row["lname"];
        $mobile = $row["mobile"];
        $email = $row["email"];
      }
    
  }
  else {

    echo "0 results";}
    
   
    ?>   
   
   
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
   
  </div>
  <div class="sidebar-brand-text mx-3">Lockyer Labour Solution <sup></sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->




<li class="nav-item">
  <a class="nav-link" href="register.php">
  <i class="fas fa-user"></i>
    <span>User Profile</span></a>
</li>



<!-- Nav Item - Utilities Collapse Menu -->

  

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Document</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    
      <h6 class="collapse-header">Form :</h6>
      <a class="collapse-item" id="piinfo" data-toggle="modal" data-target="#exampleModalCenter">Personal Information</a>
      <a class="collapse-item" id="piinfo" data-toggle="modal" data-target="#exampleModalCenterbank">Bank Information</a>
      <a class="collapse-item" id="superinfo" data-toggle="modal" data-target="#exampleModalCentersi">Superannuation Info</a>
      <a class="collapse-item"id="superinfo" data-toggle="modal" data-target="#exampleModalCentervi">Visa Information</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Uploads</h6>
     
      <a class="collapse-item" <?php if($passfile != 1) { echo'style="color: red"';} ?> class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#uploadModalpass">Passport Copy</a>
      <a class="collapse-item"  <?php if($visafile != 1) { echo'style="color: red"';} ?> type="button" class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#uploadModalvisa">Visa Copy</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link" href="aggrement.php">
  <i class="fas fa-handshake"></i>
    <span>User Aggreement</span></a>
</li>



<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="tables.html">
    <i class="fas fa-fw fa-table"></i>
    <span>Tables</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php          echo $docupdate;        ?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Document Alerts Center
                </h6>
               
                <?php
                  $ncp =5;
                  $ncv = 6;
                  $sql = "SELECT * FROM `notify`  WHERE emp_id = ? AND notifycode = ? OR notifycode = ?";
                  $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
            
                    header("../index.php?error=notready");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "sss", $empid,$ncp,$ncv);
                mysqli_stmt_execute($stmt);
            
                $resultdata = mysqli_stmt_get_result($stmt);
                $count = mysqli_num_rows($resultdata);
                for($i=0;$i<$count;$i++){
                if ($row = mysqli_fetch_assoc($resultdata)) {
                  $msg = $row["msg"];
                  $date = $row["notify_date"];
                  $code = $row["notifycode"];
                 
                
                
                
                  echo' <a class="dropdown-item d-flex align-items-center" href="index.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">'.$date.'</div>
                    <span class="font-weight-bold">'. $msg.'</span>
                  </div>
                </a>';

                }
              }
            



?>
               
            </li>
            <?php
                  $nc =1;
                 
                  $sql = "SELECT * FROM `notify`  WHERE emp_id = ? AND notifycode = ?";
                  $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
            
                    header("../index.php?error=notready");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "ss", $empid,$nc);
                mysqli_stmt_execute($stmt);
            
                $resultdata = mysqli_stmt_get_result($stmt);
                $count = mysqli_num_rows($resultdata);
                ?>
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"> <?php echo $count; ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <?php
                  $nc =1;
                 
                  $sql = "SELECT * FROM `notify`  WHERE emp_id = ? AND notifycode = ?";
                  $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
            
                    header("../index.php?error=notready");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "ss", $empid,$nc);
                mysqli_stmt_execute($stmt);
            
                $resultdata = mysqli_stmt_get_result($stmt);
                $count = mysqli_num_rows($resultdata);
                for($i=0;$i<$count;$i++){
                if ($row = mysqli_fetch_assoc($resultdata)) {
                  $msg = $row["msg"];
                  $date = $row["notify_date"];
                  $code = $row["notifycode"];
                 
                
                
                
                  echo' <a class="dropdown-item d-flex align-items-center" href="index.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">'.$date.'</div>
                    <span class="font-weight-bold">'. $msg.'</span>
                  </div>
                </a>';

                }
              }
            



?>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                 <h3 style="text-transform: uppercase;"> Welcome 
                <?php echo$username;?>
                </h3>
                </span>
                <img class="img-profile rounded-circle" src="https://media.istockphoto.com/vectors/avatar-icon-vector-id1177086178">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="register.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
               
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="includes/logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Personal Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="includes/scripts.php" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Commencement Date</label>
                <input type="date" class="form-control" id="inputEmail4" name="commdate" placeholder="Commencement Date" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Gender</label>
                <select id="inputState" class="form-control" name="gender" required>
                  <option selected>Choose...</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">TFN</label>
                <input type="text" class="form-control" id="inputPassword4" name="tfn" placeholder="123 456 789" required>
              </div>
            </div>
            <div class="form-group">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Date of Birth</label>
                <input type="date" class="form-control" id="inputEmail4" name="dob" placeholder="Date of Birth" required>
              </div>
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="sub" id="inputCity" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" name="state" class="form-control" required>
                  <option selected>Choose...</option>
                  <option> QLD</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" name="zip" class="form-control" id="inputZip" required>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addpi">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>