<!-- Sending mail to Delivery Agent-->

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
		$cust = "select * from d_agent where d_agent_id='$id'";
		$run_cust = mysqli_query($con,$cust);
		if($row=mysqli_fetch_array($run_cust)){
			$email = $row['email'];
			$name = $row['name'];
		    $message = $_POST['message'];
		    $from      = <Admin_Gmail_ID>;
		    $subject = 'Admin contact with delivery agent trial. :)';

			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Mailer = "smtp";

			$mail->SMTPDebug  = 1;  
			$mail->SMTPAuth   = TRUE;
			$mail->SMTPSecure = "tls";
			$mail->Port       = 587;
			$mail->Host       = "smtp.gmail.com";
			$mail->Username   = <Admin_Gmail_ID>;
			$mail->Password   = <Admin_Gmail_Password>;

			$mail->IsHTML(true);
			
			$mail->AddAddress($email, $name);
			$mail->SetFrom($from, <Admin Name>);
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
