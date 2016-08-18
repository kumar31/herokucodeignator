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

            <div class="col-sm-8 whiteBG invitebox topmargin30 profile">
                <div>
                    <div class="row">
                        <div class="col-xs-12">
                           <h1>Payments <small>Statements</small></h1>
                           
                        </div>
                    </div>

<?php

echo file_get_contents($root . 'protocols/paymentsmenu.php');

?>



<div class="row ">
<div class="col-xs-12 justgrey">
 <div class="prepend-top form-group">
    <label class="pull-left required" for="">MONTH</label>
                          <select class="form-control form-group" id="" name="">
                           

                            <option selected="selected" value="">
                                October 2015
                            </option>

                            <option selected="selected" value="">
                                November 2015
                            </option>

                            <option selected="selected" value="">
                                December 2015
                            </option>
                        </select>
 </div>

 </div>
 </div>

<h2>Your statement for December 2015</h2>
 <table class="table">
    <thead>
        <tr>
            <th class="align-left"></th>
            <th>Net</th>
            <th>VAT</th>
            <th>Total</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td class="align-left">Income</td>
            <td>$0.00</td>
            <td>$0.00</td>
            <td>$0.00</td>
        </tr>

        <tr>
            <td class="align-left">Payments</td>
            <td>$0.00</td>
            <td>$0.00</td>
            <td>$0.00</td>
        </tr>

        <tr>
            <td class="align-left">Fees</td>
            <td>$0.00</td>
            <td>$0.00</td>
            <td>$0.00</td>
        </tr>

        <tr id='tabletotal'>
            <td class="align-left">Net Movement</td>
            <td>$0.00</td>
            <td>$0.00</td>
            <td>$0.00</td>
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