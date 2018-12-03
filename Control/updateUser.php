<?php
	$details=array();
	$details['server_host']="localhost";//server host name
	$details['mysql_name']="root";//your mysql user name
	$details['mysql_password']="";//your mysql user name
	$details['mysql_database']="php_login_system";//your database name

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$firstname = $request->user->firstname;
	$lastname = $request->user->lastname;
	$contact_number = $request->user->contact_number;
	$access_level = $request->user->access_level;
	$address = $request->user->address;
    $email = $request->user->email;

	$conn = new mysqli($details['server_host'], $details['mysql_name'],$details['mysql_password'], $details['mysql_database']);	
	$result = $conn->query("UPDATE users set access_level='$access_level' where email= '$email'");
	
	if ($result === TRUE) {
		echo 1;
	} else {
		echo 0 ;
	}
	
	$conn->close();
 
 

?>