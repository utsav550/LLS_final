<?php
//=========================== accept decline user===================
if (isset($_POST["approve"])) {
    $id = $_POST["jid"];
    $approval = "Approved";

    require_once '../../includes/dbh.inc.php';
    require_once '../../includes/functions.inc.php';
    $sql = "UPDATE `register` SET `approval`= '$approval' WHERE emp_id = $id ";
mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    header("Location: ../index.php?error=chnagedsuccessfully");
  } else {
    echo "there is  Error while updating record: " . mysqli_error($conn);
  }
}
if (isset($_POST["decline"])) {
    $id = $_POST["jid"];
    $approval = "Decline";

    require_once '../../includes/dbh.inc.php';
    require_once '../../includes/functions.inc.php';
    $sql = "UPDATE `register` SET `approval`= '$approval' WHERE emp_id = $id ";
mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    header("Location: ../index.php?error=chnagedsuccessfully");
  } else {
    echo "there is  Error while updating record: " . mysqli_error($conn);
  }
}

