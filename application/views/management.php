<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		$stripeurl = $variableconfig->stripeurl(); 
 ?>
<?php 

$items_per_group;
$get_total_rows;

$total_groups= ceil($get_total_rows/$items_per_group);	
?>
<?php $event_id = $event_detail[0]['event_id'];  ?>
<script type="text/javascript">
$(document).ready(function() {
	var track_load = 0; //total loaded record group(s)
	var loading  = false; //to prevents multipal ajax loads
	var total_groups = <?=$total_groups;?>; //total record group(s)
	
	$('#results').load("<?php echo base_url();?>index.php/management/getblogdata/<?php echo $event_id ?>", {'group_no':track_load}, function() {track_load++;}); //load first group
	
	$(window).scroll(function() { //detect page scroll
		
		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		{
			
			if(track_load <= total_groups && loading==false) //there's more data to load
			{
				loading = true; //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				//load data from the server using a HTTP POST request
				$.post('<?php echo base_url();?>index.php/management/getblogdata/<?php echo $event_id ?>',{'group_no': track_load}, function(data){
									
					$("#results").append(data); //append received data into the element

					//hide loading image
					$('.animation_image').hide(); //hide loading image once data is received
					
					track_load++; //loaded group increment
					loading = false; 
				
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
					
					//alert(thrownError); //alert with HTTP error
					$('.animation_image').hide(); //hide loading image
					loading = false;
				
				});
				
			}
		}
	});
});
</script>
  <body>
  <div style="display: none;" class="se-pre-con"></div>
    <div class="container">
      <div class="row orangehead">
        <div class="col-md-10">
          <header class="clearfix">
            <h1 class="event-title"><?php echo $event_detail[0]['event_name'];  ?>
              <aside class="below">
			  <?php
					$startdatetime = $event_detail[0]['start_datetime'];
					$start_datetime = date('D dS M Y h:i A', strtotime($startdatetime));
					
					$enddatetime = $event_detail[0]['end_datetime'];
					$end_datetime = date('D dS M Y h:i A', strtotime($enddatetime));
				?>
                    
                <?php echo $start_datetime;  ?> - <?php echo $end_datetime;  ?>
              </aside>
            </h1>
          </header>
          <div class="dashboard_tab_wrapper">
            <div class="dashboard_tab bring-forward clicked">
              <a href="#">Management
              </a>
            </div>
            <div class="dashboard_tab bring-forward optionsdrop">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">. . .
                  <span class="caret">
                  </span>
                </a>
                <ul class="dropdown-menu">
                <li>
                  <a href="<?php echo base_url();?>index.php/project_details/<?php echo $event_detail[0]['event_id']; ?>">Project Details
                  </a>
                </li>
                
				
                <?php 
					$status = $event_detail[0]['launch_status'];
					if($status == 0) {
				  ?>
				<li>
                  <a href="<?php echo base_url();?>index.php/edit_event/<?php echo $event_detail[0]['event_id']; ?>">Edit
                  </a>
                </li>
                <li>
                  <a id="" data-toggle="modal" data-target="#myModal">Delete
                  </a>
                </li>
                <li role="separator" class="divider">
                </li>
                <li>
                  <a data-toggle="modal" data-target="#myModalc">Close
                  </a>
                </li>
				<?php } ?>
				
				<?php 
					if($status == 1) {
				?>
				<li class='disabled'>
                  <a href="#">Edit
                  </a>
                </li>
				<li class='disabled'>
                  <a id="">Delete
                  </a>
                </li>
                <li role="separator" class="divider">
                </li>
                <li class='disabled'>
                  <a>Close
                  </a>
                </li>
				<?php } ?>
				
              </ul>
              </li>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <!-- Start of white box -->
        <div class="col-sm-8 whiteBG invitebox topmargin">
          <div>
            <!-- single Person -->
            <div id="my-tab-content" class="tab-content">
              <div class="tab-pane active">
                <div class="w-section inverse blog-grid">
					
					<div class="" id="results">
						
					</div>
					
				</div>
                <!-- End of single person -->
                
              </div>
            </div>
          </div>
        </div>
		
        <!-- End of white box -->
        <div class="col-sm-4 topmargin listings-invitebar">
          <section class="clearfix whiteBG classWithPadLeft">
            <div class="text-center">
              <h2>Info
              </h2>			  
            </div>
			<?php $total_talents = $hired_info[0]['hired_count']; ?>
            <hr> 
			<?php
				$startdatetime = $event_detail[0]['start_datetime'];
				$start_datetime = date('Y-m-d h:i A', strtotime($startdatetime));
				
				$checkindatetime = $event_detail[0]['end_datetime'];
				$checkindatetime = date('Y-m-d h:i A', strtotime($checkindatetime));
								
				$datetime1 = new DateTime($start_datetime);
				$datetime2 = new DateTime($checkindatetime);
				$interval = $datetime1->diff($datetime2);
				$total_hours = $interval->format('%a days %h hours %i minutes'); 
				
				$total_days = $interval->format('%a'); 
				$total_hrs = $interval->format('%h'); 
				if($total_days != 0) {
					$total_hrs = $total_hrs + ($total_days * 24);
				}
				
				$total_mins = $interval->format('%i'); 
				
				$mins = round($total_mins/60 * 100);
				$hrs_mins = $total_hrs . "." . $mins;
			?>
            <div class="row proposaldata">
              <div class="col-xs-6">
                <h3 id="number"><?php echo $hired_info[0]['hired_count']; ?>
                </h3>
                <p id="subtext">hired
                </p>
              </div>
			  
              <div class="col-xs-6">
                <h3 data-placement="bottom" data-toggle="tooltip" title="This is the estimated price for your event based on the hours and numbers of talent needed." id="number">$<?php /*$total_hours_est = $hrs_mins;
					$total_talents = $hired_info[0]['hired_count'];
					$per_hour = $total_talents * 30;
					$total_amt = $total_hours_est * $per_hour;
					echo $total_amt;*/ ?>
					
					<?php
					$per_talent_earned_amt = "";
					foreach($events as $vals) {
						
						$this->db->select('*');				
						$this->db->where('talent_id',$vals['talent_id']);	
						$this->db->from('talent_details');
						$query = $this->db->get();
						$talent_detail = $query->result_array();
						
						$reg_type = $talent_detail[0]['reg_type'];
						
						$this->db->select('*');						
						$this->db->from('talent_hourly_pay');
						$query = $this->db->get();
						$res = $query->result_array(); 
						
						$this->db->select('*');	
						$this->db->where('agent_id',$talent_detail[0]['agency']);								
						$this->db->from('agent_details');
						$query = $this->db->get();
						$ress = $query->result_array(); 
						
						$per_hour = $res[0]['per_hour'];
						$outfit_fee = $res[0]['outfit_fee'];
						$stripe_fee = $res[0]['stripe_fee'];
						$agent_outfit_fee = $ress[0]['outfit_fee'];
						$agent_fee = $ress[0]['percentage'];
						$employee_fee = $res[0]['agent_fee'];
						
						$per_talent_amt = "";
						$talent_amount = $vals['amount'];
						
						if($reg_type == 1) {
							$fee = $agent_outfit_fee + $stripe_fee;
							$per_hour = $employee_fee;
						}
						else {
							if($event_detail[0]['talent_type'] == 1) {
								$per_hour = $employee_fee;
							}
							$fee = $outfit_fee + $stripe_fee;
							
						}
						if($talent_amount == 0){
							$per_talent_amt = $per_talent_amt + ($hrs_mins * $per_hour);
						}
						else {
							$per_talent_amt = $per_talent_amt + ($hrs_mins * $talent_amount);
						}
						$per_talent_percentage = ($fee / 100) * $per_talent_amt;
						$per_talent_earned_amt = $per_talent_earned_amt + (round($per_talent_amt));
						
						//$per_client_earned_amt = round($per_talent_amt + $per_talent_percentage);
						}
					  ?>
					 <?php echo $per_talent_earned_amt; ?>
                </h3>
                <p id="subtext">estimated price
                </p>
              </div>
			  
            </div>
			<div class="">
            <p class="centerText btn-group-justified">
			<?php 
				$launch_status = $event_detail[0]['launch_status'];
				
				if($launch_status == 0) {
				?>				
						 <a class="btn btn-danger btn-lg largeHeight" onClick="launchevent();" role="button">Launch Event</a>
					
			  <?php } ?>
			  
            </p>
			
			<p class="centerText btn-group-justified">
			<?php
			  if(($launch_status == 1) && ($checkout_paid_detail == "")) {
				?>
              <a class=
                 "btn btn-danger btn-lg largeHeight disabled" 
                 role="button">Launched 
              </a>
			  <?php } ?>
			  </p>
			  
			  <p class="centerText btn-group-justified">
			<?php
			  if(($launch_status == 1) && ($checkout_paid_detail == 1)) {
				?>
              <a class=
                 "btn btn-danger btn-lg largeHeight disabled" 
                 role="button">Event finished 
              </a>
			  <?php } ?>
			  </p> 
			  
			  <?php 
				$deposit_amt = $client_payments[0]['amount'];
				$launch_amt = $client_payments[1]['amount'];
				
				$deposit_launch_amt = $deposit_amt + $launch_amt;
				
				$talent_earned = $talent_payments;
				
			    $total_amt  =  $deposit_launch_amt - $talent_earned;
				?>
				<!--<p class="centerText btn-group-justified">
				 <?php $refund_status = $event_detail[0]['refund_status']; ?>
				<?php
				  if(($total_amt > 0) && ($checkout_paid_detail == 1) && ($refund_status == 0)) {
					?>
				  <a class=
					 "btn btn-submit btn-lg largeHeight" onclick="refundamount('<?php echo $total_amt; ?>','<?php echo $event_detail[0]['event_id']; ?>','<?php echo $myuser_id; ?>','<?php echo $total_talents; ?>')"
					 id="btn-refund<?php echo $event_detail[0]['event_id']; ?>" role="button">Refund amount $<?php echo $total_amt; ?>
				  </a>
				  <?php } ?>
			  </p>
			  <p class="centerText btn-group-justified">
				<?php
				  if($refund_status == 1) {
					?>
				  <a class=
					 "btn btn-submit btn-lg largeHeight disabled" 
					 role="button">Refunded amount $<?php echo $total_amt; ?>
				  </a>
				  <?php } ?>
			  </p>-->
          </div>
          </section>
				
		
        </div>
      </div>
	  
	  <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Are you sure want to delete this event</h4>
					</div>
					<div class="modal-body">
					 				  
						<a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_rejects" value=""
					   role="button" id="btn2" onClick="delevent();" >Delete
					 </a>	
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
				  
				</div>
			  </div>
			  
		<!-- Modal Close -->
			  <div class="modal fade" id="myModalc" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Are you sure want to close this event</h4>
					</div>
					<div class="modal-body">
					 				  
						<a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_rejects" value=""
					   role="button" id="btn2" onClick="closeevent();" >Close event
					 </a>	
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
				  
				</div>
			  </div>
			  
    </div>
    <?php 
	error_reporting(0);
	include('client_footer.php'); ?>
	
	<script>
		
		function delevent(){
			var client_id = <?php echo $myuser_id; ?>; 
			var event_id = <?php echo $event_detail[0]['event_id']; ?>; 
			
				var url = '<?php echo $webserviceurl; ?>index.php/delete_event';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'client_id':client_id,'event_id':event_id},
					//'dataType': 'json',
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {
							window.location.assign("<?php echo base_url();?>index.php/myevents_client");
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}
		
		function closeevent(){
			var client_id = <?php echo $myuser_id; ?>; 
			var event_id = <?php echo $event_detail[0]['event_id']; ?>; 
			
				var url = '<?php echo $webserviceurl; ?>index.php/event_close';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'client_id':client_id,'event_id':event_id},
					//'dataType': 'json',
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {
							window.location.assign("<?php echo base_url();?>index.php/myevents_client");
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}
		
		function launchevent(){
			var client_id = <?php echo $myuser_id; ?>; 
			var event_id = <?php echo $event_detail[0]['event_id']; ?>; 
			
				var url = '<?php echo $webserviceurl; ?>index.php/launch_event';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'client_id':client_id,'event_id':event_id},
					//'dataType': 'json',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {
							window.location.reload();
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}
		
		function applytolaunch(textbox_val,event_id,client_id,total_talents){
		  var btn = "#btn-paid"+event_id;
		  $(btn).attr('disabled', true);
			var stripe_id = "<?php echo $stripe_id; ?>"; 
			var amount = textbox_val; 
				
				var url = '<?php echo $stripeurl; ?>payment_launch.php';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'stripe_id':stripe_id,'amount':amount,'event_id':event_id,'client_id':client_id,'no_of_talents_hired':total_talents},
					//'dataType': 'json',
					success: function(data) {
						if(data == 1) {
							launchevent();
						}
						
					}
				
				});

		}
		
		function refundamount(textbox_val,event_id,client_id,total_talents){
		  var btn = "#btn-refund"+event_id;
		  $(btn).attr('disabled', true);
			var stripe_id = "<?php echo $client_transaction_id; ?>"; 
			var amount = textbox_val; 
				
				var url = '<?php echo $stripeurl; ?>refund.php';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'stripe_id':stripe_id,'amount':amount,'event_id':event_id,'client_id':client_id,'no_of_talents_hired':total_talents},
					//'dataType': 'json',
					success: function(data) {
						if(data == 1) {
							location.reload();
							
						}
						
					}
				
				});

		}
		
	</script>
  </body>
</html>
