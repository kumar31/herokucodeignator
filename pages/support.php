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
                    <div class="dashboard_tab bring-forward clicked">
                      <a href="support.php">Get Support</a>
                    </div>


                    <div class="dashboard_tab bring-forward">
                      <a href="hownectorworks.php">How Nector Works</a>
                    </div>

                      <div class="dashboard_tab bring-forward">
                      <a href="nectorfaq.php">F.A.Q.</a>
                    </div>

                      <div class="dashboard_tab bring-forward">
                      <a href="feescharges.php">Fees & Charges</a>
                    </div>

                   </div>


               
            </div>
        </div>
    </div>
    </div>

    <div class="jumbotron supportheader" id="supportImg">
  <div class="container">
    <h1 class="centerText">How may we help you?</h1>
     
  </div>
</div>


    <div class="container">
        <div class="row">

            <div class="col-sm-12 whiteBG invitebox supportBody">
            <h1>let us help you</h1>
            <hr>
            <form>
            <div class="row narrowrow">
<div class="col-xs-12 gutter-bottom form-group">
<label for="" class="required">Email Address</label>
            <input class="form-control " name="" id="" type="text" maxlength="40"> 
            </div>

<div class="col-xs-12 col-sm-6 gutter-bottom form-group">
            <label for="" class="required">First Name</label>
            <input class="form-control " name="" id="" type="text" maxlength="40"> 
        </div>

        <div class="col-xs-12 col-sm-6 gutter-bottom form-group">
            <label for="" class="required">Last Name</label>
                <input class="form-control" name="" id="" type="text" maxlength="100">                    
            </div>       

            <div class="col-xs-12 gutter-bottom form-group">
<label for="" class="required">Message</label>
           <textarea class="form-control" rows="5" id="comment"></textarea>
 
            </div>    

               <div class="col-xs-12 gutter-bottom form-group">

           <button type="button" class="btn btn-success btn-lg pull-right">Submit</button>
            </div>  

                    </div>
                    </form>
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