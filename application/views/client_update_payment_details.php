<?php 
error_reporting(0);
include('client_header.php');
$url = $this->uri->segment(2);


////////////////////////////////////////////////////////////////////////// paymentpart ///////////////////////////////////////////////////
require_once('Stripe/lib/Stripe.php');
  $stripe = array(
    'secret_key'      => 'sk_test_l8FVfiAVF7kbHq3oGOD2hCkL',
    'publishable_key' => 'pk_test_3lyToXEBjRLzSrzSGis7bNgj'
    );
  Stripe::setApiKey($stripe['secret_key']);

 ?>

<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
    <!-- jQuery is used only for this example; it isn't required to use Stripe -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript">
    // this identifies your website in the createToken call below
    Stripe.setPublishableKey("<?php echo $stripe['publishable_key']; ?>");

    function stripeResponseHandler(status, response) {
    	if (response.error) {
			var mes = response.error;
			
            // re-enable the submit button
            $('.submit-button').removeAttr("disabled");
            // show the errors on the form
            $(".payment-errors").html(response.error.message);
			
			 document.getElementById("buttonreplacement").style.display = "none"; // to displayhide
        } else {
			$(".payment-errors").html('');
            var form$ = $("#payment-form");
            // token contains id, last4, and card type
            var token = response['id'];
			//alert(token);
            // insert the token into the form so it gets submitted to the server
           // form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
            form$.get(0).submit();
        }
    }

    $(document).ready(function() {
        $("#payment-form").submit(function(event) {
            // disable the submit button to prevent repeated clicks
            $('.submit-button').attr("disabled", "disabled");
            // createToken returns immediately - the supplied callback submits the form if there are no errors
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
            return false; // submit from callback
        });
    });

    </script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>

<script>
  $(document).ready(function($){
    $(".valid").validate();
  });
  </script>
  
  
  <script>
function ButtonClicked()
{
   document.getElementById("formsubmitbutton").style.display = ""; // to undisplay
   document.getElementById("buttonreplacement").style.display = ""; // to display
   return true;
}
</script>

<?php

	
	$stripe_id = $client_profile[0]['stripe_id'];
	$client_id = $client_profile[0]['client_id'];
	if($stripe_id != ''){
		
			$result =Stripe_Customer::retrieve($stripe_id);
			
			$paymentdetails= $result->sources;

			
			$datas=$paymentdetails->data;



			$source1=$datas[0]->object;


			if($source1=="card")
			{
				$card=$datas[0]->brand . ",". $datas[0]->exp_month . ",". $datas[0]->exp_year . ",". $datas[0]->last4 . ",". $datas[0]->name;
				$name = $datas[0]->name;
				$exp_month = $datas[0]->exp_month;
				$exp_year = $datas[0]->exp_year;
				$last4 = '************'.$datas[0]->last4;
			}
			
			
	}
	else{
		$name = '';
		$exp_month = '';
		$exp_year = '';
		$last4 = '';
	}
	
	if((isset($_POST)) && (!empty($_POST))){
		
		try {
				if($stripe_id != ''){
					$result->delete();
				}
				
				$result = Stripe_Token::create(
						array(
								   "card" => array(
									"name" => $_POST['card-holder-name'],
									"number" => $_POST['card-number'],
									"exp_month" => $_POST['exp_month'],
									"exp_year" => $_POST['expyear'],
									"cvc" => $_POST['cvc']
								)
							)
						);
				$token = $result['id'];
				$customer = Stripe_Customer::create(array(
				'source'   => $token,
				'email'    => $client_profile[0]['email'],
				'description' => "Seller"
				 ));
			   $customerId = $customer->id; 
			 
			  $success =  "true,".$customerId;//array('customerId'=> $customerId);
				$data = array('stripe_id'=>$customerId);
				$this->db->where('client_id',$client_id);  
				$this->db->update('client_details',$data);
				if($url == 1){
					
						header('Location: '.base_url().'index.php/myevents_client');

					exit;
				}
		  }
		  catch (Exception $e) {
			$error = "false,".$e->getMessage();
			$data = array('stripe_id'=>"");
			$this->db->where('client_id',$client_id);  
			$this->db->update('client_details',$data);
		  }	
	}
   
	  
?>


<!-- Page Content -->
	
	<div class="">
		<div class="container">
			<div class="row">			
				<body>
				  <?php 
					error_reporting(0);
					include('settings_menu_xs.php'); ?>
				  <div class="container">
					<div class="row">
					  <?php 
						error_reporting(0);
						include('settings_menu.php'); ?>
					  <div class="col-sm-8 whiteBG invitebox topmargin30 profile">
					  <h1>Payment</h1>
												
						<div class="">
						  <form id="payment-form" action="" method="post" class="valid form-horizontal" role="form">
							<font color="red"><span class="payment-errors" id="error"></span></font>
							<font color="red"><span class="" id=""><?php echo $error; ?></span></font>
							<fieldset>
							  <legend></legend>
							  <div class="form-group">
								<label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Card Holder's Name" value="<?php echo $name; ?>">
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-3 control-label" for="card-number">Card Number</label>
								<div class="col-sm-6">
									<input type="text" value="<?php echo $last4; ?>" id="card-number" name="card-number"  placeholder="Debit/Credit Card Number" autocomplete="off" class="required number form-control card-number" minlength="16" maxlength="16">
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
								<div class="col-sm-9">
								  <div class="row">
									<div class="col-xs-3 expiration required">
									  <select id="card-month" class='required number form-control card-expiry-month col-sm-2' name='exp_month'>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
									  </select>
									</div>
									<div class="col-xs-3 expiration required">
									  <select id="card-year" class='form-control required number form-control card-expiry-year' name='expyear'>						
										<?php
											for($i=date("Y");$i<=date("Y")+50;$i++) {
											  if($exp_year != ''){
												  $sel = ($i == $exp_year) ? 'selected' : '';
											  }else{
												  $sel = ($i == date('Y')) ? 'selected' : '';
											  }
											   
												echo "<option value=".$i." ".$sel.">".date("Y", mktime(0,0,0,0,1,$i+1))."</option>";
											}
											?>
									  </select>
									</div>
								  </div>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-3 control-label" for="cvv">Card CVV</label>
								<div class="col-sm-2">
								  <input type="password" name="cvc" id="card-cvv" autocomplete="off" class="required number card-cvc form-control" minlength="3" maxlength="4" placeholder="CVV">
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-3 col-sm-9" id="formsubmitbutton">
								  <button type="submit" class="btn btn-submit btn-search largeHeight" onclick="ButtonClicked();">Update</button>     
								</div>
							  </div>
							</fieldset>
						  </form>
						</div> 
					  </div>
					</div>
				  </div>
				</div>
			</div>
		</div>

	  <?php 
		error_reporting(0);
		include('client_footer.php'); ?>
		
	</body>
	</html>
