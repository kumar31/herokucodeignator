<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class clone_event_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('client_model');
	}
	
	
	
	function index()
	{
		$this->db->select('*');
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->from('event_detail');
		$query = $this->db->get();
		$result = $query->result_array();
		
		$first_name = $result[0]['first_name'];
		$last_name = $result[0]['last_name'];
		$start_datetime = $result[0]['start_datetime'];
		$end_datetime = $result[0]['end_datetime'];
		$location = $result[0]['location'];
		$locality = $result[0]['locality'];
		$sublocality = $result[0]['sublocality'];
		$borough = $result[0]['borough'];
		$district = $result[0]['district'];
		$state = $result[0]['state'];
		$country = $result[0]['country'];
		$postalcode = $result[0]['postalcode'];
		$latitude = $result[0]['latitude'];
		$longitude = $result[0]['longitude'];
		$number_of_guests = $result[0]['number_of_guests'];
		$description = $result[0]['description'];
		$starting_instructions = $result[0]['starting_instructions'];
		$uniform_description = $result[0]['uniform_description'];
		$uniform_image = $result[0]['uniform_image'];
		$uniform_provided = $result[0]['uniform_provided'];
		$number_of_waiters = $result[0]['number_of_waiters'];
			
		$data = array(
			'client_id' 				=> $_POST['client_id'],
			'email' 	   				=> $this->client_model->email($_POST['client_id']),
			'first_name' 				=> $first_name,
			'last_name' 				=> $last_name,
			'event_name' 				=> $_POST['event_name'],
			'start_datetime' 			=> $start_datetime,
			'end_datetime' 				=> $end_datetime,
			'location' 					=> $location,
			'locality' 					=> $locality,
			'sublocality' 				=> $sublocality,
			'borough' 					=> $borough,
			'district' 					=> $district,
			'state' 					=> $state,
			'country' 					=> $country,
			'postalcode' 				=> $postalcode,
			'latitude' 					=> $latitude,
			'longitude' 				=> $longitude,
			'number_of_guests' 			=> $number_of_guests,
			'description' 				=> $description,
			'starting_instructions' 	=> $starting_instructions,
			'uniform_description' 		=> $uniform_description,
			'uniform_image' 			=> $uniform_image,
			'uniform_provided' 			=> $uniform_provided,
			'number_of_waiters' 		=> $number_of_waiters
		);
		
		
		$this->db->insert('event_detail',$data);
	
	}
	
}
	