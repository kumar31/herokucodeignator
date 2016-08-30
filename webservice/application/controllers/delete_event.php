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

class delete_event extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('delete_event_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('client_id','event_id');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('client_id', 'client_id', 'trim|required');
						$this->form_validation->set_rules('event_id', 'event_id', 'trim|required|callback_eventcheck');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->delete_event_model->index();	
							
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
	
	function eventcheck(){
		
		$this->db->select('*');		
		$this->db->where('client_id',$_POST['client_id']);		
		$this->db->where('event_id',$_POST['event_id']);	
		$this->db->from('event_detail');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		if(empty($result)){
			
			$this->form_validation->set_message('eventcheck', 'Event not available');
			return false;			
		}
		else {
		
			return true;
		}
	
	}
}
