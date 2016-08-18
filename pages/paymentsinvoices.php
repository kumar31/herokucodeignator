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
                           <h1>Payments <small>Invoices</small></h1>
                           
                        </div>
                    </div>

<?php

echo file_get_contents($root . 'protocols/paymentsmenu.php');

?>



<div class="row ">
<div class="col-xs-6 justgrey">
 <div class="prepend-top form-group">
    <label class="pull-left required" for="">INVOICES</label>
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

 <div class="col-xs-6 justgrey">
 <div class="prepend-top form-group">
    <label class="pull-left required" for="">TIME PEROID</label>
                          <select class="form-control form-group" id="" name="">
                           

                            <option selected="selected" value="">
                                October 2015
                            </option>

                            <option selected="selected" value="">
                                November 2015
                            </option>

                            <option selected="selected" value="">
                                
                                Any
                            </option>
                        </select>
 </div>

 </div>
 </div>

 <table class="table topmargin">
    <thead>
        <tr>
            <th>Description</th>
            <th>Amount</th>
            <th id='substatustitle'>Status</th>
        </tr>
    </thead>

    <tbody>
    <tr>
            <td><a href="#">Invoice #000102-1</a>
            <p>John Walker Picnic</p>
            </td>
            <td>$160.00</td>
            <td id='substatustitle'><p>Paid</p><small>on 18 Jun 2015</small></td>
        </tr>
            <tr>
            <td><a href="#">Invoice #000102-1</a>
            <p>John Walker Picnic</p>
            </td>
            <td>$160.00</td>
            <td id='substatustitle'><p>Paid</p><small>on 18 Jun 2015</small></td>
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