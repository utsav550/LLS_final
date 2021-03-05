<?php ?>
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
        <link rel="stylesheet" href="css/register.css">
        <title>lockyer labour solution</title>
    </head>


    <body>

        <div class="topnav" id="myTopnav">


            <a href="index.php" id="logo">
                <h1 id="lg"><span>L</span>ockyer <span>L</span>abour <span>S</span>olution</h1>
            </a>
            <a href="index.php" id="first">Home</a>
            <a href="Log-in.php">Log-in</a>
            <a href="gallery.php">Gallery</a>
            <a href="Registration.php" class="active" >Apply</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars" id="ic"></i>
            </a>
        </div>

        <form action="includes/register.inc.php" style="border:1px solid #ccc" method="POST">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                <p style="color: red">
                <?php
        
            if(isset($_GET["error"])){
                if($_GET["error"]== "invalidusername"){
                    echo "Error: User name must contain only letters</p>";
                }
                                if($_GET["error"]== "invalidmobile"){
                    echo "Error: mobile must contain only numbers</p>";
                }
                                if($_GET["error"]== "invalidemail"){
                    echo "Error: invalid Email</p>";
                }
                                if($_GET["error"]== "passwordnotmatch"){
                    echo "Error: Password does not match</p>";
                }
                                if($_GET["error"]== "alreadyexixt"){
                    echo "Error: Email already exist. Please Log-in.</p>";
                }
            }
            
            echo '<hr>'
        ?>
                <label for="fname"><b>First Name</b></label>
                <input type="text" placeholder="First Name" name="fname" required>

                <label for="lanme"><b>Last Name</b></label>
                <input type="text" placeholder="Last Name" name="lname" required>

                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="email" required>

                <label for="mobile"><b>Mobile</b></label>
                <input type="text" placeholder="Enter Mobile Number" name="mobile" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="repwd" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <button type="button" class="cancelbtn" name="cancel">Cancel</button>
                    <button type="submit" class="signupbtn" name="submit">Sign Up</button>
                </div>
            </div>
        </form>
        
        

    </body>
</html>

