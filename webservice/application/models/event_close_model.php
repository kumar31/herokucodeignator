<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class event_close_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	
	}
	
	
	
	function index()
	{
			
		$data = array(
			'status' 					=> 1
		);
		
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->update('event_detail',$data);
	
	}
	
}
	