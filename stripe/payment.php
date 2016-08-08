 <?php
require 'lib/Stripe.php';
require 'config.php';
try {
	  $customerId = $_GET['customerId']; 
	  $amount= $_GET['amount'] *100;
	  if (!isset($customerId))
        throw new Exception("The Stripe Token was not generated correctly");
		 $res=  Stripe_Charge::create(array(
		  "amount"   => $amount, // 
		  "currency" => "usd",
		 // "application_fee" => false,
		  "customer" => $customerId // Previously stored, then retrieved
		  ));
		 $payid=$res['id'];
		 $trans_id=$res['balance_transaction'];
		 $card=$res['card'];
		 $card_id= $card['id'];
		 $status= $res['status'];
         $success = $status.",".$payid.",".$trans_id.",".$card_id;
	}
catch (Exception $e) {
	$error = $e->getMessage();
	}	
  ?>
 
<?= $success ?>
<?= $error ?>


