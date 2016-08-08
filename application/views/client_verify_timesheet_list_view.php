 <div id="masonryWr" class="row" >

<?php
//print"<pre>";print_r($blogs);print"<pre>"; 
$myuser_id = $this->session->userdata('client_id'); 
$event_id = $this->uri->segment(3);
foreach($blogs as $key=>$val)
{
	
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
                <div class="col-xs-3 col-sm-3 text-center">
                  <img src="<?php echo $val['profile_url']; ?>">
                </div>
                <div class="col-xs-9 col-sm-6">
                  <h3><?php echo $val['first_name']; ?>
                  </h3>
                  <h4><?php echo $val['special_skills']; ?>
                  </h4>
                  <h4><?php echo $gender ?> - <?php echo $val['hair_color']; ?> hair, <?php echo $val['eye_color']; ?> eyes, <?php echo $val['height']; ?> ft
                  </h4>
                  <div class="row uppercase">
                    <div class="col-xs-6">
                      <p>
                        <span class=
                              "glyphicon glyphicon-pushpin">
                        </span><?php echo $val['city']; ?>
                      </p>
                    </div>
                    <div class="col-xs-6">
                      <p>
                        <span class=
                              "glyphicon glyphicon-thumbs-up">
                        </span><?php echo $val['review_count']; ?>
                        reviews - 100%
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-3"> 
                   <div class="checkbox checkbox-warning"> 
				   
                        <a class=
                           "btn btn-danger btn-lg largeHeight once-only btn_confirms" value="<?php echo base_url();?>index.php/client_timesheet_check/<?php echo $val['talent_id']; ?>"
                           role="button" id="btn1">Verify timesheet
						 </a>
						
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

