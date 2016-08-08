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


if($source1=="bank_account")
{
		$bank= $datas[0]->routing_number . ",". $datas[0]->last4. ",". $datas[0]->name . ",".$datas[0]->bank_name ;
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

 

$success =   $bank; 

   }
  catch (Exception $e) {
	$error = $e->getMessage();
  }	
?>

<?= $success ?>
  <?= $error ?>
