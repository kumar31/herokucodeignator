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
                           <h1>Profile Details</h1>
                           
                        </div>
                    </div>


                    <div class="row">
                    <div class="col-xs-12">
                    <hr>
                    <h4>Name</h4>     
                    </div>                
                    </div>

                    <div class="row">
<div class="col-xs-12 col-sm-6 gutter-bottom">
            <label for="" class="required">First Name</label>
            <input class="form-control " name="" id="" type="text" maxlength="40"> 
        </div>
        <div class="col-xs-12 col-sm-6 gutter-bottom">
            <label for="" class="required">Last Name</label>
                <input class="form-control" name="" id="" type="text" maxlength="100">                    
            </div>           

                    </div>

                <div class="row">
                    <div class="col-xs-12">
                    <hr>
                    <h4>Address</h4>     
                    </div>                
                    </div>

 <div class="prepend-top form-group">
    <label class="pull-left required" for="">ADDRESS</label>
   <input class="form-control" name="" id="" type="text" maxlength="85" value="">
   <input class="form-control topspacer" name="" id="" type="text" maxlength="85" value="">

   </div>

    <div class="prepend-top form-group">
    <label class="pull-left required" for="">CITY</label>
   <input class="form-control" name="" id="" type="text" maxlength="85" value="">

   </div>

       <div class="prepend-top form-group">
    <label class="pull-left required" for="">ZIP CODE</label>
   <input class="form-control" name="" id="" type="text" maxlength="85" value="">

   </div>

          <div class="prepend-top form-group">
    <label class="pull-left required" for="">COUNTRY</label>
   <input class="form-control" name="" id="" type="text" maxlength="85" value="">

   </div>

             <div class="prepend-top form-group">
    <label class="pull-left required" for="">COMPANY</label>
   <input class="form-control" name="" id="" type="text" maxlength="85" value="">

   </div>

   <div class="form-group prepend-top">
        <label class="" for="">TIME ZONE</label>
        <select class="col-xs-12 form-control form-group" name="" id="">
            <option value="" selected="selected">EST</option>

        </select>
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