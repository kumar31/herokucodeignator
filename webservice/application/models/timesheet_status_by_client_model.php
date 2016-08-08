<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class timesheet_status_by_client_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	
	function index()
	{
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
		
		$data = array(
		
			'status' 				=> $_POST['status'],
			'datetime' 				=> $timeNdate
		);
		
		$this->db->where('client_id',$_POST['client_id']);	
		$this->db->where('timeline_id',$_POST['timeline_id']);	
		$this->db->update('timeline',$data);
	
	}
	
}
	