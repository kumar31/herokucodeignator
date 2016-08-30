<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
include('client_header.php'); 
//print_r($this->session->all_userdata());
?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<body>
<div style="display: none;" class="se-pre-con"></div>
  <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('settings_menu_xs.php'); ?>
  <div class="container">
    <div class="row">
	<?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('settings_menu.php'); ?>
      <div class="col-sm-8 whiteBG invitebox topmargin30 ">
        <div class="col-md-6 col-md-offset-3">
		<form target="_top" data-toggle="validator" id="myForm" action=""> 
		<div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-6 gutter-bottom">
                <label for="" class="required">First Name
                </label>
                <input class="form-control " name="" id="firstname" type="text" maxlength="40" value="<?php echo $client_profile[0]['first_name']; ?>" required> 
              </div>
              <div class="col-xs-12 col-sm-6 gutter-bottom">
                <label for="" class="required">Last Name
                </label>
                <input class="form-control" name="" id="lastname" type="text" maxlength="100" value="<?php echo $client_profile[0]['last_name']; ?>" >                    
              </div>
            </div>
          </div>
		  
		  <div class="prepend-top form-group">
		  <label for="" class="required">Profile Picture
              </label>
			<br>
		  <img class="img-thumbnail pimgp" style="width: 150px; height: 150px;" src="<?php echo $client_profile[0]['profile_url']; ?>">
			<br>
			<br>
           <input class="form-control my-form-control" type='file' id="upload" />
		   <label for="" class="required">or
              </label>
		   <br>
		   <label for="" class="required">Paste URL
              </label>
			<input class="form-control" type='' id="img_url" />
          </div>
		  
          <!--<div class="prepend-top form-group">
            <label class="pull-left required" for="inputEmail">Email address
            </label>
            <input class="form-control" id="inputEmail" type="email" value="" required>
			 <div class="help-block with-errors"></div>
          </div>-->
         <div class="prepend-top form-group">
            <label class="pull-left" for="">Phone <span style="color: gray;">(exclude +1)</span>
            </label>
            <input class="form-control " name="" id="phone" type="tel" value="<?php echo $client_profile[0]['phone_number']; ?>" required>
          </div>
          
          <div class="form-group prepend-top">
            <label class="" for="Projects_title">Company
            </label>
            <input class="form-control" name="" id="company" type="text" maxlength="85" value="<?php echo $client_profile[0]['company']; ?>" >
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
                  <input id="addresspicker_map" class="form-control" name="" value="<?php echo $client_profile[0]['address']; ?>"/>   
                  <br/>
                  <div style="display: none;" id="addressdetails">
                    
                    <label>Postal Code: 
                    </label> 
                    <input id="postal_code" value="<?php echo $client_profile[0]['postal_code']; ?>" disabled=disabled> 
                    <br/>
                    <label>Lat:      
                    </label> 
                    <input id="lat" value="<?php echo $client_profile[0]['latitude']; ?>" disabled=disabled> 
                    <br/>
                    <label>Lng:      
                    </label> 
                    <input id="lng" value="<?php echo $client_profile[0]['longitude']; ?>" disabled=disabled> 
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
		var latitude = <?php echo $client_profile[0]['latitude']; ?>;
		var longitude = <?php echo $client_profile[0]['longitude']; ?>;
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
			var address = $("#addresspicker_map").val(); 
			var postal_code = $("#postal_code").val();
			var profile_url = $("#img_url").val(); 			
			var lat = $("#lat").val();
			var lng = $("#lng").val();
			var client_id = <?php echo $client_profile[0]['client_id']; ?>; 
			
				var url = '<?php echo $webserviceurl; ?>index.php/client_profile_update';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'client_id':client_id,'email':email,'first_name':firstname,'last_name':lastname,'phone_number':phone,'company':company,
					'profile_url':profile_url,'address':address,'postal_code':postal_code,'latitude':lat,'longitude':lng},
					//'dataType': 'json',
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {								
							window.location.reload();
							$("html, body").animate({ scrollTop: 0 }, "slow");
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
</body>
</html>
