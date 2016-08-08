<?php
require 'lib/Stripe.php';
require 'config.php';

error_reporting(0);			 
 

  
  
  try{
			if($_GET['customer']=="")
			{	
     			$customer = Stripe_Customer::create(array(
				'email'    => $_GET['emailid'],
				'description' => "debit"
				 ));
				
				
				$customerId = $customer->id; 
	        }
			else{
				
				$customerId=$_GET['customer'];
			}
	  
			$dats = explode('_', $_GET['firstname']);
			$name= $dats[0]." ".$dats[1];
	         $result = Stripe_Token::create(
                    array(
                           "card" => array(
								"name" => $name,
								"number" => $_GET['cardnumber'],
								"exp_month" => $_GET['expmonth'],
								"exp_year" => $_GET['expyear'],
								"cvc" => $_GET['cvc']
                        )
                    )
                );
			  

            $token = $result['id'];
	  
	  
	  $recipient = Stripe_Recipient::create(array(
		  "name" => $name ,
		  "type" => "individual",
		  "card" => $token,
		  "email" => $_GET['emailid'])
		);
	//echo "<pre>";	
	//print_r($recipient);	
	$rec_id	=$recipient->id;
  $active_account=   $recipient->default_card;
  //$account_id=  $active_account->id;
  
	   
	   
	 $success =  "true,".$customerId.",".$rec_id.",".$active_account;   
  }
  catch (Exception $e) {
	$error = "false,".$e->getMessage();
  }

 ?>
  <?= $success ?>
  <?= $error ?>