<?php 
session_start();
//closing the session
unset($_SESSION["user"]);
session_destroy();

echo '<div class="container-fluid bg-dark text-white"><h1>You have Been Logged Out Successfully. You will be redirected to the index page in few seconds.</h1></div>';
//moving to the index page
header('REFRESH:3;url=index.php');
?>