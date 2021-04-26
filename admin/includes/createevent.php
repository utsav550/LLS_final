<?php
session_start();
$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["adminid"];
require_once '../../includes/dbh.inc.php';
require_once '../../includes/functions.inc.php';
if (isset($_GET["iddell"])) {

    $jobid = $_GET["iddell"];
    $sql = "DELETE FROM `event` WHERE  event_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $jobid);
mysqli_stmt_execute($stmt);
header("Location:../events.php?msg=delete"); 
}

require_once '../../includes/dbh.inc.php';
require_once '../../includes/functions.inc.php';
if (isset($_POST["addevent"])) {
    $name = $_POST["name"];
    $info = $_POST["info"];
    $dateevent = $_POST["date"];
    $number = $_POST["number"];
    $time = $_POST["time"];
    $adminide = 1;
    
   

            $sql = "INSERT INTO `event`( `admin_id`, `event_name`, `event_date`, `event_desc`, `participate_num`, `time`) VALUES (?,?,?,?,?,?)";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location:../index.php");



                exit();
            }



            mysqli_stmt_bind_param($stmt, "ssssss", $adminide, $name,$dateevent, $info, $number, $time);
            mysqli_stmt_execute($stmt);
        
            mysqli_stmt_close($stmt);
            header("Location:../events.php?msg=addes");
        }

        require_once '../../includes/dbh.inc.php';
require_once '../../includes/functions.inc.php';
if (isset($_GET["add"])) {
    $addev = $_GET["add"];
    $evid = $_GET["evid"];
    $adminide =1;
    
    
   

            $sql = "INSERT INTO `event_register`(`event_id`, `admin_id`, `emp_id`) VALUES (?,?,?)";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

               



                exit();
            }



            mysqli_stmt_bind_param($stmt, "sss", $evid, $adminide,$addev);
            mysqli_stmt_execute($stmt);
        
            mysqli_stmt_close($stmt);
            header("Location:../../userDash/index.php?msg=addesd");
        }
    
        






        
    
