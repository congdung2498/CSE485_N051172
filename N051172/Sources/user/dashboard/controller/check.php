<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/dashboard.php';
    
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	

	$database = new Database();
	$db = $database->getConnection();

    $exam_config = new ExamConfig($db);
    $exam_config->ID_ExamConfig = $request->ID_ExamConfig;
    $exam_config->UserID = $request->userID;
    $stmt = $exam_config->check();
    
	echo $stmt;
	

 
 

?>
	

 
 

