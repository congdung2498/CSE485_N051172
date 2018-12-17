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
	$stmt = $exam->createExam();
	echo $stmt;
	// $data=array();
	// while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
	// 	   $row=array();
	// 	   $row['ID_Exam']=(int)$rs["ID_Exam"];
	// 	   $row['Name']=addslashes($rs["Name"]);
	// 	   $row['Num_Question']=(int)$rs["Num_Question"];
	// 	   $row['Totaltime']=(int)$rs["Totaltime"];
	// 	   $row['subjectName']=addslashes($rs["subjectName"]);
	// 	   $data[]=$row;
	// }
	// $jsonData=array();
	// $jsonData['records']=$data;
	// echo json_encode($jsonData);
 
}

?>