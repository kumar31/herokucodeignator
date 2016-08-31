<style>
.detail a {
    color: #000;
    text-decoration: none;
}
.detail a:hover, .detail a:focus {
	text-decoration: none;
	color: #D8BE2A;
}
</style>

<?php 

$event_id = $event_detail[0]['event_id'];

$query=$this->db->query("SELECT * from invite_talent_to_event WHERE status IN (1,3) AND client_id = ".$myuser_id." AND event_id = ".$event_id." ");			

$result = $query->result_array();

//print_r($my_events_list);
$is_advance_paid = $event_detail[0]['is_advance_paid'];			
?>

<div id="container">
   
	<!-- End of white box -->
      <div class="col-sm-4 topmargin listings-invitebar">
        <section class="clearfix whiteBG classWithPadLeft">
          <div class="">
            <form role="form" method="POST" action="<?php echo base_url();?>index.php/invite_talent_search">
			  <p class="centerText ">
			  <?php 
				$status = $event_detail[0]['launch_status'];
				
				$this->db->select('*');			
				$this->db->where('client_id',$myuser_id);					
				$this->db->from('client_details');
				$query = $this->db->get();			
				$results = $query->result_array(); 
				
				$stripe_id = $results[0]['stripe_id'];
				if(($status == 0) && ($stripe_id != "")) {
			  ?>
			  <input name="event_id" id="event_id" type="hidden" value="<?php echo $event_detail[0]['event_id']; ?>">
				<a href="<?php echo base_url();?>index.php/invite_talent_search/<?php echo $event_detail[0]['event_id']; ?>" class="btn btn-submit btn-lg btn-block largeHeight" type="submit">Invite Talent</a>
				<?php } ?>
				
				<?php 
					if(($status == 1) || ($stripe_id == "")) {
				?>
				<button class="btn btn-submit btn-lg btn-block largeHeight" type="submit" disabled>Invite Talent</button>
					<?php } ?>
			  </p>	
			</form>
          </div>
          <div class="text-center">
            <strong>Invite more talent members to your event 
            </strong>
          </div>
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
            <div class="col-xs-4">
              <h3 id="number"><?php echo $hired_info[0]['pending_count']; ?>  
              </h3>
              <span class="detail"><a href="<?php echo base_url();?>index.php/client_proposals_pending/<?php echo $event_detail[0]['event_id']; ?>"><p id="subtext">pending
              </p></a></span>
            </div>
            <div class="col-xs-4">
              <h3 id="number"><?php echo $hired_info[0]['hired_count']; ?>  
              </h3>
              <span class="detail"><a href="<?php echo base_url();?>index.php/client_proposals_hired/<?php echo $event_detail[0]['event_id']; ?>"><p id="subtext">hired
              </p></a></span>
            </div>
            <div class="col-xs-4">
			<?php 
				$hired_count = $hired_info[0]['hired_count'];
				$hired_amount = $hired_info[0]['total_amount'];
				if($hired_amount ==  "") {
					$hired_amount = "0";
				}
			?>
              <h3 data-placement="bottom" data-toggle="tooltip" title="This is the estimated price for your event based on the hours and numbers of talent needed." id="number">$<?php /*$total_hours_est = $hrs_mins;
			  $total_talents = $hired_info[0]['hired_count'];
			  $per_hour = $total_talents * 30;
			  $total_amt = $total_hours_est * $per_hour; echo $total_amt;*/
			  ?>
			  <?php
					$per_talent_earned_amt = "";
					foreach($result as $vals) {
						
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
			
				<?php 
					$launch_status = $event_detail[0]['launch_status'];
					
					if(($launch_status == 0) && ($hired_count != 0)) {
				?>
				<span title=""><a class="btn btn-danger btn-lg btn-block largeHeight" onClick="launchevent();" role="button">Launch Event</a></span>
					<?php } ?>
				<?php 
			
					if(($launch_status == 1) || ($hired_count == 0) ) {
				?>
				<button class="btn btn-danger btn-lg btn-block largeHeight" type="submit" disabled>Launch Event</button>
					<?php } ?>
					
			
            <!--<p class="centerText btn-group-justified">
              <a class=
                 "btn btn-book btn-lg largeHeight" href=""
                 role="button">BOOK NOW
              </a>
            </p>-->
          </div>
        </section>
      </div>
    
 
  </div><!-- #container -->
  
<script>
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
							window.location.assign("<?php echo base_url();?>index.php/management/"+event_id);
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