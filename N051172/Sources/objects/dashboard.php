<?php
/**
 * 
 */
class ExamConfig
{

	private $conn;
	private $table_name = "exam_config";

	public $ID_ExamConfig;
    public $Name;
    public $Num_Question;
    public $Totaltime;
	public $SubjectName;
	public $UserID;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	
    public function getExamConfigs(){
    	$query = "SELECT ID_ExamConfig , Name, Num_Question, Totaltime,subjectName FROM exam_config a, subject b where a.ID_Subject= b.ID_Subject ";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
	}

	public function check(){
		$query="select count(ID_Exam) from exam where ID_User=".$this->UserID." and ID_ExamConfig=".$this->ID_ExamConfig;
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_NUM);
		$number= $rs[0];
		if($number>=1) return '1'; // đã làm đề
		else{
			$query2="select count(ID_ex_us) from exam_config_user where ID_User=".$this->UserID." and ID_ExamConfig=".$this->ID_ExamConfig;
			$stmt2 = $this->conn->prepare( $query2);
			$stmt2->execute();
			$rs2 = $stmt2->fetch(PDO::FETCH_NUM);
			$number2= $rs2[0];
			if($number2 ==0) return '2'; //không có trong danh sách thi 
			else return '0'; //đủ điều kiện thi  
		}
	}
	
}

 ?>