<?php
include_once "../../../config/database.php";
include_once '../../../objects/result.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


	$database = new Database();
    $db = $database->getConnection();
    
    $UserID = $request->userID;
    
    $result = new Result($db);
	$stmt = $result->getResultsbyUserID($UserID);
	
	echo $stmt;

?>