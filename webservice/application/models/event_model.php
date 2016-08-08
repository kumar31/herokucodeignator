<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class event_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	function first_name($event_id)
	{		
		
			$this->db->select('event_detail.first_name,event_detail.event_name,event_detail.start_datetime,event_detail.end_datetime
			,event_detail.location,event_detail.number_of_guests');	
			$this->db->where('event_id',$event_id);						
			$this->db->from('event_detail');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;	
		
	}
	
	function event_details($result){
			
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];

				$result[$key]['event_details'] = $this->first_name($val['event_id']);
				
			}
			
			return $result;
	}
	
	function event_name($event_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('event_id',$event_id);		
			$this->db->from('event_detail');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['event_name'];	
		
	}
	
	function firstname($event_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('event_id',$event_id);		
			$this->db->from('event_detail');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['event_contact'];	
		
	}
	
	function start_datetime($event_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('event_id',$event_id);		
			$this->db->from('event_detail');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['start_datetime'];	
		
	}
	
	function event_count($result){
			
			foreach($result as $key=>$val){
			
				$talent_id = $val['talent_id'];
				
				$this->db->select('count(*) as events_hired');	
				$this->db->where('talent_id',$talent_id);				
				$this->db->where('status',3);				
				$this->db->from('invite_talent_to_event');
				$query = $this->db->get();
				$invite_count = $query->result_array();
				$result[$key]['events_hired'] = $invite_count[0]['events_hired']; 
				
			}
			
			return $result;
	}
	
}
	