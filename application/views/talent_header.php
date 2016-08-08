<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> 
  <!--<![endif]-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <?php $url = $this->uri->segment(1); ?>
  <?php $myuser_id = $this->session->userdata('talent_id');  ?>
	<?php 
		if($url == 'talent_dashboard'){ ?>
    <title>Talent Dashboard </title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_invited_view'){ ?>
    <title>Invited Events </title>
	<?php 	}
			?>
	<?php 
		if($url == 'event_detail_talent'){ ?>
    <title>Event Detail </title>
	<?php 	}
			?>
	<?php 
		if($url == 'event_detail_talent_invited'){ ?>
    <title>Event Detail </title>
	<?php 	}
			?>
	<?php 
		if($url == 'confirmed_events_talent'){ ?>
    <title>Confirmed Events</title>
	<?php 	}
			?>
	<?php 
		if($url == 'event_detail_talent_pending'){ ?>
    <title>Event Detail </title>
	<?php 	}
			?>
	<?php 
		if($url == 'pending_events_talent'){ ?>
    <title>Pending Events </title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_profile_update'){ ?>
    <title>My Profile</title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_email_notification'){ ?>
    <title>Notifications</title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_password_update'){ ?>
    <title>Password</title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_account_close'){ ?>
    <title>Close account</title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_update_payment_details'){ ?>
    <title>Payment details</title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_support'){ ?>
    <title>Support</title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_how_outfit_works'){ ?>
    <title>How outfit works</title>
	<?php 	}
			?>
	<?php 
		if($url == 'closed_events_talent'){ ?>
    <title>Closed events </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'talent_fill_timesheet'){ ?>
    <title>Fill timesheet </title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_truth_verification'){ ?>
    <title>Truth & verification </title>
	<?php 	}
			?>
	<?php 
		if($url == 'event_detail_talent_closed'){ ?>
    <title>Event Detail </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'event_detail_talent_confirmed'){ ?>
    <title>Event Detail </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'talent_payments'){ ?>
    <title>Invoices </title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_fee_charges'){ ?>
    <title>Fees & Charges </title>
	<?php 	}
			?>
	<?php 
		if($url == 'talent_faq'){ ?>
    <title>FAQ </title>
	<?php 	}
			?>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>apple-touch-icon.png">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/build.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/scrollToTop.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/easing.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" /> 
  <style>
    body {
      padding-top: 50px;
      padding-bottom: 20px;
    }
	
  </style>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css?<?php echo time(); ?>">
  <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.8.3-respond-1.4.2.min.js">
  </script>
  <script src="<?php echo base_url(); ?>js/vendor/jquery-1.11.2.min.js">
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
  <!-- MAP SCRIPTS END -->
  
  </head>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container nav-menu-style" style="width:98%">  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation
        </span>
        <span class="icon-bar">
        </span>
        <span class="icon-bar">
        </span>
        <span class="icon-bar">
        </span>
      </button>
      <a href="<?php echo site_url();?>/talent_dashboard/<?php echo $myuser_id; ?>"><img src="<?php echo base_url();?>img/logo transparent.png" class="logoo2"></a>
      </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Jobs 
            <span class="caret">
            </span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo site_url();?>/talent_dashboard/<?php echo $myuser_id; ?>">Job listings
              </a>
            </li>
            <li>
              <a href="<?php echo site_url();?>/confirmed_events_talent">Confirmed
              </a>
            </li>
			<li>
              <a href="<?php echo site_url();?>/closed_events_talent">Closed
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Profile 
            <span class="caret">
            </span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a href="<?php echo site_url();?>/talent_profile_update">My Profile
              </a>
            </li>
            <li>
              <a href="<?php echo site_url();?>/talent_payments">Invoices
              </a>
            </li>
            <li>
              <a href="<?php echo site_url();?>/talent_profile_update">Settings
              </a>
            </li>
            <li>
              <a href="<?php echo site_url();?>/talent_support">Support
              </a>
            </li>
            <li role="separator" class="divider">
            </li>
            <li>
              <a href="<?php echo site_url();?>/talent_logout">Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!--/.navbar-collapse -->
  </div>
</nav>
<!--<div class="se-pre-con"></div>-->