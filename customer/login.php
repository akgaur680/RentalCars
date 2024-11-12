<?php
ob_start();

include_once('../db_connect.php');
include_once('header_customer.php');
$page = "Login";

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query =   "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);
	if ($row) {
		$_SESSION['id'] =  $row['id'];
		$_SESSION['name'] = $row['name'];
		header("location:cars.php");
	} else {
		echo "<h3><i>WRONG CREDIDENTIALS</i></h3>";
	}
}
?>
<!-- END nav -->
<section class=" bg-light mt-5">
	<div class="container">
		<div class="row no-gutters">
			<div style=" justify-content: center;">
				<div class="row no-gutters m-4">
					<div style="width: 50%; margin: auto; border: 1px solid lightgrey; border-radius: 10px; box-shadow:  5px 5px lightgrey;" class="text-dark">

						<!-- LOGIN FORM STARTS HERE-->

						<form action="#" class=" bg-light text-dark" method="post" name="login">
							<h1 class="text-dark text-center">Login Here</h1>
							<div class="form-group">
								<label for="" class=" text-dark" style="font-size: 20px;">Enter Your Email</label>
								<input type="email" name="email" style="font-size: 15px;" class="form-control text-dark" placeholder="Email id.....">
							</div>
							<div class="form-group">
								<label for="" class="text-dark" style="font-size: 20px;">Enter Your Password</label>
								<input class="text-dark form-control" name="password" type="password" style="font-size: 15px;" class="" placeholder="Password">
							</div>


							<div class="form-group">
								<input type="submit" name="submit" value="Login" class="btn btn-secondary py-3 px-4">
							</div>
							<p>If Not Registered, Please <a href="register.php" style="text-decoration: none;"> Register Here..</a></p>
						</form>
					</div>

				</div>
			</div>
		</div>
</section>

<?php
include_once("footer.php");

?>