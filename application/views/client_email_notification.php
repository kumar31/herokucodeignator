<?php 
error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
 ?>
  <body>
    <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('settings_menu_xs.php'); ?>
    <div class="container">
		<div class="row">
      <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('settings_menu.php'); ?>
        <div class="col-sm-8 whiteBG invitebox topmargin30 profile">
          <div>
            <div class="row">
              <div class="col-xs-12">
                <h1>Notifications
                </h1>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <hr>
				<h4 class="text-danger" id="alertmsg"></h4>
                <h4>Change Email
                </h4>     
              </div> 
            </div>
            <div class="prepend-top form-group">
              <label class="pull-left required" for="">email address
              </label>
              <input class="form-control" name="" id="inputEmail" type="text" maxlength="85" value="<?php echo $client_profile[0]['email'] ?>">
              
            </div>
            <div class="row">
              <div class="col-xs-12">
                <hr>
                <h4>Digest emails for your posted events
                </h4>     
              </div>                
            </div>
            <div class="prepend-top form-group">
              <label class="pull-left required" for="">Email frequency for project related activity
              </label>
              <select class="col-xs-12 form-control form-group" id="emailfrequency" name="">
                <option value="30" <?php if(isset($client_profile[0]['email_frequency']) && $client_profile[0]['email_frequency'] == "30") echo 'selected="selected"';?>>30</option>
                
				<option value="20" <?php if(isset($client_profile[0]['email_frequency']) && $client_profile[0]['email_frequency'] == "20") echo 'selected="selected"';?>>20</option>
                  
                <option value="10" <?php if(isset($client_profile[0]['email_frequency']) && $client_profile[0]['email_frequency'] == "10") echo 'selected="selected"';?>>10</option>
                  
                <option value="Default" <?php if(isset($client_profile[0]['email_frequency']) && $client_profile[0]['email_frequency'] == "Default") echo 'selected="selected"';?>>Default</option>
              </select>
              <label class="pull-left required" for="">Receive the first 3 notifications immediately. Then project activity summaries after 15, 30 and 45 minutes, then after 2 and 6 hours, and then daily.
              </label>
			  <div class="invitebutton">
                <p class="centerText btn-group">
                  <button id="submit" name="submit" type="button" class="btn btn-submit btn-search largeHeight">Update</button>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
	error_reporting(getenv( 'SOIREE_ERROR_REPORTING' ));
	include('client_footer.php'); ?>
	 <script>
		
		$( "#submit" ).click(function() {
		  notification();
		});
		
		function notification(){
			var email = $("#inputEmail").val();
			var email_notification = 1;
			var email_frequency = $( "#emailfrequency option:selected" ).text(); 
			var client_id = <?php echo $client_profile[0]['client_id']; ?>; 
			
				var url = '<?php echo $webserviceurl; ?>index.php/update_emailnotification_client';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'client_id':client_id,'email':email,'email_notification':email_notification,'email_frequency':email_frequency},
					//'dataType': 'json',
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {								
							window.location.reload();
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							var alertmessage = alertmessage.replace(/\"/g, "");
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}


	</script>
  </body>
</html>
