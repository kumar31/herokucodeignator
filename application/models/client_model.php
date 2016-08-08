<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("UTC");
class client_model extends CI_Model {
	public function __construct()
	{
		parent::__construct(); 
	}
	
	
	
	function email($client_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['email'];	
		
	}
	
	function first_name($client_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['first_name'];	
		
	}
	
	function client_stripe_id($client_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['stripe_id'];	
		
	}
	
	function client_transaction_id($client_id,$event_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->where('event_id',$event_id);		
			$this->db->from('client_payment_details');
			$this->db->order_by('amount','DESC');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result[0]['transaction_id'];	
		
	}
	
	function client_details($result){
			
			foreach($result as $key=>$val){
			
				$result[$key]['client_first_name'] = $this->first_name($val['client_id']);
				
			}
			
			return $result;
	}
	
	function client($client_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->from('client_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;	
		
	}
	
	function client_card_details($client_id)
	{		
		
			$this->db->select('*');		
			$this->db->where('client_id',$client_id);		
			$this->db->from('client_card_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			return $result;	
		
	}
	
	function client_paid_details($result){
		
		foreach($result as $key=>$val) {
			
			$event_id = $val['event_id'];
			$client_id = $val['client_id'];
			
			$this->db->select('*');		
			$this->db->where('event_id',$event_id);					
			$this->db->where('client_id',$client_id);				
			$this->db->from('client_payment_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			
		}
		return $result;
	}
	
	function talent_earned_details($result){
		
		foreach($result as $key=>$val) {
			
			$event_id = $val['event_id'];
			$talent_id = $val['talent_id'];
			
			$this->db->select('sum(talent_payment_details.amount) as total_amount');		
			$this->db->where('event_id',$event_id);					
			//$this->db->where('talent_id',$talent_id);				
			$this->db->from('talent_payment_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
			
		}
		return $result[0]['total_amount'];
	}
	
	function client_payment_details($client_id)
	{		
		$from = $_POST['startdate'];
		$from = date('Y:m:d H:i:s', strtotime($from));
		
		$to = $_POST['enddate'];
		$to = date('Y:m:d H:i:s', strtotime($to));
		
		if((isset($_POST['startdate'])) && (isset($_POST['enddate']))) {
			
			$this->db->select('client_payment_details.*,event_detail.event_name,sum(client_payment_details.amount) as amount');		
			$this->db->where('client_payment_details.client_id',$client_id);	
			$where = "datetime  BETWEEN '".$from."' AND '".$to."' ";
			$this->db->where($where);
			$this->db->where('client_payment_details.transaction_id !=',"");
			$this->db->from('client_payment_details');
			$this->db->join('event_detail','event_detail.event_id = client_payment_details.event_id','LEFT');
			$this->db->group_by('event_id');
			$query = $this->db->get();
			$result = $query->result_array();
			
		}
		else {
			
			$this->db->select('client_payment_details.*,event_detail.event_name,sum(client_payment_details.amount) as amount');		
			$this->db->where('client_payment_details.client_id',$client_id);
			$this->db->where('client_payment_details.transaction_id !=',"");			
			$this->db->from('client_payment_details');
			$this->db->join('event_detail','event_detail.event_id = client_payment_details.event_id','LEFT');
			$this->db->group_by('event_id');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		
		 
		return $result;	
		
	}
	
	function client_current_mon_details($client_id) {
		$first_day_this_month = date('Y-m-01 H:i:s'); 
		$last_day_this_month  = date('Y-m-t H:i:s');
		
		$this->db->select('sum(client_payment_details.amount) as total_amount');		
		$this->db->where('client_id',$client_id);		
		$where = "datetime  BETWEEN '".$first_day_this_month."' AND '".$last_day_this_month."' ";
		$this->db->where($where);
		$this->db->from('client_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		$client_total_amt = $result[0]['total_amount'];
		//$paid_to_talent = $this->paid_to_talent_details($client_id);
		$results = $client_total_amt;
		
		return $results;	
	}
	
	function client_current_day_details($client_id) {
		$time = date('Y-m-d 00:00:00'); 
		$time_now  = date('Y-m-d H:i:s', strtotime("+1 day"));
		
		$this->db->select('sum(client_payment_details.amount) as total_amount_day');		
		$this->db->where('client_id',$client_id);		
		$where = "datetime  BETWEEN '".$time."' AND '".$time_now."' ";
		$this->db->where($where);
		$this->db->from('client_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		return $result;	
	}
	
	function client_paid_overall_details($client_id) {
		
		$this->db->select('sum(client_payment_details.amount) as total_amount_paid');		
		$this->db->where('client_id',$client_id);		
		$this->db->from('client_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		$client_total_amt = $result[0]['total_amount_paid'];
		
		/*$this->db->select('*');		
		$this->db->where('client_id',$client_id);	
		$this->db->from('client_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		foreach($result as $key=>$val) {
			$event_id = $val['event_id'];
			
			$this->db->select('sum(talent_payment_details.amount) as total_amount_paid_to_talent');		
			$this->db->where('event_id',$event_id);							
			$this->db->from('talent_payment_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
		}
		
		$paid_to_talent = $result[0]['total_amount_paid_to_talent'];*/
		$results = $client_total_amt;
		
		return $results;
		
	}
	
	function client_refund_details($client_id) {
		
		$this->db->select('sum(client_payment_details.amount) as refund_amount');		
		$this->db->where('client_id',$client_id);		
		$this->db->where('description','Refund amount');		
		$this->db->from('client_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		
		return $result;	
	}
	
	function paid_to_talent_details($client_id){
		$first_day_this_month = date('Y-m-00 H:i:s'); 
		$last_day_this_month  = date('Y-m-t H:i:s');
		
		$this->db->select('*');		
		$this->db->where('client_id',$client_id);	
		$where = "datetime  BETWEEN '".$first_day_this_month."' AND '".$last_day_this_month."' ";
		$this->db->where($where);
		$this->db->from('client_payment_details');
		$query = $this->db->get();
		$result = $query->result_array(); 
		//echo $event_id = $result[0]['event_id'];
		
		foreach($result as $key=>$val) {
			$event_id = $val['event_id'];
			
			$this->db->select('sum(talent_payment_details.amount) as total_amount_paid_to_talent');		
			$this->db->where('event_id',$event_id);							
			$this->db->from('talent_payment_details');
			$query = $this->db->get();
			$result = $query->result_array(); 
		}
		
		return $result[0]['total_amount_paid_to_talent'];
	}
}
	