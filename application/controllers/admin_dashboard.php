<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class admin_dashboard extends CI_Controller {

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
		if($_POST['my_userid'] == "") {
			$myuser_id = $this->session->userdata('admin_id'); 
			if($myuser_id == ''){
					$myuser_id = $this->input->cookie('admin',true);
				}
		}
		else {
			$adminid = $_POST['my_userid']; 
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
		}
		if($myuser_id == "") {
			redirect('admin_login');
		}
		else{
			$this->load->view('admin_dashboard',$myuser_id);
		}
	}
	
}
