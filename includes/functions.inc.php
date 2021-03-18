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
function emptyInputchange($fname, $email, $lname, $pwd, $mobile) {
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

    $sql = "INSERT INTO register (`fname`, `lname`, `email`, `mobile`, `password`, `approval` ) VALUES (?,?,?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../Registration.php?error=faild");
        exit();
    }


    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    $approval = 'new';
    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $mobile, $hashedpwd, $approval);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    header("Location: ../Log-in.php?success");
}

// log-in functions 

function emptyInputlogin($email, $pwd) {
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
        $adminemail = "jaygogagatton@gmail.com";
        $adminn = $emailexist["email"];
        session_start();
        if($adminn == $adminemail){

            $sql = "SELECT * FROM admin WHERE admin_email = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
        
                header("../Registeration.php?error=faild");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "s", $adminn);
            mysqli_stmt_execute($stmt);
        
            $resultdata = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($resultdata)) {
                $_SESSION["email"] = $row["admin_email"];
                $_SESSION["fname"] = $row["admin_name"];
                $_SESSION["adminid"] = $row["admin_id"];
            }

            header("Location: ../admin/index.php?admin=admin");
            exit();

        }
        
        $_SESSION["email"] = $emailexist["email"];
        $_SESSION["fname"] = $emailexist["fname"];
        $_SESSION["lname"] = $emailexist["lname"];
        $_SESSION["emp_id"] = $emailexist["emp_id"];
        echo $_SESSION["email"];
        echo $_SESSION["fname"];
       
        
         header("Location: ../userDash/index.php?msg=welcome");
    } else {

        header("Location: ../Log-in.php?error=wronglogin");

        exit();
    }
}
function addpi($conn, $commdate, $gender, $dob, $tfn, $address, $sub, $state, $zip) {

    $sql = "INSERT INTO register (`fname`, `lname`, `email`, `mobile`, `password`, `approval` ) VALUES (?,?,?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../Registration.php?error=faild");
        exit();
    }


    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    $approval = 'new';
    mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $email, $mobile, $hashedpwd, $approval);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    header("Location: ../Log-in.php?success");
}


