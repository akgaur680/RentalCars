<?php
ob_start();
session_start();
$page = "Home";
include_once('db_connect.php');
include_once('header.php');
$usernameError = "";
$passwordError = "";
$foundErrors = false;
$sql = "select * from vehicle_details order by vehicle_id limit 3";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if (isset($_POST['submit'])) {
  $username = $_POST['uname'];
  $pass = $_POST['pswd'];
  if (empty($username)) {
    $usernameError = "Username is required";
    $foundErrors = true;
  }
  if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
    $usernameError = "Only Letters are allowed";
    $foundErrors = true;
  }
  if (empty($pass)) {
    $passwordError = "Password is required";
    $foundErrors = true;
  }
  if ($foundErrors == false) {
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
}
if (isset($_SESSION['user'])) {
  echo '<h2 class="text-center text-white pt-4"> Welcome User</h2>';
} else {
  echo '

<div class="container-fluid bg-light pb-4">
  <h2 class="text-center pt-4"> Already Have an Account, Sign In</h2>
<form action="#" method="post"s>
  <div class="form-group">
    <label for="uname">Username:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
  
    <div>';
  if ($foundErrors) {
    echo $usernameError;
  }
  echo '</div>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required> <div>';
  if ($foundErrors) {
    echo $passwordError;
  }
  echo '
</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
  <a href="register.php" class="btn btn-danger float-right">Register for New Account</a>

</form>
</div>
';
}
?>
<div class="container">

  <section class="padding footer-block">
    <div class="container-fluid mt-2">
      <div class="row mt-4">
        <div class="col">
          <h3 class="text-white text-center mb-2 mt-2">New Cars Available for Rent </h3>
        </div>
      </div>
      <div class="row">
        <?php
        while ($row = mysqli_fetch_row($result)) {
          echo '<div class="col-lg-4 col-sm-12">
                <h3 class="text-white text-center mb-4 mt-0"><strong>' . $row[3] . '</strong></h3>
                    <img src="imgs/' . $row[11] . '" class="img-fluid rentalimg">

        <p class="text-white mt-2">Car Type ' . $row[4] . '<br> Fuel Type
        ' . $row[5] . '<br> Mileage ' . $row[6] . '</p>    <a href="vehicledescription.php?vid=' . $row[0] . ' " class="btn btn-danger">View More</a></div>
';
        }
        ?>
      </div>
  </section>
  <?php include_once('footer.php');
  ?>