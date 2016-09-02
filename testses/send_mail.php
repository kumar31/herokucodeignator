<?php

//include phpmailer
require_once('class.phpmailer.php');

//SMTP Settings
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true; 
$mail->SMTPSecure = "tls"; 
$mail->Host       = "email-smtp.us-west-2.amazonaws.com";
$mail->Username   = "AKIAJ2OC3OC7XWIUQ4IQ";
$mail->Password   = "Ao9duOh7Y9c8hL83gshFgnmfzdTWIdpgZvg9+oNIuFzE";
//

$mail->SetFrom('support@gobaseapp.com', 'Sender Name'); //from (verified email address)
$mail->Subject = "Email Subject"; //subject

//message
$body = "This is a test message.";
$body = eregi_replace("[\]",'',$body);
$mail->MsgHTML($body);
//

//recipient
$mail->AddAddress("rajesh89r@gmail.com", "Test Recipient"); 

//Success
if ($mail->Send()) { 
	echo "Message sent!"; die; 
}

//Error
if(!$mail->Send()) { 
	echo "Mailer Error: " . $mail->ErrorInfo; 
} 

?>
