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
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
}

/* The grid: Four equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  padding: 10px;
  
}

/* Style the images inside the grid */
.column img {
  opacity: 0.8; 
  cursor: pointer; 
  width:100%; height: 255px;
}

.column img:hover {
  opacity: 1;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The expanding image container */
.containe {
  position: relative;
  display: none;
  width:70%; height: 600px; display: block; margin-left: auto;margin-right: auto;
}

/* Expanding image text */
#imgtext {
  position: absolute;
  bottom: 15px;
  left: 15px;
  color: white;
  font-size: 20px;
}

/* Closable button inside the expanded image */
.closebtn {
  position: absolute;
  top: 10px;
  right: 15px;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
#expandedImg{
    width:100%; height: 550px; transition: 0.5s
}

@media screen and (max-width: 600px) {
  .containe{
     display: block;
     float: none;
     height:300px;
     width: 100%;
     margin-left: auto;
     margin-right: auto;
     
  }
  .containe .span{
     display: block;
     float: none;
     height:100px;
     width: 100%;
     margin-left: auto;
     margin-right: auto;
     
  }
  #expandedImg{
      display: block;
     float: none;
     height:300px;
     width: 100%;
     margin-left: auto;
     margin-right: auto;
  }
  .column {
  float: left;
  width: 25%;
  padding: 5px;
  
}
  .column img {
  opacity: 1.0; 
  cursor: pointer; 
  width:100%; height: 100px;
}
#headscreen{
    font-size: 15px;
}
 #screen{
    font-size: 15px;
}
  
}
</style>
</head>
<body>
     <div class="topnav" id="myTopnav">


        <a href="index.php" id="logo">
            <h1 id="lg"><span>L</span>ockyer <span>L</span>abour <span>S</span>olution</h1>
        </a>
        <a href="index.php"  id="first">Home</a> 
        <a href="#news">Log-in</a>
        <a href="gallery.php"class="active">Gallery</a>
        <a href="Registration.php">Apply</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars" id="ic"></i>
        </a>
    </div>


<div style="text-align:center">
  <h2 id="headscreen">Image Gallery</h2>
  
</div>

    <div class="containe" style="">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImg"  src="gallery/f1.jpg">
  <div id="imgtext" style="font-size: x-small; color: black;" >   </div>
</div>
<!-- The four columns -->
<div style="text-align:center">
<h2 id="screen">Select Images to Load on Screen</h2>
</div>
<div class="row">
    



    <?php
$files = glob("gallery/*.*");
for ($i=1; $i<count($files); $i++)
{
	$num = $files[$i];
	echo ''
        . '<div class="column">'
                . '<img src="'.$num.'" alt="FROM LLS GALLERY" style="" onclick="myFunction(this)" ;>'.
                '</div>';
        
	}
?>
  
</div>



<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  imgText.innerHTML = imgs.alt;
  expandImg.parentElement.style.display = "block";
}
</script>

</body>
</html>

