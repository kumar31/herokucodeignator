<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<script src="<?php echo base_url(); ?>js/address/jquery.ui.addresspicker.js"></script>
<body>
<div class="se-pre-con"></div>
  <div class="container whiteBG">
    <div class="main-content controller-job action-new">
      <div class="bg-fill widget-PostJob clearfix">
        <header class="clearfix text-center">
          <h1 class="text-danger">Edit your event 
            <aside class="below">
              Tell us more about your event
            </aside>
          </h1>
		   <h5 id="alertmsg" class="error_msg"></h5>
        </header>
        <hr> 
		<div class="col-md-4">
			<img class="center-block" style="height: 280px;" src="<?php echo base_url();?>img/bartender transparent.png">
		</div>
		<div class="col-md-4">
         <form target="_top" data-toggle="validator" id="myForm">
		 <div class="form-group prepend-top">
            <label class="" for="Projects_title">Event Name
            </label>
            <input placeholder="e.g. Spring Cocktail Party" class="form-control" name="" id="eventname" type="text" maxlength="85" value="<?php echo $event_detail[0]['event_name']; ?>" required>
          </div>
		  
		  <div class="form-group prepend-top">
            <label class="" for="event_contact">Event Contact
            </label>
            <input placeholder="" class="form-control" name="" id="eventcontact" type="text" maxlength="85" value="<?php echo $event_detail[0]['event_contact']; ?>" required>
          </div>
		  
		  <div class="prepend-top form-group">
			<label for="" class="required">Event Picture
                </label> 
				<br>
		  <img class="eimg img-thumbnail" style="width: 350px; height: 150px;" src="<?php echo $event_detail[0]['event_pic']; ?>">
			<br>
			<br>
           <input class="form-control my-form-control" type='file' id="upload" />
			<input type='hidden' id="img_url" />
          </div>
		  
		  <!--<div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-6 gutter-bottom">
                <label for="" class="required">First Name
                </label>
                <input class="form-control" value="<?php echo $event_detail[0]['first_name']; ?>" name="" id="firstname" type="text" maxlength="40" required> 
              </div>
              <div class="col-xs-12 col-sm-6 gutter-bottom">
                <label for="" class="required">Last Name
                </label>
                <input class="form-control" value="<?php echo $event_detail[0]['last_name']; ?>" name="" id="lastname" type="text" maxlength="100">                    
              </div>
            </div>
          </div>-->
		  
          <div class="prepend-top form-group">
            <label class="pull-left required" for="inputEmail">Email address <span data-placement="right" data-toggle="tooltip" title="If you want to use a different email address for this event go to My Profile - Settings - Notifications" class="glyphicon glyphicon-question-sign"></span>
            </label>
            <input class="form-control" value="<?php echo $event_detail[0]['email']; ?>" name="" id="inputEmail" type="email" required disabled="disabled"> 
			 <div class="help-block with-errors"></div>
          </div>         
          <?php
					$startdatetime = $event_detail[0]['start_datetime'];
					$start_datetime = date('m/d/Y h:i A', strtotime($startdatetime));
					
					$enddatetime = $event_detail[0]['end_datetime'];
					$end_datetime = date('m/d/Y h:i A', strtotime($enddatetime));
				?>
          <div class="form-group prepend-top">
            
            <!--<input class="form-control " type="text" name="daterange" id="datetime" value="" required/>-->
			<div class="form-group">
				<label class="" for="fromdate">From Date & Time <span data-placement="right" data-toggle="tooltip" title="The start time should be when you need the talent to start their shift" class="glyphicon glyphicon-question-sign"></span></label>
					<div class='input-group date' id='datetimepicker6'>
						<input type='text' value="<?php echo $start_datetime; ?>" class="form-control" id="startdate" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
					
			<div class="form-group">
				<label class="" for="todate">To Date & Time <span data-placement="right" data-toggle="tooltip" title="End time should be when you are expecting the talent to finish their shift" class="glyphicon glyphicon-question-sign"></span></label>
					<div class='input-group date' id='datetimepicker7'>
						<input type='text' value="<?php echo $end_datetime; ?>" class="form-control" id="enddate" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
          </div>
		  
          <div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">Event Location
                </label>
                <div class='input input-positioned'>
                  <input id="addresspicker_map" value="<?php echo $event_detail[0]['location']; ?>" class="form-control" name="" required/>   
                  <br/>
                  <div id="addressdetails">
                    <!--<label>Locality: 
                    </label> 
                    <input id="locality" disabled=disabled> 
                    <br/>
                    <label>SubLocality: 
                    </label> 
                    <input id="sublocality" disabled=disabled> 
                    <br/>
                    <label>Borough: 
                    </label> 
                    <input id="administrative_area_level_3" disabled=disabled> 
                    <br/>
                    <label>District: 
                    </label> 
                    <input id="administrative_area_level_2" disabled=disabled> 
                    <br/>
                    <label>State/Province: 
                    </label> 
                    <input id="administrative_area_level_1" disabled=disabled> 
                    <br/>
                    <label>Country:  
                    </label> 
                    <input id="country" disabled=disabled> 
                    <br/>
                    <label>Postal Code: 
                    </label> -->
                    <input type="hidden" id="postal_code" value="<?php echo $event_detail[0]['postalcode']; ?>" disabled=disabled> 
                    <!--<br/>
                    <label>Lat:      
                    </label>-->
                    <input type="hidden" id="lat" value="<?php echo $event_detail[0]['latitude']; ?>" disabled=disabled> 
                    <!--<br/>
                    <label>Lng:      
                    </label>--> 
                    <input type="hidden" id="lng" value="<?php echo $event_detail[0]['longitude']; ?>" disabled=disabled> 
                    
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">Map Preview
                </label>
                <div class='map-wrapper map-control'>
                  <label id="geo_label" for="reverseGeocode"></label>
					<select style="visibility: hidden;" id="reverseGeocode">
					<option value="false">No</option>
					<option value="true" selected>Yes</option>
					</select><br/> 
                  <div id="map">
                  </div>
                  <div id="legend">You can drag and drop the marker to the correct location
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group prepend-top">
            <label class="" for="">Approximate number of guests
            </label>
            <select class="col-xs-12 form-control form-group" name="" id="guestnum">
              
              <option value="" <?php if(isset($event_detail[0]['number_of_guests']) && $event_detail[0]['number_of_guests'] == "More than 200") echo 'selected="selected"';?>>More than 200
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_guests']) && $event_detail[0]['number_of_guests'] == "150- 200") echo 'selected="selected"';?>>150- 200
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_guests']) && $event_detail[0]['number_of_guests'] == "100-150") echo 'selected="selected"';?>>100-150
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_guests']) && $event_detail[0]['number_of_guests'] == "50-100") echo 'selected="selected"';?>>50-100
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_guests']) && $event_detail[0]['number_of_guests'] == "25 - 50") echo 'selected="selected"';?>>25 - 50
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_guests']) && $event_detail[0]['number_of_guests'] == "10 - 25") echo 'selected="selected"';?>>10 - 25
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_guests']) && $event_detail[0]['number_of_guests'] == "Less than 10") echo 'selected="selected"';?>>Less than 10
              </option>
            </select>
          </div>
          <div class="prepend-top form-group">
            <label class="pull-left required" for="">EVENT DESCRIPTION
            </label>
            <textarea value="<?php echo $event_detail[0]['description']; ?>" class="form-control autoresized-textarea clear" rows="7" placeholder="Provide a more detailed description to help you get better staff" name="" id="description"><?php echo $event_detail[0]['description']; ?></textarea>
          </div>
          <div class="prepend-top form-group">
            <label class="pull-left required" for="">STARTING INSTRUCTIONS
            </label>
            <textarea placeholder="Meet at the reception." class="form-control" name="" id="instructions" type="text" value=""><?php echo $event_detail[0]['starting_instructions']; ?></textarea>
          </div>
          <div class="form-group prepend-top">
            <label class="" for="">Approximate number of talent needed <span data-placement="right" data-toggle="tooltip" title="Each talent is $30/hour including all taxes and fees." class="glyphicon glyphicon-question-sign"></span>
            </label>
            <select class="col-xs-12 form-control form-group" name="" id="waitersnum" >
              <option value="" <?php if(isset($event_detail[0]['number_of_waiters']) && $event_detail[0]['number_of_waiters'] == "Greater than 50") echo 'selected="selected"';?>>Greater than 50
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_waiters']) && $event_detail[0]['number_of_waiters'] == "40 - 50") echo 'selected="selected"';?>>40 - 50
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_waiters']) && $event_detail[0]['number_of_waiters'] == "30 - 40") echo 'selected="selected"';?>>30 - 40
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_waiters']) && $event_detail[0]['number_of_waiters'] == "10 - 20") echo 'selected="selected"';?>>10 - 20
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_waiters']) && $event_detail[0]['number_of_waiters'] == "6 - 10") echo 'selected="selected"';?>>6 - 10
              </option>
              <option value="" <?php if(isset($event_detail[0]['number_of_waiters']) && $event_detail[0]['number_of_waiters'] == "1-5") echo 'selected="selected"';?>>1-5
              </option>
            </select>
          </div>
		  
		  <div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">Talent expertise needed
			  </label>    
			</div>
			<div class="form-group">
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="bartending" <?php if(isset($event_detail[0]['talent_requested_for'])) { if(($event_detail[0]['talent_requested_for'] == "bartending") || ($event_detail[0]['talent_requested_for'] == "bartending,waiter,waitress") || ($event_detail[0]['talent_requested_for'] == "bartending,waiter,waitress,personality,host") || ($event_detail[0]['talent_requested_for'] == "bartending,personality,host")) { echo "checked";} }  ?>>
					Bartender
				  </label>
				</div>
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="waiter,waitress" <?php if(isset($event_detail[0]['talent_requested_for'])) { if(($event_detail[0]['talent_requested_for'] == "waiter,waitress") || ($event_detail[0]['talent_requested_for'] == "bartending,waiter,waitress") || ($event_detail[0]['talent_requested_for'] == "bartending,waiter,waitress,personality,host") || ($event_detail[0]['talent_requested_for'] == "waiter,waitress,personality,host")) { echo "checked";} }  ?>>
					Waiter/waitress
				  </label>
				</div>
				<div class="">
				  <label>
					<input type="checkbox" name="skills" value="personality,host" <?php if(isset($event_detail[0]['talent_requested_for'])) { if(($event_detail[0]['talent_requested_for'] == "personality,host") || ($event_detail[0]['talent_requested_for'] == "bartending,personality,host") || ($event_detail[0]['talent_requested_for'] == "bartending,waiter,waitress,personality,host") || ($event_detail[0]['talent_requested_for'] == "waiter,waitress,personality,host")) { echo "checked";} }  ?>>
					Personality/Host
				  </label>
				</div>
			  </div>
		  </div>
		  </div>
		  
          <div class="form-group prepend-top clearfix row">
            <label class="pull-left col-xs-12 required" for="Uniform_bracket">Uniform
            </label>
            <input id="ytProjects_budget_bracket" type="hidden" value="" name="Projects[budget_bracket]">
            <div id="Uniform_bracket">
              <span class="col-xs-12 col-sm-4 xpBox">
			  <img class="center-block" style="height: 250px;" src="<?php echo base_url();?>img/Black tie.png">
                <input class="experience-level form-control" id="Projects_budget_bracket_0" value="1" type="radio" name="uniform" <?php if(isset($event_detail[0]['uniform'])) { if($event_detail[0]['uniform'] == "1") { echo "checked";} }  ?>>
                <label for="Projects_budget_bracket_0">
                  <div class="xpHead">Black Tie
                  </div>
                  <div class="xpBody">Black waistcoat, white shirt, black trousers, black shoes and skinny black tie.
                  </div>
                </label>
              </span>
              <span class="col-xs-12 col-sm-4 xpBox">
			  <img class="center-block" style="height: 250px;" src="<?php echo base_url();?>img/White shirt black tie.png">
                <input class="experience-level form-control" id="Uniform_bracket_1" value="2" type="radio" name="uniform" <?php if(isset($event_detail[0]['uniform'])) { if($event_detail[0]['uniform'] == "2") { echo "checked";} }  ?>>
                <label for="Uniform_bracket_1">
                  <div class="xpHead">White Shirt Black Tie
                  </div>
                  <div class="xpBody">White shirt, black trousers, black shoes and skinny black tie.
                  </div>
                </label>
              </span>
              <span class="col-xs-12 col-sm-4 xpBox">
			  <img class="center-block" style="height: 250px;" src="<?php echo base_url();?>img/custom outfit.png">
                <input class="experience-level form-control" id="Uniform_bracket_2" value="3" type="radio" name="uniform" <?php if(isset($event_detail[0]['uniform'])) { if($event_detail[0]['uniform'] == "3") { echo "checked";} }  ?>>
                <label for="Uniform_bracket_2">
                  <div class="xpHead">Custom
                  </div>
                  <div class="xpBody">
                    <textarea class="form-control autoresized-textarea clear" rows="4" placeholder="Custom uniform requirements." name="" id="uniform_description"><?php echo $event_detail[0]['uniform_description']; ?></textarea>
                  </div>
                  </span>
                </div>
              </label>
            </span>
          </div>
		  
	    <div class="col-md-4 col-md-offset-4">
      <div class="prepend-top clearfix">
        <div class="form-group clearfix">
          <label class="pull-left" for="">UNIFORM PROVIDED?
          </label>
          <!--<span class="pull-right popover-toggle tooltip-visible-lg" data-content-selector="#privacy-suggestion-content" data-trigger="hover" data-class="info" data-placement="right">
            <i class="color-info fa fa-question-circle">
            </i>
          </span>
          <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" data-content-selector="#privacy-suggestion-content" data-trigger="click" title="Help tip">
            <i class="color-info fa fa-question-circle">
            </i>
          </span>
          <div style="display: none !important;" id="help-content-566f18445e97b">
          </div> -->       
        </div>
        <div class="clearfix privacy-selector">
          <div>
            <input value="1" name="uniformprovided" id="" class="pull-left" type="radio" <?php if(isset($event_detail[0]['uniform_provided'])) { if($event_detail[0]['uniform_provided'] == "1") { echo "checked";} }  ?>>                   
            <label for="Projects_privacy[Public]" class="normal">
              Yes
            </label>
          </div>
          <div>
            <input value="0" name="uniformprovided" id="" class="pull-left " type="radio" <?php if(isset($event_detail[0]['uniform_provided'])) { if($event_detail[0]['uniform_provided'] == "0") { echo "checked";} }  ?>>                    
            <label for="Projects_privacy[Private]" class="normal">
              No
            </label>
          </div>
        </div>
      </div>
	  
	  <div class="prepend-top clearfix">
			<div class="form-group clearfix">
			  <label class="pull-left" for="">Visibility <span data-placement="right" data-toggle="tooltip" title="‘OPEN TO ALL’ means that this event will be posted on the Outfit job board and all our registered talent will be able to see it and apply to work at your event. You can also invite whoever you want. ’HANDPICK’ means that this event won’t be visible to any talent and you need to choose who you want to invite." class="glyphicon glyphicon-question-sign"></span>
			  </label>			   
			</div>
			<div class="clearfix privacy-selector">
			  <div>
				<input value="1" name="open_to_all" id="" class="pull-left " type="radio" <?php if(isset($event_detail[0]['open_to_all'])) { if($event_detail[0]['open_to_all'] == "1") { echo "checked";} }  ?>>                    
				<label for="" class="normal">
				  Handpicked
				</label>
			  </div>
			  <div>
				<input value="0" name="open_to_all" id="" class="pull-left" type="radio" <?php if(isset($event_detail[0]['open_to_all'])) { if($event_detail[0]['open_to_all'] == "0") { echo "checked";} }  ?>>                   
				<label for="" class="normal">
				  Open to all
				</label>
			  </div>
			  
			</div>
		  </div>
		  <br>
		  
	   </div>
	   </div>
	   
      <div class="row">
        <div class="col-xs-2 col-md-4">
        </div>
        <div class="form-group col-xs-7 col-md-4">
         
            <button id="submit" name="submit" type="button" class="btn btn-danger btn-block btn-lg largeHeight">SAVE EVENT</button>
         
        </div>
        <div class="col-xs-2">
        </div>
      </div>
	  
      <!-- End demo -->
    </div>
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
	<script src="<?php echo base_url(); ?>js/moment.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>js/main.js">
	</script>
  <script type="text/javascript" src="http://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
  </script>
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js">
  </script>
  <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
   <script src="<?php echo base_url(); ?>js/validator.js"></script>
   <script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({
			
		});
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
  <!-- Date range selector 
  <script type="text/javascript">
    $(function() {
		var d = new Date();

		var month = d.getMonth()+1;
		var day = d.getDate();

		var output = d.getFullYear() + '-' +
			((''+month).length<2 ? '0' : '') + month + '-' +
			((''+day).length<2 ? '0' : '') + day;
		
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
          "format": "YYYY-MM-DD HH:mm:ss",
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
        "startDate": output,
        "endDate": output,
        "minDate": output
      } 
                                                   , function(start, end, label) {
        console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
      }
                                                  );
    }
     );
  </script>-->
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
      //$('#reverseGeocode').change(function(){
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
		  register();
		});
		
		function register(){
			var client_id = <?php echo $client_id; ?>; 
			var event_id = <?php echo $event_detail[0]['event_id']; ?>; 
			var email = $("#inputEmail").val(); 
			var eventname = $("#eventname").val();
			var eventcontact = $("#eventcontact").val();
			//var firstname = $("#firstname").val();
			//var lastname = $("#lastname").val();
			var event_pic = $("#img_url").val(); 
			
			/*var datetime = $("#datetime").val(); 
			var datetime = datetime.split(" - "); */
			
			var start_datetime = $("#startdate").val(); //alert(start_datetime); die;
			var end_datetime = $("#enddate").val(); 
			var location = $("#addresspicker_map").val(); 
			var locality = $("#locality").val();
			var sublocality = $("#sublocality").val();
			var borough = $("#administrative_area_level_3").val(); 
			var district = $("#administrative_area_level_2").val();
			var state = $("#administrative_area_level_1").val();
			var country = $("#country").val();
			var postal_code = $("#postal_code").val();
			var lat = $("#lat").val();
			var lng = $("#lng").val();
			var guestnum = $( "#guestnum option:selected" ).text(); 
			var waitersnum = $( "#waitersnum option:selected" ).text();
			var description = $("#description").val();
			var instructions = $("#instructions").val();
			var open_to_all = $("input[name='open_to_all']:checked").val();
			var uniform_description = $("#uniform_description").val();
			var uniform = $("input[name='uniform']:checked").val(); //alert(uniform);
			var uniformprovided = $("input[name='uniformprovided']:checked").val();
			var skills = $("input[name='skills']:checked").map( function() {
				return this.value;
			}).get().join(",");
			
			if(typeof uniform === "undefined") {
				var uniform = ''; 
			}
			else {
				var uniform = $("input[name='uniform']:checked").val();
			}
			
			if(typeof uniformprovided === "undefined") {
				var uniformprovided = ''; 
			}
			else {
				var uniformprovided = $("input[name='uniformprovided']:checked").val();
			}
			
			if(typeof open_to_all === "undefined") {
				var open_to_all = ''; 
			}
			else {
				var open_to_all = $("input[name='open_to_all']:checked").val();
			}
			
				var url = '<?php echo $webserviceurl; ?>index.php/update_event';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'client_id':client_id,'event_id':event_id,'email':email,'event_name':eventname,'event_contact':eventcontact,
					'start_datetime':start_datetime,'end_datetime':end_datetime,'location':location,'locality':locality,'sublocality':sublocality,
					'borough':borough,'district':district,'state':state,'country':country,'postalcode':postal_code,'number_of_guests':guestnum,
					'number_of_waiters':waitersnum,'description':description,'starting_instructions':instructions,'uniform':uniform,
					'uniform_description':uniform_description,'uniform_provided':uniformprovided,'latitude':lat,'longitude':lng,
					'open_to_all':open_to_all,'talent_requested_for':skills,'event_pic':event_pic},
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
							var event_id = <?php echo $event_detail[0]['event_id']; ?>; 
							window.location.assign("<?php echo base_url();?>index.php/event_detail/"+event_id );
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
					$('.eimg').attr('src', php_script_response);
			 $('#img_url').val(php_script_response); 
			 
						}
		 });
	});
	
	$('[data-toggle="tooltip"]').tooltip();   
	
	$(".se-pre-con").fadeOut("slow");
	</script>
</body>
</html>
