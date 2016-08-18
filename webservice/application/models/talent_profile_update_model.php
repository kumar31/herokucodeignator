<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_profile_update_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	
	}
	
	
	
	function index()
	{
		$this->db->select('*');		
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->from('talent_details');
		$query = $this->db->get(); 
		$result = $query->result_array();
		$profile_pic = $result[0]['profile_url'];
		$pic1 = $result[0]['pic1'];
		$pic2 = $result[0]['pic2'];
		
		if($_POST['profile_url'] == "") {
			$profile_url = $profile_pic;
		}
		else {
			$profile_url = $_POST['profile_url'];
		}
		
		
		if($_POST['pic1'] == "") {
			$pic1 = $pic1;
		}
		else {
			$pic1 = $_POST['pic1'];
		}
		
		
		if($_POST['pic2'] == "") {
			$pic2 = $pic2;
		}
		else {
			$pic2 = $_POST['pic2'];
		}
			
		$data = array(
			'first_name' 			=> $_POST['first_name'],
			'last_name' 			=> $_POST['last_name'],
			'address' 				=> $_POST['address'],
			'experience' 			=> $_POST['experience'],
			'city' 					=> $_POST['city'],
			'zipcode' 				=> $_POST['zipcode'],
			'country' 				=> $_POST['country'],
			'company' 				=> $_POST['company'],
			'special_skills' 		=> $_POST['special_skills'],
			'gender' 				=> $_POST['gender'],
			'hair_color' 			=> $_POST['hair_color'],
			'eye_color' 			=> $_POST['eye_color'],
			'height' 				=> $_POST['height'],
			'languages' 			=> $_POST['languages'],
			'profile_url' 			=> $profile_url,
			'pic1' 					=> $pic1,
			'pic2' 					=> $pic2,
			'latitude' 				=> $_POST['latitude'],
			'longitude' 			=> $_POST['longitude']
		);
		
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->update('talent_details',$data);
	
	}
	
}
	