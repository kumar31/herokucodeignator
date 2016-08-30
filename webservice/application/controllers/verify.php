<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Error status code
200 - OK
201 - Created
202 - INVALID ACCESS
400 - BAD REQUEST
*/

//error_reporting(E_PARSE);
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class verify extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('verify_model');
	}
	
	
	// Function : Code For Login.
	
	function index(){
			
			$id = $this->uri->segment(2);
			//$id = base64_decode($id);
			if($id != "")
			{

					
					$result= $this->verify_model->index();
					$type = $this->uri->segment(3);
					
					if($result=="1")
					{
						if($type == 1) {
							header('Location:' . getenv( 'SOIREE_BASE_URL' ) . '/index.php/client_truth_verification');
						}
						
						if($type == 2) {
							header('Location:' . getenv( 'SOIREE_BASE_URL' ) . '/index.php/talent_truth_verification');
						}
						
					}
					else{
						
						echo "Your account has already been verified.";
					}
					
			}
			else
			{
					echo "Your request is not valid"; 
			
			}
	
			
	
	}
	
	
}
