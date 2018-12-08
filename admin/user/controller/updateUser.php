<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/user.php';

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$firstname = $request->user->firstname;
	$lastname = $request->user->lastname;
	$contact_number = $request->user->contact_number;
	$access_level = $request->user->access_level;
	$address = $request->user->address;
	$email = $request->user->email;
	$status = $request->user->status;

	$database = new Database();
	$db = $database->getConnection();

	$user = new User($db);

	$stmt = $user->updateUser($email,$access_level,$status);
	echo $stmt;
	

 
 

?>