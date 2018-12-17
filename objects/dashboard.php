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

	
}

 ?>