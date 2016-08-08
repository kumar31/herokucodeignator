<?php
// Install the library via PEAR or download the .zip file to your project folder.
// This line loads the library
require('./Twilio.php');

$account_sid = 'ACccb5c16886095e63fa3d78c58e72518f'; 
$auth_token = '2a4f28e45833e2a3a076518f09d94b76'; 
$client = new Services_Twilio($account_sid, $auth_token); 
$to_number = "+1".urldecode($_GET['number']);
$event_name = urldecode($_GET['event_name']);
$text = urldecode($_GET['text']);
 
$message = $client->account->messages->create(array( 
	'To' => $to_number, 
	'From' => "+18623079334", 
	'Body' => $text,   
));

print_r($message->account_sid);
?>