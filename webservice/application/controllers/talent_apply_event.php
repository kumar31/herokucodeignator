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

class talent_apply_event extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->library('form_validation');
		$this->load->model('talent_apply_event_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('talent_id','event_id');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('talent_id', 'talent_id', 'trim|required|callback_talentidcheck');
						$this->form_validation->set_rules('event_id', 'event_id', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							 
							$result = $this->talent_apply_event_model->index();	
							
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
		$this->db->where('talent_id',$_POST['talent_id']);		
		$this->db->where('status',5);		
		$this->db->from('invite_talent_to_event');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		if(!empty($result)){
			
			$this->form_validation->set_message('talentidcheck', 'Already applied for this event');
			return false;			
		}
		else {
		
			return true;
		}
	
	}
	
	function timecheck(){
		$event_detail = $this->talent_apply_event_model->event_detail();
		$event_starttime = $event_detail[0]['start_datetime'];
		$event_endtime = $event_detail[0]['end_datetime'];
		
		$this->db->select('*');
		$this->db->where('event_id IN (select event_id from invite_talent_to_event where talent_id = '.$_POST['talent_id'].' )',NULL,FALSE);
		$where = '(start_datetime between "'.$event_starttime.'" AND "'.$event_endtime.'")';
		$this->db->where($where);
		$this->db->from('event_detail');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		if(!empty($result)){
			
			$this->form_validation->set_message('timecheck', 'Already applied for an event in this time.');
			return false;			
		}
		else {
		
			return true;
		}
	
	}
	
}
