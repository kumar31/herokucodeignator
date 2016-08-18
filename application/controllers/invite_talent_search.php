<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class invite_talent_search extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->library('form_validation', 'session');
			$this->load->model('get_talent_list_model');
			$this->load->model('checkin_model');
			$this->load->model('mail_model');
			$this->form_validation->set_error_delimiters('', '');
			
	}
	public function index()
	{  	
		$myuser_id = $this->session->userdata('client_id');
		if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		}
		if($myuser_id!="") {	
			$value = 'get_total_rows';
			$position = '0';
			$items_per_group = '5';
			$client_id = $myuser_id;
			$talent_list['get_total_rows'] =$this->gettotalrows($value,$position,$items_per_group);
			$talent_list['items_per_group']='5';		
			$talent_list['event_id'] = $this->uri->segment(2);
			$event_id = $this->uri->segment(2);
			$talent_list['event_detail']= $this->event_model->event_detail_client($event_id,$myuser_id);			
			//$talent_list['list'] =  $this->get_talent_list_model->index();
			$this->load->view('invite_talent_search',$talent_list);
		}
		else {
			redirect('login');
		}
		
	}
	
	function gettotalrows($value,$position,$items_per_group){
		
		$height_min = $_POST['height_min']; 
		$height_max = $_POST['height_max']; 
		$hair_color = $_POST['hair_color']; 
		$eye_color = $_POST['eye_color'];
		$special_skills = $_POST['special_skills'];
		$languages = $_POST['languages'];
		$gender = $_POST['gender'];
		$search = $_POST['search'];
		$best_rating = $_POST['best_rating'];
		$best_rank = $_POST['best_rank'];
		$no_of_event = $_POST['no_of_event'];
		
		$eurl = $this->uri->segment(3);
		if($_POST['eventid'] != "") {
			$event_id = $_POST['eventid']; 
		}
		if($eurl != "") {
			$event_id = $eurl;
		} 
		$this->db->select('*');	
		$this->db->where('event_id',$event_id);						
		$this->db->from('event_detail');
		$query = $this->db->get();
		$result = $query->result_array();
		$talent_type = $result[0]['talent_type'];
		
		//$select = "SELECT * FROM talent_details LEFT JOIN `talent_review` ON `talent_details`.`talent_id`=`talent_review`.`talent_id` WHERE talent_details.status = 1";
		$select = "SELECT * FROM talent_details WHERE talent_details.status = 0 AND (reg_type='".$talent_type."' OR reg_type='3')";
		
		if($hair_color != ""){
			$select .= ' AND hair_color = "'.$hair_color.'"';
		}
		
		if($eye_color != ""){
			$select .= ' AND eye_color = "'.$eye_color.'"';
		}
			
		if($height_min != ""){
			$select .= ' AND height >= "'.$height_min.'"';
		}
		
		if($height_max != ""){
			$select .= ' AND height <= "'.$height_max.'"';
		}
		
		if($languages != ""){
			$languages = explode(',',$languages); 
			$i = 0;
			$select .= ' AND (';
			foreach($languages as $val) { 
				if($i == 0) {
					$select .= ' FIND_IN_SET("'.$val.'",languages)';
				}
				else {
					$select .= ' OR FIND_IN_SET("'.$val.'",languages)';
				}
				$i++;
			} $select .= ' ) ';
		}
		
		if($special_skills != ""){
			$special_skills = explode(',',$special_skills); 
			$i = 0;
			$select .= ' AND (';
			foreach($special_skills as $val) { 
				if($i == 0) {
					$select .= ' FIND_IN_SET("'.$val.'",special_skills)';
				}
				else {
					$select .= ' OR FIND_IN_SET("'.$val.'",special_skills)';
				}
				$i++;
			} $select .= ' ) ';
		}
		
		if($gender == "1"){
			$select .= ' AND gender = "'.$gender.'"';
		}
			
		if($gender == "0"){
			$select .= ' AND gender = "'.$gender.'"';
		}
		
		if($search != ""){
			$select .= ' AND (`email`= "'.$search.'" OR `first_name`= "'.$search.'" OR `last_name`= "'.$search.'" OR `user_name`= "'.$search.'")';
		}
		
		
		
		
		if($best_rating == "1"){
			$select .= ' ORDER BY `talent_details`.`average_rating` DESC';			
		}
		
		if($best_rating == "2"){
			$select .= ' ORDER BY `talent_details`.`total_events_attended` DESC';			
		}
		
		if($value == 'returnresult'){
			$select .= ' LIMIT '.$position.' , '.$items_per_group.'';	
		}
		//$select .= ' ';
		//echo $select;
		$query = $this->db->query($select);
		if($value == 'get_total_rows'){
			return $query->num_rows();
		}
		if($value == 'returnresult'){
			$result = $query->result_array();
			return $result;
		}
		
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
				/*$this->db->select('*');			
				$this->db->from('talent_details');			
				$query = $this->db->get();			
				$result = $query->result_array();*/
				$value = 'returnresult';
				//$query=$this->db->query("SELECT * from talent_details ORDER BY talent_id ASC LIMIT $position, $items_per_group");			
				$data['blogs']= $result = $this->gettotalrows($value,$position,$items_per_group);
				$data['blogs'] = $this->checkin_model->rating_details($data['blogs']); 
				$data['blogs'] = $this->checkin_model->rating_avg($data['blogs']); 
				
				
				$data['myuser_id'] = $myuser_id; 
				
				$eurl = $this->uri->segment(3);
					if($_POST['eventid'] != "") {
						$event_id = $_POST['eventid']; 
					}
					if($eurl != "") {
						$event_id = $eurl;
					}
				$data['event_id'] = $eurl;
				$data['blogs'] = $this->invite_model->invited_details_talent($data,$data['blogs']);
				
				//print "<pre>"; print_r($data['blogs']); print "<pre>";
				$this->load->view('invite_talent_search_list_view',$data);
				
			}
	}
	
}
