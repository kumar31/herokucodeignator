<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>

<body>
	<div>Welcome! Hello World.</div>
	<div>
	<?php
		if(isset($data)){
			foreach ($data as $u) {
				echo "<pre>";
				print_r($u['email']);
			}
		}
	?>
	</div>
</body>

</html>
