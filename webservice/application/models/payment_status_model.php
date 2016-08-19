<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class payment_status_model extends CI_Model {
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
			'payment_status' 			=> 1,
		);
		
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->update('checkin',$data);
		
		
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->set('total_events_attended', 'total_events_attended+1', FALSE); 
		$this->db->update('talent_details');
		
		// email noitification
		/*$to_email = $this->talent_model->email($_POST['talent_id']); 
		$to_name = $this->talent_model->first_name($_POST['talent_id']);
		$event_name = $this->event_model->event_name($_POST['event_id']);
		$subject = "Outfit - Checked Out for event"; 
		$message ="<p>Hi ".$to_name.",</p>";
		$message .="<p>You are Checked Out for ".$event_name." event.</p>";
		$message .="<p>Regards,<br>Outfit Admin</p>";	
		
		$this->mail_model->send($to_email,$subject,$message);
		
		// sms noitification
		$event_name = urlencode($event_name);
		$phone = $this->talent_model->phone_number($_POST['talent_id']);
		$text = "Hi you are Checked Out for ".$event_name." event.Total working time ".$_POST['number_of_days'].":D ".$_POST['number_of_hours'].":H ".$_POST['number_of_minutes'].":M. To Accept reply ".$_POST['event_id']."-".$_POST['talent_id']."-Y to 16603334054. Recheck click http://smaatapps.com/nector/website/index.php/talent_fill_timesheet";
		$text = urlencode($text);
		$events_smsurl = $this->variableconfig_model->events_smsurl();
		file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);*/
	}
	
}
	