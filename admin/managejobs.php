<?php
include('includes/header.php');
include('includes/navbar.php');
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["adminid"];
$member = '';
$datejob = '';
$time = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
  <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="css/jobs.css" rel="stylesheet">
  <script type="text/javascript" src="http://code.jquery.com/jquery.js"> </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("select.formcontrol").change(function() {
        var selectedfarm = $(".formcontrol option:selected").val();
        $.ajax({
          type: "POST",
          url: "process-request.php",
          data: {
            formcontrol: selectedfarm
          }
        }).done(function(data) {
          $("#response").html(data);
        });
      });
    });
  </script>

</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

  <!--------------------------------------------------------------- Form for job decide -------------------------------->
  <h2 style="text-align: center;">UPCOMING SCHEDULE</h2>
  <hr>
  <div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                   
                    </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
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
            echo $countt;
            if ($countt == 0) {
              echo '<h3>No Upcoming Schedule</h3>';
            } else {
              for ($i = 1; $i <= $countt; $i++) {
                $row = mysqli_fetch_assoc($resultdata);
                $datejob =  $row["datejob"];
                $time = $row["time"];
                
               
               $member = $row["arr_empid"];
              }
            }
                ?>

                    <tr>
                        <td><?php  echo $member;   ?></td>
                        <td><?php  echo $datejob;   ?></td>
                        <td><?php  echo $time;   ?></td>
                        <td>
                            
                            <a class="delete" title="Delete" style="color: red;" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>     

  <form action="includes/jobdecide.php" method="POST">
    <div class="form-check">
      <hr>
      <div style="width: 100%;">
        <h2 style="text-align: center;">Allocate Jobs</h2>

        <div class="form-row" style="padding-left:35%;">
          <?php
          $sql = "SELECT * FROM `farm` WHERE `admin_id` = ? ";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("../index.php?error=notready");
            exit();
          }
          mysqli_stmt_bind_param($stmt, "s", $empid);
          mysqli_stmt_execute($stmt);

          $resultdata = mysqli_stmt_get_result($stmt);
          $countt = mysqli_num_rows($resultdata);
          if ($countt == 0) {
            echo '
                       <div class="form-group col-md-3" style="margin-left:10px;margin-right:20px;">
                        <label for="inputState">Farm Name</label>
                        <select id="inputState" name="farm" class="form-control" required>
                        <option selected>No Farms </option>
                        </select>
                        </div>
                       ';
          }
          echo '
                    <div class="form-group col-md-3" style="margin-left:10px;margin-right:20px;">
                      <label for="inputState">Farm Name</label>
                      <select id="inputState" style=" display: block;
                      width: 100%;
                      height: calc(1.5em + .75rem + 2px);
                      padding: .375rem .75rem;
                      font-size: 1rem;
                      font-weight: 400;
                      line-height: 1.5;
                      color: #6e707e;
                      background-color: #fff;
                      background-clip: padding-box;
                      border: 1px solid #d1d3e2;
                      border-radius: .35rem;" name="farm" class="formcontrol" required>
                      <option value="">Select Farm</option>
                    ';
          for ($i = 1; $i <= $countt; $i++) {
            $row = mysqli_fetch_assoc($resultdata);
            $farm = $row["farm_name"];
            echo '
                      <option value=' . $farm . '>' . $farm . '</option>
                      ';
          }
          echo '</select>
                    </div>
                    ';
          ?>

          <div class="form-group col-md-3" style="margin-left:10px;margin-right:20px;">
            <label for="inputState">Job Name</label>

            <span id="response" required></span>
          </div>
        </div>


        <div class="form-row" style="padding-left: 35%;">
          <div class="form-group col-md-3" style="margin-left:10px;margin-right:20px;">
            <label for="inputCity">Date</label>
            <input type="date" name="date" class="form-control" id="inputCity" required>
          </div>

          <div class="form-group col-md-3">
            <label for="inputZip">Start Time</label>
            <input type="time" class="form-control" name="time" id="inputZip" required>
          </div>
        </div>
        <h2 style="text-align: center;">Select Employees</h2>
        <hr>



        <div class="contaner" style="padding-left: 2.5rem;
    padding-right: 0.5rem;">
          <div class="row" style="width: 100%; margin-right:-10%; ">


            <?php
            $app1 = "Approved";
            $sql = "SELECT * FROM `register` WHERE `approval` = ? ";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {

              header("../index.php?error=notready");
              exit();
            }
            mysqli_stmt_bind_param($stmt, "s", $app1);
            mysqli_stmt_execute($stmt);

            $resultdata = mysqli_stmt_get_result($stmt);
            $countt = mysqli_num_rows($resultdata);
            if ($countt == 0) {
              echo '<h3>Not Enough Employees For Job</h3>';
            } else {
              for ($i = 1; $i <= $countt; $i++) {
                $row = mysqli_fetch_assoc($resultdata);
                $fname =  $row["fname"];
                $lname = $row["lname"];
                $employid = $row["emp_id"];

                echo '
    
 
    <div class="card" style="width: 10rem; border-radius:2rem; margin:5px">
  <div class="card-body">
  <img src="https://media.istockphoto.com/vectors/avatar-icon-vector-id1177086178" style=" height:70px; width:70px; margin:3% 79% 3% 20%; border-radius: 50%">
    <h5 class="card-title" style="text-align:left; text-transform:uppercase; ">' . $fname . '&nbsp' . $lname . '</h5>
    <div class="form-check">
    <h6 style="text-align:center">ID:
    ' . $employid . '</h6>
  <input
  style="margin-left:30%"
    class="form-check-input"
    type="checkbox"
    value="' . $employid . '"
    id="flexCheckDefault"
    name="check_list[]"
    required
  />
  
    
</div>
    
  </div>
</div>
';
              }
            }
            ?>
          </div>
        </div>
        <hr>
        <button type="submit" name="submit" class="btn btn-xs btn-outline btn-primary" style="padding:1%; margin-left:45%">Release Schedule </i> </button>
  </form>
</body>

</html>


<?php

include('includes/footer.php');
?>