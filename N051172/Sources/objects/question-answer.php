<?php
/**
 * 
 */
include_once 'answer.php';
class QuestionAnswers
{

	private $conn;
	public $ID_Question;
	public $ListAnswer=array() ;
	public $ContentQs;
	public function __construct($db)
	{
		$this->conn = $db;
	}
	

    public function getQSbyExamID($ExID,$UserID){
		$query0 = "SELECT count(ID_Exam) FROM exam where ID_Exam=".$ExID." and ID_User=".$UserID;
    	$stmt0 = $this->conn->prepare( $query0 );
    	$stmt0->execute();
		$rs0 = $stmt0->fetch(PDO::FETCH_NUM);
		if($rs0[0]==1){
			
			$query = "SELECT a.ID_Question, a.ContentQs FROM question a , exam_question b 
			Where a.ID_Question = b.ID_Question and b.ID_Exam =".$ExID; //lay cau hoi
			$stmt = $this->conn->prepare( $query);
			$stmt->execute();
			$data=array();
			while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
			
				$question = new QuestionAnswers($this->conn);
				$question->ID_Question=(int)$rs["ID_Question"];
				$question->ContentQs=$rs["ContentQs"];
				
	
			   
			$query2 = "SELECT ID_Answer,a.ID_Question, ContentAs  FROM answer a , question b , exam_question c
			Where a.ID_Question = b.ID_Question and b.ID_Question= c.ID_Question and b.ID_Question =". $question->ID_Question." and c.ID_Exam =".$ExID;	
			$stmt2 = $this->conn->prepare( $query2);
			$stmt2->execute();
			
			while ($rs = $stmt2->fetch(PDO::FETCH_ASSOC)) {
			   $answer= new Answer();
			   $answer->ID_Answer=(int)$rs["ID_Answer"];
			   $answer->ID_Question=(int)$rs["ID_Question"];
			   $answer->ContentAs=$rs["ContentAs"];
			   array_push($question->ListAnswer,$answer);
			}
			array_push($data,$question);
			}
	
			$query = "SELECT a.ID_ExamConfig , Name, Num_Question, Totaltime,subjectName FROM exam_config a, subject b, exam c where a.ID_Subject= b.ID_Subject and a.ID_ExamConfig=c.ID_ExamConfig and c.ID_Exam = ".$ExID;
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();   //lay thong tin de thi
			$config=array();
			while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
			   $row=array();
			   $row['ID_ExamConfig']=(int)$rs["ID_ExamConfig"];
			   $row['Name']=addslashes($rs["Name"]);
			   $row['Num_Question']=(int)$rs["Num_Question"];
			   $row['Totaltime']=(int)$rs["Totaltime"];
			   $row['subjectName']=addslashes($rs["subjectName"]);
			   $config[]=$row;
			}
			
			//lay thong tin thoi gian
			$query3= "SELECT endTime  FROM exam  WHERE ID_Exam =".$ExID;
			$stmt3 = $this->conn->prepare( $query3 );
			$stmt3->execute();
			$rs3 = $stmt3->fetch(PDO::FETCH_NUM);

			$check=true;
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$now = date('Y-m-d H:i:s');

			$time = (strtotime($rs3[0]) - strtotime($now));
			if ($time<0){  
				$check=false;
			}
			$query4="select score from exam where ID_Exam=".$ExID;
				$stmt4 = $this->conn->prepare( $query4 );
				$stmt4->execute();
				$rs4 = $stmt4->fetch(PDO::FETCH_NUM);
				if(isset($rs4[0]) && $rs4[0]>=0){ //neu da nop bai
				$check=false;
			}

			$jsonData=array();
			$jsonData['check']=$check;
			$jsonData['records']=$data;
			$jsonData['config']=$config;
			$jsonData['time']=$time;
			echo json_encode($jsonData);
	
		}
		else{
			$jsonData=array();
			$jsonData['check']=false;
			echo json_encode($jsonData);
		}
		}

       
    }

 ?>