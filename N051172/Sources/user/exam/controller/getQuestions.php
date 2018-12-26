<?php
include_once "../../../config/database.php";
include_once '../../../objects/question-answer.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


	$IDExam=$request->examID;
	$IDUser=$request->userID;
	$database = new Database();
	$db = $database->getConnection();

	$question = new QuestionAnswers($db);
	$stmt = $question->getQSbyExamID($IDExam,$IDUser);
	echo $stmt;
 


?>