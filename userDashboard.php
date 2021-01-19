<?php
session_start();
$username = $_SESSION["fname"];
 require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    ?>
<h1> welcome the the User Dashboard </h1>

 <h2><?php

 echo$username;?> </h2>

<h3>    this page is still under  Development </h3>