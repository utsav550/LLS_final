<?php


include('includes/header.php');
include('includes/navbar.php');



?>
<div class="col-xl col-md-6 mb-4" style="max-width: 100%; float: right ">
    <div class="card border-left-warning shadow h-100 py-2" style="border-left: .25rem solid #Ff4770 !important;">
      <div class="card pmd-card" style="max-width: 99%;  margin-bottom:50px;   overflow-x: hidden;">

        <div class="card-header pmd-card-border d-flex">

          <i class="fas fa-clipboard-list fa-2x text-gray-300" style="font-size: 70px; margin-right:10px; color:orangered"></i>
          <div class="media-body">

            <h2 class="card-title h3"> Notifications</h2>
            <p class="card-subtitle"> Push Notifications for Employees </p>
           
          </div>
        </div>
        

        <form action="includes/pushnoti.php" method="POST">
          <div class="form-check">
           
            <div style="width: 100%;">
              <h2 style="text-align: center;">Write Notice</h2>
              <div class="form-row">
                <div class="form-group col-md-6" >

                  <input type="textbox" name="notiid" class="form-control" id="inputEmail4" placeholder="" style="width:500px; height:100px; margin: 2% 0% 0% 70%;">
                </div>

              </div>
              <button type="submit"  name="relnoti" class="btn btn-primary" style="height:50px;width:150px; margin: 1% 0% 0% 45%;">Release</button>


              
            </div>
            </div>
</form>
<hr>
<div class="card-body">
      <div class="body">
        <div class="table-responsive">
          <table class="table pmd-table table-hover">
            <thead>
              <tr>
                <th>Notification  ID</th>
                <th>Notifications To</th>
                <th>Date</th>
                <th>Notice</th>
                <th>Action</th>
                <th></th>
              </tr>
            </thead>
            <?php
            $sql2 = "SELECT * FROM `notify` WHERE `notifycode` = 1 ORDER BY DATE_FORMAT(notify_date, '%d')";

            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql2)) {

              header("../index.php?error=notready");
              exit();
            }
            mysqli_stmt_prepare($stmt, $sql2);
            mysqli_stmt_execute($stmt);
            $resultdata = mysqli_stmt_get_result($stmt);
            $countt = mysqli_num_rows($resultdata);
            if ($countt == 0) {
              echo '<h3>No Notifications</h3>';
            } else {
              if ($countt < 1000) {
                $forc =  $countt;
              } else {
                $forc = 3;
              }
              for ($i = 1; $i <= $forc; $i++) {
                $row = mysqli_fetch_assoc($resultdata);
                $date = $row["notify_date"];
                $notic =  $row["msg"];
                $notfyid = $row["notify_id"];
                               
                  echo '
                  <tr>
                  <td>' . $notfyid . '</td>
                  <td> To ALL </td>
                  <td>' . $date . '</td>
                  <td>' . $notic . '</td>
                  
                  <td>
                  <a href="includes/pushnoti.php?id='.$notfyid.' class="delete" title="Delete" style="color: red;" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                                            
                                            
                                        </td>
                </tr>';
                
              }
            } ?>


            </tbody>

          </table>
        </div>
      </div>
    </div>





            </ul>
          </div>
      
    
  </div>
</div>