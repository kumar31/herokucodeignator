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
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> 
    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	a:hover, a:focus {
		text-decoration: none !important;
	}
    </style>
	
	<style>
    body {
      padding-top: 50px;
      padding-bottom: 20px;
    }
	  </style>
	  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
	  <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js">
	  </script>
	  <!-- Map Scripts START -->
	  <link rel="stylesheet" href="<?php echo base_url(); ?>css/base/jquery.ui.all.css">
	  <script src="http://maps.google.com/maps/api/js?sensor=false">
	  </script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
	  </script>
	  <script src="<?php echo base_url(); ?>js/vendor/jquery-1.11.2.min.js">
	  </script>
	  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js">
	  </script>
	  <script src="<?php echo base_url(); ?>js/address/jquery.ui.addresspicker.js">
	  </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

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
               <a href="#"><img src="<?php echo base_url(); ?>img/logo-pop-transparent.png" class="logoo2"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li class="pull-left">
                        <a href="" style="padding:0px 15px;"><img src="<?php echo base_url(); ?>img/logo-pop-transparent.png" class="logoo"></a>
                    </li>
                    <li class="pull-left">
                        
                    </li>
                    <li class="pull-left">
                        
                    </li>
					<!--<li class="pull-right">
                        <!--<a href="<?php echo site_url();?>/login" class="gray-nav"><img src="<?php echo base_url(); ?>img/icon-signin.png" style="margin-right:5px;">SIGN IN</a>
                        <a href="" data-toggle="modal" data-target="#loginmyModal" class="gray-nav"><img src="<?php echo base_url(); ?>img/icon-signin.png" style="margin-right:5px;">SIGN IN</a>
                    </li>-->
                    <li class="pull-right">
                        
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
     
	<?php 
	
	$user_id = $this->uri->segment(2);
	$type = $this->uri->segment(3);
	
	if($type == 1) {
		
		$sql="SELECT * FROM client_details where client_id='$user_id'";
		$data = mysql_query($sql);
		$row = mysql_fetch_array($data);
		//echo $row['email'];
	}
	
	if($type == 2) {
		
		$sql="SELECT * FROM talent_details where talent_id='$user_id'";
		$data = mysql_query($sql);
		$row = mysql_fetch_array($data);
		//echo $row['email'];
	}
	
	?>
	<div class="container whiteBG">
        <div class="card card-container col-md-5 col-md-push-3">
			<div class="row">
				<div class="col-md-12">
					<header class="clearfix tet-center">
					  <h1 class="form-title">Forgot Password</h1>
					  <aside class="below">
						  Reset your password here
						</aside>
					</header>
					<!--<span>
						<img class="pull-left" style="width: 80px; height: 80px;margin-bottom: 20px;margin-right: 20px;" src="<?php echo $row['profile_url']; ?>" alt="" title="" />
						<p><b><?php echo $row['first_name']; ?></b></p>
					</span>-->
				</div>	
			</div>	
			<br>
			<div class="row">
        		<div class="col-md-12">
				<!--<p style="color: #65696e;">Please enter a password containing atleast 6 characters</p>-->
					<form role="form" method="POST" action="">
					  <div class="form-group">
						<label for="pwd">Type your new password</label>
						<div style="color: red;"><?php echo form_error('password'); ?></div>
						<input type="password" name="password" class="form-control" id="pwd">
					  </div>
					  <div class="form-group">
						<label for="repwd">Re-enter your new password</label>
						<div style="color: red;"><?php echo form_error('passconf'); ?></div>
						<input type="password" name="passconf" class="form-control" id="repwd">
					  </div>
					  <button type="submit" class="btn btn-submit center-block">&nbsp;Submit&nbsp;</button>
					</form>
				</div>
        	</div>
        </div><!-- /card-container -->
    </div><!-- /container -->
    
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
  </body>
</html>