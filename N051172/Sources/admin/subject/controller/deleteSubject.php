<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/subject.php';
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$ID = $request->subjectID;

	$database = new Database();
	$db = $database->getConnection();
	$subject = new Subject($db);

	$subject->ID_Subject = $ID;
	$stmt = $subject->deleleSubject();
    echo $stmt;
?>