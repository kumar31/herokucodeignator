<?php    
    header("content-type: text/xml");    
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	
?>
<Response>    
	<Sms>hi lakx</Sms>
</Response>
<?php    
   
	if($_REQUEST['Body'] == 'yes'){
		$to = "kumarappan.ssb@gmail.com";
		$subject = "My subject";
		$txt = $_REQUEST['From'].','.$_REQUEST['To'].','.$_REQUEST['Body'];
		$headers = "From: kumarappan.ssb@gmail.com" . "\r\n" .
		"CC: kumarappan.ssb@gmail.com";

		mail($to,$subject,$txt,$headers);
	}
	

?>