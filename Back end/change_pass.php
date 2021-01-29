<?php
  include("includes/dbcon.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <!--link rel="stylesheet" href="styles/styles12.css"-->
  <link rel="stylesheet" href="styles/style.css">
  <!-- Bootstrap script -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
  <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <style media="screen">
    .question {
      border: solid 3px orange;

    }

    .questionarea {
      padding: 20px 20px;
    }

  </style>


  <title>Change Password</title>
</head>

<!-- Bootstrao script -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<?php
    include("includes/header.php");
  ?>

  <!-- Signup -->
  <section class="section1">
    <div style="background-image: url('image/pic2.jpg');
     width:100%; background-repeat: no-repeat; height:100vh; padding-bottom: 80px; margin-left:0; margin-right:0; background-position:center; /*opacity: 0.5; */align-content: center;" >
     

	    <div class="signupform"> 

			
			<form class="formSignup" action="" method="post">
				<div class="lg:w-2/6 md:w-1/2 bg-gray-200 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0" style="background-color: rgba(237,242,247,0.5);">
				<h2 align="center">Change Password </h2>
				
			    <label>Enter Your Current Password</label>

				<input type="password" name="old_pass" class="form-control" required>

			    <br>
			        <div class="form-group"><!-- form-group Starts -->

						<label>Enter Your New Password</label>

						<input type="password" name="new_pass" class="form-control" required>

					</div><!-- form-group Ends -->


					<div class="form-group"><!-- form-group Starts -->

						<label>Enter Your New Password Again</label>

						<input type="password" name="new_pass_again" class="form-control" required>

					</div><!-- form-group Ends -->

					<div class="text-center"><!-- text-center Starts -->

						<button type="submit" name="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">

							<i class="fa fa-user-md"> </i> Change Password

						</button>

					</div><!-- text-center Ends -->
			        <p>New user?
			          <a href="signup.php">Signup</a>
			        </p>
	        	</div>
	      	</form>
			
	    </div>
    </div>



  </section>
  <?php
    include("includes/footer.php");
  ?>

<?php

	if(isset($_POST['submit'])){

		$c_email = $_SESSION['email'];

		$old_pass = md5($_POST['old_pass']);

		$new_pass = md5($_POST['new_pass']);

		$new_pass_again = md5($_POST['new_pass_again']);

		$sel_old_pass = "select * from customers where password='$old_pass'";

		$run_old_pass = mysqli_query($con,$sel_old_pass);

		$check_old_pass = mysqli_num_rows($run_old_pass);

		if($check_old_pass==0){

			echo "<script>alert('Your Current Password is not valid try again')</script>";

			exit();

		}

		if($new_pass!=$new_pass_again){

			echo "<script>alert('Your New Password dose not match')</script>";

			exit();

		}

		$update_pass = "update customers set password='$new_pass' where email='$c_email'";

		/*$run_pass = mysqli_query($con,$update_pass);*/

		if($result=$con->query($update_pass))
	    {
	    	/*echo "<script>alert('your Password Has been Changed Successfully')</script>";*/
	    	/*header("Location:../index.php");*/
	    	echo "<script>window.open('index.php','_self')</script>";
	        
	    }
		/*if($run_pass){
	      //echo "Welcome ".$row['name'];exit;
	      	$_SESSION['customers']=$run_pass;
		    header("Location:../index.php");
			echo "<script>alert('your Password Has been Changed Successfully')</script>";
			/*echo "<script>window.open('my_account.php?my_orders','_self')</script>";
		}*/
	}



?>







