<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class review_event_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	
	}
	
	
	function index()
	{
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
			
		$data = array(
			'event_id' 			=> $_POST['event_id'],
			'talent_id' 		=> $_POST['talent_id'],
			'review_star' 		=> $_POST['review_star'],
			'review_comments' 	=> $_POST['review_comments'],
			'datetime' 			=> $timeNdate
		);
		
		$this->db->where('event_id',$_POST['event_id']);
		$this->db->where('talent_id',$_POST['talent_id']);
		$this->db->insert('event_review',$data);
	
	}
	
}
	