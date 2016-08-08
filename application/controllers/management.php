<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
date_default_timezone_set("UTC");
class management extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->helper('date');
			$this->load->model('get_hired_list_client_model');
			$this->load->model('event_model');
			$this->load->model('hired_info_model');
			$this->load->model('get_talent_list_model');
			$this->load->model('checkin_model');
			$this->load->model('client_model');
			$this->load->library('form_validation', 'session');
			$this->form_validation->set_error_delimiters('', ''); 
			
	
	}
	public function index()
	{
		$url = $this->uri->segment(2);
		if($_POST['event_id'] != "") {
			$event_id = $_POST['event_id']; 
		}
		if($url != "") {
			$event_id = $url;
		}
		
		$myuser_id = $this->session->userdata('client_id'); 
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		}
		if($myuser_id!="") {
			$my_events_list['get_total_rows'] = $this->gettotalrows($myuser_id,$event_id);
			$my_events_list['items_per_group']='5';	
			$my_events_list['myuser_id']= $myuser_id;	
			$my_events_list['event_detail']= $this->event_model->first_name($event_id);	
			$my_events_list['hired_info']= $this->hired_info_model->index($myuser_id,$event_id);
			$my_events_list['stripe_id'] = $this->client_model->client_stripe_id($myuser_id);
			$my_events_list['client_transaction_id'] = $this->client_model->client_transaction_id($myuser_id,$event_id);
			
			$query=$this->db->query("SELECT * from invite_talent_to_event WHERE status IN (1,3) AND client_id = ".$myuser_id." AND event_id = ".$event_id." ");			
			$data['events'] = $result = $query->result_array();
			$my_events_list['events'] = $this->get_talent_list_model->talent_details($data['events']);
			$my_events_list['client_payments'] = $this->client_model->client_paid_details($data['events']);
			$my_events_list['talent_payments'] = $this->client_model->talent_earned_details($data['events']);
			
			$this->load->view('management',$my_events_list);
		}
		else {
			redirect('login');
		}
	}
	
	function gettotalrows($myuser_id,$event_id){
		$status = array(1,3);
		    $this->db->select('*');
			$this->db->where('client_id',$myuser_id);		
			$this->db->where('event_id',$event_id);		
			$this->db->where_in('status',$status);		
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
				
				$myuser_id = $this->session->userdata('client_id'); 
				if($myuser_id == ''){
					$myuser_id = $this->input->cookie('client',true);
				}
				$event_id = $this->uri->segment(3);
				$status = array(1,3);
				
				$this->db->select('*');			
				$this->db->where('client_id',$myuser_id);		
				$this->db->where('event_id',$event_id);		
				$this->db->where_in('status',$status);		
				$this->db->from('invite_talent_to_event');
				$query = $this->db->get();			
				$result = $query->result_array(); 
				
				$query=$this->db->query("SELECT * from invite_talent_to_event WHERE status IN (1,3) AND client_id = ".$myuser_id." AND event_id = ".$event_id." ORDER BY invite_id ASC LIMIT $position, $items_per_group");			
				$data['events'] = $result = $query->result_array(); 
				$data['events'] = $this->checkin_model->rating_details($result);
				$data['events'] = $this->checkin_model->rating_avg($data['events']); 
				
				$data['events'] = $this->invite_model->invited_details_of_talent($data['events']);				
				$data['events'] = $this->get_talent_list_model->talent_details($data['events']);
				$data['event_detail']= $this->event_model->event_detail_client($event_id,$myuser_id);
				
				//echo "<pre>";
				//print_r($data['events']);
				$this->load->view('management_talent_list',$data);
				
			}
	}
	
}
