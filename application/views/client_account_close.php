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
                <h1>Account
                </h1>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <hr>
                <h4>Close Account
                </h4> 
                <div class="invitebutton">
                  <p class="centerText btn-group">
				  <button data-toggle="modal" data-target="#myModalc" type="button" class="btn btn-submit btn-search largeHeight">Close Account</button>               
                  </p>
                </div>
              </div>                
            </div>
          </div>
        </div>
      </div>
	  
	  <!-- Modal Close -->
			  <div class="modal fade" id="myModalc" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Are you sure want to close this account</h4>
					</div>
					<div class="modal-body">
					 				  
						<a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_rejects" value=""
					   role="button" id="submit" onClick="close();" >Close account
					 </a>	
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
		  close();
		});
		
		function close(){
			var client_id = <?php echo $client_profile[0]['client_id']; ?>; 
			
				var url = '<?php echo $webserviceurl; ?>index.php/client_account_close';
				
				$.ajax({
					'type' : 'POST',
					'url': url,
					'data': {'client_id':client_id},
					//'dataType': 'json',
					success: function(data) {
						//alert(JSON.stringify(data));
						var message = JSON.stringify(data['StatusCode']);
						var message = message.replace(/\"/g, "");
						
						if(message == "1") {								
							window.location.assign("<?php echo base_url();?>index.php/client_logout");
						}
						else {
							var alertmessage = JSON.stringify(data['message']);
							$("#alertmsg").text(alertmessage);
							$("html, body").animate({ scrollTop: 0 }, "slow");
						}
					}
				
				});
	
		}


	</script>
  </body>
</html>
