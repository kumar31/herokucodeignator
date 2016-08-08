<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class searchfiltersort_model extends CI_Model {
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
		$search = $_POST['search'];
		$best_rating = $_POST['best_rating'];
		$best_rank = $_POST['best_rank'];
		$no_of_event = $_POST['no_of_event'];
		
		$select = "SELECT * FROM talent_details LEFT JOIN `talent_review` ON `talent_details`.`talent_id`=`talent_review`.`talent_id` WHERE talent_details.status = 1";
		
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
		
		if($search != ""){
			$select .= ' AND (`email`= "'.$search.'" OR `first_name`= "'.$search.'" OR `last_name`= "'.$search.'")';
		}
		
		if($best_rating != ""){
			$select .= ' ORDER BY `talent_review`.`review_star` DESC';			
		}
		
		/*if($no_of_event != ""){
			$select .= ' GROUP BY `talent_review`.`talent_id` DESC AND ORDER BY total_events DESC';			
		}*/
		
		$query = $this->db->query($select);
		$result = $query->result_array();
		
		return $result;
		
	}
	
}
	