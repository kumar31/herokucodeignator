
<?php 
error_reporting(0);
include('reg_header.php'); ?>
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
          <h1 class="text-danger">Sign up as Business
            <aside class="below">
              Create events - Start inviting talent in minutes
            </aside> 
          </h1>
		  <h5 id="alertmsg" class="error_msg"></h5>
        </header>
        <hr>
		<div class="col-md-4">
			<img class="center-block" style="height: 280px;" src="<?php echo base_url();?>img/personality transparent.png">
		</div>
		<div class="col-md-4">
		<form target="_top" data-toggle="validator" id="myForm" action="">
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
		  <input type="hidden" value="<?php echo $profile['login_type']; ?>" class="form-control " name="" id="login_type" type="text"> 
		  <input type="hidden" value="<?php echo $profile['date']; ?>" class="form-control " name="" id="date" type="text"> 
		  
		  <div class="prepend-top form-group">
		  <label for="" class="required">Company logo / Profile Picture
                </label> 
				<span class="pull-right">Optional</span>
				<?php
					
					if($profile_url != "") { ?>
						<img class="img-circle center-block pimg" style="width: 120px; height: 120px;" src="<?php echo $profile_url; ?>">
						<br>
				<?php	}
				else { ?>
					<img class="img-circle center-block pimg" style="width: 120px; height: 120px;" src="<?php getenv( 'SOIREE_BASE_URL' ) ?>/nectorimg/default-profile.png">
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
            <input value="<?php echo $email; ?>" placeholder="Email" class="form-control" id="inputEmail" type="email" value="" required>
			 <div class="help-block with-errors"></div>
          </div>
		  
         <!--<div class="prepend-top form-group">
            <label class="pull-left" for="">Phone
            </label>
            <input class="form-control " name="" id="phone" type="tel" required>
          </div>-->
          
          <div class="form-group prepend-top">
            <label class="" for="Projects_title">Company
            </label>
			<span class="pull-right">Optional</span>
            <input placeholder="Company" class="form-control" name="" id="company" type="text" maxlength="85" value="">
          </div>
		  <div class="form-group">
			<label for="inputPassword" class="control-label">Password</label>
			<div class="form-group">
			  <input type="password" data-minlength="6" maxlength="30" class="form-control" id="inputPassword" placeholder="Password" required>
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
				<span class="pull-right">Optional</span>
                <div class='input input-positioned'>
                  <input placeholder="55 W 138th St, New York, NY 10037, USA" id="addresspicker_map" class="form-control" name=""/>   
                  <br/>
                  <div id="addressdetails">
                    
                    <!--<label>Postal Code: 
                    </label> -->
                    <input type="hidden" id="postal_code" disabled=disabled> 
                    
                    <!--<label>Lat:      
                    </label>-->
                    <input type="hidden" value="<?php echo $profile['latitude']; ?>" id="lat" disabled=disabled> 
                    
                    <!--<label>Lng:      
                    </label>-->
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
		  
		  <!--<div class="prepend-top clearfix form-group">
			<div class="form-group">
			  <label class="" for="">Gender
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
			  </div>
		  </div>-->
		  
		 <div class="row">
			<div class="col-xs-3">
			</div>
			<div class="form-group col-xs-5">
			 
				<button id="submit" name="submit" type="button" class="btn btn-block btn-danger btn-md largeHeight">SIGN UP</button>
			 
			</div>
			<div class="col-xs-2">
			</div>
		  </div>
      </div>
      
     
	   </div>
      <!-- End demo -->
    </div>
    </form>
	</div>
  <!-- Footer Start -->
  <form id="clientlogin" action="<?php echo base_url();?>index.php/client_dashboard" method="POST">
		<input type="hidden" name="my_userid" id="usrid"> 
	  </form>
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
  <!-- Date range selector -->
  <script type="text/javascript">
    $(function() {
      $('input[name="daterange"]').daterangepicker({
        "showDropdowns": true,
        "timePicker": true,
        "timePicker24Hour": true,
        "timePickerIncrement": 30,
        "dateLimit": {
          "days": 1
        }
        ,
        "locale": {
          "format": "MM/DD/YYYY HH:mm",
          "separator": " - ",
          "applyLabel": "Apply",
          "cancelLabel": "Cancel",
          "fromLabel": "From",
          "toLabel": "To",
          "customRangeLabel": "Custom",
          "daysOfWeek": [
            "Su",
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa"
          ],
          "monthNames": [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
          ],
          "firstDay": 1
        }
        ,
        "startDate": "12/14/2015",
        "endDate": "12/14/2015",
        "minDate": "12/14/2015"
      }
                                                   , function(start, end, label) {
        console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
      }
                                                  );
    }
     );
  </script>
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
		
		$( "#submit" ).click(function() {
		  reg();
		});
		
		function reg(){
			var email = $("#inputEmail").val();
			var password = $("#inputPassword").val();
			var firstname = $("#firstname").val();
			var lastname = $("#lastname").val();
			var phone = $("#phone").val();
			var company = $("#company").val();
			var address = $("#addresspicker_map").val();
			var profile_url = $("#img_url").val(); 			
			var postal_code = $("#postal_code").val();
			var lat = $("#lat").val();
			var lng = $("#lng").val();
			var facebook_id = $("#facebook_id").val();
			//var login_type = $("#login_type").val();
			var date = $("#date").val();
			var gender = $("input[name='gender']:checked").val();
			
			if(typeof gender === "undefined") {
				var gender = ''; 
			}
			else {
				var gender = $("input[name='gender']:checked").val();
			}
			
				var url = '<?php echo $webserviceurl; ?>index.php/client_registration';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'email':email,'password':password,'first_name':firstname,'last_name':lastname,'company':company,'profile_url':profile_url,
					'address':address,'postal_code':postal_code,'latitude':lat,'longitude':lng,'facebook_id':facebook_id,'date':date},
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
							var clientid = JSON.stringify(data['result']);
							var clientid = clientid.replace(/\"/g, "");
							$('#usrid').val(clientid);
							$( "#clientlogin" ).submit();
							//window.location.assign("<?php echo base_url();?>index.php/client_dashboard/"+clientid );
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
	
	</script>
	
</body>
</html>
