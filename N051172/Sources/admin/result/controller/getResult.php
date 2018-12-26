<?php
include_once "../../../config/database.php";
include_once '../../../objects/result.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if($_GET['method'] == "load_Results")
{
	
	$database = new Database();
	$db = $database->getConnection();
	$result = new Result($db);
	$stmt = $result->getResults();
	$data=array();
	while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_User']=addslashes($rs["ID_User"]);
		   $row['firstname']=addslashes($rs["firstname"]);
           $row['lastname']=addslashes($rs["lastname"]);
           $row['name']=addslashes($rs["name"]);
           $row['score']=addslashes($rs["score"]);
		   $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
	echo json_encode($jsonData);
 
}

?>