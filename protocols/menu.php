<?php

include ('../settings.php');

echo '


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
          <a class="navbar-brand" href="' . $root . '">nector</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
    
<ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Events <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="'. $root . 'pages/invite.php">Invite Staff</a></li>
            <li><a href="'. $root . 'pages/management.php">Management</a></li>
            <li><a href="'. $root . 'pages/myevents.php">My Events</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="'. $root . 'pages/userprofile.php">Profile</a></li>
            <li><a href="'. $root . 'pages/paymentsstatements.php">Payments</a></li>
            <li><a href="'. $root . 'pages/usernotifications.php">Settings</a></li>
            <li><a href="'. $root . 'pages/support.php">Support</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </li>
      </ul>


        </div><!--/.navbar-collapse -->
      </div>
    </nav>

' ;?>