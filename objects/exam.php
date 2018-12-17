<?php
/**
 * 
 */
class Exam
{

	private $conn;
	private $table_name = "exam";

	public $ID_Exam;
	public $ID_ExamConfig;
	public $ID_User;
	public $score;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function createExam(){

		$query = "INSERT INTO ".$this->table_name."
		SET
		ID_ExamConfig = :ID_ExamConfig,
		ID_User= :ID_User";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':ID_ExamConfig', $this->ID_ExamConfig);
		$stmt->bindParam(':ID_User', $this->ID_User);
		if($stmt->execute()) $rs=1;
		else $rs=0;
					
		$IDExam=$this->getIDExam();


		$query2 = "SELECT ID_Question FROM question a , exam_config b Where a.ID_Subject = b.ID_Subject and b.ID_ExamConfig =10";
    	$stmt = $this->conn->prepare( $query2 );
    	$stmt->execute();
		$data=array();
		while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Question']=(int)$rs["ID_Question"];
		   $data[]=$row;
		}
	
		
		$Number_Question=$this->getNum_Question();

		for($i =0; $i < count($data); $i++)
		echo $data[$i]['ID_Question'];

		

		if ($rs == 1) {
			echo 1;
		}else{
			echo 0;
        }
        
		
	}
	public function getIDExam(){
    	$query = "SELECT max(ID_Exam) FROM exam";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_NUM);
		return $rs[0];
	}

    public function getNum_Question(){
    	$query = "SELECT Num_Question  FROM exam_config a, exam b WHERE a.ID_ExamConfig = b.ID_ExamConfig and b.ID_Exam=".$this->getIDExam();
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	$rs = $stmt->fetch(PDO::FETCH_NUM);
		return $rs[0];
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