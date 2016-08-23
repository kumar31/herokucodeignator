<?php 
error_reporting(0);
include('agent_header.php'); ?>
<?php 	$agentid = $this->session->userdata('agent_id');
		if($agentid == ''){
			$agentid = $this->input->cookie('agent',true);
		}
		$eventid = $this->uri->segment(2);  ?>
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
			<h4>Talents List <span class="pull-right"><a href="<?php echo base_url(); ?>index.php/agent_dashboard/<?php echo $agentid; ?>" class="btn btn-info btn-sm">Back</a> &nbsp;&nbsp; <a href="<?php echo base_url().'index.php/agent_talents/exportagentdetails/'.$eventid; ?>"><button id="" class="btn btn-success btn-sm">Export</button></a> </span></h4><br>
			
							
				<table id="example" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Talent Name</th>
							<th>Email</th>
							<th>Amount</th>
							<th>Hours worked</th>
							<th>Payment Status</th>            
						</tr>
					</thead>
					
					<tbody><?php //print"<pre>";print_r($talents_details); ?>
					<?php foreach($talents_details as $val) {
						
						?>	
						<tr>
							<td><?php echo $val['talent_id']; ?></td>
							<td><?php echo $val['first_name']; ?></td>
							<td><?php echo $val['email']; ?></td>
							
							<td><?php if($val['amount'] == "") { ?>
										
							<?php } else { ?>
								$<?php echo $val['amount']; ?>
							<?php } ?></td>
							<td>
							<?php if($val['number_of_days'] != 0) {
								echo $val['number_of_hours']; ?> Days
							<?php } ?>
							
							<?php if($val['number_of_hours'] != 0) {
								echo $val['number_of_hours']; ?> Hrs
							<?php }							
							?> 
							
							<?php if($val['number_of_minutes'] != 0) {
								echo $val['number_of_minutes']; ?> Mins
							<?php }							
							?>
							
							</td>
							<td><?php if($val['amount'] == "") { ?>
								<span class="text-danger">Not Paid</span>
							<?php } else { ?>
								<span class="text-success">Paid</span>
							<?php } ?></td>                
						</tr>
						
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
	</script>
  </body>
</html>
