<div style="display: none;" class="se-pre-con"></div>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
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
//print"<pre>";print_r($blogs);print"<pre>"; 
$myuser_id = $this->session->userdata('client_id'); 
if($myuser_id == ''){
		$myuser_id = $this->input->cookie('client',true);
	}
$event_id = $this->uri->segment(3);
foreach($blogs as $key=>$val)
{
	$talent = $val['talent'][0];
	
		$gender = $talent['gender']; 
		if($talent['gender'] == 1) {
			$gender = "Male";
		}
		if($talent['gender'] == 0) {
			$gender = "Female";
		}
	 
	 ?>
		  <!-- single Person -->
	         <div id="person" class="person">
              <div class="row persona">
                <div class="col-xs-4 col-sm-3 text-center">
                  <a href="<?php echo base_url();?>/index.php/talent_detail/<?php echo $talent['talent_id']; ?>/<?php echo $event_id; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $talent['profile_url']; ?>"></a>
                  <!--<img src="<?php echo $talent['profile_url']; ?>">-->
                </div>
                <div class="col-xs-8 col-sm-6">
                  <a href="<?php echo base_url();?>/index.php/talent_detail/<?php echo $talent['talent_id']; ?>/<?php echo $event_id; ?>"><h3><?php echo $talent['first_name']; ?> <?php echo $talent['last_name']; ?>
                  </h3></a>
                  <h4><?php echo $talent['special_skills']; ?>
                  </h4>
                  <h4><?php echo $gender ?> - <?php echo $talent['hair_color']; ?> hair, <?php echo $talent['eye_color']; ?> eyes, <?php echo $talent['height']; ?> ft
                  </h4>
                  <div class="row uppercase">
                    <div class="col-xs-4">
                      <p>
                        <span class=
                              "glyphicon glyphicon-pushpin">
                        </span><?php echo $talent['city']; ?>
                      </p>
                    </div>
                    <div class="col-xs-8">
                      <p>
					  <?php echo $talent['total_events_attended']; ?>
                        <span class=
                              "glyphicon glyphicon-thumbs-up">
                        </span>
						
                       <p><span class="pull-left">Rating :</span>
						
							<ul class="list-inline list-unstyled list-active">
								<li><?php $rating_avg = $talent['average_rating']; ?>
								<?php 
									if($rating_avg == 0) { ?>
										&nbsp;<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 1) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 2) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 3) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 4) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star-empty"></span>
									<?php }
								?>
								
								<?php 
									if($rating_avg == 5) { ?>
										&nbsp;<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									<?php }
								?>
								  
								</li>
							</ul>
						</p>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-3"> 
					<?php 
						$launch_status = $event_detail[0]['launch_status'];
						if($launch_status == 0) {
					  ?>
                   <div class="checkbox checkbox-warning"> 
				   <input type="hidden" value="<?php echo $talent['talent_id']; ?>" id="apply<?php echo $talent['talent_id']; ?>">
				   
                        <a class=
                           "btn btn-submit btn-lg largeHeight once-only btn_confirms" value="<?php echo $talent['talent_id']; ?>"
                           role="button" id="btn1" textbox_id="#apply<?php echo $talent['talent_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 </a>
						<a role="button" class="btn btn-danger btn-lg largeHeight" data-toggle="modal" data-target="#myModal">&nbsp;&nbsp;&nbsp;&nbsp;Reject&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
					<?php } ?>
					
					<?php 
						if($launch_status == 1) {
					?>
					<div class="checkbox checkbox-warning"> 
				   <input type="hidden" value="<?php echo $talent['talent_id']; ?>" id="apply<?php echo $talent['talent_id']; ?>">
				   
                        <a class=
                           "btn btn-submit btn-lg largeHeight once-only btn_confirms" value="<?php echo $talent['talent_id']; ?>"
                           role="button" id="btn1" textbox_id="#apply<?php echo $talent['talent_id']; ?>" disabled>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hire&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 </a>
						<a role="button" class="btn btn-danger btn-lg largeHeight" disabled>&nbsp;&nbsp;&nbsp;&nbsp;Reject&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    </div>
						<?php } ?>
					
                </div>
              </div>
              <hr>
            </div>
            <!-- End of single person -->  
			
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
					<p>Are you sure ?</p>
					<input type="hidden" value="<?php echo $talent['talent_id']; ?>" id="reject<?php echo $talent['talent_id']; ?>">					  
						<a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_rejects" value="<?php echo $talent['talent_id']; ?>"
					   role="button" id="btn2" textbox_id2="#reject<?php echo $talent['talent_id']; ?>">Reject
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
 
  $(".btn_confirms").click(function()
	 {
		var textbox_id = $(this).attr('textbox_id');
		var textbox_val = $(textbox_id).val();
		applytoevent(textbox_val);
		$(this).attr('disabled', true);
		$(this).text('Hired');
	 });
	
  function applytoevent(textbox_val){
		var talent_id = textbox_val; 
		var event_id = <?php echo $event_id; ?>; 
		var client_id = <?php echo $myuser_id; ?>; 
			
			var url = '<?php echo $webserviceurl; ?>index.php/hire_by_client';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id,'client_id':client_id},
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
  
  <script>
 
  $(".btn_rejects").click(function()
	 {
		  var textbox_id2 = $(this).attr('textbox_id2'); 
		  var textbox_val2 = $(textbox_id2).val(); 
		  rejectevent(textbox_val2); 
		  $(this).attr('disabled', true);
		  $(this).text('Rejected');
		  $('#myModal').modal('hide');
	 });
	 
	
  function rejectevent(textbox_val2){
		var talent_id = textbox_val2; 
		var event_id = <?php echo $event_id; ?>; 
		var client_id = <?php echo $myuser_id; ?>; 
		var reason = $("#rejectreason").val();
			
			var url = '<?php echo $webserviceurl; ?>index.php/reject_talent_by_client';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id,'client_id':client_id,'client_reject_reason':reason},
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
