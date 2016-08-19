<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class launch_event_model extends CI_Model {
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
		
			'launch_status' 		=> 1,
			'launch_datetime' 		=> $timeNdate
		);
		
		$this->db->where('client_id',$_POST['client_id']);	
		$this->db->where('event_id',$_POST['event_id']);	
		$this->db->update('event_detail',$data);
		
		$status = array(1,3);
		
		$this->db->select('*');		
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->where_in('status',$status);
		$this->db->from('invite_talent_to_event');
		$query = $this->db->get(); 
		$result = $query->result_array();
		
		/*foreach($result as $val) {
			$talent_id = $val['talent_id'];
			
			// email noitification
			$to_email = $this->talent_model->email($talent_id); 
			$to_name = $this->talent_model->first_name($talent_id);
			$event_name = $this->event_model->event_name($_POST['event_id']);
			$subject = "Outfit - Event Launched"; 
			$message ="<p>Hi ".$to_name.",</p>";
			$message .="<p>".$event_name." has been launched.</p>";
			$message .="<p>Regards,<br>Outfit Admin</p>";	
			
			$this->mail_model->send($to_email,$subject,$message);
			
			// sms noitification
			$event_name = urlencode($event_name);
			$phone = $this->talent_model->phone_number($talent_id); 
			$text = "".$event_name." event has been launched.";
			$text = urlencode($text);
			$events_smsurl = $this->variableconfig_model->events_smsurl();
			file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);
		
		}*/
		
	
	}
	
}
	