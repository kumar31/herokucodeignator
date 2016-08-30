<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
class search_talent extends CI_Controller {

public function __construct()
	{
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			$this->load->model('get_talent_list_model');
			$this->load->model('checkin_model');
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
			$value = 'get_total_rows';
			$position = '0';
			$items_per_group = '5';
			$talent_list['get_total_rows'] =$this->gettotalrows($value,$position,$items_per_group);
			$talent_list['items_per_group']='5';		
			//$talent_list['list'] =  $this->get_talent_list_model->index();
			$this->load->view('search_talent',$talent_list);
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
		$employees = $_POST['employees'];
		$contractors = $_POST['contractors'];
		if($employees != ""){
			$reg_type = $employees;
		}
		else if($contractors != ""){
			$reg_type = $contractors;
		}
		else {
			$reg_type = $_POST['eve_type'];
		}
		//echo $reg_type;
		//$select = "SELECT * FROM talent_details LEFT JOIN `talent_review` ON `talent_details`.`talent_id`=`talent_review`.`talent_id` WHERE talent_details.status = 1";
		$select = "SELECT * FROM talent_details WHERE talent_details.status = 0 AND (reg_type = '".$reg_type."' OR reg_type='3')";
		
		
		
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
				
				/*$this->db->select('*');			
				$this->db->from('talent_details');			
				$query = $this->db->get();			
				$result = $query->result_array();*/
				$value = 'returnresult';
				//$query=$this->db->query("SELECT * from talent_details ORDER BY talent_id ASC LIMIT $position, $items_per_group");			
				$data['blogs']= $result = $this->gettotalrows($value,$position,$items_per_group);
				
				$data['blogs'] = $this->checkin_model->rating_details($result);
				$data['blogs'] = $this->checkin_model->rating_avg($data['blogs']); 
				//print"<pre>"; print_r($data['blogs']);
				$this->load->view('talent_list_view',$data);
				
			}
	}
	
}
