<?php
	
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
		move_uploaded_file($_FILES['file']['tmp_name'], "kumar1.png");
    }
	echo 'http://smaatapps.com/nector/nectorimg/kumar1.png';
?>