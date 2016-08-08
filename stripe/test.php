 <?php
require 'lib/Stripe.php';
require 'config.php';


              $result = Stripe_Token::create(
                    array(
                           "card" => array(
                            "name" => 'KUMAR',
                            "number" => "4000 0000 0000 0077",
							"exp_month" => "3",
							"exp_year" => "2017",
							"cvc" => "314"
                        )
                    )
                );

			
              $token = $result['id'];

			  
			  
			  


		   
	  try {
		  
		  
				 
        $customer = Stripe_Customer::create(array(
        'source'   => $token,
        'email'    => "kumar@smaatapps.com",
        'description' => "Seller"
         ));
		 
		  
		  
	  $customerId = $customer->id; 
		  
	  
       if (!isset($customerId))
       throw new Exception("The Stripe Token was not generated correctly");
	$charge=	   Stripe_Charge::create(array(
		  "amount"   => 1100, // 
		  "currency" => "usd",
		  "customer" => $customerId // Previously stored, then retrieved
		  ));
         $success = 'Your payment was successful.';
	
	  $success = $charge; 
	
	 
  }
  catch (Exception $e) {
	$error = $e->getMessage();
  }	

  
		   
?>

<?= $success ?>
  <?= $error ?>


