<?php 
error_reporting(0);
include('talent_header.php'); ?>
  <body>
    <div class="orangehead">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="dashboard_tab_wrapper">
              <div class="dashboard_tab bring-forward clicked">
                <a href="#">Get Support
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/talent_how_outfit_works">How Outfit Works
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/talent_faq">F.A.Q.
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/talent_fee_charges">Fees & Charges
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="jumbotron supportheader" id="supportImg">
      <div class="container">
        <h1 class="centerText">How may we help you?
        </h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 whiteBG invitebox supportBody">
          <h1>let us help you
          </h1>
          <hr>
          <form action="" method="POST" role="form">
		  <?php if((isset($_POST)) && (!empty($_POST))) { 
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$msg = $_POST['message'];
			
			$subject = "Outfit - Need Support";
			$message = "<p>Email: ".$email." <br> First name: ".$fname." <br>Last name: ".$lname." <br> Message: ".$msg."</p>";
			$from_email = "admin@smaatapps.com";
			
			$to = "tobias@outfitstaff.com";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <'.$from_email.'>' . "\r\n";
			$headers .= 'Cc: '.$from_email.'' . "\r\n";
			$headers .= 'Reply-To: <'.$from_email.'>' . "\r\n"; 
			mail($to,$subject,$message,$headers);
		  }
		  ?>
            <div class="row narrowrow">
              <div class="col-xs-12 gutter-bottom form-group">
                <label for="" class="required">Email Address
                </label>
                <input class="form-control " name="email" id="" type="text" maxlength="40"> 
              </div>
              <div class="col-xs-12 col-sm-6 gutter-bottom form-group">
                <label for="" class="required">First Name
                </label>
                <input class="form-control " name="fname" id="" type="text" maxlength="40"> 
              </div>
              <div class="col-xs-12 col-sm-6 gutter-bottom form-group">
                <label for="" class="required">Last Name
                </label>
                <input class="form-control" name="lname" id="" type="text" maxlength="100">                    
              </div>       
              <div class="col-xs-12 gutter-bottom form-group">
                <label for="" class="required">Message
                </label>
                <textarea class="form-control" rows="5" id="comment" name="message"></textarea>
              </div>    
              <div class="col-xs-12 gutter-bottom form-group">
                <button type="submit" class="btn btn-danger btn-lg pull-right">Submit
                </button>
              </div>  
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php 
	error_reporting(0);
	include('talent_footer.php'); ?>
  </body>
</html>
