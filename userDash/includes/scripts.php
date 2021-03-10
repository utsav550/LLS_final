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


$connection = mysqli_connect("localhost","root","","lls");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];

    if($password === $confirm_password)
    {
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
            header('Location: register.php');
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header('Location: register.php');
        }
    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: register.php');
    }

}

if(isset($_POST['addpi']))
{
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

mysqli_stmt_bind_param($stmt, "sssssssssss", $empid, $commdate, $gender,  $dob, $address, $sub, $state, $zip, $tfn, $emt, $emt);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("Location:../index.php?msg=pisaved");


}
}
}   

?>

