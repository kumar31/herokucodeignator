<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_checkin_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		$this->load->model('events_mail_model');
		$this->load->model('talent_model');
		$this->load->model('variableconfig_model');
	}
	
	
	
	function index()
	{
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
		
		$data = array(
		
			'event_id' 				=> $_POST['event_id'],
			'client_id' 			=> $_POST['client_id'],
			'talent_id' 			=> $_POST['talent_id'],
			'agent_id' 				=> $_POST['agent_id'],
			'checkin_status' 		=> 0,
			'checkin_datetime' 		=> $timeNdate
		);
		
		$this->db->insert('checkin',$data);
		
		$timeNdate = date('D dS M Y h:i A', strtotime($timeNdate));
		
		// email noitification
		$to_email = $this->talent_model->email($_POST['talent_id']); 
		$to_name = $this->talent_model->first_name($_POST['talent_id']);
		$event_name = $this->event_model->event_name($_POST['event_id']);
		$event_contact_name = $this->event_model->firstname($_POST['event_id']);
		$subject = "Outfit - Checked In for event"; 
		$message ="<p>Hi ".$to_name.",</p>";
		$message .="<p>You have been checked in by ".$event_contact_name." for ".$event_name." event at ".$timeNdate.".Please click here to confirm or amend time http://smaatapps.com/nectorv2/website/index.php/login .</p>";
		$message .="<p>Regards,<br>Outfit Admin</p>";	
		
		//$this->events_mail_model->email($to_email,$to_name,$subject,$message);
		
		// sms noitification
		$event_name = urlencode($event_name);
		$phone = $this->talent_model->phone_number($_POST['talent_id']);
		$text = "You have been checked in by ".$event_contact_name." for ".$event_name." event at ".$timeNdate.".Please click here to confirm or amend time http://smaatapps.com/nectorv2/website/index.php/login .";
		$text = urlencode($text);
		$events_smsurl = $this->variableconfig_model->events_smsurl();
		file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);
	}
	
}
	