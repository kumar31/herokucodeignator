<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/class.phpmailer.php'; 
class events_mail_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	/*function email_hero($to_email,$to_name,$subject,$message){
	
	   $from_email = "support@beta.outfitstaff.com";
	  
	   $to = $to_email;
	   $headers = "MIME-Version: 1.0" . "\r\n";
	   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	   $headers .= 'From: <'.$from_email.'>' . "\r\n";
	   $headers .= 'Cc: '.$from_email.'' . "\r\n";
	   $headers .= 'Reply-To: <'.$from_email.'>' . "\r\n"; 
	   mail($to,$subject,$message,$headers);
	   
	 
	}*/
	
	function email($to_email,$subject,$message){
	
		$mail             = new PHPMailer();
    	$body             = $message;
    	$body             = eregi_replace("[\]",'',$body);
    	$mail->IsSMTP(); // telling the class to use SMTP
		$SMTP_HOST = getenv( 'SMTP_HOST' );
		$SMTP_USERNAME = getenv( 'SMTP_USERNAME' );
		$SMTP_PASSWORD = getenv( 'SMTP_PASSWORD' );
		$SMTP_FROM = getenv( 'SMTP_FROM' );
    	$mail->Host       = $SMTP_HOST; // SMTP server
    	//$mail->SMTPDebug  = 2;           // enables SMTP debug information (for testing)
    	                                 // 1 = errors and messages
    	                                 // 2 = messages only
    	$mail->SMTPAuth   = true;        // enable SMTP authentication
    	$mail->Host       = $SMTP_HOST; // sets the SMTP server
    	$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
    	$mail->Username   = $SMTP_USERNAME; // SMTP account username
    	$mail->Password   = $SMTP_PASSWORD;        // SMTP account password
    	$mail->SetFrom($SMTP_FROM, 'outfitstaff');
    	$mail->AddReplyTo($SMTP_FROM,"outfitstaff");
    	$mail->Subject    = $subject;
    	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    	$mail->MsgHTML($body);
    	$address = $to_email;
    	$mail->AddAddress($address, "outfitstaff");
    	$mail->Send();
    	
	}
	
}
	