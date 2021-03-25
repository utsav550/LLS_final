<a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold"><?php  echo $msg ?></span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>


              <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Documentation</h1>

  </div>
  <button type="button" class="btn btn-primary" id="piinfo" data-toggle="modal" data-target="#exampleModalCenter">
    Personal information
  </button>
  <button type="button" class="btn btn-primary" id="piinfo" data-toggle="modal" data-target="#exampleModalCenterbank">
    Bank information
  </button>
  <button type="button" class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#exampleModalCentersi">
    Superannuation information
  </button>
  <button type="button" class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#exampleModalCentervi">
    Visa information
  </button>
  <button type="button"  <?php if($passfile != 1) { echo'style="background-color: red"';} ?> class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#uploadModalpass">
    Passport Copy
  </button>
  <button  <?php if($visafile != 1) { echo'style="background-color: red"';} ?> type="button" class="btn btn-primary" id="superinfo" data-toggle="modal" data-target="#uploadModalvisa">
    Visa Copy
  </button>




  <?php
////////////////////////////

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
$member =true;

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


       

        $sql = "INSERT INTO `super_info`(`sup_member_num`, `emp_id`, `fund_name`, `policy_number`, `emp_id_number`, `fund_abn`, `fund_address`, `suburb`, `state`, `postcode`, `fund_phone`, `unique_super_id`, `account_name`, `member`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location:../index.php");



            exit();
        }


        mysqli_stmt_bind_param($stmt, "ssssssssssssss", $smn, $empid, $fundname, $pn, $ein, $FABN, $address, $sub, $state, $zip, $phone, $usid, $eacn,$member);
        mysqli_stmt_execute($stmt);
        echo'herefinal';
        echo $smn, $empid, $fundname, $pn, $ein, $FABN, $address, $sub, $state, $zip, $phone, $usid, $eacn,$member;
        $notifycode =3;
            
        $sql2 = "DELETE FROM `notify` WHERE `emp_id` = '$empid' AND `notifycode` = '$notifycode'";
       $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql2);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location:../index.php?msg=sisaved");
    }
}




?>