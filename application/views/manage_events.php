<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
include('client_header.php'); ?>
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
	
	$('#results').load("<?php echo base_url();?>index.php/manage_events/getblogdata/<?php echo $myuser_id ?>", {'group_no':track_load}, function() {track_load++;}); //load first group
	
	$(window).scroll(function() { //detect page scroll
		
		if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
		{
			
			if(track_load <= total_groups && loading==false) //there's more data to load
			{
				loading = true; //prevent further ajax loading
				$('.animation_image').show(); //show loading image
				
				//load data from the server using a HTTP POST request
				$.post('<?php echo base_url();?>index.php/manage_events/getblogdata/<?php echo $myuser_id ?>',{'group_no': track_load}, function(data){
									
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
    <div class="row">
      <!-- Start of white box -->
      <div class="col-sm-12 whiteBG invitebox topmargin">
        <div>
          <div class="row">
            <div class="col-xs-9">
              <ul id="tabs" class="nav nav-pills" data-tabs="tabs">
                <li class="active">
                  <a class="dashboard_tab bring-forward" href="#red" data-toggle="tab">Active
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

					<div class="" id="results">
						<div class="animation_image"  align="center" style="display:none">						
							<img src="<?php echo base_url();?>css/ajax-loader.gif" style="width:60px; height:60px;">				
						</div>
					</div>
					<?php 
						if($get_total_rows == 0) { ?>
							 <div class="col-md-12">
								<h4 class="text-center">You haven’t created any events yet. Please create your first event now</h4>
								 <p class="centerText">
									 <a class="btn btn-submit btn-lg largeHeight" href="<?php echo site_url();?>/create_event" role="button">Create event
									  </a>
								  </p>
							 </div>
						<?php }
					?>
					
				</div>
             
            </div>
            <div class="tab-pane" id="hired">
              
            </div>
          </div>
        </div>
      </div>
      <!-- End of white box -->
      
    </div>
	
  </div>
  <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('client_footer.php'); ?>
</body>
</html>
