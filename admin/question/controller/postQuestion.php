<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/question.php';
    
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$contentQs = $request->question->ContentQs;
	if(isset($request->question->ID_Question)){
		$ID = $request->question->ID_Question;
	}
	$listcontentAs = $request->listanswer;
	

	$database = new Database();
	$db = $database->getConnection();
	$question = new Question($db);

	$question->ContentQs = $contentQs;
	if(isset($ID)){
		$question->ID_Question = $ID;
	}
	
	$question->ListAnswer = $listcontentAs;
	$stmt = $question->createQuestion();
	echo $stmt;
	

 
 

?>
	

 
 

