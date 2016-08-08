<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class review_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	function review_details($result){
			
			foreach($result as $key=>$val){
			
				$talent_id = $val['talent_id'];
				
				$this->db->select('*');	
				$this->db->where('talent_id',$talent_id);						
				$this->db->from('talent_review');
				$query = $this->db->get();
				$result[$key]['review_details'] = $query->result_array(); 
				
			}
			
			return $result;
	}
	
	function review_count($result){
			
			foreach($result as $key=>$val){
			
				$talent_id = $val['talent_id'];
				
				$this->db->select('count(*) as review_count');	
				$this->db->where('talent_id',$talent_id);				
				$this->db->from('talent_review');
				$query = $this->db->get();
				$invite_count = $query->result_array();
				$result[$key]['review_count'] = $invite_count[0]['review_count']; 
				
			}
			
			return $result;
	}
	
}
	