<?php


include('includes/header.php');
include('includes/navbar.php');



?>

<div class="col-xl col-md-6 mb-4"  style="max-width: 100%">
      <div class="card border-left-warning shadow h-100 py-2">
<div class="card pmd-card">
                <!-- Card Header -->
              
                <!-- Card Header End -->
  <div class="card pmd-card">
    <!-- Card Header -->
    <div class="card-header pmd-card-border d-flex align-items-start">
      <div class="media-body">
        <h2 class="card-title h3">Leave Applications</h2>
        <p class="card-subtitle">Application of Leave by Employees</p>
      </div>
     
    </div>
    <!-- Card Header End -->
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