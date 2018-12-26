<?php
include_once "../../../config/database.php";
include_once '../../../objects/exam.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


	$database = new Database();
	$db = $database->getConnection();

	$exam = new Exam($db);
	$exam->ID_ExamConfig = $request->examConfigID;
	$exam->ID_User= $request->userID;
	$stmt = $exam->getExamID();
	echo $stmt;
 


?>