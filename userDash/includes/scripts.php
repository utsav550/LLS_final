  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php
    //  add admin data

    $connection = mysqli_connect("localhost", "root", "", "lls");

    if (isset($_POST['registerbtn'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirmpassword'];

        if ($password === $confirm_password) {
            $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                echo "done";
                $_SESSION['success'] =  "Admin is Added Successfully";
                header('Location: register.php');
            } else {
                echo "not done";
                $_SESSION['status'] =  "Admin is Not Added";
                header('Location: register.php');
            }
        } else {
            echo "pass no match";
            $_SESSION['status'] =  "Password and Confirm Password Does not Match";
            header('Location: register.php');
        }
    }

    if (isset($_POST['addpi'])) {
        session_start();
        $username = $_SESSION["fname"];
        $email = $_SESSION["email"];
        $empid = $_SESSION["emp_id"];
        if (empty($username)) {

            header("Location:../index.php");
        }
        $commdate = $_POST["commdate"];
        $gender = $_POST["gender"];
        $tfn = $_POST["tfn"];
        $dob = $_POST["dob"];
        $address = $_POST["address"];
        $sub = $_POST["sub"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];

        if (empty($commdate) || empty($gender) || empty($tfn) || empty($dob) || empty($address) || empty($sub) || empty($state) || empty($zip)) {
            header("Location: ../index.php?error=empty");
        } else {


            require_once '../../includes/dbh.inc.php';
            require_once '../../includes/functions.inc.php';

            $sql = "SELECT * FROM `personal information` WHERE emp_id = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("../index.php?error=exist");
                exit();
            }
            mysqli_stmt_bind_param($stmt, "s", $empid);
            mysqli_stmt_execute($stmt);

            $resultdata = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($resultdata)) {

                header("Location: ../index.php?error=exist");
            } else {




                $sql = "INSERT INTO `personal information` (`emp_id`, `commencement_date`, `Gender`, `DOB`, `Address`, `Suburb`, `State`, `Postcode`, `TFN`, `Date_of_employment`, `job`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {

                    header("Location:../index.php");



                    exit();
                }

                $emt = '';
                $notifycode =1;
                mysqli_stmt_bind_param($stmt, "sssssssssss", $empid, $commdate, $gender,  $dob, $address, $sub, $state, $zip, $tfn, $emt, $emt);
                mysqli_stmt_execute($stmt);
                $sql2 = "DELETE FROM `notify` WHERE `emp_id` = '$empid' AND `notifycode` = '$notifycode'";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql2);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                
                header("Location:../index.php?msg=pisaved");
            }
        }
    }

    if (isset($_POST['addbi'])) {
        session_start();
        $username = $_SESSION["fname"];
        $email = $_SESSION["email"];
        $empid = $_SESSION["emp_id"];
        if (empty($username)) {

            header("Location:../index.php");
        }
        $acname = $_POST["acname"];
        $bsb = $_POST["bsb"];
        $acn = $_POST["acn"];

        $ac = $_POST["ac"];

        if (empty($acname) || empty($bsb) || empty($acn)) {
            header("Location: ../index.php?error=empty");
        } else
            $pp = "weekly";
        $pd = "friday";

        require_once '../../includes/dbh.inc.php';
        require_once '../../includes/functions.inc.php';

        $sql = "SELECT * FROM `bank_details` WHERE emp_id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("../index.php?error=exist");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $empid);
        mysqli_stmt_execute($stmt);

        $resultdata = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($resultdata)) {

            header("Location: ../index.php?error=exist");
        } else {




            $sql = "INSERT INTO `bank_details` (`emp_id`, `Account_name`, `BSB`, `Account_number`, `Australian_citizen`, `Method_pay`, `pay_period`) VALUES (?,?,?,?,?,?,?)";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("Location:../index.php");



                exit();
            }



            mysqli_stmt_bind_param($stmt, "sssssss", $empid, $acname, $bsb,  $acn, $ac, $pd, $pp);
            mysqli_stmt_execute($stmt);
            $notifycode =3;
            
            $sql2 = "DELETE FROM `notify` WHERE `emp_id` = '$empid' AND `notifycode` = '$notifycode'";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql2);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("Location:../index.php?msg=bisaved");
        }
    }
    if (isset($_POST['addsi'])) {
        session_start();
        $username = $_SESSION["fname"];
        $email = $_SESSION["email"];
        $empid = $_SESSION["emp_id"];
        if (empty($username)) {

            header("Location:../index.php");
        }
        $smn = $_POST["smn"];
        $fundname = $_POST["fundname"];
        $pn = $_POST["pn"];
        $ein = $_POST["ein"];
        $eacn = $_POST["eacn"];
        $usid = $_POST["usid"];
        $FABN = $_POST["FABN"];
        $address = $_POST["address"];
        $sub = $_POST["sub"];
        $state = $_POST["State"];
        $zip = $_POST["zip"];
        $phone = $_POST["phone"];

        if (empty($smn) || empty($fundname) || empty($pn) || empty($phone) || empty($ein) || empty($eacn) || empty($usid) || empty($FABN) || empty($address) || empty($sub) || empty($state) || empty($zip)) {
            header("Location: ../index.php?error=empty");
            echo    'here12345';
        } else {


            require_once '../../includes/dbh.inc.php';
            require_once '../../includes/functions.inc.php';

            $sql = "SELECT * FROM `super_info` WHERE emp_id = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("../index.php?error=exist");
                exit();
                echo 'here1';
            }
            mysqli_stmt_bind_param($stmt, "s", $empid);
            mysqli_stmt_execute($stmt);

            $resultdata = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($resultdata)) {
                echo 'here12';
                header("Location: ../index.php?error=exist");
            } else {


                echo 'here123';

                $sql = "INSERT INTO `super_info` (`sup_member_num`, `emp_id`, `fund_name`, `policy_number`, `emp_id_number`, `fund_abn`, `fund_address`, `suburb`, `state`, `postcode`, `fund_phone`, `unique_super_id`, `account_name`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {

                    header("Location:../index.php");



                    exit();
                }



                mysqli_stmt_bind_param($stmt, "sssssssssssss", $smn, $empid, $fundname, $pn, $ein, $FABN, $address, $sub, $state, $zip, $phone, $usid, $eacn);
                mysqli_stmt_execute($stmt);
                $notifycode =4;
                    
                $sql2 = "DELETE FROM `notify` WHERE `emp_id` = '$empid' AND `notifycode` = '$notifycode'";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql2);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("Location:../index.php?msg=sisaved");
            }
        }
    }
    if (isset($_POST['addvi'])) {
        session_start();
        $username = $_SESSION["fname"];
        $email = $_SESSION["email"];
        $empid = $_SESSION["emp_id"];
        if (empty($username)) {
            header("Location:../index.php");
        }
        $ac = $_POST["ac"];
        $apr = $_POST["apr"];
        $pn = $_POST["pn"];
        $country = $_POST["country"];
        $wp = $_POST["wp"];
        $type = $_POST["type"];
        $subclass = $_POST["subclass"];
        $grantnumber = $_POST["grantnumber"];
        $duration = $_POST["duration"];

        $exdate = $_POST["exdate"];
        $hours = $_POST["hours"]; {


            require_once '../../includes/dbh.inc.php';
            require_once '../../includes/functions.inc.php';

            $sql = "SELECT * FROM `visa_info` WHERE emp_id = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {

                header("../index.php?error=exists");
                exit();
                echo 'here1';
            }
            mysqli_stmt_bind_param($stmt, "s", $empid);
            mysqli_stmt_execute($stmt);

            $resultdata = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($resultdata)) {
                echo 'here12';
                header("Location: ../index.php?error=exist");
            } else {


                echo 'here123';

                $sql = "INSERT INTO `visa_info`(`emp_id`, `Australian_citizen`, `Australian_PR`, `Passport_num`, `Country_issue`, `Working_visa`, `visa_type`, `sub_class`, `visa_grant_number`, `Expiry_date`, `Course_duration`, `Hours_of_work`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {

                    header("Location:../index.php");



                    exit();
                }



                mysqli_stmt_bind_param($stmt, "ssssssssssss", $empid, $ac, $apr, $pn, $country, $wp, $type, $subclass, $grantnumber, $exdate, $duration, $hours);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                $notifycode =4;
                    
                $sql2 = "DELETE FROM `notify` WHERE `emp_id` = '$empid' AND `notifycode` = '$notifycode'";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql2);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("Location:../index.php?msg=sisaved");
                header("Location:../index.php?msg=sisaved");
            }
        }
    }

    if (isset($_POST['pass'])) {
        session_start();
        require_once '../../includes/dbh.inc.php';
            require_once '../../includes/functions.inc.php';
        $username = $_SESSION["fname"];
        $email = $_SESSION["email"];
        $empid = $_SESSION["emp_id"];
        if (empty($username)) {
            header("Location:../index.php");
        }
        // file name
        $filename = $_FILES['file']['name'];

        // Location
        $location = '../../upload/' . $filename;

        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        $filenewname = (string)$empid .= "pass" . "." . $file_extension;
        $newloaction = '../../upload/' . $filenewname;
        // Valid image extensions
        $image_ext = array("jpg", "png", "jpeg", "pdf");
        $notifycode = 5;
        $response = 0;
        if (in_array($file_extension, $image_ext)) {
            // Upload file
            if (move_uploaded_file($_FILES['file']['tmp_name'], $newloaction)) {
                $response = $location;
                $sql1 = "DELETE FROM `notify` WHERE `emp_id` = '$empid' AND `notifycode` = '$notifycode'";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql1);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("Location:../index.php?msg=passportuploaded");

            }
        }
        header("Location:../index.php?msg=passportuploaded");
    }

    if (isset($_POST['visa'])) {
        session_start();
        require_once '../../includes/dbh.inc.php';
            require_once '../../includes/functions.inc.php';
        $username = $_SESSION["fname"];
        $email = $_SESSION["email"];
        $empid = $_SESSION["emp_id"];
        if (empty($username)) {
            header("Location:../index.php");
        }
        // file name
        $filename = $_FILES['file']['name'];

        // Location
        $location = '../../upload/' . $filename;

        // file extension
        $image_ext = "pdf";
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        $filenewname = (string)$empid .= "visa" . "." . $file_extension;
        $newloaction = '../../upload/' . $filenewname;
        // Valid image extensions
        $notifycode = 6;
        if ($file_extension == $image_ext) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $newloaction)) {
                $response = $location;
                $sql2 = "DELETE FROM `notify` WHERE `emp_id` = '$empid' AND `notifycode` = '$notifycode'";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql2);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                header("Location:../index.php?msg=passportuploaded");

            }
        } else {

            header("Location:../index.php?error=passportnotuploaded");
        }
    }
    ?>