<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/user.php';

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$database = new Database();
	$db = $database->getConnection();
	$user = new User($db);

	$user->ID_User=$request->user->ID_User;
	$user->firstname = $request->user->firstname;
	$user->lastname = $request->user->lastname;
	$user->contact_number = $request->user->contact_number;
	$user->access_level = $request->user->access_level;
	$user->address = $request->user->address;
	$user->email = $request->user->email;
	$stmt = $user->updateInfo();
	echo $stmt;
	

 
 

?>