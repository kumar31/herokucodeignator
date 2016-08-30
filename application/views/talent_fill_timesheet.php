<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
include('talent_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		$stripeurl = $variableconfig->stripeurl(); 
		
		$talent_id = $this->session->userdata('talent_id'); 
		if($talent_id == ''){
			$talent_id = $this->input->cookie('talent',true);
		}
 ?>
<body>
<div style="display: none;" class="se-pre-con"></div>
  <div class="container">
    <div class="row orangehead">
      <div class="col-md-10">
        <header class="clearfix">
          <h1 class="event-title"><?php echo $event_detail[0]['event_name']; ?>
            <aside class="below">
			<?php
				$startdatetime = $event_detail[0]['start_datetime'];
				$start_datetime = date('D dS M Y h:i A', strtotime($startdatetime));
				
				$enddatetime = $event_detail[0]['end_datetime'];
				$end_datetime = date('D dS M Y h:i A', strtotime($enddatetime));
			?>
              <?php echo $start_datetime; ?> - <?php echo $end_datetime; ?> 
            </aside>
          </h1>
        </header>
        
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- Start of white box -->
      <div class="col-sm-8 whiteBG invitebox topmargin">
        <div>
          <div class="row">
		  <?php
					
					$total_days = $checkin_detail[0]['number_of_days'];
					$total_hrs = $checkin_detail[0]['number_of_hours'];
					if($total_days != 0) {
						$total_hrs = $total_hrs + ($total_days * 24);
					}
					
					$total_mins = $checkin_detail[0]['number_of_minutes'];
					
					$mins = round($total_mins/60 * 100);
					$hrs_mins = $total_hrs . "." . $mins;
					
					//$total_pay = $hrs_mins * 25;
					$this->db->select('*');
					$this->db->from('talent_hourly_pay');		
					$query = $this->db->get();
					$result = $query->result_array(); 
					$per_hour = $result[0]['per_hour'];
					$outfit_fee = $result[0]['outfit_fee'];
					$stripe_fee = $result[0]['stripe_fee'];
					
					$fee = $outfit_fee + $stripe_fee;
					
					$total_hours_est = $hrs_mins;
					$per_talent_amt = "";
					
					$talent_amount = $talent_detail[0]['amount'];
					
					if($talent_amount == 0){
						$per_talent_amt = $per_talent_amt + ($total_hours_est * $per_hour);
					}
					else {
						$per_talent_amt = $per_talent_amt + ($total_hours_est * $talent_amount);
					}
					$per_talent_percentage = ($fee / 100) * $per_talent_amt;
					
					$per_talent_earned_amt = round($per_talent_amt - $per_talent_percentage,2);
					$per_talent_amt = round($per_talent_amt,2);
					
				   /*$per_talent_percentage = ($fee / 100) * $per_talent_amt;
				   $outfit_stripe_fee = ($outfit_fee / 100) * $per_talent_amt;
				   $per_talent_amt = round($per_talent_amt - $per_talent_percentage,2);*/
				?>
            <div class="col-xs-12">
              <h3>Check Timesheet for <?php echo $event_detail[0]['event_name']; ?>
              </h3>
              <hr>
			   <div class="col-md-12">
				   <div class="form-group">
					 
					 <h3><span class="pull-left">Rating :</span>
						
							<ul class="list-inline list-unstyled list-active">
								<li><?php $talentrating = $checkin_detail[0]['talent_rating']; ?>
								<?php 
									if($talentrating == 0) { ?>
										&nbsp;<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 1) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 2) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 3) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 4) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($talentrating == 5) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									<?php }
								?>
								  
								</li>
							</ul>
						</h3>
				   </div>
			   </div>
			   
			   <input type="hidden" value="<?php echo $checkin_detail[0]['number_of_days']; ?>" name="total_days" id="total_days">
			   <input type="hidden" value="<?php echo $checkin_detail[0]['number_of_hours']; ?>" name="total_hrs" id="total_hrs">
			   <input type="hidden" value="<?php echo $checkin_detail[0]['number_of_minutes']; ?>" name="total_mins" id="total_mins">
			  
			  <div class="col-md-4">
				<h4>Days worked : <?php echo $checkin_detail[0]['number_of_days']; ?> </h4>
			  </div>
			  <div class="col-md-4">
				<h4>Hours : <?php echo $checkin_detail[0]['number_of_hours']; ?> </h4>
			  </div>
			  <div class="col-md-4">
				<h4>Minutes : <?php echo $checkin_detail[0]['number_of_minutes']; ?> </h4>
			  </div>
			  <br>
             <form target="_top" data-toggle="validator" enctype="multipart/form-data" id="myForm" class="myForm" action="" method="POST" style="display: none;">
				  
				  <div class="form-group prepend-top col-md-4">
					<label class="" for="">Days
					</label>
					<select class="col-xs-12 form-control form-group" name="days" id="days" >
					  <?php
							$days = range(0,31);
							foreach($days as $key=>$val) { 
							if($key == 0) {
								$key = "0";
							} ?>
								 <option value="<?php echo $key; ?>"><?php echo $val; ?>
									</option>
							<?php }
						?>
					</select>
				  </div>
				  
				  <div class="form-group prepend-top col-md-4">
					<label class="" for="">Hours
					</label>
					<select class="col-xs-12 form-control form-group" name="hours" id="hours" >
					  <?php
							$hours = range(0,24);
							foreach($hours as $key=>$val) { 
							if($key == 0) {
								$key = "0";
							} ?>
								 <option value="<?php echo $key; ?>"><?php echo $val; ?>
									</option>
							<?php }
						?>
					</select>
				  </div>
				  
				  <div class="form-group prepend-top col-md-4">
					<label class="" for="">Minutes
					</label>
					<select class="col-xs-12 form-control form-group" name="minutes" id="minutes" >
					  <?php
							$minutes = range(0,60);
							foreach($minutes as $key=>$val) { 
							if($key == 0) {
								$key = "0";
							} ?>
								 <option value="<?php echo $key; ?>"><?php echo $val; ?>
									</option>
							<?php }
						?>
					</select>
				  </div>
				  
				  <!--<div class="prepend-top form-group col-md-12">
					<label class="pull-left required" for="">Comments
					</label>
					<textarea class="form-control autoresized-textarea clear" rows="7" placeholder="Your comments here" name="comments" id="comments"></textarea>
				  </div>-->
				 
			  </div>
				  
			  <div class="row">
				<div class="col-sm-1 col-xs-1">
				</div>
				<div class="col-sm-4 col-xs-3">
					<a id="submit" name="submit" type="" class="btn btn-submit btn-lg largeHeight">Agree & Get payment $<?php echo $per_talent_earned_amt; ?></a>
				</div>
				
				<div class="col-sm-2 col-xs-3">
				<a class=
				   "btn btn-danger btn-lg largeHeight once-only edit-total" value=""
				   role="button" id="btn3">Edit
				 </a>
				</div>
				
				<div class="col-sm-3 col-xs-2">				 
					<a style="display: none;" id="reqcheck" name="reqcheck" type="submit" class="btn btn-submit btn-lg largeHeight">Request recheck</a>				 
				</div>
			  </div>
			  <!-- End demo -->
			</div>
			</form>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
  <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('client_footer.php'); ?>
	<script>
		
		$( "#submit" ).click(function() {
		  var status = 2;
		  timesheet(status);
		  $(this).attr('disabled', true);
		});
		
		function timesheet(status){
			
			var event_id = <?php echo $event_detail[0]['event_id']; ?>;  
			var talent_id = <?php echo $talent_id; ?>; 

			var number_of_days = $("#total_days").val(); 
			var number_of_hours = $("#total_hrs").val(); 
			var number_of_minutes = $("#total_mins").val(); 
			
				var url = '<?php echo $webserviceurl; ?>index.php/talent_update_timesheet';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'event_id':event_id,'talent_id':talent_id,'number_of_days':number_of_days,'number_of_hours':number_of_hours,'number_of_minutes':number_of_minutes,'status':status},
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
						
						if((message == "1") && (status == "2")) {							
							transfer();
							//window.location.assign("<?php echo base_url();?>index.php/closed_events_talent" );
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text("Your payment failed due to some reasons.Please contact us.");
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}


	</script>
	
	<script>
		
		$( "#reqcheck" ).click(function() {
		  recheck();
		  $(this).attr('disabled', true);
		});
		
		function recheck(){
			
			var event_id = <?php echo $event_detail[0]['event_id']; ?>;  
			var talent_id = <?php echo $talent_id; ?>; 
			
			var days = $( "#days option:selected" ).val(); 
			var hours = $( "#hours option:selected" ).val(); 
			var minutes = $( "#minutes option:selected" ).val();
			
			/*if(days == "-") { 
				var number_of_days = $("#total_days").val(); 
			}
			else { 
				var number_of_days = $( "#days option:selected" ).val(); 
			}
			
			if(hours == "-") { 
				var number_of_hours = $("#total_hrs").val(); 
			}
			else { 
				var number_of_hours = $( "#hours option:selected" ).val(); 
			}
			
			if(minutes == "-") { 
				var number_of_minutes = $("#total_mins").val(); 
			}
			else { 
				var number_of_minutes = $( "#minutes option:selected" ).val(); 
			}*/
			
				var url = '<?php echo $webserviceurl; ?>index.php/talent_update_timesheet_recheck';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'event_id':event_id,'talent_id':talent_id,'number_of_days':days,'number_of_hours':hours,'number_of_minutes':minutes},
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
							window.location.assign("<?php echo base_url();?>index.php/closed_events_talent" );
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}


	</script>
	
	<script>
		function update_pay_status(event_id,client_id){
			var talent_id = "<?php echo $talent_id;  ?>";
			var event_id = event_id; 
			var client_id = client_id; 
				
				var url = '<?php echo $webserviceurl; ?>index.php/payment_status';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'talent_id':talent_id,'event_id':event_id,'client_id':client_id},
					//'dataType': 'json',
					beforeSend: function(){
						 $(".se-pre-con").show();
					   },
					   complete: function(){
						 $(".se-pre-con").hide();
					   },
					success: function(data) {
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						//alert(JSON.stringify(data['Message']));
						if(message == "1") {
							window.location.assign("<?php echo base_url();?>index.php/closed_events_talent" );
						}
					}
				
				});

		}
	
	  function transfer(){
		  var destination = "<?php echo $talent_detail[0]['bank_id']; ?>";
		  var recipient = "<?php echo $talent_detail[0]['recp_id']; ?>";
		  var event_id = "<?php echo $invited_events[0]['event_id']; ?>";
		  var client_id = "<?php echo $invited_events[0]['client_id']; ?>";
		  var agent_id = "<?php echo $invited_events[0]['agent_id']; ?>";
		  var talent_amount = "<?php echo $per_talent_earned_amt; ?>";
		  
			if(agent_id == '') {
				var agent_id = 0;
			}
			else {
				var agent_id = agent_id; 
			}
			
		  var btn = "#btn-paid"+event_id;
		  $(btn).attr('disabled', true);
			
			var talent_id = "<?php echo $talent_id; ?>"; 
			var amount = "<?php echo $per_talent_amt; ?>";
				
				var url = '<?php echo $stripeurl; ?>getpaymentfromclientandtransfertotalent.php';
				
				//alert(destination);alert(recipient);alert(event_id);alert(client_id);alert(agent_id);alert(talent_amount);alert(talent_id);alert(amount); die;
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'amount':amount,'destination':destination,'recipient':recipient,'event_id':event_id,'talent_id':talent_id,'agent_id':agent_id,'client_id':client_id,'talent_amount':talent_amount},
					//'dataType': 'json',
					beforeSend: function(){
						 $(".se-pre-con").show();
					   },
					   complete: function(){
						 $(".se-pre-con").hide();
					   },
					success: function(data) {
						//alert(data);
						if(data == 1) {
							update_pay_status(event_id,client_id);
						}
						if(data == 2) {
							var status = 1;
							timesheet(status);
						}
						
					}
				
				});

		}
		
		$(document).on("click", ".edit-total", function(event){
			$('.myForm').toggle();        
			$('.total').toggle(); 
			$('#reqcheck').toggle();
			
			$(this).text(function(i, text){
				  return text === "Cancel" ? "Edit" : "Cancel";
			  })
		}); 
	
  </script>
</body>
</html>
