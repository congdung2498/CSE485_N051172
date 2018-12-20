<?php
include_once "../../../config/database.php";
include_once '../../../objects/user.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if($_GET['method'] == "load_users")
{
	
	$database = new Database();
	$db = $database->getConnection();

	$user = new User($db);

	$stmt = $user->getUsers();
	$data=array();
	while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$row=array();
		$row['ID_User']=addslashes($rs["ID_User"]);
	    $row['firstname']=addslashes($rs["firstname"]);
		$row['lastname']=addslashes($rs["lastname"]);
		$row['email']=addslashes($rs["email"]);
		$row['contact_number']=addslashes($rs["contact_number"]);
		$row['access_level']=addslashes($rs["access_level"]);
		$row['address']=addslashes($rs["address"]);
		$row['status']=addslashes($rs["status"]);
		$data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
	echo json_encode($jsonData);
 
}



?>