<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class event_detail_talent extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('event_model');
			$this->load->model('hired_info_model');
			$this->load->model('get_event_list_talent_model');
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
		
		$myuser_id = $this->session->userdata('talent_id'); 
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('talent',true);
		}
		if($myuser_id!="") {
			$my_event['myuser_id']= $myuser_id;	
			$my_event['event_detail']= $this->event_model->event_detail_talent($event_id);
			//$my_event['hired_info']= $this->hired_info_model->index($myuser_id,$event_id);	//print_r($my_event['hired_info']);
			//$data['events'] = $this->invite_model->invite_details($result);
			//print_r($my_event['event_detail']);
			$my_event['events'] = $this->invite_model->invited_details_of_talent_ind($my_event,$myuser_id); 
			$this->load->view('event_detail_talent',$my_event);
		}
		else {
			redirect('login');
		}		
	}
	
}
