<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class client_profile_update_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
	}
	
	
	
	function index()
	{
		$this->db->select('*');		
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->from('client_details');
		$query = $this->db->get(); 
		$result = $query->result_array();
		$profile_pic = $result[0]['profile_url'];
		
		if($_POST['profile_url'] == "") {
			$profile_url = $profile_pic;
		}
		else {
			$profile_url = $_POST['profile_url'];
		}
			
		$data = array(
			'first_name' 				=> $_POST['first_name'],
			'last_name' 				=> $_POST['last_name'],
			'phone_number' 				=> $_POST['phone_number'],
			'company' 					=> $_POST['company'],
			'address' 					=> $_POST['address'],
			'profile_url' 				=> $profile_url,
			'postal_code' 				=> $_POST['postal_code'],
			'latitude' 					=> $_POST['latitude'],
			'longitude' 				=> $_POST['longitude']
		);
		
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->update('client_details',$data);
	
	}
	
}
	