<?php

include("dbcon.php");
if(isset($_POST) && !empty($_POST))
{
 /*echo "<pre>";
print_r($_POST);echo "</pre>";*/
$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
//echo $password;
$sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
//echo $sql;
if($con->query($sql))
echo "Signup done!";
else 
	echo "pls try again";
}
?>



