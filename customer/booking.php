<?php
ob_start();
include_once("../db_connect.php");
include_once("header_customer.php");
$page = "Booking-Page";
if (isset($_SESSION['id'])) {
    if (isset($_REQUEST['carid'])) {
        $carid = $_REQUEST['carid'];
        $sql = "SELECT * FROM vehicle_details WHERE vehicle_id=" . $carid;
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
} else {
    header('location:login.php');
}
?>


<section class="container m-5 text-center" style="margin:auto;">
    <div class="row">
        <div class="col-sm-6" style=" width:45%; border-radius: 10px; box-shadow: 5px 5px lightgrey;">
            <?php
            if ($row = mysqli_fetch_row($result)) {
                echo '<div class=" text-center m-2 p-2 bg-light" style="border : 1px solid lightgrey; border-radius: 10px; width:100%">
								<h3 class="text-dark text-center mb-4 mt-0"><strong>' . $row[3] . '</strong></h3>
									<img src="../imgs/' . $row[11] . '" class="rounded ">

                                    <p class="text-dark mt-2">Car Type ' . $row[4] . '<br> Fuel Type ' . $row[5] . '<br> Mileage ' . $row[6] . '<br> Price Per Day &#8377; ' . $row[12] . ' <br> Available in  ' . $row[7] . '</p>   
                                    </div>';
            }
            ?>
        </div>
        <div class="col-sm-6 p-4" style=" width:45%; border: 1px solid grey; border-radius: 10px; box-shadow: 5px 5px lightgrey;">
            <form>
                <?php
                $sqlcustomer = "SELECT * FROM customers WHERE id=" . $_SESSION['id'];

                $resultcustomer = mysqli_query($conn, $sqlcustomer) or die(mysqli_error($conn));
                if ($rowcustomer = mysqli_fetch_row($resultcustomer)) {
                    echo '
                        <h1>Customer Details:</h1>
                        <br>
                        <label for="name">Full Name:</label>
                        <input type="text" value="' . $rowcustomer[1] . '"><br><br>
                        <label for="cno">Contact No.:</label>
                        <input type="number" value="' . $rowcustomer[3] . '"><br><br>
                        <label for="email">Email ID:</label>
                        <input type="email" id="email" name="email" value="' . $rowcustomer[2] . '"><br><br>
                        <label for="address">Full Address:</label>
                        <textarea id="address" name="address">' . $rowcustomer[4] . '</textarea><br><br>
                        <label for="uid">Aadhaar No :</label>
                        <input type="number" value="' . $rowcustomer[1] . '"><br><br>
                        <a href="pay.php?carid=' . $row[0] . ' " style="text-decoration: none; color: white;"><input class="btn btn-primary" value="Reserve"></a>
                    ';
                }
                ?>
                
            </form>
        </div>

    </div>
    <br>
    <hr>

</section>



<?php
include_once("footer.php");
?>