<?php
ob_start();
session_start();
if (!isset($_SESSION['id'])) {
  header("location:index.php");
}
$page = "Add Vehicle";
include_once('db_connect.php');
include_once('header.php');
if (isset($_POST['submit'])) {
  $userid = $_SESSION['id'];
  $vmake = $_POST['vmake'];
  $vmodel = $_POST['vmodel'];
  $bodytype = $_POST['bodytype'];

  $fueltype = $_POST['fueltype'];
  $location = $_POST['location'];
  $mileage = $_POST['mileage'];
  $year = $_POST['year'];
  $doors = $_POST['doors'];
  $url = $_POST['url'];
  $pimage = $_FILES['profileimage']['name'];
  $image = time() . "-" . $pimage;
  $path = "imgs/";
  move_uploaded_file($_FILES['profileimage']['tmp_name'], $path . $image);
  //writing the insert query
  $insert_query = "insert into vehicle_details(`user_id`, `vehicle_make`, `vehicle_model`, `vehicle_bodytype`, `fuel_type`, `mileage`, `location`, `year`, `num_doors`, `video_url`, `image_url`) values($userid,'$vmake','$vmodel','$bodytype','$fueltype','$mileage','$location','$year',$doors,'$url','$image')";

  $test = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
}

?>
<div class="container-fluid bg-light">
  <?php
  // if(isset($_POST['submit']))
  // { 
  //   if(isset($row))
  //   {
  //     echo '<h4 align="center" class="bg-danger text-white">'.$row[1].' is already registered with us. Try Logging In with the email id and password</h4>';
  //   }
  //   else
  //   {
  if (isset($_POST['submit'])) {
    if ($test) {
      echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>User "' . $vmodel . '" is Successfully Registered.</h4>         
              </div>';
    } else
      echo 'Data has not entered';
  }
  //   }
  ?>

  <h2 class="text-center pt-4">Enter Car Details</h2>
  <form action="#" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
    <div class="form-group">
      <label for="vmake">Vehicle Maker:</label>
      <input type="text" class="form-control" id="vmake" placeholder="Enter Name of vehicle Maker" name="vmake" required>
    </div>
    <div class="form-group">
      <label for="vmodel">Vehicle Model:</label>
      <input type="text" class="form-control" id="vmodel" placeholder="Enter Model" name="vmodel" required>
    </div>
    <div class="form-group">
      <label for="fname">Choose Body Type:</label>
      <select class="form-control" id="bodytype" name="bodytype">
        <option value="Hatchback">Hatchback</option>
        <option value="Sedan">Sedan</option>
        <option value="SUV">SUV</option>
        <option value="MUV">MUV</option>
        <option value="Coupe">Coupe</option>
        <option value="Convertible">Convertible</option>
        <option value="Pickup Truck">Pickup Truck</option>

      </select>
    </div>
    <div class="form-group">
      <label for="pwd">Choose Fuel Type:</label>
      <select class="form-control" id="fueltype" name="fueltype">
        <option value="Diesel">Diesel</option>
        <option value="Petrol">Petrol</option>
        <option value="Electric">Electric</option>
        <option value="Gasoline">Gasoline</option>
        <option value="Hybrid">Hybrid</option>

      </select>
    </div>



    <div class="form-group">
      <label for="comment">Location</label>
      <textarea class="form-control" rows="2" name="location" id="location" required></textarea>
    </div>

    <div class="form-group">
      <label for="name">Enter Mileage:</label>
      <input type="text" class="form-control" id="mileage" placeholder="mileage" name="mileage">
    </div>
    <div class="form-group">
      <label for="name">Make Year:</label>
      <input type="text" class="form-control" name="year" id="year" placeholder="Year">
    </div>
    <div class="form-group">
      <label for="doors">Number of Doors:</label>
      <input type="text" class="form-control" id="doors" placeholder="Enter Number of doors" name="doors" required>
    </div>
    <div class="form-group">
      <label for="image">Image URL:</label>
      <input type="file" class="form-control" id="profileimage" name="profileimage">
    </div>

    <div class="form-group">
      <label for="video">Video URL:</label>
      <input type="text" class="form-control" id="url" name="url" required>
    </div>
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include_once('footer.php');
