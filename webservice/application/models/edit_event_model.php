<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class edit_event_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function index()
	{		
		
	
			$this->db->select('*');		
			$this->db->where('client_id',$_POST['client_id']);		
			$this->db->where('event_id',$_POST['event_id']);		
			$this->db->from('event_detail');
			$query = $this->db->get(); 
			$result = $query->result_array(); 
			return $result;	
		
	}
	
}
	