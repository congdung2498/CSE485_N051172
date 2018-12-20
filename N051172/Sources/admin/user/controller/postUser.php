<?php

	include_once "../../../config/database.php";
	include_once '../../../objects/user.php';
    
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	
	$database = new Database();
	$db = $database->getConnection();
    $users = new User($db);
    
	$users->firstname=$request->user->firstname;
	$users->lastname=$request->user->lastname;
	$users->email=$request->user->email;
    $users->contact_number=$request->user->contact_number;
    $users->address=$request->user->address;
    $users->password=$request->user->password;
    $users->access_level=$request->user->access_level;
    $users->status=$request->user->status;
    $users->status=(int)$users->status;
    
	if(isset($ID)){
		$users->ID_User = $ID;
	}
	
	$stmt = $users->createUser();
	echo $stmt;
	// $jsonData=array();
	// $jsonData['records']=$users;
	// echo json_encode($jsonData);

 
 

?>
	


	