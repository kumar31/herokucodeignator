<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<link rel="stylesheet" href="<?php echo base_url();?>css/assets/mobirise/css/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/assets/mobirise-gallery/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/assets/mobirise-slider/style.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/assets/mobirise/css/mbr-additional.css" type="text/css">
<style>
.mbr-after-navbar:before {
	height: 0px;
}
</style>
<body>
<div class="se-pre-con"></div>
  <div class="container">
    <div class="row orangehead">
      <div class="col-md-10">
        <header class="clearfix">
          <h1 class="event-title">Talent Details
            <!--<aside class="below">
              12th Jan 2017 6:00 PM - 13th Jan 2017 1:00 AM
            </aside>-->
          </h1>
        </header>
        
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- Start of white box -->
      <div class="col-sm-8 whiteBG invitebox topmargin">
        <div>
          <div class="row">
            <div class="col-xs-12 col-sm-8">
              <h3>About
              </h3>
              <hr> 
			  <?php $gender = $talent_detail[0]['gender']; 
				if($talent_detail[0]['gender'] == 1) {
					$gender = "Male";
				}
				if($talent_detail[0]['gender'] == 0) {
					$gender = "Female";
				} ?>
			   <div class="col-xs-12 col-sm-6">
				  <p><b>Name :</b> <?php echo $talent_detail[0]['first_name']; ?> <?php echo $talent_detail[0]['last_name']; ?></p> 
				  <!--<p><b>Phone Number :</b> <?php echo $talent_detail[0]['phone_number']; ?></p>
				  <?php $dob = $talent_detail[0]['dob']; 
						$dob = date("d/m/Y", strtotime($dob));
				  ?>
				  <p><b>D.O.B :</b> <?php echo $dob; ?></p>-->
				  <p><b>Address :</b> <?php echo $talent_detail[0]['address']; ?></p>
				  <p><b>Zipcode :</b> <?php echo $talent_detail[0]['zipcode']; ?></p>
				  <p><b>Company :</b> <?php echo $talent_detail[0]['company']; ?></p>
				  <p><b>Special skills :</b> <?php echo $talent_detail[0]['special_skills']; ?></p>
				  <p><b>Gender :</b> <?php echo $gender; ?></p>
				  <p><b>Hair color :</b> <?php echo $talent_detail[0]['hair_color']; ?></p>
				  <p><b>Eye color :</b> <?php echo $talent_detail[0]['eye_color']; ?></p>
              </div>
			  <div class="col-xs-12 col-sm-6">
				  <p><b>Height :</b> <?php echo $talent_detail[0]['height']; ?></p>
				  <p><b>Languages :</b> <?php echo $talent_detail[0]['languages']; ?></p>
				  <p><b>Experience :</b> <?php echo $talent_detail[0]['experience']; ?></p>
				  <!--<p><b>Timezone :</b> <?php echo $talent_detail[0]['timezone']; ?></p>
				  <p><b>Latitude :</b> <?php echo $talent_detail[0]['latitude']; ?></p>
				  <p><b>Longitude :</b> <?php echo $talent_detail[0]['longitude']; ?></p>-->
			  </div>
            </div>
			<?php $event_id = $this->uri->segment(3);  
				if($event_id != "") { ?>
					<div class="col-xs-3"> 
			   <div class="checkbox checkbox-warning"> 
			   <input type="hidden" value="<?php echo $talent_detail[0]['talent_id']; ?>" id="apply<?php echo $talent_detail[0]['talent_id']; ?>">
			   <input type="hidden" value="<?php echo $talent_detail[0]['agency']; ?>" id="applyag<?php echo $talent_detail[0]['agency']; ?>">
			   <?php 
				 $invitedid = $invited_details;
					if($invitedid == "0") { ?>
					<a class=
					   "btn btn-submit btn-lg largeHeight once-only btn_confirms" value="<?php echo $talent_detail[0]['talent_id']; ?>"
					   role="button" id="btn1" textbox_id="#apply<?php echo $talent_detail[0]['talent_id']; ?>" agent_id="#applyag<?php echo $talent_detail[0]['agency']; ?>">Invite
					 </a>
					 <?php } ?>
					 
					 <?php 
					 if($invitedid == "1") { ?>
					<a class=
					   "btn btn-submit btn-lg largeHeight once-only btn_confirms disabled" value="<?php echo $talent_detail[0]['talent_id']; ?>" 
					   role="button" id="btn1" textbox_id="#apply<?php echo $talent_detail[0]['talent_id']; ?>">Invited
					 </a>
					 <?php } ?>
					 
					 <?php $event_id = $this->uri->segment(3); ?>
					 <form role="form" method="POST" action="<?php echo base_url();?>index.php/invite_talent_search">
						 
						  <input name="event_id" id="event_id" type="hidden" value="<?php echo $event_id ?>"> 
							<a href="<?php echo base_url();?>index.php/invite_talent_search/<?php echo $event_id ?>" class="btn btn-danger btn-lg largeHeight" type="button">&nbsp;Back&nbsp;</a>
						 
						</form>
				</div>
				
			</div>
			<?php	}
			?>
			
			
          </div>
          <div class="row">
            <div class="col-xs-12">
              <!--<h3>Posted by: <?php echo $talent_detail[0]['first_name']; ?> <?php echo $talent_detail[0]['last_name']; ?>-->
              </h3>
			  <br>
              <hr>
            </div>
          </div>
        </div>
      </div>
      <!-- End of white box -->
      <div class="col-sm-4 listings-invitebar" style="padding-left: 15px">
	  
	  <h3>Photos
		  </h3>
		  <hr>
       <!-- <section class="clearfix whiteBG classWithPadLeft">
          
          <div class="row">
            <div class="col-xs-12">
              <h3>Profile photo
              </h3>
              <hr>
			   
			 <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="<?php echo $talent_detail[0]['profile_url']; ?>" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="<?php echo $talent_detail[0]['pic1']; ?>" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="<?php echo $talent_detail[0]['pic2']; ?>" alt="">
                </a>
            </div>
			
            </div>
          </div>
         
        </section>-->
		<section class="mbr-gallery mbr-section mbr-section--no-padding mbr-after-navbar clearfix" id="gallery2-3">
		
    <!-- Gallery -->
			<div class="mbr-section__container mbr-gallery-layout-article mbr-section__container--isolated" style="padding-top: 0px;">
				<div class=" col-sm-9 col-sm-offset-1">
					<div class="row mbr-gallery-row no-gutter">
						<?php
								$profile_pic = $talent_detail[0]['profile_url'];
								$pic1 = $talent_detail[0]['pic1'];
								$pic2 = $talent_detail[0]['pic2'];
								
								if($profile_pic != "") { ?>
									<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">
										<a href="#lb-gallery2-3" data-slide-to="0" data-toggle="modal">
											<img class="img-thumbnail" alt="" src="<?php echo $profile_pic; ?>">
											<span class="icon glyphicon glyphicon-zoom-in"></span>
										</a>              
									</div>
						<?php	}
						?>
						
						<?php if($pic1 != "") { ?>
						<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">

							<a href="#lb-gallery2-3" data-slide-to="1" data-toggle="modal">
								<img class="img-thumbnail" alt="" src="<?php echo $pic1; ?>">
								<span class="icon glyphicon glyphicon-zoom-in"></span>
							</a>              
						</div>
						<?php } ?>
						
						<?php if($pic2 != "") { ?>
						<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">

							<a href="#lb-gallery2-3" data-slide-to="2" data-toggle="modal">
								<img class="img-thumbnail" alt="" src="<?php echo $pic2; ?>">
								<span class="icon glyphicon glyphicon-zoom-in"></span>
							</a>              
						</div>
						<?php } ?>
						
						<?php if($pic2 != "") { ?>
						<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mbr-gallery-item">

							<a href="#lb-gallery2-3" data-slide-to="3" data-toggle="modal">
								<img class="img-thumbnail" alt="" src="<?php echo $pic2; ?>">
								<span class="icon glyphicon glyphicon-zoom-in"></span>
							</a>              
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>

			<!-- Lightbox -->
			<div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery2-3">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<ol class="carousel-indicators">
								<li data-app-prevent-settings="" data-target="#lb-gallery2-3" class=" active" data-slide-to="0"></li><li data-app-prevent-settings="" data-target="#lb-gallery2-3" data-slide-to="1"></li><li data-app-prevent-settings="" data-target="#lb-gallery2-3" data-slide-to="2"></li><li data-app-prevent-settings="" data-target="#lb-gallery2-3" data-slide-to="3"></li>
							</ol>
							<div class="carousel-inner">
							<?php if($profile_pic != "") { ?>
								<div class="item active">
									<img alt="" src="<?php echo $profile_pic; ?>">
								</div>
							<?php } ?>
							<?php if($pic1 != "") { ?>
								<div class="item">
									<img alt="" src="<?php echo $pic1; ?>">
								</div>
							<?php } ?>
							<?php if($pic2 != "") { ?>
								<div class="item">
									<img alt="" src="<?php echo $pic2; ?>">
								</div>
							<?php } ?>
							<?php if($pic2 != "") { ?>
								<div class="item">
									<img alt="" src="<?php echo $pic2; ?>">
								</div>
							<?php } ?>
							</div>
							<a class="left carousel-control" role="button" data-slide="prev" href="#lb-gallery2-3">
								<span class="fa fa-arrow-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" role="button" data-slide="next" href="#lb-gallery2-3">
								<span class="fa fa-arrow-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>

							<a class="close" href="#" role="button" data-dismiss="modal">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
								<span class="sr-only">Close</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
      </div>
	  
    </div>
  </div>
  <?php 
	error_reporting(0);
	include('client_footer.php'); ?>
	
	<script src="<?php echo base_url();?>css/assets/smooth-scroll/SmoothScroll.js"></script>
	<script src="<?php echo base_url();?>css/assets/masonry/masonry.pkgd.min.js"></script>
	<script src="<?php echo base_url();?>css/assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
	<script src="<?php echo base_url();?>css/assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
	<script src="<?php echo base_url();?>css/assets/mobirise/js/script.js"></script>
	<script src="<?php echo base_url();?>css/assets/mobirise-gallery/script.js"></script>
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
								window.location.assign("<?php echo base_url();?>index.php/invite_talent_search/"+event_id );
							}
						
					}
				
				});

		}
	  </script>
</body>
</html>
