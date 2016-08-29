<?php
	class validationandresult {
		
		
		function keyvalidation($pre_key) {
			
			
			$post_key = array_keys($_POST);	
			$result=array_diff($pre_key,$post_key);
			$resc = implode(",",$result);
			$result = Array ( "result" => "" );
			$message = array("StatusCode" => "0","message" =>$resc,"result" => $result);
			return $message;
			
			
		}
		
		function formvalidation($validation_errors) {
			
			
			$result = Array ( "result" => "" );
			$message = array("StatusCode" => "0","message" => $validation_errors,"result" => $result);
			return $message;
			
			
		}
		
		function successmessagewithemptyresult() {
			
			
			$result = Array ( "result" => "" );
			$message = array("StatusCode" => "1","message" => "success","result" => $result);
			return $message;
			
			
		}
		
		function successmessagewithresult($result) {
			
			
			$message = array("StatusCode" => "1","message" => "success","result" => $result);
			return $message;
			
			
		}
		
		function custommessage($message) {
			
			$result = Array ( "result" => "" );
			$message = array("StatusCode" => "1","message" => $message,"result" => $result);
			return $message;
			
			
		}
		function custommessagez($message) {
			
			$result = Array ( "result" => "" );
			$message = array("StatusCode" => "0","message" => $message,"result" => $result);
			return $message;
			
			
		}
		function successmessagewithemptyresultzero() {
			
			
			$result = Array ( "result" => "" );
			$message = array("StatusCode" => "0","message" => "success","result" => $result); 
			return $message;
			
			
		}
		function invalidrequest() {
			
			
			$result = Array ( "result" => "" );
			$message = array("StatusCode" => "1","message" => "Invalid Request!","result" => $result);
			return $message;
			
			
		}
		
		function accountclosed() {
			
			
			$result = Array ( "result" => "" );
			$message = array("StatusCode" => "0","message" => "Account closed.","result" => $result);
			return $message;
			
			
		}
		
		
	}
 ?>