<?php
include_once "../../../config/database.php";
include_once '../../../objects/subject.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if($_GET['method'] == "load_subjects")
{
	
	$database = new Database();
	$db = $database->getConnection();

	$subject = new Subject($db);

	$stmt = $subject->getSubjects();
	$data=array();
	while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Subject']=addslashes($rs["ID_Subject"]);
		   $row['subjectName']=addslashes($rs["subjectName"]);
		   $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
	echo json_encode($jsonData);
 
}

?>