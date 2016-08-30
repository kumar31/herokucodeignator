<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class reset_password extends CI_Controller {

	public function __construct()
    {
        
        parent::__construct();
        
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('resetpassword_model');
		
        
    }
	public function index()
	{
		
		
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('reset_passwordview');
		}
		else
		{
			$id = $this->uri->segment(2);
			$type = $this->uri->segment(3);
			
			$password = $_POST['password'];
			$repassword = $_POST['passconf'];
			
			$data = array(
				'password' => $password
			);
				
			if($type == 1) {
				$this->db->where('client_id',$id);
				$this->db->update('client_details',$data);
			}
			if($type == 2) {
				$this->db->where('talent_id',$id);
				$this->db->update('talent_details',$data);
			}
			$this->email($id,$type);
			$this->load->view('password_updated');
		}
		
	}
	
	function email($id,$type) {
		if($type == 1) {
			$this->db->select('*');
			$this->db->where('client_id',$id);
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array();
			$user_id = $result[0]['client_id'];
		}
		if($type == 2) {
			$this->db->select('*');
			$this->db->where('talent_id',$id);
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array();
			$user_id = $result[0]['talent_id'];
		}	
			$email = $result[0]['email'];
			$Password = $result[0]['password'];
			$firstname = $result[0]['first_name']; 
			$subject = "Nector - Password Reset Confirmation "; 
			$messagetext = "<p>Dear ".$firstname.",</p>";
			$messagetext .= "<p>You have reset your Nector Password on   .If you did not make these changes or if you believe an unauthorised person has accessed your account, you should change your password as soon as possible by clicking on the button below </p> </br>";
			$messagetext .= "<a href=".base_url()."webservice/index.php/reset_password/".$user_id."><button>Reset Password</button></a>";
			$messagetext .= "<p>(Click the above button only if you have not changed your password at the date and time mentioned above).</p> </br>";
			$messagetext .= "<p>Thanks for using Nector.</p>";
			$messagetext .= "<p>Sincerely,</p>";
			$messagetext .= "<p>Nector Support</p>";
			$messagetext .= "<p>Disclaimer: This email may contain privileged information and is intended solely for the addressee, 
			and any disclosure &#x2F; misuse of this information is strictly prohibited, and may be unlawful.
			If you have received this mail by mistake, Please delete this mail immediately.</p>";
			
			
			$this->sendemail($email,$messagetext,$subject);
			return $email;
	}
	
	function sendemail($email,$messagetext,$subject){
	
			
			$to = $email;
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <support@beta.outfitstaff.com>' . "\r\n";
			$headers .= 'Cc: support@beta.outfitstaff.com' . "\r\n";
			$headers .= 'Reply-To: <support@beta.outfitstaff.com>' . "\r\n"; 
			$message = $messagetext;
			mail($to,$subject,$message,$headers);
	
	}
	
}