 <?php

require 'lib/Stripe.php';
require 'config.php';
 try {
           
            $amount = 1 * 100;
			
			$res= Stripe_Charge::refund(array(
		    "charge" => "ch_18G4qHB1GSpeyclqkx8BJyk9",
			"amount" => $amount
			));
			$success = "true,".$res[0]['id'];	
           // $success ='Refund Sucessfully';
 }
  catch (Exception $e) {
	$error = "false,".$e->getMessage();
  }	
			
?>
