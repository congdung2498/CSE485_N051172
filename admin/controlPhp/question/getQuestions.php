<?php
include_once "../../../config/dbconfig.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if($_GET['method'] == "load_questions")
{
	
	$conn = new mysqli($details['server_host'], $details['mysql_name'],$details['mysql_password'], $details['mysql_database']);
	mysqli_set_charset($conn,"UTF8");	
	$result = $conn->query("SELECT ID_Question,ContentQs FROM question");
	
	$data=array();
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		$row=array();
	   $row['ID_Question']=addslashes($rs["ID_Question"]);
	   $row['ContentQs']=addslashes($rs["ContentQs"]);
	   $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
 
	$conn->close();
	echo json_encode($jsonData);
 
}



?>