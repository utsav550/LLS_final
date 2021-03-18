<?php

$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["adminid"];

require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$docupdate = 0;

//--------------------------------------------------------------------check approvel info 
$app1 = "pending";
$app2 = "new";
$count =0;
$sql = "SELECT * FROM `register` WHERE approval = ? OR approval = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "ss", $app1,$app2);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
$countt = mysqli_num_rows($resultdata);


//--------------------------------------------------------------------check employee number info 

$app3 = "Approved";

$countemp =0;
$sql = "SELECT * FROM `register` WHERE approval = ? ";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $app3);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
$countemp = mysqli_num_rows($resultdata);


//-----------------fatching job applications

$app1 = "pending";
$app2 = "new";
$count =0;
$sql = "SELECT * FROM `register` WHERE approval = ? OR approval = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "ss", $app1,$app2);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
$countt = mysqli_num_rows($resultdata);

$row = mysqli_fetch_assoc($resultdata);


?>




