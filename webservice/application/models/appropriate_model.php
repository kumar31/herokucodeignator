<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class appropriate_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function index()
	{		
			
		$this->db->select('per_hour,agent_fee');		
		$this->db->from('talent_hourly_pay');
		$query = $this->db->get();
		$result = $query->result_array();
		if($_POST['talenttype'] == '1'){
			$per_hour = $result[0]['agent_fee'];
		}else{
			$per_hour = $result[0]['per_hour'];
		}
		$total = $per_hour * $_POST['talentcount'];
		
		$startdatetime = $_POST['start_datetime'];
		$start_datetime = date('Y:m:d H:i:s', strtotime($startdatetime));
		
		$enddatetime = $_POST['end_datetime'];
		$end_datetime = date('Y:m:d H:i:s', strtotime($enddatetime)); 
		
		//$start_datetime = date('2016:03:12 01:12:12');
		//$end_datetime  = date('2016:03:12 02:13:13');
		
		$datetime1 = new DateTime($start_datetime);
		$datetime2 = new DateTime($end_datetime);
		$interval = $datetime1->diff($datetime2);
		$days = $interval->format('%a');
		$hours = $interval->format('%h');
		$minutes = $interval->format('%i');		
		
		$total_days = $days;
		$total_hrs = $hours;
		if($total_days != 0) {
			$total_hrs = $total_hrs + ($total_days * 24);
		}
		
		$total_mins = $minutes;
		
		$mins = round($total_mins/60 * 100);
		$hrs_mins = $total_hrs . "." . $mins;
		$total = $total * $hrs_mins;
		return $total;
	}
	
	
	
	
}
	