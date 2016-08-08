<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class outfit_how_outfit_works extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
	
	}
	public function index()
	{
		
		$this->load->view('outfit_how_outfit_works');
		
	}
	
}
