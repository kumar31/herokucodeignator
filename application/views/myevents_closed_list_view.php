<div id="masonryWr" class="row" >
<style>
a {
    color: #000;
    text-decoration: none;
}
a:hover, a:focus {
	text-decoration: none;
	color: #D8BE2A;
}
</style>
<?php
				
foreach($events as $key=>$val)
{
 
		
	 ?>
		 <div class="person">
                <div class="row persona">
				
                  <div class="col-xs-4 col-sm-3 text-center">
                    <a href="<?php echo base_url();?>index.php/event_detail/<?php echo $val['event_id']; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $val['event_pic']; ?>"></a>
                  </div>
                  <div class="col-xs-8 col-sm-6">
                    <a href="<?php echo base_url();?>index.php/event_detail/<?php echo $val['event_id']; ?>"><h3><?php echo $val['event_name']; ?>
                    </h3></a>
                     <?php
						$startdatetime = $val['start_datetime'];
						$start_datetime = date('D dS M Y h:i A', strtotime($startdatetime));
						
						$enddatetime = $val['end_datetime'];
						$end_datetime = date('D dS M Y h:i A', strtotime($enddatetime));
					?>
                     <h4><?php echo $start_datetime; ?> - <?php echo $end_datetime; ?>
                    </h4>
                    <div class="row uppercase">
                      <div class="col-xs-12">
                        <p>
                          <span class=
                                "glyphicon glyphicon-pushpin">
                          </span><?php echo $val['location']; ?>
                        </p>
                      </div>
                     
                    </div>
                  </div>
                 <div class="col-xs-12 col-sm-3">
                    <div class="invitebutton">
                      <form role="form" method="POST" action="<?php echo base_url();?>index.php/event_detail">
                      <p class="centerText">
					  <input name="event_id" id="event_id" type="hidden" value="<?php echo $val['event_id']; ?>">
                         <button class="btn btn-submit btn-lg largeHeight" type="submit">View details</button>
                      </p>
					  </form>
					  <!--<p class="centerText btn-group-justified">
                        <a class=
                           "btn btn-danger btn-lg largeHeight" href=""
                           role="button">Invite talents
                        </a>
                      </p>-->
                    </div>
                  </div>
                </div>
                <hr>
              </div>  
	<?php
	
	
}

?>
</div>
