<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class talent_payments extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('talent_model');
			
	}
	public function index()
	{
		$myuser_id = $this->session->userdata('talent_id'); 
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('talent',true);
		}
		if($myuser_id!="") {
			$talent_id = $myuser_id;
			$data['talent_payment_detail'] = $this->talent_model->talent_payment_details($talent_id); 
			$data['talent_current_mon_detail'] = $this->talent_model->talent_current_mon_details($talent_id); 
			$data['talent_current_day_detail'] = $this->talent_model->talent_current_day_details($talent_id); 
			$data['talent_overall_pay_detail'] = $this->talent_model->talent_overall_pay_details($talent_id); 
			$this->load->view('talent_payments',$data);
		}
		else {
			redirect('login');
		}
	}
	
}
