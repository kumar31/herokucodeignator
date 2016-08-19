<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_apply_event_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('client_model');
		$this->load->model('event_model');
		$this->load->model('mail_model');
		$this->load->model('talent_model');
		$this->load->model('variableconfig_model');
	}
	
	
	
	function index()
	{		
		$result = $this->event_detail();
		$client_id = $result[0]['client_id'];
		
		$this->db->select('*');	
		$this->db->where('event_id',$_POST['event_id']);						
		$this->db->where('client_id',$client_id);						
		$this->db->where('talent_id',$_POST['talent_id']);					
		$this->db->from('invite_talent_to_event');
		$query = $this->db->get();
		$results = $query->result_array();
		
		if(empty($results)) {
		
			$dateFormat="Y-m-d H:i:s";
			$timeNdate=gmdate($dateFormat, time());	
			
			$data = array(
				'event_id' 	   			=> $_POST['event_id'],
				'client_id' 	   		=> $client_id,
				'talent_id' 			=> $_POST['talent_id'],
				'status' 				=> 5,
				'datetime' 				=> $timeNdate
			);
			
			$this->db->insert('invite_talent_to_event',$data);
				
			// email noitification
			$to_email = $this->client_model->email($client_id); 
			$to_name = $this->client_model->first_name($client_id);
			$event_name = $this->event_model->event_name($_POST['event_id']);
			$talent_name = $this->talent_model->first_name($_POST['talent_id']);
			$subject = "Outfit - Invite for event"; 
			$message ="<p>Hi ".$to_name.",</p>";
			$message .="<p>".$talent_name." has applied for ".$event_name." event.</p>";
			$message .="<p>Regards,<br>Outfit Admin</p>";	
			
			$this->mail_model->send($to_email,$subject,$message);
			
			// sms noitification
			$event_name = urlencode($event_name);
			$phone = $this->client_model->phone_number($client_id);
			$text = "".$talent_name." has applied for ".$event_name." event.";
			$text = urlencode($text);
			$events_smsurl = $this->variableconfig_model->events_smsurl();
			file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);
		}
		
	}
	
	function event_detail() {
		$this->db->select('*');	
		$this->db->where('event_id',$_POST['event_id']);						
		$this->db->from('event_detail');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		return $result;
	}
	
}
	