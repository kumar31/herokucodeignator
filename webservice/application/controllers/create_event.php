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

class create_event extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('create_event_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('client_id','event_name','event_contact','start_datetime','end_datetime','location','postalcode','latitude','longitude','number_of_guests','description','starting_instructions','uniform','uniform_description',
					'uniform_provided','number_of_waiters','open_to_all','talent_requested_for','event_pic','event_type','talent_type');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('client_id', 'client_id', 'trim|required');
						//$this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
						$this->form_validation->set_rules('event_name', 'event name', 'trim|required');
						$this->form_validation->set_rules('event_contact', 'event contact', 'trim|required');
						$this->form_validation->set_rules('start_datetime', 'start datetime', 'trim|required');
						$this->form_validation->set_rules('end_datetime', 'end datetime', 'trim|required');
						$this->form_validation->set_rules('location', 'location', 'trim|required');
						/*$this->form_validation->set_rules('district', 'district', 'trim|required');
						$this->form_validation->set_rules('state', 'state', 'trim|required');
						$this->form_validation->set_rules('country', 'country', 'trim|required');*/
						//$this->form_validation->set_rules('postalcode', 'postalcode', 'trim|required');
						$this->form_validation->set_rules('number_of_guests', 'number of guests', 'trim|required');
						$this->form_validation->set_rules('uniform', 'uniform', 'trim|required'); 
						//$this->form_validation->set_rules('uniform_description', 'uniform_description', 'trim|required');
						$this->form_validation->set_rules('uniform_provided', 'uniform provided', 'trim|required');
						$this->form_validation->set_rules('number_of_waiters', 'number of waiters', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->create_event_model->index();	
							
							$result = $validationandresult->successmessagewithresult($result);
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
