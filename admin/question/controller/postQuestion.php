<?php

    include_once "../../../config/dbconfig.php";
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$contentQs = $request->question->ContentQs;
	$listcontentAs = $request->listanswer;
	
	$conn = new mysqli($details['server_host'], $details['mysql_name'],$details['mysql_password'], $details['mysql_database']);	
    mysqli_set_charset($conn,"UTF8");
    $result1 = $conn->query("INSERT INTO question (ContentQs) VALUES ('$contentQs')");
	
    $result2 = $conn->query("SELECT max(ID_Question) FROM question ");
	
    // $qsID = $result2->fetch_array(MYSQLI_ASSOC);
	$data=array();
	$rs = $result2->fetch_array(MYSQLI_NUM);

    foreach( $listcontentAs as $as )
    {
        $result3 = $conn->query("INSERT INTO answer (ID_Question,ContentAs,Iscorrect) VALUES ($rs[0],'$as->ContentAs','$as->Iscorrect')");
    }
    
	if ($result1 == TRUE && $result2==TRUE && $result3==TRUE ) {
		echo 1;
	} else {
		echo 0 ;
	}
	

 
 

?>