 <?php
require 'lib/Stripe.php';
require 'config.php';
   
	  try {
		  
		  
		 
		 $customer = Stripe_Customer::create(array(
        'email'    => $_GET['emailid'],
        'description' => "Seller"
         ));
	    $customerId = $customer->id; 
		  

         $dats = explode('_', $_GET['firstname']);
		 $name= $dats[0]." ".$dats[1];
		 
		// $bank_name = str_replace('_', ' ', $_GET['bankname']);
		  
		 
		$result = Stripe_Token::create(
                   array(
                           "card" => array(
								"name" => $dats,
								"number" => $_GET['cardnumber'],
								"exp_month" => $_GET['expmonth'],
								"exp_year" => $_GET['expyear'],
								"cvc" => $_GET['cvc']
                        )
                    )
         );		
				
				
		$token = $result['id'];
		$cu = Stripe_Customer::retrieve($customerId); 
		$cu->sources->create(array("source" => $token));
		$customerId = $cu->id; 
				$result = Stripe_Token::create(
							 array(
								"card" => array(
								"name" => $dats,
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
			  $rec_id=  $recipient->id; 
			 $account_id=  $active_account=   $recipient->default_card;
			//echo "<pre>";
			//print_r($recipient);

			// $account_id=$active_account->id;
			  $customer = $customerId;
		
	     $success =  "true,".$customer.",".$rec_id.",".$account_id;
	 }
  catch (Exception $e) {
	$error = "false,".$e->getMessage();
  }
?>
<?= $success ?>
  <?= $error ?>	