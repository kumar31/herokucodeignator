<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class manage_events extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->model('get_my_events_model');
			$this->load->library('form_validation', 'session');
			$this->form_validation->set_error_delimiters('', ''); 
			
	
	}
	public function index()
	{
		$myuser_id = $this->session->userdata('client_id'); 
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		}
		if($myuser_id!="") {
			$my_events_list['get_total_rows'] =$this->gettotalrows($myuser_id); 
			$my_events_list['items_per_group']='5';	
			$my_events_list['myuser_id']=$myuser_id;	
			$this->load->view('manage_events',$my_events_list);
		}
		else {
			redirect('login');
		}		
	}
	
	function gettotalrows($myuser_id){
		
		    $this->db->select('*');
			$this->db->where('client_id',$myuser_id);		
			$this->db->where('launch_status',1);		
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
				
				$myuser_id = $this->session->userdata('client_id'); 
				if($myuser_id == ''){
					$myuser_id = $this->input->cookie('client',true);
				}
				$this->db->select('*');			
				$this->db->where('client_id',$myuser_id);		
				$this->db->where('launch_status',1);		
				$this->db->from('event_detail');
				$query = $this->db->get();			
				$result = $query->result_array(); 
				
				$query=$this->db->query("SELECT * from event_detail WHERE launch_status = 1 AND client_id = ".$myuser_id." ORDER BY event_id DESC LIMIT $position, $items_per_group");			
				$data['events'] = $result = $query->result_array();
				$data['events'] = $this->invite_model->invite_details($result);
				//$data['events'] = $this->invite_model->invited_details_event($result);
				//print_r($data['events']);
				$this->load->view('manage_events_list_view',$data);
				
			}
	}
	
}
