<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class support_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	
	function index()
	{
		
		$data = array(
		
			'email' 				=> $_POST['email'],
			'message' 				=> $_POST['message']
		);
		
		
		$this->db->insert('support',$data);
	
	}
	
}
	