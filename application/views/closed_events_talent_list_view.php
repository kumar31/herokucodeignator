<div style="display: none;" class="se-pre-con"></div>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl();
		$stripeurl = $variableconfig->stripeurl(); 		
 ?>
<div id="masonryWr" class="row" >
<style>
.detail a {
    color: #000;
    text-decoration: none;
}
.detail a:hover, .detail a:focus {
	text-decoration: none;
	color: #D8BE2A;
}
.once-only {
	width: 200px;
}
</style>
<?php

foreach($invited_events as $key=>$val)
{
		
	 ?>
		 <div class="person">
                <div class="row persona">
				<?php
						
							$total_days = $val['checkin_details_talent'][0]['number_of_days'];
							$total_hrs = $val['checkin_details_talent'][0]['number_of_hours'];
							if($total_days != 0) {
								$total_hrs = $total_hrs + ($total_days * 24);
							}
							
							$total_mins = $val['checkin_details_talent'][0]['number_of_minutes'];
							
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
							   $per_talent_amt = round($per_talent_amt - $per_talent_percentage,2);
						?>
                  <div class="col-xs-4 col-sm-3 text-center">
                    <span class="detail"><a href="<?php echo base_url();?>index.php/event_detail_talent_closed/<?php echo $val['event_id']; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $val['event_details'][0]['event_pic']; ?>"></a></span>
                  </div>
                  <div class="col-xs-8 col-sm-6">
				  <?php
						
						////////////////////////////////// All talents amount ////////////////////////////////
						$deposit_amt = $val['client_paid_details'][0]['amount'];
						$launch_amt = $val['client_paid_details'][1]['amount'];
						$remain_amt = $val['client_paid_details'][2]['amount'];
						
						$deposit_launch_amt = $deposit_amt + $launch_amt + $remain_amt;
						
						$sum = 0;
						foreach($val['talents_agreed'] as $vals){
							$total_dayss = $vals['number_of_days'];
							$total_hrss = $vals['number_of_hours'];
							if($total_dayss != 0) {
								$total_hrss = $total_hrss + ($total_dayss * 24);
							}
							
							$total_minss = $vals['number_of_minutes'];
							
							$minss = round($total_minss/60 * 100);
							$hrs_minss = $total_hrss . "." . $minss;
							
							//$total_pay = $hrs_mins * 25;
							$this->db->select('*');
							$this->db->from('talent_hourly_pay');		
							$query = $this->db->get();
							$result = $query->result_array(); 
							$per_hours = $result[0]['per_hour'];
							$outfit_fees = $result[0]['outfit_fee'];
							$stripe_fees = $result[0]['stripe_fee'];
							
							$fees = $outfit_fees + $stripe_fees;
							
							$total_hours_ests = $hrs_minss;
							$per_talent_amts = "";
							
							$talent_id = $vals['talent_id'];
							
							$this->db->select('*');
							$this->db->where('talent_id',$talent_id);
							$this->db->from('talent_details');		
							$query = $this->db->get();
							$results = $query->result_array(); 
							$talent_amount = $results[0]['amount'];
							
							if($talent_amount == 0){
								$per_talent_amts = $per_talent_amts + ($total_hours_ests * $per_hours);
							}
							else {
								$per_talent_amts = $per_talent_amts + ($total_hours_ests * $talent_amount);
							}
							   $per_talent_percentages = ($fees / 100) * $per_talent_amts;
							   $sum+= $per_talent_amts; 
						}
						$sum;
						$all_talents_paid_details = $val['all_talents_paid_details'][0]['total_amount'];
						$balance_amt = $sum - $all_talents_paid_details;
						//print_r($val['talents_agreed']);
						
						if($sum > $deposit_launch_amt) {
							$retain_amt = $sum - $deposit_launch_amt;
							$bal = "1";
						}
						else {
							$bal = "2";
						}
						$client_stripe_id = $val['client_stripe_id'][0]['stripe_id'];
						$retain_amt;
						$checkin_details_talent = $val['checkin_details_talent'][0]['checkin_status'];
						$pay_status = $val['checkin_details_talent'][0]['payment_status'];
						$stripe_id = $talent_detail[0]['stripe_id'];
						
						if(($checkin_details_talent == "2") && ($pay_status == "0") && ($stripe_id != "") && ($bal == "2")) { ?>
							<!--<a class="btn btn-primary btn-sm once-only pull-right" value="<?php echo $val['event_id']; ?>" onclick="transfer('<?php echo $talent_detail[0]['bank_id']; ?>','<?php echo $talent_detail[0]['recp_id']; ?>','<?php echo $val['event_id']; ?>','<?php echo $val['client_id']; ?>','<?php echo $per_talent_amt; ?>','<?php echo $talent_detail[0]['agency']; ?>')"
							   role="button" id="btn-paid<?php echo $val['event_id']; ?>" >Get Payment $<?php echo $per_talent_amt; ?>
							 </a>-->
						<?php } ?>
						
						<?php
						if(($checkin_details_talent == "2") && ($pay_status == "0") && ($stripe_id != "") && ($bal == "1")) { ?>
							<!--<a class="btn btn-primary btn-sm once-only pull-right" value="<?php echo $val['event_id']; ?>" onclick="retainamt('<?php echo $retain_amt; ?>','<?php echo $val['event_id']; ?>','<?php echo $val['client_id']; ?>','<?php echo $client_stripe_id; ?>','<?php echo $talent_detail[0]['bank_id']; ?>','<?php echo $talent_detail[0]['recp_id']; ?>','<?php echo $val['event_id']; ?>','<?php echo $val['client_id']; ?>','<?php echo $per_talent_amt; ?>')"
							   role="button" id="btn-paid<?php echo $val['event_id']; ?>" >Get Payment $<?php echo $per_talent_amt; ?>
							 </a>-->
						<?php } ?>
						
						<?php
						if(($checkin_details_talent == "2") && ($pay_status == "0") && ($stripe_id == "")) { ?>
							<!--<a data-toggle="modal" data-target="#myModalgp" class="btn btn-primary btn-sm once-only pull-right" value="" 
							   role="button">Get Payment $<?php echo $per_talent_amt; ?>
							 </a>-->
						<?php } ?>
						
						<?php
						if($pay_status == "1") { ?>
							<b><p class="once-only pull-right text-success" value="" 
							   role="button" id="" disabled>Payment Transfered $<?php echo $val['talent_paid_details'][0]['amount']; ?>
							 </p></b>
						<?php } ?>
						
                    <span class="detail"><a href="<?php echo base_url();?>index.php/event_detail_talent_closed/<?php echo $val['event_id']; ?>"><h3><?php echo $val['event_details'][0]['event_name']; ?>
                    </h3></a></span>
						
                     <?php
						$startdatetime = $val['event_details'][0]['start_datetime'];
						$start_datetime = date('D dS M Y h:i A', strtotime($startdatetime));
						
						$enddatetime = $val['event_details'][0]['end_datetime'];
						$end_datetime = date('D dS M Y h:i A', strtotime($enddatetime));
					?>
                     <h4><?php echo $start_datetime; ?> - <?php echo $end_datetime; ?>
                    </h4>
                    <div class="row uppercase">
                      <div class="col-xs-12">
                        <p>
                          <span class=
                                "glyphicon glyphicon-pushpin">
                          </span><?php echo $val['event_details'][0]['location']; ?>
                        </p>
						<?php 
						
						$launch_status = $val['event_details'][0]['launch_status'];
						$checkin_details_talent = $val['checkin_details_talent'][0]['checkin_status'];

						?>
						
						<?php if(($launch_status == "1") && ($checkin_details_talent != "2") && ($pay_status != "1")) { ?>
							<p class="text-success">
							  <span class=
									"">
							  </span><b>Event Launched</b>
							</p>
						<?php } ?>
						
						<?php if($checkin_details_talent == "0") { ?>
							<p class="text-danger">
							  <span class=
									"">
							  </span><b>Checked In</b>
							</p>
						<?php } ?>
						
						<?php if(($checkin_details_talent == "1") && ($talent_detail[0]['agency'] == 0)) { ?>
							<p class="text-danger">
							  <span class=
									"">
							  </span><b>Check Timesheet</b>
							</p>
						<?php } ?>
						
						<?php if($checkin_details_talent == "3") { ?>
							<p class="text-danger">
							  <span class=
									"">
							  </span><b>Timesheet recheck status pending</b>
							</p>
						<?php } ?>
						
						<?php if($checkin_details_talent == "2" || ($pay_status == "1")) { ?>
							<p class="text-success">
							  <span class=
									"">
							  </span><b>Event complete, Invoice Sent, Payment is Processing</b>
							</p>
						<?php } ?>
						
                      </div>
                     
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-3">
                    <div class="invitebutton">
					<p class="centerText">
					 <a class="btn btn-danger btn-lg largeHeight once-only" href="<?php echo base_url();?>index.php/event_detail_talent_closed/<?php echo $val['event_id']; ?>"
						   role="button">View details</a>
					</p>
					
					<p class="centerText">
						<?php if(($checkin_details_talent == "3") && ($talent_detail[0]['agency'] == 0)) { ?>
							<a class="btn btn-submit btn-lg largeHeight once-only disabled" href="<?php echo base_url();?>index.php/talent_fill_timesheet/<?php echo $val['event_id']; ?>"
						   role="button">Check Timesheet</a>
					
						<?php } ?>
						
						<?php if(($checkin_details_talent == "1") && ($talent_detail[0]['agency'] == 0)) { ?>
							<a class="btn btn-submit btn-lg largeHeight once-only" href="<?php echo base_url();?>index.php/talent_fill_timesheet/<?php echo $val['event_id']; ?>"
							   role="button">Check Timesheet</a>
						<?php } ?>
						
						<?php if(($checkin_details_talent == "2") && ($talent_detail[0]['agency'] == 0)) { ?>
							<a class="btn btn-submit btn-lg largeHeight once-only disabled" href="<?php echo base_url();?>index.php/talent_fill_timesheet/<?php echo $val['event_id']; ?>"
							   role="button">Accepted Timesheet</a>
						<?php } ?>
					</p>
                      <!--<p class="">
					  <input type="hidden" value="<?php echo $val['event_id']; ?>" id="apply<?php echo $val['event_id']; ?>">			
							<a class=
                           "btn btn-submit btn-lg largeHeight once-only btn_confirms" value="<?php echo $val['event_id']; ?>"
                           role="button" id="btn1" textbox_id="#apply<?php echo $val['event_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;Accept&nbsp;&nbsp;&nbsp;&nbsp;
						 </a>
						<a role="button" class="btn btn-danger btn-lg largeHeight" data-toggle="modal" data-target="#myModal">&nbsp;&nbsp;&nbsp;Reject&nbsp;&nbsp;&nbsp;</a>
                      </p>-->
					   
                    </div>
                  </div>
                </div>
                <hr>
              </div>

			  <!-- Modal -->
			  <div class="modal fade" id="myModalgp" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Add account details to get payment</h4>
					</div>
					<div class="modal-body">
					<!--<div class="form-group">
					  <label for="rejectreason">Reject Reason</label>
					  <input type="text" class="form-control" id="rejectreason">
					</div>-->
									  
						<a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_rejects" href="<?php echo base_url();?>index.php/talent_update_payment_details/1"
					   role="button" id="">Add now
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
	
</script>
