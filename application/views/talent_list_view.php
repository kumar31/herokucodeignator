<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		
		$client_id = $this->session->userdata('client_id');
		if($client_id == ''){
			$client_id = $this->input->cookie('client',true); 
		}
 ?>
<div id="masonryWr" class="row" >
 
<style>
a {
    color: #000;
    text-decoration: none;
}
a:hover, a:focus {
	text-decoration: none;
	color: #F5A623;
}
.tooltip.bottom .tooltip-arrow { 
	display: none;
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
                  <a href="<?php echo base_url();?>index.php/talent_detail/<?php echo $val['talent_id']; ?>"><img style="width: 120px; height: 120px;" src="<?php echo $val['profile_url']; ?>"></a>
                </div>
                <div class="col-xs-8 col-sm-6">
                  <a href="<?php echo base_url();?>index.php/talent_detail/<?php echo $val['talent_id']; ?>">
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
                  <h4 class="text-capitalize"><?php echo $val['special_skills']; ?>
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
				
				<div class="col-xs-4 hidden-sm hidden-md visible-xs">
					
				</div>
				
                <div class="col-xs-8 col-sm-3">
                   <div class="checkbox checkbox-warning">
                        <span data-toggle="tooltip" title="Selected talent gets auto invited on event creation"><input id="checkbox<?php echo $val['talent_id']; ?>" value="<?php echo $val['talent_id']; ?>" class="styled" type="checkbox">
                        <label for="checkbox<?php echo $val['talent_id']; ?>">
                            Add
                        </label></span>						
                    </div>
                </div>
              </div>
              <hr>
            </div>
            <!-- End of single person -->    
	<?php ?>
	<script>
	$("#checkbox<?php echo $val['talent_id']; ?>").change(function() {
		var ischecked = $(this).is(':checked');
		
		if(ischecked)
			//alert($(this).val());
			var talentid = $(this).val();
			add(talentid);
		if(!ischecked)
			//alert($(this).val());
			var talent_id = $(this).val();
			remove(talent_id);
	});
	</script>
	<?php
}

?>
</div>
<script>
	
	function add(talentid){
		var talent_id = talentid; 
		var client_id = <?php echo $client_id; ?>; 
			
			var url = '<?php echo $webserviceurl; ?>index.php/add_talents';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'client_id':client_id},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					
				}
			
			});

	}
	
	function remove(talent_id){
		var talent_id = talent_id; 
		var client_id = <?php echo $client_id; ?>; 
			
			var url = '<?php echo $webserviceurl; ?>index.php/uncheck_talents';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'client_id':client_id},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					
				}
			
			});

	}
	
	$('[data-toggle="tooltip"]').tooltip(); 
</script>
