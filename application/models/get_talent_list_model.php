<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class get_talent_list_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('review_model');
		$this->load->model('event_model');		
		$this->load->model('invite_model');		
		$this->load->model('checkin_model');		
	}
	
	
	
	function index()
	{		
		
	
			$this->db->select('talent_details.talent_id,talent_details.email,talent_details.first_name,talent_details.last_name,talent_details.profile_url
			,talent_details.phone_number,talent_details.address,talent_details.city,talent_details.zipcode,talent_details.country,talent_details.special_skills,talent_details.w9_form,
			talent_details.gender,talent_details.hair_color,talent_details.eye_color,talent_details.height,talent_details.amount,talent_details.stripe_id,talent_details.bank_id,talent_details.recp_id,talent_details.experience,talent_details.total_events_attended,talent_details.average_rating,talent_details.agency');		
			$this->db->from('talent_details');
			$query = $this->db->get(); 
			$result = $query->result_array(); 
			$result = $this->event_model->event_count($result);
			$result = $this->review_model->review_details($result);
			$result = $this->review_model->review_count($result);
			
			return $result;	
		
	}
	
	function talent_details($result)
	{		
		foreach($result as $key=>$val){
			
			$talent_id = $val['talent_id'];
			
			$this->db->select('talent_details.talent_id,talent_details.email,talent_details.first_name,talent_details.last_name,talent_details.profile_url
			,talent_details.phone_number,talent_details.address,talent_details.city,talent_details.zipcode,talent_details.country,talent_details.special_skills,talent_details.w9_form,
			talent_details.gender,talent_details.hair_color,talent_details.eye_color,talent_details.height,talent_details.amount,talent_details.stripe_id,talent_details.bank_id,talent_details.recp_id,talent_details.experience,talent_details.total_events_attended,talent_details.average_rating,talent_details.agency');
			$this->db->where('talent_id',$talent_id);					
			$this->db->from('talent_details');
			$query = $this->db->get(); 
			$result[$key]['talent'] = $query->result_array(); 
			$result = $this->event_model->event_count($result);
			$result = $this->review_model->review_details($result); 
			$result = $this->review_model->review_count($result); 
			$result = $this->checkin_model->checkin_details($result); 
			$result = $this->checkin_model->checkout_details($result); 
			$result = $this->checkin_model->checkout_agreed_details($result); 
			$result = $this->checkin_model->checkout_recheck_details($result); 
			$result = $this->checkin_model->check_details_talent($result); 
			$result = $this->checkin_model->checkout_paid_details($result); 
			$result = $this->checkin_model->checkout_all_details($result); 
			
		}
			return $result;	
		
	}
	
	function talent($talent_id)
	{		
		
	
			$this->db->select('talent_details.talent_id,talent_details.email,talent_details.first_name,talent_details.last_name,talent_details.profile_url
			,talent_details.phone_number,talent_details.address,talent_details.city,talent_details.zipcode,talent_details.country,talent_details.special_skills,talent_details.amount,talent_details.w9_form,
			talent_details.gender,talent_details.hair_color,talent_details.eye_color,talent_details.height,talent_details.amount,talent_details.stripe_id,talent_details.bank_id,talent_details.recp_id,talent_details.experience,talent_details.total_events_attended,talent_details.average_rating,talent_details.agency');		
			$this->db->where('talent_id',$talent_id);			
			$this->db->from('talent_details');
			$query = $this->db->get(); 
			$result = $query->result_array(); 
			
			return $result;	
		
	}
	
}
	