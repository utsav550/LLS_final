<?php
include('includes/header.php');
include('includes/navbar.php');


$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["adminid"];
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
    <link href="css/jobs.css" rel="stylesheet">
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            
                    <?php
                    $sql = "SELECT * FROM `job_info` WHERE `admin_id` = ? ";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                    
                        header("../index.php?error=notready");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt,"s", $empid);
                    mysqli_stmt_execute($stmt);
                    
                    $resultdata = mysqli_stmt_get_result($stmt);
                    $countt = mysqli_num_rows($resultdata);
                    if($countt==0){
                        echo '<h2 style="text-align: center;">No Jobs Available!</h2>';
                    }
                    
                    for($i=1; $i<=$countt;$i++){
                      $row = mysqli_fetch_assoc($resultdata);
                      $id = $row["job_info"];
                      $name = $row["name"];
                      $base =$row["pay_base"];
                      $rate = $row["pay_rate"];
                      $loc = $row["job_location"];
                      $farm = $row["farm_name"];


                      echo'<div class="col-md-3">
                      <div class="ibox">
                          <div class="ibox-content product-box">
                          <div class="product-imitation">
                                  <h4>'.$name.'</h4>
                              </div>
                              <div class="product-desc">
                                  <span class="product-price">
                                  $'.$rate.'
                                  </span>
      
                                  <h5 class="product-name" style="text-align: left;"> Pay Base: <span style="float: right;">'.$base.'</span></h5>
                                  <hr>
                                  <h5 class="product-name" style="text-align: left;"> Pay Rate: <span style="float: right;">$'.$rate.'</span></h5>
                                  <hr>
                                  <h5 class="product-name" style="text-align: left;"> Loaction: <span style="float: right;">'.$loc.'</span></h5>
                                  <hr>
                                  <h5 class="product-name" style="text-align: left;"> Farm: <span style="float: right;">'.$farm.'</span></h5>
                                  <hr>
      
                                  <div class="m-t text-righ">
      
                                     
                                      <a href="includes/createjob.php?id='.$id.'" style="align:center" class="btn btn-xs btn-outline btn-secondary">Delete </i> </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                      ';
                    }
                    ?>
                        



        </div>
    </div>
    <hr>
    <div style="width: 100%;">
    <h2 style="text-align: center;">Add New Job</h2>
    <form style="padding-left:15%; padding-right:15%;" action="includes/createjob.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Job Name</label>
      <input type="text"  name="jobname" class="form-control" id="inputEmail4" placeholder="Job Name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Farm Name</label>
      <input type="text" name="farm" class="form-control" id="inputPassword4" placeholder="Farm Name">
    </div>
  </div>
  
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Pay Rate</label>
      <input type="text" name="rate" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Pay Base</label>
      <select id="inputState" name="base" class="form-control">
        <option selected>Choose...</option>
        <option>Hourly</option>
        <option>Contract</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Location</label>
      <input type="text" class="form-control" name="loaction" id="inputZip">
    </div>
  </div>
 
  <button type="submit"  name="addjob" class="btn btn-primary">Add Job</button>
</form>
    </div>
</body>

</html>


<?php

include('includes/footer.php');
?>