<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/exam_config.php';
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$ID = $request->examID;

	$database = new Database();
	$db = $database->getConnection();
	$exam_config = new Exam_Config($db);

	$exam_config->ID_ExamConfig = $ID;
	$stmt = $exam_config->deleleExam();
    echo $stmt;
?>