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
                           <h1>Notifications</h1>
                           
                        </div>
                    </div>


                    <div class="row">
                    <div class="col-xs-12">
                    <hr>
                    <h4>Change Email</h4>     
                    </div> 
                         
                    </div>


 <div class="prepend-top form-group">
    <label class="pull-left required" for="">email address</label>
   <input class="form-control" name="" id="" type="text" maxlength="85" value="">
   
<div class="invitebutton">
                                    <p class="centerText btn-group-justified">
                                    <a class="btn btn-submit btn-lg largeHeight" href="" role="button">Update Email Address</a>
                                    </p>
                                </div>
   </div>

          <div class="row">
                    <div class="col-xs-12">
                    <hr>
                    <h4>Digest emails for your posted events</h4>     
                    </div>                
                    </div>


 <div class="prepend-top form-group">
    <label class="pull-left required" for="">Email frequency for project related activity</label>
                          <select class=
                        "col-xs-12 form-control form-group" id="" name="">
                           

                            <option selected="selected" value="">
                                20 - 30
                            </option>

                            <option selected="selected" value="">
                                10 - 20
                            </option>

                            <option selected="selected" value="">
                                Default
                            </option>
                        </select>
<label class="pull-left required" for="">Receive the first 3 notifications immediately. Then project activity summaries after 15, 30 and 45 minutes, then after 2 and 6 hours, and then daily.</label>
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