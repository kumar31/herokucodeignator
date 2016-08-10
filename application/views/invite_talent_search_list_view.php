<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>

<div id="masonryWr" class="row">

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

foreach($blogs as $key=>$val)
{
	$this->db->select('*');		
	$this->db->where('agent_id',$val['agency']);						
	$this->db->from('agent_details');
	$query = $this->db->get(); 
	$res = $query->result_array(); 
	
		$gender = $val['gender']; 
		if($val['gender'] == 1) {
			$gender = "Male";
		}
		if($val['gender'] == 0) {
			$gender = "Female";
		}
	 
	 ?>
		  <!-- single Person -->
	         <div id="person" class="person">
              <div class="row persona">
                <div class="col-xs-4 col-sm-3 text-center">
                  <a href="<?php echo base_url();?>index.php/talent_detail/<?php echo $val['talent_id']; ?>/<?php echo $event_id; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $val['profile_url']; ?>"></a>
                </div>
                <div class="col-xs-8 col-sm-6">
                  <a href="<?php echo base_url();?>index.php/talent_detail/<?php echo $val['talent_id']; ?>/<?php echo $event_id; ?>">
				  <h3><span class="text-capitalize"><?php echo $val['first_name']; ?></span> <?php echo $val['last_name']; ?>
                  </h3></a>
				  <?php if($val['reg_type'] == 3) { ?>
					  <span class="glyphicon glyphicon-user"></span>Contractor & Agent : <?php echo $res[0]['name']; ?>
				  <?php } elseif($val['reg_type'] == 2) {  ?>
				  <?php if($res[0]['name'] == "") { ?>
					  <span class="glyphicon glyphicon-user"></span>Contractor
				  <?php } } else { ?>
					  <span class="glyphicon glyphicon-user"></span>Agent : <?php echo $res[0]['name']; ?>
				  <?php }  ?>
				  
                  <h4 class="text-capitalize"><?php 
				  $spl_skills = explode(',',$val['special_skills']);
				  $count = count($spl_skills);
				  $skill = $count - 1;
				  foreach($spl_skills as $key=>$skills) {
					  if($key == $skill) {
						  echo $skills; 
					  }
					  else {
						   echo $skills.', ';
					  }
					  
					} ?>
                  </h4>
                  <h4 class="text-capitalize"><?php echo $gender ?> - <?php echo $val['hair_color']; ?> hair, <?php echo $val['eye_color']; ?> eyes, <?php echo $val['height']; ?> ft
                  </h4>
                  <div class="row uppercase">
                    <div class="col-xs-4">
                      <p>
                        <span class=
                              "glyphicon glyphicon-pushpin">
                        </span><?php echo $val['city']; ?>
                      </p>
                    </div>
					
                    <div class="col-xs-8">
                      <p>
					  <?php echo $val['total_events_attended']; ?>
                        <span class=
                              "glyphicon glyphicon-thumbs-up">
                        </span>
						
                       <p><span class="pull-left">Rating :</span>
						
							<ul class="list-inline list-unstyled list-active">
								<li><?php $rating_avg = $val['average_rating']; ?>
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
                   <div class="checkbox checkbox-warning"> 
				   <input type="hidden" value="<?php echo $val['talent_id']; ?>" id="apply<?php echo $val['talent_id']; ?>">
				   <input type="hidden" value="<?php echo $val['agency']; ?>" id="applyag<?php echo $val['agency']; ?>">
				   <?php 
						$invitedid = $val['invited_details'];
						if($invitedid == "0") { ?>
                         <a class=
                           "btn btn-submit btn-lg largeHeight once-only btn_confirms" value="<?php echo $val['talent_id']; ?>"
                           role="button" id="btn1" textbox_id="#apply<?php echo $val['talent_id']; ?>" agent_id="#applyag<?php echo $val['agency']; ?>">Invite
						 </a>
						 <?php } ?>
						 
						 <?php 
						 if($invitedid == "1") { ?>
                         <a class=
                           "btn btn-submit btn-lg largeHeight once-only btn_confirms disabled" value=""
                           role="button">Invited
						 </a>
						 <?php } ?>
						 
                    </div>
                </div>
              </div>
              <hr>
            </div>
			
            <!-- End of single person -->    
	<?php
		
	
}

?>
</div>

<script>
	//<?php echo $val['talent_id']; ?>	<?php echo $myuser_id; ?>   <?php echo $event_id; ?>
</script>

<script>
 
  $(".btn_confirms").click(function()
	 {
		var textbox_id = $(this).attr('textbox_id');
		var textbox_val = $(textbox_id).val();
		
		var agent_id = $(this).attr('agent_id');
		var agent_id = $(agent_id).val();
		
		applytoevent(textbox_val,agent_id);
		$(this).attr('disabled', true);
		$(this).text('Invite sent');
	 });
	
  function applytoevent(textbox_val,agent_id){
		var talent_id = textbox_val; 
		var event_id = <?php echo $event_id; ?>; 
		var client_id = <?php echo $myuser_id; ?>;
			if(agent_id == '') {
				var agent_id = 0;
			}
			else {
				var agent_id = agent_id; 
			}
		
			var url = '<?php echo $webserviceurl; ?>index.php/invite_talent';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id,'client_id':client_id,'agent_id':agent_id},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					if(message == "1") {
							
						}
					
				}
			
			});

	}
  </script>