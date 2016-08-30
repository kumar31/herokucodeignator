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

class talent_update_password extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('talent_update_password_model');
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
					$pre_key = array('talent_id','current_password','new_password');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('talent_id', 'talent_id', 'trim|required');
						$this->form_validation->set_rules('current_password', 'current_password', 'trim|required|callback_passcheck');
						$this->form_validation->set_rules('new_password', 'new_password', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->talent_update_password_model->index();	
							
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
		$password = $this->encrypt->decode($_POST['current_password']);
		$this->db->select('*');		
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->where('password',$password);
		$this->db->from('talent_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		if(!empty($result)){
			return true;		
		}
		else {
			$this->form_validation->set_message('passcheck', 'Current Password is incorrect.');
			return false;	
		}
	
	}
	
}
