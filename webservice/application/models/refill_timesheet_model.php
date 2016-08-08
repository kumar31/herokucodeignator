<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class refill_timesheet_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	
	function index()
	{
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
		
		$data = array(
			'number_of_days' 		=> $_POST['number_of_days'],
			'number_of_hours' 		=> $_POST['number_of_hours'],
			'number_of_minutes' 	=> $_POST['number_of_minutes'],
			'comments' 				=> $_POST['comments'],
			'status' 				=> $_POST['status'],
			'datetime' 				=> $timeNdate
		);
		
		$this->db->where('timeline_id',$_POST['timeline_id']);	
		$this->db->where('talent_id',$_POST['talent_id']);	
		$this->db->update('timeline',$data);
	
	}
	
}
	