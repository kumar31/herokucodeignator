<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		$stripeurl = $variableconfig->stripeurl(); 
 ?>
<div id="masonryWr" class="row" >

<?php
date_default_timezone_set("UTC");
//print"<pre>";
//print_r($events); die;
$myuser_id = $this->session->userdata('client_id');
	if($myuser_id == ''){
			$myuser_id = $this->input->cookie('client',true);
		} 
$event_id = $this->uri->segment(3);
$datetimestring = "%Y-%m-%d  %h:%i %A";
$datestring = "%h:%i %a";
$time = time();
$array_count = count($events);
 $i = 1;
 
foreach($events as $val)
{		
	
		$talent = $val['talent'][0];
		
		$gender = $talent['gender']; 
		if($talent['gender'] == 1) {
			$gender = "Male";
		}
		if($talent['gender'] == 0) {
			$gender = "Female";
		}
	 
	 ?>
		 
			<div class="person">
                  <div class="row persona">
                    <div class="col-xs-4 col-sm-3 text-center">
                      <img style="width: 120px; height: 120px;" src="<?php echo $talent['profile_url']; ?>">
                      <!--<img src="<?php echo $talent['profile_url']; ?>">-->
                    </div>
                    <div class="col-xs-8 col-sm-6">
                      <h3><?php echo $talent['first_name']; ?> <?php echo $talent['last_name']; ?>
					  <?php $checkout_agreed_detail = $val['checkout_agreed_detail']; 
							$checkout_status = $val['checkout_detail'];
							$checkout_paid_detail = $val['checkout_paid_detail'];
							$checkout_recheck_detail = $val['checkout_recheck_detail'];
							
							if(($checkout_agreed_detail == 0) && ($checkout_recheck_detail == 1)) { ?>
								 <h5 class="text-danger"><b>Talent requested time &nbsp;-&nbsp; <?php echo $val['check_details_talent'][0]['number_of_days']; ?> &nbsp; Days,  &nbsp; <?php echo $val['check_details_talent'][0]['number_of_hours']; ?> &nbsp; Hours, &nbsp; <?php echo $val['check_details_talent'][0]['number_of_minutes']; ?> &nbsp; Minutes  </b></h5>
							<?php }
					   ?>
					   <?php 
							if(($checkout_status == 1) && ($checkout_paid_detail == 1)) { ?>
								
								<h5 class="text-success"><b>Payment Transferred</b></h5>
								
							<?php }
					   ?>
					   <?php 
							if($checkout_agreed_detail == 1) { ?>
								<?php $w9_form = $talent['w9_form'];
									if($w9_form == "") { ?>
										<h5 class="text-success"><b>Payment Transferred</b> <span class="text-danger">W9 form not available</span></h5>
								<?php	} else { ?>
										<h5 class="text-success"><b>Payment Transferred</b>   <a target="_blank" href="<?php echo $talent['w9_form']; ?>">See W9 form</a></h5>
								<?php }
								?>
								
							<?php }
					   ?>
					   
                      </h3>
                      <h4><?php echo $talent['special_skills']; ?>
                      </h4>
                      <h4><?php echo $gender ?> - <?php echo $talent['hair_color']; ?> hair, <?php echo $talent['eye_color']; ?> eyes, <?php echo $talent['height']; ?> ft
                  </h4>
                      <div class="row uppercase">
                    <div class="col-xs-4">
                      <p>
                        <span class=
                              "glyphicon glyphicon-pushpin">
                        </span><?php echo $talent['city']; ?>
                      </p>
                    </div>
                    <div class="col-xs-8">
                      <p>
					  <?php echo $talent['total_events_attended']; ?>
                        <span class=
                              "glyphicon glyphicon-thumbs-up">
                        </span>
						
                       <p><span class="pull-left">Rating :</span>
						
							<ul class="list-inline list-unstyled list-active">
								<li><?php $rating_avg = $talent['average_rating']; ?>
								<?php 
									if($rating_avg == 0) { ?>
										&nbsp;<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 1) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 2) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 3) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 4) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 5) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									<?php }
								?>
								  
								</li>
							</ul>
						</p>
                      </p>
                    </div>
                  </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                      <div>
                        <h3 id="texthired">Hired
                        </h3>
                      </div>
                    </div>
					
					 <div class="col-xs-12 col-sm-3"> 					
					   <div class="checkbox-warning centerText"> 
						<?php 
						$checkin_status = $val['check_details'];
						$launch_status = $event_detail[0]['launch_status'];
						
						if($checkin_status == 1) {
						?>
							<!--<a role="button" class="btn btn-submit btn-lg largeHeight" data-toggle="modal" data-target="#myModalcn">Check In Now</a>-->
						<input type="hidden" value="<?php echo $talent['talent_id']; ?>" id="reject<?php echo $talent['talent_id']; ?>">					  
							<a class=
						   "btn btn-submit btn-lg largeHeight once-only disabled" value="<?php echo $talent['talent_id']; ?>"
						   role="button" id="btn1" textbox_id="#reject<?php echo $talent['talent_id']; ?>">Checked In &nbsp;&nbsp;&nbsp;
						 </a>							
						<? } ?>
						
						<?php 
						if(($checkin_status == 0) && ($launch_status == 1)) {
						?>
							<!--<a role="button" class="btn btn-submit btn-lg largeHeight" data-toggle="modal" data-target="#myModalcn">Check In Now</a>-->
						<input type="hidden" value="<?php echo $talent['talent_id']; ?>" id="reject<?php echo $talent['talent_id']; ?>">					  
						<input type="hidden" value="<?php echo $talent['agency']; ?>" id="rejectag<?php echo $talent['agency']; ?>">					  
							<a class=
						   "btn btn-submit btn-lg largeHeight once-only" value="<?php echo $talent['talent_id']; ?>" onclick="applytoevent('<?php echo $talent['talent_id']; ?>','<?php echo $talent['agency']; ?>')"
						   role="button" id="btn2" textbox_id="#reject<?php echo $talent['talent_id']; ?>" agent_id="#rejectag<?php echo $talent['agency']; ?>">Check In Now
						 </a>							
						<? } ?>
						
						<?php  
						
						$checkout_status = $val['checkout_detail'];
						$checkout_agreed_detail = $val['checkout_agreed_detail'];
						
						if(($checkout_status == 0) && ($checkin_status == 1) && ($checkout_agreed_detail == 0)) {
						?>
							<a role="button" class="btn btn-danger btn-lg largeHeight" data-toggle="modal" data-target="#myModal<?php echo $talent['talent_id']; ?>">Check Out &nbsp;&nbsp;&nbsp;&nbsp;</a>						
						<? } ?>
						
						<?php  
						if(($checkout_status == 0) && ($checkout_agreed_detail == 1)) {
						?>
							<a role="button" class="btn btn-danger btn-lg largeHeight disabled">Checked Out </a>						
						<? } ?>
						
						<?php  
						if($checkout_status == 1) {
						?>
							<a role="button" class="btn btn-danger btn-lg largeHeight disabled">Checked Out </a>						
						<? } ?>
						</div>						
					</div>
				
                  </div>
                  <hr>
                </div>
                <!-- End of single person -->
				
				<!-- Modal checkin 
				  <div class="modal fade" id="myModalcn" role="dialog">
					<div class="modal-dialog">
					
					  <!-- Modal content
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Confirm <?php echo $talent['first_name']; ?></h4>
						</div>
						<div class="modal-body">
						 <div class="form-group">
						  <label for="rejectreason">Check in at <?php echo mdate($datestring, $time); ?>?</label>
						  
						</div>
						<input type="hidden" value="<?php echo $talent['talent_id']; ?>" id="reject<?php echo $talent['talent_id']; ?>">					  
							<a class=
						   "btn btn-danger btn-lg largeHeight once-only" value="<?php echo $talent['talent_id']; ?>"
						   role="button" id="btn1" textbox_id="#reject<?php echo $talent['talent_id']; ?>">Yes
						 </a>	
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					  </div>
					  
					</div>
				  </div>-->
				  
				<!-- Modal checkout -->
				  <div class="modal fade" id="myModal<?php echo $talent['talent_id']; ?>" role="dialog">
					<div class="modal-dialog">
					
					  <!-- Modal content-->
					  <div class="modal-content text-center">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Confirm checkout <?php echo $talent['first_name']; ?></h4>
						  <h5 id="alertmsg" class="error_msg"></h5>
						  <?php $talent_checkin_status = $val['talent_sum'] + 1; ?>
						</div>
						<div class="modal-body">
						 <div class="form-group">
						 <?php
							$startdatetime = $event_detail[0]['start_datetime'];
							$start_datetime = date('Y-m-d h:i A', strtotime($startdatetime));
							
							$checkindatetime = $val['check_details_talent'][0]['checkin_datetime'];
							$checkindatetime = date('Y-m-d h:i A', strtotime($checkindatetime));
							
							$endtime = mdate($datetimestring, $time);
							
							$datetime1 = new DateTime($checkindatetime);
							$datetime2 = new DateTime($endtime);
							$interval = $datetime1->diff($datetime2);
							$total_hours = $interval->format('%a days %h hours %i minutes'); 
							
							$total_days = $interval->format('%a'); 
							$total_hrs = $interval->format('%h'); 
							$total_mins = $interval->format('%i'); 
							
							
						?>
						 <!-- <h3>Check out at <?php echo mdate($datestring, $time); ?>?</h3>-->
						  <h3>Confirm your Checkout detail ?</h3>
						  <!--<h4 class="text-success"><?php echo $checkindatetime; ?>  &nbsp;-&nbsp;  <?php echo mdate($datetimestring, $time); ?></h4>-->
						  
						  <input type="hidden" value="<?php echo $total_days; ?>" name="total_days" id="total_days<?php echo $talent['talent_id']; ?>">
						  <input type="hidden" value="<?php echo $total_hrs; ?>" name="total_hrs" id="total_hrs<?php echo $talent['talent_id']; ?>">
						  <input type="hidden" value="<?php echo $total_mins; ?>" name="total_mins" id="total_mins<?php echo $talent['talent_id']; ?>">
						  
						  <h4 class="total" id="total-hours">Total - <?php echo $total_hours; ?></h4>
						  
						   <form name="myForm" id="myForm" role="form" novalidate="novalidate" class="form-inline myForm" style="display: none;">
								<div class="form-group">
								  <label>Days
								  <select class="form-control " data-default="0" name="" id="days<?php echo $talent['talent_id']; ?>">
									<?php
										$days = range(0,31);
										foreach($days as $key=>$val) { 
										if($key == 0) {
											$key = "-";
										} ?>
											 <option value="<?php echo $key; ?>"><?php echo $val; ?>
												</option>
										<?php }
									?>
								  </select>
									  </label>
								</div>
								
								<div class="form-group">
								  <label>Hours
								  <select class="form-control " name="" id="hours<?php echo $talent['talent_id']; ?>">
									<?php
										$hours = range(0,24);
										foreach($hours as $key=>$val) { 
										if($key == 0) {
											$key = "-";
										} ?>
											 <option value="<?php echo $key; ?>"><?php echo $val; ?>
												</option>
										<?php }
									?>
								  </select>
									  </label>
								</div>
								
								<div class="form-group">
								  <label>Minutes
								  <select class="form-control " name="" id="minutes<?php echo $talent['talent_id']; ?>">
									<?php
										$minutes = range(0,60);
										foreach($minutes as $key=>$val) { 
										if($key == 0) {
											$key = "-";
										} ?>
											 <option value="<?php echo $key; ?>"><?php echo $val; ?>
												</option>
										<?php }
									?>
								  </select>
									  </label>
								</div>
							</form>
							
						</div>
						
						<div class="form-group">
						 <label>Rating : 
						 <input id="input-id" class="rating rating-loading rating-id<?php echo $talent['talent_id']; ?>" data-min="0" data-max="5" data-step="1">
						  </label>
					   </div>
					   
						<input type="hidden" value="<?php echo $talent['talent_id']; ?>" id="cout<?php echo $talent['talent_id']; ?>">					  
						<input type="hidden" value="<?php if($talent_checkin_status == $array_count) { echo $i; }  ?>" id="ival<?php echo $talent['talent_id']; ?>">					  
							<a class=
						   "btn btn-submit btn-lg largeHeight once-only btn_rejects<?php echo $talent['talent_id']; ?>" value="<?php echo $talent['talent_id']; ?>"
						   role="button" id="btn2" textbox_id2="#cout<?php echo $talent['talent_id']; ?>" ivalue="#ival<?php echo $talent['talent_id']; ?>">Yes
						 </a>
						 
						 <a class=
						   "btn btn-danger btn-lg largeHeight once-only edit-total<?php echo $talent['talent_id']; ?>" value=""
						   role="button" id="btn3">Edit
						 </a>
						 
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					  </div>
					  
					</div>
				  </div>
				  
	<?php
	
	
}

?>
</div>

<script>
 <?php 
 
 foreach($events as $val) {
	 
		$talent = $val['talent'][0];

	 ?>
	 $(".btn_rejects<?php echo $talent['talent_id']; ?>").click(function()
	 {	
		var textbox_id2 = $(this).attr('textbox_id2');
		var textbox_val2 = $(textbox_id2).val();
		
		var ivalue = $(this).attr('ivalue');
		var ivalue = $(ivalue).val();
		//var textbx<?php echo $talent['talent_id']; ?> = $("#cout<?php echo $talent['talent_id']; ?>").val(); //alert(textbx<?php echo $talent['talent_id']; ?>); 
		checkoutnow<?php echo $talent['talent_id']; ?>(textbox_val2,ivalue);
		//$("#myModal").modal("hide");
	 });
	
  function checkoutnow<?php echo $talent['talent_id']; ?>(textbox_val2,ivalue){
		var ivalue = ivalue; 
		var talent_id = textbox_val2; 
		var event_id = <?php echo $event_id; ?>; 
		var client_id = <?php echo $myuser_id; ?>; //alert(client_id); die;
		
		var days = $( "#days<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
		var hours = $( "#hours<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
		var minutes = $( "#minutes<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
		
		
		var number_of_days = $("#total_days<?php echo $talent['talent_id']; ?>").val(); 
	
		var number_of_days_select = $( "#days<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
	
		var number_of_hours = $("#total_hrs<?php echo $talent['talent_id']; ?>").val(); 
	
		var number_of_hours_select = $( "#hours<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
	
		var number_of_minutes = $("#total_mins<?php echo $talent['talent_id']; ?>").val(); 
	
		var number_of_minutes_select = $( "#minutes<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
		
		
		if((number_of_days_select != "-") || (number_of_hours_select != "-") || (number_of_minutes_select != "-")) {
			var number_of_days = $( "#days<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
			var number_of_hours = $( "#hours<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
			var number_of_minutes =  $( "#minutes<?php echo $talent['talent_id']; ?> option:selected" ).val(); 
		}
		else {
			
			var number_of_days = $("#total_days<?php echo $talent['talent_id']; ?>").val(); 
			var number_of_hours = $("#total_hrs<?php echo $talent['talent_id']; ?>").val(); 
			var number_of_minutes = $("#total_mins<?php echo $talent['talent_id']; ?>").val(); 
		}
		
		var rating = $(".rating-id<?php echo $talent['talent_id']; ?>").val(); 
		
		var agent_id = "<?php echo $talent['agency']; ?>";
		if(agent_id == '') {
				var agent_id = 0;
			}
			else {
				var agent_id = agent_id; 
			}
		//alert(agent_id); die;
		
			var url = '<?php echo $webserviceurl; ?>index.php/talent_checkout';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id,'client_id':client_id,'number_of_days':number_of_days,'number_of_hours':number_of_hours,'number_of_minutes':number_of_minutes,'talent_rating':rating,'agent_id':agent_id},
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
						if((ivalue == '1') && (agent_id != 0)){
							make_payment(client_id,event_id);
						}
						else {
							location.reload();
						}
					}
				}
			
			});

	}
	
	function make_payment(client_id,event_id) {
		
		var url = '<?php echo $stripeurl; ?>agent_payment.php';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'event_id':event_id,'client_id':client_id},
				beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
				//'dataType': 'json',
				success: function(data) {
					//alert(data);
					if(data == 1) {
						location.reload();
					}
					else {
							$("#alertmsg").text("Your payment failed due to some reasons.Please contact us.");
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
				}
			
			});
	}
	 
	$(".rating-id<?php echo $talent['talent_id']; ?>").rating();
	
	$(function(){
		$(document).on("click", ".edit-total<?php echo $talent['talent_id']; ?>", function(event){
			$('.myForm').toggle();        
			$('.total').toggle(); 
			$("#days<?php echo $talent['talent_id']; ?>").val('-');
			$("#hours<?php echo $talent['talent_id']; ?>").val('-');
			$("#minutes<?php echo $talent['talent_id']; ?>").val('-');
			$(this).text(function(i, text){
				  return text === "Cancel" ? "Edit" : "Cancel";
			  })
		}); 
	});
	
 <?php } ?>
  
  </script>
<script>
 
  $(".btn_confirms").click(function()
	 {
		var textbox_id = $(this).attr('textbox_id');
		var textbox_val = $(textbox_id).val();
		
		var agent_id = $(this).attr('agent_id');
		var agent_id = $(agent_id).val();
		
		applytoevent(textbox_val,agent_id);
		$(this).attr('disabled', true);
		$(this).text('CheckedIn');
	 });
	
  function applytoevent(textbox_val,agent_id){
		var talent_id = textbox_val; 
		var event_id = <?php echo $event_id; ?>; 
		var client_id = <?php echo $myuser_id; ?>; 
			if(agent_id == '') {
				var agent_id = 0;
			}
			else {
				var agent_id = agent_id; 
			}
			
			var url = '<?php echo $webserviceurl; ?>index.php/talent_checkin';
			//alert(talent_id);alert(event_id);alert(client_id);alert(agent_id);alert(url); die;
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id,'client_id':client_id,'agent_id':agent_id},
				beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					if(message == "1") {
						window.location.reload();
					}
				}
			
			});

	}
	
	
  </script>
  
  <script>
  $(".se-pre-con").fadeOut("slow");
    /*$('.edit-total').click(function () { 
        $('#myForm').toggle();        
        $('#total-hours').toggle();        
    });*/
	
	
 
  </script>
  
  



