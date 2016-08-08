<?php 
error_reporting(0);
include('reg_header.php'); ?>
  <body>
    <div class="orangehead">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <div class="dashboard_tab_wrapper">
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/outfit_support">Get Support
                </a>
              </div>
              <div class="dashboard_tab bring-forward clicked">
                <a href="#">How Outfit Works
                </a>
              </div>
              <div class="dashboard_tab bring-forward">
                <a href="<?php echo base_url();?>index.php/outfit_faq">F.A.Q.
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
            <h1>How Outfit Works
            </h1>
            <h4 style="color: white;">Outfit is an online connection service which aides event producers in securing bartenders, waiters and other front of house staff for their events. Outfit provides a place for clients to hand-pick the 'talent' for their events, manage their schedule, handle payments and invoicing with ease. The efficiency of Outfit means more money in the hand of talent and a reduced cost to clients.
            </h4>
          </div>
          <div class="col-sm-2">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 whiteBG invitebox supportBody">
          <h3>Outfit strives to make event staffing simple and this is how...</h3>
		  <p>Step 1. Select the date, time, type of event and location and then submit your event to begin viewing and selecting talent.</p>
		  <p>Step 2. View and handpick Talent and invite those who you wish to work on your event.</p>
		  <p>Step 3. Handle booking details and confirmation through our platform. We take a small deposit upon confirmation.</p>
		  <p>Step 4. Use Outfit to check-in and check out staff at the event. We handle collection of W-9 forms and prepare the invoice on behalf of the talent and facilitate immediate payment via our platform.</p>
		  <p>Step 5. Once the event is over the talent invoice is instantly sent to client. After each event both the talent and Client will have the opportunity to rate each other ensuring those who rate highly will be prioritized for future events.</p>
		  <p>Our technology simplifies the staffing process. From talent selection through to book keeping you have complete visibility over each step in the process - making your event easier and less expensive to staff.</p>		  
         
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
        </div>
      </div>
    </div>
    <?php 
	error_reporting(0);
	include('client_footer.php'); ?>
  </body>
</html>
