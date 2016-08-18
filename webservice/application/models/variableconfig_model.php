<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class variableconfig_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	function smsurl() {
			return getenv( 'SOIREE_BASE_URL' ) . '/twilio/Services/sms.php';
	}
	
	function events_smsurl() {
			return getenv( 'SOIREE_BASE_URL' ) . '/twilio/Services/sms_events.php';
	}
}
	