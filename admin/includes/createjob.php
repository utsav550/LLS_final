<?php
session_start();
$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["adminid"];
require_once '../../includes/dbh.inc.php';
require_once '../../includes/functions.inc.php';
if (isset($_GET["id"])) {

    $jobid = $_GET["id"];
    $sql = "DELETE FROM `job_info` WHERE  job_info = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $jobid);
mysqli_stmt_execute($stmt);
header("Location:../addnewjob.php?msg=delete"); 
}

require_once '../../includes/dbh.inc.php';
require_once '../../includes/functions.inc.php';
if (isset($_POST["addjob"])) {
    $jobnmae = $_POST["jobname"];
    $farm = $_POST["farm"];
    $base = $_POST["base"];
    $rate = $_POST["rate"];
    $loc = $_POST["loaction"];
    
   

            $sql = "INSERT INTO `job_info`( `name`, `pay_base`, `pay_rate`, `job_location`, `admin_id`, `farm_name`) VALUES (?,?,?,?,?,?)";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location:../index.php");



                exit();
            }



            mysqli_stmt_bind_param($stmt, "ssssss", $jobnmae, $base, $rate,  $loc, $empid, $farm);
            mysqli_stmt_execute($stmt);
        
            mysqli_stmt_close($stmt);
            header("Location:../addnewjob.php?msg=addes");
        }
    
        if (isset($_GET["iddelete"])) {

            $jobiddel = $_GET["iddelete"];



            
        $sql = "SELECT * FROM `job_decision` WHERE  jd_id = ?;";
            
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        
            header("../index.php?error=notready");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $jobiddel);
        mysqli_stmt_execute($stmt);
        $resultdata = mysqli_stmt_get_result($stmt);
       
        $countt = mysqli_num_rows($resultdata);
        if ($countt == 0) {
          echo '<h3>No Upcoming Schedule</h3>';
        } else {
          for ($i = 1; $i <= $countt; $i++) {
            $row = mysqli_fetch_assoc($resultdata);
            $da= unserialize($row['arr_empid']);
           
                $cary = count($da);
                echo '<td>';
                for($j=0;$j<$cary;$j++){
               
                 $sql = "UPDATE `register` SET `job_ready`= (?) where `emp_id` = $da[$j]";

                 $stmt = mysqli_stmt_init($conn);
     
                 if (!mysqli_stmt_prepare($stmt, $sql)) {
     
                     header("Location:../index.php?her");
     
     
     
                     exit();
                 }
     $status = "not";
      mysqli_stmt_bind_param($stmt, "s", $date,);
                 mysqli_stmt_execute($stmt);
                }
            $sql = "DELETE FROM `job_decision` WHERE   jd_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        
            header("../index.php?error=notready");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $jobiddel);
        mysqli_stmt_execute($stmt);
       


                header("Location: ../managejobs.php");
            }}}







        
    
