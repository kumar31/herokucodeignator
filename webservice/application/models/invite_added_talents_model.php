<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class invite_added_talents_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	
	function index()
	{
		$this->db->select('*');	 
		$this->db->where('client_id',$_POST['client_id']);	
		$this->db->from('added_talents');
		$query = $this->db->get();
		$result = $query->result_array(); 
		$talent_id = $result[0]['talent_id'];
		$talentid = explode(',',$talent_id);
		
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
		
		foreach($talentid as $val) {
			$data = array(
				'event_id' 	   			=> $_POST['event_id'],
				'client_id' 	   		=> $_POST['client_id'],
				'talent_id' 			=> $val,
				'datetime' 				=> $timeNdate
			);
			
			$this->db->insert('invite_talent_to_event',$data); 
		}
		
		$this->db->where('client_id',$_POST['client_id']);	
		$this->db->where('talent_id',$talent_id);
		$this->db->delete('added_talents');
		
	}
	
}
	