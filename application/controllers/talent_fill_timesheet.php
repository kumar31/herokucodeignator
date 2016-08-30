<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class talent_fill_timesheet extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->model('event_model');
			$this->load->model('talent_model');
			$this->load->model('checkin_model');
			$this->load->model('get_talent_list_model');
			
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
			$query=$this->db->query("SELECT invite_talent_to_event.* from invite_talent_to_event left join event_detail on invite_talent_to_event.event_id = event_detail.event_id WHERE invite_talent_to_event.status IN (1,3) AND launch_status = 1 AND talent_id = ".$myuser_id." AND invite_talent_to_event.event_id = ".$event_id." ORDER BY invite_id DESC");			
			$my_event['invited_events'] = $result = $query->result_array(); 
			$my_event['invited_events'] = $this->event_model->closed_event_details_talent($result); 
			$my_event['talent_detail'] = $this->get_talent_list_model->talent($myuser_id);
			//print"<pre>";print_r($my_event['invited_events']);
			
			$my_event['event_detail']= $this->event_model->event_detail_talent($event_id);
			$my_event['checkin_detail']= $this->checkin_model->talent_checkout_details($event_id,$myuser_id);
			$this->load->view('talent_fill_timesheet',$my_event);
		}
		else {
			redirect('login');
		}
	}
	
}
