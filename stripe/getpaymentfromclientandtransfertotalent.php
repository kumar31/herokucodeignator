<?php
require 'lib/Stripe.php';
require 'config.php';
  try {
		
		$amount = $_POST['amount'] * 100; 
		$talent_amount = $_POST['talent_amount'] * 100; 
		$event_id = $_POST['event_id'];
		$client_id = $_POST['client_id'];
		$talent_id = $_POST['talent_id'];
		$agent_id = $_POST['agent_id'];
		$recipient = $_POST['recipient'];
		$destination = $_POST['destination'];
		
		//Client details
		$querys=mysql_query("select stripe_id from `client_details` WHERE `client_id`='$client_id'");
		$rows = mysql_fetch_array($querys);
		$client_stripe_id = $rows['stripe_id'];
		if($client_stripe_id == '')
		{
			//client stripe invalid account;
			echo '3'; die;
		}
		
		$payment_result = Stripe_Charge::create(array(
		"amount"   => $amount,
		"currency" => "usd",
		"customer" => $client_stripe_id));
		
		$transaction_id = $payment_result['id'];
		$amount = $_POST['amount'];
		
		
		
		$date = date('Y-m-d H:i:s');
		$update = mysql_query("INSERT INTO client_payment_details ( client_id,event_id,transaction_id,amount,datetime,description ) VALUES 
		( '".$client_id."','".$event_id."','".$transaction_id."','".$_POST['amount']."','".$date."','Amount Debited' )");
		
		
		
		$res = Stripe_Transfer::create(array(
		  "amount" => $talent_amount,
		  "currency" => "USD",
		  "recipient" => $recipient,
		  "bank_account" => $destination
		  )
		);
		$transaction_id=$res['id'];
		$talent_amount = $_POST['talent_amount']; 
		
		$update = mysql_query("INSERT INTO talent_payment_details 
		( talent_id, event_id, agent_id ,transaction_id ,description ,amount ,datetime) VALUES 
		( '".$talent_id."','".$event_id."','".$agent_id."','".$transaction_id."','Amount earned','".$talent_amount."','".$date."')");
		// success;
		echo '1';
			
	}
  catch (Exception $e) {
	$error = $e->getMessage();
	// internet error retry;
	echo '2';
  }	
?>
