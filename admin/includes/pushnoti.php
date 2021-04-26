<?php
session_start();
$username = $_SESSION["fname"];
$email = $_SESSION["email"];


require_once '../../includes/dbh.inc.php';
require_once '../../includes/functions.inc.php';

if (isset($_POST['relnoti'])) {
    $notic = $_POST['notiid'];
    $notifycode = 1;
    $postemp = 13;
    $date= date("Y/m/d");
    $adminid = 1;

    $password = $_POST['password'];
$sql = "INSERT INTO `notify`(`admin_id`, `emp_id`, `notify_date`, `msg`, `notifycode`) VALUES (?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("Location:../index.php");
    exit();
}
mysqli_stmt_bind_param($stmt, "sssss", $adminid, $postemp, $date, $notic, $notifycode);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("Location:../index.php?pushed");

}
if (isset($_GET["id"])) {

    $nid = $_GET["id"];
    $sql = "DELETE FROM `notify` WHERE notify_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $nid);
mysqli_stmt_execute($stmt);
header("Location:../index.php?msg=delete"); 
}
