<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class closed_events_talent extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('get_my_invited_event_model');
			$this->load->model('checkin_model');
			$this->load->model('get_talent_list_model');
			$this->load->model('client_model');
			$this->form_validation->set_error_delimiters('', ''); 
			
	
	}
	public function index()
	{
		
		$myuser_id = $this->session->userdata('talent_id'); 
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('talent',true);
		}
		if($myuser_id!="") {
			$invited_event_list['get_total_rows'] =$this->gettotalrows($myuser_id); 
			$invited_event_list['items_per_group']='5';	
			$invited_event_list['myuser_id']=$myuser_id;	
			$this->load->view('closed_events_talent',$invited_event_list);
		}
		else {
			redirect('login');
		}
	}
	
	function gettotalrows($myuser_id){
		$status = array(1,3);
		    $this->db->select('invite_talent_to_event.*');
			$this->db->where('talent_id',$myuser_id);
			$this->db->where_in('invite_talent_to_event.status',$status);
			$this->db->where('event_detail.launch_status',1);
			$this->db->join('event_detail','invite_talent_to_event.event_id = event_detail.event_id','LEFT');
			$this->db->from('invite_talent_to_event');	
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
				$status = array(1,3);
				
				$this->db->select('invite_talent_to_event.*');
				$this->db->where('talent_id',$myuser_id);
				$this->db->where_in('invite_talent_to_event.status',$status);
				$this->db->where('event_detail.launch_status',1);
				$this->db->join('event_detail','invite_talent_to_event.event_id = event_detail.event_id','LEFT');
				$this->db->from('invite_talent_to_event');	
				$query = $this->db->get(); 		
				$result = $query->result_array();  
				
				$query=$this->db->query("SELECT invite_talent_to_event.* from invite_talent_to_event left join event_detail on invite_talent_to_event.event_id = event_detail.event_id WHERE invite_talent_to_event.status IN (1,3) AND launch_status = 1 AND talent_id = ".$myuser_id." ORDER BY invite_id DESC LIMIT $position, $items_per_group");			
				$data['invited_events'] = $result = $query->result_array();
				$data['invited_events'] = $this->event_model->closed_event_details($result);
				$data['talent_detail'] = $this->get_talent_list_model->talent($myuser_id);
				//print"<pre>";
				//print_r($data['invited_events']);
				$this->load->view('closed_events_talent_list_view',$data);
				
			}
	}
	
}
