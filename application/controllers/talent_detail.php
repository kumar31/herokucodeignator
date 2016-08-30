<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class talent_detail extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('talent_model');
			$this->load->model('invite_model');
			$this->form_validation->set_error_delimiters('', ''); 
			
	
	}
	public function index()
	{
		if(($_POST['talent_id']) == "") {
			$talent_id = $this->uri->segment(2);
		}
		else {
			$talent_id = $_POST['talent_id']; 
		}
		$event_id = $this->uri->segment(3);
		$myuser_id = $this->session->userdata('client_id'); 
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		}
		if($myuser_id!="") {
			$my_profile['myuser_id']= $myuser_id;	
			$my_profile['talent_detail']= $this->talent_model->talent($talent_id,$myuser_id);	
			$my_profile['invited_details'] = $this->invite_model->invited_details_talent_for_client($talent_id,$myuser_id,$event_id);
			//print "<pre>"; print_r($my_profile['invited_details']); print "<pre>";
			$this->load->view('talent_detail',$my_profile);
		}
		else {
			redirect('login');
		}		
	}
	
}
