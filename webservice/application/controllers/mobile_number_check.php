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

class mobile_number_check extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('mobile_number_check_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('user_id','verify_code','type');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
						$this->form_validation->set_rules('verify_code', 'verify_code', 'trim|required|callback_codecheck');
						$this->form_validation->set_rules('type', 'type', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->mobile_number_check_model->index();	
							
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
	
	function codecheck(){
		
		if($_POST['type'] == 1) {
			$this->db->select('*');		
			$this->db->where('client_id',$_POST['user_id']);
			$this->db->where('phone_verification_code',$_POST['verify_code']);
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		if($_POST['type'] == 2) {
			$this->db->select('*');		
			$this->db->where('talent_id',$_POST['user_id']);		
			$this->db->where('phone_verification_code',$_POST['verify_code']);		
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		
		if(!empty($result)){
			return true;		
		}
		else {
			$this->form_validation->set_message('codecheck', 'Invalid code entered.');
			return false;
			
		}
	
	}
	
}
