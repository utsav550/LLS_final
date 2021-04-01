<?php
session_start();
$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["emp_id"];
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';
if (isset($_POST['applyleave'])) { //to run PHP script on submit

    
    $type = $_POST["leavetype"];
    $half = $_POST["halfday"];
    $strdate = $_POST["strdate"];
    $edndate = $_POST["enddate"];
    $resone = $_POST["resone"];
    $approval = "pending";


    $sql = "INSERT INTO `leave`(`emp_id`, `type`, `reason`, `startdate`, `enddate`, `halfday`, `approval`) VALUES (?,?,?,?,?,?,?)";
 $stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../index.php");
 exit();
    }
mysqli_stmt_bind_param($stmt, "sssssss", $empid,$type, $resone, $strdate,  $edndate, $half, $approval);
    mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
    header("Location: index.php?added");
}

if (isset($_GET["iddel"])) {

    $leavedel = $_GET["iddel"];
    $sql = "DELETE FROM `leave` WHERE   req_id  = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $leavedel);
mysqli_stmt_execute($stmt);
header("Location:index.php?msg=delete"); 
}



    


