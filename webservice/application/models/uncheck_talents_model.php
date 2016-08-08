<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class uncheck_talents_model extends CI_Model {
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
		
		$talent_id = explode(',',$result[0]['talent_id']); 
		$talentid = explode(',',$_POST['talent_id']); 
		
		$results=implode(',',array_diff($talent_id,$talentid));
		$data = array(
			'talent_id' 			=> $results
		);
	
		$this->db->where('client_id',$_POST['client_id']);
		$this->db->update('added_talents',$data);
	}
	
}
	