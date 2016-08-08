<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$stripeurl = $variableconfig->stripeurl(); 
 ?>
<div id="masonryWr" class="row" >
<?php $myuserid = $this->session->userdata('client_id');  ?>

<?php

foreach($events as $key=>$val)
{
 
		
	 ?>
		 <div class="person">
                <div class="row persona">
                  <div class="col-xs-4 col-sm-3 text-center">
                    <img style="width: 120px; height: 120px;" src="<?php echo $val['event_pic']; ?>">
                  </div>
                  <div class="col-xs-8 col-sm-6">
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
                        <a href="<?php echo base_url();?>index.php/invite_talent_search/<?php echo $val['event_id']; ?>" class="btn btn-submit btn-lg largeHeight" type="button">Invite Talent</a>
                      </p>	
					</form>
					
                    </div>
                  </div>
                </div>
                <hr>
              </div>
				
			 <!-- Modal -->
			  <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Add card details to pay advance</h4>
					</div>
					<div class="modal-body">
					<!--<div class="form-group">
					  <label for="rejectreason">Reject Reason</label>
					  <input type="text" class="form-control" id="rejectreason">
					</div>-->
									  
						<a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_rejects" href="<?php echo base_url();?>index.php/client_update_payment_details/1"
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
 
  function applytopay(textbox_val,event_id,number_of_waiters){
	  var btn = "#btn-paid"+event_id;
	  $(btn).attr('disabled', true);
		var stripe_id = "<?php echo $stripe_id; ?>"; 
		var myuserid = "<?php echo $myuserid; ?>"; 
		var amount = textbox_val; 
		var no_of_talents_requested = number_of_waiters; 
			
			var url = '<?php echo $stripeurl; ?>payment_advance.php';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'stripe_id':stripe_id,'amount':amount,'event_id':event_id,'client_id':myuserid,'no_of_talents_requested':no_of_talents_requested},
				//'dataType': 'json',
				success: function(data) {
					
					if(data == 1) {
						window.location.reload();
					}
					
				}
			
			});

	}
  </script>