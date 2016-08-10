<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class mail_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	function email($from_email,$to_email,$from_name,$to_name,$subject,$message){
	
	   $from_email = "admin@smaatapps.com";
	   
	   $to = $to_email;
	   $headers = "MIME-Version: 1.0" . "\r\n";
	   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	   $headers .= 'From: <'.$from_email.'>' . "\r\n";
	   $headers .= 'Cc: '.$from_email.'' . "\r\n";
	   $headers .= 'Reply-To: <'.$from_email.'>' . "\r\n"; 
	   mail($to,$subject,$message,$headers);
	   
	 
	}
	
}
	