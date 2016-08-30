<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
include('talent_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$stripeurl = $variableconfig->stripeurl(); 
 ?>
<body>
  <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('talent_settings_menu_xs.php'); ?>
  <div class="container">
    <div class="row">
      <?php 
		error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
		include('talent_settings_menu.php'); ?>
      <div class="col-sm-8 whiteBG invitebox topmargin30 profile">
	  <h1>Payment</h1>
        <div class="">
		  <form class="form-horizontal" role="form">
			<fieldset>
			  <legend></legend>
			  <h5 style="color: red;" id="alertmsg"></h5>
			  <div class="form-group"> 
				<label class="col-sm-3 control-label" for="card-first-name">First Name</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="card-first-name" id="card-first-name" placeholder="Account Holder's First Name" value="<?php echo $talent_profile[0]['card_fname']; ?>">
				</div>
			  </div>
			  
			  <div class="form-group"> 
				<label class="col-sm-3 control-label" for="card-last-name">Last Name</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="card-last-name" id="card-last-name" placeholder="Account Holder's Last Name" value="<?php echo $talent_profile[0]['card_lname']; ?>">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3 control-label" for="account-number">Account Number</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="account-number" id="account-number" placeholder="Account Number" value="<?php echo $talent_profile[0]['account_number']; ?>">
				</div>
			  </div>
			  
			   <div class="form-group">
				<label class="col-sm-3 control-label" for="routing-number">Routing Number</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="routing-number" id="routing-number" placeholder="Routing Number" value="<?php echo $talent_profile[0]['routing_number']; ?>">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="col-sm-3 control-label" for="tax-id">SSN / EIN</label>
				<div class="col-sm-6">
				  <input type="text" class="form-control" name="tax-id" id="tax-id" placeholder="SSN / EIN" value="<?php echo $talent_profile[0]['tax_id']; ?>">
				</div>
			  </div>
			  
			  <div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
				  <button onclick="cardupdate();" id="submit" name="submit" type="button" class="btn btn-submit btn-search largeHeight">Update</button>     
				</div>
			  </div>
			  
			</fieldset>
		  </form>
		</div>
      </div>
    </div>
  </div>
  <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('client_footer.php'); ?>
	<script>
		
		function cardupdate(){
			
			var card_fname = $("#card-first-name").val();
			var card_lname = $("#card-last-name").val();
			var account_number = $("#account-number").val(); 
			var routing_number = $("#routing-number").val();	
			var tax_id = $("#tax-id").val();	
			var email = "<?php echo $talent_email ?>";	//alert(email); die;
			
			var talent_id = <?php echo $talent_profile[0]['talent_id']; ?>;
			
				var url = '<?php echo $stripeurl; ?>create_bank_recipient.php';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'fname':card_fname,'lname':card_lname,'account_number':account_number,'routing_number':routing_number,'email':email,'talent_id':talent_id,'tax_id':tax_id},
					//'dataType': 'json',
					success: function(data) {
						
						if(data == 1) {								
							//window.location.reload();
							window.location.assign("<?php echo base_url();?>index.php/closed_events_talent" );
						}
						
						if(data == 0) {								
							$("#alertmsg").text("Enter valid details");
						}
						
					}
				
				});
	
		}

	</script>
</body>
</html>
