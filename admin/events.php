<?php


include('includes/header.php');
include('includes/navbar.php');



?>

<div class="col-xl col-md-6 mb-4"  style="max-width: 100%">
      <div class="card border-left-warning shadow h-100 py-2">
<div class="card pmd-card">
                <!-- Card Header -->
              
                <!-- Card Header End -->
  <div class="card pmd-card">
    <!-- Card Header -->
    <div class="card-header pmd-card-border d-flex align-items-start">
      <div class="media-body">
        <h2 class="card-title h3">Event Management</h2>
        <p class="card-subtitle">Create New Event here!</p>
      </div>
     
    </div>
    <!-- Card Header End -->
   
    <div style="width: 100%;">
    <h2 style="text-align: center;"> Create Event</h2>
    <form style="padding-left:35%; " action="includes/createevent.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-3" style="width: 30%;">
      <label for="inputEmail4">Event Name</label>
      <input type="text"  style="width: 100%;" name="name" class="form-control" id="inputEmail4" placeholder="Event Name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">About Event</label>
      <input type="text" name="info" class="form-control" id="inputPassword4" placeholder=" Event information">
    </div>
  </div>
  
  
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputCity">Event Date</label>
      <input type="date" name="date" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Number of participants</label>
      <input type="text" class="form-control" name="number" placeholder=" 20"id="inputZip">
    </div>
  
  
    <div class="form-group col-md-2">
      <label for="inputCity">Event Time</label>
      <input type="time" name="time" class="form-control" id="inputCity">
    </div>
    </div>
    <div class="form-row" style="padding-left: 20%; padding-bottom:40px;padding-top:20px" >
  <button type="submit"  name="addevent" class="btn btn-primary">Cerate Event</button>
</form>
    </div>


                               

                                  
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Card Body End -->
            </div>
            <div class="card-header pmd-card-border d-flex align-items-start">
                    <div class="media-body">
                        <h2 class="card-title h3">Event </h2>
                        <p class="card-subtitle">Upcoming Events</p>
                    </div>
                   
                </div>
                <!-- Card Header End -->

                <!-- Card Body -->
                <div class="card-body">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table pmd-table table-hover">
                                <thead>
                                    <tr>
                                    
                <th>event_id</th>
                <th>admin_id</th>
                <th>event name</th>
                <th>event date</th>
                <th>event Information</th>
                <th>Number of People</th>
                <th>time</th>
                <th>Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                                $sql2 = "SELECT * FROM `event`";
            
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
              echo '<h3>No Upcoming Schedule</h3>';
            } 
            else 
            {
            for ($i = 1; $i <= $countt; $i++) {
                  $row = mysqli_fetch_assoc($resultdata);
                  $eventid = $row["event_id"];
                  $adid =  $row["admin_id"];
                  $nameeevnt = $row["event_name"];
                  $dateevent =  $row["event_date"];
                $infoevent = $row["event_desc"];
                $numberof  =$row["participate_num"];
                $timeevent = $row["time"];
               
                if($eventid != null){
                  echo '
                  <tr>
                  <td>'.$eventid.'</td>
                  <td>'.$adid.'</td>
                  <td>'.$nameeevnt.'</td>
                  <td>'.$dateevent.'</td>
                  <td>'.$infoevent.'</td>
                  <td>'.$numberof.'</td>
                  
                  <td>'.$timeevent.'</td>
                  
              </a>
              <td>
              <a href="includes/createevent.php?iddell='. $eventid .'" class="pmd-btn-fab btn-xs btn-outline-danger btn pmd-ripple-effect">
                  <i class="material-icons">Reject</i>
              </a>
                                        </td>
                </tr>';}
                }
                }?>

                                  
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Card Body End -->
            </div>
</div>

</div>
</div>


<?php
include('includes/footer.php');
?>