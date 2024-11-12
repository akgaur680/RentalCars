<?php
ob_start();
session_start();
$page = "View Vehicles";

include_once('db_connect.php');
include_once('header.php');
if (isset($_REQUEST['vid'])) {

  $sql = "select * from vehicle_details where vehicle_id = " . $_REQUEST['vid'];
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $row = mysqli_fetch_row($result);
} else {
  echo '<h1 class="text-center text-white"> select View Vehicles From the Navigation Bar</h1>';
  die();
}
?>
<section class="section inner-header text-white">
  <div class="row">
    <div class="col-12 text-center">

      <?php

      if (isset($row)) {
        $convertedURL = str_replace("watch?v=", "embed/", $row[10]);
        echo '   <h2> Car Maker ' . $row[2] . '   </h2>';
        echo '<h5>Car Title ' . $row[3] . '</h5>';
        echo '<img class="img-fluid" src="imgs/' . $row[11] . '" width="550px" height="300px" title="Car image" alt="File Missing"><br><br>
      <p>Vehicle Body Type ' . $row[4] . '<br>
      <br>Fuel Type ' . $row[5] . '<br>
      <br>Mileage ' . $row[6] . '<br>
      <br>Location ' . $row[7] . '<br>
      <br>Year ' . $row[8] . '<br>
      <br>Number of Doors ' . $row[9] . '<br>
      <br>
      <iframe width="560" height="315" src="' . $convertedURL . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br>
      </p>
     ';
      }
      ?>


    </div>
  </div>

</section>
<?php include_once('footer.php');
