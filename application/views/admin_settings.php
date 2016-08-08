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
			<div class="row col-md-4" id="">
			<h4>Settings<button class="btn btn-primary btn-sm pull-right" onclick="edit()">Edit
						</button></h4><br>
				<?php
					$this->db->select('*');			
					$this->db->from('talent_hourly_pay');
					$query = $this->db->get();
					$result = $query->result_array();
					
					?>	
					<table class="table table-bordered">
						
						<tbody>
						  <tr>
							<td>Cost to client (W9 Contractors)</td>
							<td>$<?php echo $result[0]['per_hour']; ?>/hr</td>
							
						  </tr>
						  <tr>
							<td>Outfit Fee</td>
							<td><?php echo $result[0]['outfit_fee']; ?>%</td>
							
						  </tr>
						  <tr>
							<td>Stripe Fee</td>
							<td><?php echo $result[0]['stripe_fee']; ?>%</td>
							
						  </tr>
						  <tr>
							<td>Cost to client (W2 Employees)</td>
							<td>$<?php echo $result[0]['agent_fee']; ?>/hr</td>
							
						  </tr>
						</tbody>
					  </table>					
						
						<!-- Modal edit -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Settings</h4>
							  </div>
							  <div class="modal-body">
							  <p id="alertmsg" class="text-danger"></p>
								<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="control-label col-sm-3" for="tpay">Cost to client (W9 Contractors)</label>
									<div class="col-sm-9">
									  <input type="text" class="form-control" id="tpay" placeholder="Enter talent hourly pay" value="<?php echo $result[0]['per_hour']; ?>">
									  <br>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="control-label col-sm-3" for="outper">Outfit Fee</label>
									<div class="col-sm-9"> 
									  <input type="text" class="form-control" id="outper" placeholder="Enter Outfit Fee" value="<?php echo $result[0]['outfit_fee']; ?>">
									  <br>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="control-label col-sm-3" for="strper">Stripe Fee</label>
									<div class="col-sm-9"> 
									  <input type="text" class="form-control" id="strper" placeholder="Enter Stripe Fee" value="<?php echo $result[0]['stripe_fee']; ?>">
									  <br>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="control-label col-sm-3" for="agentper">Cost to client (W2 Employees)</label>
									<div class="col-sm-9"> 
									  <input type="text" class="form-control" id="agentper" placeholder="Enter Agent  Fee" value="<?php echo $result[0]['agent_fee']; ?>">
									  <br>
									</div>
								  </div>
								  
								  <input type="hidden" id="eventtypeid">
								  <div class="form-group"> 
									<div class="col-sm-offset-3 col-sm-9">
									  <button id="editagent" type="button" class="btn btn-danger">Update</button>
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
						function edit() {							
							$('#myModal').modal('show');
						}
						</script>

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
		
	  function editag(){
			var pay_id = 1;
			var per_hour = $("#tpay").val();
			var outfit_fee = $("#outper").val();
			var stripe_fee = $("#strper").val();
			var agent_fee = $("#agentper").val();
			//alert(pay_id);alert(per_hour);alert(outfit_fee);alert(stripe_fee);alert(agent_fee); die;
				var url = '<?php echo $webserviceurl; ?>index.php/update_admin_settings';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'pay_id':pay_id,'per_hour':per_hour,'outfit_fee':outfit_fee,'stripe_fee':stripe_fee,'agent_fee':agent_fee},
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
