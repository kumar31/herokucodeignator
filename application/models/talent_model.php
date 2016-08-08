<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("GMT");
class talent_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('review_model');
	}
	
	
	
	function email($talent_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('talent_id',$talent_id);		
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['email'];	
		
	}
	
	function first_name($talent_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('talent_id',$talent_id);		
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['first_name'];	
		
	}
	function talent_count($result){
			
			$this->db->select('count(*) as talent_count');	
			$this->db->from('talent_details');
			$query = $this->db->get();
			$invite_count = $query->result_array();
			$talent_count = $invite_count[0]['talent_count']; 
		
			return $talent_count;
	}
	
	function talentdetails($result)
	{		
		
			foreach($result as $key=>$val){
			
				$talent_id = $val['talent_id'];
				
				$this->db->select('first_name,last_name,profile_url,special_skills,gender,city,hair_color,eye_color,height,address');	
				$this->db->where('talent_id',$talent_id);						
				$this->db->from('talent_details');
				$query = $this->db->get();
				$result = $this->review_model->review_count($result);	
				$result[$key]['talent_details'] = $query->result_array(); 
				
			}
			
			return $result;	
		
	}
	
	function talent($talent_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('talent_id',$talent_id);		
			$this->db->from('talent_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;	
		
	}
	
	function talent_card_details($talent_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('talent_id',$talent_id);		
			$this->db->from('talent_card_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;	
		
	}
	
	function talent_payment_details($talent_id)
	{		
			$from = $_POST['startdate'];
			$from = date('Y:m:d H:i:s', strtotime($from));
			
			$to = $_POST['enddate'];
			$to = date('Y:m:d H:i:s', strtotime($to));
			
			if((isset($_POST['startdate'])) && (isset($_POST['enddate']))) {
		
				$this->db->select('talent_payment_details.*,event_detail.event_name');		
				$this->db->where('talent_payment_details.talent_id',$talent_id);	
				$where = "datetime  BETWEEN '".$from."' AND '".$to."' ";
				$this->db->where($where);
				$this->db->where('talent_payment_details.transaction_id !=',"");
				$this->db->from('talent_payment_details');
				$this->db->join('event_detail','event_detail.event_id = talent_payment_details.event_id','LEFT');
				$query = $this->db->get();
				$result = $query->result_array(); 
			
			}
			else {
				$this->db->select('talent_payment_details.*,event_detail.event_name');		
				$this->db->where('talent_payment_details.talent_id',$talent_id);
				$this->db->where('talent_payment_details.transaction_id !=',"");				
				$this->db->from('talent_payment_details');
				$this->db->join('event_detail','event_detail.event_id = talent_payment_details.event_id','LEFT');
				$query = $this->db->get();
				$result = $query->result_array(); 
			}
			return $result;	
		
	}
	
	function talent_current_mon_details($talent_id) {
		$first_day_this_month = date('Y-m-00 H:i:s'); 
		$last_day_this_month  = date('Y-m-t H:i:s');
		
		$this->db->select('sum(talent_payment_details.amount) as total_amount');		
		$this->db->where('talent_id',$talent_id);		
		$where = "datetime  BETWEEN '".$first_day_this_month."' AND '".$last_day_this_month."' ";
		$this->db->where($where);
		$this->db->from('talent_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		return $result;	
	}
	
	function talent_current_day_details($talent_id) {
		$time = date('Y-m-d 00:00:00'); 
		$time_now  = date('Y-m-d H:i:s', strtotime("+1 day"));
		
		$this->db->select('sum(talent_payment_details.amount) as total_amount_day');		
		$this->db->where('talent_id',$talent_id);		
		$where = "datetime  BETWEEN '".$time."' AND '".$time_now."' ";
		$this->db->where($where);
		$this->db->from('talent_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		return $result;	
	}
	
	function talent_overall_pay_details($talent_id) {
		
		$this->db->select('sum(talent_payment_details.amount) as total_amount');
		$this->db->where('talent_id',$talent_id);
		$this->db->from('talent_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		return $result;	
	}
}
	