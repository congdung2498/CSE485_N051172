<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/exam_config.php';
    
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	if(isset($request->exam->ID_ExamConfig)){
		$ID = $request->exam->ID_ExamConfig;
	}

	$database = new Database();
	$db = $database->getConnection();
	$exam_config = new Exam_Config($db);

	$exam_config->ID_Subject=(int)$request->exam->subject->ID_Subject;
	$exam_config->Name=$request->exam->Name;
	$exam_config->Num_Question=$request->exam->Num_Question;
	$exam_config->Totaltime=$request->exam->Totaltime;
	$exam_config->ListUser=$request->exam->user;
	if(isset($ID)){
		$exam_config->ID_ExamConfig = $ID;
	}
	
	$stmt = $exam_config->createExam();
	echo $stmt;
	// $jsonData=array();
	// $jsonData['records']=$exam;
	// echo json_encode($jsonData);

 
 

?>
	

 
 

