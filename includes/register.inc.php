<?PHP

if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $pwd = $_POST["pwd"];
    $repwd = $_POST["repwd"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


//    input validation and error handler

    if (emptyInputSignup($fname, $email, $dob,$lname, $pwd, $repwd, $mobile) !== false) {

        header("Location: ../Registration.php?error=emptyinput");
        exit();
    }
    if (invalidusername($fname, $lname) !== false) {

        header("Location: ../Registration.php?error=invalidusername");
        exit();
    }
    if (invalidmobile($mobile) !== false) {

        header("Location: ../Registration.php?error=invalidmobile");
        exit();
    }
    if (invalidemail($email) !== false) {

        header("Location: ../Registration.php?error=invalidemail");
        exit();
    }
    if (passwordmatch($pwd, $repwd) !== false) {
        header("Location: ../Registration.php?error=passwordnotmatch");

        exit();
    }
    if (emailexist($conn, $email) !== false) {

        header("Location: ../Registration.php?error=alreadyexixt");
        exit();
    }


    createuser($conn, $fname, $lname,$dob, $email, $mobile, $pwd);
} else {
    header("Location: ../Registration.php?error=some");
}