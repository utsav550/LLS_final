<?php

$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["emp_id"];

require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$docupdate = 0;

//--------------------------------------------------------------------check personal info 
$sql = "SELECT * FROM `personal information` WHERE emp_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $empid);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultdata)) {
    $personalinformation = 1;
} else {
    $personalinformation = 0;
    $notifycode = 19;
    
    $notification = "Plase upload your Personal information! ";
    $notificationdate = date("Y/m/d");
    $docupdate++;
    $sql = "SELECT * FROM `notify`  WHERE emp_id = ? && notifycode = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("../index.php?error=notready");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $empid, $notifycode);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
    } else {
        $sql = "INSERT INTO `notify`(`admin_id`, `emp_id`, `notify_date`, `msg`, `notifycode`) VALUES (?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location:../index.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $admin, $empid, $notificationdate, $notification, $notifycode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

//--------------------------------------------------------------------check bank info 
$sql = "SELECT * FROM `bank_details` WHERE emp_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $empid);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultdata)) {
    $bankinfo = 1;
} else {
    $bankinfo = 0;
    $docupdate++;
    $notifycode = 3;
    
    $notification = "Plase upload your bank information! ";
    $notificationdate = date("Y/m/d");
   
    $sql = "SELECT * FROM `notify`  WHERE emp_id = ? && notifycode = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("../index.php?error=notready");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $empid, $notifycode);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
    } else {
        $sql = "INSERT INTO `notify`(`admin_id`, `emp_id`, `notify_date`, `msg`, `notifycode`) VALUES (?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location:../index.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $admin, $empid, $notificationdate, $notification, $notifycode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

//--------------------------------------------------------------------check super info 
$sql = "SELECT * FROM `super_info` WHERE emp_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $empid);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultdata)) {
    $superinfo = 1;
} else {
    $superinfo = 0;
    $docupdate++;
    $notifycode = 3;
    
    $notification = "Plase upload your superannuation information! ";
    $notificationdate = date("Y/m/d");
   
    $sql = "SELECT * FROM `notify`  WHERE emp_id = ? && notifycode = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("../index.php?error=notready");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $empid, $notifycode);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
    } else {
        $sql = "INSERT INTO `notify`(`admin_id`, `emp_id`, `notify_date`, `msg`, `notifycode`) VALUES (?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location:../index.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $admin, $empid, $notificationdate, $notification, $notifycode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

//--------------------------------------------------------------------check visa info 
$sql = "SELECT * FROM `visa_info` WHERE emp_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $empid);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultdata)) {
    $visainfo = 1;
} else {
    $visainfo = 0;
  
    $notifycode = 4;
    
    $notification = "Plase upload your visa information! ";
    $notificationdate = date("Y/m/d");
    $docupdate++;
    $sql = "SELECT * FROM `notify`  WHERE emp_id = ? && notifycode = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("../index.php?error=notready");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $empid, $notifycode);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
    } else {
        $sql = "INSERT INTO `notify`(`admin_id`, `emp_id`, `notify_date`, `msg`, `notifycode`) VALUES (?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location:../index.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $admin, $empid, $notificationdate, $notification, $notifycode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}



//--------------------------------------------------------------------check documents
$passpath = "../upload/" . (string)$empid . "pass.pdf";
$passfile = file_exists($passpath);

if ($passfile != 1) {
    $notifycode = 5;
    $docupdate++;
    $notification = "Plase upload your Passport copy! ";
    $notificationdate = date("Y/m/d");
    $admin = 1;
    $sql = "SELECT * FROM `notify`  WHERE emp_id = ? AND notifycode = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        
        header("../index.php?error=notready");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $empid, $notifycode);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
    } else {
        $sql = "INSERT INTO `notify`(`admin_id`, `emp_id`, `notify_date`, `msg`, `notifycode`) VALUES (?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location:../index.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $admin, $empid, $notificationdate, $notification, $notifycode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

$visapath = "../upload/" . (string)$empid . "visa.pdf";
$visafile = file_exists($visapath);

if (empty($visafile)) {
    $notifycode = 6;
    $docupdate++;
    $notification = "Plase upload your visa copy! ";
    $notificationdate = date("Y/m/d");
    $admin = 1;
    $sql = "SELECT * FROM `notify`  WHERE emp_id = ? && notifycode = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("../index.php?error=notready");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $empid, $notifycode);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultdata)) {
    } else {
        $sql = "INSERT INTO `notify`(`admin_id`, `emp_id`, `notify_date`, `msg`, `notifycode`) VALUES (?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location:../index.php");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $admin, $empid, $notificationdate, $notification, $notifycode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

//--------------------------------------------------------------------update register
$sql = "SELECT * FROM `register`  WHERE emp_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $empid);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($resultdata)) {
    if ( $personalinformation == 1 || $visainfo == 1 || $superinfo == 1 || $bankinfo == 1 || $visafile == 1 || $passfile == 1){
        $approvel = "pending";
       if( $row['approval'] == "new")
       {
        $sql = "UPDATE `register` SET approval= ? WHERE `emp_id` = $empid";
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location:../index.php");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "s", $approvel);
        mysqli_stmt_execute($stmt);
    }

       
}
}
