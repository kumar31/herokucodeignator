<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class agent_logout extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			
	}
	public function index()
	{
		
		$myuser_id = $this->session->userdata('agent_id'); 
		$agent_id = $myuser_id;
		$this->session->unset_userdata($agent_id);
		$this->session->sess_destroy();
		delete_cookie('agent'); 
		$this->load->view('login');
	}
	
}
