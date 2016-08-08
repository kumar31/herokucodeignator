
<?php    
   
	/*$to = "car3chan@gmail.com";
	$subject = "My subject";
	$txt = $_REQUEST['From'].','.$_REQUEST['To'].','.$_REQUEST['Body'];
	$headers = "From: car3chan@gmail.com" . "\r\n" .
	"CC: car3chan@gmail.com";

	mail($to,$subject,$txt,$headers);*/
	$body = $_REQUEST['body']; 
	$body = explode('-',$body);
	
	$event_id = $body[0]; 
	$talent_id = $body[1]; 
	$msg = $body[2];
	
	$servername = "localhost";
	$username = "smaatapp_dev";
	$password = "dev123%$";
	$dbname = "smaatapp_nector";
	
	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	// Check connection
	
	mysql_select_db($dbname);
	
	//Event details
	$query=mysql_query("select * from `event_detail` WHERE `event_id`='$event_id'");
	$row = mysql_fetch_array($query);
	$client_id = $row['client_id'];
	$event_name = $row['event_name'];
	
	//Client details
	$querys=mysql_query("select * from `client_details` WHERE `client_id`='$client_id'");
	$rows = mysql_fetch_array($querys);
	$client_phone_number = $rows['phone_number'];
	
	//Talent details
	$querysi=mysql_query("select * from `talent_details` WHERE `talent_id`='$talent_id'");
	$rowsi = mysql_fetch_array($querysi);
	$first_name = $rowsi['first_name'];
	
	if($msg == 'Y') {
		
		// sms noitification
		$phone = $client_phone_number;
		$text = "Hi ".$first_name." has accepted the timesheet for ".$event_name." event.";
		$text = urlencode($text);
		$event_name = urlencode($event_name);
		file_get_contents("http://smaatapps.com/nector/twilio/Services/sms_events.php?number=".$phone."&event_name=".$event_name."&text=".$text);
		$update = mysql_query("update checkin set checkin_status = 2  where event_id = ".$event_id." AND talent_id = ".$talent_id."");
	}
	
?>