<?php
// include_once "../../../config/dbconfig.php";

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
    // $postdata = file_get_contents("php://input");
	// $request = json_decode($postdata);
	// $QsID = $request->questionID;
// if($_GET['method'] == "load_answers")
// {
	
// 	$conn = new mysqli($details['server_host'], $details['mysql_name'],$details['mysql_password'], $details['mysql_database']);
// 	mysqli_set_charset($conn,"UTF8");	
// 	$result = $conn->query("SELECT * FROM answer WHERE ID_Question=$QsID");
	
// 	$data=array();
// 	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
// 		$row=array();
// 	   $row['ID_Question']=addslashes($rs["ID_Question"]);
//        $row['ID_Answer']=addslashes($rs["ID_Answer"]);
//        $row['ContentAs']=addslashes($rs["ContentAs"]);
//        $row['Iscorrect']=addslashes($rs["Iscorrect"]);
// 	   $data[]=$row;
// 	}
// 	$jsonData=array();
// 	$jsonData['records']=$data;
 
// 	$conn->close();
// 	echo json_encode($jsonData);
 
//}
	include_once "../../../config/database.php";
	include_once '../../../objects/question.php';
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$QsID = $request->questionID;

	$database = new Database();
	$db = $database->getConnection();
	$question = new Question($db);

	$question->ID_Question = $QsID;
	$stmt = $question->getAnswerbyQSId();

	$data=array();
	while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Answer']=addslashes($rs["ID_Answer"]);
		   $row['ID_Question']=addslashes($rs["ID_Question"]);
		   $row['ContentAs']=addslashes($rs["ContentAs"]);
		   $row['Iscorrect']=addslashes($rs["Iscorrect"]);
		   $data[]=$row;
	}
	$jsonData=array();
	$jsonData['records']=$data;
	echo json_encode($jsonData);
?>