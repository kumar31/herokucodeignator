<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class talent_how_outfit_works extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookies');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
	
	}
	public function index()
	{
		$myuser_id = $this->session->userdata('talent_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('talent',true);
		}
		if($myuser_id!="") {		
			$talent_id = $myuser_id;
			$this->load->view('talent_how_outfit_works');
		}
		else {
			redirect('login');
		}
	}
	
}
