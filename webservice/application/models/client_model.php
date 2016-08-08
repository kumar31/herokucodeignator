<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class client_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function email($client_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['email'];	
		
	}
	
	function first_name($client_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['first_name'];	
		
	}
	
	function phone_number($client_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['phone_number'];	
		
	}
	
	function client_details($result){
			
			foreach($result as $key=>$val){
			
				$result[$key]['client_first_name'] = $this->first_name($val['client_id']);
				
			}
			
			return $result;
	}
	
}
	