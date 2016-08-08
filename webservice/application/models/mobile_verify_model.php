<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");

class mobile_verify_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('variableconfig_model');
	
	}
	
	
	
	function index()
	{
		$user_id = $_POST['user_id'];
		$result = $this->user(); 
		$phone = urlencode($result[0]['phone_number']);
		
		$rand_num = mt_rand(1000, 9999);
		$this->verifycode($user_id,$rand_num );
		
		$smsurl = $this->variableconfig_model->smsurl();
		
		file_get_contents("".$smsurl."?number=".$phone."&rand=".$rand_num);
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
	
	function verifycode($user_id,$rand_num){
		
		$data = array(				
			"phone_verification_code" 		=> $rand_num,		
		);
		if($_POST['type'] == 1) {
			$this->db->where('client_id', $user_id); 
			$this->db->update('client_details', $data); 
		}
		if($_POST['type'] == 2) {
			$this->db->where('talent_id', $user_id); 
			$this->db->update('talent_details', $data); 
		}
		
	}
	
}
	