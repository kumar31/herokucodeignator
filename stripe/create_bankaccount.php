 <?php
require 'lib/Stripe.php';
require 'config.php';
   
	  try {
        $emailid = $_GET['emailid'];
          $dats = explode('_', $_GET['firstname']);
		 $name= $dats[0]." ".$dats[1];
		  $bank_name = str_replace('_', ' ', $_GET['bankname']);
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
		$cu = Stripe_Customer::retrieve($_GET['customer']); 
		$cu->sources->create(array("source" => $token));
		$customerId = $cu->id; 
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
			  $rec_id=  $recipient->id; 
			  $active_account=   $recipient->active_account;
			  $account_id=$active_account->id;
			  $customer = $_GET['customer'];
		
	     $success =  "true,".$customer.",".$rec_id.",".$account_id;
	 }
  catch (Exception $e) {
	$error = "false,".$e->getMessage();
  }
?>
<?= $success ?>
  <?= $error ?>	