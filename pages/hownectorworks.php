<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js" lang="">
<!--<![endif]-->
<?php

require '../settings.php';


?>

<head>
    <?php 

        echo file_get_contents($root . 'protocols/header.php');

        ?>
    <script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script>
    window.jQuery || document.write('<script src="<?php echo $root . 'js/vendor/jquery-1.11.2.min.js'; ?>"><\/script>')
    </script>

    <title>
    </title>
</head>

<?php 

echo file_get_contents($root . 'protocols/menu.php');

?>

<body>
    <div class="orangehead">
    <div class="container">
        <div class="row">
            <div class="col-md-10">

                       <div class="dashboard_tab_wrapper">
                    <div class="dashboard_tab bring-forward">
                      <a href="support.php">Get Support</a>
                    </div>


                    <div class="dashboard_tab bring-forward clicked">
                      <a href="#">How Nector Works</a>
                    </div>

                      <div class="dashboard_tab bring-forward">
                      <a href="#">F.A.Q.</a>
                    </div>

                      <div class="dashboard_tab bring-forward">
                      <a href="#">Fees & Charges</a>
                    </div>

                   </div>


               
            </div>
        </div>
    </div>
    </div>

    <div class="jumbotron supportheader" id="worksImg">
  <div class="container centerText">
  <div class="row">
   <div class="col-sm-2"></div>
  <div class="col-xs-12 col-sm-8">
    <h1>How Nector Works</h1>
    <h3>Find the right person for the job here on nector.com! With hundreds of talented waiters, you can get help with your event within hours of posting!</h3>
</div>
<div class="col-sm-2"></div>
  </div>
  </div>
</div>


    <div class="container">
        <div class="row">

            <div class="col-sm-12 whiteBG invitebox supportBody">
            <h1>premier catering</h1>
            <hr>
            </div>
        </div>

        <div class="row">
        <div class="col-sm-2">
        </div>
        </div>


    </div>
    <!-- Footer Start -->


    <div class="container">
        <hr>
        <?php 

                echo file_get_contents($root . 'protocols/footer.php');

                ?>
    </div>
    <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $root . 'js/vendor/jquery-1.11.2.min.js'; ?>"><\/script>')</script>

        <script src="<?php echo $root . 'js/vendor/bootstrap.min.js'; ?>"></script>

        <script src="<?php echo $root . 'js/main.js';?>"></script>
</body>
</html>