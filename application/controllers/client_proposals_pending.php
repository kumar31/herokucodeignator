<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class client_proposals_pending extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('event_model');
			$this->load->model('hired_info_model');
			$this->load->model('checkin_model');
			$this->load->model('get_talent_list_model');
			$this->form_validation->set_error_delimiters('', ''); 
			
	
	}
	public function index()
	{
		$event_id = $this->uri->segment(2);
		$myuser_id = $this->session->userdata('client_id'); 
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		}
		if($myuser_id!="") {
			$my_event['myuser_id']= $myuser_id;
			$my_event['get_total_rows'] =$this->gettotalrows($myuser_id,$event_id);
			$my_event['items_per_group']='5';			
			$my_event['event_detail']= $this->event_model->event_detail_client($event_id,$myuser_id);	
			$my_event['hired_info']= $this->hired_info_model->index($myuser_id,$event_id);	//print_r($my_event['hired_info']);
			$this->load->view('client_proposals_pending',$my_event);  
		}
		else {
			redirect('login');
		}
		
		
	}
	
	function gettotalrows($myuser_id,$event_id){
		
		    $this->db->select('*');
			$this->db->where('client_id',$myuser_id);		
			$this->db->where('event_id',$event_id);		
			$this->db->where('status',0);		
			$this->db->from('invite_talent_to_event');		
			$query = $this->db->get();
			return $query->num_rows();
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
				$event_id = $this->uri->segment(3);
				
				$this->db->select('*');			
				$this->db->where('client_id',$myuser_id);
				$this->db->where('event_id',$event_id);					
				$this->db->where('status',0);		
				$this->db->from('invite_talent_to_event');
				$query = $this->db->get();			
				$results = $query->result_array(); 
				
				$query=$this->db->query("SELECT * from invite_talent_to_event WHERE status = 0 AND client_id = ".$myuser_id." AND event_id = ".$event_id." ORDER BY invite_id ASC LIMIT $position, $items_per_group");			
				$data['blogs'] = $result = $query->result_array(); 
				$data['blogs'] = $this->checkin_model->rating_details($result);
				$data['blogs'] = $this->checkin_model->rating_avg($data['blogs']); 
				
				$data['blogs'] = $this->get_talent_list_model->talent_details($data['blogs']);
				$data['event_details'] = $this->event_model->first_name($event_id); 
				//print_r($data['blogs']);
				$this->load->view('client_proposals_pending_list_view',$data);
				
			}
	}
	
}
