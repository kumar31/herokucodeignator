<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
   
<?php

require '../settings.php';


?>


<head>
<?php 

echo file_get_contents($root . 'protocols/header.php');

?>

<!-- Map Scripts START -->
  <link rel="stylesheet" href="<?php echo $root; ?>css/base/jquery.ui.all.css">
     <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo $root . 'js/vendor/jquery-1.11.2.min.js'; ?>"><\/script>')</script>
     <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
      <script src="<?php echo $root; ?>js/address/jquery.ui.addresspicker.js"></script>


<!-- MAP SCRIPTS END -->

</head>


<?php 

echo file_get_contents($root . 'protocols/menu.php');

?>

<body>


    <div class="container whiteBG">

<div class="main-content controller-job action-new">
        <div class="bg-fill widget-PostJob clearfix">
<header class="clearfix">
            <h1 class="form-title">your event is almost ready<aside class="below">
                    Post a Job for Free - Start receiving proposals within minutes</aside>
                    </h1>
            </header>
<hr>
<form target="_top" enctype="multipart/form-data" id="form-job" action="/job/create" method="POST">
<div class="prepend-top form-group">
    <label class="pull-left required" for="">Email address</label>
    <input class="form-control " name="" id="" type="text">
</div>
<div class="prepend-top form-group hidden-xs hidden-sm hidden-md hidden-lg">
    <label class="pull-left" for="">Work Email</label>
    <input class="form-control " name="" id="" type="text">
</div>
<div class="prepend-top clearfix form-group">
    <div class="row">
        <div class="col-xs-12 col-sm-6 gutter-bottom">
            <label for="" class="required">First Name</label>
            <input class="form-control " name="" id="" type="text" maxlength="40"> 
        </div>
        <div class="col-xs-12 col-sm-6 gutter-bottom">
            <label for="" class="required">Last Name</label>
                <input class="form-control" name="" id="" type="text" maxlength="100">                    
            </div>
    </div>
</div>


<div class="form-group prepend-top">
        <label class="" for="Projects_title">Event Name?</label>
        <input placeholder="e.g. Johnny Walker Birthday Bash" class="form-control" name="" id="" type="text" maxlength="85" value="">
    </div>

   <div class="form-group prepend-top">
     <label class="" for="Projects_title">Event Date</label>
<input class="form-control " type="text" name="daterange" value=""/>
</div>


<div class="prepend-top clearfix form-group">
    <div class="row">
        <div class="col-xs-12 col-sm-6 gutter-bottom">
            <label for="" class="required">Event Location</label>
    <div class='input input-positioned'>
    <input id="addresspicker_map" class="form-control" name="" id="" />   <br/>
    <div id="addressdetails">
      <label>Locality: </label> <input id="locality" disabled=disabled> <br/>
      <label>SubLocality: </label> <input id="sublocality" disabled=disabled> <br/>
      <label>Borough: </label> <input id="administrative_area_level_3" disabled=disabled> <br/>
      <label>District: </label> <input id="administrative_area_level_2" disabled=disabled> <br/>
      <label>State/Province: </label> <input id="administrative_area_level_1" disabled=disabled> <br/>
      <label>Country:  </label> <input id="country" disabled=disabled> <br/>
      <label>Postal Code: </label> <input id="postal_code" disabled=disabled> <br/>
      <label>Lat:      </label> <input id="lat" disabled=disabled> <br/>
      <label>Lng:      </label> <input id="lng" disabled=disabled> <br/>
     </div>
    </div>


        </div>
        <div class="col-xs-12 col-sm-6 gutter-bottom">
            <label for="" class="required">Map Preview</label>
    <div class='map-wrapper map-control'>
<!--       <label id="geo_label" for="reverseGeocode">Reverse Geocode after Marker Drag?</label>
      <select id="reverseGeocode">
        <option value="false" selected>No</option>
        <option value="true">Yes</option>
      </select><br/> -->

      <div id="map"></div>
      <div id="legend">You can drag and drop the marker to the correct location</div>
    </div>
               
    </div>

    </div>
</div>



<div class="form-group prepend-top">
        <label class="" for="">Approx’ Number Of Guests</label>
        <select class="col-xs-12 form-control form-group" name="" id="" >

            <option value="" selected="selected">Greater than 100</option>
            <option value="" selected="selected">90 - 100</option>
            <option value="" selected="selected">80 - 90</option>
            <option value="" selected="selected">70 - 80</option>
            <option value="" selected="selected">60 - 70</option>
            <option value="" selected="selected">50 - 60</option>
            <option value="" selected="selected">40 - 50</option>
            <option value="" selected="selected">30 - 40</option>
            <option value="" selected="selected">20 - 30</option>
            <option value="" selected="selected">10 - 20</option>
            <option value="" selected="selected">Less than 10</option>

        </select>
    </div>

    <div class="prepend-top form-group">
    <label class="pull-left required" for="">EVENT DESCRIPTION</label>
    <textarea class="form-control autoresized-textarea clear" rows="7" placeholder="Provide a more detailed description to help you get better staff" name="" id=""></textarea>
</div>

    <div class="prepend-top form-group">
    <label class="pull-left required" for="">STARTING INSTRUCTIONS</label>
   <input placeholder="Meet at the reception." class="form-control" name="" id="" type="text" maxlength="85" value="">

   </div>

<div class="form-group prepend-top">
        <label class="" for="">Approx’ Number Of Waiter Required</label>
        <select class="col-xs-12 form-control form-group" name="" id="" >
            <option value="" selected="selected">Greater than 50</option>
            <option value="" selected="selected">40 - 50</option>
            <option value="" selected="selected">30 - 40</option>
            <option value="" selected="selected">10 - 20</option>
            <option value="" selected="selected">6 - 10</option>
            <option value="" selected="selected">1-5</option>
        </select>
    </div>

<div class="form-group prepend-top clearfix row">
    <label class="pull-left col-xs-12 required" for="Uniform_bracket">Uniform</label>
    <input id="ytProjects_budget_bracket" type="hidden" value="" name="Projects[budget_bracket]">
    <div id="Uniform_bracket">
        <span class="col-xs-12 col-sm-4 xpBox">
            <input class="experience-level form-control" id="Projects_budget_bracket_0" value="1" type="radio" name="">
            <label for="Projects_budget_bracket_0">
                <div class="xpHead">Black Tie</div>
                <div class="xpBody">Black waitcoat, white shirt, black trousers, black shoes, skinny black tie.</div>
            </label>
        </span>
        <span class="col-xs-12 col-sm-4 xpBox">
            <input class="experience-level form-control" id="Uniform_bracket_1" value="2" type="radio" name="">
            <label for="Uniform_bracket_1">
                <div class="xpHead">White Shirt Black Tie</div>
                <div class="xpBody">White shirt, black trousers, black shoes, skinny black tie</div>
            </label>
        </span>

        <span class="col-xs-12 col-sm-4 xpBox">
            <input class="experience-level form-control" id="Uniform_bracket_2" value="3" type="radio" name="Projects[budget_bracket]">
            <label for="Uniform_bracket_2">
                <div class="xpHead">Custom</div>
                <div class="xpBody">
    <textarea class="form-control autoresized-textarea clear" rows="4" placeholder="Custom uniform requirements." name="" id=""></textarea>
                </div>
            </span>

                </div>
            </label>
        </span>
    </div>
</div>

<div class="prepend-top clearfix">
        <div class="form-group clearfix">
            <label class="pull-left" for="">UNIFORM PROVIDED?</label>
            <span class="pull-right popover-toggle tooltip-visible-lg" data-content-selector="#privacy-suggestion-content" data-trigger="hover" data-class="info" data-placement="right">
            <i class="color-info fa fa-question-circle"></i></span>
            <span class="pull-right bootbox-toggle clickable tooltip-hidden-lg" data-content-selector="#privacy-suggestion-content" data-trigger="click" title="Help tip">
            <i class="color-info fa fa-question-circle"></i>
            </span>
            <div style="display: none !important;" id="help-content-566f18445e97b">
                
            </div>        
            </div>

        <div class="clearfix privacy-selector">
                            <div>
                    <input value="Y" name="Projects[privacy]" id="" class="pull-left" checked="checked" type="radio">                   
                    <label for="Projects_privacy[Public]" class="normal">
                        <i class="color-gray fa fa-lock"></i>Yes</label>
                </div>
                            <div>
                    <input value="N" name="Projects[privacy]" id="" class="pull-left " type="radio">                    
                    <label for="Projects_privacy[Private]" class="normal">
                        <i class="color-gray fa fa-users"></i>No</label>
                </div>
                    </div>
    </div>

     <div class="row">
 <div class="col-xs-2"></div>
            <div class="col-xs-8">
<p class="centerText btn-group-justified">
    <a class="btn btn-submit btn-lg largeHeight" href="" role="button">SUBMIT EVENT</a>
</p>
        </div>
         <div class="col-xs-2"></div>
</div>
<!-- End demo -->



</div>

</form>


<!-- Footer Start -->
    <div class="container">


      <hr>

<?php 

echo file_get_contents($root . 'protocols/footer.php');

?>


    </div> <!-- /container -->        

        <script src="<?php echo $root . 'js/vendor/bootstrap.min.js'; ?>"></script>

        <script src="<?php echo $root . 'js/main.js';?>"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

        <!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

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
    },
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
    },
    "startDate": "12/14/2015",
    "endDate": "12/14/2015",
    "minDate": "12/14/2015"
}, function(start, end, label) {
  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
});




});

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
      },

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
    });

    var gmarker = addresspickerMap.addresspicker( "marker");
    gmarker.setVisible(true);
    addresspickerMap.addresspicker( "updatePosition");

    // $('#reverseGeocode').change(function(){
    //   $("#addresspicker_map").addresspicker("option", "reverseGeocode", ($(this).val() === 'true'));
    // });

    function showCallback(geocodeResult, parsedGeocodeResult){
      $('#callback_result').text(JSON.stringify(parsedGeocodeResult, null, 4));
    }
    // Update zoom field
    var map = $("#addresspicker_map").addresspicker("map");
    google.maps.event.addListener(map, 'idle', function(){
      $('#zoom').val(map.getZoom());
    });

  });
  </script>


    </body>
</html>
