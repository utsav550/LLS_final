<?php
require_once '../includes/dbh.inc.php';
require_once '../includes/functions.inc.php';
if(isset($_POST["formcontrol"])){
$farm = $_POST["formcontrol"];

if($farm !== 'Select'){

    $sql = "SELECT * FROM `job_info` WHERE `farm_name` = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    
        header("../index.php?error=notready");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s", $farm);
    mysqli_stmt_execute($stmt);
    
    $resultdata = mysqli_stmt_get_result($stmt);
    $countt = mysqli_num_rows($resultdata);
    if($countt==0){
        echo '
        <select id="inputState" name="job" class="form-control">
          <option selected>No Jobs</option>
        </select>
      </div>';
    }
    else{
        echo'
        <select id="inputState" name="job" class="form-control">';
        for($i=1; $i<=$countt;$i++){
            $row = mysqli_fetch_assoc($resultdata);
            $id = $row["job_info"];
            $farm = $row["name"];
            echo'
            <option>'.$farm.'</option>
           
            ';
    }
   echo'</select>';
}
    
    } 
}
?>