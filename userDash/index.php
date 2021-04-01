<?php


include('includes/header.php');
include('includes/navbar.php');
include('includes/checkdata.php');
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


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Document Update required</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <h4> <?php echo $docupdate;        ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (weekly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$0.00</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Upcoming Jobs</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <?php

                  $date = date('Y-m-d');
                  $upcoming = date('Y-m-d', strtotime(' + 3 days'));
                  $sql = "SELECT * FROM `job_decision` WHERE datejob Between'" . $date . "' and  '" . $upcoming . "'";

                  $stmt = mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt, $sql)) {

                    header("../index.php?error=notready");
                    exit();
                  }
                  mysqli_stmt_prepare($stmt, $sql);
                  mysqli_stmt_execute($stmt);
                  $resultdata = mysqli_stmt_get_result($stmt);

                  $countt = mysqli_num_rows($resultdata);
                  if ($countt == 0) {
                    echo '<h3>No Upcoming Schedule</h3>';
                  } else {
                    $upjobs = 0;
                    for ($i = 1; $i <= $countt; $i++) {
                      $row = mysqli_fetch_assoc($resultdata);
                      $datejob =  $row["datejob"];
                      $time = $row["time"];
                      $jobinfo  = $row["job_info"];
                      $jdid = $row["jd_id"]; {
                        $sql1 = "SELECT * FROM `job_info` WHERE job_info = $jobinfo";
                        $stmt1 = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt1, $sql1)) {

                          header("../index.php?error=notready");
                          exit();
                        }
                        mysqli_stmt_prepare($stmt1, $sql1);
                        mysqli_stmt_execute($stmt1);
                        $resultdata1 = mysqli_stmt_get_result($stmt1);
                        $roww = mysqli_fetch_assoc($resultdata1);
                        $jobname  = $roww["name"];
                        $farm = $roww["farm_name"];
                      }
                      $da = unserialize($row['arr_empid']);

                      $cary = count($da);
                      echo '<td>';
                      for ($j = 0; $j < $cary; $j++) {
                        if ($empid == $da[$j]) {
                          $upjobs++;
                        }
                        // echo  '<a href="currentempdetails.php?id='.$da[$j].' style="text-decoration: none;">'.$da[$j] . ',';
                      }
                    }
                  }
                  ?>
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                    <?php
                    if (empty($upjobs)) {
                      echo 'No Jobs At The Moment';
                    } else {
                      echo $upjobs . ' </br>';
                    }


                    ?>
                  </div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $upjobs * 10 . '%'; ?>" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
  <div class="col-xl col-md-6 mb-4"  style="max-width: 100%">
      <div class="card border-left-warning shadow h-100 py-2">
  <div class="card pmd-card">
    <!-- Card Header -->
    <div class="card-header pmd-card-border d-flex align-items-start">
      <div class="media-body">
        <h2 class="card-title h3">Leave Applications</h2>
        <p class="card-subtitle">Application of Leave by Employees</p>
      </div>
      <a class="btn pmd-ripple-effect btn-outline-primary ml-auto btn-sm" href="leaveapps.php">View All</a>
    </div>
    <!-- Card Header End -->
    <form action="leave.php" method="POST">
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
            <tbody>
              <tr>
                <td style="text-transform: uppercase;"><?php echo $fname;?></td>
                <td><div class="form-group">
                       
                       <select id="inputState" name="leavetype" class="form-control" style="width: 135px;" required>
                       <option >Casual Leave</option>
                       <option selected >Sick Leave</option>
                       </select>
                       </div></td>
                <td><div class="form-group">
                       
                        <select id="inputState" name="halfday" class="form-control" style="width: 80px;" required>
                        <option >Yes</option>
                        <option selected >No</option>
                        </select>
                        </div></td>
                <td>
                  <div class="form-group">
                  <input type="date" name="strdate"   min ="<?php echo date("Y-m-d"); ?>" class="form-control" id="inputCity" required style="width: 80%;">
                  </div>
                </td>
                <td> <div class="form-group">
                  <input type="date" name="enddate" class="form-control" id="inputCity" required style="width: 80%;">
                  </div></td>
                <td> <div class="form-group">
                  <input type="text" name="resone" class="form-control" id="inputCity" required style="width: 80%;">
                  </div></td>
               
                <td>--</td>
                <td>
                <button type="submit" name="applyleave" class="pmd-btn-fab btn-xs btn-outline-secondary pmd-ripple-effect btn mr-2" style="padding:3%; width:90px; ">Apply </button>
                  <a href="index.php" title="Reject" class="pmd-btn-fab btn-xs btn-outline-danger pmd-ripple-effect btn">
                    <i class="material-icons">close</i>
                  </a>
                </td>
              </tr>
              </form>
                   
              <?php 
              $sql2 = "SELECT * FROM `leave` WHERE emp_id = $empid";
            
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
              } else {?>
             <tr> <td colspan="8" style="text-align:center; font-size: 23px"> <b> Pending Leave Requests </b> </td></tr>
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

                <form action="leave.php" method="POST">
              <?php
                
                for ($i = 1; $i <= $countt; $i++) {
                  $row = mysqli_fetch_assoc($resultdata);
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
                  <td>'.$username.'</td>
                  <td>'.$type.'</td>
                  <td>'.$halfday.'</td>
                  <td>'.$startdate.'</td>
                  <td>'.$enddate.'</td>
                  <td>'.$reason.'</td>
                  
                  <td>'.$approval.'</td>
                  <td>
                 
                  <a href="leave.php?iddel='. $reqid .'" title="Reject" class="pmd-btn-fab btn-xs btn-outline-danger pmd-ripple-effect btn">
                  <i class="material-icons">close</i>
                </a>
                 
                  </td>
                </tr>
                </form>';
                }
                else{
                 
                  echo '
                  <tr>
                  <td>'.$username.'</td>
                  <td>'.$type.'</td>
                  <td>'.$halfday.'</td>
                  <td>'.$startdate.'</td>
                  <td>'.$enddate.'</td>
                  <td>'.$reason.'</td>
                  
                  <td>'.$approval.'</td>
                  
                </tr>
  
                  ';

                }
               
               
                }
              }
              echo '  <tr> <td colspan="8" style="text-align:center; font-size: 23px"> <a class="btn pmd-ripple-effect btn-outline-primary ml-auto btn-sm" href="leaveapps.php">View All</a></td></tr>';
                
              



                    ?>
           
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Card Body End -->
  </div>
  </div></div>
  <!-- Content Row -->

  <script type="text/javascript">
    $(window).load(function() {
      $('#mymodall').modal('show');
    });
  </script>





  <!-------------------------------------------------------------------- Modals ------------------------------------------------------------------>
  <!-------------------------------------------------------------------- personal info modal ------------------------------------------------------------------>
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


  <!-------------------------------------------------------------------- Bank info modal ------------------------------------------------------------------>
  <div class="modal fade" id="exampleModalCenterbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Bank Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="includes/scripts.php" method="POST">
            <div class="form-row">

              <label for="inputAddress">Account Name</label>
              <input type="text" class="form-control" id="inputAddress" name="acname" placeholder="David Munro" required>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPassword4">BSB</label>
                  <input type="text" class="form-control" id="inputPassword4" name="bsb" placeholder="123 456 " required>
                </div>

                <div class="form-group col-md-6">
                  <label for="inputPassword4">Account Number</label>
                  <input type="text" class="form-control" id="inputPassword4" name="acn" placeholder="1234 5678" required>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Pay Day</label>
                <select id="inputState" class="form-control" name="pd" required>
                  <option selected>Friday</option>


                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Pay Period</label>
                <select id="inputState" class="form-control" name="pp" required>
                  <option selected>Weekly</option>


                </select>
              </div>

            </div>
            <div class="form-group col-md-4">
              <label for="inputState"> Australian citizen? </label>
              <select id="inputState" class="form-control" name="ac" required>
                <option selected>No</option>
                <option>Yes</option>


              </select>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addbi">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <!-------------------------------------------------------------------- super info modal ------------------------------------------------------------------>
  <div class="modal fade" id="exampleModalCentersi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Superannuation Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <form action="includes/scripts.php" method="POST">
            <label for="inputPassword4">Are you member of any Superannuation Fund?</label>
            <div class="form-row">
              <div class="form-group col-md-4">
                <button type="button" class="btn btn-primary" style="width:100px" id="superinfo" data-toggle="modal" data-dismiss="modal" data-target="#exampleModalCentermember">Yes!</button>
              </div>
              <div class="form-group col-md-4">
                <button type="submit" class="btn btn-secondary" name="siinfono" style="width:100px">No</button>

              </div>






            </div>




            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-------------------------------------------------------------------- super info modal ------------------------------------------------------------------>
  <div class="modal fade" id="exampleModalCentermember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Superannuation Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="includes/scripts.php" method="POST">
            <div class="form-group col-md-20">
              <label for="inputPassword4">Superannuation Member Number</label>
              <input type="text" class="form-control" id="inputPassword4" name="smn" placeholder="1243 45346 7849" required>
            </div>
            <div class="form-group col-md-20">
              <label for="inputZip">Fund Name</label>
              <input type="text" name="fundname" class="form-control" id="inputZip" placeholder="Sunsuper" required>
            </div>
            <div class="form-group col-md-20">
              <label for="inputPassword4">Policy Number</label>
              <input type="text" class="form-control" id="inputPassword4" name="pn" placeholder="1243 46 7849" required>
            </div>
            <div class="form-group col-md-20  ">
              <label for="inputPassword4">Employee Identifiaction Number</label>
              <input type="text" class="form-control" id="inputPassword4" name="ein" placeholder="1243 45346 7849" required>
            </div>

            <div class="form-row">
              <div class="form-group col-md-20">
                <label for="inputZip">Account Name</label>
                <input type="text" name="eacn" class="form-control" id="inputZip" placeholder="David munro" required>
              </div>
              <div class="form-group col-md-20">
                <label for="inputZip">Uniqe Super ID</label>
                <input type="text" name="usid" class="form-control" id="inputZip" placeholder="1243  7849" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Fund ABN</label>
                <input type="text" class="form-control" id="inputPassword4" name="FABN" placeholder="123 456 789" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Fund Phone</label>
                <input type="text" class="form-control" id="inputPassword4" name="phone" placeholder="098 436 435" required>
              </div>
            </div>
            <div class="form-group">

              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="sub" id="inputCity" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputCity">state</label>
                <input type="text" class="form-control" name="State" id="inputCity" required>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" name="zip" class="form-control" id="inputZip" required>
              </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addsi">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-------------------------------------------------------------------- visa info modal ------------------------------------------------------------------>

  <div class="modal fade" id="exampleModalCentervi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Visa Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="includes/scripts.php" method="POST">
            <div class="form-group col-md-6">
              <label for="inputState"> Australian citizen? </label>
              <select id="inputState" class="form-control" name="ac" required>
                <option selected>No</option>
                <option>Yes</option>


              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputState"> Australian PR? </label>
              <select id="inputState" class="form-control" name="apr" required>
                <option selected>No</option>
                <option>Yes</option>


              </select>
            </div>

            <div class="form-group col-md-10">
              <label for="inputPassword4">Passport Number</label>
              <input type="text" class="form-control" id="inputPassword4" name="pn" placeholder="1243 46 7849" required>
            </div>
            <div class="form-group col-md-10">
              <label for="inputZip">Country of issued?</label>
              <input type="text" name="country" class="form-control" id="inputZip" placeholder="country" required>
            </div>
            <div class="form-group col-md-4">
              <label for="inputState"> Work permited? </label>
              <select id="inputState" class="form-control" name="wp" required>
                <option selected>No</option>
                <option>Yes</option>


              </select>
            </div>

            <div class="form-row">
              <div class="form-group col-md-20">
                <label for="inputZip">Visa type</label>
                <input type="text" name="type" class="form-control" id="inputZip" placeholder="Student" required>
              </div>
              <div class="form-group col-md-20">
                <label for="inputZip">Visa Sub Class</label>
                <input type="text" name="subclass" class="form-control" id="inputZip" placeholder="500" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Visa Grant Number</label>
                <input type="text" class="form-control" id="inputPassword4" name="grantnumber" placeholder="123 456 789" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Course Duration</label>
                <input type="text" class="form-control" id="inputPassword4" name="duration" placeholder="2 year" required>
              </div>

              <div class="form-group col-md-6">
                <label for="inputEmail4">Expiry Date</label>
                <input type="date" class="form-control" id="inputEmail4" name="exdate" placeholder="Expiry Date" required>
              </div>

            </div>


            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">Working Hours</label>
                <input type="text" class="form-control" name="hours" id="inputCity" required>
              </div>

            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="addvi">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-------------------------------------------------------------------- passport modal ------------------------------------------------------------------>
  <div id="uploadModalpass" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Upload Passport</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- Form -->
          <form action="includes/scripts.php" method="POST" enctype="multipart/form-data">
            Select file : <input type='file' name='file' id='file' class='form-control'><br>
            <input type='submit' class='btn btn-info' value='Upload' name="pass" id='btn_upload'>
          </form>

          <!-- Preview-->
          <div id='preview'></div>
        </div>

      </div>

    </div>
  </div>
  <div id="uploadModalvisa" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title">Upload Visa</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <!-- Form -->
          <form action="includes/scripts.php" method="POST" enctype="multipart/form-data">
            Select file : <input type='file' name='file' id='file' class='form-control'><br>
            <input type='submit' class='btn btn-info' value='Upload' name="visa" id='btn_upload'>
          </form>

          <!-- Preview-->
          <div id='preview'></div>
        </div>

      </div>

    </div>
  </div>






  <?php
  include('includes/scripts.php');
  include('includes/footer.php');


  ?>