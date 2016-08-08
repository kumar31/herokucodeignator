<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class create_event_with_talents extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('client_model');
			
	
	}
	public function index()
	{
		$myuser_id = $this->session->userdata('client_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		}
		if($myuser_id!="") {		
			$client_id = $myuser_id;
			$data['client_id'] = $myuser_id;
			$data['client_email'] = $this->client_model->email($client_id);
			$this->load->view('create_event_with_talents',$data);
		}
		else {
			redirect('login');
		}
	}
	
}
