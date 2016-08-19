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
	function index_old()
    {
        error_reporting(E_ALL);
		 //session_start();
		
         $this->load->library('facebook', array(
            'appId' => '503794236476725',
            'secret' => 'f172b63c03783da5cca792df77550c84'
        ));
      
         $this->user = $this->facebook->getUser(); 
		 print_r($this->user);
		 if ($this->user) {
			
			 $_POST['user_profile'] = $this->facebook->api('/me?fields=id,first_name,last_name,picture.width(800).height(800),email'); 
			 
				$this->db->select('*');		
				$this->db->from('type');
				$query = $this->db->get(); 
				$result = $query->result_array();
				$typeid = $result[0]['type'];
				
			// print_r($_POST['user_profile']); print_r($typeid);  die;
			
				$_POST['status']       = "1";
				
				// Get logout url of facebook
				$_POST['logout_url']   = $this->facebook->getLogoutUrl(array(
					'next' => base_url() . 'index.php/fb/logout'
				));
				
				$dateFormat           = "Y-m-d H:i:s";
				$timeNdate            = gmdate($dateFormat, time());
				
				if($typeid == 1) {
					$this->db->select('*');		
					$this->db->where('email', $_POST['user_profile']['email']);
					$this->db->where('facebook_id', $_POST['user_profile']['id']);
					$this->db->from('client_details');
					$query = $this->db->get();					
				}
				if($typeid == 2) {
					$this->db->select('*');		
					$this->db->where('email', $_POST['user_profile']['email']);
					$this->db->where('facebook_id', $_POST['user_profile']['id']);
					$this->db->from('talent_details');
					$query = $this->db->get();					
				}
				
				/*$this->db->select('*');
				$this->db->where('email', $_POST['user_profile']['email']);
				$this->db->where('facebook_id', $_POST['user_profile']['id']);
				$this->db->from('user');
				$query = $this->db->get();*/
				
				if ($query->num_rows() > 0) {
					
					if($typeid == 1) {
						$this->db->select('*');		
						$this->db->where('email', $_POST['user_profile']['email']);
						$this->db->where('facebook_id', $_POST['user_profile']['id']);
						$this->db->from('client_details');
						$query = $this->db->get();	
						$results = $query->result_array();
					}
					if($typeid == 2) {
						$this->db->select('*');		
						$this->db->where('email', $_POST['user_profile']['email']);
						$this->db->where('facebook_id', $_POST['user_profile']['id']);
						$this->db->from('talent_details');
						$query = $this->db->get();
						$results = $query->result_array();					
					}
					 //session_destroy();
					 //session_start(); 
					$sess_array = array();
					
					if($typeid == 1) {
						foreach ($results as $rows) {
							$user_type    = $rows['user_type'];
							$user_profile = array(
								'client_id' => $rows['client_id'],
								
							);
						}
						
						$this->session->set_user_POST($user_profile);
						$myuser_id = $this->session->user_POST('client_id'); 
						$this->load->view('client_dashboard');
					}
					
					if($typeid == 2) {
						foreach ($results as $rows) {
							$user_type    = $rows['user_type'];
							$user_profile = array(
								'talent_id' => $rows['talent_id'],
								
							);
						}
						
						$this->session->set_user_POST($user_profile);
						$myuser_id = $this->session->user_POST('talent_id'); 
						$this->load->view('talent_dashboard');
					}
					
				}
				else{
				
					$user_name = explode("@", $_POST['user_profile']['email']);
					
					$_POSTs     = array(
							
							'facebook_id' => $_POST['user_profile']['id'],
							'login_type' => 'facebook',
							'email' => $_POST['user_profile']['email'],
							'first_name' => $_POST['user_profile']['first_name'],
							'last_name' => $_POST['user_profile']['last_name'],
							'profile_url' => $_POST['user_profile']['picture']['_POST']['url'],
							'latitude' => 40.703985468162934,
							'longitude' => -73.87580507441407,
							'date' => $timeNdate,
							'typeid' => $typeid
						);
						$this->db->insert('fb', $_POSTs);
					
				
					$this->db->select('*');		
					$this->db->where('email', $_POST['user_profile']['email']);
					$this->db->where('facebook_id', $_POST['user_profile']['id']);
					$this->db->from('fb');
					$query = $this->db->get();
					$results = $query->result_array();
				
				
				
            if (!empty($results)) {
				  //session_destroy();
				 //session_start(); 
                $sess_array = array();
				
				if($typeid == 1) {
					foreach ($results as $rows) {
						$user_type    = $rows['user_type'];
						$user_profile = array(
							'facebook_id' => $rows['facebook_id'],
							'login_type' => $rows['login_type'],
							'email' => $rows['email'],
							'first_name' => $rows['first_name'],
							'last_name' => $rows['last_name'],
							'profile_url' => $rows['profile_url'],
							'latitude' => $rows['latitude'],
							'longitude' => $rows['longitude'],
							'date' => $rows['date'],
							'typeid' => $rows['typeid'],
							
						);
					}
					
					$result['profile'] = $user_profile;
					$this->load->view('client_registration',$result);
				}
				
				if($typeid == 2) {
					foreach ($results as $rows) {
						$user_type    = $rows['user_type'];
						$user_profile = array(
							'facebook_id' => $rows['facebook_id'],
							'login_type' => $rows['login_type'],
							'email' => $rows['email'],
							'first_name' => $rows['first_name'],
							'last_name' => $rows['last_name'],
							'profile_url' => $rows['profile_url'],
							'latitude' => $rows['latitude'],
							'longitude' => $rows['longitude'],
							'date' => $rows['date'],
							'typeid' => $rows['typeid'],
							
						);
					}
					
					$result['profile'] = $user_profile;
					$this->load->view('talent_registration',$result);
				}
			
				
			}
			else{
				redirect(base_url());
			}
			 
			 

			
		 }
		 }
	   
	   else {
				$authUrl= $_POST['login_url'] = $this->facebook->getLoginUrl(array(
                'scope' => 'email'
				));
				redirect($authUrl);
			}
	   
	   
        
    }
	
    public function logout()
    {
		session_destroy();
        unset($_SESSION['access_token']);
        redirect(base_url());
    }
}
?>