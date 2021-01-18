<?php
	session_start();
	include("dbcon.php");
		if(isset($_POST) && !empty($_POST))
		{
		 //echo "<pre>";print_r($_POST);echo "</pre>";
			$email=$_POST['email'];
			$password=md5($_POST['password']);
			$sql="SELECT * FROM users WHERE email='$email'AND password='$password'";
			if($result=$con->query($sql))
			{
				$row=$result->fetch_assoc();
				if(!empty($row))
				{
					//echo "Welcome ".$row['name'];exit;
					$_SESSION['user']=$row;
					header("Location:about us.php");
				}
				else
				{
				echo "email/password is wrong";
			}
		}
	}
?>
<!doctype html>
<html>
<head>
<title>log in</title>
</head>
<body>

<div style="text-align:center;border:1px  dashed blue;background-color:yellow">
<h4><div style="background-color:orange"> log in</div></h4>

<form name="userfrm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

<input type="email" name="email" placeholder="enter email"><br><br>
<input type="password" name="password" placeholder="enter password"><br><br>

<input type="submit" name="" values="SIGN IN">&nbsp &nbsp
<input type="reset" name="" value="CANCEL">

</form><br>
<p>Not registered? Click to <a href="signup.php">Signup</a></p>
</div>
</body>
</html>
