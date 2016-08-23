<?php 
error_reporting(0);
include('talent_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		
		$talent_id = $this->session->userdata('talent_id');
		if($talent_id == ''){
			$talent_id = $this->input->cookie('talent',true);
		}
 ?>
<body>
  <div class="container">
    <div class="row orangehead">
      <div class="col-md-10">
        <header class="clearfix">
          <h1 class="event-title"><?php echo $event_detail[0]['event_name']; ?>
            <aside class="below">
              <?php
						$startdatetime = $event_detail[0]['start_datetime'];
						$start_datetime = date('D dS M Y h:i A', strtotime($startdatetime));
						
						$enddatetime = $event_detail[0]['end_datetime'];
						$end_datetime = date('D dS M Y h:i A', strtotime($enddatetime));
					?>
                     
              <?php echo $start_datetime; ?> - <?php echo $end_datetime; ?>
            </aside>
          </h1>
        </header>
        <?php 
			$datetime1 = new DateTime($start_datetime);
			$datetime2 = new DateTime($end_datetime);
			$interval = $datetime1->diff($datetime2);
			$total_hours = $interval->format('%a days %h hours %i minutes'); 
			
			$total_days = $interval->format('%a'); 
			$total_hrs = $interval->format('%h'); 
			if($total_days != 0) {
				$total_hrs = $total_hrs + ($total_days * 24);
			}
			
			$total_mins = $interval->format('%i'); 
			
			$mins = round($total_mins/60 * 100);
			$hrs_mins = $total_hrs . "." . $mins;
			
			$total_pay = $hrs_mins * 25;
		?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <!-- Start of white box -->
      <div class="col-sm-8 whiteBG invitebox topmargin">
        <div>
          <div class="row">
            <div class="col-sm-8 col-xs-12"> 
              <h3>Event Description
              </h3>
			   <hr>
			   <span class="pull-right">
					<a role="button" class="btn btn-danger btn-lg largeHeight" disabled>Confirmed</a>
				</span>
			   <!--<span class="pull-right">
				   <p class="">
					  <input type="hidden" value="<?php echo $event_detail[0]['event_id']; ?>" id="apply<?php echo $event_detail[0]['event_id']; ?>">			
							<a class=
                           "btn btn-submit btn-lg largeHeight once-only btn_confirms" value="<?php echo $event_detail[0]['event_id']; ?>"
                           role="button" id="btn1" textbox_id="#apply<?php echo $event_detail[0]['event_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;Accept&nbsp;&nbsp;&nbsp;&nbsp;
						 </a>
						<a role="button" class="btn btn-danger btn-lg largeHeight" data-toggle="modal" data-target="#myModal">&nbsp;&nbsp;&nbsp;Reject&nbsp;&nbsp;&nbsp;</a>
                      </p>
					
				  </span>-->
             
              <p><?php echo $event_detail[0]['description']; ?>
              </p>
              <br>
			  <p><b>Starting Instructions:</b><?php echo $event_detail[0]['starting_instructions']; ?>
              </p>
              <br>
              <p><b>Location:</b> <?php echo $event_detail[0]['location']; ?>
              </p>
			  <p><b>Talent requested for:</b> <?php echo $event_detail[0]['talent_requested_for']; ?></p>
			  <p><b>Number of Guests:</b> <?php echo $event_detail[0]['number_of_guests']; ?>
              </p>
			  <p><b>Number of talent required:</b> <?php echo $event_detail[0]['number_of_waiters']; ?>
              </p>
			  <p><b>Approximate pay:</b> $<?php echo $total_pay; ?>
              </p>
			  <?php
				$uniform_provided = $event_detail[0]['uniform_provided'];
				if($uniform_provided == "0") {
					$uniform_provided = "No";
				}
				if($uniform_provided == "1") {
					$uniform_provided = "Yes";
				}
			  ?>
			  <p><b>Uniform Provided:</b> <?php echo $uniform_provided; ?>
              </p>
			  
			  <?php
				$uniform_code = $event_detail[0]['uniform'];
				if($uniform_code == "0") {
					$uniform_code = "None";
				}
				if($uniform_code == "1") {
					$uniform_code = "Black Tie";
				}
				if($uniform_code == "2") {
					$uniform_code = "White Shirt - Black Tie";
				}
				if($uniform_code == "3") {
					$uniform_code = "Custom";
				}
			  ?>
			  <p><b>Uniform Description:</b> <?php echo $uniform_code; ?>
              </p>
			  
			  <?php
				$custom_uniform = $event_detail[0]['uniform_description'];
				if($uniform_code == "Custom") {
					$custom_uniform = $event_detail[0]['uniform_description'];
				}
				else {
					$custom_uniform = "None";
				}
				
			  ?>
			  <p><b>Custom Uniform Description:</b> <?php echo $custom_uniform; ?>
              </p>
			  
            </div>
			<div class="col-md-4 col-xs-12">
			<h3>Event Picture
              </h3>
              <hr>
				<img class="img-responsive img-thumbnail" style="width: 230px; height: 150px;" src="<?php echo $event_detail[0]['event_pic']; ?>">
				<h3>Uniform
              </h3>
			  <?php
				$uniform = $event_detail[0]['uniform'];
				if($uniform == "1") {
					$uniform = base_url().'img/Black%20tie.png';
				}
				if($uniform == "2") {
					$uniform = base_url().'img/White%20shirt%20black%20tie.png';
				}
				if($uniform == "3") {
					$uniform =  base_url().'img/custom%20outfit.png';
				}
			  ?>
				<p><img class="" style="height: 250px;" src="<?php echo $uniform; ?>">
				</p>
			</div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <!--<h3>Posted by: <?php echo $event_detail[0]['first_name']; ?>  <?php echo $event_detail[0]['last_name']; ?>-->
              </h3>
              <hr>
            </div>
          </div>
        </div>
      </div>
     
      <div class="col-sm-4 listings-invitebar">
		<div class="prepend-top clearfix form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <label for="" class="required">
                </label>
                <div class='input input-positioned'>
                  <input style="display: none;" id="addresspicker_map" class="form-control" name="" value="<?php echo $event_detail[0]['location']; ?>"/>   
                  
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 gutter-bottom">
                <h3>Event Location
				</h3>
                <div class='map-wrapper map-control'>
                  <label id="geo_label" for="reverseGeocode"></label>
					<select style="visibility: hidden" id="reverseGeocode">
					<option value="false"></option>
					<option value="true" selected></option>
					</select> 
                  <div id="map">
                  </div>
                  <div id="legend">
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
	  
    </div>
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
			 <div class="form-group">
			  <label for="rejectreason">Reject Reason</label>
			  <input type="text" class="form-control" id="rejectreason">
			</div>
			<input type="hidden" value="<?php echo $event_detail[0]['event_id']; ?>" id="reject<?php echo $event_detail[0]['event_id']; ?>">					  
				<a class=
			   "btn btn-danger btn-lg largeHeight once-only btn_rejects" value="<?php echo $event_detail[0]['event_id']; ?>"
			   role="button" id="btn2" textbox_id2="#reject<?php echo $event_detail[0]['event_id']; ?>">Reject
			 </a>	
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
		var latitude = <?php echo $event_detail[0]['latitude']; ?>;
		var longitude = <?php echo $event_detail[0]['longitude']; ?>;
      var addresspickerMap = $( "#addresspicker_map" ).addresspicker({
        componentsFilter: 'country:US',
        regionBias: "us",
        language: "en",
        bounds: '40.6952494,-74.0560769|40.8351094,-73.8695212',
        updateCallback: showCallback,
        mapOptions: {
          zoom: 11,
          center: new google.maps.LatLng(<?php echo $event_detail[0]['latitude']; ?>, <?php echo $event_detail[0]['longitude']; ?>),
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
	  gmarker.setDraggable(false);
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
 
  $(".btn_confirms").click(function()
	 {
	  var textbox_id = $(this).attr('textbox_id');
	  var textbox_val = $(textbox_id).val(); 
	  applytoevent(textbox_val);
	  $(this).attr('disabled', true);
	  $(this).text('Accepted');
	  $(".btn_rejects").attr('disabled', true);
	 });
	 
	
  function applytoevent(textbox_val){
		var talent_id = "<?php echo $talent_id;  ?>";
		var event_id = textbox_val;
			
			var url = '<?php echo $webserviceurl; ?>index.php/accept_event_by_talent';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					
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
	  $(".btn_confirms").attr('disabled', true);
	 });
	 
	
  function rejectevent(textbox_val2){
		var talent_id = "<?php echo $talent_id;  ?>";
		var event_id = textbox_val2;
		var reason = $("#rejectreason").val();
			
			var url = '<?php echo $webserviceurl; ?>index.php/reject_event_by_talent';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'talent_id':talent_id,'event_id':event_id,'talent_reject_reason':reason},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					
				}
			
			});

	}
  </script>
</body>
</html>
