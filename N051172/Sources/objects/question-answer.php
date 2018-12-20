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
		if($stmt->execute()){
			echo 1;
		}
		else {
			$jsonData=array();
			$jsonData['records']=$stmt->errorInfo();;
			echo json_encode($jsonData);
		} 
		
		$data=array();
		while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
		
            $question = new QuestionAnswers($this->conn);
            $question->ID_Question=(int)$rs["ID_Question"];
            $question->ContentQs=(int)$rs["ContentQs"];
		    

		   
		$query2 = "SELECT ID_Answer, ContentAs , Iscorrect FROM answer a , question b , exam_question c
		Where a.ID_Question = b.ID_Question and b.ID_Question= c.ID_Question and c.ID_Exam =".$ExID;	
    	$stmt = $this->conn->prepare( $query2);
		if($stmt->execute()){
			echo 1;
		}
		else {
			$jsonData=array();
			$jsonData['records']=$stmt->errorInfo();;
			echo json_encode($jsonData);
		} 
		
		while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $answer= new Answer();
		   $answer->ID_Answer=(int)$rs["ID_Answer"];
		   $answer->ContentAs=(int)$rs["ContentAs"];
		   $answer->Iscorrect=(int)$rs["Iscorrect"];		   
		   array_push($question->ListAnswer,$answer);
		}
		array_push($data,$question);
		}
		$jsonData=array();
		$jsonData['records']=$data;
		echo json_encode($jsonData);

	}
    }

 ?>