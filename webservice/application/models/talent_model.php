<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function email($talent_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('talent_id',$talent_id);		
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['email'];	
		
	}
	
	function first_name($talent_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('talent_id',$talent_id);		
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['first_name'];	
		
	}
	
	function phone_number($talent_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('talent_id',$talent_id);		
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['phone_number'];	
		
	}
	
	function talent_count($result){
			
			$this->db->select('count(*) as talent_count');	
			$this->db->from('talent_details');
			$query = $this->db->get();
			$invite_count = $query->result_array();
			$talent_count = $invite_count[0]['talent_count']; 
		
			return $talent_count;
	}
	
	function talentdetails($result)
	{		
		
			foreach($result as $key=>$val){
			
				$talent_id = $val['talent_id'];
				
				$this->db->select('first_name,last_name,profile_url,special_skills,gender,hair_color,eye_color,height,address');	
				$this->db->where('talent_id',$talent_id);						
				$this->db->from('talent_details');
				$query = $this->db->get();
				$result[$key]['talent_details'] = $query->result_array(); 
				
			}
			
			return $result;	
		
	}
	
}
	