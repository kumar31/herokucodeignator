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
                <header class="clearfix">
                    <h1 class="event-title">johnny walker birthday bash


                    <aside class="below">
                        12th Jan 2017 6:00 PM - 13th Jan 2017 1:00 AM
                    </aside></h1>
                </header>

                 <div class="dashboard_tab_wrapper">
                    <div class="dashboard_tab bring-forward">
                      <a href="invite.php">Invite</a>
                    </div>


                    <div class="dashboard_tab bring-forward">
                      <a href="proposals.php">Proposals</a>
                    </div>

                            <?php 

                echo file_get_contents($root . 'protocols/employersearchmenu.php');

                ?>

                   </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">


<!-- Start of white box -->
            <div class="col-sm-8 whiteBG invitebox topmargin">
                <div>
                    <div class="row">
                        <div class="col-xs-12">


                 <h3>Event Description</h3>
                <hr>
                <p>Drinks recption followed by a formal sitdown dinner and after dinner drinks event.</p>
                <br>
                <p>Project ID: 1</p>


                        </div>

                        


                    </div>
                    
                 

                    <div class="row">
                        <div class="col-xs-12">


                 <h3>Posted by: John Walker</h3>
                 <hr>


                        </div>

                        


                    </div>





                </div>
            </div>
<!-- End of white box -->

            <div class="col-sm-4 topmargin listings-invitebar">
                <section class="clearfix whiteBG classWithPadLeft">
                 				<div class="">
                                    <p class="centerText btn-group-justified">
                                    <a class=
                                    "btn btn-submit btn-lg largeHeight" href=""
                                    role="button">Invite Staff</a>
                                    </p>
                                </div>


                                <div class="text-center">
                                	<strong>Invite more staff members to your event</strong>
                                </div>
                                <hr>



									<div class="row proposaldata">
									  <div class="col-xs-4">
									  	<h3 id="number">2</h3>
									  	<p id="subtext">pending</p>
									  </div>
									  <div class="col-xs-4">
									  	<h3 id="number">1</h3>
									  	<p id="subtext">hired</p>
									  </div>
									  <div class="col-xs-4">
									  	<h3 id="number">$230</h3>
									  	<p id="subtext">estimated price</p>
									  </div>
									</div>

                                <div class="">
                                    <p class="centerText btn-group-justified">
                                    <a class=
                                    "btn btn-book btn-lg largeHeight" href=""
                                    role="button">BOOK NOW</a>
                                    </p>
                                </div>
                           

                </section>
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