<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/exam_config.php';
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$ExID = $request->examID;

	$database = new Database();
	$db = $database->getConnection();
	$exam_config = new Exam_Config($db);

	$exam_config->ID_ExamConfig = $ExID;
	$stmt = $exam_config->getUserbyExamID();

	$data=array();
	while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_User']=addslashes($rs["ID_User"]);
		   $row['firstname']=addslashes($rs["firstname"]);
		   $row['lastname']=addslashes($rs["lastname"]);
		   $row['email']=addslashes($rs["email"]);
		   $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
	echo json_encode($jsonData);
?>