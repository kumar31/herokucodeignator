<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
include('client_header.php'); ?>
  <body>
    <div class="orangehead">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="dashboard_tab_wrapper">
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/support">Get Support
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/client_how_outfit_works">How Outfit Works
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/client_faq">F.A.Q.
                </a>
              </div>
              <div class="dashboard_tab bring-forward clicked">
                <a href="#">Fees & Charges
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="jumbotron supportheader" id="worksImg">
      <div class="container centerText">
        <div class="row">
          <div class="col-sm-2">
          </div>
          <div class="col-xs-12 col-sm-8">
            <h1>Fees and charges
            </h1>
            <!--<h3>Find the right person for the job here on outfitstaff.com! With hundreds of talented waiters, you can get help with your event within hours of posting!
            </h3>-->
          </div>
          <div class="col-sm-2">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 whiteBG invitebox supportBody">
          
		  <h3>CLIENT</h3>
		   <p>Outfit is proud to offer seamless digital payments through our current technology partner Stripe. All you have to do is to insert your card details under ‘My Profile - Payment Method’ and then our platform will calculate the rest.</p>
		   <p>We are currently charging $37/hr for employees and $33/hr for our contractors.</p>
		   <p>The payment will be automatically deducted from your card and we will provide you with a detailed invoice for the event once completed.</p>
		   
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
        </div>
      </div>
    </div>
    <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('client_footer.php'); ?>
  </body>
</html>
