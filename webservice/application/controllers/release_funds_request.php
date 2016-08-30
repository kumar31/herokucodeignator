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

class release_funds_request extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('release_funds_request_model');
		$this->load->model('mail_model');
		$this->form_validation->set_error_delimiters('', '');
	}
	
	
	// Function : Code For Login.
	
	public function index_post()
	{
			$validationandresult = new validationandresult();
			if(isset($_POST) != "")
			{
					
					
					// Empty key checking.
					$pre_key = array('event_id','talent_id','name');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('event_id', 'event_id', 'trim|required');
						$this->form_validation->set_rules('talent_id', 'talent_id', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->release_funds_request_model->index();	
							$email = $result[0]['email'];
							$first_name = $result[0]['first_name'];
							$event_name = $result[0]['event_name'];
							$talent_name = $_POST['name'];
							
							$this->email($email,$first_name,$event_name,$talent_name);
							
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
	
	function email($email,$first_name,$event_name,$talent_name){
		
		$variableconfig = new variableconfig();
		$mailurl = $variableconfig->mailurl(); 
		$from_email = $variableconfig->from_email();
		
		$to_email = $email;
		$to_username = $first_name;	   
		$talent_name = $talent_name;	   
		$subject = "Nector - Release Funds Request mail";
		$message ="<p>Hi ".$to_username.",</p>";
		$message .="<p>I like to request for the release for the payment you agreed to pay for th event i worked.</p>";
		$message .="<p>Regards,<br>".$talent_name."<br>Nector Talent</p>";	   
		$this->mail_model->send($to_email,$subject,$message,$from_email);
		
		
	}
	
}
