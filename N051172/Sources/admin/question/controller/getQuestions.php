<?php
include_once "../../../config/database.php";
include_once '../../../objects/question.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if($_GET['method'] == "load_questions")
{
	
	$database = new Database();
	$db = $database->getConnection();

	$question = new Question($db);

	$stmt = $question->getQuestions();
	$data=array();
	while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Question']=addslashes($rs["ID_Question"]);
		   $row['ContentQs']=addslashes($rs["ContentQs"]);
		   $row['subjectName']=addslashes($rs["subjectName"]);
		   $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
	echo json_encode($jsonData);
 
}

?>