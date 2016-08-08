<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class agent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function email($agent_id)
	{		
			
			$this->db->select('email');		
			$this->db->where('agent_id',$agent_id);		
			$this->db->from('agent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['email'];	
		
	}
	
	function name($agent_id)
	{		
		
			$this->db->select('name');		
			$this->db->where('agent_id',$agent_id);		
			$this->db->from('agent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['name'];	
		
	}
	
	
}
	