<?php

session_start();

include("includes/dbcon.php");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <!--link rel="stylesheet" href="styles/styles12.css"-->
  <link rel="stylesheet" href="css/style1.css">
  <!-- Bootstrap script -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
  <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">




  <style media="screen">
    .question {
      border: solid 3px orange;

    }

    .questionarea {
      padding: 20px 20px;
    }

  </style>


  <title>Login</title>
</head>
<!-- Bootstrao script -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>





<body>
  <?php
    include("includes/header.php");
  ?>

  <!-- Signup -->
  <section class="section1">
    <div style="background-image: url('image/pic2.jpg');
     background-size:width:100%; background-repeat: no-repeat; height:100vh; padding-top:80px; margin-left:0; margin-right:0; background-position:center; /*opacity: 0.5; */align-content: center;" >
     

    <div class="signupform"> 
      <form class="formSignup" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <div class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0" style="background-color: rgba(237,242,247,0.5);">
        <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Admin Login</h2>
        
        <input class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4" placeholder="Email" type="email" name="admin_email">

        <input class="bg-white rounded border border-gray-400 focus:outline-none focus:border-indigo-500 text-base px-4 py-2 mb-4" placeholder="Password" type="password" name="admin_pass">

        
        <br>
        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit" name="admin_login">Login
        </button>
        </div>
      </form>
    </div>
    </div>



  </section>
  <?php
    include("includes/footer.php");
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