<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputlogin($email, $pwd) !== false) {

        header("Location: ../Log-in.php?error=emptyinput");
        exit();
    }
    
    loginuser($conn, $email, $pwd);
}
else{
    header("Location: ../Log-in.php");
    exit();
}
