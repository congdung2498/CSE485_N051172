<?php
// 'result' object
class Result{
 
    // database connection and table name
    private $conn;
    private $table_name = "result";
 
    // object properties
    public $ID_Result;
    public $ID_User;
    public $ID_Exam;
    public $Score;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }