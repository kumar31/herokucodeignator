<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class checkin_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->helper('cookie');
	}
	
	
	function checkin_details($result){
		
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];
				$client_id = $val['client_id'];
				//$talent_id = $this->session->userdata('talent_id');
				$talent_id = $val['talent_id'];
				
				$this->db->select('*');		
				$this->db->where('event_id',$event_id);				
				$this->db->where('client_id',$client_id);				
				$this->db->where('talent_id',$talent_id);				
				$this->db->from('checkin');
				$query = $this->db->get();
				$invited = $query->result_array(); 
				if(!empty($invited)) {
					$result[$key]['check_details'] = "1";
				}
				else {
					$result[$key]['check_details'] = "0";
				}
				
			}
			
			return $result;
	}
	
	function checkout_details($result){
		
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];
				$client_id = $val['client_id'];
				//$talent_id = $this->session->userdata('talent_id');
				$talent_id = $val['talent_id'];
				
				$this->db->select('*');		
				$this->db->where('event_id',$event_id);				
				$this->db->where('client_id',$client_id);				
				$this->db->where('talent_id',$talent_id);				
				$this->db->where('checkin_status',1);				
				$this->db->from('checkin');
				$query = $this->db->get();
				$invited = $query->result_array(); 
				if(!empty($invited)) {
					$result[$key]['checkout_detail'] = "1";
				}
				else {
					$result[$key]['checkout_detail'] = "0";
				}
				
			}
			
			return $result;
	}
	
	function checkout_agreed_details($result){
		
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];
				$client_id = $val['client_id'];
				//$talent_id = $this->session->userdata('talent_id');
				$talent_id = $val['talent_id'];
				
				$this->db->select('*');		
				$this->db->where('event_id',$event_id);				
				$this->db->where('client_id',$client_id);				
				$this->db->where('talent_id',$talent_id);				
				$this->db->where('checkin_status',2);				
				$this->db->from('checkin');
				$query = $this->db->get();
				$invited = $query->result_array(); 
				if(!empty($invited)) {
					$result[$key]['checkout_agreed_detail'] = "1";
				}
				else {
					$result[$key]['checkout_agreed_detail'] = "0";
				}
				
			}
			
			return $result;
	}
	
	function checkout_recheck_details($result){
		
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];
				$client_id = $val['client_id'];
				//$talent_id = $this->session->userdata('talent_id');
				$talent_id = $val['talent_id'];
				
				$this->db->select('*');		
				$this->db->where('event_id',$event_id);				
				$this->db->where('client_id',$client_id);				
				$this->db->where('talent_id',$talent_id);				
				$this->db->where('checkin_status',3);				
				$this->db->from('checkin');
				$query = $this->db->get();
				$invited = $query->result_array(); 
				if(!empty($invited)) {
					$result[$key]['checkout_recheck_detail'] = "1";
				}
				else {
					$result[$key]['checkout_recheck_detail'] = "0";
				}
				
			}
			
			return $result;
	}
	
	function talent_checkout_details($event_id,$myuser_id){
	
		$event_id = $event_id;
		$talent_id = $myuser_id;
		
		$this->db->select('*');		
		$this->db->where('event_id',$event_id);					
		$this->db->where('talent_id',$talent_id);				
		$this->db->where('checkin_status',1);				
		$this->db->from('checkin');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		return $result;
		
	}
	
	function first_name($event_id,$client_id,$talent_id)
	{		
		
			$this->db->select('*');	
			$this->db->where('event_id',$event_id);						
			$this->db->where('client_id',$client_id);						
			$this->db->where('talent_id',$talent_id);						
			$this->db->from('checkin');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;	
		
	}
	
	function check_details_talent($result){
			
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];
				$client_id = $val['client_id'];
				$talent_id = $val['talent_id'];

				$result[$key]['check_details_talent'] = $this->first_name($event_id,$client_id,$talent_id);
				
			}
			
			return $result;
	}
	
	function rating_details($result)
	{		
		foreach($result as $key=>$val){
			
			$talent_id = $val['talent_id'];
			
			$this->db->select('count(*) as rating_count');
			$this->db->where('talent_id',$talent_id);					
			$this->db->from('checkin');
			$query = $this->db->get(); 
			$rate = $query->result_array(); 
			$result[$key]['rating'] = $rate[0]['rating_count'];
			//$result = $this->rating($result);
			
		}
			return $result;	
		
	}
	
	function rating_avg($result)
	{		
		foreach($result as $key=>$val){
			
			$talent_id = $val['talent_id'];
			
			$this->db->select('avg(talent_rating) as talent_rating');
			$this->db->where('talent_id',$talent_id);					
			$this->db->from('checkin');
			$query = $this->db->get(); 
			$rate = $query->result_array(); 
			$result[$key]['rating_avg'] = round($rate[0]['talent_rating']);
			//$result = $this->rating($result);
			
		}
			return $result;	
		
	}
	
	function checkout_all_details($result)
	{		
		foreach($result as $key=>$val){
			$event_id = $val['event_id'];
			$this->db->select('sum(checkin_status) as talent_sum');
			$this->db->where('event_id',$event_id);					
			$this->db->from('checkin');
			$query = $this->db->get(); 
			$rate = $query->result_array(); 
			$result[$key]['talent_sum'] = round($rate[0]['talent_sum']);
		}
		return $result;
	}
	
	function checkout_paid_details($result){
		
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];
				$talent_id = $val['talent_id'];
				
				$this->db->select('*');		
				$this->db->where('event_id',$event_id);				
				$this->db->where('talent_id',$talent_id);					
				$this->db->from('talent_payment_details');
				$query = $this->db->get();
				$paid = $query->result_array(); 
				$result[$key]['checkout_paid_detail'] = "";
				$result[$key]['checkout_not_paid_detail'] = "";
				
				if(!empty($paid)) {
					$result[$key]['checkout_paid_detail'] = "1";
				}
				else {
					$result[$key]['checkout_not_paid_detail'] = "1";
				}
				
			}
			
			return $result;
	}
	
	
	
}
	