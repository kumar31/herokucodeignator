<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class fblogout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		 $this->load->helper('url');
		  //$this->load->model('pro_model');
    }
    function index()
    {
        error_reporting(0);
		 session_start();
		
         $this->load->library('facebook', array(
            'appId' => '831222763678258',
            'secret' => '51a34bb64e16785057d9e732d212bc93'
        ));
       
         $this->user = $this->facebook->getUser(); 
		 if ($this->user) {
			
			 $data['user_profile'] = $this->facebook->api('/me?fields=id,first_name,last_name,picture,email');
			 
				$this->db->select('*');		
				$this->db->from('type');
				$query = $this->db->get(); 
				$result = $query->result_array();
				$typeid = $result[0]['type'];
				
			 //print_r($data['user_profile']); print_r($typeid);  die;
			
				$data['status']       = "1";
				
				// Get logout url of facebook
				$data['logout_url']   = $this->facebook->getLogoutUrl(array(
					'next' => base_url() . 'index.php/client_logout'
				));
				
				$dateFormat           = "Y-m-d H:i:s";
				$timeNdate            = gmdate($dateFormat, time());
				
				if($typeid == 1) {
					$this->db->select('*');		
					$this->db->where('email', $data['user_profile']['email']);
					$this->db->where('facebook_id', $data['user_profile']['id']);
					$this->db->from('client_details');
					$query = $this->db->get();					
				}
				if($typeid == 2) {
					$this->db->select('*');		
					$this->db->where('email', $data['user_profile']['email']);
					$this->db->where('facebook_id', $data['user_profile']['id']);
					$this->db->from('talent_details');
					$query = $this->db->get();					
				}
				
				/*$this->db->select('*');
				$this->db->where('email', $data['user_profile']['email']);
				$this->db->where('facebook_id', $data['user_profile']['id']);
				$this->db->from('user');
				$query = $this->db->get();*/
				
				if ($query->num_rows() > 0) {
					 
					
				}
				else{
				
					$user_name = explode("@", $data['user_profile']['email']);
					
					if($typeid == 1) {
						$datas     = array(
							
							'facebook_id' => $data['user_profile']['id'],
							'login_type' => 'facebook',
							'email' => $data['user_profile']['email'],
							'date' => $timeNdate
						);
						$this->db->insert('client_details', $datas);
					}
					
					if($typeid == 2) {
						$datas     = array(
							
							'facebook_id' => $data['user_profile']['id'],
							'login_type' => 'facebook',
							'email' => $data['user_profile']['email'],
							'date' => $timeNdate
						);
						$this->db->insert('talent_details', $datas);
					}
					
					/*$datas     = array(
						'first_name' => $data['user_profile']['first_name'],
						'last_name' => $data['user_profile']['last_name'],
						'user_name' => $user_name[0],
						'facebook_id' => $data['user_profile']['id'],
						'login_type' => 'facebook',
						'email' => $data['user_profile']['email'],
						'date' => $timeNdate
					);
					$this->db->insert('user', $datas);*/
				}
			 
				/*$this->db->select('*');
				$this->db->where('email', $data['user_profile']['email']);
				$this->db->where('facebook_id', $data['user_profile']['id']);
				$this->db->from('user');
				$this->db->last_query();
				$query  = $this->db->get();
				$results = $query->result_array();*/
				
				if($typeid == 1) {
					$this->db->select('*');		
					$this->db->where('email', $data['user_profile']['email']);
					$this->db->where('facebook_id', $data['user_profile']['id']);
					$this->db->from('client_details');
					$query = $this->db->get();	
					$results = $query->result_array();
				}
				if($typeid == 2) {
					$this->db->select('*');		
					$this->db->where('email', $data['user_profile']['email']);
					$this->db->where('facebook_id', $data['user_profile']['id']);
					$this->db->from('talent_details');
					$query = $this->db->get();
					$results = $query->result_array();					
				}
				
            if (!empty($results)) {
				 
                $sess_array = array();
				
				if($typeid == 1) {
					foreach ($results as $rows) {
						$user_type    = $rows['user_type'];
						$user_profile = array(
							'client_id' => $rows['client_id'],
							
						);
					}
					
					$this->session->set_userdata($user_profile);
					$myuser_id = $this->session->userdata('client_id'); 
					$this->load->view('client_dashboard');
				}
				
				if($typeid == 2) {
					foreach ($results as $rows) {
						$user_type    = $rows['user_type'];
						$user_profile = array(
							'talent_id' => $rows['talent_id'],
							
						);
					}
					
					$this->session->set_userdata($user_profile);
					$myuser_id = $this->session->userdata('talent_id'); 
					$this->load->view('talent_dashboard');
				}
			
				
			}
			else{
				redirect(base_url());
			}
			 
			 

			
		 }
	   
	   else {
				$authUrl= $data['login_url'] = $this->facebook->getLoginUrl(array(
                'scope' => 'email'
				));
				redirect($authUrl);
			}
	   
	   
        
    }
    public function logout()
    {
        unset($_SESSION['access_token']);
        redirect(base_url());
    }
}
?>