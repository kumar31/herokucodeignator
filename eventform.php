<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
   
<?php 
$domainRootName = "nector";
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . $domainRootName . '/';
?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="<?php echo $root . 'css/bootstrap.min.css'; ?>">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo $root . 'css/bootstrap-theme.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $root . 'css/main.css'; ?>">

        <script src="<?php echo $root . 'js/vendor/modernizr-2.8.3-respond-1.4.2.min.js'; ?>"></script>
    </head>
    <body>

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
     <form id="eventForm" class="form-horizontal" onsubmit="return false">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="eventName">Event Name</label>  
  <div class="col-md-4">
  <input id="eventName" name="eventName" type="text" placeholder="The ball" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="eventType">Event Type</label>
  <div class="col-md-4">
    <select id="eventType" name="eventType" class="form-control">
      <option value="sitdownService">Sit Down Service</option>
      <option value="trayService">Tray Service</option>
      <option value="mixedService">Mixed Service</option>
    </select>
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="eventDescription">Event Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="eventDescription" name="eventDescription">Meeting of all the greatest minds in the kingdom</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address1">Address Line 1</label>  
  <div class="col-md-4">
  <input id="address1" name="address1" type="text" placeholder="placeholder" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address2">Address Line 2</label>  
  <div class="col-md-4">
  <input id="address2" name="address2" type="text" placeholder="placeholder" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">City</label>  
  <div class="col-md-4">
  <input id="city" name="city" type="text" placeholder="New York" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="state">State</label>  
  <div class="col-md-4">
  <input id="state" name="state" type="text" placeholder="placeholder" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="zipCode">Zip Code</label>  
  <div class="col-md-4">
  <input id="zipCode" name="zipCode" type="text" placeholder="placeholder" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="eventStart">Event Start Time</label>  
  <div class="col-md-4">
  <input id="eventStart" name="eventStart" type="text" placeholder="placeholder" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Event End">Event End</label>  
  <div class="col-md-4">
  <input id="Event End" name="Event End" type="text" placeholder="placeholder" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="meetingPoint">Meeting Point Instructions</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="meetingPoint" name="meetingPoint">Staff must be present at entrance 4</textarea>
  </div>
</div>





<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="skillsRequired">Additional Skills?</label>
  <div class="col-md-4">

     <input type="checkbox" name="skills[]" value="barService"><label>Bar Skills - Beer, wine and soda</label><br>
    <input type="checkbox" name="skills[]" value="silverService"><label>French/Silver Service</label><br>
    <input type="checkbox" name="skills[]" value="cocktailSkills"><label>Cocktail Making Skills</label>

  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Staff Gender?</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="gender-0">
      <input type="radio" name="gender" id="gender-0" value="Either" checked="checked">
      Either
    </label> 
    <label class="radio-inline" for="gender-1">
      <input type="radio" name="gender" id="gender-1" value="Female">
      Female
    </label> 
    <label class="radio-inline" for="gender-2">
      <input type="radio" name="gender" id="gender-2" value="Male">
      Male
    </label>
  </div>
</div>

<!-- Select Multiple -->
<div class="form-group">
  <label class="col-md-4 control-label" for="languages">Required Languages</label>
  <div class="col-md-4">
   <!--  <input type="checkbox" name="languages[]" value="English" checked="checked"><label>English</label>
    <input type="checkbox" name="languages[]" value="Spanish"><label>Spanish</label>
    <input type="checkbox" name="languages[]" value="Mandarin"><label>Mandarin</label> -->

<ul id="languagesSelected">
</ul>

<input type="text" value="" placeholder="Search" id="keyword">

<div id="resultsLanguage">
</div>

    </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit">Submit Event</label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>

<div class="col-md-3"></div>
  <div class="col-md-5">
  <img src="ajax-loader.gif" style="display:none;" id="loading"/>
<p id="info"></p>
</div><div class="col-md-3"></div>


      </div>

      <hr>

      <footer>
        <p>&copy; Company 2015</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $root . 'js/vendor/jquery-1.11.2.min.js'; ?>"><\/script>')</script>

        <script src="<?php echo $root . 'js/vendor/bootstrap.min.js'; ?>"></script>

        <script src="<?php echo $root . 'js/main.js';?>"></script>

         <script src="<?php echo $root . 'js/search.js';?>"></script>

         <script src="<?php echo $root . 'js/auto-complete.js';?>"></script>
    </body>
</html>
