<?php
/**
 * 
 */
class Exam
{

	private $conn;
	private $table_name = "exam";

	public $ID_Exam;
    public $Name;
    public $Num_Question;
    public $Totaltime;
    public $ID_Subject;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function createExam(){

		if(!isset($this->ID_Exam)){  //them moi
			$query = "INSERT INTO ".$this->table_name."
		SET Name = :Name, Num_Question = :Num_Question, Totaltime = :Totaltime, ID_Subject = :ID_Subject";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':Name', $this->Name);
		$stmt->bindParam(':Num_Question', $this->Num_Question);
		$stmt->bindParam(':Totaltime', $this->Totaltime);
		$stmt->bindParam(':ID_Subject', $this->ID_Subject);
		if($stmt->execute()) $rs=1;
		else $rs=0;
					
		if ($rs == 1) {
			echo 1;
		}else{
			echo 0;
        }
        
		}

		else{ //sua
			$query = "UPDATE ".$this->table_name." SET Name = :Name, Num_Question = :Num_Question, Totaltime = :Totaltime, ID_Subject = :ID_Subject WHERE ID_exam = ".$this->ID_Exam;
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':Name', $this->Name);
			$stmt->bindParam(':Num_Question', $this->Num_Question);
			$stmt->bindParam(':Totaltime', $this->Totaltime);
			$stmt->bindParam(':ID_Subject', $this->ID_Subject);
			if($stmt->execute()) $rs=1;
			else $rs=0;     // sua noi dung cau hoi

				if ($rs == 1) {
					echo 1;
				}else{
					echo 0;
				}
		}
		
	}

    public function getExams(){
    	$query = "SELECT ID_Exam , Name, Num_Question, Totaltime,subjectName FROM exam a, subject b where a.ID_Subject= b.ID_Subject ";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
	}

	public function deleleExam(){   
		$query1 = "DELETE FROM exam WHERE ID_Exam=".$this->ID_Exam; 
    	$stmt1 = $this->conn->prepare( $query1 );
    	if($stmt1->execute()) $rs1=1;
		else $rs1=0;

		if($rs1==1) echo 1;
		else echo 0;
	}

}

 ?>