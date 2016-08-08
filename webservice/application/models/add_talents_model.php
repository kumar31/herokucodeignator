<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class add_talents_model extends CI_Model {
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
		
		if(empty($result)) {
			$talentid = implode(',',array_unique(explode(',',$_POST['talent_id'])));
			
			$data = array(
				'client_id' 			=> $_POST['client_id'],
				'talent_id' 			=> $talentid
			);
		
			$this->db->insert('added_talents',$data);
		}
		
		else {
			$talent_id = $result[0]['talent_id'].','.$_POST['talent_id'];
			$talentid = implode(',',array_unique(explode(',',$talent_id)));
			
			$data = array(
				'talent_id' 			=> $talentid
			);
		
			$this->db->where('client_id',$_POST['client_id']);
			$this->db->update('added_talents',$data);
		}
		
	}
	
}
	