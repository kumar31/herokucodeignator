<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class project_details extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->model('event_model');
			$this->load->model('hired_info_model');
			$this->load->library('form_validation', 'session');
			$this->form_validation->set_error_delimiters('', ''); 
			
	
	}
	public function index()
	{
		if(($_POST['event_id']) == "") {
			$event_id = $this->uri->segment(2);
		}
		else {
			$event_id = $_POST['event_id']; 
		}
		
		$myuser_id = $this->session->userdata('client_id'); 
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		}
		if($myuser_id!="") {
			$my_event['myuser_id']= $myuser_id;	
			$my_event['event_detail']= $this->event_model->event_detail_client($event_id,$myuser_id);	
			$my_event['hired_info']= $this->hired_info_model->index($myuser_id,$event_id);	//print_r($my_event['hired_info']);
			$this->load->view('project_details',$my_event);
		}
		else {
			redirect('login');
		}		
	}
	
}
