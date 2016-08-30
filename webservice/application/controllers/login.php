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
require APPPATH.'/libraries/variableconfig.php';
require APPPATH.'/libraries/validationandresult.php';
class login extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		//$this->load->model('getprofile_model');
		$this->form_validation->set_error_delimiters('', '');
		$this->load->library('encrypt');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
	
			
			if(isset($_POST) != "")
			{

				$validationandresult = new validationandresult();
					// Empty key checking.
					$post_key = array_keys($_POST);					
					$pre_key = array('email','password','deviceid','devicetype','type');
					
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
							$this->form_validation->set_rules('type', 'type', 'trim|required|callback_checkstatus');
							$this->form_validation->set_rules('email', 'email', 'trim|required|callback_emailcheck');
							
							if($this->form_validation->run() == FALSE)
							{
								$validation_errors = validation_errors();
								$result = $validationandresult->formvalidation($validation_errors);
								$this->response($result, 202);
								
							}
							
					}
					
			}
			else
			{
					$result = $validationandresult->invalidrequest();
					$this->response($result, 202);
			
			}
		
	}
	
		
	function emailcheck(){
	
		$result = $this->user();
		
		if(!empty($result)){
			//$this->checkstatus($result);
			$result = $this->user();
			
			if($_POST['type'] == 1) {
				$user_id = $result[0]['client_id'];
			}
			if($_POST['type'] == 2) {
				$user_id = $result[0]['talent_id'];
			}
			
			$this->device($user_id);
			$result = $this->user();
			$this->response(array("StatusCode" => "1","Message" => "Success","result" => $result[0]));
			return false;			
		}
		else {
			
			if($_POST['email'] != ''){
				$this->form_validation->set_message('emailcheck', 'Invalid email and password.');
			}
			if($_POST['password'] != ''){
				$this->form_validation->set_message('emailcheck', 'Invalid email and password.');
			}
			return false;
		}
	
	}
	
	function user() {
		$password = $_POST['password'];
		if($_POST['type'] == 1) {
			$this->db->select('*');		
			$this->db->where('email',$_POST['email']);		
			//$this->db->where('password',$password);
			$this->db->from('client_details');
			$query = $this->db->get();
			$results = $query->result_array();
			$db_password = $this->encrypt->decode($results[0]['password']);
			if($db_password == $password) {
				$result = $results;
			} 
		}
		if($_POST['type'] == 2) {
			$this->db->select('*');		
			$this->db->where('email',$_POST['email']);		
			//$this->db->where('password',$password);
			$this->db->from('talent_details');
			$query = $this->db->get();
			$results = $query->result_array();
			$db_password = $this->encrypt->decode($results[0]['password']);
			if($db_password == $password) {
				$result = $results;
			}
		}
		
		return $result;
	}
	
	
	function device($user_id){
		$data = array(				
			"deviceid" 		=> $_POST['deviceid'],
			"devicetype" 	=> $_POST['devicetype']				
		);
		if($_POST['type'] == 1) {
			$this->db->where('client_id', $user_id); 
			$this->db->update('client_details', $data); 
		}
		if($_POST['type'] == 2) {
			$this->db->where('talent_id', $user_id); 
			$this->db->update('talent_details', $data); 
		}
		
	}
	
	function checkstatus(){
		$password = $_POST['password'];
		$validationandresult = new validationandresult();
		if($_POST['type'] == 1) {
			$this->db->select('*');		
			$this->db->where('email',$_POST['email']);		
			//$this->db->where('password',$password);
			$this->db->where('status',2);
			$this->db->from('client_details');
			$query = $this->db->get();
			$results = $query->result_array();
			$db_password = $this->encrypt->decode($results[0]['password']);
			if($db_password == $password) {
				$result = $results;
			}
		}
		if($_POST['type'] == 2) {
			$this->db->select('*');		
			$this->db->where('email',$_POST['email']);		 
			//$this->db->where('password',$password);
			$this->db->where('status',2);
			$this->db->from('talent_details');
			$query = $this->db->get();
			$results = $query->result_array();
			$db_password = $this->encrypt->decode($results[0]['password']);
			if($db_password == $password) {
				$result = $results;
			}
		}
		
		if(!empty($result)){
			
			$result = $validationandresult->accountclosed(); 
			$this->response($result, 202);	
		}
		else {
			
			return true;
		}
	
	}
	
}
