<?php
require(dirname(__FILE__) . '/lib/Stripe.php');
//require 'lib/Stripe.php';
Stripe::setApiKey("sk_test_l8FVfiAVF7kbHq3oGOD2hCkL");

error_reporting(0);			 
 
  try{
			 
     	echo "hi";
		$customer = Stripe_Customer::create(array(
			'email'    => $_REQUEST['email'],
			'description' => "bank"
		 ));
		
		
		$customerId = $customer->id; 
	       
			
		$_GET['firstname'] = 'Kumar Karthick';
		$dats = explode('_', $_GET['firstname']);
		$name= $_REQUEST['fname']." ".$_REQUEST['lname'];
		 $result = Stripe_Token::create(
			   array(
						"bank_account" => array(
						"currency"=> "usd",
						"country"=> "US",
						"account_holder_name"=> $name,
						"account_holder_type"=> "Individual",
						"routing_number"=> $_REQUEST['routing_number'],
						"account_number"=> $_REQUEST['account_number'],
					)						                     
				)
			);
		  

		$token = $result['id'];
	  
	  
	  $recipient = Stripe_Recipient::create(array(
		  "name" => $name,
		  "type" => "individual",
		  "bank_account" => $token,
		  "tax_id" => $_REQUEST['tax_id'],
		  "email" => $_REQUEST['email'])
		);
		//echo "<pre>";	
		//print_r($recipient);
		$rec_id=  $recipient->id; 	
		$active_account=   $recipient->active_account;

		$account_id=$active_account->id;
		
		$agent_id = $_REQUEST['agent_id'];
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		$routing_number = $_REQUEST['routing_number'];
		$account_number = $_REQUEST['account_number'];
		$tax_id = $_REQUEST['tax_id'];
		
		$servername = $_ENV['DB_HOST'];
		$username = $_ENV['DB_USER'];
		$password = $_ENV['DB_PASS'];
		$dbname = $_ENV['DB_NAME'];
		
		// Create connection
		$conn = mysql_connect($servername, $username, $password);
		// Check connection
		
		mysql_select_db($dbname);
		$update=mysql_query("UPDATE `agent_details` SET `stripe_id`='".$customerId."',`bank_id`='".$account_id."',`recp_id`='".$rec_id."',`card_fname`='".$fname."',`card_lname`='".$lname."',`routing_number`='".$routing_number."',`account_number`='".$account_number."',`tax_id`='".$tax_id."' WHERE `agent_id`='".$agent_id."'");
		
		echo '1';

		}
		catch (Exception $e) {
		$error = "false,".$e->getMessage();
		echo '0';
		}

 ?>
 