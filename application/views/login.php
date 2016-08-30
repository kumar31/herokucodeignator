<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>OUTFIT - part of the party</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/popstyle.css?<?php echo time(); ?>" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>      
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	
	input[type="password"] {
		color: #000 !important;
	}
	.navbar-inverse {
		background-color: rgba(255, 255, 255, 1.0);
		border: 0;
		-webkit-box-shadow: none;
		-moz-box-shadow: none;
		box-shadow: none;
	}
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId      : '1762686114002525', // Set YOUR APP ID
		  channelUrl : '<?php echo base_url();?>index.php/login', // Channel File
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
	  
	   var usertype = $("input[name='user']:checked").val();

	   if(typeof usertype === "undefined") {
	   var usertype = ''; 
	   }
	   else {
	   var usertype = $("input[name='user']:checked").val();
	   }
		var url = '<?php echo base_url();?>index.php/fb';
	   
	   $.ajax({
		
		'type' : 'POST',
		'url': url,
		'data': {'usertype':usertype,'email':response.email,'id':response.id,'first_name':response.first_name,'last_name':response.last_name,'url':response.picture.data.url},
		//'dataType': 'json',
		success: function(data) {
		 
		 if(data == '1'){
		  window.location.assign("<?php echo base_url();?>index.php/client_dashboard");
		 }
		 if(data == '2'){
		  window.location.assign("<?php echo base_url();?>index.php/talent_dashboard");
		 }
		 if(data == '3'){
		  window.location.assign("<?php echo base_url();?>index.php/client_registration");
		 }
		 if(data == '4'){
		  window.location.assign("<?php echo base_url();?>index.php/talent_registration");
		 }
		}

	   });
	   
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
</head>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container nav-menu-style" style="width:100%;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a href="<?php echo site_url();?>/login"><img src="<?php echo base_url(); ?>img/logo-pop-transparent.png" class="logoo2"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li class="pull-left">
                        <a href="<?php echo site_url();?>/login" style="padding:0px 15px;"><img src="<?php echo base_url(); ?>img/logo-pop-transparent.png" class="logoo"></a>
                    </li>
                    <li class="pull-left">
                        <a href="<?php echo site_url();?>/client_registration" class="orange-nav">BUSINESS SIGN UP</a>
                    </li>
                    <li class="pull-left">
                        <a href="<?php echo site_url();?>/talent_registration" class="yellow-nav">TALENT APPLICATION</a>
                    </li>
					
					<li class="pull-right">
                        <!--<a href="<?php echo site_url();?>/login" class="gray-nav"><img src="<?php echo base_url(); ?>img/icon-signin.png" style="margin-right:5px;">SIGN IN</a>-->
                        <a href="" data-toggle="modal" data-target="#loginmyModal" class="gray-nav"><img src="<?php echo base_url(); ?>img/icon-signin.png" style="margin-right:5px;">SIGN IN</a>
                    </li>					
                    <li class="pull-right">
                        <a href="#" class="gray-nav" id="howwrks">HOW OUTFIT WORKS</a>
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
   <section id="home"> 
	<div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Event Talent On Demand</h1>
                <p class="lead">In a few easy clicks </p>
                <button onclick="location.href = '<?php echo site_url();?>/client_registration';" class="orange-button">GET STARTED</button><br><br><br> 
				
				<br><br>
				
            </div> 
        </div>
		
        <!-- /.row -->

    </div>
	
</section>
<section  id="how2"> 
	<div class="container" >

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>HOW OUTFIT WORKS</h1>
               
                
            </div> 
        </div>
		<div class="row">
            <div class="col-md-4 text-center">
               <h3>1. Select</h3> 
			   <img src="<?php echo base_url(); ?>img/icon_calendar.png">
               <p>Select the date, type of event<br> 
and location.
</p>
                
            </div> 
			<div class="col-md-4 text-center">
                
               <h3>2. Choose</h3> 
			   <img src="<?php echo base_url(); ?>img/icon_talent.png">
               <p>Handpick the talent, choose the uniform<br> 
and confirm the event.</p>
                
            </div> 
			<div class="col-md-4 text-center">
                
               <h3>3. Confirm</h3> 
			   <img src="<?php echo base_url(); ?>img/icon_checkmark.png">
               <p>Sign talent in and out and manage<br> 
payment in a few simple steps.
</p>
                
            </div> 
        </div>
</section>
<section id="how">
<div class="container">
		<div class="row text-center">
		<br><br><br><br>
			<img src="<?php echo base_url(); ?>img/13-layers.png" width="100%" style="max-width:632px;">
			<br><br><br><br>
		</div>
		<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<br><br>
			<ul class="list-work">
				<li>Quick and simple to use - your event can be staffed in a few easy clicks.</li>
				<li>Outfit keeps costs down because you are in control of the party.</li>
				<li>No agency fees or hidden costs.</li>
				<li>Read recent staff reviews and make your selection.</li>
				<li>All time sheets and payments tracked through Outfit making bookkeeping easy.</li>
				<li>No upfront payment or deposit - payment is done automatically once you check out your staff</li>
			</ul>
			
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-12 text-center">
		<br><br>
			<button onclick="location.href = '<?php echo site_url();?>/client_registration';" class="orange-button">CREATE AN EVENT</button><br>
		</div>
		</div>
		
        <!-- /.row -->

    </div>
</div>
</section>
<section>
	<div class="container">
		<div class="row" id="staff">
			<div class="col-md-12 text-center">
				<h1>STAFF TO SUIT</h1>
				<p>Outfit can provide the best staff for any occasion from intimate cocktail parties to large corporate events.<br> 
You can personally select the best servers, bartenders, greeters, coat check, hostesses,<br> 
event captains, street teams,top promotional models and brand ambassadors. 
<br><br>
The right Outfit makes a party. <br><br>
</p>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-3 text-center">
				<button onclick="location.href = '<?php echo site_url();?>/client_registration';" class="orange-button">CREATE AN EVENT </button>
			</div>
			<div class="col-md-3 text-center">
			<button onclick="location.href = '<?php echo site_url();?>/talent_registration';" class="yellow-button">TALENT SIGN UP</button></div>
			<div class="col-md-3"></div>
			
				
		
		</div>
	
	</div>
</section>
<section >
	<img src="<?php echo base_url(); ?>img/hd/city_v7-copy-wider.png" width="100%" style="margin-top:-50px;">
</section>
<section id="footer">
	<div class="container" style="width:100%">
		<div>
			<div class="col-md-2" style="padding:0px;">
				<img src="<?php echo base_url(); ?>img/logo2.png" style="margin-left:-20px;">
			</div>
			<div class="col-md-2">
				<p>ABOUT</p><br>
				<p><a href="<?php echo site_url();?>/about_us">About Us</a></p>
				<p><a href="<?php echo site_url();?>/outfit_faq">FAQs</a></p>
				<p><a href="<?php echo site_url();?>/outfit_support">Contact Us</a></p>
			</div>
			<div class="col-md-2">
				<p>PRIVACY</p><br>
				<p><a href="<?php echo site_url();?>/privacy">Privacy</a></p>
				<p><a href="<?php echo site_url();?>/terms">Terms & Conditions</a></p>
				
			</div>
			<div class="col-md-6 social">
					<li class="">
                        <!--<a href="<?php echo site_url();?>/login" class="gray-nav"><img src="<?php echo base_url(); ?>img/icon-signin.png" style="margin-right:5px;">SIGN IN</a>-->
                        <a style="color: white;" href="" data-toggle="modal" data-target="#loginmyModala" class=""><img src="<?php echo base_url(); ?>img/icon-signinw.png" style="margin-right:5px;">AGENT LOGIN</a>
                    </li>
				<a target="_blank" href="https://www.facebook.com/outfitstaff"><img src="<?php echo base_url(); ?>img/fb.png"></a><a target="_blank" href="https://twitter.com/OutfitStaff"><img src="<?php echo base_url(); ?>img/tw.png"></a><a target="_blank" href="https://www.instagram.com/outfit_staff/"><img src="<?php echo base_url(); ?>img/insta.png"></a><a target="_blank" href="<?php echo site_url();?>/outfit_support"><img src="<?php echo base_url(); ?>img/2-layers.png"></a>
			</div>
			<div class="col-md-12 text-center"> 
				<p> &copy; 2016 Outfit</p>
			</div>
		</div>
		
	
	</div>
</section>

<!-- Modal user -->
	  <div class="modal fade" id="loginmyModal" role="dialog">  
		<div class="logcontainer">
			<h1>Sign In
			<button type="button" class="close" data-dismiss="modal"><span style="color: white;" >&times;</span></button></h1>
			<div class="white-border"></div>
			<div class="formlg">
				
				<form role="form" target="_top" data-toggle="validator" enctype="multipart/form-data" id="myForm" method="POST" action="">
					<a style="cursor: pointer;" role="button" onclick="checktype();"><img src="<?php echo base_url(); ?>img/blue.png"></a> 
					<h5 style="color: red;" id="alertmsg" class="error_msg"></h5>
					<h3>Email</h3>
					<input name="" class="form-control" id="inputEmail" type="email" placeholder="Email" required>
						<div class="help-block with-errors"></div>
						
					<h3>Password</h3>
						<input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
						<p><a href="<?php echo site_url();?>/forgot_password">Forgot Password?</a></p>     
					
					<div class="form-group clearfix">
					
					 <div class="col-md-1 col-md-offset-2">
						  <label class="pull-left" for="">User
						  </label>  
					</div>		  
				   <div class="col-md-8">
						  <label class="radio-inline">
							<input type="radio" name="user" value="1" required>
							Business
						  </label>
						
						  <label class="radio-inline">
							<input type="radio" name="user" value="2" required>
							Talent
						  </label>
				  </div>
					  </div>
					
						<!--<a onclick="signin();" id="submit" name="submit" role="button"><img src="<?php echo base_url(); ?>img/red.png"></a>-->
						<button id="submit" name="submit" type="button" class="btn btn-danger btn-lg largeHeight orange-button">SIGN IN</button>   
						
					<p><br></p> 
					
					<p>Not a member yet? <a style="cursor: pointer;" href="<?php echo site_url();?>/client_registration" role="button">SIGN UP NOW</a></p> 
				</form> 
				
			</form>
			
			</div>
			<!--<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>-->
		</div>
	  </div>
	  
<!-- Modal admin -->
	  <div class="modal fade" id="loginmyModala" role="dialog">  
		<div class="logcontainer">
			<h1>Agent Sign In
			<button type="button" class="close" data-dismiss="modal"><span style="color: white;" >&times;</span></button></h1>
			<div class="white-border"></div>
			<div class="formlg">
				
				<form role="form" target="_top" data-toggle="validator" enctype="multipart/form-data" id="myForms" method="POST" action="">
					
					<h5 style="color: red;" id="alertmsgs" class="error_msg"></h5>
					<h3>Email</h3>
					<input name="" class="form-control" id="aemail" type="text" placeholder="Email" required>
						<div class="help-block with-errors"></div>
						
					<h3>Password</h3>
						<input type="password" data-minlength="6" class="form-control" id="apassword" placeholder="Password" required>
						<br>
						<!--<a onclick="signin();" id="submit" name="submit" role="button"><img src="<?php echo base_url(); ?>img/red.png"></a>-->
						<button id="agsubmit" name="agsubmit" type="button" class="btn btn-danger btn-lg largeHeight orange-button">SIGN IN</button>   
					
				</form> 
				
			</form>
			
			</div>
			<!--<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>-->
		</div>
	  </div>
	  <form id="clientlogin" action="<?php echo base_url();?>index.php/client_dashboard" method="POST">
		<input type="hidden" name="my_userid" id="usrid"> 
	  </form> 
	  <form id="talentlogin" action="<?php echo base_url();?>index.php/talent_dashboard" method="POST">
		<input type="hidden" name="my_userid" id="talid"> 
	  </form>
	  <form id="agentlogin" action="<?php echo base_url();?>index.php/agent_dashboard" method="POST">
		<input type="hidden" name="my_userid" id="agentid"> 
	  </form>
    <!-- /.container -->

    <script src="<?php echo base_url(); ?>js/vendor/jquery-1.11.2.min.js">
    </script>
    <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js">
    </script>
	<script src="<?php echo base_url(); ?>js/validator.js"></script>
 
  <script>
 
    $('#myForm').validator();
  
  </script>
  <script>
  $( "#submit" ).click(function() {
	  signin();
	  /*if (!$("input[name=user]:checked").val()) {
		$("#alertmsgusertype").text("Please select User Type");
		return false;
	  }*/
	});
  function signin(){
		var email = $("#inputEmail").val();
		var password = $("#inputPassword").val();
		var deviceid = "";
		var devicetype = "";
		var usertype = $("input[name='user']:checked").val();
			
			if(typeof usertype === "undefined") {
				var usertype = ''; 
			}
			else {
				var usertype = $("input[name='user']:checked").val();
			}
		
			var url = '<?php echo $webserviceurl; ?>index.php/login';
			//alert(email);alert(password);
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'email':email,'password':password,'deviceid':deviceid,'devicetype':devicetype,'type':usertype},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					
					if(message == "1") {
						if(usertype == "1") {
							var clientid = JSON.stringify(data['result']['client_id']);
							var clientid = clientid.replace(/\"/g, "");
							/*session(id);*/
							$('#usrid').val(clientid);
							$( "#clientlogin" ).submit();
							//window.location.assign("<?php echo base_url();?>index.php/client_dashboard/"+clientid );
						}
						if(usertype == "2") {
							var talentid = JSON.stringify(data['result']['talent_id']);
							var talentid = talentid.replace(/\"/g, "");
							$('#talid').val(talentid);
							$( "#talentlogin" ).submit();
							//window.location.assign("<?php echo base_url();?>index.php/talent_dashboard/"+talentid);
						}						
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
  function checktype() {
	   if (!$("input[name='user']:checked").val()) {
		 var alertmessage = "Select user type";
		 $("#alertmsg").text(alertmessage);
	  }
	  else {
		Login();
	  }
  }
  /*function checktype() {
	  if (!$("input[name='user']:checked").val()) {
		   var alertmessage = "Select user type";
		   $("#alertmsg").text(alertmessage);
		}
		else {
		  window.location.assign("<?php echo base_url();?>index.php/fb");
		}
  }*/
  
  function signupchk() {
	  if (!$("input[name='user']:checked").val()) {
		   var alertmessage = "Select user type";
		   $("#alertmsg").text(alertmessage);
		}
		if ($("input[name='user']:checked").val() == "1") { 
		  window.location.assign("<?php echo base_url();?>index.php/client_registration");
		}
		if ($("input[name='user']:checked").val() == "2") { 
		  window.location.assign("<?php echo base_url();?>index.php/talent_registration");
		}
  }
	$("#howwrks").click(function() {
		$('html, body').animate({
			scrollTop: $("#how2").offset().top - 70
		}, 2000);
	});
	
	$( "#agsubmit" ).click(function() {
	  agsignin();
	});
  function agsignin(){
		var email = $("#aemail").val();
		var password = $("#apassword").val();
		
			var url = '<?php echo $webserviceurl; ?>index.php/agent_login';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'email':email,'password':password},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					
					if(message == "1") {						
						var agentid = JSON.stringify(data['result']['agent_id']);
						var agentid = agentid.replace(/\"/g, "");
						$('#agentid').val(agentid);
						$( "#agentlogin" ).submit();
						/*session(id);*/
						//window.location.assign("<?php echo base_url();?>index.php/agent_dashboard/"+agentid );												
					}
					else {
						var alertmessage = JSON.stringify(data['message']);
						var alertmessage = alertmessage.replace(/\"/g, "");
						$("#alertmsgs").text(alertmessage);
					}
				}
			
			});

	}
  <?php if ( getenv( 'SOIREE_REQUIRE_TLS' ) == 'true' ) : ?>
    if ( window.location.protocol != 'https:' ) {
      window.location.href = "https:" + window.location.href.substring( window.location.protocol.length );
    }
  <?php endif; ?>
  </script>
</body>

</html>
