<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class invite_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	function invite_details($result){
			
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];
				$client_id = $val['client_id'];
				
				$this->db->select('count(*) as talents_invited');		
				$this->db->where('event_id',$event_id);				
				$this->db->where('client_id',$client_id);				
				$this->db->where('status',0);				
				$this->db->from('invite_talent_to_event');
				$query = $this->db->get();
				$invite_count = $query->result_array(); 
				$result[$key]['talents_invited'] = $invite_count[0]['talents_invited']; 
				
			}
			
			return $result;
	}
	
	function invite_details_with_talent_detail($result){
			
			foreach($result as $key=>$val){
			
				$event_id = $_POST['event_id'];
				$client_id = $_POST['client_id'];
				
				$this->db->select('invite_talent_to_event.invite_id,invite_talent_to_event.event_id,invite_talent_to_event.client_id
				,invite_talent_to_event.talent_id,talent_details.email,talent_details.first_name,talent_details.profile_url,talent_details.phone_number,
				talent_details.address,talent_details.city,talent_details.company,talent_details.amount');		
				$this->db->where('event_id',$event_id);				
				$this->db->where('client_id',$client_id);				
				$this->db->from('invite_talent_to_event');
				$this->db->join('talent_details','talent_details.talent_id=invite_talent_to_event.talent_id','LEFT');	
				$query = $this->db->get();
				$result[$key]['invite_details'] = $query->result_array(); 
				
			}
			
			return $result;
	}
	
	function invited_details_event($result){
			
			foreach($result as $key=>$val){
			
				$event_id = $val['event_id'];
				$client_id = $val['client_id'];
				$talent_id = $_POST['talent_id'];
				
				$this->db->select('*');		
				$this->db->where('event_id',$event_id);				
				$this->db->where('client_id',$client_id);				
				$this->db->where('talent_id',$talent_id);				
				$this->db->from('invite_talent_to_event');
				$query = $this->db->get();
				$invited = $query->result_array(); 
				if(!empty($invited)) {
					$result[$key]['invited_details'] = "1";
				}
				else {
					$result[$key]['invited_details'] = "0";
				}
				
				
			}
			
			return $result;
	}
	
}
	