<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class mail_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	function email_hero($from_email,$to_email,$from_name,$to_name,$subject,$message){
	
	   $from_email = "support@beta.outfitstaff.com";
	   
	   $to = $to_email;
	   $headers = "MIME-Version: 1.0" . "\r\n";
	   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	   $headers .= 'From: <'.$from_email.'>' . "\r\n";
	   $headers .= 'Cc: '.$from_email.'' . "\r\n";
	   $headers .= 'Reply-To: <'.$from_email.'>' . "\r\n"; 
	   mail($to,$subject,$message,$headers);
	   
	 
	}
	
	function email($to_email,$subject,$message){
	
		$mail             = new PHPMailer();
    	$body             = $message;
    	$body             = eregi_replace("[\]",'',$body);
    	$mail->IsSMTP(); // telling the class to use SMTP
    	$mail->Host       = "smtp.mailgun.org"; // SMTP server
    	$mail->SMTPDebug  = 2;           // enables SMTP debug information (for testing)
    	                                 // 1 = errors and messages
    	                                 // 2 = messages only
    	$mail->SMTPAuth   = true;        // enable SMTP authentication
    	$mail->Host       = "smtp.mailgun.org"; // sets the SMTP server
    	$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
    	$mail->Username   = "smaatapp@auto.outfitstaff.com"; // SMTP account username
    	$mail->Password   = ")2gNYK3Ed9K*3Z9Q4n{mWJp#Eb/rTCRq";        // SMTP account password
    	$mail->SetFrom('support@beta.outfitstaff.com', 'outfitstaff');
    	$mail->AddReplyTo("support@beta.outfitstaff.com","outfitstaff");
    	$mail->Subject    = $subject;
    	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    	$mail->MsgHTML($body);
    	$address = $to_email;
    	$mail->AddAddress($address, "outfitstaff");
    	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
    	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
    	$mail->Send();
    	/*if(!$mail->Send()) {
    	echo "Mailer Error: " . $mail->ErrorInfo;
    	} else {
    	echo "Message sent!";
    	}*/
	}
	
}
	