<div style="display: none;" class="se-pre-con"></div>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		
		$talent_id = $this->session->userdata('talent_id');
		if($talent_id == ''){
			$talent_id = $this->input->cookie('talent',true);
		}
 ?>
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
                    <span class="detail"><a href="<?php echo base_url();?>index.php/event_detail_talent_confirmed/<?php echo $val['event_id']; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $val['event_details'][0]['event_pic']; ?>"></a></span>
                  </div>
                  <div class="col-xs-8 col-sm-6">
                    <span class="detail"><a href="<?php echo base_url();?>index.php/event_detail_talent_confirmed/<?php echo $val['event_id']; ?>"><h3><?php echo $val['event_details'][0]['event_name']; ?>
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
						<p>
                          <span class=
                                "glyphicon glyphicon-phone">
                          </span><?php echo $val['event_details'][0]['event_contact']; ?>
                        </p>
                      </div>
                     
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-3">
                    <div class="invitebutton">
					<p class="centerText">
					 <a class="btn btn-danger btn-lg largeHeight once-only" href="<?php echo base_url();?>index.php/event_detail_talent_confirmed/<?php echo $val['event_id']; ?>"
						   role="button">View details</a>
					</p>
                      <p class="centerText">
					  <input type="hidden" value="<?php echo $val['event_id']; ?>" id="apply<?php echo $val['event_id']; ?>">			
							
						<a role="button" class="btn btn-submit btn-lg largeHeight once-only" data-toggle="modal" data-target="#myModal">&nbsp;&nbsp;&nbsp;Reject&nbsp;&nbsp;&nbsp;</a>
                      </p>
					   
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
					  <h4 class="modal-title">Reject</h4>
					</div>
					<div class="modal-body">
					 <!--<div class="form-group">
					  <label for="rejectreason">Reject Reason</label>
					  <input type="text" class="form-control" id="rejectreason">
					</div>-->
					<input type="hidden" value="<?php echo $val['event_id']; ?>" id="reject<?php echo $val['event_id']; ?>">					  
						<a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_rejects" value="<?php echo $val['event_id']; ?>"
					   role="button" id="btn2" textbox_id2="#reject<?php echo $val['event_id']; ?>">Reject
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
 
  $(".btn_rejects").click(function()
	 {
	  var textbox_id2 = $(this).attr('textbox_id2'); 
	  var textbox_val2 = $(textbox_id2).val(); 
	  rejectevent(textbox_val2); 
	  $(this).attr('disabled', true);
	  $(this).text('Rejected');
	  $(".btn_confirms").attr('disabled', true);
	 });
	 
	
  function rejectevent(textbox_val2){
		var talent_id = "<?php echo $talent_id;  ?>";
		var event_id = textbox_val2;
		//var reason = $("#rejectreason").val(); 
			
			var url = '<?php echo $webserviceurl; ?>index.php/reject_event_by_talent';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id},
				//'dataType': 'json',
				beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					if(message == "1") {
							window.location.reload();
						}
				}
			
			});

	}
  </script>
