
  <?php
require 'lib/Stripe.php';

require 'config.php';




	
	  try {
		  
		
		    $amount='100';
			$destination="ba_17qJljB1GSpeyclqzu2XLtXK";
		
		
    	 
		$transfer = Stripe_Transfer::create(array(
		  "amount" => 100, // amount in cents
		  "currency" => "USD",
		  "recipient" => "rp_17qJlkB1GSpeyclquj0NWvTs",
		  "bank_account" => $destination,
		  "statement_descriptor" => "test")
		);
		
	
         $success = 'Your payment transfer successfully.';
	
	
	   
	
	 // print_r($re);
  }
  catch (Exception $e) {
	$error = $e->getMessage();
  }	
   
  
		   
?>

<?= $success ?>
  <?= $error ?>


