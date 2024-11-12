<?php
ob_start();
include_once("../db_connect.php");
include_once("header_customer.php");
$page = "View-Cars";
$sql = "select * from vehicle_details order by vehicle_id";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<section class="text-center">
	<div class="container-fluid text-center mt-2">
		<div class="row text-center mt-4">
			<div class="col">
				<h3 class="text-dark  mb-2 mt-2">New Cars Available for Rent...... </h3>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php
				while ($row = mysqli_fetch_row($result)) {
					echo '<div class="col-lg-4 col-sm-12 text-center m-2 p-2 bg-light" style="border : 1px solid lightgrey; border-radius: 10px; width:45%">
								<h3 class="text-dark text-center mb-4 mt-0"><strong>' . $row[3] . '</strong></h3>
									<img src="../imgs/' . $row[11] . '" class="rounded ">

						<p class="text-dark mt-2">Car Type ' . $row[4] . '<br> Fuel Type ' . $row[5] . '<br> Mileage ' . $row[6] . '<br> Price Per Day &#8377; ' . $row[12] . ' <br> Available in  ' . $row[7] . '</p>   

						 <a href="booking.php?carid=' . $row[0] . ' " class="btn btn-danger">Book Now </a></div>';
				}
				?>
			</div>
			<div class="text-center">
				<button class="btn btn-primary ">Loading <i class="fa-solid fa-spinner fa-spin fa-lg" style="color: #fafcff;"></i></button>
			</div>

		</div>
</section>
<?php
include_once("footer.php");

?>