<?php
// 'user' object
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $contact_number;
    public $address;
    public $password;
    public $access_level;
    public $access_code;
    public $status;
    public $created;
    public $modified;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
    public function createUser(){
        if(!isset($this->ID_User)){  //them moi
			$query = "INSERT INTO ".$this->table_name."
        SET firstname = :firstname, lastname = :lastname, email = :email, contact_number = :contact_number, 
        address = :address, password = :password, access_level = :access_level, status= :status";
		
		$stmt = $this->conn->prepare($query);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':contact_number', $this->contact_number);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':status',$this->status);
     
        // hash the password before saving to database
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);
     
        $stmt->bindParam(':access_level', $this->access_level);
     
        
		if($stmt->execute()) $rs=1;
		else $rs=0;


		if ($rs == 1 ) {
			echo 1;
		}else{
			echo 0;
        }
        
		}
    }
    public function getUsers(){
    	$query = "SELECT ID_User,firstname,lastname,email,contact_number,address,access_level,status FROM users";
    	$stmt = $this->conn->prepare( $query );
    	$stmt->execute();
    	return $stmt;
    }
    public function updateUser(){
        // $query1 = "UPDATE users set access_level='$acc_lv' where email= '$mail'";
    	// $stmt1 = $this->conn->prepare( $query1 );
        // $stmt1 ->execute();
        // $query2 = "UPDATE users set status='$stt' where email= '$mail'";
    	// $stmt2 = $this->conn->prepare( $query2 );
    	// $stmt2 ->execute();
    	// if ($stmt1 == TRUE && $stmt2==true) {
        //     echo 1;
        // } else {
        //     echo 0 ;
        // }
        $query = "UPDATE  ".$this->table_name." SET firstname = :firstname, lastname = :lastname, contact_number = :contact_number, address = :address, access_level = :access_level,status = :status, email = :email where ID_User = :ID_User";
		// echo $query;
		$stmt = $this->conn->prepare($query);


		$stmt->bindParam(':access_level',$this->access_level);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':ID_User', $this->ID_User);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':contact_number', $this->contact_number);

		if ($stmt->execute()) {
			echo 1;
		}else{
			$this->showError($stmt);
			echo 0;
		}

    }


    // check if given email exist in the database
    public function emailExists(){
 
    // query to check if email exists
    $query = "SELECT ID_User, firstname, lastname, access_level, password, status
            FROM " . $this->table_name . "
            WHERE email = ?
            LIMIT 0,1";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->email=htmlspecialchars(strip_tags($this->email));
 
    // bind given email value
    $stmt->bindParam(1, $this->email);
 
    // execute the query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // if email exists, assign values to object properties for easy access and use for php sessions
    if($num>0){
 
        // get record details / values
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        // assign values to object properties
        $this->id = $row['ID_User'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->access_level = $row['access_level'];
        $this->password = $row['password'];
        $this->status = $row['status'];
 
        // return true because email exists in the database
        return true;
    }
 
    // return false if email does not exist in the database
    return false;
}
   // create new user record
 public function create(){
 
    // to get time stamp for 'created' field
    $this->created=date('Y-m-d H:i:s');
 
    // insert query
    $query = "INSERT INTO " . $this->table_name . "
            SET
        firstname = :firstname,
        lastname = :lastname,
        email = :email,
        contact_number = :contact_number,
        address = :address,
        password = :password,
        access_level = :access_level,
                access_code = :access_code,
        status = :status,
        created = :created";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->access_level=htmlspecialchars(strip_tags($this->access_level));
    $this->access_code=htmlspecialchars(strip_tags($this->access_code));
    $this->status=htmlspecialchars(strip_tags($this->status));
 
    // bind the values
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':contact_number', $this->contact_number);
    $stmt->bindParam(':address', $this->address);
 
    // hash the password before saving to database
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password_hash);
 
    $stmt->bindParam(':access_level', $this->access_level);
    $stmt->bindParam(':access_code', $this->access_code);
    $stmt->bindParam(':status', $this->status);
    $stmt->bindParam(':created', $this->created);
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
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
    // read all user records
  function readAll($from_record_num, $records_per_page){
 
    // query to read all user records, with limit clause for pagination
    $query = "SELECT
                ID_User,
                firstname,
                lastname,
                email,
                contact_number,
                access_level,
                created
            FROM " . $this->table_name . "
            ORDER BY id DESC
            LIMIT ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind limit clause variables
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values
    return $stmt;
}
    // used for paging users
    public function countAll(){
 
    // query to select all user records
    $query = "SELECT id FROM " . $this->table_name . "";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // return row count
    return $num;
}
    // used in email verification feature
function updateStatusByAccessCode(){
 
    // update query
    $query = "UPDATE " . $this->table_name . "
            SET status = :status
            WHERE access_code = :access_code";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->status=htmlspecialchars(strip_tags($this->status));
    $this->access_code=htmlspecialchars(strip_tags($this->access_code));
 
    // bind the values from the form
    $stmt->bindParam(':status', $this->status);
    $stmt->bindParam(':access_code', $this->access_code);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

    // check if given access_code exist in the database
function accessCodeExists(){
 
    // query to check if access_code exists
    $query = "SELECT ID_User
            FROM " . $this->table_name . "
            WHERE access_code = ?
            LIMIT 0,1";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->access_code=htmlspecialchars(strip_tags($this->access_code));
 
    // bind given access_code value
    $stmt->bindParam(1, $this->access_code);
 
    // execute the query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // if access_code exists
    if($num>0){
 
        // return true because access_code exists in the database
        return true;
    }
 
    // return false if access_code does not exist in the database
    return false;
    
}
function checkStatus(){
 
    // query to check if access_code exists
    $query = "SELECT status
            FROM " . $this->table_name . "
            WHERE status=1 and access_code = ?
            LIMIT 0,1";
 
    // prepare the query
    $stmt = $this->conn->prepare( $query );
 
    // sanitize
    $this->access_code=htmlspecialchars(strip_tags($this->access_code));
 
    // bind given access_code value
    $stmt->bindParam(1, $this->access_code);
 
    // execute the query
    $stmt->execute();
 
    // get number of rows
    $num = $stmt->rowCount();
 
    // if access_code exists
    if($num>0){
 
        // return true because access_code exists in the database
        return true;
    }
 
    // return false if access_code does not exist in the database
    return false;
    
}
function getAccesscode(){
        $query = "SELECT access_code FROM ". $this->table_name ." where email= :email" ;
        $stmt = $this->conn->prepare( $query );
        $this->email=htmlspecialchars(strip_tags($this->email));
        // bind given access_code value
        $stmt->bindParam(':email', $this->email);
    	$stmt->execute();
		$rs = $stmt->fetch(PDO::FETCH_NUM);
		return $rs[0];
}
function resetPassw(){
 
    // update query
    $query = "UPDATE " . $this->table_name . "
            SET password = :password
            WHERE access_code = :access_code";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // bind the values from the form
    $password_hash = password_hash('123456', PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password_hash);
    $stmt->bindParam(':access_code', $this->access_code);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

public function getInfo($ID){
    $query = "SELECT ID_User,firstname,lastname,email,contact_number,address,access_level from users where ID_User=".$ID;
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $data=array();
    while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
       $row=array();
       $row['ID_User']=$rs["ID_User"];
       $row['firstname']=$rs["firstname"];
       $row['lastname']=$rs["lastname"];
       $row['email']=$rs["email"];
       $row['contact_number']=$rs["contact_number"];
       $row['address']=$rs["address"];
       $row['access_level']=$rs["access_level"];
       $data[]=$row;
}
$jsonData=array();
$jsonData['record']=$data;
echo json_encode($jsonData);
}

public function updateInfo(){
    $query = "UPDATE  ".$this->table_name." SET firstname = :firstname, lastname = :lastname, contact_number = :contact_number, address = :address,  email = :email where ID_User = :ID_User";
    // echo $query;
    $stmt = $this->conn->prepare($query);


    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':ID_User', $this->ID_User);
    $stmt->bindParam(':firstname', $this->firstname);
    $stmt->bindParam(':lastname', $this->lastname);
    $stmt->bindParam(':address', $this->address);
    $stmt->bindParam(':contact_number', $this->contact_number);

    if ($stmt->execute()) {
        echo 1;
    }else{
        $this->showError($stmt);
        echo 0;
    }

}

public function checkPass(){
    $query = "SELECT password FROM users where ID_User=".$this->ID_User;
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
	$rs = $stmt->fetch(PDO::FETCH_NUM);
    if(password_verify($this->password, $rs[0])) return 1;
    else return 0;
}
public function updatePass(){
    $query = "Update ".$this->table_name." set password = :password where ID_User=".$this->ID_User;
    $stmt = $this->conn->prepare( $query );
    $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password_hash);
    if ($stmt->execute()) {
        echo 1;
    }else{
        echo 0;
    }
}

public function deleleUser(){
    $query1 = "DELETE FROM exam WHERE ID_User=".$this->ID_User; 
    $stmt1 = $this->conn->prepare( $query1 );
    if($stmt1->execute()) $rs1=1;
    else $rs1=0; 

    $query2 = "DELETE FROM exam_config_user WHERE ID_User=".$this->ID_User; 
    $stmt2 = $this->conn->prepare( $query2 );
    if($stmt2->execute()) $rs2=1;
    else $rs2=0;
    

    $query3 = "DELETE FROM users WHERE ID_User=".$this->ID_User; 
    $stmt3 = $this->conn->prepare( $query3 );
    if($stmt3->execute()) $rs3=1;
    else $rs3=0;

    if($rs1==1|| $rs2==1||rs3==1) echo 1;
    else echo 0;
}


}