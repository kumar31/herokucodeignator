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

class create_agent extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->library('form_validation');
		$this->load->model('get_agent_details_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('name','email','password','percentage','address','outfit_fee');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						//$this->form_validation->set_rules('admin_id', 'admin_id', 'trim|required');
						$this->form_validation->set_rules('name', 'name', 'trim|required');
						$this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[agent_details.email]');
						$this->form_validation->set_rules('password', 'password', 'trim|required');
						$this->form_validation->set_rules('percentage', 'percentage', 'trim|required|greater_than[0]|less_than[100]');
						$this->form_validation->set_rules('address', 'address', 'trim|required');
						$this->form_validation->set_rules('outfit_fee', 'outfit fee', 'trim|required|greater_than[0]|less_than[100]');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							 
							$result = $this->get_agent_details_model->create();	
							$result = $validationandresult->successmessagewithemptyresult($result);
							$this->response($result, 200);
						
						}
							
					}
					
			} 
			else
			{ 		$result = $validationandresult->invalidrequest();
					$this->response($result, 202);
					
			}
		
	}
	
}
