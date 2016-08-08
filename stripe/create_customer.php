 <?php
require 'lib/Stripe.php';
require 'config.php';
   
	  try {
		  
		$result = Stripe_Token::create(
                array(
                           "card" => array(
                            "name" => $_GET['firstname'],
                            "number" => $_GET['cardnumber'],
							"exp_month" => $_GET['expmonth'],
							"exp_year" => $_GET['expyear'],
							"cvc" => $_GET['cvc']
                        )
                    )
                );
		$token = $result['id'];
		$customer = Stripe_Customer::create(array(
        'source'   => $token,
        'email'    => $_GET['emailid'],
        'description' => "Seller"
         ));
	  $customerId = $customer->id; 
	 
	  $success =  "true,".$customerId;//array('customerId'=> $customerId);
  }
  catch (Exception $e) {
	$error = "false,".$e->getMessage();
  }	
?>
<?= $success ?>
  <?= $error ?>
