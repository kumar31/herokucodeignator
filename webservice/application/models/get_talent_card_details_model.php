<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class get_talent_card_details_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function index()
	{		
		
	
			$this->db->select('*');		
			$this->db->where('talent_id',$_POST['talent_id']);
			$this->db->where('card_id',$_POST['card_id']);
			$this->db->from('talent_card_details');
			$query = $this->db->get(); 
			$result = $query->result_array(); 
			
			return $result;	
		
	}
	
}
	