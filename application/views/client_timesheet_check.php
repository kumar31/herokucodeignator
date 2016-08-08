<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<body>
  <div class="container">
    <div class="row orangehead">
      <div class="col-md-10">
        <header class="clearfix">
          <h1 class="event-title"><?php echo $event_detail[0]['event_name']; ?>
            <aside class="below">
              <?php echo $event_detail[0]['start_datetime']; ?> - <?php echo $event_detail[0]['end_datetime']; ?>
            </aside>
          </h1>
        </header>
        <div class="dashboard_tab_wrapper">
          <div class="dashboard_tab bring-forward clicked">
            <a href="#">Invite
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
                  <a href="#">Project Details
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>index.php/edit_event/<?php echo $event_detail[0]['event_id']; ?>">Edit
                  </a>
                </li>
                <li>
                  <a id="" onClick="delevent();">Delete
                  </a>
                </li>
                <li role="separator" class="divider">
                </li>
                <li>
                  <a onClick="closeevent();">Close
                  </a>
                </li>
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
            <div class="col-xs-12"> 
              <h3>Review Timesheet for
              </h3>
              <hr>
              <p><?php echo $event_detail[0]['description']; ?>
              </p>
              <br>
              <p><b>Location:</b> <?php echo $event_detail[0]['location']; ?>
              </p>
			  <p><b>Number of Guests:</b> <?php echo $event_detail[0]['number_of_guests']; ?>
              </p>
			  <p><b>Number of waiters required:</b> <?php echo $event_detail[0]['number_of_waiters']; ?>
              </p>
			  
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <h3>Posted by: <?php echo $event_detail[0]['first_name']; ?>  <?php echo $event_detail[0]['last_name']; ?>  
              </h3>
              <hr>
            </div>
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

	</script>
</body>
</html>
