
<?php
include('includes/header.php');
include('includes/navbar.php');


include('includes/chechadmin.php');
if (isset($_GET["error"])) {
  if ($_GET["error"] == "exist") {

    $message = "information already exist";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  if ($_GET["error"] == "empty") {
    $message = "fill all the information";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  if ($_GET["error"] == "invalidemail") {
    echo "Error: invalid Email</p>";
  }
  if ($_GET["error"] == "passwordnotmatch") {
    echo "Error: Password does not match</p>";
  }
  if ($_GET["error"] == "alreadyexixt") {
    echo "Error: Email already exist. Please Log-in.</p>";
  }
  if ($_GET["error"] == "passportnotuploaded") {
    $message = "file not uploaded. please choose PDF file.";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}





?>

<script src="https://kit.fontawesome.com/36e858d057.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
        <a href="employees.php" style="text-decoration: none;">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Currunt Employee</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <h4> <?php echo $countemp;        ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
        <a href="managejobs.php" style="text-decoration: none;">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Job Management</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $countemp;        ?>&nbsp; Employees For Next Job </div>
            </div>
            <div class="col-auto">
            
              <i class="fas fa-chalkboard-teacher fa-2x text-black-300"></i>
            </div>
          </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Pending Approval</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $countt; ?></div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $countt; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (yearly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$0.00</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div>
<div class="col-xl col-md-6 mb-4"  style="max-width: 100%">
      <div class="card border-left-warning shadow h-100 py-2">
<div class="card pmd-card">
                <!-- Card Header -->
                <div class="card-header pmd-card-border d-flex align-items-start">
                    <div class="media-body">
                        <h2 class="card-title h3">Leave Applications</h2>
                        <p class="card-subtitle">Application of Leaves by Employees</p>
                    </div>
                    <a class="btn pmd-ripple-effect btn-outline-primary ml-auto btn-sm" href="leave.php">View All</a>
                </div>
                <!-- Card Header End -->

                <!-- Card Body -->
                <div class="card-body">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table pmd-table table-hover">
                                <thead>
                                    <tr>
                                    <th>Employee</th>
                <th>Leave Type</th>
                <th>Half Day</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                                $sql2 = "SELECT * FROM `leave`";
            
            $stmt = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt, $sql2)) {

              header("../index.php?error=notready");
              exit();
            }
            mysqli_stmt_prepare($stmt, $sql2);
            mysqli_stmt_execute($stmt);
            $resultdata = mysqli_stmt_get_result($stmt);
           $countt = mysqli_num_rows($resultdata);
           if ($countt == 0) {
              echo '<h3>No Upcoming Schedule</h3>';
            } 
            else 
            {
            for ($i = 1; $i <= $countt; $i++) {
                  $row = mysqli_fetch_assoc($resultdata);
                  $empidl = $row["emp_id"];
                  $reason =  $row["reason"];
                  $type = $row["type"];
                  $startdate =  $row["startdate"];
                $enddate = $row["enddate"];
                $halfday  =$row["halfday"];
                $approval = $row["approval"];
                $reqid = $row["req_id"];
                if($approval == "pending"){
                  echo '
                  <tr>
                  <td>'.$empidl.'</td>
                  <td>'.$type.'</td>
                  <td>'.$halfday.'</td>
                  <td>'.$startdate.'</td>
                  <td>'.$enddate.'</td>
                  <td>'.$reason.'</td>
                  
                  <td>'.$approval.'</td>
                  <td>
                                            <a href="leaveapps.php?idapp='. $reqid .'"  class="pmd-btn-fab btn-xs btn-outline-secondary btn mr-2 pmd-ripple-effect">
                                                <i class="material-icons">Grant</i>
                                            </a>
                                            <a href="leaveapps.php?iddell='. $reqid .'" class="pmd-btn-fab btn-xs btn-outline-danger btn pmd-ripple-effect">
                                                <i class="material-icons">Reject</i>
                                            </a>
                                        </td>
                </tr>';}
                }
                }?>

                                  
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Card Body End -->
            </div>
            <div class="card-header pmd-card-border d-flex align-items-start">
                    <div class="media-body">
                        <h2 class="card-title h3">Leave Applications</h2>
                        <p class="card-subtitle">Other Leave Applications</p>
                    </div>
                   
                </div>
                <!-- Card Header End -->

                <!-- Card Body -->
                <div class="card-body">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table pmd-table table-hover">
                                <thead>
                                    <tr>
                                    <th>Employee</th>
                <th>Leave Type</th>
                <th>Half Day</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                                $sql2 = "SELECT * FROM `leave`";
            
            $stmt = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt, $sql2)) {

              header("../index.php?error=notready");
              exit();
            }
            mysqli_stmt_prepare($stmt, $sql2);
            mysqli_stmt_execute($stmt);
            $resultdata = mysqli_stmt_get_result($stmt);
           $countt = mysqli_num_rows($resultdata);
           if ($countt == 0) {
              echo '<h3>No Upcoming Schedule</h3>';
            } 
            else 
            {
              if($countt<3)
              {
              $forc =  $countt;
              }else
              {
                $forc = 3;
              }
            for ($i = 1; $i <= $forc; $i++) {
                  $row = mysqli_fetch_assoc($resultdata);
                  $empidl = $row["emp_id"];
                  $reason =  $row["reason"];
                  $type = $row["type"];
                  $startdate =  $row["startdate"];
                $enddate = $row["enddate"];
                $halfday  =$row["halfday"];
                $approval = $row["approval"];
                $reqid = $row["req_id"];
                if($approval != "pending"){
                  echo '
                  <tr>
                  <td>'.$empidl.'</td>
                  <td>'.$type.'</td>
                  <td>'.$halfday.'</td>
                  <td>'.$startdate.'</td>
                  <td>'.$enddate.'</td>
                  <td>'.$reason.'</td>
                  
                  <td>'.$approval.'</td>
                  <td>
                                            <a href="javascript:void(0);" class="pmd-btn-fab btn-xs btn-outline-secondary btn mr-2 pmd-ripple-effect">
                                                <i class="material-icons">'.$approval.'</i>
                                            </a>
                                            
                                        </td>
                </tr>';}
                }
                }?>

                                  
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Card Body End -->
            </div>
</div>

</div>
</div>

  <?php
 
  include('includes/footer.php');


  ?>