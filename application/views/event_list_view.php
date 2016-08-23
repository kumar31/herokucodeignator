<div style="display: none;" class="se-pre-con"></div>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		
		$talent_id = $this->session->userdata('talent_id');
		if($talent_id == ''){
			$talent_id = $this->input->cookie('talent',true);
		}
 ?>
<div id="masonryWr" class="row" >
<style>
.detail a {
    color: #000;
    text-decoration: none;
}
.detail a:hover, .detail a:focus {
	text-decoration: none;
	color: #F5A623;
}
.once-only {
	width: 130px;
}
</style>
<?php

foreach($events as $key=>$val)
{

		
	 ?>
		 <div class="person">
                <div class="row persona">
                  <div class="col-xs-4 col-sm-3 text-center"> 
                    <span class="detail"><a href="<?php echo base_url();?>index.php/event_detail_talent/<?php echo $val['event_id']; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $val['event_pic']; ?>"></a></span>
                  </div>
                  <div class="col-xs-8 col-sm-6">
                    <span class="detail"><a href="<?php echo base_url();?>index.php/event_detail_talent/<?php echo $val['event_id']; ?>"><h3><?php echo $val['event_name']; ?>
                    </h3></a></span>
                     <?php
						$startdatetime = $val['start_datetime'];
						$start_datetime = date('D dS M Y h:i A', strtotime($startdatetime));
						
						$enddatetime = $val['end_datetime'];
						$end_datetime = date('D dS M Y h:i A', strtotime($enddatetime));
						
					?>
					
                     <h4><?php echo $start_datetime; ?> - <?php echo $end_datetime; ?>
                    </h4>
					<?php 
						$datetime1 = new DateTime($start_datetime);
						$datetime2 = new DateTime($end_datetime);
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
						
						$this->db->select('*');		
						$this->db->where('talent_id',$talent_id);		
						$this->db->from('talent_details');
						$query = $this->db->get();
						$result = $query->result_array(); 
			
						$reg_type = $result[0]['reg_type'];
						
						$this->db->select('*');						
						$this->db->from('talent_hourly_pay');
						$query = $this->db->get();
						$res = $query->result_array(); 
						
						$this->db->select('*');	
						$this->db->where('agent_id',$result[0]['agency']);								
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
						$talent_amount = $result[0]['amount'];
						
						if($reg_type == 1) {
							$fee = $agent_outfit_fee + $stripe_fee;
							$per_hour = $employee_fee;
						}
						else {
							$fee = $outfit_fee + $stripe_fee;
							
						}
						if($talent_amount == 0){
							$per_talent_amt = $per_talent_amt + ($hrs_mins * $per_hour);
						}
						else {
							$per_talent_amt = $per_talent_amt + ($hrs_mins * $talent_amount);
						}
						$per_talent_percentage = ($fee / 100) * $per_talent_amt;
						$per_talent_earned_amt = round($per_talent_amt - $per_talent_percentage,2);
						
					?>
                    <div class="row uppercase">
                      <div class="col-xs-12">
                        <p>
                          <span class=
                                "glyphicon glyphicon-pushpin">
                          </span><?php echo $val['location']; ?>
                        </p>
						<p class="text-info">
                          <span class=
                                "glyphicon glyphicon-usd">
                          </span>Approximate pay is $<?php echo $per_talent_earned_amt; ?>
                        </p>
                      </div>
                     
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-3">
                    <div class="invitebutton">
					 
                      <p class="centerText">
					  <input type="hidden" value="<?php echo $val['event_id']; ?>" id="apply<?php echo $val['event_id']; ?>">
					   <?php 
							$invitedid = $val['invited_details'];
							$confirmed = $val['confirmed_details_event'];
						if(($invitedid == "0") && ($result[0]['bank_id'] != "")) { ?>
							<a class=
                           "btn btn-submit btn-lg largeHeight once-only btn_confirms" value="<?php echo $val['event_id']; ?>"
                           role="button" id="btn1" textbox_id="#apply<?php echo $val['event_id']; ?>">Apply
						 </a>
						<?php } ?>
						
						<?php 
						if($result[0]['bank_id'] == "") { ?>
							<a class=
                           "btn btn-submit btn-lg largeHeight once-only" value=""
                           role="button" id="" data-toggle="modal" data-target="#myModaladdcard">Apply
						 </a>
						<?php } ?>
						
						<?php 
						if($invitedid == "1") { ?>
							<a class=
                           "btn btn-submit btn-lg largeHeight once-only btn_confirms disabled" value="<?php echo $val['event_id']; ?>"
                           role="button" id="btn1" textbox_id="#apply<?php echo $val['event_id']; ?>">Applied
						 </a>
						<?php } ?>
						
						
						
                      </p>
					  <p class="centerText">
						 <a class="btn btn-danger btn-lg largeHeight once-only" href="<?php echo base_url();?>index.php/event_detail_talent/<?php echo $val['event_id']; ?>"
							   role="button">View details</a>
						</p>
                    </div>
                  </div>
                </div>
                <hr>
              </div>  
			  
			  <!-- Modal -->
			  <div class="modal fade" id="myModala" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Notification</h4>
					</div>
					<div class="modal-body">
					 <div class="form-group">
					  <label for="rejectreason">Already applied for an event this time.</label>
					</div>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
				  
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
					<p>Add account details to apply for events.</p>
					<a href="<?php echo base_url(); ?>index.php/talent_update_payment_details" type="button" class="btn btn-success">Add now</a>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
	<?php
	
	
}

?>
</div>

<script>
 
  $(".btn_confirms").click(function()
	 {
	  var textbox_id = $(this).attr('textbox_id');
	  var textbox_val = $(textbox_id).val();
	  applytoevent(textbox_val);
	  $(this).attr('disabled', true);
	  $(this).text('Applied');
	 });
	
  function applytoevent(textbox_val){
		var talent_id = "<?php echo $talent_id;  ?>";
		var event_id = textbox_val;
			
			var url = '<?php echo $webserviceurl; ?>index.php/talent_apply_event';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id},
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
							window.location.reload();
						}
					/*if(message == "0") {
							//window.location.reload();
							$('#myModala').modal('show');
						}*/
				}
			
			});

	}
	
	$('#myModala').on('hidden.bs.modal', function () {
		 location.reload();
		});
  </script>
