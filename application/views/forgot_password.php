<?php 
error_reporting(0);
include('reg_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
  <div class="container whiteBG">
  <div class="col-md-4 col-md-offset-4">
    <div class="main-content controller-job action-new">
      <div class="bg-fill widget-PostJob clearfix">
        <header class="clearfix tet-center">
          <h1 class="form-title">Forgot Password</h1>
		  <aside class="below">
              To reset your password enter email
            </aside>
		  <h3 id="alertmsg" class="error_msg"></h3>
        </header>
        <hr>
        <form role="form" target="_top" data-toggle="validator" enctype="multipart/form-data" id="myForm" action="" method="POST" class="form-horizontal">
          <div class="form-group">
            <label class="required col-md-3" for="inputEmail">Email</label>            
			<div class="col-md-9">
				<input class="form-control " name="" id="inputEmail" type="email" placeholder="Email" required>
			</div>
			 <div style="margin-left: 110px; margin-bottom: 0px;" class="help-block with-errors"></div>
          </div>
         
		  </div>
      </div>
	 
      <div class="prepend-top clearfix">
        <div class="form-group clearfix">
		 <div class="col-md-3">
			  <label class="pull-left" for="">User
			  </label>  
		</div>		  
       <div class="col-md-6">
			  <label class="radio-inline">
				<input type="radio" name="user" value="1" required>
				Business
			  </label>
			
			  <label class="radio-inline">
				<input type="radio" name="user" value="2" required>
				Talent
			  </label>
			</div>
		  </div>
      </div>
	  
      <div class="row">
        <div class="col-xs-5">
        </div>
        <div class="form-group col-xs-5">         
            <button id="submit" name="submit" type="button" class="btn btn-submit btn-md largeHeight">Submit</button>         
        </div>
        <div class="col-xs-2">
        </div>
      </div>
      <!-- End demo -->
    </div>
    </div>
	
    </form>
  <!-- Footer Start -->
  <div class="container">
    <hr>
    <footer>
      <p>&copy; Outfit 2016
      </p>
    </footer>
  </div> 
  <!-- /container -->        
  <script src="<?php echo base_url(); ?>js/vendor/bootstrap.min.js">
  </script>
  <script src="<?php echo base_url(); ?>js/main.js">
  </script>
  <script type="text/javascript" src="http://cdn.jsdelivr.net/momentjs/latest/moment.min.js">
  </script>
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js">
  </script>
  <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <script src="<?php echo base_url(); ?>js/validator.js"></script>
 
  <script>
  $('#myForm').validator();
  </script>
  <script>
  $( "#submit" ).click(function() {
	  signin();
	  /*if (!$("input[name=user]:checked").val()) {
		$("#alertmsgusertype").text("Please select User Type");
		return false;
	  }*/
	});
  function signin(){
		var email = $("#inputEmail").val();
		var usertype = $("input[name='user']:checked").val();
			
			if(typeof usertype === "undefined") {
				var usertype = ''; 
			}
			else {
				var usertype = $("input[name='user']:checked").val();
			}
		
			var url = '<?php echo $webserviceurl; ?>index.php/forgotpassword';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'email':email,'type':usertype},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					
					if(message == "1") {
						$("#alertmsg").text("A reset link has been sent to your mail id.");	
						$(".form-group").hide();
					}
					else {						
						$("#alertmsg").text("Your Email ID is not registered with us. Please enter a valid Email ID.");
						$("html, body").animate({ scrollTop: 0 }, "slow");
					}
				}
			
			});

	}
	
	
  </script>
</body>
</html>
