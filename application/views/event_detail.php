<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<body>
<div class="se-pre-con"></div>
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
                    
                <?php echo $start_datetime;  ?> - <?php echo $end_datetime;  ?>
            </aside>
          </h1>
        </header>
        <div class="dashboard_tab_wrapper">
          <div class="dashboard_tab bring-forward clicked">
            <a href="#">Invitation
            </a>
          </div>
          <div class="dashboard_tab bring-forward">
            <a href="<?php echo base_url();?>index.php/client_proposals_pending/<?php echo $event_detail[0]['event_id']; ?>">Proposals
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
          <div class="row">
            <div class="col-xs-12 col-sm-8"> 
              <h3>Event Description
              </h3>
              <hr>
              <p><?php echo $event_detail[0]['description']; ?>
              </p>
              <br>
              <p><b>Location:</b> <?php echo $event_detail[0]['location']; ?>
              </p>
			  <p><b>Talent requested for:</b> <?php echo $event_detail[0]['talent_requested_for']; ?></p>
			  <p><b>Number of Guests:</b> <?php echo $event_detail[0]['number_of_guests']; ?>
              </p>
			  <p><b>Number of talent required:</b> <?php echo $event_detail[0]['number_of_waiters']; ?>
              </p>
			  <?php
				$uniform_provided = $event_detail[0]['uniform_provided'];
				if($uniform_provided == "0") {
					$uniform_provided = "No";
				}
				if($uniform_provided == "1") {
					$uniform_provided = "Yes";
				}
			  ?>
			  <p><b>Uniform Provided:</b> <?php echo $uniform_provided; ?>
              </p>
			  
			  <?php
				$uniform_code = $event_detail[0]['uniform'];
				if($uniform_code == "0") {
					$uniform_code = "None";
				}
				if($uniform_code == "1") {
					$uniform_code = "Black Tie";
				}
				if($uniform_code == "2") {
					$uniform_code = "White Shirt - Black Tie";
				}
				if($uniform_code == "3") {
					$uniform_code = "Custom";
				}
			  ?>
			  <p><b>Uniform Description:</b> <?php echo $uniform_code; ?>
              </p>
			  
			  <?php
				$custom_uniform = $event_detail[0]['uniform_description'];
				if($uniform_code == "Custom") {
					$custom_uniform = $event_detail[0]['uniform_description'];
				}
				else {
					$custom_uniform = "None";
				}
				
			  ?>
			  <p><b>Custom Uniform Description:</b> <?php echo $custom_uniform; ?>
              </p>
			  
            </div>
			
			<div class="col-xs-12 col-sm-4">
			<h3>Event Picture
              </h3>
              <hr>
				<img class="img-thumbnail" style="width: 230px; height: 150px;" src="<?php echo $event_detail[0]['event_pic']; ?>">
				<h3>Uniform
              </h3>
				<?php
				$uniform = $event_detail[0]['uniform'];
				if($uniform == "1") {
					$uniform = base_url().'img/Black%20tie.png';
				}
				if($uniform == "2") {
					$uniform = base_url().'img/White%20shirt%20black%20tie.png';
				}
				if($uniform == "3") {
					$uniform =  base_url().'img/custom%20outfit.png';
				}
			  ?>
				<p><img class="" style="height: 250px;" src="<?php echo $uniform; ?>">
				</p>
			</div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <h3>Posted by: <?php echo $event_detail[0]['event_contact']; ?> 
              </h3>
              <hr>
            </div>
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
		include('event_booking_info.php'); ?>
		
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

	</script>
</body>
</html>
