<?php 
require_once('stripe/lib/Stripe.php');
  $stripe = array(
    'secret_key'      => 'sk_test_4XdL4dFPx8hLti32fX015uIq',
    'publishable_key' => 'pk_test_X3IuvAd1unZkNQH8BgS0ZL9R'
    );
  Stripe::setApiKey($stripe['secret_key']);
  
if((isset($_POST['stripe_id']))){
	try {
			
		   $customerId = $_POST['stripe_id']; 
		   $amount = $_POST['amount'] * 100; 
		   $event_id = $_POST['event_id'];
		   $client_id = $_POST['client_id'];
		   $no_of_talents_requested = $_POST['no_of_talents_requested'];
		 
			   if (!isset($customerId))
			  throw new Exception("The Stripe Token was not generated correctly");
			 $payment_result = Stripe_Charge::create(array(
			"amount"   => $amount, // 
			"currency" => "usd",
		   // "application_fee" => false,
			"customer" => $customerId // Previously stored, then retrieved
			));
			
			$transaction_id = $payment_result['id'];
				$data = array(
					'is_advance_paid' 						=> 1,
				);
				
				$this->db->where('event_id',$event_id);
				$this->db->update('event_detail',$data);
				
				$date = date('Y-m-d H:i:s');
				$datas = array(
					'client_id' 					=> $client_id,
					'event_id' 						=> $event_id,
					'no_of_talents_requested' 		=> $no_of_talents_requested,
					'transaction_id' 				=> $transaction_id,
					'amount' 						=> $_POST['amount'],
					'datetime' 						=> $date,
					'description' 					=> 'Deposit amount',
				);
				
				$this->db->insert('client_payment_details',$datas);
				
				 echo $success = '1';
				
		 
			
		 
		  // print_r($re);
		  }
		  catch (Exception $e) {
		  $error = $e->getMessage();
		  echo $success = '1';
		  }
		}  
?>