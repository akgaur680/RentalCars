<?php
ob_start();
$page = "Talk_to_Us";
include_once('../db_connect.php');
include_once('header_customer.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $query = $_POST['query'];
    //writing the insert query
    $insert_query = "insert into contact(name, email, contact, query) values('$name','$email','$contact','$query')";

    $test = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
    if ($test) {
        echo '<br><div class="bg-dark"><strong>
                <span class="text-white">Thank You for Contacting Us</span> <br> 
                <span class="text-success">We will Contact you Shortly.</span>
                </strong></div>';
        header("refresh:3;url=index.php");
    } else {
        echo "<br><br><br><br><br><br><br><br>";
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

                        <form action="#" method="post" class="ftco-animate bg-light" name="myform">
                            <h1 class="text-dark text-center">Talk To Us</h1>
                            <div class="form-group" id="name">
                                <label for="" class="label" style="font-size: 20px;">Enter Your Name</label>
                                <input type="name" name="name" style="font-size: 15px;" class="form-control" placeholder="Full Name..." required>
                            </div>
                            <div class="form-group" id="email">
                                <label for="" class="label" style="font-size: 20px;">Enter Your Email</label>
                                <input type="email" name="email" style="font-size: 15px;" class="form-control" placeholder="Email id....." required>
                            </div>
                            <div class="form-group" id="contact">
                                <label for="" class="label" style="font-size: 20px;">Enter Your Contact Number</label>
                                <input type="number" name="contact" style="font-size: 15px;" class="form-control" placeholder="Contact....." required>
                            </div>
                            <div class="form-group" id="query">
                                <label for="" class="label" style="font-size: 20px;">Ask Your Question</label>
                                <textarea type="text" name="query" style="font-size: 15px;" class="form-control" placeholder="Question....." required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" style="width: 45%; float: left; margin-right: 2px;" value="Submit" name="submit" class="btn btn-secondary py-3 px-4">
                                <input type="reset" style="width: 45%;" value="Reset" class="btn btn-secondary py-3 px-4">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</section>
<?php
include_once('footer.php');
?>