<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class Landing extends CI_Controller {

	public function index()
	{
		$this->load->view('landing');
	}

	public function test()
	{
		$this->db->select('*');		
		$this->db->from('client_registration');
		$query = $this->db->get();
		$result = $query->result_array();
		$data['data'] = $result;
   		$this->load->view('landing', $data);
	}
}

