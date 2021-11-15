<?php

class DB{

    public $conn;
    protected $servername = "103.75.185.14";
    protected $dbname = "donjfhrmhosting_dbteam6";
    protected $username = "donjfhrmhosting_dbteam6";
    protected $password = "Duong2002@";

    function __construct(){
        
    try{
        $this->conn = new PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn -> exec('SET NAMES utf8'); // METHOD #3 
        $this->conn -> exec('SET CHARACTER SET utf8'); // METHOD #4 
        
    } catch (PDOException $e) {
        echo "lỗi không thể kết nối dự liệu<br>";
        echo "thông tin lỗi" . $e->getMessage();
    }

    }
    
    public function getData($sql, $flag = true)
    {
        $stmt =$this-> conn->prepare($sql);
        $stmt->execute();
        if ($flag) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function command_execution($sql)
    {
        $stmt = $this-> conn->prepare($sql);
        return $stmt->execute();
    }
    
}