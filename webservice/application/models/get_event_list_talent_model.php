<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class get_event_list_talent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('invite_model');
	}
	
	
	
	function index()
	{		
		
	
			$this->db->select('*');	
			$this->db->where('status','0');
			$this->db->from('event_detail');
			$query = $this->db->get();
			$result = $query->result_array(); 
			$result = $this->invite_model->invite_details($result);
			$result = $this->invite_model->invited_details_event($result);
			
			return $result;	
		
	}
	
}
	