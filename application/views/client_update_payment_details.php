<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
include('client_header.php');
$url = $this->uri->segment(2);
require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$stripeurl = $variableconfig->stripeurl();
 ?>
 <?php 
		$this->load->helper('cookie');
		$client_id = $this->session->userdata('client_id');
		if($client_id == ''){
			$client_id = $this->input->cookie('client',true); 
		}
		$this->db->select('stripe_id');
		$this->db->where('client_id',$client_id);
		$this->db->from('client_details');
		$query = $this->db->get();
		$result = $query->result_array();
		$stripe_id = $result[0]['stripe_id'];
 ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>

	 
	   
	   var url = '<?php echo $stripeurl.'get_customer_details.php'; ?>';
	   var stripe_id = '<?php echo $stripe_id; ?>';
	  
	   $.ajax({
		'type' : 'POST',
		'url': url,
		'data': {'customer':stripe_id},
		//'dataType': 'json',
		success: function(data) {
		 var getdata = data.split(',');
			$("#card_holder_name").val(getdata[4]);
			var number = getdata[3]+'************';
			$("#card_number").val(number);
		}
	   
	   });

</script>
<!-- Page Content -->
	
	<div class="">
		<div class="container">
			<div class="row">			
				<body>
				  <?php 
					error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
					include('settings_menu_xs.php'); ?>
				  <div class="container">
					<div class="row">
					  <?php 
						error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
						include('settings_menu.php'); ?>
					  <div class="col-sm-8 whiteBG invitebox topmargin30 profile">
					  <h1>Payment</h1>
						<h5 id="alertmsg" class="text-danger"></h5>
						<h5 id="alertmsgs" class="text-success"></h5>
						<div class="">
						  <form id="payment-form" action="" method="post" class="valid form-horizontal" role="form">
							<font color="red"><span class="payment-errors" id="error"></span></font>
							<font color="red"><span class="" id=""><?php echo $error; ?></span></font>
							<fieldset>
							  <legend></legend>
							  <div class="form-group">
								<label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="card-holder-name" id="card_holder_name" placeholder="Card Holder's Name" value="<?php echo $name; ?>">
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-3 control-label" for="card-number">Card Number</label>
								<div class="col-sm-6">
									<input type="text" value="<?php echo $last4; ?>" id="card_number" name="card-number"  placeholder="Debit/Credit Card Number" autocomplete="off" class="required number form-control card-number" minlength="16" maxlength="16">
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
								<div class="col-sm-9">
								  <div class="row">
									<div class="col-xs-3 expiration required">
									  <select id="card_month" class='required number form-control card-expiry-month col-sm-2' name='exp_month'>
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
									  <select id="card_year" class='form-control required number form-control card-expiry-year' name='expyear'>						
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
								  <input type="password" name="cvc" id="card_cvv" autocomplete="off" class="required number card-cvc form-control" minlength="3" maxlength="4" placeholder="CVV">
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-sm-offset-3 col-sm-9" id="formsubmitbutton">
								  <button type="button" id="submit" class="btn btn-submit btn-search largeHeight" >Update</button>     
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
		
		include('client_footer.php'); ?>
	</body>
	<script>
	
	 
	
	
	$( "#submit" ).click(function() {
	  card();
	});
	function card(){
		
		
		var client_id = "<?php echo $client_id;  ?>";
		
		var firstname = $("#card_holder_name").val();
		var cardnumber = $("#card_number").val();
		var cvc = $("#card_cvv").val();
		var card_month = $( "#card_month option:selected" ).text();	
		var card_year = $( "#card_year option:selected" ).text();	
		var url = '<?php echo $stripeurl.'create_customer.php'; ?>';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'firstname':firstname,'cardnumber':cardnumber,'client_id':client_id,'expyear':card_year,'expmonth':card_month,'cvc':cvc},
				//'dataType': 'json',
				success: function(data) {
					//alert(data);
					if(data == 1) {
						$("#alertmsgs").text('Success card updated');
						window.location.reload();
					}
					else {
						var alertmessage = data;
						$("#alertmsg").text(alertmessage);
					} 
					
				}
			
			});

	}
  </script>
	</html>
	