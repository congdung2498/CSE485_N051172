<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once "../../../config/core.php";
if($_GET['method'] == "load_IDUser")
{
	
	echo $_SESSION['user_id'];
 
}

?>