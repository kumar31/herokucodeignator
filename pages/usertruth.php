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

<?php 

  echo file_get_contents($root . 'protocols/mobileprofilemenu.php');

?>





    <div class="container">
        <div class="row">


<?php 

  echo file_get_contents($root . 'protocols/desktopprofilemenu.php');

?>




            <div class="col-sm-8 whiteBG invitebox topmargin30 profile">
                <div>
                    <div class="row">
                        <div class="col-xs-12">
                           <h1>Trust & Verification</h1>
                           
                        </div>
                    </div>


                    <div class="row">
                    <div class="col-xs-12">
                    <hr>
                    <h4>Email Address</h4> 
                    <p>A confirmed email is important to allow us to securely communicate with you.</p>
                    
                    <span class="inline"><h4>johnywalker@walker.com</h4> <h4 id="confirmed">confirmed</h4> </span>
                    <div class="invitebutton">
                                    <p class="centerText btn-group-justified">
                                    <a class="btn btn-submit btn-lg largeHeight" href="" role="button">Change Email</a>
                                    </p>
                                </div>
                    </div>                
                    </div>

                    <div class="row">
                    <div class="col-xs-12">
                    <hr>
                    <h4>Phone Number</h4> 
                    <p>Make it easier to communicate with a verified phone number. We'll send you a code by SMS or read it to you over the phone.</p>
                    <h4>NO PHONE NUMBER ENTERED</h4> 
                    <div class="invitebutton">
                                    <p class="centerText btn-group-justified">
                                    <a class="btn btn-submit btn-lg largeHeight" href="" role="button">Add Phone Number</a>
                                    </p>
                                </div>
                    </div>                
                    </div>






                </div>
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