<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class invite_talent_model extends CI_Model {
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
		$this->db->select('*');	
		$this->db->where('event_id',$_POST['event_id']);						
		$this->db->where('client_id',$_POST['client_id']);						
		$this->db->where('talent_id',$_POST['talent_id']);						
		$this->db->where('agent_id',$_POST['agent_id']);						
		$this->db->from('invite_talent_to_event');
		$query = $this->db->get();
		$result = $query->result_array();
		
		if(empty($result)) {
			$dateFormat="Y-m-d H:i:s";
			$timeNdate=gmdate($dateFormat, time());	
			
			$data = array(
				'event_id' 	   			=> $_POST['event_id'],
				'client_id' 	   		=> $_POST['client_id'],
				'talent_id' 			=> $_POST['talent_id'],
				'agent_id' 				=> $_POST['agent_id'],
				/*'start_datetime' 		=> $start_datetime,
				'end_datetime' 			=> $end_datetime,*/
				'datetime' 				=> $timeNdate
			);
			
			$this->db->insert('invite_talent_to_event',$data);
			
			// email noitification
			$to_email = $this->talent_model->email($_POST['talent_id']); 
			$to_name = $this->talent_model->first_name($_POST['talent_id']);
			$event_name = $this->event_model->event_name($_POST['event_id']);
			$event_contact_name = $this->event_model->firstname($_POST['event_id']);
			$event_start_datetime = $this->event_model->start_datetime($_POST['event_id']);
			$event_start_datetime = date('D dS M Y h:i A', strtotime($event_start_datetime));
			$subject = "Outfit - Selected for event"; 
			$message ="<p>Hi ".$to_name.",</p>";
			$message .="<p>".$event_contact_name." wants you for an upcoming event. ".$event_name." on ".$event_start_datetime.". Please click this link for details and to accept the invitation " . getenv( 'SOIREE_BASE_URL' ) . '/index.php/login .</p>';
			$message .="<p>Regards,<br>Outfit Admin</p>";	
			
			$this->mail_model->send($to_email,$subject,$message);
			
			// sms noitification
			$event_name = urlencode($event_name);
			$phone = $this->talent_model->phone_number($_POST['talent_id']);
			$text = "".$event_contact_name." wants you for an upcoming event. ".$event_name." on ".$event_start_datetime.". Please click this link for details and to accept the invitation " . getenv( 'SOIREE_BASE_URL' ) . "/index.php/login .";
			$text = urlencode($text);
			$events_smsurl = $this->variableconfig_model->events_smsurl();
			file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);
		}
	}
	
}
	