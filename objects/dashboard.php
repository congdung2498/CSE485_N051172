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
	public $SubjectName;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	
    public function getExams(){
    	$query = "SELECT ID_Exam , Name, Num_Question, Totaltime,subjectName FROM exam a, subject b where a.ID_Subject= b.ID_Subject ";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
	}

	
}

 ?>