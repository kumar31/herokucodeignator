<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class sort_talent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function index()
	{		
		
		$best_rating = $_POST['best_rating'];
		$best_rank = $_POST['best_rank'];
		$no_of_event = $_POST['no_of_event'];
		
		
		if($best_rating != ""){
			//$this->db->where('review_star >=',3);
			$this->db->order_by('review_star', 'desc'); 
			$this->db->join('talent_details','talent_details.talent_id=talent_review.talent_id','LEFT');
			
		}
		
		if($no_of_event != ""){
			$this->db->select('*, COUNT(talent_review.talent_id) as total_events');
			$this->db->join('talent_details','talent_details.talent_id=talent_review.talent_id','LEFT');	
			$this->db->group_by('talent_review.talent_id'); 
			$this->db->order_by('total_events', 'desc'); 		
				
		}
		
			
		$this->db->from('talent_review');
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
		
	}
	
}
	