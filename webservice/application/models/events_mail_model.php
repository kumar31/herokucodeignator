<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
require APPPATH.'/libraries/class.phpmailer.php';
class events_mail_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	function email_hero($to_email,$to_name,$subject,$message){
	
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
	
		
    	
	}
	
}
	