<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/aggrement.inc.php');
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$health =  '';
$fair =  '';
$hygiene = '';
$company =  '';
$piecework =  '';
$imp =  '';
 $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
 $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt, $sql)) {

     header("../index.php?error=notready");
     exit();
 }
 mysqli_stmt_bind_param($stmt, "s", $empid);
 mysqli_stmt_execute($stmt);

 $resultdata = mysqli_stmt_get_result($stmt);
 if ($row = mysqli_fetch_assoc($resultdata)) {
     $health =  $row["Health_Safety"];
     $fair =  $row["Fair_work"];
     $hygiene =  $row["Hygiene_Rule"];
     $company =  $row["Company_aggreement"];
     $piecework =  $row["Piecework_aggreement"];
     $imp =  $row["important_consideration"];
 }
?>
<script src="https://kit.fontawesome.com/36e858d057.js" crossorigin="anonymous"></script>

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
                <a href="#" id=""  data-toggle="modal" data-target="#<?php if($health != 1){ echo'health';}else{ echo'health';}?>"  style="text-decoration:none">
              <div style="font-size: 18px;text-transform:uppercase"><b>Workplace Health & Safety</b></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <h6 style="color: grey;"><?php if($health != 1){ echo'<i class="fa fa-user-clock" style="color:black;font-size: 23px;"></i> &nbsp Sign Aggrement';}else{ echo'<i class="fas fa-user-check" style="color:green;font-size: 23px;"></i>&nbsp You have accepted the Aggrement.';}?></h6>
               
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-medkit fa-2x text-red-300"></i>
            </div>
</a>
          </div>
        </div>
      </div>
    </div>
</a>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <a href="#" id=""  data-toggle="modal" data-target="#fair"  style="text-decoration:none">
              <div style="font-size: 18px;text-transform:uppercase; color:#1cc88a"><b>Fair Work information</b></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              <h6 style="color: grey;"><?php if($fair != 1){ echo'<i class="fa fa-user-clock" style="color:grey;font-size: 23px;"></i> &nbsp Sign Aggrement';}else{ echo'<i class="fas fa-user-check" style="color:green;font-size: 23px;"></i>&nbsp You have accepted the Aggrement.';}?></h6>

            </div>
            <div class="col-auto">
              <i class="fas fa-balance-scale fa-2x text-green-300" style="color: #1cc88a;"></i>
            </div>
</a>
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
            <a href="#" id=""  data-toggle="modal" data-target="#hygiene" style="text-decoration:none">
              <div class="" style="font-size: 18px; color:#36b9cc"><b>STAFF HYGIENE RULES</b></div>
              <div class="row no-gutters align-items-center">
              <h6 style="color: grey;"><?php if($hygiene != 1){ echo'<i class="fa fa-user-clock" style="color:grey;font-size: 23px;"></i> &nbsp Sign Aggrement';}else{ echo'<i class="fas fa-user-check" style="color:green;font-size: 23px;"></i>&nbsp You have accepted the Aggrement.';}?></h6>

                <div class="col">
                 
                </div>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-pump-soap fa-3x text-green-300" style="color: #36b9cc;"></i>
            </div>
</a>
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
            <a href="#" id=""  data-toggle="modal" data-target="#company"  style="text-decoration:none">
              <div style="font-size: 18px; color: orange;text-transform:uppercase"> <b>Company Agreement </b></div>
              <h6 style="color: grey;"><?php if($company != 1){ echo'<i class="fa fa-user-clock" style="color:grey;font-size: 23px;"></i> &nbsp Sign Aggrement';}else{ echo'<i class="fas fa-user-check" style="color:green;font-size: 23px;"></i>&nbsp You have accepted the Aggrement.';}?></h6>

              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
            </div>
            <div class="col-auto">
            
              <i class="far fa-handshake fa-3x text-yellow-300"style="color: orange;"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  
<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2" style="">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <a href="#" id=""  data-toggle="modal" data-target="#piece"style="text-decoration:none">
              <div  style="font-size: 18px; color: orange;text-transform:uppercase"> <b>Piecework Agreement</b></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              <h6 style="color: grey;"><?php if($piecework != 1){ echo'<i class="fa fa-user-clock" style="color:grey;font-size: 23px;"></i> &nbsp Sign Aggrement';}else{ echo'<i class="fas fa-user-check" style="color:green;font-size: 23px;"></i>&nbsp You have accepted the Aggrement.';}?></h6>

            </div>
            <div class="col-auto">
              <i class="fab fa-angellist fa-3x text-green-300" style="color: orange;"></i>
            </div>
</a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4" >
      <div class="card -left-success shadow  h-100 py-2" style="border-left: .25rem solid; color:red">
        <div class="card-body"style="color: #36b9cc";>
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <a href="#" id=""  data-toggle="modal" data-target="#imp" style="text-decoration:none">
              <div style="font-size: 18px; color: red;text-transform:uppercase"><b>Important consideration</b></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              <h6 style="color: grey;"><?php if($imp != 1){ echo'<i class="fa fa-user-clock" style="color:grey;font-size: 23px;"></i> &nbsp Sign Aggrement';}else{ echo'<i class="fas fa-user-check" style="color:green;font-size: 23px;"></i>&nbsp You have accepted the Aggrement.';}?></h6>

            </div>
            <div class="col-auto">
           
              <i class="fas fa-exclamation-triangle fa-3x text-green-300" style="color: red;"></i>
            </div>
</a>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

 <!-------------------------------------------------------------------- health info modal ------------------------------------------------------------------>
 

<div class="modal fade bd-example-modal-lg" id="health" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="background-color:aliceblue">
    <div class="modal-content">
    <form action="includes/aggrement.inc.php" method="POST">
     <embed src="../aggre/healthandsafety.pdf" type="application/pdf" style="height: 900px; width:100%">
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="healthaggree">Agree</button>
        </div>
    </form>
    </div>
 </div>  
</div>
<!-------------------------------------------------------------------- fair work info modal ------------------------------------------------------------------>
 

<div class="modal fade bd-example-modal-lg" id="fair" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="background-color:aliceblue">
    <div class="modal-content">
    <form action="includes/aggrement.inc.php" method="POST">
     <embed src="../aggre/fairwork.pdf" type="application/pdf" style="height: 900px; width:100%">
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="agreefair">Agree</button>
        </div>
    </form>
    </div>
 </div>  
</div>
<!-------------------------------------------------------------------- STAFF HYGIENE RULES modal ------------------------------------------------------------------>
 

<div class="modal fade bd-example-modal-lg" id="hygiene" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="background-color:aliceblue">
    <div class="modal-content">
    <form action="includes/aggrement.inc.php" method="POST">
     <embed src="../aggre/hygiene.pdf" type="application/pdf" style="height: 900px; width:100%">
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="hyg">Agree</button>
        </div>
    </form>
    </div>
 </div>  
</div>
<!-------------------------------------------------------------------- COMPANY AGREEMENT ------------------------------------------------------------------>
 

<div class="modal fade bd-example-modal-lg" id="company" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="background-color:aliceblue">
    <div class="modal-content">
    <form action="includes/aggrement.inc.php" method="POST">
     <embed src="../aggre/company.pdf" type="application/pdf" style="height: 900px; width:100%">
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="cmp">Agree</button>
        </div>
    </form>
    </div>
 </div>  
</div>
<!-------------------------------------------------------------------- PIECEWORK AGREEMENT ------------------------------------------------------------------>
 

<div class="modal fade bd-example-modal-lg" id="piece" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="background-color:aliceblue">
    <div class="modal-content">
    <form action="includes/aggrement.inc.php" method="POST">
     <embed src="../aggre/piecework.pdf" type="application/pdf" style="height: 900px; width:100%">
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="piece">Agree</button>
        </div>
    </form>
    </div>
 </div>  
</div>
<!--------------------------------------------------------------------IMPORTANT CONSIDERATION------------------------------------------------------------------>
 

<div class="modal fade bd-example-modal-lg" id="imp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="background-color:aliceblue">
    <div class="modal-content">
    <form action="includes/aggrement.inc.php" method="POST">
     <embed src="../aggre/imp.pdf" type="application/pdf" style="height: 900px; width:100%">
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="imp">Agree</button>
        </div>
    </form>
    </div>
 </div>  
</div>