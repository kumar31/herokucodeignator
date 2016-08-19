<?php 
error_reporting(0);
include('admin_header.php'); ?>
<?php $adminid = $this->uri->segment(2);  ?>
<style>
	table th {
		text-align: center;
	}
</style>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
  <body style="padding-bottom: 0px; background: #FFFFFF;">
    
	<section>
		<div class="container">		
			<div class="row" id="">
			<h4>Talent List</h4><br>
				<?php					
					
					?>				
				<table id="example" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Events attended</th>							
							<th>Average rating</th>							
							<th>Talent type</th>							
							<th>Amount per hour</th>							
							<th>Options</th>            
						</tr>
					</thead>
					
					<tbody>
					<?php foreach($res as $val) {
						?>	
						<tr>
							<td><?php echo $val['talent_id']; ?></td>
							<td><?php echo $val['first_name'].' '.$val['last_name']; ?></td>
							<td><?php echo $val['email']; ?></td>
							<td><?php echo $val['rating']; ?></td>
							<td><?php echo $val['rating_avg']; ?></td>
							<td><?php if($val['reg_type'] == 1) { ?>
								Employee
								<?php 
							} ?>
							<?php if($val['reg_type'] == 2) { ?>
								Contractor
								<?php 
							} ?>
							<?php if($val['reg_type'] == 3) { ?>
								Both
								<?php 
							} ?></td>
							<td>$<?php echo $val['amount']; ?>/hour</td>							
							<td>
								<button class="btn btn-primary btn-sm" onclick="edit('<?php echo $val['talent_id']; ?>','<?php echo $val['amount']; ?>')">Edit
								</button>							
							</td>                
						</tr>
						
						<!-- Modal edit -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Talent Hourly Pay</h4>
							  </div>
							  <div class="modal-body">
							  <p id="alertmsg" class="text-danger"></p>
								<form class="form-inline" role="form">
								<div class="form-group">
									<label class="control-label col-sm-2" for="hpay">Hourly Pay Amount $</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="hpay" placeholder="Enter Hourly Pay Amount">
									  <br>
									</div>
								  </div>
								  
								  <input type="hidden" id="talentid">
								  <div class="form-group"> 
									<div class="col-sm-offset-2 col-sm-10">
									  <button id="editagent" type="button" class="btn btn-danger">Submit</button>
									</div>
								  </div>
								</form>
							  </div>
							  <div class="modal-footer">
								
							  </div>
							</div>

						  </div>
						</div>
						<script>
						function edit(id,amount) {
							$('#hpay').val(amount);					
							$('#talentid').val(id);
							$('#myModal').modal('show');
						}
						</script>
						<?php }
						?>
					</tbody>
				</table>	
				
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
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
		
		$( "#editagent" ).click(function() {
		  editag();
		});
		$( "#addagent" ).click(function() {
		  addagent();
		});
		$( ".inactive" ).click(function() {
		  inactive();
		});
	  function editag(){
			var amount = $("#hpay").val();
			var talent_id = $("#talentid").val();
			
			//alert(name);alert(email);alert(password);alert(percentage);alert(agentid);alert(adminid); die;
				var url = '<?php echo $webserviceurl; ?>index.php/contractor_pay_update';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'talent_id':talent_id,'amount':amount},
					//'dataType': 'json',
					success: function(data) {
						
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {													
							window.location.reload();												
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							var alertmessage = alertmessage.replace(/\"/g, "");
							$("#alertmsg").text(alertmessage);
						}
					}
				
				});

		}
		
		
	</script>
  </body>
</html>
