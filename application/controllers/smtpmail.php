<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
require APPPATH.'/libraries/class.phpmailer.php';
class smtpmail extends CI_Controller {
public function __construct()
{

	parent::__construct();
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->model('smtp_model');
		
}
public function index()
{
		
	$this->smtp_model->index();
		
}
	
}
