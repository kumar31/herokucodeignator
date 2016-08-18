<?php 
error_reporting(0);
include('admin_header.php'); ?>
<?php $adminid = $myuser_id;  ?>
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
			<h4>Agents List<button id="" data-toggle="modal" data-target="#myModala" class="btn btn-submit btn-sm pull-right">Add Agent</button></h4><br>
				<?php
					$this->db->select('*');		
					$this->db->where('status',1);
					$this->db->from('agent_details');
					$query = $this->db->get();
					$result = $query->result_array();
					
					?>				
				<table id="example" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Email</th>
							<th>Agent Percentage</th>
							<th>Outfit Percentage</th>
							<th>Address</th>
							<th>Options</th>            
						</tr>
					</thead>
					
					<tbody>
					<?php foreach($result as $val) {
						?>	
						<tr>
							<td><?php echo $val['agent_id']; ?></td>
							<td><?php echo $val['name']; ?></td>
							<td><?php echo $val['email']; ?></td>
							<td><?php echo $val['percentage']; ?>%</td>
							<td><?php echo $val['outfit_fee']; ?>%</td>
							<td><?php echo $val['address']; ?></td>
							<td>
								<button class="btn btn-primary btn-sm" onclick="edit('<?php echo $val['agent_id']; ?>','<?php echo $val['name']; ?>','<?php echo $val['email']; ?>','<?php echo $val['percentage']; ?>','<?php echo $val['password']; ?>','<?php echo $val['agent_id']; ?>','<?php echo $val['address']; ?>','<?php echo $val['outfit_fee']; ?>')">Edit
								</button>
								&nbsp;&nbsp;&nbsp;
								<?php
									if($val['status'] == 1) { ?>
									<button id="inactive" data-toggle="modal" data-target="#myModaldel" class="btn btn-danger btn-sm">Delete
									</button>
								<?php		
									}
								if($val['status'] == 2) {
								?>&nbsp;&nbsp;&nbsp;
									<button id="active" onclick="inactive('<?php echo $val['agent_id']; ?>')" class="btn btn-success btn-sm">Click to make Active
									</button>
								<?php		
									}
								?>
							</td>                
						</tr>
						
						<!-- Modal edit -->
						<div id="myModal" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Agent</h4>
							  </div>
							  <div class="modal-body">
							  <p id="alertmsg" class="text-danger"></p>
								<form class="form-inline" role="form">
								<div class="form-group">
									<label class="control-label col-sm-2" for="name">Name</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="name" placeholder="Enter text">
									  <br>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="control-label col-sm-2" for="email">Email</label>
									<div class="col-sm-10">
									  <input type="email" class="form-control" id="email" placeholder="Enter email">
									  <br>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="control-label col-sm-2" for="address">Address</label>
									<div class="col-sm-10">
									  <textarea type="text" class="form-control" id="address" placeholder="Enter address"></textarea>
									  <br>
									</div>
								  </div>
							  
								  <div class="form-group">
									<label class="control-label col-sm-2" for="password">Password</label>
									<div class="col-sm-10"> 
									  <input type="password" class="form-control" id="password" placeholder="Enter password">
									  <br>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="control-label col-sm-2" for="per">Percentage</label>
									<div class="col-sm-10"> 
									  <input type="text" class="form-control" id="per" placeholder="Enter percentage">
									  <br>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="control-label col-sm-2" for="outfitper">Outfit Percentage</label>
									<div class="col-sm-10"> 
									  <input type="text" class="form-control" id="outfitper" placeholder="Enter Outfit percentage">
									  
									</div>
								  </div>
							  
								  <input type="hidden" id="agentid">
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
						function edit(id,name,email,percentage,password,agentid,address,outfitfee) {
							$('#name').val(name);
							$('#email').val(email);
							$('#per').val(percentage);
							$('#address').val(address);
							$('#outfitper').val(outfitfee);
							$('#password').val(password);
							$('#agentid').val(agentid);
							$('#myModal').modal('show');
						}
						</script>
						<?php }
						?>
					</tbody>
				</table>	
				<!-- Modal add -->
					<div id="myModala" class="modal fade" role="dialog">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add Agent</h4>
						  </div>
						  <div class="modal-body">
						  <p id="alertmsgs" class="text-danger"></p>
							<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="control-label col-sm-2" for="aname">Name</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="aname" placeholder="Enter text">
								  
								</div>
							  </div>
							  
							  <div class="form-group">
								<label class="control-label col-sm-2" for="aemail">Email</label>
								<div class="col-sm-10">
								  <input type="email" class="form-control" id="aemail" placeholder="Enter email">
								  
								</div>
							  </div>
							  
							  <div class="form-group">
								<label class="control-label col-sm-2" for="aaddress">Address</label>
								<div class="col-sm-10">
								  <textarea type="text" class="form-control" id="aaddress" placeholder="Enter address"></textarea>
								  
								</div>
							  </div>
							  
							  <div class="form-group">
								<label class="control-label col-sm-2" for="apassword">Password</label>
								<div class="col-sm-10"> 
								  <input type="password" class="form-control" id="apassword" placeholder="Enter password">
								  
								</div>
							  </div>
							  
							  <div class="form-group">
								<label class="control-label col-sm-2" for="aper">Percentage</label>
								<div class="col-sm-10"> 
								  <input type="text" class="form-control" id="aper" placeholder="Enter percentage">
								  
								</div>
							  </div>
							  
							  <div class="form-group">
								<label class="control-label col-sm-2" for="aoutfitper">Outfit Percentage</label>
								<div class="col-sm-10"> 
								  <input type="text" class="form-control" id="aoutfitper" placeholder="Enter Outfit percentage">
								  
								</div>
							  </div>
							  
							  <div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10">
								  <button onclick="addagent();" id="addagent" type="button" class="btn btn-danger">Submit</button>
								</div>
							  </div>
							</form>
						  </div>
						  <div class="modal-footer">
							
						  </div>
						</div>

					  </div>
					</div>
					
					<!-- Modal Add card details -->
						<div id="myModaldel" class="modal fade" role="dialog">
						  <div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Delete Agent</h4>
							  </div>
							  <div class="modal-body">
								<p>Are you sure you want to delete this agency?</p>
								<button onclick="inactive('<?php echo $val['agent_id']; ?>')" type="button" class="btn btn-success">Delete</button>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							  </div>
							</div>

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
			var name = $("#name").val();
			var email = $("#email").val();
			var password = $("#password").val();
			var percentage = $("#per").val();
			var address = $("#address").val();
			var outfit_fee = $("#outfitper").val();
			var agentid = $("#agentid").val();
			var adminid = "<?php echo $adminid; ?>";
			//alert(name);alert(email);alert(password);alert(percentage);alert(agentid);alert(adminid); die;
				var url = '<?php echo $webserviceurl; ?>index.php/agent_update';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'admin_id':adminid,'agent_id':agentid,'name':name,'email':email,'password':password,'percentage':percentage,'address':address,'outfit_fee':outfit_fee},
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
		
		function inactive(agentid){
			
			var agentid = agentid;
			var adminid = "<?php echo $adminid; ?>";
			//alert(agentid);alert(adminid); die;
				var url = '<?php echo $webserviceurl; ?>index.php/agent_active_inactive';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'admin_id':adminid,'agent_id':agentid},
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
							//$("#alertmsg").text(alertmessage);
						}
					}
				
				});

		}
		
		function addagent(){
			var name = $("#aname").val();
			var email = $("#aemail").val();
			var password = $("#apassword").val();
			var percentage = $("#aper").val();
			var address = $("#aaddress").val();
			var outfit_fee = $("#aoutfitper").val();
			
				var url = '<?php echo $webserviceurl; ?>index.php/create_agent';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'name':name,'email':email,'password':password,'percentage':percentage,'address':address,'outfit_fee':outfit_fee},
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
							$("#alertmsgs").text(alertmessage);
						}
					}
				
				});

		}
		
	</script>
  </body>
</html>
