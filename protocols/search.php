<?php


//Values

$skills = $_POST['skills']; 
$languages = $_POST['languages']; 
$gender = $_POST['gender']; 


require('dbConnect.php');



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




  // $sql = "SELECT * FROM `nector_user_appearance` WHERE `height` >= '175'";

    $sql = "SELECT * FROM `nector_users_portfolio` WHERE `languages` LIKE 'english'";

  $userIdfilter = profileQueryId($sql, $conn);
 
  $userIds = implode(',', $userIdfilter);

  $sql = "SELECT * FROM `nector_users` WHERE FIND_IN_SET(user_id,'" . $userIds . "')";

  print_r(userQuery($sql, $conn));



function profileQueryId($sql, $conn){

		  $result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    	$id[] = $row["user_id"];
	    }
	} else {
	    echo "0 results";
	}
	return $id;
}


function userQuery($sql, $conn){

		  $result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {

	    	$id[] = $row["first_name"];
	    }
	} else {
	    echo "0 results";
	}
	return $id;
}

