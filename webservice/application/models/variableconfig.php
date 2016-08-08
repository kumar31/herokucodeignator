<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class variableconfig extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	function smsurl() {
			return "http://smaatapps.com/nectorv2/twilio/Services/sms.php";
	}
	
	function events_smsurl() {
			return "http://smaatapps.com/nectorv2/twilio/Services/sms_events.php";
	}
	
}
	