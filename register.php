<?php
ob_start();
session_start();
$page = "New-User-Register";
include_once('db_connect.php');
include_once('header.php');
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $gender = $_POST['optradio'];
  $postcode = $_POST['postcode'];
  $descri = $_POST['descri'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $address3 = $_POST['address3'];
  $url = $_POST['url'];
  $phone = $_POST['ph'];
  $imgData = fopen($_FILES['profileimage']['tmp_name'], 'rb');
  //writing the insert query
  $insert_query = "insert into users(username,password,title,first_name,last_name,gender,adress1,adress2,adress3,postcode,description,email,telephone,profile_blob,profile_url) values('$username','$password','$title','$fname','$lname','$gender','$address1','$address2','$address3','$postcode','$descri','$email','$phone','$imgData','$url')";

  $test = mysqli_query($conn, $insert_query) or die(mysqli_error($conn));
}

?>
<div class="container-fluid bg-light">
  <?php
  if (isset($_POST['submit'])) {
    if (isset($row)) {
      echo '<h4 align="center" class="bg-danger text-white">' . $row[1] . ' is already registered with us. Try Logging In with the email id and password</h4>';
    } else {
      if ($test) {
        echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>User "' . $fname . '" is Successfully Registered.</h4>         
              </div>';
      } else
        echo 'Data has not entered';
    }
  }
  ?>

  <h2 class="text-center pt-4"> Fill the Following Details</h2>
  <form action="#" method="post" onsubmit="return validateForm()" name="myform" enctype="multipart/form-data">
    <div class="form-group" id="title">
      <label for="name">Title:</label>
      <select class="form-control" name="title">
        <option>Choose Title</option>
        <option value="mr">Mr.</option>
        <option value="mrs">Mrs</option>
        <option value="ms">Ms</option>
      </select>
    </div>
    <div class="form-group" id="fname">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" placeholder="Enter firstname" name="fname">
      <span class="formerror"></span>

    </div>
    <div class="form-group" id="lname">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
      <span class="formerror"><b></b></span>

    </div>
    <div class="form-group" id="username">
      <label for="fname">Choose User name:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter firstname" name="username">
      <span class="formerror"></span>
    </div>
    <div class="form-group" id="pwd">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="pwd">
      <span class="formerror"></span>
    </div>
    <div class="form-group">
      <label for="gender"> Choose Gender: </label>
      <div class="form-check-inline">

        <label class="form-check-label">
          <input type="radio" class="form-check-input" value="Male" name="optradio">Male
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" value="Female" name="optradio">Female
        </label>
      </div>
      <div class="form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" value="Other" name="optradio">Other
        </label>
      </div>
    </div>


    <div class="form-group" id="address1">
      <label for="comment">Address 1:</label>
      <textarea class="form-control" rows="2" name="address1"></textarea>
      <span class="formerror"></span>
    </div>
    <div class="form-group" id="address2">
      <label for="comment">Address 2:</label>
      <textarea class="form-control" rows="2" name="address2"></textarea> <span class="formerror"></span>
    </div>
    <div class="form-group" id="address3">
      <label for="comment">Address 3:</label>
      <textarea class="form-control" rows="2" name="address3"></textarea>
      <span class="formerror"></span>
    </div>
    <div class="form-group" id="postcode">
      <label for="name">Post Code:</label>
      <input type="text" class="form-control" placeholder="postcode" name="postcode">
      <span class="formerror"></span>
    </div>
    <div class="form-group" id="descri">
      <label for="name">Description:</label>
      <textarea class="form-control" rows="2" name="descri"></textarea>
      <span class="formerror"></span>
    </div>
    <div class="form-group" id="email">
      <label for="email">Email:</label>
      <input type="text" class="form-control" placeholder="Enter email" name="email">
      <span class="formerror"></span>
    </div>
    <div class="form-group" id="ph">
      <label for="ph">Telephone:</label>
      <input type="tel" class="form-control" id="phonenumber" placeholder="Enter Phone No" pattern="[789][0-9]{9}" title="Must Contain Numbers only" name="ph">
      <span class="formerror"></span>
    </div>
    <div class="form-group" id="profileimage">
      <label for="blb">Profile Image:</label>
      <input type="file" class="form-control" id="profileimage" name="profileimage">
      <span class="formerror"></span>
    </div>

    <div class="form-group" id="url">
      <label for="blb">Profile URL:</label>
      <input type="text" class="form-control" name="url">
      <span class="formerror"></span>
    </div>
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script type="text/javascript">
  function setError(id, error) {
    element = document.getElementById(id);
    element.getElementsByClassName('formerror')[0].innerHTML = error;
  }

  function clearErrors() {
    errors = document.getElementsByClassName('formerror');
    for (let item of errors) {
      item.innerHTML = "";
    }
  }

  function validateForm() {

    clearErrors();
    var returnVal = true;
    var fname = document.forms['myform']['fname'].value;
    var lname = document.forms['myform']['lname'].value;
    var email = document.forms['myform']['email'].value;
    var pwd = document.forms['myform']['pwd'].value;


    //validating email for @ and . symbol and a gap between 2 between these symbols
    var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (atpos < 1 || (dotpos - atpos < 2)) {
      setError("email", " * Invalid email");
      returnVal = false;
    }

    var ph = document.forms['myform']['ph'].value;
    if (fname == "") {
      setError("fname", " * Length is too short");
      returnVal = false;
    }
    if (lname == "") {
      setError("lname", " * Length is too short");
      returnVal = false;

    }

    if (ph.length != 10) {
      setError("ph", " * Invalid Phone Nomber");
      returnVal = false;

    }
    //validating password
    if (pwd == "") {
      setError("pwd", " * Password cannot be empty");
      returnVal = false;
    }

    //minimum password length validation  
    if (pwd.length < 8 || pwd.length > 15) {
      setError("pwd", " * Password must be between 8-15 character long");
      returnVal = false;
    }

    return returnVal;
  }
</script>
<?php include_once('footer.php');

?>