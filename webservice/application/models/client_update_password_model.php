<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class client_update_password_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
		$this->load->library('encrypt');
	}
	
	
	
	function index()
	{
		$password = $this->encrypt->encode($_POST['new_password']); 
		$data = array(
			'password' 			=> $password
		);
		
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->update('client_details',$data);
	
	}
	
}
	