
<?php 

 Stripe::setApiKey("sk_test_l8FVfiAVF7kbHq3oGOD2hCkL");

	$servername = getenv( 'DB_HOST' );
	$username = getenv( 'DB_USER' );
	$password = getenv( 'DB_PASS' );
	$dbname = getenv( 'DB_NAME' );

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	// Check connection

	mysql_select_db($dbname);
?>