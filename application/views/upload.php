<?php
	
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
		move_uploaded_file($_FILES['file']['tmp_name'], "kumar1.png");
    }
	echo 'https://testawsout.herokuapp.com/nectorimg/kumar1.png';
?>