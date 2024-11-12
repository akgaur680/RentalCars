<?php
ob_start();
include_once("../db_connect.php");
include_once("header_customer.php");
$page = "Pay-Page";
if (!isset($_SESSION['id'])) {
	header("location:login.php");
} else {
	if (isset($_REQUEST['carid'])) {
		$carid = $_REQUEST['carid'];
		$sql = "SELECT * FROM vehicle_details WHERE vehicle_id=?";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "i", $carid); // "i" denotes the type is integer
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt) or die(mysqli_error($conn));
	}


	if (isset($_POST['pay_submit'])) {

		$pickuplocation = $_POST['pickuplocation'];
		$dropofflocation = $_POST['dropofflocation'];
		$pickupdate = $_POST['pickupdate'];
		$dropoffdate = $_POST['dropoffdate'];
		$days = $_POST['days'];
		$fare = $_POST['fare'];
		$payable = $_POST['payable'];
		$userid = $_SESSION['id'];
		$pickuptime = $_SESSION['time_pick'];
		//writing the insert query
		$insert_query = "insert into bookings(pickuploc, droploc, pickup_date, dropoff_date, days, tprice, payable, car_id, user_id, pickuptime) values('$pickuplocation','$dropofflocation','$pickupdate','$dropoffdate','$days','$fare','$payable','$carid','$userid','$pickuptime')";

		$test = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
		if ($test) {
			echo "Data Inserted";
		} else {
			echo "Data is Not Inserted";
		}
	}
}
?>

<section class="m-5 bg-light">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4" style=" border-radius: 10px; box-shadow: 5px 5px lightgrey;">
				<?php
				if ($row = mysqli_fetch_assoc($result)) {
					echo '<div class=" text-center m-2 p-2 bg-light" style="border : 1px solid lightgrey; border-radius: 10px; width:100%">
								<h3 class="text-dark text-center mb-4 mt-0"><strong>' . $row['vehicle_model'] . '</strong></h3>
									<img src="../imgs/' . $row['image_url'] . '" class="rounded ">

                                    <p class="text-dark mt-2">Car Type : ' . $row['vehicle_bodytype'] . '<br> Fuel Type : ' . $row['fuel_type'] . '<br> Mileage : ' . $row['mileage'] . '<br> Price Per Day &#8377; : ' . $row['rent'] . ' <br> Available in : ' . $row['location'] . '</p>   
                                    </div>';
				}
				?>
			</div>

			<div class="col-sm-4 m-auto" style="border-radius:10px; box-shadow: 5px 5px lightgrey; ">

				<form action="#" class="request-form bg-secondary text-white" method="post" style="border-radius:10px;">
					<h2>Make your trip</h2>
					<div class="form-group">
						<label for="" class="label">Pick-up location</label>
						<input type="text" name="pickuplocation" class="form-control" placeholder="City, Airport, Station, etc" required>
					</div>
					<div class="form-group">
						<label for="" class="label">Drop-off location</label>
						<input type="text" name="dropofflocation" class="form-control" placeholder="City, Airport, Station, etc" required>
					</div>
					<div class="d-flex">
						<div class="form-group mr-2">
							<label for="" class="label">Pick-up date</label>
							<input style="font-size:large;" type="date" name="pickupdate" class="form-control" id="book_pick_date" placeholder="Date" required>
						</div>
						<div class="form-group ml-2">
							<label for="" class="label">Drop-off date</label>
							<input style="font-size:large;" type="date" name="dropoffdate" class="form-control" id="book_off_date" placeholder="Date" required>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="label">Pick-up time</label>
						<input style="font-size:large;" class="form-control"  name="time_pick" id="time_pick" name="pickuptimer" placeholder="11:30 AM" required>
					</div>
					<div class="form-group">
						<button type="button" name="trip_submit" value="Calculate Fare" onclick="calculate()" class="btn btn-secondary py-3 px-4">Calculate Fare </button>
					</div>

			</div>
			<div class="col-sm-4 text-center" style=" border-radius: 10px; box-shadow: 5px 5px lightgrey;">
				<div class="">
					<h1 class=" mb-4 ">Fare Details</h1>
					<hr>

					<?php
					$sqlcustomer = "SELECT * FROM customers WHERE id=" . $_SESSION['id'];

					$resultcustomer = mysqli_query($conn, $sqlcustomer) or die(mysqli_error($conn));
					if ($rowcustomer = mysqli_fetch_row($resultcustomer)) {
						echo '
													
									<lable>Rent Per Day : </lable>	<input class="text-center" type="number" id="rent" placeholder="base price" value="' . $row['rent'] . '" readonly><br> X <br>
										
									<lable>Total Days : </lable>		<input class="text-center" type="number" id="days" name="days" placeholder="Days" readonly><br><br>
									<lable>Total Rent : </lable>		<input class="text-center" type="number" id="fare" name="fare" placeholder="Total Fare" readonly><br><br>
									<lable>GST : </lable>		<input class="text-center" type="number" id="gst" name="gst" placeholder="GST" readonly><br><br>
									<lable>Total Payable : </lable>		<input class="text-center" type="number" id="payable" name="payable" placeholder="Total Payable" readonly><br><br><hr>
										<input  type="submit" name="pay_submit" class="btn btn-primary" value="Pay & Book" >';
					}
					?>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	function calculate() {
		var pickup_date = document.getElementById('book_pick_date').value;
		var dropoff_date = document.getElementById('book_off_date').value;

		// Convert input strings to Date objects
		var date1 = new Date(pickup_date);
		var date2 = new Date(dropoff_date);
		// Check if dates are valid
		if (!isNaN(date1.getTime()) && !isNaN(date2.getTime())) {
			// Calculate the difference in milliseconds
			var difference = Math.abs(date1.getTime() - date2.getTime());
			// Convert milliseconds	 to days (1 day = 24 hours * 60 minutes * 60 seconds * 1000 milliseconds)
			var differenceInDays = difference / (1000 * 60 * 60 * 24);
			// Display the result
			// document.getElementById('result').textContent = "Difference in days: " + differenceInDays;
			document.getElementById('days').value = differenceInDays;
			var fare = differenceInDays * document.getElementById('rent').value;

			document.getElementById('fare').value = fare;

			var gst = fare * 0.18;
			document.getElementById('gst').value = gst;

			var payable = fare + gst;
			document.getElementById('payable').value = payable;

		} else {
			// Handle invalid dates
			document.getElementById('result').textContent = "Please enter valid dates.";
		}
	}
</script>

<?php
include_once("footer.php");
?>