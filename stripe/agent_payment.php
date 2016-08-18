<?php
require 'lib/Stripe.php';
require 'config.php';
if((isset($_POST['client_id'])) && (isset($_POST['event_id']))){

		try {
		
			//$amount = $_POST['amount'] * 100; 
			$event_id = $_POST['event_id'];
			$client_id = $_POST['client_id'];
			
			//Client details
			$querys=mysql_query("select stripe_id from `client_details` WHERE `client_id`='$client_id'");
			$rows = mysql_fetch_array($querys);
			$client_stripe_id = $rows['stripe_id'];
			if($client_stripe_id == '')
			{
				//client stripe invalid account;
				echo '3'; die;
			}
			//client_payment_details
			$querys=mysql_query("select sum(amount) as amount from `client_payment_details` WHERE `event_id`='$event_id' and `client_id`='$client_id' and `transaction_id`='' and `description`='' ");
			
			$rows = mysql_fetch_array($querys);
			$amount = round($rows['amount'] * 100);
			
			$payment_result = Stripe_Charge::create(array(
			"amount"   => $amount,
			"currency" => "usd",
			"customer" => $client_stripe_id
			)); 
			
			$transaction_id = $payment_result['id'];
			
			//client_payment_details
			$date = date('Y-m-d H:i:s');
			$update = mysql_query("update client_payment_details set transaction_id = '".$transaction_id."',description = 'Amount Debited',datetime = '".$date."' where `event_id`='$event_id' and `client_id`='$client_id' ");
			
			
			
			
			//talent_payment_details
			$querys=mysql_query("select * from `talent_payment_details` WHERE `event_id`='$event_id' and `transaction_id`='' and `description`='' ");
			while ($rows = mysql_fetch_assoc($querys)) {
				
				$talent_amount = round($rows['amount'] * 100);
				$talent_id = $rows['talent_id'];
				$talent_payment_details_id = $rows['talent_payment_details_id'];
				
				//talent_details
				$querys_talent_details=mysql_query("select bank_id,recp_id from `talent_details` WHERE `talent_id`='$talent_id'");
				$rows_talent_details = mysql_fetch_array($querys_talent_details);
				$destination = $rows_talent_details['bank_id'];
				$recipient = $rows_talent_details['recp_id'];
				
				$res = Stripe_Transfer::create(array(
				  "amount" => $talent_amount,
				  "currency" => "USD",
				  "recipient" => $recipient,
				  "bank_account" => $destination
				  )
				);
				
				$transaction_id = $res['id'];
				$update = mysql_query("update talent_payment_details set transaction_id = '".$transaction_id."',description = 'Amount earned',datetime = '".$date."' where talent_payment_details_id = ".$talent_payment_details_id."");
				$update = mysql_query("update checkin set payment_status = '1' where talent_id = ".$talent_id." AND event_id = ".$event_id."");
			}
			
			//agent_payment_details
			$querys=mysql_query("select sum(amount) as amount,agent_id from `agent_payment_details` WHERE `event_id`='$event_id' and `transaction_id`='' and `description`='' group by `agent_id` ");
			
			while ($rows = mysql_fetch_assoc($querys)) {
			
			$agent_amount = round($rows['amount'] * 100);
			$agent_id = $rows['agent_id'];
			$querys_agent_details=mysql_query("select bank_id,recp_id from `agent_details` WHERE `agent_id`='$agent_id'");
			$rows_agent_details = mysql_fetch_array($querys_agent_details);
			$destination = $rows_agent_details['bank_id'];
			$recipient = $rows_agent_details['recp_id'];
			
			$res = Stripe_Transfer::create(array(
			  "amount" => $agent_amount,
			  "currency" => "USD",
			  "recipient" => $recipient,
			  "bank_account" => $destination
			  )
			);
			$transaction_id = $res['id'];
			$update = mysql_query("update agent_payment_details set transaction_id = '".$transaction_id."',description = 'Amount earned',datetime = '".$date."' where `agent_id`='$agent_id' and `event_id`='$event_id'");
			}
			echo "1";
		
		}
	  catch (Exception $e) {
		$error = $e->getMessage();
		echo $error;
	  }	
}
  
?>
