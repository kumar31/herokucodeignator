<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class client_payments extends CI_Controller {

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
			$data['client_payment_details'] = $this->client_model->client_payment_details($client_id); 
			$data['client_current_mon_detail'] = $this->client_model->client_current_mon_details($client_id); 
			$data['client_current_day_detail'] = $this->client_model->client_current_day_details($client_id); 
			$data['client_paid_overall_detail'] = $this->client_model->client_paid_overall_details($client_id); 
			$data['client_refund_detail'] = $this->client_model->client_refund_details($client_id); 
			$this->load->view('client_payments',$data);
		}
		else {
			redirect('login');
		}
	}
	
}
