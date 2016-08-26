<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<?php 

$items_per_group;
$get_total_rows;

$total_groups= ceil($get_total_rows/$items_per_group);	
?>

<script type="text/javascript">
$(document).ready(function() {
	var track_load = 0; //total loaded record group(s)
	var loading  = false; //to prevents multipal ajax loads
	var total_groups = <?=$total_groups;?>; //total record group(s)
	var get_total_rows = <?=$get_total_rows;?>;
	
	if(get_total_rows>0)
	{
		$('.animation_image').show(); 
	}
	else{
		
		$('.animation_image').hide();
	}
	$('#results').load("<?php echo base_url();?>index.php/client_proposals_applied/getblogdata/<?php echo $event_detail[0]['event_id']; ?>", {'group_no':track_load}, function() {track_load++;}); //load first group
	
	$(window).scroll(function() { //detect page scroll
		
		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		{
			
			if(track_load <= total_groups && loading==false) //there's more data to load
			{
				loading = true; //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				//load data from the server using a HTTP POST request
				$.post('<?php echo base_url();?>index.php/client_proposals_applied/getblogdata/<?php echo $event_detail[0]['event_id']; ?>',{'group_no': track_load}, function(data){
									
					$("#results").append(data); //append received data into the element

					//hide loading image
					$('.animation_image').hide(); //hide loading image once data is received
					
					track_load++; //loaded group increment
					loading = false; 
				
				}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
					
					alert(thrownError); //alert with HTTP error
					$('.animation_image').hide(); //hide loading image
					loading = false;
				
				});
				
			}
		}
	});
});
</script>
<body>
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
          <div class="dashboard_tab bring-forward">
            <a href="<?php echo base_url();?>index.php/event_detail/<?php echo $event_detail[0]['event_id']; ?>">Invitation
            </a>
          </div>
          <div class="dashboard_tab bring-forward clicked">
            <a href="#">Proposals
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
                  <a id="" data-toggle="modal" data-target="#myModald">Delete
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
            <div class="col-xs-9">
              <ul id="tabs" class="nav nav-pills" data-tabs="tabs">
                <li>
                  <a class="dashboard_tab bring-forward" href="<?php echo base_url();?>index.php/client_proposals_pending/<?php echo $event_detail[0]['event_id']; ?>">Pending
                  </a>
                </li>
                <li>
                  <a class="dashboard_tab bring-forward" href="<?php echo base_url();?>index.php/client_proposals_hired/<?php echo $event_detail[0]['event_id']; ?>">Hired
                  </a>
                </li>
				<li class="active">
                  <a class="dashboard_tab bring-forward" href="#">Applied
                  </a>
                </li>
				<!--<li>
                  <a class="dashboard_tab bring-forward" href="<?php echo base_url();?>index.php/client_verify_timesheet/<?php echo $event_detail[0]['event_id']; ?>">Timesheet
                  </a>
                </li>-->
              </ul>
              <div class="dashboard_tab_wrapper">
              </div>
            </div>
            <div class="col-xs-3">
              
            </div>
          </div>
          <hr>
          <!-- single Person -->
          <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="red">
              <div class="w-section inverse blog-grid">
					
					<div class="" id="results">
						
					</div>
					<div class="animation_image"  align="center" style="display:none">						
							<img src="<?php echo base_url();?>css/ajax-loader.gif" style="width:60px; height:60px;">						
					</div>
				</div> 
             
            </div>
            <div class="tab-pane" id="hired">
              
            </div>
          </div>
        </div>
		
		<!-- Modal -->
			  <div class="modal fade" id="myModald" role="dialog">
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
