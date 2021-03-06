<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class cancel_pending_invite_client_model extends CI_Model {
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
		
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->delete('invite_talent_to_event');
		
		
		// email noitification
		$to_email = $this->talent_model->email($_POST['talent_id']); 
		$to_name = $this->talent_model->first_name($_POST['talent_id']);
		$event_name = $this->event_model->event_name($_POST['event_id']);
		$subject = "Outfit - Invite cancelled for event"; 
		$message ="<p>Hi ".$to_name.",</p>";
		$message .="<p>Invite cancelled for ".$event_name." event.</p>";
		$message .="<p>Regards,<br>Outfit Admin</p>";	
		
		$this->mail_model->send($to_email,$subject,$message);
		
		// sms noitification
		$event_name = urlencode($event_name);
		$phone = $this->talent_model->phone_number($_POST['talent_id']);
		$text = "Invite cancelled for ".$event_name." event.";
		$text = urlencode($text);
		$events_smsurl = $this->variableconfig_model->events_smsurl();
		file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);
	}
	
}
	