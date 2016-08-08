<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class edit_event extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('event_model');
			
	}
	public function index()
	{
		$myuser_id = $this->session->userdata('client_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		}
		$event_id = $this->uri->segment(2);
		if($myuser_id!="") {
			$my_event['client_id']= $myuser_id;
			$my_event['event_detail']= $this->event_model->event_detail_client($event_id,$myuser_id);	
			$this->load->view('edit_event',$my_event);
		}
		else {
			redirect('login');
		}
	}
	
}
