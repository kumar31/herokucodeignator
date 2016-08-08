<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class get_my_invited_event_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('client_model');
		$this->load->model('event_model');
	}
	
	
	
	function index()
	{		
		
		$myuser_id = $this->session->userdata('talent_id'); 
		$this->db->select('*');		
		$this->db->where('talent_id',$myuser_id);
		$this->db->where('status','0');
		$this->db->from('invite_talent_to_event');
		$query = $this->db->get(); 
		$result = $query->result_array();
		$result = $this->event_model->event_details($result);
		$result = $this->client_model->client_details($result);
		
		return $result;	
		
	}
	
	
	
	
	
}
	