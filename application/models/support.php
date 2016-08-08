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
    <title>
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
      body {
        padding-top: 50px;
        padding-bottom: 20px;
      }
    </style>
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/vendor/modernizr-2.8.3-respond-1.4.2.min.js">
    </script>
    <script src=
            "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src="../js/vendor/jquery-1.11.2.min.js">
    </script>
    <title>
    </title>
  </head>
  <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
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
        <a class="navbar-brand" href="' . $root . '">nector
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Events 
              <span class="caret">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="'. $root . 'pages/invite.php">Invite Staff
                </a>
              </li>
              <li>
                <a href="'. $root . 'pages/management.php">Management
                </a>
              </li>
              <li>
                <a href="'. $root . 'pages/myevents.php">My Events
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="#">Separated link
                </a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile 
              <span class="caret">
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="'. $root . 'pages/userprofile.php">Profile
                </a>
              </li>
              <li>
                <a href="'. $root . 'pages/paymentsstatements.php">Payments
                </a>
              </li>
              <li>
                <a href="'. $root . 'pages/usernotifications.php">Settings
                </a>
              </li>
              <li>
                <a href="'. $root . 'pages/support.php">Support
                </a>
              </li>
              <li role="separator" class="divider">
              </li>
              <li>
                <a href="#">Logout
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.navbar-collapse -->
    </div>
  </nav>
  <body>
    <div class="orangehead">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="dashboard_tab_wrapper">
              <div class="dashboard_tab bring-forward clicked">
                <a href="support.php">Get Support
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="hownectorworks.php">How Nector Works
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="nectorfaq.php">F.A.Q.
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="feescharges.php">Fees & Charges
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="jumbotron supportheader" id="supportImg">
      <div class="container">
        <h1 class="centerText">How may we help you?
        </h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 whiteBG invitebox supportBody">
          <h1>let us help you
          </h1>
          <hr>
          <form>
            <div class="row narrowrow">
              <div class="col-xs-12 gutter-bottom form-group">
                <label for="" class="required">Email Address
                </label>
                <input class="form-control " name="" id="" type="text" maxlength="40"> 
              </div>
              <div class="col-xs-12 col-sm-6 gutter-bottom form-group">
                <label for="" class="required">First Name
                </label>
                <input class="form-control " name="" id="" type="text" maxlength="40"> 
              </div>
              <div class="col-xs-12 col-sm-6 gutter-bottom form-group">
                <label for="" class="required">Last Name
                </label>
                <input class="form-control" name="" id="" type="text" maxlength="100">                    
              </div>       
              <div class="col-xs-12 gutter-bottom form-group">
                <label for="" class="required">Message
                </label>
                <textarea class="form-control" rows="5" id="comment">
                </textarea>
              </div>    
              <div class="col-xs-12 gutter-bottom form-group">
                <button type="button" class="btn btn-success btn-lg pull-right">Submit
                </button>
              </div>  
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Footer Start -->
    <div class="container">
      <hr>
      <footer>
        <p>&copy; Nector 2016
        </p>
      </footer>
    </div>
    <!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src="../js/vendor/jquery-1.11.2.min.js">
    </script>
    <script src="../js/vendor/bootstrap.min.js">
    </script>
    <script src="../js/main.js">
    </script>
  </body>
</html>
