<?php
include('includes/header.php');
include('includes/navbar.php');

if (isset($_GET["id"])) {

    $jempid = $_GET["id"];

    echo $jempid;
}
$Account_name = $BSB = $Account_number = $pay_period =  "No information  Available";
$Australian_citizen = $Australian_PR  = $Passport_num = $Country_issue = $Working_visa = $visa_type = $sub_class = $visa_grant_number = $Expiry_date = $Hours_of_work =  "No information  Available";
$commdate = $gender = $dob = $address = $sub = $state = $postcode = $tfn  = "No information  Available";
$sup_member_num = $fund_name  = $policy_number = $emp_id_number = $fund_abn = $fund_address = $ssuburb = $sstate = $spostcode = $fund_phone = $unique_super_id = $account_name = $member =  "No information  Available";
$sql = "SELECT * FROM `register` WHERE emp_id = ?;";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

    header("../index.php?error=notready");
    exit();
}
mysqli_stmt_bind_param($stmt, "s", $jempid);
mysqli_stmt_execute($stmt);

$resultdata = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($resultdata);
$empid = $row["emp_id"];
$fname = $row["fname"];
$lname =  $row["lname"];
$email = $row["email"];
$mobile = $row["mobile"];
$status = $row["approval"];
$rgdate = $row["reg_date"];









?>
<link href="css/jobapp.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container bootdey flex-grow-1 container-p-y">

    <div class="media align-items-center py-3 mb-3">
        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-100 rounded-circle">
        <div class="media-body ml-4">
            <h4 class="font-weight-bold mb-0"><?php echo $fname . "  " . $lname  ?> <span class="text-muted font-weight-normal">@LLS</span></h4>
            <div class="text-muted mb-2">ID: <?php echo $empid; ?></div>


        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <table class="table user-view-table m-0">
                <tbody>
                    <tr>
                        <td>Registered:</td>
                        <td><?php echo $rgdate; ?></td>

                    </tr>
                    <?php
                    $passpath = "../upload/" . (string)$empid . "pass.pdf";
                    $passfile = file_exists($passpath);
                    $visapath = "../upload/" . (string)$empid . "visa.pdf";
                    $visafile = file_exists($visapath);

                    ?>
                    <tr>
                        <td>Passport Copy:</td>
                        <?php if (empty($passfile)) {
                            echo ' <td><span class="fa fa-times text-light"></span>&nbsp; No</td>';
                        } else {
                            echo '<td><span class="fa fa-check text-primary"></span>&nbsp; Yes</td>';
                        }

                        ?>
                        <embed src="<?php echo $passpath; ?>" type="application/pdf" width="50%" height="500px">
                        <embed src="<?php echo $passpath; ?>" type="application/pdf" width="50%" height="500px">

                    </tr>
                    <tr>
                        <td>Visa Copy:</td>
                        <?php if (empty($visafile)) {
                            echo ' <td><span class="fa fa-times text-light"></span>&nbsp; No</td>';
                        } else {
                            echo '<td><span class="fa fa-check text-primary"></span>&nbsp; Yes</td>';
                        }
                        ?>

                    </tr>
                    <tr>
                        <td>Role:</td>
                        <td>Employee</td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td><span class="badge badge-outline-success"><?php echo $status; ?></span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="border-light m-0">
        <div class="table-responsive">
            <table class="table card-table m-0" style="float: left;">
                <tbody>
                    <tr>
                        <th>Information Check List</th>
                        <th>Personal Information</th>
                        <th>Bank Details</th>
                        <th>Superannuation Details</th>
                        <th>Visa Details</th>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <?php
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
                            $commdate =  $row["commencement_date"];
                            $gender =  $row["Gender"];
                            $dob =  $row["DOB"];
                            $address =  $row["Address"];
                            $sub =  $row["Suburb"];
                            $state =  $row["State"];
                            $postcode =  $row["Postcode"];
                            $tfn =  $row["TFN"];
                            echo '<td><span class="fa fa-check text-primary"></span></td>';
                        } else {
                            echo '<td><span class="fa fa-times text-light"></span></td>';
                        }

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
                            $Account_name =  $row["Account_name"];
                            $BSB =  $row["BSB"];

                            $Account_number =  $row["Account_number"];
                            $pay_period =  $row["pay_period"];

                            echo '<td><span class="fa fa-check text-primary"></span></td>';
                        } else {
                            echo '<td><span class="fa fa-times text-light"></span></td>';
                        }
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
                            $Australian_citizen = $row["Australian_citizen"];
                            $Australian_PR  = $row["Australian_PR"];
                            $Passport_num = $row["Passport_num"];
                            $Country_issue = $row["Country_issue"];
                            $Working_visa = $row["Working_visa"];
                            $visa_type = $row["visa_type"];
                            $sub_class = $row["sub_class"];
                            $visa_grant_number = $row["visa_grant_number"];
                            $Expiry_date = $row["Expiry_date"];
                            $Hours_of_work = $row["Hours_of_work"];

                            echo '<td><span class="fa fa-check text-primary"></span></td>';
                        } else {
                            echo '<td><span class="fa fa-times text-light"></span></td>';
                        }
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
                            $sup_member_num = $row["sup_member_num"];
                            $fund_name  = $row["fund_name"];
                            $policy_number = $row["policy_number"];
                            $emp_id_number = $row["emp_id_number"];
                            $fund_abn = $row["fund_abn"];
                            $fund_address = $row["fund_address"];
                            $ssuburb = $row["suburb"];
                            $sstate = $row["state"];
                            $spostcode = $row["postcode"];
                            $fund_phone = $row["fund_phone"];
                            $unique_super_id = $row["unique_super_id"];
                            $account_name = $row["account_name"];
                            $member = $row["member"];
                            echo '<td><span class="fa fa-check text-primary"></span></td>';
                        } else {
                            echo '<td><span class="fa fa-times text-light"></span></td>';
                        }
                        ?>




                    </tr>

                </tbody>
            </table>
            <hr class="border-light m-0">
            <div class="table-responsive">
                <table class="table card-table m-0">
                    <tbody>
                        <tr>
                            <th>Agreement Check List</th>
                            <th>Health Safety</th>
                            <th>Fair work</th>
                            <th>Hygiene Rule</th>
                            <th>Company aggreement</th>
                            <th>Piecework aggreement</th>
                            <th>Important consideration</th>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <?php
                            $sql = "SELECT * FROM `agreement` WHERE emp_id = ?;";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {

                                header("../index.php?error=notready");
                                exit();
                            }
                            mysqli_stmt_bind_param($stmt, "s", $empid);
                            mysqli_stmt_execute($stmt);
                            $resultdata = mysqli_stmt_get_result($stmt);
                            if ($row = mysqli_fetch_assoc($resultdata)) {


                                $health = $row["Health_Safety"];
                                $fairwork = $row["Fair_work"];
                                $hygine = $row["Hygiene_Rule"];
                                $compnayagg = $row["Company_aggreement"];
                                $piecework = $row["Piecework_aggreement"];
                                $important = $row["important_consideration"];

                                if ($health != null) {

                                    echo '<td><span class="fa fa-check text-primary"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times text-light"></span></td>';
                                }
                                if ($fairwork != null) {

                                    echo '<td><span class="fa fa-check text-primary"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times text-light"></span></td>';
                                }
                                if ($hygine != null) {

                                    echo '<td><span class="fa fa-check text-primary"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times text-light"></span></td>';
                                }
                                if ($compnayagg != null) {

                                    echo '<td><span class="fa fa-check text-primary"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times text-light"></span></td>';
                                }
                                if ($piecework != null) {

                                    echo '<td><span class="fa fa-check text-primary"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times text-light"></span></td>';
                                }
                                if ($important != null) {

                                    echo '<td><span class="fa fa-check text-primary"></span></td>';
                                } else {
                                    echo '<td><span class="fa fa-times text-light"></span></td>';
                                }
                            } else {
                                echo '<td><span class="fa fa-times text-light"></span></td>';
                                echo '<td><span class="fa fa-times text-light"></span></td>';
                                echo '<td><span class="fa fa-times text-light"></span></td>';
                                echo '<td><span class="fa fa-times text-light"></span></td>';
                                echo '<td><span class="fa fa-times text-light"></span></td>';
                                echo '<td><span class="fa fa-times text-light"></span></td>';
                            }

                            ?>



                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <h6 class="mt-4 mb-4"><b>Basic info</b></h6>
                <table class="table user-view-table m-0">
                    <tbody>
                        <tr>
                            <td>Frist Name:</td>
                            <td><?php echo $fname ?></td>
                        </tr>
                        <tr>
                            <td> Last Name:</td>
                            <td><?php echo $lname ?></td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td><?php echo $email ?></td>
                        </tr>
                        <tr>
                            <td>Mobile:</td>
                            <td> <?php echo $mobile ?></td>
                        </tr>
                    </tbody>
                </table>
                <h6 class="mt-4 mb-4"><b>Bank info</b></h6>
                <table class="table user-view-table m-0">
                    <tbody>
                        <tr>
                            <td>Account Name:</td>
                            <td><?php echo $Account_name ?></td>
                        </tr>
                        <tr>
                            <td> BSB:</td>
                            <td><?php echo $BSB ?></td>
                        </tr>
                        <tr>
                            <td>Account Number:</td>
                            <td><?php echo $Account_number ?></td>
                        </tr>
                        <tr>
                            <td>Pay Period</td>
                            <td> <?php echo $pay_period ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="column">
                <h6 class="mt-4 mb-4"><b>Personal info</b></h6>

                <table class="table user-view-table m-0">

                    <tbody>
                        <tr>
                            <td>Commencement Date:</td>
                            <td><?php echo $commdate ?></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td><?php echo $gender ?></td>
                        </tr>
                        <tr>
                            <td>Birthday:</td>
                            <td><?php echo $dob ?></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo $address ?></td>
                        </tr>
                        <tr>
                            <td>Suburb:</td>
                            <td><?php echo $sub ?></td>
                        </tr>
                        <tr>
                            <td>State:</td>
                            <td><?php echo $state ?></td>
                        </tr>
                        <tr>
                            <td>Postcode:</td>
                            <td><?php echo $postcode ?></td>
                        </tr>
                        <tr>
                            <td>TFN:</td>
                            <td><?php echo $tfn ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="column">

                <h6 class="mt-4 mb-4"><b>visa info</b></h6>
                <table class="table user-view-table m-0">
                    <tbody>
                        <tr>
                            <td>Australian Citizen</td>
                            <td><?php echo $Australian_citizen ?></td>
                        </tr>
                        <tr>
                            <td> Australian PR</td>
                            <td><?php echo $Australian_PR ?></td>
                        </tr>
                        <tr>
                            <td>Passport Number:</td>
                            <td><?php echo $Passport_num ?></td>
                        </tr>
                        <tr>
                            <td>Country Of Issued:</td>
                            <td> <?php echo $Country_issue ?></td>
                        </tr>
                        <tr>
                            <td>Working Visa</td>
                            <td style="color: red;"><?php echo $Working_visa ?></td>
                        </tr>
                        <tr>
                            <td> Visa type</td>
                            <td style="color: red;"><?php echo $visa_type ?></td>
                        </tr>
                        <tr>
                            <td>Sub Class</td>
                            <td><?php echo $sub_class ?></td>
                        </tr>
                        <tr>
                            <td>Visa grant Number</td>
                            <td> <?php echo $visa_grant_number ?></td>
                        </tr>
                        <tr>
                            <td>Expiry Date</td>
                            <td><?php echo $Expiry_date ?></td>
                        </tr>
                        <tr>
                            <td> Hours of Work permited</td>
                            <td style="color:red;"> <?php echo $Hours_of_work ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="column">
                <h6 class="mt-4 mb-4"><b>Superannuation info</b></h6>

                <table class="table user-view-table m-0">

                    <tbody>
                        <tr>
                            <td>Superannuation Member ?</td>
                            <td><?php
                                if ($member == "No information  Available") {
                                    echo "NO";
                                } else {
                                    echo "YES";
                                ?></td>
                        </tr>
                        <tr>
                            <td>Superannuation Member Number</td>
                            <td><?php echo $sup_member_num ?></td>
                        </tr>
                        <tr>
                            <td>Fund Name:</td>
                            <td><?php echo $fund_name ?></td>
                        </tr>
                        <tr>
                            <td>Policy Number:</td>
                            <td><?php echo $policy_number ?></td>
                        </tr>
                        <tr>
                            <td>Employee ID Number:</td>
                            <td><?php echo $emp_id_number ?></td>
                        </tr>
                        <tr>
                            <td>ABN:</td>
                            <td><?php echo $fund_abn ?></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo $fund_address ?></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Suburb:</td>
                            <td><?php echo $ssuburb ?></td>
                        </tr>
                        <tr>
                            <td>State:</td>
                            <td><?php echo $sstate ?></td>
                        </tr>
                        <tr>
                            <td>Postcode:</td>
                            <td><?php echo $spostcode ?></td>
                        </tr>
                        <tr>
                            <td>Mobile:</td>
                            <td><?php echo $fund_phone ?></td>
                        </tr>
                        <tr>
                            <td>Uniqe Superannuation ID:</td>
                            <td><?php echo $unique_super_id ?></td>
                        </tr>
                        <tr>
                            <td>Accont Name:</td>
                            <td><?php echo $account_name ?></td>
                        </tr>
                    <?php
                                }
                    ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>

</div>
</div>
<a href="javascript:void(0)" class="btn btn-primary btn-sm">Approve</a>&nbsp;
<a href="javascript:void(0)" class="btn btn-default btn-sm">Decline</a>&nbsp;

</div>