<?php

session_start();
$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["emp_id"];
if (empty($username)) {

  header("Location:../index.php");

}
if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $pwd = $_POST["password"];
   
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';


//    input validation and error handler

    if (invalidusername($fname, $lname) !== false) {

        header("Location: register.php?error=invalidusername");
        exit();
    }
    if (invalidmobile($mobile) !== false) {

        header("Location:  register.php?error=invalidmobile");
        exit();
    }
    if (invalidemail($email) !== false) {

        header("Location:  register.php?error=invalidemail");
        exit();
    }
    
    
    

$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
$sql = "UPDATE `register` SET `fname`= '$fname',`lname`= '$lname',`email`='$email',`mobile`='$mobile',`password`='$hashedpwd' WHERE emp_id = $empid ";
mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    header("Location:  register.php?error=chnagedsuccessfully");
  } else {
    echo "there is  Error while updating record: " . mysqli_error($conn);
  }
}