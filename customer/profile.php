<?php
include_once("header_customer.php");
include_once("../db_connect.php");
if (isset($_SESSION['id'])) {
    $sql = "select * from customers where id = " . $_SESSION['id'];
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
}
?>
<section class="ftco-section ftco-no-pt bg-light mt-5">
    <div class="container">
        <div class="row no-gutters">
            <div style=" justify-content: center;">
                <div class="row no-gutters mt-4">
                    <div style="width: 50%; margin: auto; border: 1px solid lightgrey; border-radius: 10px; box-shadow: 5px 5px lightgrey;">

                        <!--PROFILE FORM STARTS HERE -->

                        <form action="#" method="post" class="ftco-animate bg-light">
                            <h1 class="text-dark text-center">Your Profile</h1>
                            <div class="form-group" id="name">
                                <label for="" class="label" style="font-size: 20px;">Your Name</label>
                                <input type="name" name="name" style="font-size: 15px;" class="form-control" value="<?php echo $row['name'];    ?>" readonly>
                            </div>
                            <div class="form-group" id="email">
                                <label for="" class="label" style="font-size: 20px;">Your Email</label>
                                <input type="email" name="email" style="font-size: 15px;" class="form-control" value="<?php echo $row['email'];    ?>" readonly>
                            </div>
                            <div class="form-group" id="contact">
                                <label for="" class="label" style="font-size: 20px;">Your Contact Number</label>
                                <input type="number" name="contact" style="font-size: 15px;" class="form-control" value="<?php echo $row['contact'];    ?>" readonly>
                            </div>
                            <div class="form-group" id="address">
                                <label for="" class="label" style="font-size: 20px;">Your Address</label>
                                <input type="text" name="address" style="font-size: 15px;" class="form-control" value="<?php echo $row['address'];    ?>" readonly>
                            </div>

                            <div class="form-group m-4" style="text-align:center;">
                                <a href="index.php" style="text-decoration: none; color: white;">
                                    <input type="button" style="width: 50%; margin-right: 2px;" value="Close" name="submit" class="btn btn-secondary py-3 px-4  ">
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</section>
<?php
include_once("footer.php");

?>