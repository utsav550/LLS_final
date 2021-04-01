<?php

require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

if (isset($_GET["iddell"])) {
$approve = "Rejected";
$leavedel = $_GET["iddell"];
$sql = "UPDATE `leave` SET `approval`= '$approve' WHERE req_id = $leavedel";
mysqli_query($conn, $sql);
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}

mysqli_stmt_execute($stmt);
header("Location:index.php?msg=delete"); 

}


if (isset($_GET["idapp"])) {
    $approve = "Approved";
$leavedel = $_GET["idapp"];
$sql = "UPDATE `leave` SET `approval`= '$approve' WHERE req_id = $leavedel";
mysqli_query($conn, $sql);
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}

mysqli_stmt_execute($stmt);
header("Location:index.php?msg=delete"); 

}
?>