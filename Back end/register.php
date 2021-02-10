<!-- Registering user after filling signup form-->
<?php

	include("includes/dbcon.php");
	
	if(isset($_POST['submit'])){

		$name = $_POST['name'];

		$city = $_POST['city'];
		$email = $_POST['email'];

		$country = $_POST['country'];
		$image1 = $_FILES['pic']['name'];
		$temp_name = $_FILES['pic']['tmp_name'];
		move_uploaded_file($temp_name,"image/$image1");
		$password=md5($_POST['password']);

		$contact = $_POST['contact'];

		$insert_cust = "insert into customers (name,city,image,password,country,email,contact) values ('$name','$city','$image1','$password','$country','$email','$contact')";

		$run_cust = mysqli_query($con,$insert_cust);

		if($run_cust){

		echo "<script> alert('Welcome to Connectify')</script>";

		echo "<script> window.open('index.php','_self') </script>";

		}
	}
	else {
		echo "Insertion failed!!";
	}
?>



