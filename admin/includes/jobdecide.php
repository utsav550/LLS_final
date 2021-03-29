<?php
require_once '../../includes/dbh.inc.php';
require_once '../../includes/functions.inc.php';
if (isset($_POST['submit'])) { //to run PHP script on submit
    $job = $_POST["job"];
    $farm = $_POST["farm"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $sql = "SELECT * FROM `job_info` WHERE `name` =? AND `farm_name`= ?";
    echo $job, $farm;

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../index.php");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $job, $farm);
    mysqli_stmt_execute($stmt);
    $resultdata = mysqli_stmt_get_result($stmt);
    $countt = mysqli_num_rows($resultdata);
    if ($countt == 0) {
        echo '<h3>Not Enough Employees For Job</h3>';
    } else {
        for ($i = 1; $i <= $countt; $i++) {
            $row = mysqli_fetch_assoc($resultdata);
            $jbinfo =  $row["job_info"];
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


        if (!empty($_POST['check_list'])) {
            $i = 0;
            foreach ($_POST['check_list'] as $selected[$i]) {


                echo $selected[$i], $job, $farm, $date, $time;
                echo '</br>';

                $i++;
            }
            $emplist = serialize($selected);

            $member = unserialize($emplist);  // ------------------------------------------------------------------Arryyy
            $sql = "INSERT INTO `job_decision`(`datejob`, `job_info`, `time`, `arr_empid`) VALUES (?,?,?,?)";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location:../index.php?her");



                exit();
            }



            mysqli_stmt_bind_param($stmt, "ssss", $date, $jbinfo, $time,  $emplist);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
            header("Location:../managejobs.php?msg=addes");
        }
    }
}
