<?php 
error_reporting(0);
include('agent_header.php'); ?>
<?php $agentid = $this->uri->segment(2);  ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$stripeurl = $variableconfig->stripeurl(); 
 ?>
<style>
	table th {
		text-align: center;
	}
	.amt {		
		font-weight: 500;
	}
</style>

  <body style="padding-bottom: 0px; background: #FFFFFF;">
    
	<section>
		<div class="container">			
			<div class="row" id="">
			<div class="col-sm-8 invitebox profile">	
			<h4>Payment Info Update</h4><br>							 
					<div class="">
					  <form class="form-horizontal" role="form">
						<fieldset>
						  <legend></legend>
						  <h5 style="color: red;" id="alertmsg"></h5>
						  <h5 class="text-success" id="alertmsgs"></h5>
						  <div class="form-group"> 
							<label class="col-sm-3 control-label" for="card-first-name">First Name</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" name="card-first-name" id="card-first-name" placeholder="Account Holder's First Name" value="<?php echo $agent_details[0]['card_fname']; ?>">
							</div>
						  </div>
						  
						  <div class="form-group"> 
							<label class="col-sm-3 control-label" for="card-last-name">Last Name</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" name="card-last-name" id="card-last-name" placeholder="Account Holder's Last Name" value="<?php echo $agent_details[0]['card_lname']; ?>">
							</div>
						  </div>
						  
						  <div class="form-group">
							<label class="col-sm-3 control-label" for="account-number">Account Number</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" name="account-number" id="account-number" placeholder="Account Number" value="<?php echo $agent_details[0]['account_number']; ?>">
							</div>
						  </div>
						  
						   <div class="form-group">
							<label class="col-sm-3 control-label" for="routing-number">Routing Number</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" name="routing-number" id="routing-number" placeholder="Routing Number" value="<?php echo $agent_details[0]['routing_number']; ?>">
							</div>
						  </div>
						  
						  <div class="form-group">
							<label class="col-sm-3 control-label" for="tax-id">SSN / EIN</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" name="tax-id" id="tax-id" placeholder="SSN / EIN" value="<?php echo $agent_details[0]['tax_id']; ?>">
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
	</section>
	
    <!-- Footer Start
    <div class="container">
     
      <footer>
	   <hr>
        <p>&copy; Outfit 2016
        </p>
      </footer>
    </div> -->
    <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src="<?php echo base_url(); ?>js/vendor/jquery-1.11.2.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js">
    </script>
    <script src="<?php echo base_url(); ?>js/main.js">
    </script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
		
		function cardupdate(){
			
			var card_fname = $("#card-first-name").val();
			var card_lname = $("#card-last-name").val();
			var account_number = $("#account-number").val(); 
			var routing_number = $("#routing-number").val();	
			var tax_id = $("#tax-id").val();	
			var email = "<?php echo $agent_details[0]['email']; ?>";	//alert(email); die;
			
			var agent_id = <?php echo $agent_details[0]['agent_id']; ?>;
			
			var url = '<?php echo $stripeurl; ?>create_bank_recipient_agent.php';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'fname':card_fname,'lname':card_lname,'account_number':account_number,'routing_number':routing_number,'email':email,'agent_id':agent_id,'tax_id':tax_id},
					//'dataType': 'json',
					success: function(data) {
						
						if(data == 1) {			
							$("#alertmsgs").text("Successfully Updated");
							window.location.reload();									
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
