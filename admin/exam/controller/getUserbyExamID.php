<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/exam.php';
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$ExID = $request->examID;

	$database = new Database();
	$db = $database->getConnection();
	$exam = new Exam($db);

	$exam->ID_Exam = $ExID;
	$stmt = $exam->getUserbyExamID();

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