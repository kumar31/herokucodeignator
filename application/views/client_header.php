<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
  <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<?php $url = $this->uri->segment(1); ?>
	<?php 
		if($url == 'client_registration'){ ?>
    <title>Client Registration </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_dashboard'){ ?>
    <title>Client Dashboard </title>
	<?php 	}
			?>
	<?php 
		if($url == 'login'){ ?>
    <title>Login </title> 
	<?php 	}
			?>
	<?php 
		if($url == 'search_talent'){ ?>
    <title>Search Talent </title>
	<?php 	}
			?>
	<?php 
		if($url == 'create_event'){ ?>
    <title>Create Event </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'myevents_client'){ ?>
    <title>Upcoming Events </title>
	<?php 	}
			?>		
	<?php 
		if($url == 'management'){ ?>
    <title>Management </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'manage_events'){ ?>
    <title>My Active Events</title>
	<?php 	}
			?>	
	<?php 
		if($url == 'client_profile_update'){ ?>
    <title>My profile </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_truth_verification'){ ?>
    <title>Truth & verification </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_email_notification'){ ?>
    <title>Email Notification </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_password_update'){ ?>
    <title>Password update </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_update_payment_details'){ ?>
    <title>Payment details </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_account_close'){ ?>
    <title>Account close </title>
	<?php 	}
			?>
	<?php 
		if($url == 'invite_talent'){ ?>
    <title>Invite talent </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'invite_talent_search'){ ?>
    <title>Invite talent </title>
	<?php 	}
			?>
	<?php 
		if($url == 'support'){ ?>
    <title>Support </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'event_detail'){ ?>
    <title>Event Details </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'client_proposals_pending'){ ?>
    <title>Proposals </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_proposals_hired'){ ?>
    <title>Proposals </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_proposals_applied'){ ?>
    <title>Proposals </title>
	<?php 	}
			?>
	<?php 
		if($url == 'edit_event'){ ?>
    <title>Edit event </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_how_outfit_works'){ ?>
    <title>How outfit works </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'talent_detail'){ ?>
    <title>Talent details </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'myevents_client_closed'){ ?>
    <title>Past events </title>
	<?php 	}
			?>	
	<?php 
		if($url == 'home_success'){ ?>
    <title>Home </title>
	<?php 	}
			?>
	<?php 
		if($url == 'project_details'){ ?>
    <title>Project Details </title>
	<?php 	}
			?>
	<?php 
		if($url == 'create_event_with_talents'){ ?>
    <title>Create Event </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_payments'){ ?>
    <title>Invoices </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_fee_charges'){ ?>
    <title>Fees & Charges </title>
	<?php 	}
			?>
	<?php 
		if($url == 'client_faq'){ ?>
    <title>FAQ </title>
	<?php 	}
			?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>apple-touch-icon.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css?<?php echo time(); ?>"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/build.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/scrollToTop.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/easing.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/star-rating.css">
	<link href="<?php echo base_url(); ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" />   
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
        <a href="<?php echo site_url();?>/home_success"><img src="<?php echo base_url();?>img/logo transparent.png" class="logoo2"></a>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
		<li>
			<a href="<?php echo site_url();?>/create_event">Create event
			</a>
		  </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events 
              <span class="caret">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo site_url();?>/myevents_client">Upcoming Events
                </a>
              </li>                 
			  <li>
                <a href="<?php echo site_url();?>/manage_events">My Active Events
                </a>
              </li> 
            </ul>
          </li>
		  <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Talent
              <span class="caret">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo site_url();?>/invite_talent">Invite talent
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
                <a href="<?php echo site_url();?>/client_profile_update">My Profile
                </a>
              </li>
              <li>
                <a href="<?php echo site_url();?>/client_payments">Invoices
                </a>
              </li>
              <li>
                <a href="<?php echo site_url();?>/client_profile_update">Settings
                </a>
              </li>
              <li>
                <a href="<?php echo site_url();?>/support">Support
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="<?php echo site_url();?>/client_logout">Logout
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