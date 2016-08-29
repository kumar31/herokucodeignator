<?php 
error_reporting(0);
include('talent_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<body>
<div style="display: none;" class="se-pre-con"></div>
  <?php 
	error_reporting(0);
	include('talent_settings_menu_xs.php'); ?>
  <div class="container">
    <div class="row">
	<?php 
	error_reporting(0);
	include('talent_settings_menu.php'); ?>
      <div class="col-sm-8 whiteBG invitebox topmargin30 ">
        <div class="col-md-6 col-md-offset-3">
		<h5 id="alertmsg" class="error_msg"></h5>
		<form target="_top" data-toggle="validator" id="myForm" action="">
		<div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-6 gutter-bottom">
                <label for="" class="required">First Name
                </label>
                <input class="form-control " name="" id="firstname" type="text" maxlength="40" value="<?php echo $talent_profile[0]['first_name']; ?>" required> 
              </div>
              <div class="col-xs-12 col-sm-6 gutter-bottom">
                <label for="" class="required">Last Name
                </label>
                <input class="form-control" name="" id="lastname" type="text" maxlength="100" value="<?php echo $talent_profile[0]['last_name']; ?>" >                    
              </div>
            </div>
          </div>
		  
		  <div class="prepend-top form-group">
		  <label for="" class="required">Profile Picture
              </label>
			<br>
		  <img class="img-thumbnail center-block pimgp" style="width: 150px; height: 150px;" src="<?php echo $talent_profile[0]['profile_url']; ?>">
			<br>
			
           <input class="form-control my-form-control" type='file' id="upload" />
		   <label for="" class="required">or
              </label>
			  <br>
			  <label for="" class="required">Paste URL
              </label>
			<input class="form-control" type='' id="img_url" />
          </div>
		  
		  <div class="prepend-top form-group">
		  <label for="" class="required">Picture 1
              </label>
			  <?php if($talent_profile[0]['pic1'] != "") { ?>
				  <img class="img-thumbnail pimg center-block" style="width: 150px; height: 150px;" src="<?php echo $talent_profile[0]['pic1']; ?>">
				<br>
			  <?php } ?>					  
           <input class="form-control my-form-control" type='file' id="upload1" />
			<input type='hidden' id="img_url1" />
          </div>
		  
		  <div class="prepend-top form-group">
		  <label for="" class="required">Picture 2
              </label>
			  <?php if($talent_profile[0]['pic2'] != "") { ?>
		  <img class="img-thumbnail pimg1 center-block" style="width: 150px; height: 150px;" src="<?php echo $talent_profile[0]['pic2']; ?>">
			<br>
			<?php } ?>
           <input class="form-control my-form-control" type='file' id="upload2" />
			<input type='hidden' id="img_url2" />
          </div>
		  
          <!--<div class="prepend-top form-group">
            <label class="pull-left required" for="inputEmail">Email address
            </label>
            <input class="form-control" id="inputEmail" type="email" value="" required>
			 <div class="help-block with-errors"></div>
          </div>
         <div class="prepend-top form-group">
            <label class="pull-left" for="">Phone
            </label>
            <input class="form-control " name="" id="phone" type="tel" value="<?php echo $talent_profile[0]['phone_number']; ?>" required>
          </div>-->
         
		  <div class="prepend-top form-group">
            <label class="pull-left" for="">D.O.B
            </label>
            <input class="form-control" name="" id="dob" type="date" onkeydown="return false" value="<?php echo $talent_profile[0]['dob']; ?>">
          </div>
		  
          <div class="form-group prepend-top">
            <label class="" for="Projects_title">Company
            </label>
            <input class="form-control" name="" id="company" type="text" maxlength="85" value="<?php echo $talent_profile[0]['company']; ?>" >
          </div>
		  
		  <div class="form-group prepend-top">
            <label class="" for="">Tell us about yourself and your experience
            </label>
            <textarea placeholder="Please tell us a little bit about yourself and your relevant work experience" class="form-control" name="" id="experience" type="text" value=""><?php echo $talent_profile[0]['experience']; ?></textarea>
          </div>
		  
		  <div class="form-group prepend-top">
            <label class="" for="Projects_title">City
            </label>
            <input class="form-control" name="" id="city" type="text" maxlength="85" value="<?php echo $talent_profile[0]['city']; ?>" >
          </div>
		  
		  <div class="form-group prepend-top">
            <label class="" for="Projects_title">Country
            </label>
            <input class="form-control" name="" id="country" type="text" maxlength="85" value="<?php echo $talent_profile[0]['country']; ?>" >
          </div>
		  
		  <div class="prepend-top form-group">
              <label class="required" for="">Height
              </label>
              <select class="col-xs-12 form-control form-group" id="height" name="">
                <option value="6.6 or above" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "6.6 or above") echo 'selected="selected"';?>>6.6 or above</option>
                
				<option value="6.5" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "6.5") echo 'selected="selected"';?>>6.5</option>
                  
                <option value="6.4" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "6.4") echo 'selected="selected"';?>>6.4</option>
                  
                <option value="6.3" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "6.3") echo 'selected="selected"';?>>6.3</option>
				
                <option value="6.2" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "6.2") echo 'selected="selected"';?>>6.2</option>
				
                <option value="6.1" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "6.1") echo 'selected="selected"';?>>6.1</option>
				
                <option value="6.0" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "6.0") echo 'selected="selected"';?>>6.0</option>
				
                <option value="5.11" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.11") echo 'selected="selected"';?>>5.11</option>
				
                <option value="5.10" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.10") echo 'selected="selected"';?>>5.10</option>
				
                <option value="5.9" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.9") echo 'selected="selected"';?>>5.9</option>
				
                <option value="5.8" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.8") echo 'selected="selected"';?>>5.8</option>
				
                <option value="5.7" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.7") echo 'selected="selected"';?>>5.7</option>
				
                <option value="5.6" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.6") echo 'selected="selected"';?>>5.6</option>
				
                <option value="5.5" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.5") echo 'selected="selected"';?>>5.5</option>
				
                <option value="5.4" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.4") echo 'selected="selected"';?>>5.4</option>
				
                <option value="5.3" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.3") echo 'selected="selected"';?>>5.3</option>
				
                <option value="5.2" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.2") echo 'selected="selected"';?>>5.2</option>
				
                <option value="5.1" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "5.1") echo 'selected="selected"';?>>5.1</option>
				
                <option value="4.11" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "4.11") echo 'selected="selected"';?>>4.11</option>
				
                <option value="Below 4.10" <?php if(isset($talent_profile[0]['height']) && $talent_profile[0]['height'] == "Below 4.10") echo 'selected="selected"';?>>Below 4.10</option>
              </select>              
              </label>			  
          </div>
			
		  <!--<div class="form-group prepend-top">
            <label class="" for="Projects_title">Height
            </label>
            <input class="form-control" name="" id="height" type="text" maxlength="85" value="<?php echo $talent_profile[0]['height']; ?>" >
          </div>-->
		  
		   <!--<div class="form-group prepend-top">
            <label class="" for="Projects_title">Hair color
            </label>
            <input class="form-control" name="" id="hair_color" type="text" maxlength="85" value="<?php echo $talent_profile[0]['hair_color']; ?>" >
          </div>-->
		  
		   <div class="prepend-top form-group">
              <label class="required" for="">Hair color
              </label>
              <select class="col-xs-12 form-control form-group" id="hair_color" name="">
                <option value="Black" <?php if(isset($talent_profile[0]['hair_color']) && $talent_profile[0]['hair_color'] == "Black") echo 'selected="selected"';?>>Black</option>
                
				<option value="Brown" <?php if(isset($talent_profile[0]['hair_color']) && $talent_profile[0]['hair_color'] == "Brown") echo 'selected="selected"';?>>Brown</option>
                  
                <option value="Blonde" <?php if(isset($talent_profile[0]['hair_color']) && $talent_profile[0]['hair_color'] == "Blonde") echo 'selected="selected"';?>>Blonde</option>
                  
                <option value="Red" <?php if(isset($talent_profile[0]['hair_color']) && $talent_profile[0]['hair_color'] == "Red") echo 'selected="selected"';?>>Red</option>
				
                <option value="Grey" <?php if(isset($talent_profile[0]['hair_color']) && $talent_profile[0]['hair_color'] == "Grey") echo 'selected="selected"';?>>Grey</option>
				
                <option value="Blue" <?php if(isset($talent_profile[0]['hair_color']) && $talent_profile[0]['hair_color'] == "Blue") echo 'selected="selected"';?>>Blue</option>
				
                <option value="Green" <?php if(isset($talent_profile[0]['hair_color']) && $talent_profile[0]['hair_color'] == "Green") echo 'selected="selected"';?>>Green</option>
				
                <option value="Other" <?php if(isset($talent_profile[0]['hair_color']) && $talent_profile[0]['hair_color'] == "Other") echo 'selected="selected"';?>>Other</option>
              </select>              
              </label>			  
            </div>
		  
		   <!--<div class="form-group prepend-top">
            <label class="" for="Projects_title">Eye color
            </label>
            <input class="form-control" name="" id="eye_color" type="text" maxlength="85" value="<?php echo $talent_profile[0]['eye_color']; ?>" >
          </div>-->
		  
		  <div class="form-group prepend-top">
			  <label class="required" for="">Eye color
				  </label>
				  <select class="col-xs-12 form-control form-group" id="eye_color" name="">
					<option value="Black" <?php if(isset($talent_profile[0]['eye_color']) && $talent_profile[0]['eye_color'] == "Black") echo 'selected="selected"';?>>Black</option>
					
					<option value="Brown" <?php if(isset($talent_profile[0]['eye_color']) && $talent_profile[0]['eye_color'] == "Brown") echo 'selected="selected"';?>>Brown</option>
					
					<option value="Blue" <?php if(isset($talent_profile[0]['eye_color']) && $talent_profile[0]['eye_color'] == "Blue") echo 'selected="selected"';?>>Blue</option>
					
					<option value="Grey" <?php if(isset($talent_profile[0]['eye_color']) && $talent_profile[0]['eye_color'] == "Grey") echo 'selected="selected"';?>>Grey</option>
					
					<option value="Hazel" <?php if(isset($talent_profile[0]['eye_color']) && $talent_profile[0]['eye_color'] == "Hazel") echo 'selected="selected"';?>>Hazel</option>
					
					<option value="Green" <?php if(isset($talent_profile[0]['eye_color']) && $talent_profile[0]['eye_color'] == "Green") echo 'selected="selected"';?>>Green</option>
					
					<option value="Other" <?php if(isset($talent_profile[0]['eye_color']) && $talent_profile[0]['eye_color'] == "Other") echo 'selected="selected"';?>>Other</option>
				  </select>              
			   </label>
		  </div>
		  
		  <div class="form-group prepend-top">
            <!--<label class="" for="Projects_title">Languages
            </label>
            <input class="form-control" name="" id="languages" type="text" maxlength="85" value="<?php echo $talent_profile[0]['languages']; ?>" >-->
			<label class="required" for="">Language <span style="color: gray;">(Ctrl + select for multiple)</span>
			</label>
				  <select class="col-xs-12 form-control form-group" id="languages" name="" multiple="multiple">
					<option value="English" <?php if(isset($talent_profile[0]['languages']) && $talent_profile[0]['languages'] == "English") echo 'selected="selected"';?>>English</option>
					
					<option value="Spanish" <?php if(isset($talent_profile[0]['languages']) && $talent_profile[0]['languages'] == "Spanish") echo 'selected="selected"';?>>Spanish</option>
					
					<option value="French" <?php if(isset($talent_profile[0]['languages']) && $talent_profile[0]['languages'] == "French") echo 'selected="selected"';?>>French</option>
					
					<option value="Chinese" <?php if(isset($talent_profile[0]['languages']) && $talent_profile[0]['languages'] == "Chinese") echo 'selected="selected"';?>>Chinese</option>
					
					<option value="Japanese" <?php if(isset($talent_profile[0]['languages']) && $talent_profile[0]['languages'] == "Japanese") echo 'selected="selected"';?>>Japanese</option>
					
					<option value="German" <?php if(isset($talent_profile[0]['languages']) && $talent_profile[0]['languages'] == "German") echo 'selected="selected"';?>>German</option>
					
					<option value="Other" <?php if(isset($talent_profile[0]['languages']) && $talent_profile[0]['languages'] == "Other") echo 'selected="selected"';?>>Other</option>
				  </select>              
			   </label>
          </div>
		  <div style="display: none;" id="result"></div>
		  <!--<div class="form-group prepend-top">
            <label class="" for="Projects_title">Pay
            </label>
            <input class="form-control" name="" id="amount" type="text" maxlength="85" value="<?php echo $talent_profile[0]['amount']; ?>" >
          </div>
		  
		  <div class="form-group prepend-top">
            <label class="" for="Projects_title">Timezone
            </label>
            <input class="form-control" name="" id="timezone" type="text" maxlength="85" value="<?php echo $talent_profile[0]['timezone']; ?>" >
          </div>-->
		  <?php 
		  $special_skills = $talent_profile[0]['special_skills'];
		  $special_skills = explode(',',$special_skills);
		  $bartending = 0;
		  $waiter = 0;
		  $personality = 0;
		  foreach($special_skills as $val) {
			  if($val == 'bartending') {
				  $bartending = 1;
			  }
			  if($val == 'waiter') {
				  $waiter = 1;
			  }
			  if($val == 'personality') {
				  $personality = 1;
			  }
		  }
			?>
		  <div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">Special Skills
			  </label>    
			</div>
			<div class="form-group">
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="bartending" <?php if($bartending == "1") { echo "checked";} ?>>
					Bartender
				  </label>
				</div>
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="waiter,waitress" <?php if($waiter == "1") { echo "checked";}  ?>>
					Waiter/waitress
				  </label>
				</div>
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="personality,host" <?php if($personality == "1") { echo "checked";}  ?>>
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
				<div class="">
				  <label>
					<input type="radio" name="gender" value="1" <?php if(isset($talent_profile[0]['gender'])) { if($talent_profile[0]['gender'] == "1") { echo "checked";} }  ?>>
					Male
				  </label>
				</div>
				<div class="">
				  <label>
					<input type="radio" name="gender" value="0" <?php if(isset($talent_profile[0]['gender'])) { if($talent_profile[0]['gender'] == "0") { echo "checked";} }  ?>>
					Female
				  </label>
				</div>
			  </div>
		  </div>
		  
		  <!--<div class="form-group">
			<label for="inputPassword" class="control-label">Password</label>
			<div class="form-group">
			  <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
			  <div class="help-block">Minimum of 6 characters</div>
			</div>
			<div class="form-group">
			  <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
			  <div class="help-block with-errors"></div>
			</div>
			</div>-->	 
          
          <div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">Address
                </label>
                <div class='input input-positioned'>
                  <input id="addresspicker_map" class="form-control" name="" value="<?php echo $talent_profile[0]['address']; ?>"/>   
                  <br/>
                  <div style="display: none;" id="addressdetails">
                    
                    <label>Postal Code: 
                    </label> 
                    <input id="postal_code" value="<?php echo $talent_profile[0]['zipcode']; ?>" disabled=disabled> 
                    <br/>
                    <label>Lat:      
                    </label> 
                    <input id="lat" value="<?php echo $talent_profile[0]['latitude']; ?>" disabled=disabled> 
                    <br/>
                    <label>Lng:      
                    </label> 
                    <input id="lng" value="<?php echo $talent_profile[0]['longitude']; ?>" disabled=disabled> 
                    <br/>
                    <br/>
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
		  
      </div>
	  
	  <div class="row">
        <div class="col-xs-5">
        </div>
        <div class="form-group col-xs-4">
         
            <button id="submit" name="submit" type="button" class="btn btn-submit btn-md largeHeight">UPDATE</button>
         
        </div>
        <div class="col-xs-2">
        </div>
      </div>
	  
      </div>
    </div>
  </div>
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
  <script type="text/javascript" src="http://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
  </script>
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js">
  </script>
  <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <script src="<?php echo base_url(); ?>js/validator.js"></script>
  <script>
    $(function() {
		var latitude = <?php echo $talent_profile[0]['latitude']; ?>;
		var longitude = <?php echo $talent_profile[0]['longitude']; ?>;
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
		
		$( "#submit" ).click(function() {
		  reg();
		});
		
		function reg(){
			var email = $("#inputEmail").val();
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var phone = $("#phone").val();
			var company = $("#company").val();
			var experience = $("#experience").val(); 
			var city = $("#city").val();
			var zipcode = $("#zipcode").val();
			var country = $("#country").val();
			var special_skills = $("#special_skills").val();
			//var hair_color = $("#hair_color").val();
			var hair_color = $( "#hair_color option:selected" ).text(); 
			var eye_color = $("#eye_color").val();
			var height = $("#height").val();
			//var languages = $("#languages").val();
			var selMulti = $.map($("#languages option:selected"), function (el, i) {
				 return $(el).text();
			 });
			 $("#result").text(selMulti.join(", ")); 
			 var languages = $("#result").text(); 

			var amount = $("#amount").val();
			var timezone = $("#timezone").val();
			var address = $("#addresspicker_map").val(); 
			var postal_code = $("#postal_code").val();
			var lat = $("#lat").val();
			var lng = $("#lng").val();
			var profile_url = $("#img_url").val(); 		
			var pic1 = $("#img_url1").val(); 		
			var pic2 = $("#img_url2").val(); 		
			var talent_id = <?php echo $talent_profile[0]['talent_id']; ?>; 
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
			
				var url = '<?php echo $webserviceurl; ?>index.php/talent_profile_update';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'talent_id':talent_id,'email':email,'first_name':firstname,'last_name':lastname,'phone_number':phone,'company':company,
					'city':city,'zipcode':postal_code,'country':country,'address':address,'special_skills':skills,'gender':gender,'hair_color':hair_color,'eye_color':eye_color,'experience':experience,
					'height':height,'languages':languages,'profile_url':profile_url,'pic1':pic1,'pic2':pic2,'latitude':lat,'longitude':lng},
					//'dataType': 'json',
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {								
							window.location.reload();
							window.scrollTo(0,0);
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
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
				$('.pimgp').attr('src', php_script_response);
			 $('#img_url').val(php_script_response); 
			 
						}
		 });
	});
	</script>
	
	<script>
	$('#upload1').on('change', function() { 
		var file_data = $('#upload1').prop('files')[0];   
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
				$('.pimg').show(); 				
				$('#img_url1').val(php_script_response); 
			 
						}
		 });
	});
	</script>
	
	<script>
	$('#upload2').on('change', function() { 
		var file_data = $('#upload2').prop('files')[0];   
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
				$('.pimg1').attr('src', php_script_response);				
				$('#img_url2').val(php_script_response); 
			 
						}
		 });
	});
	</script>
	<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
	<script>
		webshims.setOptions('forms-ext', {types: 'date'});
		webshims.polyfill('forms forms-ext');
	</script>
</body>
</html>
