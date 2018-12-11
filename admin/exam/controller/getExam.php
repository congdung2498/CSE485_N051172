<?php
include_once "../../../config/database.php";
include_once '../../../objects/exam.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if($_GET['method'] == "load_Exams")
{
	
	$database = new Database();
	$db = $database->getConnection();

	$exam = new Exam($db);

	$stmt = $exam->getExams();
	$data=array();
	while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Exam']=addslashes($rs["ID_Exam"]);
		   $row['Name']=addslashes($rs["Name"]);
		   $row['Num_Question']=addslashes($rs["Num_Question"]);
		   $row['Totaltime']=addslashes($rs["Totaltime"]);
		   $row['ID_Subject']=addslashes($rs["ID_Subject"]);
		   $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
	echo json_encode($jsonData);
 
}

?>