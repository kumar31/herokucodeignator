<?php
require 'lib/Stripe.php';
require 'config.php';

error_reporting(0);			 
 

  
  
  try{
			
	         $result = Stripe_Token::create(
                   array(
                            "bank_account" => array(
                            "currency"=> "usd",
							"country"=> "US",
							"account_holder_name"=> "Kar Kumar",
							"account_holder_type"=> "Individual",
							"routing_number"=> "111000025",
							"account_number"=> "000123456789",
							"bank_name" => "IOB",
						)						                     
                    )
                );
			  

            $token = $result['id'];
	  
	  
	  $recipient = Stripe_Recipient::create(array(
		  "name" => "Kar Kumar",
		  "type" => "individual",
		  "bank_account" => $token,
		  "email" => "K@gmail.com")
		);
	//echo "<pre>";	
	//print_r($recipient);
	$rec_id=  $recipient->id; 	
	$active_account=   $recipient->active_account;
	
	$account_id=$active_account->id;
  
	   
	   
	 $success =  "true,".$customerId.",".$rec_id.",".$account_id;   
  }
  catch (Exception $e) {
	$error = "false,".$e->getMessage();
  }

 ?>
  <?= $success ?>
  <?= $error ?>