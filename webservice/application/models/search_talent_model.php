<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class search_talent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function index()
	{		
		
		$query = $this->db->query('SELECT * FROM (`talent_details`) WHERE `email`="'.$_POST['search'].'" OR `first_name`="'.$_POST['search'].'" OR `last_name`="'.$_POST['search'].'" ');					
		$result = $query->result_array(); 
		
		return $result;	
		
	}
	
}
	