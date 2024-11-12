<?php
ob_start();
session_start();
$page = "about";
include_once('db_connect.php');
include_once('header.php');
?>
<div class="container bg-light">

  <section>
    <div class="container-fluid mt-2">
      <div class="row mt-4">
        <div class="col">
          <h3 class=" text-center mb-2 mt-2">About <strong>RENTALCARS</strong> </h3>
        </div>
      </div>
      <div class="row ">
        <div class="col-sm-8">
          <h4>Join Us to rent your car</h4>
          <p>Car Rental s a platform for local residents, and businesses to advertise their vehicles that need to be rented. We provide car rental services online. The users who want to rent their cars, can visit our website, fill the form and register with us. Upload your vehicle details and get customer at your doorstep fast and easy.</p>
        </div>
        <div class="col-sm-4">
          <span class="fa fa-globe logo"></span>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="pl-4 col-sm-4 ">
          <span class="fa fa-car logo"></span>
        </div>
        <div class="col-sm-8 ">
          <h2>Our Values</h2>
          <h5>Our mission is to provide the locals with the car rental service on their hand held devices. They can rent cars as per their requirement quickly and with high discounts to regular uses.</h5>
          <p><strong>VISION:</strong> Once we see some growth in our business. we would like to grow our business to other cities as well as other states.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 pt-4">
      <h2>About Author </h2>
      <ul>
        <li>Bachelor's Degree in Web Design </li>
        <li>Fresher in E-Commerce Development</li>
        <li>Knowledge of HTML,CSS, BOOTSTRAP</li>
        <li>knowledge of Database </li>
        <li> Up to date knowledge of current web development trends</li>
      </ul>
    </div>
</div>
</div>
</section>
</div>
</div>
<?php include_once('footer.php');
?>