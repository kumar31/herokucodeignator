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
</head><?php 

echo file_get_contents($root . 'protocols/menu.php');

?>

<body>
    <div class="container">
        <div class="row orangehead">
            <div class="col-md-10">


                 <div class="dashboard_tab_wrapper">


                    <div class="dashboard_tab bring-forward clicked">
                      <a href="#">My Events</a>
                    </div>


                   </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">


<!-- Start of white box -->
            <div class="col-sm-12 invitebox topmargin">
                <div>
                    <div class="row">
                        <div class="col-xs-12">


                 

        <ul id="tabs" class="nav nav-pills" data-tabs="tabs">
            <li class="active"><a class="dashboard_tab bring-forward" href="#open" data-toggle="tab">Open Events</a></li>
            <li><a class="dashboard_tab bring-forward" href="#booked" data-toggle="tab">Booked Events</a></li>
            <li><a class="dashboard_tab bring-forward" href="#pastevents" data-toggle="tab">Past Events</a></li>

        </ul>
            
                <div class="dashboard_tab_wrapper">



                </div>
 <hr>
                        </div>

                    </div>

                    
                   
               



<div id="my-tab-content" class="tab-content">
    
<div class="tab-pane active" id="open">

 <div class="row">
                        <div class="col-xs-9">
                            <h1>Open Events</h1>
                        </div>

                        <div class="col-xs-3">
                            <p id="sortby">Sort by: Soonest</p>
                        </div>
                        </div>

<div class="col-sm-12 invitebox topmargin">

<table class="table">
    <thead>
        <tr>
            <th class="align-left">Name</th>
            <th>Staff confirmed</th>
            <th>Est' Cost</th>
            <th>Time Left</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td class="align-left"><a href="">Johnny Walkers Birthday Bash</a></td>
            <td>3</td>
            <td>$420</td>
            <td>7 days</td>
            <td>
            <div class="">
                    <p class="centerText btn-group-justified smallbutton center-block">
                    <a class="btn btn-book btn-group-sm" href="" role="button">BOOK NOW</a>
                    </p>
            </div>    

            </td>
        </tr>

        <tr>
            <td class="align-left"><a href="">Johnny Walkers Birthday Bash</a></td>
            <td>3</td>
            <td>$420</td>
            <td>7 days</td>
            <td>
                   <div class="">
                    <p class="centerText btn-group-justified smallbutton center-block">
                    <a class="btn btn-book btn-group-sm" href="" role="button">BOOK NOW</a>
                    </p>
            </div>    

            </td>
        </tr>
    </tbody>

</table>
    
</div>
</div>


        <div class="tab-pane" id="booked">

         <div class="row">
                        <div class="col-xs-9">
                            <h1>Booked Events</h1>
                        </div>

                        <div class="col-xs-3">
                            <p id="sortby">Sort by: Soonest</p>
                        </div>
                        </div>
     
        <div class="col-sm-12 invitebox topmargin">

            <table class="table">
                <thead>
                    <tr>
                        <th class="align-left">Name</th>
                        <th>Staff confirmed</th>
                        <th>Est' Cost</th>
                        <th>Time Left</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>

                        <td>NO EVENTS CURRENTLY BOOKED</td>


                    </tr>


                </tbody>

            </table>
                
        </div>

            </div>


                            <div class="tab-pane" id="pastevents">

                             <div class="row">
                        <div class="col-xs-9">
                            <h1>Past Events</h1>
                        </div>

                        <div class="col-xs-3">
                            <p id="sortby">Sort by: Soonest</p>
                        </div>
                        </div>
     
        <div class="col-sm-12 invitebox topmargin">

<table class="table">
    <thead>
        <tr>
            <th class="align-left">Name</th>
            <th>Staff confirmed</th>
            <th>Total amount</th>
            <th>Time</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td class="align-left"><a href="">Factory Open Event</a></td>
            <td>8</td>
            <td>$420</td>
            <td>2 months</td>
        </tr>


    </tbody>

</table>
                
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