<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class update_emailnotification_client_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
	}
	
	
	
	function index()
	{
			
		$data = array(
			'email' 						=> $_POST['email'],
			'email_notification' 			=> $_POST['email_notification'],
			'email_frequency' 				=> $_POST['email_frequency']			
		);
		
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->update('client_details',$data);
	
	}
	
}
	