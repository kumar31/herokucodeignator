<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class contractor_pay extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->model('checkin_model');
	
	}
	public function index()
	{
		$myuser_id = $this->session->userdata('admin_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('admin',true);
		}
		if($myuser_id!="") {	
			$this->db->select('*');							
			$this->db->from('talent_details');
			$query = $this->db->get();
			$data['res'] = $result = $query->result_array();
			
			$data['res'] = $this->checkin_model->rating_details($data['res']);
			$data['res'] = $this->checkin_model->rating_avg($data['res']);
			//print "<pre>"; print_r($data['res']);
			$this->load->view('contractor_pay',$data);
		}
		else {
			redirect('admin_login');
		}
	}
	
}
