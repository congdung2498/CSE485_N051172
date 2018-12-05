<?php
include_once "../../../config/dbconfig.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
if($_GET['method'] == "load_users")
{
	
	$conn = new mysqli($details['server_host'], $details['mysql_name'],$details['mysql_password'], $details['mysql_database']);
	mysqli_set_charset($conn,"UTF8");	
	$result = $conn->query("SELECT ID_User,firstname,lastname,email,contact_number,address,access_level FROM users");
	
	$data=array();
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		$row=array();
	   $row['ID_User']=addslashes($rs["ID_User"]);
	   $row['firstname']=addslashes($rs["firstname"]);
       $row['lastname']=addslashes($rs["lastname"]);
       $row['email']=addslashes($rs["email"]);
       $row['contact_number']=addslashes($rs["contact_number"]);
       $row['access_level']=addslashes($rs["access_level"]);
       $row['address']=addslashes($rs["address"]);
	   $data[]=$row;
		
	}
	$jsonData=array();
	$jsonData['records']=$data;
 
	$conn->close();
	echo json_encode($jsonData);
 
}



?>