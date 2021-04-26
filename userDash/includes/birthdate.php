<?php

$username = $_SESSION["fname"];
$email = $_SESSION["email"];
$empid = $_SESSION["emp_id"];

require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';

$sql = "SELECT * FROM `personal information` WHERE MONTH(DOB) = MONTH(NOW()) and DAY(DOB) >= DAY(NOw())";

