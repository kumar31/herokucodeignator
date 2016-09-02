<?php

//include phpmailer
require_once('class.phpmailer.php');

//SMTP Settings
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true; 
$mail->SMTPSecure = "tls"; 
$mail->Host       = "email-smtp.us-west-2.amazonaws.com";
$mail->Username   = "AKIAIDMG4EYENA45AOSA";
$mail->Password   = "AsoEpcfn8qAe2tXObKEa53FQg7lb3VmfkJwbycV0EDVC";
//

$mail->SetFrom('info@dogytales.com', 'Sender Name'); //from (verified email address)
$mail->Subject = "Email Subject"; //subject

//message
$body = "This is a test message.";
$body = eregi_replace("[\]",'',$body);
$mail->MsgHTML($body);
//

//recipient
$mail->AddAddress("kumarappan.ssb@gmail.com", "Test Recipient"); 

//Success
if ($mail->Send()) { 
	echo "Message sent!"; die; 
}

//Error
if(!$mail->Send()) { 
	echo "Mailer Error: " . $mail->ErrorInfo; 
} 

?>
