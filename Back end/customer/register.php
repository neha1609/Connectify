<?php

	include("includes/dbcon.php");
	/*if(isset($_POST['submit']))
	{*/
		/*echo "<pre>";
		print_r($_POST);echo "</pre>";*/
		/*$pic=$_FILES['pic']['name'];
		$temp=$_FILES['pic']['tmp_name'];
		move_uploaded_file($temp, "image/$pic");*/
		/*$name=$_POST['name'];
		$pic=$_FILES['pic']['name'];
		$temp=$_FILES['pic']['tmp_name'];
		move_uploaded_file($temp, "image/$pic");
		$city=$_POST['city'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$country=$_POST['country'];
		$contact=$_POST['contact'];


		//echo $password;
		$sql="insert into customers(profile_image,name,email,password, city, country, contact) VALUES('$pic', '$name','$email','$password', '$city', '$country', '$contact')";
		//echo $sql;
		if($con->query($sql))
			echo "Signup done!";
		else 
			echo "pls try again";
	}*/
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

		echo "<script> alert('New Category Has Been Inserted')</script>";

		echo "<script> window.open('../index.php','_self') </script>";

		}
	}
	else {
		echo "Insertion failed!!";
	}
?>



