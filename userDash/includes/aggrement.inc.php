<?php
 
 
if (isset($_POST['healthaggree'])) {
        session_start();
        
    $username = $_SESSION["fname"];
    $email = $_SESSION["email"];
    $empid = $_SESSION["emp_id"];
    $agree = true;
    $date =date("Y/m/d");
    if (empty($username)) {
        header("Location:../index.php");
    }
    require_once '../../includes/dbh.inc.php';
    require_once '../../includes/functions.inc.php';
    $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("../index.php?error=exist");
        exit();
        echo 'here1';
    }
    echo 'here1f';
    mysqli_stmt_bind_param($stmt, "s", $empid);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)){
        $sql = "UPDATE `agreement` SET Health_Safety = ?";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "s",  $agree);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=piece");
         
    }

else{
    $sql = "INSERT INTO `agreement`(`emp_id`,`Health_Safety`,`Agg_date`) VALUES (?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $empid, $agree,$date);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=piece");
}
}
        //-----------------------------------------------------------------------------Fairwork
if (isset($_POST['agreefair'])) {
            session_start();
            
            $username = $_SESSION["fname"];
            $email = $_SESSION["email"];
            $empid = $_SESSION["emp_id"];
            $agree = true;
            $date =date("Y/m/d");
            if (empty($username)) {
                header("Location:../index.php");
            }
            require_once '../../includes/dbh.inc.php';
            require_once '../../includes/functions.inc.php';
            $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                 header("../index.php?error=exist");
                exit();
                echo 'here1';
            }
            echo 'here1f';
            mysqli_stmt_bind_param($stmt, "s", $empid);
            mysqli_stmt_execute($stmt);
            $resultdata = mysqli_stmt_get_result($stmt);
        
            if($row = mysqli_fetch_assoc($resultdata)){
                $sql = "UPDATE `agreement` SET Fair_work = ?";
    
                $stmt = mysqli_stmt_init($conn);
    
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                     header("Location:../index.php");
                     exit();
                }
                mysqli_stmt_bind_param($stmt, "s",  $agree);
                mysqli_stmt_execute($stmt);
                header("Location:../aggrement.php?msg=fair");
                 
            }
        
        else{
            $sql = "INSERT INTO `agreement`(`emp_id`,`Fair_work`) VALUES (?,?)";
    
                $stmt = mysqli_stmt_init($conn);
    
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                     header("Location:../index.php");
                     exit();
                }
                mysqli_stmt_bind_param($stmt, "ss", $empid, $agree);
                mysqli_stmt_execute($stmt);
                header("Location:../aggrement.php?msg=fair");
        }
    }
    if (isset($_POST['hyg'])) {
        session_start();
        
        $username = $_SESSION["fname"];
        $email = $_SESSION["email"];
        $empid = $_SESSION["emp_id"];
        $agree = true;
        $date =date("Y/m/d");
        if (empty($username)) {
            header("Location:../index.php");
        }
        require_once '../../includes/dbh.inc.php';
        require_once '../../includes/functions.inc.php';
        $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("../index.php?error=exist");
            exit();
            echo 'here1';
        }
        echo 'here1f';
        mysqli_stmt_bind_param($stmt, "s", $empid);
        mysqli_stmt_execute($stmt);
        $resultdata = mysqli_stmt_get_result($stmt);
    
        if($row = mysqli_fetch_assoc($resultdata)){
            $sql = "UPDATE `agreement` SET Hygiene_Rule = ?";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                 header("Location:../index.php");
                 exit();
            }
            mysqli_stmt_bind_param($stmt, "s",  $agree);
            mysqli_stmt_execute($stmt);
            header("Location:../aggrement.php?msg=fair");
             
        }
    
    else{
        $sql = "INSERT INTO `agreement`(`emp_id`,`Hygiene_Rule`,`Agg_date`) VALUES (?,?,?)";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                 header("Location:../index.php");
                 exit();
            }
            mysqli_stmt_bind_param($stmt, "sss", $empid, $agree,$date);
            mysqli_stmt_execute($stmt);
            header("Location:../aggrement.php?msg=fair");
    }
}
//---------------------------------------------------------company agg
if (isset($_POST['cmp'])) {
    session_start();
    
    $username = $_SESSION["fname"];
    $email = $_SESSION["email"];
    $empid = $_SESSION["emp_id"];
    $agree = true;
    $date =date("Y/m/d");
    if (empty($username)) {
        header("Location:../index.php");
    }
    require_once '../../includes/dbh.inc.php';
    require_once '../../includes/functions.inc.php';
    $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("../index.php?error=exist");
        exit();
        echo 'here1';
    }
    echo 'here1f';
    mysqli_stmt_bind_param($stmt, "s", $empid);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)){
        $sql = "UPDATE agreement SET Company_aggreement = ?";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "s",  $agree);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=fair");
         
    }

else{
    $sql = "INSERT INTO `agreement`(`emp_id`,`Company_aggreement`,`Agg_date`) VALUES (?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $empid, $agree,$date);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=fair");
}
}

//------------------------------------------------------------------------------------piece work
if (isset($_POST['piece'])) {
    session_start();
    
    $username = $_SESSION["fname"];
    $email = $_SESSION["email"];
    $empid = $_SESSION["emp_id"];
    $agree = true;
    $date =date("Y/m/d");
    if (empty($username)) {
        header("Location:../index.php");
    }
    require_once '../../includes/dbh.inc.php';
    require_once '../../includes/functions.inc.php';
    $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("../index.php?error=exist");
        exit();
        echo 'here1';
    }
    echo 'here1f';
    mysqli_stmt_bind_param($stmt, "s", $empid);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)){
        $sql = "UPDATE `agreement` SET Piecework_aggreement = ?";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "s",  $agree);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=piece");
         
    }

else{
    $sql = "INSERT INTO `agreement`(`emp_id`,`Piecework_aggreement`,`Agg_date`) VALUES (?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $empid, $agree,$date);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=piece");
}
}

//--------------------------------------------------------------------------------------------important consider
if (isset($_POST['imp'])) {
    session_start();
    
    $username = $_SESSION["fname"];
    $email = $_SESSION["email"];
    $empid = $_SESSION["emp_id"];
    $agree = true;
    $date =date("Y/m/d");
    if (empty($username)) {
        header("Location:../index.php");
    }
    require_once '../../includes/dbh.inc.php';
    require_once '../../includes/functions.inc.php';
    $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("../index.php?error=exist");
        exit();
        echo 'here1';
    }
    echo 'here1f';
    mysqli_stmt_bind_param($stmt, "s", $empid);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)){
        $sql = "UPDATE `agreement` SET important_consideration = ?";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "s",  $agree);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=imp");
         
    }

else{
    $sql = "INSERT INTO `agreement`(`emp_id`,`important_consideration`,`Agg_date`) VALUES (?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $empid, $agree,$date);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=imp");
}
}
if (isset($_POST['cmp'])) {
    session_start();
    
    $username = $_SESSION["fname"];
    $email = $_SESSION["email"];
    $empid = $_SESSION["emp_id"];
    $agree = true;
    $date =date("Y/m/d");
    if (empty($username)) {
        header("Location:../index.php");
    }
    require_once '../../includes/dbh.inc.php';
    require_once '../../includes/functions.inc.php';
    $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("../index.php?error=exist");
        exit();
        echo 'here1';
    }
    echo 'here1f';
    mysqli_stmt_bind_param($stmt, "s", $empid);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)){
        $sql = "UPDATE `agreement` SET Company_aggreement = ?";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "s",  $agree);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=fair");
         
    }

else{
    $sql = "INSERT INTO `agreement`(`emp_id`,`Company_aggreement`,`Agg_date`) VALUES (?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location:../index.php");
             exit();
        }
        mysqli_stmt_bind_param($stmt, "sss", $empid, $agree,$date);
        mysqli_stmt_execute($stmt);
        header("Location:../aggrement.php?msg=fair");
}
}
