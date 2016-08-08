<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class get_talent_list_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('review_model');
		$this->load->model('event_model');		
	}
	
	
	
	function index()
	{		
		
	
			$this->db->select('talent_details.talent_id,talent_details.email,talent_details.first_name,talent_details.last_name,talent_details.profile_url
			,talent_details.phone_number,talent_details.address,talent_details.city,talent_details.zipcode,talent_details.country,talent_details.special_skills,
			talent_details.gender,talent_details.hair_color,talent_details.eye_color,talent_details.height,talent_details.amount,talent_details.agency');		
			$this->db->from('talent_details');
			$query = $this->db->get(); 
			$result = $query->result_array();
			//$result = $this->talent_model->talent_count($result);
			$result = $this->event_model->event_count($result);
			$result = $this->review_model->review_details($result);
			$result = $this->review_model->review_count($result);
			
			return $result;	
		
	}
	
}
	