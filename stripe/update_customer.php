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
		$cu = Stripe_Customer::retrieve($_GET['customer']); //
		
		$paymentdetails= $cu->sources;
		
		$datas=$paymentdetails->data;

		$source1=$datas[0]->object;
		if($source1=="card")
		{
			$card= $datas[0]->id; 
			$cu->sources->retrieve($card)->delete();
		}
		else{
			
			
		}
		
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
