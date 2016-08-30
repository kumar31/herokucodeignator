<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class client_timesheet_check extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->model('event_model');
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
		$my_event['myuser_id']= $myuser_id;	
		$my_event['timesheet_details']= $this->event_model->event_detail_client($event_id,$myuser_id);	
		
		$this->load->view('client_timesheet_check',$my_event);  
	}
	
}
