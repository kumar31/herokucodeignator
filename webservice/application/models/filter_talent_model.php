<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class filter_talent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function index()
	{		
		
		$height_min = $_POST['height_min']; 
		$height_max = $_POST['height_max']; 
		$hair_color = $_POST['hair_color']; 
		$eye_color = $_POST['eye_color'];
		$special_skills = $_POST['special_skills'];
		$languages = $_POST['languages'];
		$gender = $_POST['gender'];
		
		$select = "SELECT * FROM talent_details WHERE status = 1";
		
		if($hair_color != ""){
			$select .= ' AND hair_color = "'.$hair_color.'"';
		}
		
		if($eye_color != ""){
			$select .= ' AND eye_color = "'.$eye_color.'"';
		}
			
		if($height_min != ""){
			$select .= ' AND height >= "'.$height_min.'"';
		}
		
		if($height_max != ""){
			$select .= ' AND height <= "'.$height_max.'"';
		}
		
		if($languages != ""){
			$languages = explode(',',$languages); 
			$i = 0;
			$select .= ' AND (';
			foreach($languages as $val) { 
				if($i == 0) {
					$select .= ' FIND_IN_SET("'.$val.'",languages)';
				}
				else {
					$select .= ' OR FIND_IN_SET("'.$val.'",languages)';
				}
				$i++;
			} $select .= ' ) ';
		}
		
		if($special_skills != ""){
			$special_skills = explode(',',$special_skills); 
			$i = 0;
			$select .= ' AND (';
			foreach($special_skills as $val) { 
				if($i == 0) {
					$select .= ' FIND_IN_SET("'.$val.'",special_skills)';
				}
				else {
					$select .= ' OR FIND_IN_SET("'.$val.'",special_skills)';
				}
				$i++;
			} $select .= ' ) ';
		}
		
		if($gender == "1"){
			$select .= ' AND gender = "'.$gender.'"';
		}
			
		if($gender == "0"){
			$select .= ' AND gender = "'.$gender.'"';
		}
			
		$query = $this->db->query($select);
		$result = $query->result_array();
		
		return $result;
		
	}
	
}
	