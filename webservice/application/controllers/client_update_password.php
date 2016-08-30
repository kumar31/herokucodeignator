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

class client_update_password extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('client_update_password_model');
		$this->form_validation->set_error_delimiters('', '');
		$this->load->library('encrypt');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('client_id','current_password','new_password');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('client_id', 'client_id', 'trim|required');
						$this->form_validation->set_rules('current_password', 'current_password', 'trim|required|callback_passcheck');
						$this->form_validation->set_rules('new_password', 'new_password', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->client_update_password_model->index();	
							
							$result = $validationandresult->successmessagewithemptyresult();
							$this->response($result, 200);
						
						}
							
					}
					
			} 
			else
			{ 		$result = $validationandresult->invalidrequest();
					$this->response($result, 202);
					
			}
		
	}
	
	function passcheck(){
		$password = $_POST['current_password'];
		$this->db->select('*');		
		$this->db->where('client_id',$_POST['client_id']);
		//$this->db->where('password',$password);
		$this->db->from('client_details');
		$query = $this->db->get();
		$results = $query->result_array(); 
		$db_password = $this->encrypt->decode($results[0]['password']);
			if($db_password == $password) {
				$result = $results;
			}
		
		if(!empty($result)){
			return true;		
		}
		else {
			$this->form_validation->set_message('passcheck', 'Current Password is incorrect.');
			return false;	
		}
	
	}
	
}
