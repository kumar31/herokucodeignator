<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class type_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	
	function index()
	{
		$dateFormat="Y-m-d H:i:s";
		$timeNdate=gmdate($dateFormat, time());	
		
		$data = array(
			'type' 			=> $_POST['type']
		);
		
		$this->db->where('typeid',$_POST['typeid']);
		$this->db->update('type',$data);
	
	}
	
}
	