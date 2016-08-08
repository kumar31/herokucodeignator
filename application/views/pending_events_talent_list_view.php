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
	width: 130px;
}
</style>
<?php

foreach($invited_events as $key=>$val)
{
		
	 ?>
		 <div class="person">
                <div class="row persona">
                  <div class="col-xs-4 col-sm-3 text-center">
                    <span class="detail"><a href="<?php echo base_url();?>index.php/event_detail_talent_pending/<?php echo $val['event_id']; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $val['event_details'][0]['event_pic']; ?>"></a>
                  </div></span>
                  <div class="col-xs-8 col-sm-6">
                    <span class="detail"><a href="<?php echo base_url();?>index.php/event_detail_talent_pending/<?php echo $val['event_id']; ?>"><h3><?php echo $val['event_details'][0]['event_name']; ?>
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
                      </div>                     
                    </div>
                  </div>
				  
                  <div class="col-xs-12 col-sm-3">
                    <div class="invitebutton">
					<p class="centerText">
					 <a class="btn btn-submit btn-lg largeHeight once-only" href="<?php echo base_url();?>index.php/event_detail_talent_pending/<?php echo $val['event_id']; ?>"
						   role="button">View details</a>
					</p> 
					<p class="centerText">
					 <a class="btn btn-danger btn-lg largeHeight once-only" href=""
						   role="button" disabled>Pending</a>
					</p>                      
                    </div>
                  </div>
                </div>
                <hr>
              </div>

	<?php
	
	
}

?>
</div>
<script>
	
</script>


