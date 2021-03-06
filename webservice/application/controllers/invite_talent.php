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

class invite_talent extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('invite_talent_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('event_id','client_id','talent_id','agent_id');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('event_id', 'event_id', 'trim|required|callback_eventcheck');
						$this->form_validation->set_rules('client_id', 'client_id', 'trim|required');
						$this->form_validation->set_rules('agent_id', 'agent_id', 'trim|required');
						$this->form_validation->set_rules('talent_id', 'talent_id', 'trim|required|callback_talentidcheck');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->invite_talent_model->index();	
							
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
	
	function talentidcheck(){
		
		$this->db->select('*');		
		$this->db->where('event_id',$_POST['event_id']);	
		$this->db->where('client_id',$_POST['client_id']);		
		$this->db->where('talent_id',$_POST['talent_id']);		
		$this->db->from('invite_talent_to_event');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		if(!empty($result)){
			
			$this->form_validation->set_message('talentidcheck', 'Already invited for this event');
			return false;			
		}
		else {
		
			return true;
		}
	
	}
	
	function eventcheck(){
		
		$this->db->select('*');		
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
