<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_registration_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mail_model');
		$this->load->model('agent_model');
		$this->load->library('encrypt');
	}
	
	
	
	function index()
	{
		if (!filter_var($_POST['profile_url'], FILTER_VALIDATE_URL) === false) {
			$profile_url = getenv( 'SOIREE_BASE_URL' ) . '/nectorimg/default-profile.png';
		} else if($_POST['profile_url'] == "") {
			$profile_url = getenv( 'SOIREE_BASE_URL' ) . '/nectorimg/default-profile.png';
		}
		else {
			$profile_url = $_POST['profile_url']; 
		}
		
		$user_name = $_POST['first_name'].' '.$_POST['last_name'];
		
		if($_POST['facebook_id'] != "") {
			$login_type = "facebook"; 
		}
		else {
			$login_type = "";
		}
		$password = $this->encrypt->encode($_POST['password']);
		$data = array(
			'email' 	   		=> $_POST['email'],
			'password' 			=> $password,
			'first_name' 		=> $_POST['first_name'],
			'last_name' 		=> $_POST['last_name'],
			'user_name' 		=> $user_name,
			'phone_number' 		=> $_POST['phone_number'],
			'profile_url' 		=> $profile_url,
			'w9_form' 			=> $_POST['w9_form'],
			'w4_form' 			=> $_POST['w4_form'],
			'i9_form' 			=> $_POST['i9_form'],
			'agency' 			=> $_POST['agency'],
			'reg_type' 			=> $_POST['reg_type'],
			'gender' 			=> $_POST['gender'],
			'address' 			=> $_POST['address'],
			'facebook_id' 		=> $_POST['facebook_id'],
			'login_type' 		=> $login_type,
			'date' 				=> $_POST['date'],
			'special_skills' 	=> $_POST['special_skills'],
			'dob' 				=> $_POST['dob'],
			'latitude' 			=> $_POST['latitude'],
			'longitude' 		=> $_POST['longitude']
		);
		
		$this->db->insert('talent_details',$data);
		
		$talent_id = $this->db->insert_id();
		if(($_POST['i9_form'] != '') && ($_POST['w4_form'] != '')){
			$agent_id = $_POST['agency'];
			$this->email($agent_id);
		}
		
		return $talent_id;
	}
	
	function email($agent_id){
		
		// email noitification
		
		$to_email = $this->agent_model->email($agent_id); 
		$to_name = $this->agent_model->name($agent_id);
		$subject = "Outfit - employee form"; 
		$message ="<p>Hi ".$to_name.",</p>";
		$message .="<p>Here i have attached my w4form and i9form.</p>";
		$message .="<p><a href=".$_POST['w4_form'].">w4_form</a></p>";
		$message .="<p><a href=".$_POST['i9_form'].">i9_form</a></p>";
		$message .="<p>Regards,<br>Outfit Admin</p>";	
		
		$this->mail_model->send($to_email,$subject,$message);
		
	}
	
}
	