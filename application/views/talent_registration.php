<?php 
error_reporting(0);
include('reg_header.php'); ?>

	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId      : '1762686114002525', // Set YOUR APP ID
		  channelUrl : '<?php echo base_url();?>index.php/talent_registration', // Channel File
		  status     : true, // check login status
		  cookie     : true, // enable cookies to allow the server to access the session
		  xfbml      : true  // parse XFBML
		});
	 
		FB.Event.subscribe('auth.authResponseChange', function(response) 
		{
		 if (response.status === 'connected') 
		{
			document.getElementById("message").innerHTML +=  "<br>Connected to Facebook";
			//SUCCESS
	 
		}    
		else if (response.status === 'not_authorized') 
		{
			document.getElementById("message").innerHTML +=  "<br>Failed to Connect";
	 
			//FAILED
		} else 
		{
			document.getElementById("message").innerHTML +=  "<br>Logged Out";
	 
			//UNKNOWN ERROR
		}
		}); 
	 
		};
	 
		function Login()
		{
	 
			FB.login(function(response) {
			   if (response.authResponse) 
			   {
					getUserInfo();
				} else 
				{
				 console.log('User cancelled login or did not fully authorize.');
				}
			 },{scope: 'email,user_photos,user_videos'});
	 
		}
	 
	  function getUserInfo() {
	   
			FB.api('/me?fields=id,first_name,last_name,picture.width(800).height(800),email', function(response) {
				//alert(response.email);
				//'data': {'usertype':usertype,'email':response.email,'id':response.id,'first_name':response.first_name,'last_name':response.last_name,'url':response.picture.data.url},
				$("#inputEmail").val(response.email);
				$("#firstname").val(response.first_name);
				$("#lastname").val(response.last_name);
				$("#fb_img").attr('src', response.picture.data.url);
				$("#img_url").val(response.picture.data.url);
				$("#facebook_id").val(response.id);
	 
		});
	 
		}
		
		function Logout()
		{
			FB.logout(function(){document.location.reload();});
		}
	 
	  // Load the SDK asynchronously
	  (function(d){
		 var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement('script'); js.id = id; js.async = true;
		 js.src = "//connect.facebook.net/en_US/all.js";
		 ref.parentNode.insertBefore(js, ref);
	   }(document));
	 
	</script>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		
		$this->load->helper('cookie');
		$facebook_id = $this->input->cookie('facebook_id',true);
		$email = $this->input->cookie('email',true);
		$first_name = $this->input->cookie('first_name',true);
		$last_name = $this->input->cookie('last_name',true);
		$profile_url = $this->input->cookie('profile_url',true);
 ?>
<div style="display: none;" class="se-pre-con"></div>
  <div class="container whiteBG">
    <div class="main-content controller-job action-new">
      <div class="bg-fill widget-PostJob clearfix">
        <header class="clearfix text-center">
          <h1 class="text-danger">Sign up as talent
            <aside class="below">
              Apply to events - Start searching events in minutes
            </aside>
          </h1>
		   <h5 id="alertmsg" class="error_msg"></h5>
        </header>
        <hr>
		<div class="col-md-4">
			<img class="center-block" style="height: 280px;" src="<?php echo base_url();?>img/server transparent.png">
		</div>
		<div class="col-md-4">
		<form target="_top" data-toggle="validator" id="myForm" action="">
		<?php if($facebook_id == "") { ?>
			<div class="prepend-top clearfix form-group">
				<a style="cursor: pointer;" role="button" onclick="Login();"><img class="center-block" src="<?php echo base_url(); ?>img/fb-logo-signup.png"></a>
			</div>
			<?php
		} ?>
		
		<div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-6 gutter-bottom">
                <label for="" class="required">First Name
                </label>
                <input placeholder="First Name" value="<?php echo $first_name; ?>" class="form-control " name="" id="firstname" type="text" maxlength="40" required> 
              </div>
              <div class="col-xs-12 col-sm-6 gutter-bottom">
                <label for="" class="required">Last Name
                </label>
                <input placeholder="Last Name" value="<?php echo $last_name; ?>" class="form-control" name="" id="lastname" type="text" maxlength="100">                    
              </div>
            </div>
          </div>
		  
		  <input type="hidden" value="<?php echo $facebook_id; ?>" class="form-control " name="" id="facebook_id" type="text">
		  
		  <input type="hidden" value="<?php echo $profile['date']; ?>" class="form-control " name="" id="date" type="text"> 
		  
          <div class="prepend-top form-group">
		  <label for="" class="required">Profile Picture
                </label> 
			<?php	
					if($profile_url != "") { ?>
						<img class="img-circle center-block" style="width: 120px; height: 120px;" src="<?php echo $profile_url; ?>">
						<br>
					<?php	} 
					else { ?>
					<img class="img-circle center-block pimg" id="fb_img" style="width: 120px; height: 120px;" src="<?php getenv( 'SOIREE_BASE_URL' ) ?>/nectorimg/default-profile.png">
					<br>
				<?php				
				}
				?>
           <input class="form-control my-form-control" type='file' id="upload" />
			<?php if($profile_url != "") { ?>
				<input value="<?php echo $profile_url; ?>" type='hidden' id="img_url" />
		   <?php } else { ?>
			   <input value="" type='hidden' id="img_url" />
		   <?php } ?>
          </div>
		  
		  <div class="prepend-top form-group">
            <label class="pull-left required" for="inputEmail">Email address
            </label>
            <input placeholder="Email" value="<?php echo $email; ?>" class="form-control" id="inputEmail" type="email" value="" required>
			 <div class="help-block with-errors"></div>
          </div>
		  
         <div class="prepend-top form-group">
            <label class="pull-left" for="">Phone <span style="color: gray;">(exclude +1)</span>
            </label>
            <input placeholder="Phone" class="form-control " name="" id="phone" type="tel" required>
          </div>
		  
		  <div class="prepend-top form-group">
            <label class="pull-left" for="">D.O.B
            </label>
            <input class="form-control" name="" id="dob" type="date" onkeydown="return false" placeholder="DD-MM-YY">
          </div>
          
          <!--<div class="form-group prepend-top">
            <label class="" for="Projects_title">Company
            </label>
            <input placeholder="Company" class="form-control" name="" id="company" type="text" maxlength="85" value="">
          </div>-->
		  
		  <div class="form-group">
			<label for="inputPassword" class="control-label">Password</label>
			<div class="form-group">
			  <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
			  <div class="help-block">Minimum of 6 characters</div>
			</div>
			<div class="form-group">
			  <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
			  <div class="help-block with-errors"></div>
			</div>
			</div>
			
			<div class="prepend-top clearfix form-group"> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">Address
                </label>
                <div class='input input-positioned'>
                  <input placeholder="55 W 138th St, New York, NY 10037, USA" id="addresspicker_map" class="form-control" name="" required/>   
                  <br/>
                  <div id="addressdetails">
                    
                    <!--<label>Postal Code: 
                    </label> -->
                    <input type="hidden" id="postal_code" disabled=disabled> 
                   
                    <!--<label>Lat:      
                    </label> -->
                    <input type="hidden" value="<?php echo $profile['latitude']; ?>" id="lat" disabled=disabled> 
                    
                    <!--<label>Lng:      
                    </label> -->
                    <input type="hidden" value="<?php echo $profile['longitude']; ?>" id="lng" disabled=disabled> 
                    
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">Map Preview
                </label>
                <div class='map-wrapper map-control'>
                  <label id="geo_label" for="reverseGeocode"></label>
					<select style="visibility: hidden" id="reverseGeocode">
					<option value="false"></option>
					<option value="true" selected></option>
					</select> 
                  <div id="map">
                  </div>
                  <div id="legend">You can drag and drop the marker to the correct location
                  </div>
                </div>
              </div>
            </div>
          </div>
			
			<div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">Register Type
			  </label>    
			</div>
			<div class="form-group">
				<div class="radio">
				  <label>
					<input type="radio" checked="checked" id="contract" name="reg_type" value="2" required>
					Contractor <span data-placement="right" data-toggle="tooltip" 
					title="I will handle my own tax and have my own insurance." class="glyphicon glyphicon-question-sign"></span>
				  </label>
				</div>
				<div class="radio">
				  <label>
					<input type="radio" name="reg_type" id="emp" value="1" required>
					Employee <span data-placement="right" data-toggle="tooltip" title="I want to be treated as an employee and have a third party agent handle my tax and insurance." class="glyphicon glyphicon-question-sign"></span>
				  </label>
				</div>
				<div class="radio">
				  <label>
					<input type="radio" name="reg_type" id="both" value="3" required>
					Both
				  </label>
				</div>
				
			</div>
		  </div>
		  
			<div class="prepend-top form-group contract">
			  <label for="" class="required">Upload W9 form <span data-placement="right" data-toggle="tooltip" title="W9 is used (in the US income tax system) by a third party who must file an information return with the IRS. It requests the name, address, and taxpayer identification information such as their social security (or Employment) identification number." class="glyphicon glyphicon-question-sign"></span>
				</label> 
				<h5 style="color: red;" id="agreemessage"></h5>
			   <input class="form-control" type='file' id="uploadw9" />
			   <span class="detail"><a href="<?php getenv( 'SOIREE_BASE_URL' ) ?>/nectorimg/w9.pdf" target="_blank">How to fill out the W9 form?</a></span>
			   <span class="detail pull-right"><a href="http://signw9.com/" target="_blank">www.signw9.com</a></span> 
				<input type='hidden' id="img_urlw9" /> 
			</div>
			<?php
				$this->db->select('*');		
				$this->db->where('status',1);
				$this->db->where('bank_id !=',"");
				$this->db->where('recp_id !=',"");
				$this->db->from('agent_details');
				$query = $this->db->get();
				$result = $query->result_array(); 
			?>
			
			<div class="form-group prepend-top emp">
            <label class="" for="">Agency
            </label>
            <select class="col-xs-12 form-control form-group" name="" id="agency" >
				<option value="0">Select here</option>
				<?php
					$i=1;
					foreach($result as $val){ 
					if($i==1){ ?>
						<option value="<?php echo $val['agent_id']; ?>"><?php echo $val['name']; ?></option>
					<?php } else { ?>
						<option value="<?php echo $val['agent_id']; ?>"><?php echo $val['name']; ?></option>
					<?php } $i++; } ?>
              
            </select>
			</div>
			
			<div class="prepend-top form-group emp w4i9">
			<label> Upload W4 form</label>
			<!--  <label for="" class="required">Upload W9 form <span data-placement="right" data-toggle="tooltip" title="W9 is used (in the US income tax system) by a third party who must file an information return with the IRS. It requests the name, address, and taxpayer identification information such as their social security (or Employment) identification number." class="glyphicon glyphicon-question-sign"></span>
				</label> -->
				<h5 style="color: red;" id="agreemessagew4"></h5>
			   <input class="form-control" type='file' id="uploadw4" />
			   <span class="detail"><a type="" class="" data-toggle="modal" data-target="#myModalw4" href="" target="_blank">How to fill out the W4 form?</a></span>
			   <!--<span class="detail pull-right"><a href="http://signw9.com/" target="_blank">www.signw9.com</a></span> -->
				<input type='hidden' id="img_urlw4" /> 
			</div>
		  
			<div class="prepend-top form-group emp w4i9">
			<label> Upload i9 form</label> 
			<!--  <label for="" class="required">Upload W9 form <span data-placement="right" data-toggle="tooltip" title="W9 is used (in the US income tax system) by a third party who must file an information return with the IRS. It requests the name, address, and taxpayer identification information such as their social security (or Employment) identification number." class="glyphicon glyphicon-question-sign"></span>
				</label> -->
				<h5 style="color: red;" id="agreemessagei9"></h5>
			   <input class="form-control" type='file' id="uploadi9" />
			   <span class="detail"><a type="" class="" data-toggle="modal" data-target="#myModali9" href="" target="_blank">How to fill out the i9 form?</a></span>
			   <!--<span class="detail pull-right"><a href="http://signw9.com/" target="_blank">www.signw9.com</a></span> -->
				<input type='hidden' id="img_urli9" /> 
			</div>
			
			<div class="prepend-top emp">
				<div class="form-group">
				  <label class="pull-left" for="">
				  </label>    
				</div>
				<div class="form-group">
					<div class="checkbox">
					  <label>
						<input type="checkbox" name="already" id="already" value="1" required>
						I have already signed these forms at my agency
					  </label>
					</div>
				  </div>
			  </div> 
			
		  <div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">Special Skills
			  </label>    
			</div>
			<div class="form-group">
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="skills" value="bartending" required>
					Bartender
				  </label>
				</div>
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="skills" value="waiter,waitress" required>
					Waiter/waitress
				  </label>
				</div>
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="skills" value="personality,host" required>
					Personality/Host
				  </label>
				</div>
			  </div>
		  </div>
		  
		  <div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">Gender
			  </label>    
			</div>
			<div class="form-group">
				<div class="radio">
				  <label>
					<input type="radio" name="gender" value="1" required>
					Male
				  </label>
				</div>
				<div class="radio">
				  <label>
					<input type="radio" name="gender" value="0" required>
					Female
				  </label>
				</div>
				<div class="radio">
				  <label>
					<input type="radio" name="gender" value="2" required>
					Other
				  </label>
				</div>
			  </div>
		  </div>
		  
		  <div class="row">
			<div class="col-xs-3">
			</div>
			<div class="form-group col-xs-5">
			 
				<button id="submit" name="submit" type="button" class="btn btn-block btn-danger btn-md largeHeight">SIGNUP</button>
			 
			</div>
			<div class="col-xs-2">
			</div>
		  </div>
	  
		  </div>         
      </div>  
	  
      <!-- Modal W4 -->
		<div id="myModali9" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">How to fill out i9 online</h4>
			  </div>
			  <div class="modal-body">
				<ol>
					<li>Go to <a href="http://www.i9-form.net/" target="_blank"> http://www.i9-form.net/ </a></li>
					<li>Insert your full name and the email you wish to receive your i9 form to.</li>
					<li>Scroll down and fill in all the required fields.</li>
					<li>Digitally sign the document and click submit signature.</li>
					<li>Go to your email and click on the link provided.</li>
					<li>On the right hand side, click on PDF download.</li>
					<li>Save it to your computer and then upload the form on Outfit.</li>
				</ol>
				<p><b>Please note – you DO NOT need to fill out the employer information.</b></p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
		
		<!-- Modal i9 -->
		<div id="myModalw4" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">How to fill out w4 online</h4>
			  </div>
			  <div class="modal-body">
				<ol>
					<li>Go to <a href="https://www.pdffiller.com/6964040-fillable-2016-w-4-forms-irs" target="_blank"> https://www.pdffiller.com/6964040-fillable-2016-w-4-forms-irs </a></li>
					<li>Click fill online.</li>
					<li>Fill out the required fields.</li>
					<li>Click this link to watch a video if you are unsure on how to fill out some fields: <a href="https://www.youtube.com/watch?v=eVK7sl_SdSw" target="_blank">https://www.youtube.com/watch?v=eVK7sl_SdSw</a></li>
					<li>To sign the form you simply click ‘Sign’ up top and insert on the correct field.</li>
					<li>Once completed click ‘Done’ top right and save it to your computer.</li>
					<li>Upload the form on Outfit.</li>
				</ol>
				<p><b>Please note – you DO NOT need to fill out the employer information.</b></p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>

		  </div>
		</div>
		
      <!-- End demo -->
    </div>
    </div>
    </form>
	<form id="talentlogin" action="<?php echo base_url();?>index.php/talent_dashboard" method="POST">
		<input type="hidden" name="my_userid" id="talid"> 
	  </form>
  <!-- Footer Start -->
  <div class="container">
    <hr>
    <footer>
      <p>&copy; Outfit 2016
      </p>
    </footer>
  </div> 
  <!-- /container -->        
  <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js">
  </script>
  <script src="<?php echo base_url(); ?>js/main.js">
  </script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
  </script>
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js">
  </script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <script src="<?php echo base_url(); ?>js/validator.js"></script>
 
  <!-- Map Scripts -->
  <script>
  
    $(function() {
      var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
        componentsFilter: 'country:US',
        regionBias: "us",
        language: "en",
        bounds: '40.6952494,-74.0560769|40.8351094,-73.8695212',
        updateCallback: showCallback,
        mapOptions: {
          zoom: 11,
          center: new google.maps.LatLng(40.7830603, -73.97124880000001),
          scrollwheel: false,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        ,
        elements: {
          map:      "#map",
          lat:      "#lat",
          lng:      "#lng",
          street_number: '#street_number',
          route: '#route',
          locality: '#locality',
          sublocality: '#sublocality',
          administrative_area_level_3: '#administrative_area_level_3',
          administrative_area_level_2: '#administrative_area_level_2',
          administrative_area_level_1: '#administrative_area_level_1',
          country:  '#country',
          postal_code: '#postal_code',
          type:    '#type'
        }
      }
                                                                    );
      var gmarker = addresspickerMap.addresspicker( "marker");
      gmarker.setVisible(true);
      addresspickerMap.addresspicker( "updatePosition");
      // $('#reverseGeocode').change(function(){
			$("#addresspicker_map").addresspicker("option", "reverseGeocode", ($('#reverseGeocode').val() === 'true'));
      // });
      function showCallback(geocodeResult, parsedGeocodeResult){
        $('#callback_result').text(JSON.stringify(parsedGeocodeResult, null, 4));
      }
      // Update zoom field
      var map = $("#addresspicker_map").addresspicker("map");
      google.maps.event.addListener(map, 'idle', function(){
        $('#zoom').val(map.getZoom());
      }
                                   );
    }
     );
  </script>
  <script>
  $('#myForm').validator();
  
  $('[data-toggle="tooltip"]').tooltip();   
  </script>
  
  <script>
		$(".emp").hide();
		$("#emp").click(function() {
			$( ".emp" ).show();
			$( ".contract" ).hide();
			if($("#already").is(':checked')){
				$(".w4i9").hide();				
			}
		});
		$("#contract").click(function() {
			$( ".emp" ).hide();
			$( ".contract" ).show();
		});
		$("#both").click(function() {
			$( ".emp" ).show();
			$( ".contract" ).show();
			if($("#already").is(':checked')){
				$(".w4i9").hide();				
			}
		});
		
		$('#already').click(function() {
			$(".w4i9").toggle();		
		});
		$( "#submit" ).click(function() {
			
			var reg_type = $("input[name='reg_type']:checked").val();
			
			if(typeof reg_type === "undefined") {
				var reg_type = ''; 
			}
			else {
				var reg_type = $("input[name='reg_type']:checked").val();
			}
			if(reg_type == '2'){
				
				if (($("#img_urlw9").val()) == "") {
				   var agreemessage = "You must upload w9form";
				   $("#agreemessage").text(agreemessage);
				}
				else {
					$("#agreemessage").hide();
					reg();
				}
			
			}
			
			if(reg_type == '1'){
				
				commonvalidation();
				
				if ((($("#img_urli9").val()) != "") && (($("#img_urlw4").val()) != "")) {
					reg();
				}
				
			}
			
			if(reg_type == '3'){
				
				if (($("#img_urlw9").val()) == "") {
				   var agreemessage = "You must upload w9form";
				   $("#agreemessage").text(agreemessage);
				}
				else {
					$("#agreemessage").hide();
				}
				
				commonvalidation();
				
				if ((($("#img_urli9").val()) != "") && (($("#img_urlw4").val()) != "") && (($("#img_urlw9").val()) != "")) {
					reg();
				}
			}
			
		});
		function commonvalidation(){
			
			if($("#already").is(':checked')){
				$("#agreemessagei9").hide();
				$("#agreemessagew4").hide(); 
				reg();
			}
			else
			{		
					$("#agreemessagei9").show();
					$("#agreemessagew4").show();
					if (($("#img_urli9").val()) == "") {
					   var agreemessagei9 = "You must upload i9form";
					   $("#agreemessagei9").text(agreemessagei9);
					}
					else {
						$("#agreemessagei9").hide();
						
					}
					if (($("#img_urlw4").val()) == "") {
					   var agreemessagew4 = "You must upload w4form";
					   $("#agreemessagew4").text(agreemessagew4);
					}
					else {
						$("#agreemessagew4").hide();
						
					}
			}  
			
			
			
		}
		function reg(){
			
			var email = $("#inputEmail").val();
			var password = $("#inputPassword").val();
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var phone = $("#phone").val();
			var company = $("#company").val();
			var address = $("#addresspicker_map").val(); 
			var dob = $("#dob").val(); 
			var profile_url = $("#img_url").val(); 
			var w9_form = $("#img_urlw9").val(); 
			var w4_form = $("#img_urlw4").val(); 
			var i9_form = $("#img_urli9").val(); 
			var lat = $("#lat").val();
			var lng = $("#lng").val();
			var facebook_id = $("#facebook_id").val();
			//var login_type = $("#login_type").val();
			var date = $("#date").val();
			var skills = $("input[name='skills']:checked").map( function() {
				return this.value;
			}).get().join(",");
					
			var gender = $("input[name='gender']:checked").val();
			
			if(typeof gender === "undefined") {
				var gender = ''; 
			}
			else {
				var gender = $("input[name='gender']:checked").val();
			}
			
			var reg_type = $("input[name='reg_type']:checked").val();
			
			if(reg_type == "2") {
				var agency = 0;
			}
			else {
				var agency = $( "#agency option:selected" ).val(); 
			}
			
			if(typeof reg_type === "undefined") {
				var reg_type = ''; 
			}
			else {
				var reg_type = $("input[name='reg_type']:checked").val();
			}
			
				var url = '<?php echo $webserviceurl; ?>index.php/talent_registration';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'email':email,'password':password,'first_name':firstname,'last_name':lastname,'phone_number':phone,
					'gender':gender,'address':address,'dob':dob,'profile_url':profile_url,'w9_form':w9_form,'w4_form':w4_form,
					'i9_form':i9_form,'special_skills':skills,'latitude':lat,'longitude':lng,'longitude':lng,'longitude':lng,'longitude':lng,
					'facebook_id':facebook_id,'date':date,'reg_type':reg_type,'agency':agency}, 
					//'dataType': 'json',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {
							var talentid = JSON.stringify(data['result']);
							var talentid = talentid.replace(/\"/g, ""); 
							$('#talid').val(talentid);
							$( "#talentlogin" ).submit();
							//window.location.assign("<?php echo base_url();?>index.php/talent_dashboard/"+talentid);
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							var alertmessage = alertmessage.replace(/\"/g, "");
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}


	</script>
	
	<script>
	$('#upload').on('change', function() { 
		var file_data = $('#upload').prop('files')[0];   
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		//alert(form_data);                             
		$.ajax({
					url: '<?php echo base_url(); ?>index.php/upload', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(php_script_response){
						//alert(php_script_response); // display response from the PHP script, if any
					$('.pimg').attr('src', php_script_response);
					$('#img_url').val(php_script_response);
			 
						}
		 });
	});
	
	$('#uploadw9').on('change', function() { 
		var file_data = $('#uploadw9').prop('files')[0];   
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		//alert(form_data);                             
		$.ajax({
					url: '<?php echo base_url(); ?>index.php/uploaddoc', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(php_script_response){
						//alert(php_script_response); // display response from the PHP script, if any
					
					$('#img_urlw9').val(php_script_response);
			 
						}
		 });
	});
	
	$('#uploadw4').on('change', function() { 
		var file_data = $('#uploadw4').prop('files')[0];   
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		//alert(form_data);                             
		$.ajax({
					url: '<?php echo base_url(); ?>index.php/uploaddoc/wfore', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(php_script_response){
						//alert(php_script_response); // display response from the PHP script, if any
						$('#img_urlw4').val(php_script_response);
					}
		 });
	});
	
	$('#uploadi9').on('change', function() { 
		var file_data = $('#uploadi9').prop('files')[0];   
		var form_data = new FormData();                  
		form_data.append('file', file_data);
		//alert(form_data);                             
		$.ajax({
					url: '<?php echo base_url(); ?>index.php/uploaddoc/inine', // point to server-side PHP script 
					dataType: 'text',  // what to expect back from the PHP script, if anything
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,                         
					type: 'post',
					beforeSend: function(){
					 $(".se-pre-con").show();
				   },
				   complete: function(){
					 $(".se-pre-con").hide();
				   },
					success: function(php_script_response){
						//alert(php_script_response); // display response from the PHP script, if any
					
					$('#img_urli9').val(php_script_response);
			 
						}
		 });
	});
	// popover demo
	$("[data-toggle=popover]")
	.popover({html:true})
	</script>
	<!--<script>
	$(document).ready(function(){
		var type = 2; 
		var typeid = 1; 
			
			var url = '<?php echo $webserviceurl; ?>index.php/type';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'typeid':typeid,'type':type},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					
				}
			
			});
	});
	</script>-->
	<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
	<script>
		webshims.setOptions('forms-ext', {types: 'date'});
		webshims.polyfill('forms forms-ext');
	</script>
</body>
</html>
