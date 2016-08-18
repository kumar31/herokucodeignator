<?php
require 'lib/Stripe.php';
require 'config.php';
  try {
	  
		$amount = $_POST['amount'] * 100; 
		$event_id = $_POST['event_id'];
		$talent_id = $_POST['talent_id'];
		$agent_id = $_POST['agent_id'];
		$recipient = $_POST['recipient'];
		$destination = $_POST['destination'];
		
		
		$res = Stripe_Transfer::create(array(
		  "amount" => $amount, // amount in cents
		  "currency" => "USD",
		  "recipient" => $recipient,
		  "bank_account" => $destination
		  )
		);
		$transaction_id=$res['id'];
		$amount = $_POST['amount'];
		$date = date('Y-m-d H:i:s');
		
		
		
		$servername = getenv( 'DB_HOST' );
		$username = getenv( 'DB_USER' );
		$password = getenv( 'DB_PASS' );
		$dbname = getenv( 'DB_NAME' );
		
		// Create connection
		$conn = mysql_connect($servername, $username, $password);
		// Check connection
		
		mysql_select_db($dbname);
		$update = mysql_query("INSERT INTO talent_payment_details ( talent_id, event_id, agent_id ,transaction_id ,description ,amount ,datetime) VALUES 
		( '".$talent_id."','".$event_id."','".$agent_id."','".$transaction_id."','Amount earned','".$amount."','".$date."')");
		echo '1';
			
	}
  catch (Exception $e) {
	$error = $e->getMessage();
	echo '1';
  }	
?>
