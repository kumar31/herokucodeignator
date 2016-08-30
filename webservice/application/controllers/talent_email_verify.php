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

class talent_email_verify extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		//$this->load->model('email_verify_model');
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
					$pre_key = array('talent_id','email','first_name');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('talent_id', 'talent_id', 'trim|required');
						$this->form_validation->set_rules('email', 'email', 'trim|required');
						$this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$email = $_POST['email'];
							$first_name = $_POST['first_name'];
							$talent_id = $_POST['talent_id'];
							
							$this->email($email,$first_name,$talent_id);
							
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
	
	function email($email,$first_name,$talent_id){
		
		$variableconfig = new variableconfig();
		$mailurl = $variableconfig->mailurl(); 
		$from_email = $variableconfig->from_email();
		
		$type = "2";
		$to_email = $email;
		$to_username = $first_name;	   
		$subject = "Outfit - Verify Email";
		$message ="<p>Hi,</p>";
		$message .="<p>Thanks for registering with Outfit.</p>";
		$message .= "<p>Kindly click on the Below button to verify your account</p>";
		$message .= "<a href=".$mailurl.$talent_id."/".$type."><button >Verify</button></a>"; 	   
		$message .="<p>Regards,<br>Outfit Admin</p>";	   
		$this->mail_model->send($to_email,$subject,$message,$from_email);
		
		
	}
	
}
