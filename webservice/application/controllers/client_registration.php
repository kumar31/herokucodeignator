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

class client_registration extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('client_registration_model');
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
					$pre_key = array('email','password','first_name','last_name','company','address','postal_code','profile_url','latitude','longitude','facebook_id','date');
					
					$result = $validationandresult->keyvalidation($pre_key);
					
					if($result['message'] != '')
					{
						$this->response($result, 202);

					}
					else
					{
						
						$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[client_details.email]');
						$this->form_validation->set_message('is_unique', 'This email is already registered - delete old account or use a different email. ');
						if(($_POST['facebook_id']) == "") {
							$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[30]');
						}
						
						$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
						$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
						//$this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');
						//$this->form_validation->set_rules('gender', 'gender', 'trim|required');
						
						if($this->form_validation->run() == FALSE)
						{ 
							$validation_errors = validation_errors();
							$result = $validationandresult->formvalidation($validation_errors);
							$this->response($result, 202);
						}
						else {
							
							$result = $this->client_registration_model->index();	
							$email = $_POST['email'];
							$first_name = $_POST['first_name'];
							$client_id = $result;
							
							$this->email($email,$first_name,$client_id);
							
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
	
	function email($email,$first_name,$client_id){
		
		$variableconfig = new variableconfig();
		$mailurl = $variableconfig->mailurl(); 
		$from_email = $variableconfig->from_email();
		
		$type = "1";
		$to_email = $email;
		$to_username = $first_name;	   
		$subject = "Outfit - Registration confirmation email";
		$message ="<p>Welcome to OUTFIT!</p>";
		$message .="<p>We are so pleased to serve you, connecting you with the best talent in the city.</p>";
		$message .= "<p>Our aim is to make connections with talent easy, transparent and enjoyable for you. We want to provide you with staff who will being a great attitude and work ethic to the table - as it’s the Outfit that really makes an event. In order to deliver you with the best we want you to rate the talent and conversely we want the talent to rate you - making sure both sides of the event are celebrated for a job well done.</p>";
		$message .= "<p>We are newly launched and still in Beta testing phase so please forgive us if everything isn’t smooth sailing every time.</p>";
		$message .= "<p>Book your first party and Outfit your staff here.</p>";
		$message .= "<p>Should you have any questions please email support@outfitstaff.com and we will get back to you as soon as we can.</p>";
		$message .= "<p>Kindly click on the Below button to verify your account</p>";
		$message .= "<a href=".$mailurl.$client_id."/".$type."><button >Verify</button></a>"; 	   
		$message .="<p>Yours,<br>Outfit </p>";	   
		$this->mail_model->send($to_email,$subject,$message);
		
		
	}
	
}
