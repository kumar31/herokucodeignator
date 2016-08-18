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
			
			$servername = getenv( 'DB_HOST' );
			$username = getenv( 'DB_USER' );
			$password = getenv( 'DB_PASS' );
			$dbname = getenv( 'DB_NAME' );
			
			// Create connection
			$conn = mysql_connect($servername, $username, $password);
			// Check connection
			
			mysql_select_db($dbname);
			$date = date('Y-m-d H:i:s');
			
			
			$update = mysql_query("INSERT INTO client_payment_details ( client_id, event_id,no_of_talents_requested,transaction_id,amount,datetime,description ) VALUES 
			( '".$client_id."','".$event_id."','".$no_of_talents_requested."','".$transaction_id."','".$_POST['amount']."','".$date."','Remaining amount' )");
			
			echo $success = "1";
		
		}
	  catch (Exception $e) {
		$error = $e->getMessage();
		echo $success = '1';
	  }	
}
  
?>

