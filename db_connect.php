<?php
$username='root';
$servername='localhost';
$password='';
$dbname='rentmycar';
$conn=mysqli_connect($servername,$username,$password,$dbname);
//if(!$conn)
if(mysqli_connect_errno())
{
echo mysqli_connect_error();
	die("Could Not Connect To The Server");
}
?>