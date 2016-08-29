<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class client_registration_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}
	
	
	
	function index()
	{
		if($_POST['profile_url'] == "") {
			$profile_url = getenv( 'SOIREE_BASE_URL' ) . '/nectorimg/default-profile.png';
		}
		else {
			$profile_url = $_POST['profile_url'];
		}
		
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
			'company' 			=> $_POST['company'],
			'profile_url' 		=> $profile_url,
			'address' 			=> $_POST['address'],
			'facebook_id' 		=> $_POST['facebook_id'],
			'login_type' 		=> $login_type,
			'date' 				=> $_POST['date'],
			'postal_code' 		=> $_POST['postal_code'],
			'latitude' 			=> $_POST['latitude'],
			'longitude' 		=> $_POST['longitude']
		);
		
		$this->db->insert('client_details',$data);
		$client_id = $this->db->insert_id();
		return $client_id;
	}
	
}
	