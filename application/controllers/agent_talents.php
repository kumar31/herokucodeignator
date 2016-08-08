<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class agent_talents extends CI_Controller {

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
		
		$eventid = $this->uri->segment(2);
		if($myuser_id!="") {	
			$data['talents_details'] = $this->agent_model->talents_details($myuser_id,$eventid); 
			$this->load->view('agent_talents',$data);
		}
		else {
			redirect('login');
		}
	}
	function exportagentdetails(){
		
		$myuser_id = $this->session->userdata('agent_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('agent',true);
		}
		$eventid = $this->uri->segment(3);
		if($myuser_id != "") {	
			
			$data['talents_details'] = $this->agent_model->talents_details($myuser_id,$eventid); 
			$this->load->view('agent_excel',$data);
		}
		else {
			redirect('login');
		}
		
		
	}
}
