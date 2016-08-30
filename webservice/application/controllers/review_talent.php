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

class review_talent extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url'); 
		$this->load->library('form_validation');
		$this->load->model('review_talent_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
		$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('event_id','talent_id','client_id','review_star','review_comments');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('event_id', 'event_id', 'trim|required');
						$this->form_validation->set_rules('talent_id', 'talent_id', 'trim|required|callback_talentidcheck');
						$this->form_validation->set_rules('client_id', 'client_id', 'trim|required');
						$this->form_validation->set_rules('review_star', 'review_star', 'trim|required|integer|less_than[6]');
						$this->form_validation->set_rules('review_comments', 'review_comments', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							 
							$result = $this->review_talent_model->index();	
							
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
		$this->db->where('client_id',$_POST['client_id']);		
		$this->db->from('talent_review');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		if(!empty($result)){
			
			$this->form_validation->set_message('talentidcheck', 'Already reviewed');
			return false;			
		}
		else {
		
			return true;
		}
	
	}
	
}
