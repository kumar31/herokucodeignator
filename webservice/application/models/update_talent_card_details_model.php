<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class update_talent_card_details_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	
	}
	
	
	
	function index()
	{
			
		$data = array(
			'name' 					=> $_POST['name'],
			'number' 				=> $_POST['number'],
			'cvv' 					=> $_POST['cvv'],
			'expiration_month' 		=> $_POST['expiration_month'],
			'expiration_year' 		=> $_POST['expiration_year']
		);
		
		$this->db->where('card_id',$_POST['card_id']);
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->update('talent_card_details',$data);
	
	}
	
}
	