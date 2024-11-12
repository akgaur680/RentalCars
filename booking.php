<?php
ob_start();
session_start();
if (!isset($_SESSION['id'])) {
  header("location:index.php");
}
$page = "Bookings";
include_once('db_connect.php');
include_once('header.php');
$sql = "select * from bookings where user_id = " . $_SESSION['id'];
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    ?>
<section class="container bg-dark">
    
        <div class="col-sm-10 bg-light mt-5" style="border-radius: 10px;" >
          <h1>Booking For the Cars...</h1>

          <center>
                    <table class="table table-bordered table-striped">
                        <tr class="th text-center">
                            <th>Booking ID</th>
                            <th>Date of Booking</th>
                            <th>Pickup Location</th>
                            <th>Car Name</th>
                            <th>Rent Per Day</th>
                            <th>Total Price</th>
                            <th>User Name</th>
                            <th>Print Reciept</th>
                            <th>Share Reciept</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_row($result)) {
                            echo '<tr class="text-center">
                    <td>' . $row[0] . '</td>
                    <td>' . $row[3] . '</td>
                    <td>' . $row[2] . '</td>
                    <td>';
                            $sqlname = "SELECT vehicle_model FROM vehicle_details where vehicle_id = " . $_SESSION['id'];
                            $resultname = mysqli_query($conn, $sqlname)    or die(mysqli_error($conn));
                            $name = mysqli_fetch_row($resultname);
                            echo $name[0] .
                                '</td>
                     <td>';
                            $sqlname = "SELECT rent FROM vehicle_details where vehicle_id = " . $_SESSION['id'];
                            $resultname = mysqli_query($conn, $sqlname)    or die(mysqli_error($conn));
                            $name = mysqli_fetch_row($resultname);
                            echo $name[0] .
                                '</td>
                     <td>' . $row[7] . '</td>
                    <td>';
                            $sqlprice = "SELECT name FROM customers where id =" . $_SESSION['id'];
                            $resultprice = mysqli_query($conn, $sqlprice) or die(mysqli_error($conn));
                            $price = mysqli_fetch_row($resultprice);
                            echo $price[0] .
                                '</td>
                     
                     <td><a href="#"><i class="fa-solid fa-print fa-xl"></i></a></td>
                     <td><a href="#"><i class="fa-brands fa-whatsapp fa-xl"></i></a>&nbsp;&nbsp;&nbsp;
                     <a href="#"><i class="fa-solid fa-envelope fa-xl"></i></a></td>
                    
                    </tr>';
                        }
                        ?>
                    </table>
                </center>
                <br><hr>
        </div>
    </div>
</section>
<?php

    include_once('footer.php');
?>