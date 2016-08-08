<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class get_event_detail_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('invite_model');
	}
	
	
	
	function index()
	{		
		
	
			$this->db->select('*');		
			$this->db->where('client_id',$_POST['client_id']);		
			$this->db->where('event_id',$_POST['event_id']);		
			$this->db->from('event_detail');
			$query = $this->db->get();
			$result = $query->result_array(); 
			$result = $this->invite_model->invite_details_with_talent_detail($result);
			
			return $result;	
		
	}
	
}
	