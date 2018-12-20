<?php
/**
 * 
 */
class Exam_Config
{

	private $conn;
	private $table_name = "exam_config";

	public $ID_ExamConfig;
    public $Name;
    public $Num_Question;
    public $Totaltime;
	public $ID_Subject;
	public $ListUser;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function createExam(){

		if(!isset($this->ID_ExamConfig)){  //them moi
			$query = "INSERT INTO ".$this->table_name."
		SET Name = :Name, Num_Question = :Num_Question, Totaltime = :Totaltime, ID_Subject = :ID_Subject";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':Name', $this->Name);
		$stmt->bindParam(':Num_Question', $this->Num_Question);
		$stmt->bindParam(':Totaltime', $this->Totaltime);
		$stmt->bindParam(':ID_Subject', $this->ID_Subject);
		if($stmt->execute()) $rs=1;
		else $rs=0;
		$IDExamConfig=$this->getIDExam();
			foreach( $this->ListUser as $us ) 
			{
			$query2="INSERT INTO exam_config_user SET ID_User = :ID_User, ID_ExamConfig = :ID_ExamConfig";
			$stmt2 = $this->conn->prepare($query2);
			
			$stmt2->bindParam(':ID_User',$us->ID_User);
			$stmt2->bindParam(':ID_ExamConfig', $IDExamConfig);
			$rs2 = $stmt2->execute() ;
			}	


		if ($rs == 1 && $rs2==true) {
			echo 1;
		}else{
			echo 0;
        }
        
		}

		else{ //sua
			$query = "UPDATE ".$this->table_name." SET Name = :Name, Num_Question = :Num_Question, Totaltime = :Totaltime, ID_Subject = :ID_Subject WHERE ID_ExamConfig = ".$this->ID_ExamConfig;
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':Name', $this->Name);
			$stmt->bindParam(':Num_Question', $this->Num_Question);
			$stmt->bindParam(':Totaltime', $this->Totaltime);
			$stmt->bindParam(':ID_Subject', $this->ID_Subject);
			if($stmt->execute()) $rs=1;
			else $rs=0;     

			$query = "DELETE from exam_config_user Where ID_ExamConfig = ".$this->ID_ExamConfig; //xoa user 
			$stmt = $this->conn->prepare($query);
			if($stmt->execute()) $rs2=1;
			else $rs2=0;     

			foreach( $this->ListUser as $us ) //them lai user
			{
			$query2="INSERT INTO exam_config_user SET ID_User = :ID_User, ID_ExamConfig = :ID_ExamConfig";
			$stmt2 = $this->conn->prepare($query2);
			
			$stmt2->bindParam(':ID_User',$us->ID_User);
			$stmt2->bindParam(':ID_ExamConfig', $this->ID_ExamConfig);
			$rs3 = $stmt2->execute() ;
			}	

				if ($rs == 1 && $rs2 ==1 && $rs3==true) {
					echo 1;
				}else{
					echo 0;
				}
		}
		
	}

    public function getExams(){
    	$query = "SELECT ID_ExamConfig , Name, Num_Question, Totaltime,subjectName FROM exam_config a, subject b where a.ID_Subject= b.ID_Subject ";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
	}

	public function deleleExam(){   
		$query3 = "DELETE FROM exam_config_user WHERE ID_ExamConfig=".$this->ID_ExamConfig; 
    	$stmt3 = $this->conn->prepare( $query3 );
    	if($stmt3->execute()) $rs3=1;
		else $rs3=0;

		$query2 = "DELETE FROM exam_question WHERE ID_Exam=".$this->ID_ExamConfig; 
    	$stmt2 = $this->conn->prepare( $query2 );
    	if($stmt2->execute()) $rs2=1;
		else $rs2=0;

		$query1 = "DELETE FROM exam WHERE ID_ExamConfig=".$this->ID_ExamConfig; 
    	$stmt1 = $this->conn->prepare( $query1 );
    	if($stmt1->execute()) $rs1=1;
		else $rs1=0;

		$query0 = "DELETE FROM exam_config WHERE ID_ExamConfig=".$this->ID_ExamConfig; 
    	$stmt0 = $this->conn->prepare( $query0 );
    	if($stmt0->execute()) $rs0=1;
		else $rs0=0;

		if($rs1==1 && $rs2==1 && $rs3==1 && $rs0==1) echo 1;
		else echo 0;
	}
	public function getIDExam(){
    	$query = "SELECT max(ID_ExamConfig) FROM exam_config";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_NUM);
		return $rs[0];
	}
	public function getUserbyExamID(){
		$query = "SELECT a.ID_User,firstname,lastname,email FROM users a , exam_config_user b WHERE a.ID_User = b.ID_User and b.ID_ExamConfig =".$this->ID_ExamConfig;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
	}
}

 ?>