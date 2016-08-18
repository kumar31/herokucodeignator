<?php 
error_reporting(0);
include('agent_header.php'); ?>
<?php $agentid = $myuser_id;  ?>
<style>
	table th {
		text-align: center;
	}
	.amt {		
		font-weight: 500;
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
			<h4>Events List<span class="pull-right"><span class="amt">Revenue</span>&nbsp;&nbsp;:&nbsp;&nbsp;$<?php echo round($revenue[0]['total_amount'],2); ?>&nbsp;&nbsp;&nbsp; <span class="amt">Profit</span>&nbsp;&nbsp;:&nbsp;&nbsp;$<?php echo round($profit[0]['total_amount'],2); ?><hr></span></h4><br>
			
				<?php
					
					//print"<pre>";
					//print_r($event_details);
										
					?>				
				<table id="example" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Event Name</th>
							<th>Email</th>
							<th>Options</th>            
						</tr>
					</thead>
					
					<tbody>
					<?php foreach($event_details as $val) {
						
						?>	
						<tr>
							<td><?php echo $val['event_id']; ?></td>
							<td><?php echo $val['event_name']; ?></td>
							<td><?php echo $val['email']; ?></td>
							<td>
								<a href="<?php echo base_url(); ?>index.php/agent_talents/<?php echo $val['event_id']; ?>"><button class="btn btn-primary btn-sm">View details
								</button></a>								
							</td>                
						</tr>
						
						<?php }
						?>
					</tbody>
				</table>	
				
			</div>	
		</div>
		<!-- Modal Add card details -->
			<div id="myModaladdcard" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add account details</h4>
				  </div>
				  <div class="modal-body">
					<p>Add account details to get listed in talents signup</p>
					<a href="<?php echo base_url(); ?>index.php/agent_profile" type="button" class="btn btn-success">Add now</a>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Ignore if added already</button>
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
			setTimeout(function(){ $('#myModaladdcard').modal('show'); }, 5000);
		});
		
	</script>
  </body>
</html>
