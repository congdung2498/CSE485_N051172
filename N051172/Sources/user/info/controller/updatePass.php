<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/user.php';

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);

	$database = new Database();
	$db = $database->getConnection();
	$user = new User($db);

	$user->ID_User=$request->idUser;
	$user->password = $request->password;
	$stmt = $user->updatePass();
	echo $stmt;
	

?>