<?php
/**
 * 
 */
class Subject
{

	private $conn;
	private $table_name = "subject";

	public $ID_Subject;
	public $subjectName;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function createSubject(){

		if(!isset($this->ID_Subject)){  //them moi
			$query = "INSERT INTO ".$this->table_name."
		SET
		subjectName = :subjectName";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':subjectName', $this->subjectName);
		if($stmt->execute()) $rs=1;
		else $rs=0;
					
		if ($rs == 1) {
			echo 1;
		}else{
			echo 0;
        }
        
		}

		else{ //sua
			$query = "UPDATE ".$this->table_name." SET subjectName = :subjectName WHERE ID_Subject = ".$this->ID_Subject;
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':subjectName', $this->subjectName);
			if($stmt->execute()) $rs=1;
			else $rs=0;     // sua noi dung cau hoi

				if ($rs == 1) {
					echo 1;
				}else{
					echo 0;
				}
		}
		
	}

    public function getSubjects(){
    	$query = "SELECT ID_Subject , subjectName FROM subject ";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
	}

	public function deleleSubject(){   
		$query1 = "DELETE FROM subject WHERE ID_Subject=".$this->ID_Subject; 
    	$stmt1 = $this->conn->prepare( $query1 );
    	if($stmt1->execute()) $rs1=1;
		else $rs1=0;

		if($rs1==1) echo 1;
		else echo 0;
	}

}

 ?>