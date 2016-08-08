<?php
	class variableconfig {
		function mailurl() {
			return "https://testawsout.herokuapp.com/webservice/index.php/verify/";
		}
		
		function fpassurl() {
			return "https://testawsout.herokuapp.com/webservice/index.php/reset_password/";
		}
		
		function from_email() {
			return "admin@smaatapps.com";
		}
		
		function smsurl() {
			return "https://testawsout.herokuapp.com/twilio/Services/sms.php";
		}
		
	}
 ?>