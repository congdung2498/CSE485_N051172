<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/exam.php';
    
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	if(isset($request->exam->ID_Exam)){
		$ID = $request->exam->ID_Exam;
	}

	$database = new Database();
	$db = $database->getConnection();
	$exam = new Exam($db);

	$exam->ID_Subject=(int)$request->exam->subject->ID_Subject;
	$exam->Name=$request->exam->Name;
	$exam->Num_Question=$request->exam->Num_Question;
	$exam->Totaltime=$request->exam->Totaltime;
	$exam->ListUser=$request->exam->user;
	if(isset($ID)){
		$exam->ID_Exam = $ID;
	}
	
	$stmt = $exam->createExam();
	echo $stmt;
	// $jsonData=array();
	// $jsonData['records']=$exam;
	// echo json_encode($jsonData);

 
 

?>
	

 
 

