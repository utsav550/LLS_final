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
                $sql = "UPDATE `register` SET `job_ready`= (?) where `emp_id` = $selected[$i]";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location:../index.php?her");



                exit();
            }

            $status = "not";

            mysqli_stmt_bind_param($stmt, "s", $date,);
            mysqli_stmt_execute($stmt);
                
                echo $selected[$i], $job, $farm, $date, $time;
                echo '</br>';

                $i++;
            }
            $emplist = serialize($selected);
            

              // ------------------------------------------------------------------Arryyy
            $sql = "INSERT INTO `job_decision`(`datejob`, `job_info`, `time`, `arr_empid`) VALUES (?,?,?,?)";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location:../index.php?her");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "ssss", $date, $jbinfo, $time,  $emplist);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
            
            

            $jbemp= unserialize($emplist);
            $cary = count($jbemp);
            for($k=0;$k<$cary;$k++){
                $sql12 = "SELECT * FROM `register` WHERE `emp_id`= ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql12)) {
                    exit();
                  header("Location:../index.php?here");
                  exit();
                }
                mysqli_stmt_bind_param($stmt, "s", $jbemp[$k]);
                mysqli_stmt_execute($stmt);
                $resultdata = mysqli_stmt_get_result($stmt);
                $countt = mysqli_num_rows($resultdata);
                if ($countt == 0) {
                  echo '<h3>Not Enough Employees For Job</h3>';
                } else {
                    $row = mysqli_fetch_assoc($resultdata);
                    $mobile[$k] = '+61'. $row["mobile"];
                    $email[$k] = $row["email"];
                }}
/*-----------------------------------------------------------------------------------------------------------------------------*/
                $sql = "SELECT * FROM `job_info` WHERE `job_info` =? ";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  header("Location:../index.php");
                  exit();
                }
                mysqli_stmt_bind_param($stmt, "s", $jbinfo);
                mysqli_stmt_execute($stmt);
                $resultdata = mysqli_stmt_get_result($stmt);
                $countt = mysqli_num_rows($resultdata);
                if ($countt == 0) {
                  echo '<h3>Not Enough Employees For Job</h3>';
                } else {$row = mysqli_fetch_assoc($resultdata);
                    $farmn =  $row["farm_name"];
                    $loc =  $row["job_location"];
                    $rate =  $row["pay_rate"];
                    $paybase =  $row["pay_base"];
                    $jbname =  $row["name"];
                }}

                echo $farmn;
                echo $loc;
                echo $rate;
                echo $paybase;
            echo $jbname;
           
            echo $time;
            echo $date;
/*
            $msg = "
            <p>Job for Tommorrow</p>
            <p>'. $date.' </p>
            <p>'. $farm &nbsp.' $loc </p>
            <P> '.$time.' </p>
            <p> '.$jbname.'</p>

            ";
            $z = count($mobile);
            $numberstring = "";
            for($i=0;$i<$z;$i++){
                $buff = $mobile[$i];
                $numberstring = $numberstring.$buff;
             } echo $numberstring;
              
             $repeate = count($email);
             for($i=0; $i<$repeate;$i++){

                mail($email[$i],$date,$msg);
             }

*/


               
	// Account details
	$apiKey = urlencode('YWIyODgzYzJiYTNkMTQ3YTczZWI4NDY5OGZiZGJmOTY=');
	
	// Message details
	$numbers = array($numberstring );
	$sender = urlencode('Jims Autos');
	$message = rawurlencode($jbname);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
    header("Location: ../managejobs.php?msgsuccess");
            }
        }
?>
