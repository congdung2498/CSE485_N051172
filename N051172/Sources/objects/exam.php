<?php
include_once 'question-answer.php';
class Exam
{

	private $conn;
	private $table_name = "exam";

	public $ID_Exam;
	public $Question;
	public $ID_ExamConfig;
	public $ID_User;
	public $score;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function createExam(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$now = date("Y-m-d H:i:s");//khởi tạo
		$time=$this->getTime();
		$endTime = date('Y-m-d H:i:s',strtotime("+0 hour +$time minutes", strtotime($now)));

		$query = "INSERT INTO ".$this->table_name."
		SET
		ID_ExamConfig = :ID_ExamConfig,
		ID_User= :ID_User,
		endTime= :endTime";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':ID_ExamConfig', $this->ID_ExamConfig);
		$stmt->bindParam(':ID_User', $this->ID_User);
		$stmt->bindParam(':endTime', $endTime);
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

		// $question = new QuestionAnswers($this->conn);
		// $stmt = $question->getQSbyExamID($IDExam);
		// echo $stmt;
		echo $IDExam;
        
		
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

	public function submit($ListAnswer){
		$query = "select count(ID_Exam) from exam where score >= 0 and score <= 10 and ID_Exam = ".$this->ID_Exam; // kiểm tra xem đã nộp bài chưa
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	$rs = $stmt->fetch(PDO::FETCH_NUM);
		
		if($rs[0]==1){
			$jsonData=array();
			$jsonData['check']=0;		// đã nộp
			echo json_encode($jsonData); 
		}
		else{ 
			$numberCorrect=0;
		$i=0;

		while($i<count($ListAnswer)){
			$count=0;
			for($j=$i+1;$j<count($ListAnswer);$j++){
				
				if($ListAnswer[$i]->ID_Question==$ListAnswer[$j]->ID_Question)
				{
					$count++;
					
				}	
			}
			
			if($this->checkNumberAs($ListAnswer[$i]->ID_Question)==$count+1){
				$number=0;
				
				for($t=$i;$t<$count+1+$i;$t++){
	
					if($this->IscorrectAnswer($ListAnswer[$t]->ID_Answer)){
						$number++;
					}
					
				}
				if ($number==$count+1){
					$numberCorrect++;
				}
			}
			else{
				
			}
			
			$i=$i+$count+1;
			
		}
		$this->score = round($numberCorrect/$this->getNum_Question()*10, 2);
		$query = "UPDATE ".$this->table_name." SET score = :score WHERE ID_Exam = ".$this->ID_Exam;
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':score', $this->score);
		if($stmt->execute()) $rs=1;

		

		$jsonData=array();
		$jsonData['numberCorrect']=$numberCorrect;
		$jsonData['score']=$this->score;
		$jsonData['check']=1;  
		echo json_encode($jsonData);
		}
		
	}
	public function IscorrectAnswer($AsID){
		$query = "SELECT Iscorrect  FROM answer  WHERE
		ID_Answer =".$AsID;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	$rs = $stmt->fetch(PDO::FETCH_NUM);
		if ($rs[0]==1) return true;
		else return false;
	}
	public function checkNumberAs($QsID){
		$query = "select count(ID_Answer) from answer where Iscorrect=1 and ID_Question = ".$QsID;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	$rs = $stmt->fetch(PDO::FETCH_NUM);
		return($rs[0]);
	}
	public function getExamID(){
		$query = "select ID_Exam from exam where ID_User =".$this->ID_User." and ID_ExamConfig = ".$this->ID_ExamConfig;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	$rs = $stmt->fetch(PDO::FETCH_NUM);
		return($rs[0]);
	}

	public function getTime(){
		$query = "select Totaltime from exam_config where ID_ExamConfig = ".$this->ID_ExamConfig;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	$rs = $stmt->fetch(PDO::FETCH_NUM);
		return($rs[0]);
	}

}

 ?>