<?php 
	$servername = getenv( 'DB_HOST' );
	$username = getenv( 'DB_USER' );
	$password = getenv( 'DB_PASS' );
	$dbname = getenv( 'DB_NAME' );

	// Create connection
	$conn = mysql_connect($servername, $username, $password);
	// Check connection

	mysql_select_db($dbname);
	
	// create an API client instance
		$client = new Pdfcrowd("karthiksmaat", "841f0285a634d4c6eaafff02c09ed4bd");
?>