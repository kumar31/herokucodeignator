<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_checkin_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		$this->load->model('mail_model');
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
		if($_POST['agent_id'] == 0) {
			$message .="<p>You have been checked in by ".$event_contact_name." for ".$event_name." event at ".$timeNdate.".Please click here to confirm or amend time " . getenv( 'SOIREE_BASE_URL' ) . "/index.php/login .</p>";
		}
		else {
			$message .="<p>You have been checked in by ".$event_contact_name." for ".$event_name." event at ".$timeNdate.".</p>";
		}
		$message .="<p>Regards,<br>Outfit Admin</p>";	
		
		$this->mail_model->send($to_email,$subject,$message);
		
		// sms noitification
		$event_name = urlencode($event_name);
		$phone = $this->talent_model->phone_number($_POST['talent_id']); 
		if($_POST['agent_id'] == 0) {
			$text = "You have been checked in by ".$event_contact_name." for ".$event_name." event at ".$timeNdate.".Please click here to confirm or amend time " . getenv( 'SOIREE_BASE_URL' ) . "/website/index.php/login .";
		}
		else {
			$text = "You have been checked in by ".$event_contact_name." for ".$event_name." event at ".$timeNdate.".";
		}
		$text = urlencode($text);
		$events_smsurl = $this->variableconfig_model->events_smsurl();
		file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);
	}
	
}
	