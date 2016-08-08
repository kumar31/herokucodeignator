 <?php
require 'lib/Stripe.php';
require 'config.php';
   
	  try {
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
						)						                     
                    )
                );		
				
				
		$token = $result['id'];
		$cu = Stripe_Customer::retrieve($_GET['customer']); //
		$cu->email = $_GET['emailid'];
		$cu->description = "Test";
		$cu->source = $token; // obtained with Stripe.js
		$cu->save();
		$customerId = $cu->id; 
	    //$success =$cu;
	    $success =  "true,".$customerId;//array('customerId'=> $customerId);
	 }
  catch (Exception $e) {
	$error = "false,".$e->getMessage();
  }	
  
?>
<?= $success ?>
  <?= $error ?>	