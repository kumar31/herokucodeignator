<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class fb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		 $this->load->helper('url'); 
		 $this->load->helper('cookie');
		 //$this->load->model('pro_model');
    }
    function index()
    {
        if(isset($_POST)){
			
			if($_POST['usertype'] == 1){
				
				$this->db->select('*');		
				$this->db->where('email', $_POST['email']);
				$this->db->where('facebook_id', $_POST['id']);
				$this->db->from('client_details');
				$query = $this->db->get();	
				$results = $query->result_array();
				
				if(!empty($results)){	
					$user_profile = array(
						'client_id' => $results[0]['client_id']
						
					);
					
					
					$this->session->set_userdata($user_profile);
					$myuser_id = $this->session->userdata('client_id');
					$cookie= array(
						'name'   => 'client',
						'value'  => $myuser_id,
						'expire' => '86500'
					   );
					   $this->input->set_cookie($cookie);
					echo "1";
				}
				else{
					
					$this->cookies();
				   echo "3";
				}
				
			}
			
			if($_POST['usertype'] == 2){
				
				$this->db->select('*');		
				$this->db->where('email', $_POST['email']);
				$this->db->where('facebook_id', $_POST['id']);
				$this->db->from('talent_details');
				$query = $this->db->get();
				$results = $query->result_array();
				if(!empty($results)){
					
					$user_profile = array(
						'talent_id' => $results[0]['talent_id'],
						
					);
				
					$this->session->set_userdata($user_profile);
					$myuser_id = $this->session->userdata('talent_id');
					$cookie= array(
						'name'   => 'talent',
						'value'  => $myuser_id,
						'expire' => '86500'
					   );
					   $this->input->set_cookie($cookie);
					echo "2";
				}else{
					$this->cookies();
					echo "4";
				}
			}
			
			
			
		}
	}
	
	function cookies(){
			
			$facebook_id= array(
				'name'   => 'facebook_id',
				'value'  => $_POST['id'],
				'expire' => '86500'
			   );
			   $this->input->set_cookie($facebook_id);
			   
			   $email= array(
				'name'   => 'email',
				'value'  => $_POST['email'],
				'expire' => '86500'
			   );
			   $this->input->set_cookie($email);
			   
			   $first_name= array(
				'name'   => 'first_name',
				'value'  => $_POST['first_name'],
				'expire' => '86500'
			   );
			   $this->input->set_cookie($first_name);

			   $last_name= array(
				'name'   => 'last_name',
				'value'  => $_POST['last_name'],
				'expire' => '86500'
			   );
			   $this->input->set_cookie($last_name);
			   
			   $url= array(
				'name'   => 'profile_url',
				'value'  => $_POST['url'],
				'expire' => '86500'
			   );
			   $this->input->set_cookie($url);
		
	}
	
	
    public function logout()
    {
		session_destroy();
        unset($_SESSION['access_token']);
        redirect(base_url());
    }
}
?>