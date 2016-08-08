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

echo "<pre>";
print_r($paymentdetails);

$datas=$paymentdetails->data;



$source1=$datas[0]->object;


if($source1=="card")
{
	$card=$datas[0]->brand . ",". $datas[0]->exp_month . ",". $datas[0]->exp_year . ",". $datas[0]->last4 . ",". $datas[0]->name;
}
else{
	
	
	
	$card="";
	$source=$datas[0]->object;
}

if($source=="bank_account")
{
	
	$source2=$source=$datas[0]->object;
	if($source2=="bank_account")
	{
		$bank= $datas[0]->routing_number . ",". $datas[0]->last4. ",". $datas[0]->name . ",".$datas[0]->bank_name ;
	}
	else{
		$bank="";
	}
}
else{
	$source2=$datas[1]->object;
	
	if($source2=="bank_account")
	{
		$bank= $datas[1]->routing_number . ",". $datas[1]->last4. ",". $datas[1]->name . ",".$datas[1]->bank_name ;
	}
	else{
		$bank="";
	}
	
}



$success =   $card."_".$bank;

   }
  catch (Exception $e) {
	$error = $e->getMessage();
  }	
?>

<?= $success ?>
  <?= $error ?>
