<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_update_password_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('talent_model');
		$this->load->library('encrypt');
	}
	
	
	
	function index()
	{
		$password = $this->encrypt->encode($_POST['new_password']);	
		$data = array(
			'password' 			=> $password
		);
		
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->update('talent_details',$data);
	
	}
	
}
	