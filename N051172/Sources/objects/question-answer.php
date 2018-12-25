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
	

    public function getQSbyExamID($ExID){
        $query = "SELECT a.ID_Question, a.ContentQs FROM question a , exam_question b 
		Where a.ID_Question = b.ID_Question and b.ID_Exam =".$ExID; //lay cau hoi
    	$stmt = $this->conn->prepare( $query);
		$stmt->execute();
		$data=array();
		while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		
            $question = new QuestionAnswers($this->conn);
            $question->ID_Question=(int)$rs["ID_Question"];
            $question->ContentQs=$rs["ContentQs"];
		    

		   
		$query2 = "SELECT ID_Answer,a.ID_Question, ContentAs , Iscorrect FROM answer a , question b , exam_question c
		Where a.ID_Question = b.ID_Question and b.ID_Question= c.ID_Question and b.ID_Question =". $question->ID_Question." and c.ID_Exam =".$ExID;	
    	$stmt2 = $this->conn->prepare( $query2);
		$stmt2->execute();
		
		while ($rs = $stmt2->fetch(PDO::FETCH_ASSOC)) {
           $answer= new Answer();
		   $answer->ID_Answer=(int)$rs["ID_Answer"];
		   $answer->ID_Question=(int)$rs["ID_Question"];
		   $answer->ContentAs=$rs["ContentAs"];
		   $answer->Iscorrect=(int)$rs["Iscorrect"];		   
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

		$jsonData=array();
		$jsonData['records']=$data;
		$jsonData['config']=$config;
		echo json_encode($jsonData);

	}
    }

 ?>