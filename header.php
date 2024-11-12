<!DOCTYPE html> <!-- html 5 -->
<html lang="en">

<head>
  <title> Car Rental</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/mystyle.css">
  <script src="https://kit.fontawesome.com/a76cf7799c.js" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
  <div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="index.php">
        <?php
        if (isset($_SESSION['user'])) {
          $sql = "select first_name from users where user_id =" . $_SESSION['id'];
          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
          $row = mysqli_fetch_assoc($result);
          echo 'Welcome ' . $row['first_name'];
        } else {
          echo '<strong><span class="text-white">RENTAL</span><span style="color:#01d28e;">CARS</span></strong>';
        }
        ?> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li <?php if ($page == "Home") {
                echo ' class="nav-item active"';
              } else echo ' class="nav-item"'; ?>>
            <a class="nav-link" href="index.php"><i class="fa-solid fa-house" style="color: #ffffff;"></i><span>Home</span></a>
          </li>
          <?php

          if (isset($_SESSION['user'])) {
            if ($page == "Add Vehicle") {
              echo '<li class="nav-item active">';
            } else
              echo '<li class="nav-item">';
            echo '<a class="nav-link" href="register.php"><i class="fa-solid fa-user" style="color: #ffffff;"></i><span>Add New Vehicle</span></a></li>';
          } else {
            if ($page == "New-User-Register")
              echo '<li class="nav-item active">';
            else
              echo '<li class="nav-item">';

            echo '<a class="nav-link" href="register.php"><i class="fa-solid fa-user" style="color: #ffffff;"></i><span>User Register</span></a></li>';
          } 
          ?>

          <?php
          if (isset($_SESSION['user'])) {
            if ($page == "View Vehicles")
              echo '<li class="nav-item active"> <a class="nav-link" href="viewvehicles.php"><span class="fa fa-car"></span> View Vehicles </a></li>';
            else
              echo '<li class="nav-item"> <a class="nav-link" href="viewvehicles.php"><span class="fa fa-car"></span> View Vehicles </a></li>';
          } else {
            if ($page == "about") {
              echo '<li class="nav-item active mr-4">';
            } else echo '<li class="nav-item">';
            echo '<a class="nav-link" href="about.php"><span class="fa fa-book"></span> About Us</a>
</li>';
          }
          if (isset($_SESSION['user'])) {
            if ($page == "Bookings")
              echo '<li class="nav-item active"> <a class="nav-link" href="booking.php"><span class="fa fa-car"></span> Bookings </a></li>';
            else
              echo '<li class="nav-item"> <a class="nav-link" href="booking.php"><span class="fa fa-car"></span> Bookings </a></li>';
          } 
          if (isset($_SESSION['user'])) {
            echo '<li class="nav-item">
  <a class="nav-link" href="logout.php"><span><i class="fa-solid fa-right-from-bracket" style="color: #f3f4f7;"></i></span> Log Out </a></li>';
          }
          ?>
        </ul>
      </div>
    </nav>