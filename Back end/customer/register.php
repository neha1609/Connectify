<?php

	include("includes/dbcon.php");
	if(isset($_POST['submit']))
	{
		/*echo "<pre>";
		print_r($_POST);echo "</pre>";*/
		$pic=$_POST['pic'];
		$name=$_POST['name'];

		$city=$_POST['city'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$country=$_POST['country'];
		$contact=$_POST['contact'];
		echo $email;

		echo $password;
		$sql="INSERT INTO customers(profile_image,name,email,password, city, country, contact) VALUES('$pic', '$name','$email','$password', '$city', '$country', '$contact')";
		echo $sql;
		if($con->query($sql))
			echo "Signup done!";
		else 
			echo "pls try again";
	}
	else {
		echo "Insertion failed!!";
	}
?>



