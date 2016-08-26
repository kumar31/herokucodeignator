<?php 
error_reporting(0);
include('client_header.php'); ?>
<?php require APPPATH.'/libraries/variableconfig.php';
		$variableconfig = new variableconfig();
		$webserviceurl = $variableconfig->webserviceurl(); 
		
		$myuser_id = $this->session->userdata('client_id'); 
		if($myuser_id == ''){
				$myuser_id = $this->input->cookie('client',true);
			}
 ?>
<body>
  <?php 
	error_reporting(0);
	include('settings_menu_xs.php'); ?>
  <div class="container">
    <div class="row">
      <?php 
	error_reporting(0);
	include('settings_menu.php'); ?>
      <div class="col-sm-8 whiteBG invitebox topmargin30 profile">
        <div>
          <div class="row">
            <div class="col-xs-12">
              <h1>Account Verification
              </h1>
            </div>
          </div>
		  <?php
			$email_verification = $client_profile[0]['email_verification']; 
			if($email_verification == 1) {
				$emailverification = "Verified";
			}
			if($email_verification == 0) {
				$emailverification = "Not Verified";
			}
		  ?>
          <div class="row">
            <div class="col-xs-12">
              <hr>
              <h4>Email Address
              </h4> 
              <p>A confirmed email is important to allow us to securely communicate with you.
              </p>
			  <h5 id="alertmail" class="error_msg"></h5>
              <span class="inline">
                <h4><?php echo $client_profile[0]['email']; ?>
                </h4> 
                <h4 id="confirmed"><?php echo $emailverification; ?>
                </h4> 
              </span>
			  <?php 
				$client_id = $client_profile[0]['client_id']; 
			  ?>
              <div class="invitebutton">
			  <?php 
				if($email_verification == 1) {
			  ?>
               <p class="">		
						<a class=
					   "btn btn-submit btn-lg largeHeight once-only btn_confirms" value=""
					   role="button" id="btn1" disabled>Verified
					 </a>					
				  </p>
				<?php } ?>
				
				<?php 
				if($email_verification == 0) {
				?>
                <button class=
					   "btn btn-submit btn-lg largeHeight once-only emailverify" value=""
					   type="button" id="btn2">Verify Email
					 </button>
				<?php } ?>
              </div>
            </div>                
          </div>
		  <?php
			$phone_number = $client_profile[0]['phone_number'];
			$phone_verification = $client_profile[0]['phone_verification']; 
			if($phone_verification == 1) {
				$phoneverification = "Verified";
			}
			if($phone_verification == 0) {
				$phoneverification = "Not Verified";
			}
			if(($phone_number == "") && ($phone_verification == 0)) {
				$phoneverification = "Add Phone number to verify.";
			}
		  ?>
          <div class="row">
            <div class="col-xs-12">
              <hr>
              <h4>Phone Number
              </h4> 
              <p>Make it easier to communicate with a verified phone number. We'll send you a code by SMS or read it to you over the phone.
              </p>
              <span class="inline">
                <h4><?php echo $client_profile[0]['phone_number']; ?>
                </h4> 
                <h4 id="confirmed"><?php echo $phoneverification; ?>
                </h4> 
              </span> 
              <div class="invitebutton">
			  <?php 
				if($phone_verification == 1) {
			  ?>
               <p class="">		
						<a class=
					   "btn btn-submit btn-lg largeHeight once-only btn_confirms" value=""
					   role="button" id="btn3" disabled>Verified
					 </a>					
				  </p>
				<?php } ?>
				
				<?php 
				if(($phone_verification == 0) && ($phone_number != "")) {
			  ?>
               <p class="">
						<a class=
					   "btn btn-submit btn-lg largeHeight once-only btn_confirms" value=""
					   role="button" id="btn4">Verify mobile number
					 </a>
					 <br>
					 <br>
					 <input placeholder="Enter code sent to your mobile" class="form-control" name="code" id="code" type="text" value="">
					 <h5 id="alertmsg" class="error_msg"></h5>
					 <a class=
					   "btn btn-danger btn-lg largeHeight once-only btn_submits" value=""
					   role="button" id="btn5">Submit 
					 </a>
					
				  </p>
				<?php } ?>
              </div>
            </div>                
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
	error_reporting(0);
	include('client_footer.php'); ?>
  <script>
 
  $(".btn_confirms").click(function()
	 {
	  verify();
	  $(this).attr('disabled', true);
	  $(this).text('Verification code sent');
	 });
	 
	
  function verify(){
		var client_id = "<?php echo $myuser_id;  ?>";
		var type = 1;
			
			var url = '<?php echo $webserviceurl; ?>index.php/mobile_verify';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'user_id':client_id,'type':type},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					//alert(JSON.stringify(data['Message']));
					
				}
			
			});

	}
  </script>
  
  <script>
 
  $(".btn_submits").click(function()
	 {
		verifynum();
	 });
	 
	
  function verifynum(){
		var client_id = "<?php echo $myuser_id;  ?>";
		var type = 1;
		var code = $("#code").val();
			
			var url = '<?php echo $webserviceurl; ?>index.php/mobile_number_check';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'user_id':client_id,'type':type,'verify_code':code},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					if(message == "1") {								
						window.location.reload();
					}
					else {
						var alertmessage = JSON.stringify(data['message']);
						$("#alertmsg").text(alertmessage);
					}
					
				}
			
			});

	}
  </script>
  
  <script>
 
  $(".emailverify").click(function()
	 { 
		verifyemail();
		$(this).attr('disabled', true);
		$(this).text('Verification mail sent');
	 });
	 
	
  function verifyemail(){
		var client_id = "<?php echo $myuser_id;  ?>"; 
		var email = "<?php echo $client_profile[0]['email']; ?>"; 
		var first_name = "<?php echo $client_profile[0]['first_name']; ?>"; 
			
			var url = '<?php echo $webserviceurl; ?>index.php/email_verify';
			
			$.ajax({
				'type' : 'POST',
				'url': url,
				'data': {'client_id':client_id,'email':email,'first_name':first_name},
				//'dataType': 'json',
				success: function(data) {
					var message = JSON.stringify(data['StatusCode']);
					var message = message.replace(/\"/g, "");
					if(message == "1") {								
						var alertmessage = "Check the mail sent to verify email";
						$("#alertmail").text(alertmessage);
					}
				}
			
			});

	}
  </script>
</body>
</html>
