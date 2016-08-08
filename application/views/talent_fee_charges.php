<?php 
error_reporting(0);
include('talent_header.php'); ?>
  <body>
    <div class="orangehead">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="dashboard_tab_wrapper">
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/talent_support">Get Support
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
          <h3>TALENT</h3>
          <p>Outfit is proud to offer seamless digital payments through our current technology partner Stripe. All you have to do is to insert your bank details under ‘My Profile - Payment Method’ and then our system will take care of the rest.</p>
          <p><b>For contractors</b>, once you have worked an event, go to worked events, accept timesheet and voilà - the money is in your account. No chasing checks and going to the bank anymore. We are currently offering a flat fee of $25/hour to our contractors.</p>
          <p><b>For employees</b>, if you are happy with the sign out time by the client after the event then the payment will be triggered right away. Please allow a couple of days for the money to hit your account, especially if it’s over the weekend. We are currently offering $22/hr after tax to all employees.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
        </div>
      </div>
    </div>
    <?php 
	error_reporting(0);
	include('talent_footer.php'); ?>
  </body>
</html>
