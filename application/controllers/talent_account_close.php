<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class talent_account_close extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('talent_model');
			
	}
	public function index()
	{
		$myuser_id = $this->session->userdata('talent_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('talent',true);
		}
		if($myuser_id!="") {		
			$talent_id = $myuser_id;
			$data['talent_profile'] = $this->talent_model->talent($talent_id); 
			$this->load->view('talent_account_close',$data);
		}
		else {
			redirect('login');
		}
	}
	
}
