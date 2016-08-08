<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class payment_launch extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
	
	}
	public function index()
	{
		 $this->load->view('payment_launch');
		
	}
	
}
