<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<?php $url = $this->uri->segment(1); ?>
    <?php $myuser_id = $this->session->userdata('admin_id');
		   if($myuser_id == ''){
				$myuser_id = $this->input->cookie('admin',true);
			} ?>
	
	<?php if($url == 'admin_dashboard') { ?>
			<title>OUTFIT - Agents List</title>
		<?php
	} ?>
	
	<?php if($url == 'event_type') { ?>
			<title>OUTFIT - Event Type List</title>
		<?php
	} ?>
	
	<?php if($url == 'admin_settings') { ?>
			<title>OUTFIT - Admin Settings</title>
		<?php
	} ?>
	
	<?php if($url == 'contractor_pay') { ?>
			<title>OUTFIT - Talent Hourly Pay</title>
		<?php
	} ?>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/style.css?<?php echo time(); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/scrollToTop.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> 
    <!-- Custom CSS -->
    <style>
		body {
			padding-top: 8%;
			margin-bottom: 5%;
			/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
		}
		a:hover, a:focus {
			text-decoration: none !important;
		}
		.modal-footer {
			border-top: 0px;
		}
    </style>
	
	  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css?<?php echo time(); ?>">
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
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
	  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js">
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
        <div class="container nav-menu-style" style="width:100%; padding-bottom: 10px;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <a href="<?php echo site_url();?>/admin_dashboard"><img src="<?php echo base_url(); ?>img/logo-pop-transparent.png" class="logoo2 logoo3"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li class="pull-left">
                        <a href="<?php echo site_url();?>/admin_dashboard" style="padding:0px 15px;"><img src="<?php echo base_url(); ?>img/logo-pop-transparent.png" class="logoo"></a>
                    </li>
                    <li class="pull-left">
                        <a href="<?php echo site_url();?>/admin_dashboard" class="orange-nav">AGENCY</a>
                    </li>
					<li class="pull-left">
                        <a href="<?php echo site_url();?>/contractor_pay" class="yellow-nav">TALENT HOURLY PAY</a>
                    </li>
                    <!---<li class="pull-left">
                        <a href="<?php echo site_url();?>/event_type/<?php echo $myuser_id; ?>" class="yellow-nav">EVENT TYPE</a>
                    </li>-->
					<li class="pull-left">
                        <a href="<?php echo site_url();?>/admin_settings" class="yellow-nav">SETTINGS</a>
                    </li>
					<!--<li class="pull-right">
                        <!--<a href="<?php echo site_url();?>/login" class="gray-nav"><img src="<?php echo base_url(); ?>img/icon-signin.png" style="margin-right:5px;">SIGN IN</a>
                        <a href="" data-toggle="modal" data-target="#loginmyModal" class="gray-nav"><img src="<?php echo base_url(); ?>img/icon-signin.png" style="margin-right:5px;">SIGN IN</a>
                    </li>-->
                    <li class="pull-right">
                        <a href="<?php echo site_url();?>/admin_logout" class="gray-nav">LOGOUT</a>
                    </li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>