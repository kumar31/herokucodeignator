<?php
   $url = 'http://www.google.com';
	$pdffile = tempnam('/tmp/', 'wkhtmltopdf_');
	$handle = popen("wkhtmltopdf $url $pdffile 2>&1", "r");
	while (!feof($handle)) 
	  fread($handle, 4096);
	pclose($handle);
	header('Content-type: application/pdf');
	$file = fopen($pdffile, "r");
	while(!feof($file))
	  print fread($file, 4096);
	unlink($pdffile);
?>
