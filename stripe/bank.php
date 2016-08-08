<?php
require 'lib/Stripe.php';
require 'config.php';

error_reporting(0);			 
 

  
  
  try{
			 $emailid = $_GET['emailid'];
			  $dats = explode('_', $_GET['firstname']);
			  $name= $dats[0]." ".$dats[1];
			  $bank_name = str_replace('_', ' ', $_GET['bankname']);


     		if($_GET['customer']=="")
			{	
     			$customer = Stripe_Customer::create(array(
				'email'    => $emailid,
				'description' => "bank"
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
                            "bank_account" => array(
                            "currency"=> "usd",
							"country"=> "US",
							"account_holder_name"=> $name,
							"account_holder_type"=> "Individual",
							"routing_number"=> $_GET['routingnumber'],
							"account_number"=> $_GET['accountnumber'],
							"bank_name" => $bank_name,
						)						                     
                    )
                );
			  

            $token = $result['id'];
	  
	  
	  $recipient = Stripe_Recipient::create(array(
		  "name" => $name ,
		  "type" => "individual",
		  "bank_account" => $token,
		  "email" => $emailid)
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