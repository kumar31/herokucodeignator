<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class agent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function checkin_details($agentid)
	{		
		
		$where = "select event_id from checkin where agent_id=$agentid";
		$query = "select * from event_detail where event_id IN ($where)";
		$query = $this->db->query($query);
		$results = $query->result_array();
		
		return $results;
	}
	
	function agent_details($agentid)
	{		
		
		$this->db->select('*');	
		$this->db->where('agent_id',$agentid);
		$this->db->from('agent_details');
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
	}
	
	function talents_details($agentid,$eventid)
	{		
			$this->db->select('talent_details.*,checkin.*,talent_payment_details.amount');	
			$this->db->where('talent_payment_details.agent_id',$agentid);
			$this->db->where('talent_payment_details.event_id',$eventid);
			$this->db->where('talent_payment_details.transaction_id !=',"");
			$this->db->from('talent_payment_details');			
			$this->db->join('talent_details','talent_details.talent_id=talent_payment_details.talent_id','LEFT');			
			$this->db->join('checkin','checkin.talent_id=talent_payment_details.talent_id','LEFT');
			$this->db->where('checkin.event_id',$eventid);			
			$query = $this->db->get();
			$result = $query->result_array(); 
	
		return $result;
	}
	
	function profit_details($agent_id) {
		$this->db->select('sum(agent_payment_details.amount) as total_amount');
		$this->db->where('agent_id',$agent_id);
		$this->db->where('transaction_id !=',"");
		$this->db->from('agent_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		return $result;	
	}
	
	function revenue_details($agentid) {
		
		$this->db->select('sum(talent_payment_details.amount) as total_amount');
		$this->db->where('agent_id',$agentid);
		$this->db->where('transaction_id !=',"");
		$this->db->from('talent_payment_details');			
		$query = $this->db->get();
		$result = $query->result_array();
	
		return $result;
	}
	
}
	