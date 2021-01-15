<?php

session_start();

include("includes/dbcon.php");

?>
<!DOCTYPE HTML>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/login.css" >
<link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Overpass:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;800&family=Ubuntu&display=swap" rel="stylesheet">

</head>

<body>
<?php
include("includes/header.php");
?>
<div class="container" ><!-- container Starts -->
	<div style="background-image: url('image/pic2.jpg');
     background-size:width:100%; background-repeat: no-repeat; height:100vh; padding-top:80px; margin-left:0; margin-right:0; background-position:center ">

<form class="form-login" action="" method="post" ><!-- form-login Starts -->

<h2 class="form-login-heading" >Admin Login</h2>

<input type="text" class="form-control" name="admin_email" placeholder="Email Address" required >

<input type="password" class="form-control" name="admin_pass" placeholder="Password" required >

<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" >

Log in

</button>


</form><!-- form-login Ends -->
</div>
</div><!-- container Ends -->

<?php include("includes/footer.php");
?>

</body>


</html>

<?php

if(isset($_POST['admin_login'])){

$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);

$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

$get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

$run_admin = mysqli_query($con,$get_admin);

$count = mysqli_num_rows($run_admin);

if($count==1){

$_SESSION['admin_email']=$admin_email;

echo "<script>alert('You are Logged in into admin panel')</script>";

echo "<script>window.open('index.php?dashboard','_self')</script>";

}
else {

echo "<script>alert('Email or Password is Wrong')</script>";

}

}

?>