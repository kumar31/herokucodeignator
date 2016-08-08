<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class client_account_close_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
	}
	
	
	
	function index()
	{
			
		$data = array(
			'status' 			=> 2
		);
		
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->update('client_details',$data);
	
	}
	
}
	