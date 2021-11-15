<?php

class DB{

    public $conn;
    protected $servername = "localhost";
    protected $dbname = "project_team6";
    protected $username = "root";
    protected $password = "";

    function __construct(){
        
    try{
        $this->conn = new PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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