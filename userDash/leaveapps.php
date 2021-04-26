<?php


include('includes/header.php');
include('includes/navbar.php');
include('includes/checkdata.php');?>


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
              $sql2 = "SELECT * FROM `leave` WHERE emp_id = $empid ORDER BY startdate DESC";
            
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
            
   <thead>
   <tr><td colspan="8">
   <div class="card-header pmd-card-border d-flex align-items-start">
      <div class="media-body">
        <h2 class="card-title h3"><b> Pending Leave Requests </b></h2>
       
      </div>
     
    </div>
   </td></tr>
  
   
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
            }
        }?>

<thead>
   <tr><td colspan="8">
   <div class="card-header pmd-card-border d-flex align-items-start">
      <div class="media-body">
        <h2 class="card-title h3"><b> Approval</b></h2>
       
      </div>
     
    </div>
   </td></tr>
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
              } else { ?>
             
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
                if($approval != "pending"){
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
                </form>';
                
                }


               
               
                }
              }
            
              



                    ?>
           
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Card Body End -->
  </div>

<?php
include('includes/footer.php');
?>