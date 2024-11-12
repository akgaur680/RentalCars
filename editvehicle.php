<?php
ob_start();
session_start();
if (!isset($_SESSION['id'])) {
  header("location:index.php");
}
$page = "Edit Vehicle";
include_once('db_connect.php');
include_once('header.php');
if (isset($_REQUEST['editid'])) {
  $editid = $_REQUEST['editid'];
  $sql = "select * from vehicle_details where vehicle_id = " . $editid;
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $row = mysqli_fetch_assoc($result);
  $image = $row['image_url'];
  //update query code pending
  if (isset($_POST['submit'])) {
    $vmake = $_POST['vmake'];
    $vmodel = $_POST['vmodel'];
    $bodytype = $_POST['bodytype'];

    $fueltype = $_POST['fueltype'];
    $location = $_POST['location'];
    $mileage = $_POST['mileage'];
    $year = $_POST['year'];
    $doors = $_POST['doors'];
    $url = $_POST['url'];
    $path = "imgs/";
    //code to upload  the image file
    $pimage = $_FILES['profileimage']['name'];
    if (!($pimage == "")) {
      unlink($path . $image);
      $image = time() . "-" . $pimage;
      move_uploaded_file($_FILES['profileimage']['tmp_name'], $path . $image);
    }

    $sql = "update vehicle_details set vehicle_make='$vmake',vehicle_model='$vmodel',vehicle_bodytype='$bodytype',fuel_type='$fueltype',mileage = '$mileage',year='$year',num_doors = '$doors',location = '$location',video_url = '$url',image_url='$image' where vehicle_id=$editid";

    $test = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  }
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

  <h2 class="text-center pt-4">Edit Car Details</h2>
  <form action="#" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
    <div class="form-group">
      <label for="vmake">Vehicle Maker:</label>
      <input type="text" class="form-control" id="vmake" name="vmake" value="<?php if (isset($_REQUEST['editid'])) echo $row['vehicle_make'];
                                                                              else echo ""; ?>" required>
    </div>
    <div class="form-group">
      <label for="vmodel">Vehicle Model:</label>
      <input type="text" class="form-control" id="vmodel" value="<?php if (isset($_REQUEST['editid'])) echo $row['vehicle_model'];
                                                                  else echo ""; ?>" name="vmodel" required>
    </div>
    <div class="form-group">
      <label for="fname">Choose Body Type:</label>
      <select class="form-control" id="bodytype" name="bodytype">
        <option value="Hatchback" <?php if ($row['vehicle_bodytype'] == 'Hatchback') echo ' selected="selected"'; ?>>Hatchback</option>
        <option value="Sedan" <?php if ($row['vehicle_bodytype'] == 'Sedan') echo ' selected="selected"'; ?>>Sedan</option>
        <option value="SUV" <?php if ($row['vehicle_bodytype'] == 'SUV') echo ' selected="selected"'; ?>>SUV</option>
        <option value="MUV" <?php if ($row['vehicle_bodytype'] == 'MUV') echo ' selected="selected"'; ?>>MUV</option>
        <option value="Coupe" <?php if ($row['vehicle_bodytype'] == 'Coupe') echo ' selected="selected"'; ?>>Coupe</option>
        <option value="Convertible" <?php if ($row['vehicle_bodytype'] == 'Convertible') echo ' selected="selected"'; ?>>Convertible</option>
        <option value="Pickup Truck" <?php if ($row['vehicle_bodytype'] == 'Pickup Truck') echo ' selected="selected"'; ?>>Pickup Truck</option>

      </select>
    </div>
    <div class="form-group">
      <label for="pwd">Choose Fuel Type:</label>
      <select class="form-control" id="fueltype" name="fueltype">
        <option value="Diesel" <?php if ($row['fuel_type'] == 'Diesel') echo ' selected="selected"'; ?>>Diesel</option>
        <option value="Petrol" <?php if ($row['fuel_type'] == 'Petrol') echo ' selected="selected"'; ?>>Petrol</option>
        <option value="Electric" <?php if ($row['fuel_type'] == 'Electric') echo ' selected="selected"'; ?>>Electric</option>
        <option value="Gasoline" <?php if ($row['fuel_type'] == 'Gasoline') echo ' selected="selected"'; ?>>Gasoline</option>
        <option value="Hybrid" <?php if ($row['fuel_type'] == 'Hybrid') echo ' selected="selected"'; ?>>Hybrid</option>

      </select>
    </div>



    <div class="form-group">
      <label for="comment">Location</label>
      <textarea class="form-control" rows="2" name="location" id="location" required><?php if (isset($_REQUEST['editid'])) echo $row['location']; ?></textarea>
    </div>

    <div class="form-group">
      <label for="name">Enter Mileage:</label>
      <input type="text" class="form-control" id="mileage" value="<?php if (isset($_REQUEST['editid'])) echo $row['mileage']; ?>" name="mileage">
    </div>
    <div class="form-group">
      <label for="name">Make Year:</label>
      <input type="text" class="form-control" name="year" id="year" value="<?php if (isset($_REQUEST['editid'])) echo $row['year']; ?>" placeholder="Year">
    </div>
    <div class="form-group">
      <label for="doors">Number of Doors:</label>
      <input type="text" class="form-control" id="doors" value="<?php if (isset($_REQUEST['editid'])) echo $row['num_doors']; ?>" name="doors" required>
    </div>
    <div class="form-group">
      <label for="image">Image URL:</label>
      <?php
      if (isset($_REQUEST['editid']))
        echo '<img src="imgs/' . $row['image_url'] . '" width="100px" height="100px">';
      ?>
      <input type="file" class="form-control" id="profileimage" name="profileimage">
    </div>

    <div class="form-group">
      <label for="video">Video URL:</label>
      <input type="text" class="form-control" id="url" name="url" value="<?php if (isset($_REQUEST['editid'])) echo $row['video_url']; ?>" required>
    </div>
    <button type="submit" name="submit" id="submit" class="btn btn-primary form-control mb-3">Update</button>
  </form>
</div>

<?php include_once('footer.php');
