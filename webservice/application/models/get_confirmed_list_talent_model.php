<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class get_confirmed_list_talent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function index()
	{		
		
	
			$this->db->select('*');		
			$this->db->where('talent_id',$_POST['talent_id']);
			$this->db->where('status','3');
			$this->db->from('invite_talent_to_event');
			$query = $this->db->get(); 
			$result = $query->result_array(); 
			
			return $result;	
		
	}
	
}
	