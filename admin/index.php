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
                <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $countempi;        ?>&nbsp; Employees For Next Job </div>
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
  <!--------------------------------------------------------------Card birthday -->

  <!----------------------------------------   events ------------------->
  <div class="col-xl col-md-6 mb-4" style="max-width: 65%; float: right ">
    <div class="card border-left-warning shadow h-100 py-2" style="border-left: .25rem solid #Ff4770 !important;">
      <div class="card pmd-card" style="max-width: 99%; height:600px; margin-bottom:50px;   overflow-x: hidden;">

        <div class="card-header pmd-card-border d-flex">

          <i class="fas fa-clipboard-list fa-2x text-gray-300" style="font-size: 70px; margin-right:10px; color:orangered"></i>
          <div class="media-body">

            <h2 class="card-title h3"> Notifications</h2>
            <p class="card-subtitle"> Push Notifications for Employees </p>
            <a class="btn pmd-ripple-effect btn-outline-primary ml-auto btn-sm" style="margin-left:30px; float:right" href="notification.php">View All</a>
          </div>
        </div>
        

        <form action="includes/pushnoti.php" method="POST">
          <div class="form-check">
           
            <div style="width: 100%;">
              <h2 style="text-align: center;">Write Notice</h2>
              <div class="form-row">
                <div class="form-group col-md-6" >

                  <input type="textbox" name="notiid" class="form-control" id="inputEmail4" placeholder="" style="width:500px; height:100px; margin: 2% 0% 0% 55%;">
                </div>

              </div>
              <button type="submit"  name="relnoti" class="btn btn-primary" style="height:50px;width:150px; margin: 1% 0% 0% 45%;">Release</button>


              
            </div>
            </div>
</form>
<hr>
<div class="card-body">
      <div class="body">
        <div class="table-responsive">
          <table class="table pmd-table table-hover">
            <thead>
              <tr>
                <th>Notification  ID</th>
                <th>Notifications To</th>
                <th>Date</th>
                <th>Notice</th>
                <th>Action</th>
                <th></th>
              </tr>
            </thead>
            <?php
            $sql2 = "SELECT * FROM `notify` WHERE `notifycode` = 343 ORDER BY DATE_FORMAT(notify_date, '%d')";

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
              echo '<h3>No Notifications</h3>';
            } else {
              if ($countt < 6) {
                $forc =  $countt;
              } else {
                $forc = 3;
              }
              for ($i = 1; $i <= $forc; $i++) {
                $row = mysqli_fetch_assoc($resultdata);
                $date = $row["notify_date"];
                $notic =  $row["msg"];
                $notfyid = $row["notify_id"];
                               
                  echo '
                  <tr>
                  <td>' . $notfyid . '</td>
                  <td> To ALL </td>
                  <td>' . $date . '</td>
                  <td>' . $notic . '</td>
                  
                  <td>
                  <a href="includes/pushnoti.php?id='.$notfyid.' class="delete" title="Delete" style="color: red;" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                            
                                            
                                        </td>
                </tr>';
                
              }
            } ?>


            </tbody>

          </table>
        </div>
      </div>
    </div>





            </ul>
          </div>
      
    
  </div>
</div>
</div>
<!---------------------------     bdays--------------------->
<div class="col-xl col-md-6 mb-4" style="max-width: 33%">
  <div class="card border-left-warning shadow h-100 py-2" style="border-left: .25rem solid #FF4500 !important;">
    <div class="card pmd-card" style="max-width: 99%; height:600px; margin-bottom:50px;  overflow: scroll; overflow-x: hidden;">

      <div class="card-header pmd-card-border d-flex">
        <i class="pmd-icon-circle icon-circle-48 border border-primary mr-3 md-dark">
        </i>
        <i class="fas fa-gifts" style="font-size: 50px; margin-right:10px; color:brown"></i>
        <div class="media-body">

          <h2 class="card-title h3">Upcoming Birthdays</h2>
          <p class="card-subtitle">List of employees whose birthdays are in this month</p>
        </div>
      </div>
      <?php
      $sql3 = "SELECT * FROM `register` WHERE MONTH(dob) = MONTH(NOW()) and DAY(dob) >= DAY(NOW()) ORDER BY DATE_FORMAT(dob, '%d')";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql3)) {

        header("../index.php?error=notready");
        exit();
      }
      mysqli_stmt_prepare($stmt, $sql3);
      mysqli_stmt_execute($stmt);
      $resultdata = mysqli_stmt_get_result($stmt);
      $countt2 = mysqli_num_rows($resultdata);
      if ($countt2 == 0) {
        echo '<h3>No Upcoming BirthDays!</h3>';
      } else {


        for ($i = 1; $i <=   $countt2; $i++) {
          $row = mysqli_fetch_assoc($resultdata);
          $iddob =  $row["emp_id"];
          $dob =  $row["dob"];
          $dob1 = date('j F', strtotime($dob) . date('Y'));
          $dob2 = date("jS \of F ", strtotime($dob));
          $dobfname =  $row["fname"];
          $doblname =  $row["lname"];

          echo '
 
 <li class="list-group-item d-flex flex-row">
 <a href="javascript:void(0);" class="pmd-avatar-list-img" title="profile-link">
     <img alt="40x40" class="img-fluid" src="https://media.istockphoto.com/vectors/avatar-icon-vector-id1177086178" style="width: 50px; margin-right:15px; ">
 </a>
 <div class="media-body">
     <h3 class="pmd-list-title">' . $dobfname . '&nbsp' . $doblname . '</h3>
     <p class="pmd-list-subtitle">' . $dob2 . '</p>
 </div>
</li>
 ';
        }
      }

      ?>

      </ul>
    </div>
  </div>
</div>
<!------------------------------------------ notification --------------------------->


<!--------------------------leave ------------------->
<div class="col-xl col-md-6 mb-4" style="max-width: 100%">
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
              } else {
                for ($i = 1; $i <= $countt; $i++) {
                  $row = mysqli_fetch_assoc($resultdata);
                  $empidl = $row["emp_id"];
                  $reason =  $row["reason"];
                  $type = $row["type"];
                  $startdate =  $row["startdate"];
                  $enddate = $row["enddate"];
                  $halfday  = $row["halfday"];
                  $approval = $row["approval"];
                  $reqid = $row["req_id"];
                  if ($approval == "pending") {
                    echo '
                  <tr>
                  <td>' . $empidl . '</td>
                  <td>' . $type . '</td>
                  <td>' . $halfday . '</td>
                  <td>' . $startdate . '</td>
                  <td>' . $enddate . '</td>
                  <td>' . $reason . '</td>
                  
                  <td>' . $approval . '</td>
                  <td>
                                            <a href="leaveapps.php?idapp=' . $reqid . '"  class="pmd-btn-fab btn-xs btn-outline-secondary btn mr-2 pmd-ripple-effect">
                                                <i class="material-icons">Grant</i>
                                            </a>
                                            <a href="leaveapps.php?iddell=' . $reqid . '" class="pmd-btn-fab btn-xs btn-outline-danger btn pmd-ripple-effect">
                                                <i class="material-icons">Reject</i>
                                            </a>
                                        </td>
                </tr>';
                  }
                }
              } ?>


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
            } else {
              if ($countt < 3) {
                $forc =  $countt;
              } else {
                $forc = 3;
              }
              for ($i = 1; $i <= $forc; $i++) {
                $row = mysqli_fetch_assoc($resultdata);
                $empidl = $row["emp_id"];
                $reason =  $row["reason"];
                $type = $row["type"];
                $startdate =  $row["startdate"];
                $enddate = $row["enddate"];
                $halfday  = $row["halfday"];
                $approval = $row["approval"];
                $reqid = $row["req_id"];
                if ($approval != "pending") {
                  echo '
                  <tr>
                  <td>' . $empidl . '</td>
                  <td>' . $type . '</td>
                  <td>' . $halfday . '</td>
                  <td>' . $startdate . '</td>
                  <td>' . $enddate . '</td>
                  <td>' . $reason . '</td>
                  
                  <td>' . $approval . '</td>
                  <td>
                                            <a href="javascript:void(0);" class="pmd-btn-fab btn-xs btn-outline-secondary btn mr-2 pmd-ripple-effect">
                                                <i class="material-icons">' . $approval . '</i>
                                            </a>
                                            
                                        </td>
                </tr>';
                }
              }
            } ?>


            </tbody>

          </table>
        </div>
      </div>
    </div>
    <!-- Card Body End -->
  </div>
</div>


<?php

include('includes/footer.php');


?>