<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class admin_dashboard extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
	
	}
	public function index()
	{
		$adminid = $this->uri->segment(2); 
		$userdata = array(
                   'admin_id'  => $adminid,
        );
		$this->session->set_userdata($userdata);
		$myuser_id = $this->session->userdata('admin_id');
		$cookie= array(
			'name'   => 'admin',
			'value'  => $myuser_id,
			'expire' => '86500'
		);
		$this->input->set_cookie($cookie);
		$this->load->view('admin_dashboard',$myuser_id);
	}
	
}
