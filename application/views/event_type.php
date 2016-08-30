<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
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
			<h4>Event Types List<button id="" data-toggle="modal" data-target="#myModala" class="btn btn-submit btn-sm pull-right">Add Event Type</button></h4><br>
				<?php
					$this->db->select('*');			
					$this->db->from('event_type');
					$query = $this->db->get();
					$result = $query->result_array();
					
					?>				
				<table id="example" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>							
							<th>Percentage</th>
							<th>Options</th>            
						</tr>
					</thead>
					
					<tbody>
					<?php foreach($result as $val) {
						?>	
						<tr>
							<td><?php echo $val['event_type_id']; ?></td>
							<td><?php echo $val['name']; ?></td>							
							<td><?php echo $val['percentage']; ?></td>
							<td>
								<button class="btn btn-primary btn-sm" onclick="edit('<?php echo $val['event_type_id']; ?>','<?php echo $val['name']; ?>','<?php echo $val['percentage']; ?>')">Edit
								</button>
								&nbsp;&nbsp;&nbsp;
								<?php
									if($val['status'] == 1) { ?>
									<button id="inactive" onclick="inactive('<?php echo $val['event_type_id']; ?>')" class="btn btn-danger btn-sm">Click to make Inactive
									</button>
								<?php		
									}
								if($val['status'] == 2) {
								?>&nbsp;&nbsp;&nbsp;
									<button id="active" onclick="inactive('<?php echo $val['event_type_id']; ?>')" class="btn btn-success btn-sm">Click to make Active
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
								<h4 class="modal-title">Edit Event Type</h4>
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
									<label class="control-label col-sm-2" for="per">Percentage</label>
									<div class="col-sm-10"> 
									  <input type="text" class="form-control" id="per" placeholder="Enter percentage">
									  <br>
									</div>
								  </div>
								  <input type="hidden" id="eventtypeid">
								  <div class="form-group"> 
									<div class="col-sm-offset-2 col-sm-10">
									  <button id="editagent" type="button" class="btn btn-danger">Submit</button>
									</div>
								  </div>
								</form>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>

						  </div>
						</div>
						<script>
						function edit(id,name,percentage) {
							$('#name').val(name);
							$('#per').val(percentage);				
							$('#eventtypeid').val(id);
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
							<h4 class="modal-title">Add Event Type</h4>
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
								<label class="control-label col-sm-2" for="aper">Percentage</label>
								<div class="col-sm-10"> 
								  <input type="text" class="form-control" id="aper" placeholder="Enter percentage">
								  
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
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
			var percentage = $("#per").val();
			var eventtypeid = $("#eventtypeid").val();
			var adminid = "<?php echo $adminid; ?>";
			//alert(name);alert(percentage);alert(eventtypeid);alert(adminid); die;
				var url = '<?php echo $webserviceurl; ?>index.php/update_event_type';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'admin_id':adminid,'event_type_id':eventtypeid,'name':name,'percentage':percentage},
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
		
		function inactive(eventtypeid){
			
			var eventtypeid = eventtypeid;
			var adminid = "<?php echo $adminid; ?>";
			//alert(agentid);alert(adminid); die;
				var url = '<?php echo $webserviceurl; ?>index.php/eventtype_active_inactive';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'admin_id':adminid,'event_type_id':eventtypeid},
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
		
		function addagent(){
			var name = $("#aname").val();
			var percentage = $("#aper").val();
			
				var url = '<?php echo $webserviceurl; ?>index.php/create_event_type';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'name':name,'percentage':percentage},
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
