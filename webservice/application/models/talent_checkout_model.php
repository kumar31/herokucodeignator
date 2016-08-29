<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_checkout_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		$this->load->model('mail_model');
		$this->load->model('talent_model');
		$this->load->model('variableconfig_model');
	}
	
	
	function checkin(){
		
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
		$data = array(
		
			'number_of_days' 			=> $_POST['number_of_days'],
			'number_of_hours' 			=> $_POST['number_of_hours'],
			'number_of_minutes' 		=> $_POST['number_of_minutes'],
			'talent_rating' 			=> $_POST['talent_rating'],
			'checkin_status' 			=> 1,
			'checkout_datetime' 		=> $timeNdate
		);
		
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->update('checkin',$data);
	}
	function index()
	{
		
		$this->checkin();
		
		
		if($_POST['agent_id'] != 0) {
			
			$total_days = $_POST['number_of_days'];
			$total_hrs = $_POST['number_of_hours'];
			if($total_days != 0) {
				$total_hrs = $total_hrs + ($total_days * 24);
			}
			
			$total_mins = $_POST['number_of_minutes'];
			
			$mins = round($total_mins/60 * 100);
			$hrs_mins = $total_hrs . "." . $mins;
			
			
			$this->db->select('*');
			$this->db->from('talent_hourly_pay');		
			$query = $this->db->get();
			$result = $query->result_array(); 
			$outfit_percentage = $result[0]['outfit_fee'];
			$stripe_percentage = $result[0]['stripe_fee'];
			$emp_fee = $result[0]['agent_fee'];
			
			
			$this->db->select('*');
			$this->db->where('agent_id',$_POST['agent_id']);
			$this->db->from('agent_details');		
			$query = $this->db->get();
			$results = $query->result_array(); 
			$agent_percentage = $results[0]['percentage'];
			$agent_outfit_percentage = $results[0]['outfit_fee'];
			
			$this->db->select('*');
			$this->db->where('talent_id',$_POST['talent_id']);
			$this->db->from('talent_details');		
			$query = $this->db->get();
			$result_talent = $query->result_array(); 
			$talent_per_amt = $result_talent[0]['amount'];
			$reg_type = $result_talent[0]['reg_type'];
			
			$fee = $agent_outfit_percentage + $stripe_percentage;
			
			$total_hours_est = $hrs_mins;
			
			if($talent_per_amt != 0) {
				$emp_fee = $talent_per_amt;
			}
			
			$per_talent_amt = $total_hours_est * $emp_fee;
			
			$agent_fee = ($agent_percentage / 100) * $per_talent_amt;
			
			$per_talent_percentage = ($fee / 100) * $per_talent_amt;
			
			$per_talent_earned_amt = round($per_talent_amt - $per_talent_percentage - $agent_fee,2);
			
			
			$clientamt = round($per_talent_amt,2);
				
			$datas = array(
			
				'talent_id' 		=> $_POST['talent_id'],
				'event_id' 			=> $_POST['event_id'],
				'agent_id' 			=> $_POST['agent_id'],
				'amount' 			=> $agent_fee
			);
			
			$this->db->insert('agent_payment_details',$datas);
			
			$datass = array(
			
				'talent_id' 		=> $_POST['talent_id'],
				'event_id' 			=> $_POST['event_id'],
				'agent_id' 			=> $_POST['agent_id'],
				'amount' 			=> $per_talent_earned_amt
			);
			
			$this->db->insert('talent_payment_details',$datass);
			
			$datasc = array(
			
				'client_id' 		=> $_POST['client_id'],
				'event_id' 			=> $_POST['event_id'],
				'amount' 			=> $clientamt
			);
			
			$this->db->insert('client_payment_details',$datasc);
		
		
		}
		if($_POST['agent_id'] == 0) {
			$this->emailnotification();
		}
	
	}
	
	function emailnotification(){
		// email noitification
		$to_email = $this->talent_model->email($_POST['talent_id']); 
		$to_name = $this->talent_model->first_name($_POST['talent_id']);
		$event_name = $this->event_model->event_name($_POST['event_id']);
		$event_contact_name = $this->event_model->firstname($_POST['event_id']);
		$subject = "Outfit - Checked Out for event"; 
		$message ="<p>Hi ".$to_name.",</p>";
		$message .="<p>You have been checked out by ".$event_contact_name." for ".$_POST['number_of_days'].":Days ".$_POST['number_of_hours'].":Hours ".$_POST['number_of_minutes'].":Minutes. Please click here to confirm " . getenv( 'SOIREE_BASE_URL' ) . "/index.php/login.</p>";
		$message .="<p>Regards,<br>Outfit Admin</p>";	
		
		$this->mail_model->send($to_email,$subject,$message);
		
		// sms noitification
		$event_name = urlencode($event_name);
		$phone = $this->talent_model->phone_number($_POST['talent_id']);
		$text = "You have been checked out by ".$event_contact_name." for ".$_POST['number_of_days'].":Days ".$_POST['number_of_hours'].":Hours ".$_POST['number_of_minutes'].":Minutes. To Accept reply ".$_POST['event_id']."-".$_POST['talent_id']."-Y to 16603334054. Recheck click " . getenv( 'SOIREE_BASE_URL' ) . "/index.php/talent_fill_timesheet";
		$text = urlencode($text);
		$events_smsurl = $this->variableconfig_model->events_smsurl();
		file_get_contents("".$events_smsurl."?number=".$phone."&event_name=".$event_name."&text=".$text);
	}
	
}
	