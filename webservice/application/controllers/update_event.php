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

class update_event extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('update_event_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('client_id','event_id','event_name','start_datetime','end_datetime','location',
					'latitude','longitude','number_of_guests','description','starting_instructions','uniform','uniform_description',
					'uniform_provided','number_of_waiters','event_pic','event_contact','open_to_all','talent_requested_for');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('client_id', 'client_id', 'trim|required');
						//$this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
						$this->form_validation->set_rules('event_name', 'event_name', 'trim|required');
						$this->form_validation->set_rules('start_datetime', 'start_datetime', 'trim|required');
						$this->form_validation->set_rules('end_datetime', 'end_datetime', 'trim|required');
						$this->form_validation->set_rules('location', 'location', 'trim|required');
						//$this->form_validation->set_rules('postalcode', 'postalcode', 'trim|required');
						$this->form_validation->set_rules('number_of_guests', 'number_of_guests', 'trim|required');
						$this->form_validation->set_rules('uniform', 'uniform', 'trim|required');
						$this->form_validation->set_rules('uniform_provided', 'uniform_provided', 'trim|required');
						$this->form_validation->set_rules('number_of_waiters', 'number_of_waiters', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->update_event_model->index();	
							
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
