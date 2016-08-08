<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class client_card_details_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	function index()
	{ 
		$this->db->select('*');
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->from('client_card_details');
		$query = $this->db->get();
		$result = $query->result_array();
		
		if(empty($result)) {
			$data = array(
				'client_id' 	   		=> $_POST['client_id'],
				'name' 					=> $_POST['name'], 
				'number' 				=> $_POST['number'],
				'cvv' 					=> $_POST['cvv'],
				'expiration_month' 		=> $_POST['expiration_month'],
				'expiration_year' 		=> $_POST['expiration_year']
			);
			
			$this->db->insert('client_card_details',$data);
		}
		else {
			$data = array(
				'name' 					=> $_POST['name'],
				'number' 				=> $_POST['number'],
				'cvv' 					=> $_POST['cvv'],
				'expiration_month' 		=> $_POST['expiration_month'],
				'expiration_year' 		=> $_POST['expiration_year']
			);
			
			$this->db->where('client_id',$_POST['client_id']);
			$this->db->update('client_card_details',$data);
		}
		
	}
	
}
	