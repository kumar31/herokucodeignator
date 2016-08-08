<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class mobile_number_check_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	
	}
	
	
	
	function index()
	{
		$user_id = $_POST['user_id'];
		$result = $this->user(); 
		
		$verify_code = $_POST['verify_code'];
		$phone_verification_code = $result[0]['phone_verification_code'];
		
		$results = $this->verifycode($user_id,$phone_verification_code,$verify_code);
		return $results;
		
	}
	
	function user() {
		
		if($_POST['type'] == 1) {
			$this->db->select('*');		
			$this->db->where('client_id',$_POST['user_id']);
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		if($_POST['type'] == 2) {
			$this->db->select('*');		
			$this->db->where('talent_id',$_POST['user_id']);		
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		
		return $result;
	}
	
	function verifycode($user_id,$phone_verification_code,$verify_code){
		$data = array(				
			"phone_verification" 		=> 1,		
		);
		
		if($_POST['type'] == 1) {
			if($phone_verification_code == $verify_code) {
				$this->db->where('client_id', $user_id);  
				$this->db->update('client_details', $data); 
			}
		}
		if($_POST['type'] == 2) {
			if($phone_verification_code == $verify_code) {
				$this->db->where('talent_id', $user_id); 
				$this->db->update('talent_details', $data); 
			}
		}
		
	}
	
}
	