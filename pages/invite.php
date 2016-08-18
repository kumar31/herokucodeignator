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
        <div class="row orangehead">
            <div class="col-md-10">
                <header class="clearfix">
                    <h1 class="event-title">johnny walker birthday bash


                    <aside class="below">
                        12th Jan 2017 6:00 PM - 13th Jan 2017 1:00 AM
                    </aside></h1>
                </header>


               

                       <div class="dashboard_tab_wrapper">
                    <div class="dashboard_tab bring-forward clicked">
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
            <div class="col-sm-3 topmargin hidden-xs noleftmargin">
                <section class=
                "clearfix hourlies-listing-sidebar listings-sidebar greyGB" id=
                "listing-sidebar">


                    <div class="skills">
                        <h3><span class=
                        "glyphicon glyphicon-star"></span>Special Skills</h3>

                        <hr>


                        <div class="checkbox">
                            <label><input type="checkbox" value=
                            "">Bartending</label>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" value="">Silver
                            Service</label>
                        </div>
                    </div>


                    <div class="gender">
                        <h3><span class=
                        "glyphicon glyphicon-user"></span>Gender</h3>

                        <hr>


                        <div class="checkbox">
                            <label><input type="checkbox" value=
                            "">Either</label>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" value="">Male</label>
                        </div>


                        <div class="checkbox">
                            <label><input type="checkbox" value=
                            "">Female</label>
                        </div>
                    </div>


                    <div class="">
                        <h3><span class="glyphicon glyphicon-sort"></span>Hair
                        Color</h3>

                        <hr>
                        <input class="form-control" id="" name="" type="text">
                    </div>


                    <div class="">
                        <h3><span class="glyphicon glyphicon-sort"></span>Eye
                        Color</h3>

                        <hr>
                        <input class="form-control" id="" name="" type="text">
                    </div>


                    <div class="">
                        <h3><span class=
                        "glyphicon glyphicon-sort"></span>Height</h3>

                        <hr>
                        <label class="" for="">From</label> <select class=
                        "col-xs-12 form-control form-group" id="" name="">
                            <option selected="selected" value="">
                                Greater than 100
                            </option>

                            <option selected="selected" value="">
                                90 - 100
                            </option>

                            <option selected="selected" value="">
                                80 - 90
                            </option>

                            <option selected="selected" value="">
                                70 - 80
                            </option>

                            <option selected="selected" value="">
                                60 - 70
                            </option>

                            <option selected="selected" value="">
                                50 - 60
                            </option>

                            <option selected="selected" value="">
                                40 - 50
                            </option>

                            <option selected="selected" value="">
                                30 - 40
                            </option>

                            <option selected="selected" value="">
                                20 - 30
                            </option>

                            <option selected="selected" value="">
                                10 - 20
                            </option>

                            <option selected="selected" value="">
                                -
                            </option>
                        </select><br>
                        <label class="" for="">To</label> <select class=
                        "col-xs-12 form-control form-group" id="" name="">
                            <option selected="selected" value="">
                                Greater than 100
                            </option>

                            <option selected="selected" value="">
                                90 - 100
                            </option>

                            <option selected="selected" value="">
                                80 - 90
                            </option>

                            <option selected="selected" value="">
                                70 - 80
                            </option>

                            <option selected="selected" value="">
                                60 - 70
                            </option>

                            <option selected="selected" value="">
                                50 - 60
                            </option>

                            <option selected="selected" value="">
                                40 - 50
                            </option>

                            <option selected="selected" value="">
                                30 - 40
                            </option>

                            <option selected="selected" value="">
                                20 - 30
                            </option>

                            <option selected="selected" value="">
                                10 - 20
                            </option>

                            <option selected="selected" value="">
                                -
                            </option>
                        </select>
                    </div>


                    <div class="">
                        <h3><span class=
                        "glyphicon glyphicon-sort"></span>Languages</h3>

                        <hr>
                        <input class="form-control" id="" name="" type="text">
                    </div>
                </section>
            </div>


            <div class="col-sm-9 whiteBG invitebox topmargin">
                <div>
                    <div class="row">
                        <div class="col-xs-9">
                            <h3>25 matching waiters found</h3>
                        </div>


                        <div class="col-xs-3">
                            <p id="sortby">Sort by: Best Rank</p>
                        </div>
                    </div>
                    <!-- single Person -->


                    <div class="person">
                        <div class="row persona">
                            <div class="col-xs-3 col-sm-3 text-center">
                            <img src="http://placebeard.it/g/150/150">
                            </div>


                            <div class="col-xs-9 col-sm-6">
                                <h3>Gerald Allen</h3>


                                <h4>Waiter, bartender</h4>


                                <h4>Male - Brown hair, green eyes, 5ft 11</h4>


                                <div class="row uppercase">
                                    <div class="col-xs-6">
                                        <p><span class=
                                        "glyphicon glyphicon-pushpin"></span>new
                                        york</p>
                                    </div>


                                    <div class="col-xs-6">
                                        <p><span class=
                                        "glyphicon glyphicon-thumbs-up"></span>1
                                        review - 100%</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-3">
                                <div class="invitebutton">
                                    <p class="centerText btn-group-justified">
                                    <a class=
                                    "btn btn-submit btn-lg largeHeight" href=""
                                    role="button">Invite</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>
                    </div>
                    <!-- End of single person -->
                    <!-- single Person -->


                    <div class="person">
                        <div class="row persona">
                            <div class="col-xs-3 col-sm-3 text-center">
                            <img src="http://placebeard.it/g/150/150">
                            </div>


                            <div class="col-xs-9 col-sm-6">
                                <h3>Gerald Allen</h3>


                                <h4>Waiter, bartender</h4>


                                <h4>Male - Brown hair, green eyes, 5ft 11</h4>


                                <div class="row uppercase">
                                    <div class="col-xs-6">
                                        <p><span class=
                                        "glyphicon glyphicon-pushpin"></span>new
                                        york</p>
                                    </div>


                                    <div class="col-xs-6">
                                        <p><span class=
                                        "glyphicon glyphicon-thumbs-up"></span>1
                                        review - 100%</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-3">
                                <div class="invitebutton">
                                    <p class="centerText btn-group-justified">
                                    <a class=
                                    "btn btn-submit btn-lg largeHeight" href=""
                                    role="button">Invite</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>
                    </div>
                    <!-- End of single person -->
                    <!-- single Person -->


                    <div class="person">
                        <div class="row persona">
                            <div class="col-xs-3 col-sm-3 text-center">
                            <img src="http://placebeard.it/g/150/150">
                            </div>


                            <div class="col-xs-9 col-sm-6">
                                <h3>Gerald Allen</h3>


                                <h4>Waiter, bartender</h4>


                                <h4>Male - Brown hair, green eyes, 5ft 11</h4>


                                <div class="row uppercase">
                                    <div class="col-xs-6">
                                        <p><span class=
                                        "glyphicon glyphicon-pushpin"></span>new
                                        york</p>
                                    </div>


                                    <div class="col-xs-6">
                                        <p><span class=
                                        "glyphicon glyphicon-thumbs-up"></span>1
                                        review - 100%</p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-3">
                                <div class="invitebutton">
                                    <p class="centerText btn-group-justified">
                                    <a class=
                                    "btn btn-submit btn-lg largeHeight" href=""
                                    role="button">Invite</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <hr>
                    </div>
                    <!-- End of single person -->


                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <div class='bottomnav'>
                                <nav>
                                    <ul class="pagination pagination-lg">
                                        <li>
                                            <a aria-label="Previous" href=
                                            "#"><span aria-hidden=
                                            "true">&laquo;</span></a>
                                        </li>


                                        <li class="active">
                                            <a href="#">1</a>
                                        </li>


                                        <li>
                                            <a href="#">2</a>
                                        </li>


                                        <li>
                                            <a href="#">3</a>
                                        </li>


                                        <li>
                                            <a href="#">4</a>
                                        </li>


                                        <li>
                                            <a href="#">5</a>
                                        </li>


                                        <li>
                                            <a aria-label="Next" href=
                                            "#"><span aria-hidden=
                                            "true">&raquo;</span></a>
                                        </li>
                                    </ul>
                                </nav>
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