    <?php
    ob_start();
    include_once("../db_connect.php");
    include_once("header_customer.php");
    $sql = "select * from bookings where user_id = " . $_SESSION['id'];
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    ?>
    <div class="container">
        <div class="row m-auto">
            <div class="pack-col mt-4">
                <h1>History of Your Bookings With Us...</h1><br>
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
            </div>
        </div>
    </div>
    <?php
    include_once("footer.php");

    ?>