<?php
/**
 * 
 */
class Exam
{

	private $conn;
	private $table_name = "exam";

	public $ID_Exam;
	public $ListQuestion = array();
	public $Question;
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
		if($stmt->execute()) $rs1=1;
		else $rs1=0;
		
		$IDExam=$this->getIDExam();

		$query2 = "SELECT ID_Question FROM question a , exam_config b 
		Where a.ID_Subject = b.ID_Subject and b.ID_ExamConfig =".$this->ID_ExamConfig; //lay cau hoi
    	$stmt = $this->conn->prepare( $query2 );
    	$stmt->execute();
		$data=array();
		while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Question']=(int)$rs["ID_Question"];
		   $data[]=$row;
		}
			
		$Number_Question=$this->getNum_Question();
		
		$randomQuestionList=array();
		
		while(count($randomQuestionList) < $Number_Question){
			$r = rand(0, count($data)-1);
			$check=true;

				for($i=0; $i<count($randomQuestionList); $i++){
					if($randomQuestionList[$i]==$data[$r]['ID_Question'])
					{
						$check=false;
					}
				}
				
			if($check==true) array_push($randomQuestionList,$data[$r]['ID_Question']);; //random vao 1 list
		}
		
		foreach( $randomQuestionList as $as ) 
   			{
				$query2="INSERT INTO exam_question SET ID_Question = :ID_Question, ID_Exam = :ID_Exam";
				$stmt2 = $this->conn->prepare($query2);
				
				$stmt2->bindParam(':ID_Question',$as);
				$stmt2->bindParam(':ID_Exam', $IDExam);
				if($stmt2->execute()) $rs3=1;
				else $rs3=0;
   		 	}	

		

		

		if ($rs1 == 1 && $rs3==1 ) {
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
    	$query = "SELECT Num_Question  FROM exam_config a, exam b WHERE
		 a.ID_ExamConfig = b.ID_ExamConfig and b.ID_Exam=".$this->getIDExam();
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	$rs = $stmt->fetch(PDO::FETCH_NUM);
		return $rs[0];
	}

	public function getQSbyExamID(){

		$query = "SELECT a.ID_Question, a.ContentQs FROM question a , exam_question b 
		Where a.ID_Question = b.ID_Question and b.ID_Exam =".$this->ID_Exam; //lay cau hoi
    	$stmt = $this->conn->prepare( $query);
    	$stmt->execute();
		$data=array();
		while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Question']=(int)$rs["ID_Question"];
		   $row['ContentQs']=$rs["ContentQs"];
		   $data['question']=$row;

		   
		$query2 = "SELECT ID_Answer, ContentAs , Iscorrect FROM answer a , question b 
		Where a.ID_Question = b.ID_Question and b.ID_Exam =".$this->ID_Exam; //lay cau hoi
    	$stmt = $this->conn->prepare( $query);
    	$stmt->execute();
		$data=array();
		while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		   $row=array();
		   $row['ID_Question']=(int)$rs["ID_Question"];
		   $row['ContentQs']=$rs["ContentQs"];
		   $data[]=$row;
		}
		}


	}

}

 ?>