<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_account_close_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('talent_model');
	}
	
	
	
	function index()
	{
			
		$data = array(
			'status' 			=> 2
		);
		
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->update('talent_details',$data);
	
	}
	
}
	