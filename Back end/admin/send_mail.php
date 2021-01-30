<?php
include("includes/dbcon.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
if(isset($_POST['submit'] )) {
	if(isset($_GET['id'])) {

		$id=$_GET['id'];
		$cust = "select * from vendor where vendor_id='$id'";
		$run_cust = mysqli_query($con,$cust);
		if($row=mysqli_fetch_array($run_cust)){
			$email = $row['email'];
			$name = $row['name'];
		    $message = $_POST['message'];
		    $from      = 'dpkr5365@gmail.com';
		    $subject = 'Admin contact with vendor trial. :)';
		    //$headers = 'From: '.$email . "\r\n" .
		        //"CC: nehajhawar1609@gmail.com";

			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Mailer = "smtp";

			$mail->SMTPDebug  = 1;  
			$mail->SMTPAuth   = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port       = 587;
			$mail->Host       = "smtp.gmail.com";
			$mail->Username   = "dpkr5365@gmail.com";
			$mail->Password   = "Helloworld#123";

			$mail->IsHTML(true);
			//$mail->AddAddress("hemangee4700@gmail.com", "Hemangee De");
			//$mail->SetFrom("dpkr5365@gmail.com", "Deepak Kumar");
			$mail->AddAddress($email, $name);
			$mail->SetFrom($from, "Deepak Kumar");
			//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
			//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
			$mail->Subject = $subject;
			//$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
			$content=$message;

			$mail->MsgHTML($content); 
			if(!$mail->Send()) {
			  echo "Error while sending Email.";
			  var_dump($mail);
			} 
			else {
			  //echo "Email sent successfully";
				echo "<script> alert('Email sent successfully')</script>";

				echo "<script> window.open('contact.php','_self') </script>";
			}
		}
	}
}

?>