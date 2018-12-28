<?php
/**
 * 
 */
class Result
{

	private $conn;
	private $table_name = "result";

	public $ID_Result;
    public $firstname;
    public $Name;
    public $Score;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function createResult(){

		if(!isset($this->ID_Result)){  //them moi
			$query = "INSERT INTO ".$this->table_name."
		SET ID_Exam = :ID_Exam, ID_User = :ID_User, Score = :Score";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':ID_Exam', $this->ID_Exam);
		$stmt->bindParam(':ID_User', $this->ID_User);
		$stmt->bindParam(':Score', $this->Score);
		
		if($stmt->execute()) $rs=1;
		else $rs=0;
					
		if ($rs == 1) {
			echo 1;
		}else{
			echo 0;
        }
        
		}

		else{ //sua
			$query = "UPDATE ".$this->table_name." SET Score = :Score WHERE ID_Result = ".$this->ID_Result;
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':Name', $this->Name);
			if($stmt->execute()) $rs=1;
			else $rs=0;     // sua noi dung cau hoi

				if ($rs == 1) {
					echo 1;
				}else{
					echo 0;
				}
		}
		
	}

    public function getResults(){
    	$query = "SELECT a.ID_User,firstname,lastname,name,score from users a, exam_config b, exam c where a.ID_User=c.ID_User and c.ID_ExamConfig=b.ID_ExamConfig ";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
	}
	public function getResultsbyUserID($IDuser){
    	$query = "SELECT a.ID_User,firstname,lastname,name,score from users a, exam_config b, exam c where a.ID_User=c.ID_User and c.ID_ExamConfig=b.ID_ExamConfig and a.ID_User=".$IDuser;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
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


}

 ?>