<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("UTC");
class resetpassword_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
		
	}
	function index()
	{
		$id = $this->uri->segment(2);
		$type = $this->uri->segment(3);
		
		if($type == 1) {
			$this->db->select('*');
			$this->db->where('client_id',$id);
			$this->db->from('client_details');
			$query = $this->db->get(); 
			$result = $query->result_array();
		}
		
		if($type == 2) {
			$this->db->select('*');
			$this->db->where('talent_id',$id);
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array();
		}
	
	}
	
}