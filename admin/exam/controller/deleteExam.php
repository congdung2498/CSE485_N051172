<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/exam.php';
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$ID = $request->examID;

	$database = new Database();
	$db = $database->getConnection();
	$exam = new Exam($db);

	$exam->ID_Exam = $ID;
	$stmt = $exam->deleleExam();
    echo $stmt;
?>