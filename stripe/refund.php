 <?php
require 'lib/Stripe.php';
require 'config.php';

if((isset($_POST['stripe_id']))){

		try {
		
			$transaction_id = $_POST['stripe_id']; 
			$amount = $_POST['amount'] * 100; 
			$event_id = $_POST['event_id'];
			$client_id = $_POST['client_id'];
			$no_of_talents_requested = $_POST['no_of_talents_requested'];

			$res= Stripe_Charge::refund(array(
		    "charge" => $transaction_id,
			"amount" => $amount
			));
			
			
			
			$servername = "localhost";
			$username = "smaatapp_dev";
			$password = "dev123%$";
			$dbname = "smaatapp_nector";
			
			// Create connection
			$conn = mysql_connect($servername, $username, $password);
			// Check connection
			
			mysql_select_db($dbname);
			$date = date('Y-m-d H:i:s');
			$update = mysql_query("update event_detail set refund_status = 1  where event_id = ".$event_id."");
			$update = mysql_query("INSERT INTO client_payment_details ( client_id, event_id,no_of_talents_requested,transaction_id,amount,datetime,description ) VALUES 
			( '".$client_id."','".$event_id."','".$no_of_talents_requested."','".$transaction_id."','".$_POST['amount']."','".$date."','Refund amount' )");
			
			echo $success = "1";
		
		}
	  catch (Exception $e) {
		$error = $e->getMessage();
		echo $success = '1';
	  }	
}


 
			
?>
