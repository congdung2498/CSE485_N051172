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

		$query1="select count(ID_ex_us) from exam_config_user where ID_User=".$this->UserID." and ID_ExamConfig=".$this->ID_ExamConfig;
		$stmt1 = $this->conn->prepare( $query1);
		$stmt1->execute();
		$rs1 = $stmt1->fetch(PDO::FETCH_NUM);
		$number1= $rs1[0];
		if($number1 ==0) return '-2'; //không có trong danh sách thi
		else{   //co trong danh sach thi
			$query2="select ID_Exam from exam where ID_User=".$this->UserID." and ID_ExamConfig=".$this->ID_ExamConfig;
			$stmt2 = $this->conn->prepare( $query2 );
			$stmt2->execute();
			$rs2 = $stmt2->fetch(PDO::FETCH_NUM);
			if(isset($rs2[0]) && $rs2[0]>=0){  //neu da co de thi
												   
			$IDexam= $rs2[0];
			$query3= "SELECT endTime  FROM exam  WHERE ID_Exam =".$IDexam;
			$stmt3 = $this->conn->prepare( $query3 );
			$stmt3->execute();
			$rs3 = $stmt3->fetch(PDO::FETCH_NUM);

			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$now = date('Y-m-d H:i:s');

			$time = (strtotime($rs3[0]) - strtotime($now));
			if ($time<0){  
				return  -1 ; // đã het gio
			}
			else{ // chua het gio
				$query4="select score from exam where ID_Exam=".$IDexam;
				$stmt4 = $this->conn->prepare( $query4 );
				$stmt4->execute();
				$rs4 = $stmt4->fetch(PDO::FETCH_NUM);
				if(isset($rs4[0]) && $rs4[0]>=0){ //neu da nop bai
					return '-1';
				}
				else {     //chua nop bai
					return $IDexam;
				}      
			}

		}
		else{  //tao de thi moi
			return '0';
		}
	}


}
}

 ?>