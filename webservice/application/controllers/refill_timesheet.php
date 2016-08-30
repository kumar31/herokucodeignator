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

class refill_timesheet extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('refill_timesheet_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('timeline_id','talent_id','number_of_days','number_of_hours','number_of_minutes','comments','status');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						$this->form_validation->set_rules('timeline_id', 'timeline_id', 'trim|required');
						$this->form_validation->set_rules('talent_id', 'talent_id', 'trim|required');
						$this->form_validation->set_rules('number_of_days', 'number_of_days', 'trim|required');
						$this->form_validation->set_rules('number_of_hours', 'number_of_hours', 'trim|required');
						$this->form_validation->set_rules('number_of_minutes', 'number_of_minutes', 'trim|required');
						$this->form_validation->set_rules('comments', 'comments', 'trim|required');
						$this->form_validation->set_rules('status', 'status', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->refill_timesheet_model->index();	
							
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

}
