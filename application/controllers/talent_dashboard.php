<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class talent_dashboard extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->model('get_event_list_talent_model');
			$this->load->model('talent_model');
			$this->form_validation->set_error_delimiters('', ''); 
	
	}
	
	public function index()
	{
		//$talentid = $this->uri->segment(2); 
		if($_POST['my_userid'] == "") {
			$myuser_id = $this->session->userdata('talent_id'); 
			if($myuser_id == ''){
					$myuser_id = $this->input->cookie('talent',true);
				}
		}
		else {
			$talentid = $_POST['my_userid']; 
			$userdata = array(
            'talent_id'  => $talentid,
			);
			$this->session->set_userdata($userdata);
			$myuser_id = $this->session->userdata('talent_id'); 
			
			$cookie= array(
				'name'   => 'talent',
				'value'  => $myuser_id,
				'expire' => '86500'
			);
			$this->input->set_cookie($cookie);
		}
		
		if($myuser_id == "") {
			redirect('login');
		}
		else{
			$event_list['get_total_rows'] =$this->gettotalrows($myuser_id);
			$event_list['items_per_group']='5';	
			$this->db->truncate('fb');
			$this->load->view('talent_dashboard',$event_list); 
		}
	}
	function talent() {
		$myuser_id = $this->session->userdata('talent_id'); 
		$this->db->select('*');
		$this->db->where('talent_id',$myuser_id);
		$this->db->from('talent_details');			
		$querys = $this->db->get();
		$result = $querys->result_array();
		
		return $result;
	}
	function gettotalrows($myuser_id){
		
			$result = $this->talent();
			
		    $this->db->select('*');
			$this->db->where('status','0');
			$this->db->where('open_to_all','0');
			$this->db->where('launch_status','0');
			$this->db->where('event_id NOT IN (select event_id from invite_talent_to_event where talent_id ='.$myuser_id.')');
			if($result[0]['reg_type'] == 3) {
				$this->db->where('talent_type IN (1,2)');
			}
			else {
				$this->db->where('talent_type IN (select reg_type from talent_details where talent_id ='.$myuser_id.')');
			}
			
			$this->db->from('event_detail');			
			$query = $this->db->get();
			return $query->num_rows() ;
	}
	
	function getblogdata()
	{    
		 if($_POST) 
			{
			    $items_per_group='5';	
				//$group_number = $_POST["group_no"];
			     $group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
				
				//throw HTTP error if group number is not valid
				//if(!is_numeric($group_number)){
				//	header('HTTP/1.1 500 Invalid number!');
				//	exit();
				//}
				
				//get current starting point of records
				$position = ($group_number * $items_per_group);
				$myuser_id = $this->session->userdata('talent_id'); 
				if($myuser_id == ''){
					$myuser_id = $this->input->cookie('talent',true);
				}
				
				$talent = $this->talent();
				
				$this->db->select('*');			
				$this->db->where('status','0');
				$this->db->where('open_to_all','0');
				$this->db->where('launch_status','0');
				$this->db->where('event_id NOT IN (select event_id from invite_talent_to_event where talent_id ='.$myuser_id.')');
				if($talent[0]['reg_type'] == 3) {
				$this->db->where('talent_type IN (1,2)');
				}
				else {
					$this->db->where('talent_type IN (select reg_type from talent_details where talent_id ='.$myuser_id.')');
				}
				$this->db->from('event_detail');	
				$query = $this->db->get();			
				$result = $query->result_array();
				if($talent[0]['reg_type'] == 3) {
					$query=$this->db->query("SELECT * from event_detail WHERE status = 0 AND open_to_all = 0 AND launch_status = 0 AND (event_id NOT IN (select event_id from invite_talent_to_event where talent_id ='".$myuser_id."')) AND (talent_type IN (1,2))  ORDER BY event_id DESC LIMIT $position, $items_per_group");			
				}
				else {
					$query=$this->db->query("SELECT * from event_detail WHERE status = 0 AND open_to_all = 0 AND launch_status = 0 AND (event_id NOT IN (select event_id from invite_talent_to_event where talent_id ='".$myuser_id."')) AND (talent_type IN (select reg_type from talent_details where talent_id ='".$myuser_id."'))  ORDER BY event_id DESC LIMIT $position, $items_per_group");			
				}
				
				$data['events'] = $result = $query->result_array();
				$data['events'] = $this->invite_model->invite_details($result);
				$data['events'] = $this->invite_model->invited_details_event($result);
				//$data['events'] = $this->invite_model->confirm_details_event($result);
				
				//print"<pre>"; print_r($data['events']); print"<pre>";
				$this->load->view('event_list_view',$data);
				
			}
	}
}
