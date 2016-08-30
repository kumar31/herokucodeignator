<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
include('client_header.php'); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
	 <body style="padding-bottom: 0px; background: #FFFFFF;">
    <section>
	<div class="container">
	<div class="row" id="staff">
		<div class="col-md-12 text-center">
		<br><br>
			<h1>Staffing for all occasions</h1> 
			<p>
			The right Outfit makes a party. <br><br>
			</p>
				</div>
				<div class="col-md-3"></div>
					<div class="col-md-2 text-center">
						<a class="btn btn-danger btn-lg largeHeight" href="<?php echo site_url();?>/create_event" role="button">Create event
						</a>
					</div>
					<div class="col-md-2 text-center">
						<form action="<?php echo site_url();?>/search_talent" role="form" method="POST">
							<input type="hidden" value="1" name="employees">
							<button class="btn btn-submit btn-lg largeHeight" type="submit" role="button">&nbsp;View employees&nbsp;
							</button>
						</form>
					</div>
					<div class="col-md-2 text-center">
						<form action="<?php echo site_url();?>/search_talent" role="form" method="POST">
							<input type="hidden" value="2" name="contractors">
							<button class="btn btn-submit btn-lg largeHeight" href="<?php echo site_url();?>/search_talent" role="button">&nbsp;View contractors&nbsp;
							</button>
						</form>
					</div>
				<div class="col-md-3"></div>
				
			</div>
	
	</div>
	</section>
	<section >
		<img class="back-img" src="<?php echo base_url(); ?>img/hd/city_v7-copy-wider.png" width="100%">
	</section>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src="<?php echo base_url(); ?>js/vendor/jquery-1.11.2.min.js">
    </script>
    <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js">
    </script>
    <script src="<?php echo base_url(); ?>js/main.js">
    </script>
  </body>
</html>
