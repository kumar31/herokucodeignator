<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_update_timesheet_recheck_model extends CI_Model {
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
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
		
		$data = array(
		
			'number_of_days' 			=> $_POST['number_of_days'],
			'number_of_hours' 			=> $_POST['number_of_hours'],
			'number_of_minutes' 		=> $_POST['number_of_minutes'],
			'checkin_status' 			=> 3
		);
		
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->update('checkin',$data);
		
		$this->db->select('*');	
		$this->db->where('event_id',$_POST['event_id']);						
		$this->db->from('event_detail');
		$query = $this->db->get();
		$result = $query->result_array(); 
		$client_id = $result[0]['client_id'];
		
		// email noitification
		$to_email = $this->client_model->email($client_id); 
		$to_name = $this->client_model->first_name($client_id);
		$event_name = $this->event_model->event_name($_POST['event_id']);
		$talent_name = $this->talent_model->first_name($_POST['talent_id']);
		$subject = "Outfit - Talent requested recheck for timesheet"; 
		$message ="<p>Hi ".$to_name.",</p>";
		$message .="<p>".$talent_name." requested to recheck timesheet for ".$event_name." event attended.</p>";
		$message .="<p>Regards,<br>Outfit Admin</p>";	
		
		$this->mail_model->send($to_email,$subject,$message);
		
		// sms noitification
		$event_name = urlencode($event_name);
		$phone = $this->client_model->phone_number($client_id);
		$text = "".$talent_name." requested to recheck timesheet for ".$event_name." event attended.";
		$text = urlencode($text);
		$events_smsurl = $this->variableconfig_model->events_smsurl();
		file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);
	}
	
}
	