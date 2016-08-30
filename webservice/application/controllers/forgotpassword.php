<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
class forgotpassword extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('forgotpassword_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	function index_post(){
			
			if(isset($_POST) != "")
			{
				$validationandresult = new validationandresult();
					
					// Empty key checking.
					$post_key = array_keys($_POST);
					
					$pre_key = array('email','type');
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						$this->form_validation->set_rules('email', 'email', 'trim|required');
						$this->form_validation->set_rules('type', 'type', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
							
						}else{
						
							$result = $this->forgotpassword_model->index();
							if($result == ""){
							$message = "Your Email ID is not registered with us. Please enter a valid Email ID.";
							$result = $validationandresult->custommessagez($message);
							}else{
							$message = "A reset password link is sent to your registered Email ID.";
							$result = $validationandresult->custommessage($message);
							}
							
							$this->response($result, 200);
						}
							
					}
					
			}
			else
			{
					$result = $validationandresult->invalidrequest();
					$this->response($result, 202);
			
			}
	
			
	
	}
	
	
}