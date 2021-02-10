<!-- Send Email Function in php -->

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
    $to      = <Admin_Gmail_id>;
    $subject = 'Mail from '.$name;
    

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Mailer = "smtp";

	$mail->SMTPDebug  = 1;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "tls";
	$mail->Port       = 587;
	$mail->Host       = "smtp.gmail.com";
	$mail->Username   = <Admin_Gmail_Id>;
	$mail->Password   = <Gmail_Password>;

	$mail->IsHTML(true);
	
	$mail->AddAddress($to, <Admin_Name>);
	$mail->SetFrom($email, $name);
	
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
