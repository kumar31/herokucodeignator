<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class hired_info_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	function index($myuser_id,$event_id)
	{		
		$status = array(1,3);
			$this->db->select('count(*) as hired_count');		
			$this->db->where('event_id',$event_id);		
			$this->db->where('client_id',$myuser_id);	
			$this->db->where_in('status',$status);		
			$this->db->from('invite_talent_to_event');
			$query = $this->db->get();
			$result = $query->result_array(); 
			//$result[0]['count'] = $query->num_rows(); 
			$result[0]['total_amount'] = $this->amount($myuser_id,$event_id);
			$result[0]['pending_count'] = $this->pending($myuser_id,$event_id);
			
			return $result;	
		
	}
	
	function amount($myuser_id,$event_id)
	{		
	$status = array(1,3);
			$this->db->select('invite_talent_to_event.talent_id,sum(talent_details.amount) as total_amount');		
			$this->db->where('event_id',$event_id);		
			$this->db->where('client_id',$myuser_id);	
			$this->db->where_in('invite_talent_to_event.status',$status);		
			$this->db->from('invite_talent_to_event');
			$this->db->join('talent_details','talent_details.talent_id = invite_talent_to_event.talent_id','LEFT');
			$query = $this->db->get();
			$result = $query->result_array(); 
			
			return $result[0]['total_amount'];	
		
	}
	
	function pending($myuser_id,$event_id)
	{		
		
			$this->db->select('count(*) as pending_count');		
			$this->db->where('event_id',$event_id);		
			$this->db->where('client_id',$myuser_id);	
			$this->db->where('status',0);		
			$this->db->from('invite_talent_to_event');
			$query = $this->db->get();
			$result = $query->result_array(); 
			//$result[0]['count'] = $query->num_rows(); 
			
			return $result[0]['pending_count'];	
		
	}
	
}
	