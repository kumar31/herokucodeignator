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
class admin_login extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		//$this->load->model('getprofile_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
	
			if(isset($_POST) != "")
			{

				$validationandresult = new validationandresult();
					// Empty key checking.
					$post_key = array_keys($_POST);					
					$pre_key = array('username','password');
					
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{	
							$this->form_validation->set_rules('username', 'username', 'trim|required|callback_emailcheck');
							
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
			
			$result = $this->user();
			$this->response(array("StatusCode" => "1","Message" => "Success","result" => $result[0]));
			return false;			
		}
		else {
			
			if($_POST['username'] != ''){
				$this->form_validation->set_message('emailcheck', 'Invalid username or password.');
			}
			if($_POST['password'] != ''){
				$this->form_validation->set_message('emailcheck', 'Invalid username or password.');
			}
			return false;
		}
	
	}
	
	function user() {
		
		$this->db->select('*');		
		$this->db->where('username',$_POST['username']);		
		$this->db->where('password',$_POST['password']);
		$this->db->from('admin');
		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
	}
	
}
