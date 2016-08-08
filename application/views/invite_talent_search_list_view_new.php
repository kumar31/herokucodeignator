<div id="masonryWr" class="row" >


<?php

foreach($events as $key=>$val)
{
 
		
	 ?>
		 <div class="person">
                <div class="row persona">
                  <div class="col-xs-3 col-sm-3 text-center">
                    <img style="width: 120px; height: 120px;" src="<?php echo $val['event_pic']; ?>">
                  </div>
                  <div class="col-xs-9 col-sm-6">
                    <h3><?php echo $val['event_name']; ?>
                    </h3>
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
					<form role="form" method="POST" action="<?php echo base_url();?>index.php/invite_talent_search">
                      <p class="centerText">
					  <input name="event_id" id="event_id" type="hidden" value="<?php echo $val['event_id']; ?>">
                        <button class="btn btn-submit btn-lg largeHeight" type="submit">Invite Talent</button>
                      </p>	
					</form>
                    </div>
                  </div>
                </div>
                <hr>
              </div>  
	<?php
	
	
}

?>
</div>
