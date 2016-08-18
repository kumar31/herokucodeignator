 <?php
require 'lib/Stripe.php';
require 'config.php';

   try{


		$result =Stripe_Customer::retrieve($_POST['customer']);
		$paymentdetails= $result->sources;

		$datas=$paymentdetails->data;



		$source=$datas[0]->object;


		if($source=="card")
		{
			echo $card=$datas[0]->brand . ",". $datas[0]->exp_month . ",". $datas[0]->exp_year . ",". $datas[0]->last4 . ",". $datas[0]->name;
		}


   }
  catch (Exception $e) {
	$error = $e->getMessage();
  }	
?>


