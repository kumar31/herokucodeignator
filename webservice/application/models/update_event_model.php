<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class update_event_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
	}
	
	
	
	function index()
	{
		$this->db->select('*');
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->from('event_detail');
		$query = $this->db->get();
		$result = $query->result_array();
		$event_pic = $result[0]['event_pic'];
		
		if($_POST['event_pic'] == "") {
			$event_pic = $event_pic;
		}
		else {
			$event_pic = $_POST['event_pic'];
		}	
			
			if($_FILES["uniform_image"]["name"] != "")  
			{   
				
				$my_string = substr(str_shuffle(MD5(microtime())), 0, 6); 
				$name = $my_string.'_'.$_POST['client_id'].'_'.$_POST['uniform_image'].'.png';
				$_FILES["uniform_image"]["name"]=$name;
				$uniform_image=$_FILES["uniform_image"]["name"];
				$_POST['uniform_image'] = $_FILES["uniform_image"]["name"];
				move_uploaded_file($_FILES["uniform_image"]["tmp_name"],"../nectorimg/".$uniform_image);
				
				$uniform_image= base_url().'nectorimg/'.$uniform_image;  
				
			}
			else
			{
				$uniform_image= "";
			}
			
		$startdatetime = $_POST['start_datetime'];
		$start_datetime = date('Y:m:d H:i:s', strtotime($startdatetime));
		
		$enddatetime = $_POST['end_datetime'];
		$end_datetime = date('Y:m:d H:i:s', strtotime($enddatetime));
			
		$data = array(
			'email' 	   				=> $this->client_model->email($_POST['client_id']),			
			'event_name' 				=> $_POST['event_name'],
			'event_contact' 			=> $_POST['event_contact'],
			'event_pic' 				=> $event_pic,
			'start_datetime' 			=> $start_datetime,
			'end_datetime' 				=> $end_datetime,
			'location' 					=> $_POST['location'],
			'postalcode' 				=> $_POST['postalcode'],
			'latitude' 					=> $_POST['latitude'],
			'longitude' 				=> $_POST['longitude'],
			'number_of_guests' 			=> $_POST['number_of_guests'],
			'description' 				=> $_POST['description'],
			'starting_instructions' 	=> $_POST['starting_instructions'],
			'uniform' 					=> $_POST['uniform'],
			'uniform_description' 		=> $_POST['uniform_description'],
			'uniform_image' 			=> $uniform_image,
			'uniform_provided' 			=> $_POST['uniform_provided'],
			'open_to_all' 				=> $_POST['open_to_all'],
			'talent_requested_for' 		=> $_POST['talent_requested_for'],
			'number_of_waiters' 		=> $_POST['number_of_waiters']
		);
		
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->update('event_detail',$data);
	
	}
	
}
	