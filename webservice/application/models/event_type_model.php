<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class event_type_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	
	
	function index()
	{		
		
			$this->db->select('*');		
			$this->db->from('event_type');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;
			
		
	}
	function edit()
	{		
		
			$this->db->select('*');		
			$this->db->where('event_type_id',$_POST['event_type_id']);
			$this->db->from('event_type');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;
			
		
	}
	function create()
	{		
		
			$data = array(
			'name'      => $_POST['name'],
			'percentage'=> $_POST['percentage'],
			'status'	=> 1,
			);
			$this->db->insert('event_type',$data);
			
		
	}
	
	function active_inactive(){
		
		$event_type = $this->edit();
		if(!empty($event_type)){
			$agent_status = $event_type[0]['status'];
			if($agent_status == 1){
				
				$result = array('status'=>'2');
				
			}else{
				
				$result = array('status'=>'1');
				
			}
			$this->db->where('event_type_id',$_POST['event_type_id']);
			$this->db->update('event_type',$result);
		}else{
			$result = array('status'=>'3');
		}
		return $result;
	}
	
	function update(){
		
		$data = array(
		'name'      => $_POST['name'],
		'percentage'=> $_POST['percentage']
		);
		$this->db->where('event_type_id',$_POST['event_type_id']);
		$this->db->update('event_type',$data);
		/*if($this->db->affected_rows() > 0){
			return "success";
		}else{
			return "error";
		}*/
	}
	
	function update_settings(){
		
		$data = array(
			'per_hour'      => $_POST['per_hour'],
			'outfit_fee'	=> $_POST['outfit_fee'],
			'stripe_fee'	=> $_POST['stripe_fee'],
			'agent_fee'		=> $_POST['agent_fee']
		);
		$this->db->where('talent_hourly_pay_id',$_POST['pay_id']);
		$this->db->update('talent_hourly_pay',$data);
		
	}
	
	function contractor_update(){
		
		$data = array(
			'amount'      => $_POST['amount']			
		);
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->update('talent_details',$data);
		
	}
	
}
	