<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];
    $to      = 'dpkr5365@gmail.com';
    $subject = 'Mail from '.$name;
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
	$mail->AddAddress($to, "Deepak Kumar");
	$mail->SetFrom($email, $name);
	//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
	//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
	$mail->Subject = $subject;
	//$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
	$content=$message;

	$mail->MsgHTML($content); 
	if(!$mail->Send()) {
	  echo "Error while sending Email.";
	  var_dump($mail);
	} else {
	  //echo "Email sent successfully";
		echo "<script> alert('Email sent successfully')</script>";

		echo "<script> window.open('contact.php','_self') </script>";
	}
}

?>