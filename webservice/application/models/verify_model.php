<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class verify_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	function index()
	{
			$id = $this->uri->segment(2);
			$type = $this->uri->segment(3);
			
			//$id = base64_decode($id);
			
			if($type == 1) {
				$this->db->select('*');
				$this->db->where('client_id',$id);
				$this->db->from('client_details');
				$query = $this->db->get();
				$result = $query->result_array();
				$user_id = $result[0]['client_id'];
			}
			if($type == 2) {
				$this->db->select('*');
				$this->db->where('talent_id',$id);
				$this->db->from('talent_details');
				$query = $this->db->get();
				$result = $query->result_array();
				$user_id = $result[0]['talent_id'];
			}	
			
			$email_verification=$result[0]['email_verification'];
			
			if($email_verification == "1")
			{
				$res= "0";
			}
			else{
				$data = array(
					'email_verification' => 1
				);
			
			if($type == 1) {
				$this->db->where('client_id',$id);
				$this->db->update('client_details',$data);
			}
			if($type == 2) {
				$this->db->where('talent_id',$id);
				$this->db->update('talent_details',$data);
			}
			
			
			if($type == 1) {
				$this->db->select('*');
				$this->db->where('client_id',$id);
				$this->db->from('client_details');
				$query = $this->db->get();
				$result = $query->result_array();
				$user_id = $result[0]['client_id'];
			}
			if($type == 2) {
				$this->db->select('*');
				$this->db->where('talent_id',$id);
				$this->db->from('talent_details');
				$query = $this->db->get();
				$result = $query->result_array();
				$user_id = $result[0]['talent_id'];
			}	
			
			$email = $result[0]['email'];
			$first_name = $result[0]['first_name'];
			
			
			$this->email($email,$first_name,$user_id);
				$res= "1";
			}
			return $res;
			
	}
	
	function email($email,$first_name,$user_id){
	
	   $from_email = "support@beta.outfitstaff.com";
	   $to_email = $emailId;
	   $to_username = $firstName;	   
	   $subject = "Outfit";
	   $message ="<p>Hi ".$firstName.",</p>";
	   $message .="<p>Your email has been verified successfully.</p>";
	   $message .="<p>Regards,<br>Outfit Admin</p>";	   
	   
	   $to = $to_email;
	   $headers = "MIME-Version: 1.0" . "\r\n";
	   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	   $headers .= 'From: <'.$from_email.'>' . "\r\n";
	   $headers .= 'Cc: '.$from_email.'' . "\r\n";
	   $headers .= 'Reply-To: <'.$from_email.'>' . "\r\n"; 
	   mail($to,$subject,$message,$headers);
	   
	 
	}
	
}	