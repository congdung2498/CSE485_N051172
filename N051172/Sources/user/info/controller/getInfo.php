<?php
include_once "../../../config/database.php";
include_once '../../../objects/user.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


	$IDUser=$request->userID;
	$database = new Database();
	$db = $database->getConnection();

	$user = new User($db);
	$stmt = $user->getInfo($IDUser);
	echo $stmt;
 


?>