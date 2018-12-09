<?php
include_once "../../../config/database.php";
include_once '../../../objects/result.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if($_GET['method'] == "load_result")
{
	
	$database = new Database();
	$db = $database->getConnection();

	$question = new Result($db);

	$stmt = $result->getResult();
	$data=array();
	while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Result']=addslashes($rs["ID_Result"]);
           $row['ID_User']=addslashes($rs["ID_User"]);
           $row['ID_Exam']=addslashes($rs["ID_Exam"]);
           $row['Score']=addslashes($rs["Score"]);
		   $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
	echo json_encode($jsonData);
 
}

?>