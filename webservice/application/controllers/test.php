<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
/* Error status code
200 - OK
201 - Created
202 - INVALID ACCESS
400 - BAD REQUEST
*/

//error_reporting(E_PARSE);
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
require APPPATH.'/libraries/REST_Controller.php';


class test extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		
		$query = $this->db->query("call client_email( ".$_POST['user_id']." )");
		$result = $query->result_array();
		print_r($result); die;
		
		
	}
	
}
