<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class getprofile_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	
	
	function index()
	{		
		if($_POST['type'] == 1) {
			$this->db->select('*');		
			$this->db->where('email',$_POST['email']);		
			$this->db->where('password',$_POST['password']);
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			
			return $result;
			
		}
		
		if($_POST['type'] == 2) {
			$this->db->select('*');		
			$this->db->where('email',$_POST['email']);		
			$this->db->where('password',$_POST['password']);
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			
			return $result;
			
		}
	}
	
}
	