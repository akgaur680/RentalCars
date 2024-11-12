<?php
ob_start();
$page = "New-Customer-Register";
include_once('../db_connect.php');
include_once("header_customer.php");
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	//writing the insert query
	$insert_query = "insert into customers(name, email, contact, address, password) values('$name','$email','$contact','$address','$password')";

	$test = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
	if ($test) {
		echo "Data Inserted";
	} else {
		echo "Data is Not Inserted";
	}
}

?>



<section class="ftco-section ftco-no-pt bg-light mt-5">
	<div class="container">
		<div class="row no-gutters">
			<div style=" justify-content: center;">
				<div class="row no-gutters mt-4">
					<div style="width: 50%; margin: auto; border: 1px solid lightgrey; border-radius: 10px; box-shadow: 5px 5px lightgrey;">

						<!--REGISTRATION FORM STARTS HERE -->

						<form action="#" method="post" class="ftco-animate bg-light" onsubmit="return validateForm()" name="myform" enctype="multipart/form-data">
							<h1 class="text-dark text-center">Register Here</h1>
							<div class="form-group" id="name">
								<label for="" class="label" style="font-size: 20px;">Enter Your Name</label>
								<input type="name" name="name" style="font-size: 15px;" class="form-control" placeholder="Full Name..." required>
							</div>
							<span class="formerror"></span>
							<div class="form-group" id="email">
								<label for="" class="label" style="font-size: 20px;">Enter Your Email</label>
								<input type="email" name="email" style="font-size: 15px;" class="form-control" placeholder="Email id....." required>
							</div>
							<span class="formerror"></span>
							<div class="form-group" id="contact">
								<label for="" class="label" style="font-size: 20px;">Enter Your Contact Number</label>
								<input type="number" name="contact" style="font-size: 15px;" class="form-control" placeholder="Contact....." required>
							</div>
							<span class="formerror"></span>
							<div class="form-group" id="address">
								<label for="" class="label" style="font-size: 20px;">Enter Your Address</label>
								<input type="text" name="address" style="font-size: 15px;" class="form-control" placeholder="Address....." required>
							</div>
							<span class="formerror"></span>
							<div class="form-group" id="password">
								<label for="" class="label" style="font-size: 20px;">Enter Your Password</label>
								<input type="password" name="password" style="font-size: 15px;" class="form-control" placeholder="Password" required>
							</div>
							<span class="formerror"></span>


							<div class="form-group">
								<input type="submit" style="width: 45%; float: left; margin-right: 2px;" value="Register" name="submit" class="btn btn-secondary py-3 px-4">
								<input type="reset" style="width: 45%;" value="Reset" class="btn btn-secondary py-3 px-4">
							</div>
							<p>If Already Registered, Please <a href="login.php" style="text-decoration: none; "> Login Here..</a></p>
						</form>
					</div>

				</div>
			</div>
		</div>
</section>


<?php
include_once("footer.php");

?>