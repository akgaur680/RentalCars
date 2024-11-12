<?php
ob_start();
session_start();
if (!isset($_SESSION['id'])) {
  header("location:index.php");
}
$page = "View Vehicles";
include_once('db_connect.php');
include_once('header.php');
$sql = "select * from vehicle_details where user_id = " . $_SESSION['id'];
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if (isset($_REQUEST['deleteid'])) {
  $deleteid = $_REQUEST['deleteid'];
  $sqldelete = "delete from vehicle_details where vehicle_id=" . $deleteid;
  $test = mysqli_query($conn, $sqldelete) or die(mysqli_error($conn));
  if ($test) {
    header('location:viewvehicles.php?deletedname="' . $deleteid . '"');
  } else {
    echo 'Data has not deleted';
  }
}
if (isset($_POST['submit'])) {
  $username = $_POST['uname'];
  $pass = $_POST['pswd'];
  $sql = "select * from users where username='$username'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $row = mysqli_fetch_assoc($result);

  if (!(empty($row))) {
    // Entered username does not exist in database
    if ($row['PASSWORD'] == $pass) {
      $_SESSION['user'] = $row['username'];

      //this id will be used in edit profile
      $_SESSION['id'] = $row['user_id'];
      header('location:index.php');
    } else {
      echo '<script> alert("Incorrect Password."); </script>';
    }
  } else {
    // We have found the User
    echo '<script> alert("User Does not Exist."); </script>';
  }
}
?>
<section class="section inner-header text-center text-white">
  <p class="text-white">
    <?php if (isset($_REQUEST['deletedname'])) {
      echo '<div class="alert alert-danger alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Vehicle is Successfully Deleted.</h4>         
              </div>';
    } ?>
  </p>
  <h3> List Of Vehicles</h3>
  <div class="row">
    <div class="col-12">
      <div class="table-responsive text-white">
        <table class="table table-bordered table-striped text-white">
          <thead>
            <tr class="bg-dark">
              <th> Make </th>
              <th> Modal</th>
              <th> Body Type</th>
              <th> Fuel Type</th>
              <th> Mileage </th>

              <th> Video </th>
              <th> Image </th>
              <th> Operations </th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = mysqli_fetch_row($result)) {
              $convertedURL = str_replace("watch?v=", "embed/", $row[10]);
              echo '
      <tr>
          <th> <a href="vehicledescription.php?vid=' . $row[0] . '">' . $row[2] . '</a> </th>
          <th>' . $row[3] . ' </th>
          <th>' . $row[4] . '</th>
          <th> ' . $row[5] . '</th>
          <th>' . $row[6] . '</th>

          <th>

 <iframe width="200" height="180" src="' . $convertedURL . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</th>
          <th><img src="imgs/' . $row[11] . '" width="200px" height="150px"></iframe></th>
          <th><a  href="editvehicle.php?editid=' . $row[0] . '" class="btn btn-primary">EDIT</a> <button class="btn btn-danger" href="#" data-href="viewvehicles.php?deleteid=' . $row[0] . '" data-toggle="modal" data-target="#confirm-delete">DELETE</button></th>
              </tr>
  ';
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- This div is used to create a pop up box for the delete confirmation. -->
      <div class="example-modal" tabindex="-1" role="dialog">
        <div class="modal modal-danger" role="document" id="confirm-delete">
          <div class="modal-dialog">
            <div class="modal-content bg-danger text-white">
              <div class="modal-header ">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Do You Really want to Delete?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-secondary" id="confirm">Confirm</a>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<?php include_once('footer.php');
