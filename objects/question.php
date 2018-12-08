<?php
/**
 * 
 */
class Question
{

	private $conn;
	private $table_name = "question";

	public $ID_Question;
	public $ContentQs;
	
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function createQuestion(){

		$query = "INSERT INTO ".$this->table_name."
		SET
		id = :id,
		ID_Question = :ID_Question,
		ContentQs = :ContentQs";
		
		$stmt = $this->conn->prepare($query);

		$this->ID_Question=htmlspecialchars(strip_tags($this->ID_Question));
		$this->ContentQs=htmlspecialchars(strip_tags($this->ContentQs));


		$stmt->bindParam(':id',$this->ID_Question);
		$stmt->bindParam(':category_id', $this->ContentQs);


		if ($stmt->execute()) {
			return true;
		}else{
			$this->showError($stmt);
			return false;
		}
	}

	public function showError($stmt){
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
    }

    public function getQuestions(){
    	$query = "SELECT ID_Question , ContentQs FROM question ";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
    }

}

 ?>