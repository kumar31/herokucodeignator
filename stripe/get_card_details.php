 <?php
require 'lib/Stripe.php';
require 'config.php';

   try{

/*
$result =Stripe_Customer::retrieve($_GET['customer'])->sources->all(array(
  "object" => "card"
));
*/
$result =Stripe_Customer::retrieve($_GET['customer']);
$paymentdetails= $result->sources;



$datas=$paymentdetails->data;



$source1=$datas[0]->object;


if($source1=="card")
{
	$card=$datas[0]->brand . ",". $datas[0]->exp_month . ",". $datas[0]->exp_year . ",". $datas[0]->last4 . ",". $datas[0]->name;
}
else{
	
	
	
	$card="";
	
}



$success =   $card;

   }
  catch (Exception $e) {
	$error = $e->getMessage();
  }	
?>

<?= $success ?>
  <?= $error ?>
