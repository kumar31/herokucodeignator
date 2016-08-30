<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class admin_settings extends CI_Controller {

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
		$myuser_id = $this->session->userdata('admin_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('admin',true);
		}
		if($myuser_id!="") {	
			$this->load->view('admin_settings',$myuser_id);
		}
		else {
			redirect('admin_login');
		}
	}
	
}
