<?php
include('includes/header.php');
include('includes/navbar.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> User Profile
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Add User Profile
        </button>
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> Employee ID </th>
              <th> First Name </th>
              <th>Last Name</th>
              <th>Email </th>
              <th>Mobile</th>
              <th>Password</th>

              <th>Edit </th>

            </tr>
          </thead>
          <tbody>

            <tr>
              <td> <?php echo $empid; ?> </td>
              <td><?php echo $fname; ?></td>
              <td><?php echo $lname; ?></td>
              <td> <?php echo $email; ?></td>
              <td><?php echo $mobile; ?></td>
              <td><?php echo '******'; ?></td>
              <td>
                <form action="" method="post">
                  <input type="hidden" name="edit_id" value="">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepi"><button type="submit" name="edit_btn" class="btn btn-success"> change</button></a>
                </form>
                <div class="modal fade" id="changepi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">want to change password?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form class="user" action="changeinfo.php" method="POST">

                        <div class="form-group">
                          <input type="email" name="email" class="form-control form-control-user" value=" <?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                          <input type="text" name="fname" class="form-control form-control-user" value="<?php echo $fname; ?>">
                        </div>
                        <div class="form-group">
                          <input type="text" name="lname" class="form-control form-control-user" value="<?php echo $lname; ?>">
                        </div>
                        <div class="form-group">
                          <input type="text" name="mobile" class="form-control form-control-user" value="<?php echo $mobile; ?>">
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" class="form-control form-control-user" value="" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block"> chnage </button>
                        <hr>
                      </form>

                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>


              </td>

            </tr>

          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>