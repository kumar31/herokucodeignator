<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class get_agent_details_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encrypt');
	}
	
	
	
	function index()
	{		
		
			$this->db->select('*');		
			$this->db->from('agent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;
			
		
	}
	function edit()
	{		
		
			$this->db->select('*');		
			$this->db->where('agent_id',$_POST['agent_id']);
			$this->db->from('agent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;
			
		
	}
	
	function active_inactive(){
		
		$agent = $this->edit();
		if(!empty($agent)){
			$agent_status = $agent[0]['status'];
			if($agent_status == 1){
				
				$result = array('status'=>'2');
				
			}else{
				
				$result = array('status'=>'1');
				
			}
			$this->db->where('agent_id',$_POST['agent_id']);
			$this->db->update('agent_details',$result);
		}else{
			$result = array('status'=>'3');
		}
		return $result;
	}
	
	function update(){
		if($_POST['password'] == "") {
			$this->db->select('*');		
			$this->db->where('agent_id',$_POST['agent_id']);
			$this->db->from('agent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			$password = $result[0]['password'];
		}
		else{ 
			$password = $this->encrypt->encode($_POST['password']);
		}
		
		$data = array(
		'name'      => $_POST['name'],
		'email'		=> $_POST['email'],
		'password' 	=> $password,
		'percentage'=> $_POST['percentage'],
		'address'	=> $_POST['address'],
		'outfit_fee'=> $_POST['outfit_fee']
		);
		$this->db->where('agent_id',$_POST['agent_id']);
		$this->db->update('agent_details',$data);
		if($this->db->affected_rows() > 0){
			return "success";
		}else{
			return "error";
		}
	}
	function create(){
		$password = $this->encrypt->encode($_POST['password']);
		$data = array(
		'name'      => $_POST['name'],
		'email'		=> $_POST['email'],
		'password' 	=> $password,
		'percentage'=> $_POST['percentage'],
		'address'	=> $_POST['address'],
		'outfit_fee'=> $_POST['outfit_fee'],
		'status'	=> 1,
		);
		$this->db->insert('agent_details',$data);
		
	}
	
}
	