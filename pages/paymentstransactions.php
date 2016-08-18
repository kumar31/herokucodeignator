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







    <div class="container">
        <div class="row">

            <div class="col-sm-8 whiteBG paymentsbox topmargin30 profile">
                <div>
                    <div class="row">
                        <div class="col-xs-12">
                           <h1>Payments <small>Transactions</small></h1>
                           
                        </div>
                    </div>

<?php

echo file_get_contents($root . 'protocols/paymentsmenu.php');

?>





 <table class="table topmargin">
    <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th id='substatustitleright'>Amount</th>
        </tr>
    </thead>

    <tbody>
    <tr>
            <td>
            <p>18 Jun 2015</p>
            <p>at 13:15</p>
            </td>
            <td>Pincic party</td>
            <td id='substatustitleright'><p>-$160</p></td>
        </tr>
      <tr>
            <td>
            <p>18 Jun 2015</p>
            <p>at 13:15</p>
            </td>
            <td>Can you find the beast…</td>
            <td id='substatustitleright'><p>-$160</p></td>
        </tr>


    </tbody>

</table>






                </div>
            </div>

<?php

echo file_get_contents($root . 'protocols/paymentscontrolpanel.php');

?>
            
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