<?php
require_once('stripe/lib/Stripe.php');
  $stripe = array(
    'secret_key'      => 'sk_test_l8FVfiAVF7kbHq3oGOD2hCkL',
    'publishable_key' => 'pk_test_3lyToXEBjRLzSrzSGis7bNgj'
    );
  Stripe::setApiKey($stripe['secret_key']);
  
	  try{
		
		$customer = Stripe_Customer::create(array(
			'email'    => "karthik.c@smaatapps.com",
			'description' => "bank"
		 ));
		 
		 $customerId = $customer->id;
		 
		 $result = Stripe_Token::create(
			   array(
				"bank_account" => array(
				"currency"=> "usd",
				"country"=> "US",
				"account_holder_name"=> "Karthik Kumar", 
				"account_holder_type"=> "Individual",
				"routing_number"=> "111000025",
				"account_number"=> "000123456789",
				"bank_name" => "BANK OF AMERICA, N.A",
				  )                           
					)
			);
     
			
            $token = $result['id'];
	   
			$recipient = Stripe_Recipient::create(array(
				"name" => "karthik kumar",
				"type" => "individual",
				"bank_account" => $token,
				"email" => "karthik.c@smaatapps.com")
			  );
			 //echo "<pre>"; 
			 //print_r($recipient);
			 $rec_id=  $recipient->id;  
			 $active_account=   $recipient->active_account;
			 
			 $account_id=$active_account->id;
			  
				
				
			  echo $success =  "true,".$customerId.",".$rec_id.",".$account_id;
	  }
		catch (Exception $e) {
			$error = $e->getMessage();
	  }
  
  
  
 
 ?>