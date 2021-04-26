<?php 
include_once 'includes/dbh.inc.php';

?>
<!DOCTYPE html>
<html>


<head>
    <script type="text/javascript" src="js/myFunction.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/gen.css">
    <title>lockyer labour solution</title>
</head>


<body>

    <div class="topnav" id="myTopnav">


        <a href="index.php" id="logo">
            <h1 id="lg"><span>L</span>ockyer <span>L</span>abour <span>S</span>olution</h1>
        </a>
        <a href="index.php" class="active" id="first">Home</a>
        <a href="Log-in.php">Log-in</a>
        <a href="gallery.php">Gallery</a>
        <a href="Registration.php">Apply for Jobs</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars" id="ic"></i>
        </a>
    </div>

    <div class="banner">
        <img src="img/bn2.png">
    </div>
    <div class="hiring">
        <div class="container-fluid bg-2 text-center">
            <h3 class="hire">We Are Hiring!!</h3>

            <button class=""><span>Apply Now</span> </button>


        </div>
    </div>
    <div style="padding-top: -20px">
    <h2 style="text-align: center;font-size: 50px; font-weight: bolder;">Our Achievements</h2>
    <div class="row">
        <div class="column">
            <div class="card">
                <p><i class="fa fa-user"></i></p>
                <h3>45+</h3>
                <p>Employees</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <p><i class="fa fa-check"></i></p>
                <h3>3+</h3>
                <p>Farms</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <p><i class="fa fa-smile-o"></i></p>
                <h3>6+</h3>
                <p>Different Jobs </p>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <p><i class="fa fa-usd" aria-hidden="true"></i></p>
                <h3>$25/hr</h3>
                <p>Minimum Pay Rate</p>
            </div>
        </div>
    </div>
    </div>

    <h2 style="text-align: center;font-size: 50px; font-weight: bolder;">Testimonials</h2>



    <div class="container" id="firstcont">
        <img src="img/logo.png" alt="Avatar">
        <p><span> Tim Linan</span><br> Farmer At Maragi</p>
        <p>"Content goes here..."</p>
    </div>

    <div class="container">
        <img src="img/logo.png" alt="Avatar">
        <p><span>Karl.  <br></span> Manager At Maragi</p>
        <p>"Content goes here............."</p>
    </div>

    <div class="about-section">
        <h1><u>About Us</u></h1>
        <p> "Here At Lockyer Labour Solution, we provide workforce to the farmers for preparing thair product to sell in the markets. <br> Lockyer Labour Solution understands the pressures on businesses to find employees that are suitable for the job. Lockyer
            Labour Solution prides itself on providing a service to our clients to eliminate the hassle of dedicating time to find the right workers."<br></p>
        <p><br>"As the employee is directly employed with Lockyer Labour Solution we will take care of wages, PAYG, Superannuation, Workers Compensation and associated administration."</p>

    </div>

    <div class="address">
        <div class="cont">
            <h1>Our <br>Address</h1>
        </div>
        <div class="map">
            <div id="googlemaps-display" style="height:100%; width:100%;max-width:100%;">
                <iframe style="height:100%;width:100%;border:0;" frameborder="1" src="https://www.google.com/maps/embed/v1/place?q=20+hastings+avanue+plainlaid&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8">
                </iframe>
            </div>

            <style>
                #googlemaps-display img {
                    max-width: none!important;
                    background: none!important;
                    font-size: inherit;
                    font-weight: inherit;
                }
            </style>
        </div>
    </div>
    <div class="footer">
        <h4>Lockyer Labour Solution &COPY; 2021</h4>
    </div>

</body>

</html>