 <?php
require 'lib/Stripe.php';
require 'config.php';
   
	  try {
		  
		$result = Stripe_Token::create(
		array(
				   "card" => array(
					"name" => $_POST['firstname'],
					"number" => $_POST['cardnumber'],
					"exp_month" => $_POST['expmonth'],
					"exp_year" => $_POST['expyear'],
					"cvc" => $_POST['cvc']
				)
			)
		);
		$token = $result['id'];
		$customer = Stripe_Customer::create(array(
        'source'   => $token,
        'email'    => $_POST['emailid'],
        'description' => "Seller"
         ));
	  $customerId = $customer->id; 
		
		$client_id = $_POST['client_id'];
		
		$update=mysql_query("UPDATE `client_details` SET `stripe_id`='".$customerId."' WHERE `client_id`='".$client_id."'");

	  echo $success =  "1";
  }
  catch (Exception $e) {
	echo $error = $e->getMessage();
  }	
?>

