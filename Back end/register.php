<?php

	include("includes/dbcon.php");
	if(isset($_POST['submit']))
	{
		/*echo "<pre>";
		print_r($_POST);echo "</pre>";*/
		$pic=$_POST['pic'];
		$name=$_POST['name'];

		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$country=$_POST['country'];
		$contact=$_POST['contact'];


		//echo $password;
		$sql="INSERT INTO user(profile_image,name,email,password, username, country, contact) VALUES('$pic', '$name','$email','$password', '$username', '$country', '$contact')";
		//echo $sql;
		if($con->query($sql))
			echo "Signup done!";
		else 
			echo "pls try again";
	}
	else {
		echo "Insertion failed!!";
	}
?>



