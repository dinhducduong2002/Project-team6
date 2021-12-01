<?php

function get_connect(){
    $connect = new PDO("mysql:host=103.97.125.226;dbname=hczqsfof_db_team6;charset=utf8", "hczqsfof_admin", "Duong2002@");
    
    return $connect;
} 
function executeQuery($sql, $getAll = true){
    $connect = get_connect();
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if($getAll){
        return $data;
    }else{
        if(count($data) > 0){
            return $data[0];
        }
    }
}


?>