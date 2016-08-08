<?php

// Put your device token here (without spaces):
//pushnotification('728a7ad7b7ec96db829f9841fd533c65344cf17e3cac6569724dfbf86c6b7f18','hi');
function pushNotification($iosDeviceId,$messages)
{
	//echo "sd";
	//echo $iosDeviceId;
	//echo $messages;
	//echo "calling";
	//$deviceId=$_REQUEST['deviceId'];
	//$deviceToken = '728a7ad7b7ec96db829f9841fd533c65344cf17e3cac6569724dfbf86c6b7f18';
	$deviceToken="$iosDeviceId";
	// Put your private key's passphrase here:
	$passphrase = 'pushchat';
	
	// Put your alert message here:
	//$inputMsg=$_REQUEST['message'];
	$message =$messages;
	
	////////////////////////////////////////////////////////////////////////////////
	
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', 'pushcert.pem');
	stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
	
	// Open a connection to the APNS server
	$fp = stream_socket_client(
		'ssl://gateway.push.apple.com:2195', $err,
		$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
	
	if (!$fp)
		exit("Failed to connect: $err $errstr" . PHP_EOL);
	//echo 'Connected to APNS' . PHP_EOL;
	//echo 'Connected to APNS' . PHP_EOL;
	
	// Create the payload body
	$body['aps'] = array(
		'alert' => $message,
		'sound' => 'default'
		);
	
	// Encode the payload as JSON
	$payload = json_encode($body);
	
	// Build the binary notification
	$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
	
	// Send it to the server
	$result = fwrite($fp, $msg, strlen($msg));
	
	/*if (!$result)
		echo 'Message not delivered' . PHP_EOL;
	else
		echo 'Message successfully delivered' . PHP_EOL;*/
	
	// Close the connection to the server
	fclose($fp);
}
?>
