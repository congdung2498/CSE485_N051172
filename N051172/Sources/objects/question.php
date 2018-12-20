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
	public $ListAnswer;
	public $ID_Subject;
	public function __construct($db)
	{
		$this->conn = $db;
	}

	public function createQuestion(){

		if(!isset($this->ID_Question)){  //them moi
			$query = "INSERT INTO ".$this->table_name."
		SET
		ContentQs = :ContentQs, ID_Subject = :ID_Subject";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':ContentQs', $this->ContentQs);
		$stmt->bindParam(':ID_Subject', $this->ID_Subject);
		if($stmt->execute()) $rs1=1;
		else $rs1=0;
		$IdQS=$this->getIDQuestions(); // lay iD cau hoi

			foreach( $this->ListAnswer as $as ) // tao cau tl
   			{
				$query2="INSERT INTO answer SET ID_Question = :ID_Question,ContentAs = :ContentAs,Iscorrect = :Iscorrect";
				$stmt2 = $this->conn->prepare($query2);
				
				$stmt2->bindParam(':ID_Question',$IdQS);
				$stmt2->bindParam(':ContentAs', $as->ContentAs);
				$stmt2->bindParam(':Iscorrect', $as->Iscorrect);
				$rs = $stmt2->execute() ;
   		 	}	
		
					
		if ($rs == true && $rs1 == 1) {
			echo 1;
		}else{
			echo 0;
		}
		}

		else{ //sua
			$query = "UPDATE ".$this->table_name." SET ContentQs = :ContentQs,  ID_Subject = :ID_Subject WHERE ID_Question = ".$this->ID_Question;
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':ContentQs', $this->ContentQs);
			$stmt->bindParam(':ID_Subject', $this->ID_Subject);
			if($stmt->execute()) $rs1=1;
			else $rs1=0;     // sua noi dung cau hoi

			$query = "DELETE from answer Where ID_Question = ".$this->ID_Question;
			$stmt = $this->conn->prepare($query);
			if($stmt->execute()) $rs2=1;
			else $rs2=0;     // xoa list cau tl
			
			foreach( $this->ListAnswer as $as ) // tao cau tl moi
   			{
				$query2="INSERT INTO answer SET ID_Question = :ID_Question,ContentAs = :ContentAs,Iscorrect = :Iscorrect";
				$stmt2 = $this->conn->prepare($query2);
				
				$stmt2->bindParam(':ID_Question',$this->ID_Question);
				$stmt2->bindParam(':ContentAs', $as->ContentAs);
				$stmt2->bindParam(':Iscorrect', $as->Iscorrect);
				if($stmt2->execute()) $rs3=1;
				else $rs3=0;
   		 	}	
				if ($rs1 == 1 && $rs2 == 1 && $rs3==1) {
					echo 1;
				}else{
					echo 0;
				}
		}
		
	}

	public function showError($stmt){
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
    }

    public function getQuestions(){
    	$query = "SELECT ID_Question , ContentQs, subjectName FROM question a , subject b Where a.ID_Subject = b.ID_Subject";
    	$stmt = $this->conn->prepare( $query );
		$stmt->execute();
    	return $stmt;
	}

	public function getIDQuestions(){
    	$query = "SELECT max(ID_Question) FROM question";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_NUM);
		return $rs[0];
	}

	public function getAnswerbyQSId(){
		$query = "SELECT * FROM answer WHERE ID_Question =".$this->ID_Question;
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
	}

	public function deleleQuestion(){   
		$query1 = "DELETE FROM answer WHERE ID_Question =".$this->ID_Question; // xoa danh sach cau tl tuong ung
    	$stmt1 = $this->conn->prepare( $query1 );
    	if($stmt1->execute()) $rs1=1;
		else $rs1=0;

		$query2 = "DELETE FROM question WHERE ID_Question =".$this->ID_Question; // xoa cau hoi
    	$stmt2 = $this->conn->prepare( $query2 );
    	if($stmt2->execute()) $rs2=1;
		else $rs2=0;

		if($rs1==1 && $rs2 ==1) echo 1;
		else echo 0;
	}

}

 ?>