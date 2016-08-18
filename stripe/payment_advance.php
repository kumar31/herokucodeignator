<?php
require 'lib/Stripe.php';
require 'config.php';
if((isset($_POST['stripe_id']))){

		try {
		
			$customerId = $_POST['stripe_id']; 
			$amount = $_POST['amount'] * 100; 
			$event_id = $_POST['event_id'];
			$client_id = $_POST['client_id'];
			$no_of_talents_requested = $_POST['no_of_talents_requested'];

			$payment_result = Stripe_Charge::create(array(
			"amount"   => $amount, // 
			"currency" => "usd",
			"customer" => $customerId)); // Previously stored, then retrieved
			
			$transaction_id = $payment_result['id'];
			
			
			$date = date('Y-m-d H:i:s');
			$update = mysql_query("update event_detail set is_advance_paid = 1  where event_id = ".$event_id."");
			$update = mysql_query("INSERT INTO client_payment_details ( client_id, event_id,no_of_talents_requested,transaction_id,amount,datetime,description ) VALUES 
			( '".$client_id."','".$event_id."','".$no_of_talents_requested."','".$transaction_id."','".$_POST['amount']."','".$date."','Deposit amount' )");
			
			echo $success = "1";
		
		}
	  catch (Exception $e) {
		$error = $e->getMessage();
		echo $success = '1';
	  }	
}
  
?>
