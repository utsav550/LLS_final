<?php

function emptyInputSignup($fname, $email, $lname, $pwd, $repwd, $mobile) {
    $result;
    if (empty($fname) || empty($lname) || empty($email) || empty($mobile) || empty($pwd) || empty($repwd)) {
        $result = true;
        echo 'passed';
    } else {
        $result = false;
    }
    return $result;
}

function invalidusername($fname, $lname) {
    $result;
    if (!preg_match("/^[a-zA-Z]*$/", $fname, $lname)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidmobile($mobile) {
    $result;
    if (!preg_match("/^[0-9]*$/", $mobile)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidemail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordmatch($pwd, $repwd) {
    $result;
    if ($pwd !== $repwd) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailexist($conn, $email) {
    $sql = "SELECT * FROM register WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("../Registeration.php?error=faild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createuser($conn, $fname, $lname, $email, $mobile, $pwd) {

    $sql = "INSERT INTO register (`fname`, `lname`, `email`, `mobile`, `password`) VALUES (?,?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../Registration.php?error=faild");
        exit();
    }


    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $mobile, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    header("Location: ../Log-in.php?success");
}

// log-in functions 

function emptyInputlogin($email, $pwd,) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginuser($conn, $email, $pwd) {
    $emailexist = emailexist($conn, $email);

    if ($emailexist == false) {

        header("Location: ../Log-in.php?error=wrongloginem");
        exit();
    }



    $pwdhashed = $emailexist["password"];



    if (password_verify($pwd, $pwdhashed)) {

        session_start();
        echo $_SESSION["email"];
        echo $_SESSION["fname"];
        $_SESSION["email"] = $emailexist["email"];
        $_SESSION["fname"] = $emailexist["fname"];
        $_SESSION["lname"] = $emailexist["lname"];
        
         header("Location: ../index.php?msg=welcome");
    } else {

        header("Location: ../Log-in.php?error=wronglogin");

        exit();
    }
}
