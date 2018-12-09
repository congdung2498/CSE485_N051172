<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/question.php';
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$QsID = $request->questionID;

	$database = new Database();
	$db = $database->getConnection();
	$question = new Question($db);

	$question->ID_Question = $QsID;
	$stmt = $question->deleleQuestion();
    echo $stmt;
?>