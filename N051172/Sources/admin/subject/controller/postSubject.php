<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/subject.php';
    
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$subjectName = $request->subject->subjectName;
	if(isset($request->subject->ID_Subject)){
		$ID = $request->subject->ID_Subject;
	}

	$database = new Database();
	$db = $database->getConnection();
	$subject = new Subject($db);

	$subject->subjectName = $subjectName ;
	if(isset($ID)){
		$subject->ID_Subject = $ID;
	}
	
	$stmt = $subject->createSubject();
	echo $stmt;
	

 
 

?>
	

 
 

