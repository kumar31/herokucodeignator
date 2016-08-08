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
	
	$('#results').load("<?php echo base_url();?>index.php/client_verify_timesheet/getblogdata/<?php echo $event_detail[0]['event_id']; ?>", {'group_no':track_load}, function() {track_load++;}); //load first group
	
	$(window).scroll(function() { //detect page scroll
		
		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		{
			
			if(track_load <= total_groups && loading==false) //there's more data to load
			{
				loading = true; //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				//load data from the server using a HTTP POST request
				$.post('<?php echo base_url();?>index.php/client_verify_timesheet/getblogdata/<?php echo $event_detail[0]['event_id']; ?>',{'group_no': track_load}, function(data){
									
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
              <?php echo $event_detail[0]['start_datetime']; ?> - <?php echo $event_detail[0]['end_datetime']; ?>
            </aside>
          </h1>
        </header>
        <div class="dashboard_tab_wrapper">
          <div class="dashboard_tab bring-forward">
            <a href="<?php echo base_url();?>index.php/event_detail/<?php echo $event_detail[0]['event_id']; ?>">Invite
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
                  <a href="#">Project Details
                  </a>
                </li>
                <li>
                  <a href="<?php echo base_url();?>index.php/edit_event/<?php echo $event_detail[0]['event_id']; ?>">Edit
                  </a>
                </li>
                <li>
                  <a onClick="delevent();">Delete
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
				<li>
                  <a class="dashboard_tab bring-forward" href="<?php echo base_url();?>index.php/client_proposals_applied/<?php echo $event_detail[0]['event_id']; ?>">Applied
                  </a>
                </li>
				<li class="active">
                  <a class="dashboard_tab bring-forward" href="#">Timesheet
                  </a>
                </li>
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
					<div class="animation_image"  align="center">
						<div class="alert alert-info" align="center" style="display:none">
							<strong>loading..!</strong> 
						</div>
					</div>

					<div class="" id="results">
						
					</div>
				</div> 
             
            </div>
            <div class="tab-pane" id="hired">
              
            </div>
          </div>
        </div>
      </div>
      <!-- End of white box -->
      <div class="col-sm-4 topmargin listings-invitebar">
        <section class="clearfix whiteBG classWithPadLeft">
          <div class="">
            <form role="form" method="POST" action="<?php echo base_url();?>index.php/invite_talent_search">
			  <p class="centerText ">
			  <input name="event_id" id="event_id" type="hidden" value="<?php echo $event_detail[0]['event_id']; ?>">
				<button class="btn btn-submit btn-lg btn-block largeHeight" type="submit">Invite Talent</button>
			  </p>	
			</form>
          </div>
          <div class="text-center">
            <strong>Invite more talent members to your event 
            </strong>
          </div>
          <hr>
          <div class="row proposaldata">
            <div class="col-xs-4">
              <h3 id="number"><?php echo $hired_info[0]['pending_count']; ?>  
              </h3>
              <p id="subtext">pending
              </p>
            </div>
            <div class="col-xs-4">
              <h3 id="number"><?php echo $hired_info[0]['hired_count']; ?>  
              </h3>
              <p id="subtext">hired
              </p>
            </div>
            <div class="col-xs-4">
			<?php 
				$hired_amount = $hired_info[0]['total_amount'];
				if($hired_amount ==  "") {
					$hired_amount = "0";
				}
			?>
              <h3 id="number"><?php echo $hired_amount; ?>  
              </h3>
              <p id="subtext">estimated price
              </p>
            </div>
          </div>
          <div class="">
            <p class="centerText btn-group-justified">
              <a class=
                 "btn btn-book btn-lg largeHeight" href=""
                 role="button">BOOK NOW
              </a>
            </p>
          </div>
        </section>
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
