<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class timesheet_by_talent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	
	function index()
	{
		$this->db->select('*');
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->from('timeline');
		$query = $this->db->get();
		$result = $query->result_array();
		
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
		
		if(empty($result)) {
			$data = array(
				'event_id' 	   			=> $_POST['event_id'],
				'client_id' 	   		=> $_POST['client_id'],
				'talent_id' 			=> $_POST['talent_id'],
				'number_of_days' 		=> $_POST['number_of_days'],
				'number_of_hours' 		=> $_POST['number_of_hours'],
				'number_of_minutes' 	=> $_POST['number_of_minutes'],
				'comments' 				=> $_POST['comments'],
				'datetime' 				=> $timeNdate
			);
			
			$this->db->insert('timeline',$data);
		}
		else {
			$data = array(
				'number_of_days' 		=> $_POST['number_of_days'],
				'number_of_hours' 		=> $_POST['number_of_hours'],
				'number_of_minutes' 	=> $_POST['number_of_minutes'],
				'comments' 				=> $_POST['comments'],
				'datetime' 				=> $timeNdate
			);
			
			$this->db->where('client_id',$_POST['client_id']);
			$this->db->where('event_id',$_POST['event_id']);
			$this->db->where('talent_id',$_POST['talent_id']);
			$this->db->update('timeline',$data);
		}
	
	}
	
}
	