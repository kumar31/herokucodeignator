<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class agent_profile extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->model('agent_model');
	
	}
	public function index()
	{
		$myuser_id = $this->session->userdata('agent_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('agent',true);
		}
		if($myuser_id!="") {	
			$data['agent_details'] = $this->agent_model->agent_details($myuser_id); 
			$this->load->view('agent_profile',$data);
		}
		else {
			redirect('login');
		}
	}
	
}
