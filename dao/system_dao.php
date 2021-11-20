<?php

function get_connect(){
    $connect = new PDO("mysql:host=103.75.185.14;dbname=donjfhrmhosting_slot6;charset=utf8", "donjfhrmhosting_admin", "Duong2002@");
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
function input_post($key){
    return isset($_POST[$key]) ? trim($_POST[$key]) : false;
}
function is_submit($key){
    return (isset($_POST['request_name']) && $_POST['request_name'] == $key);
}
function show_error($error, $key){
    echo '<span style="color: red">'.(empty($error[$key]) ? "" : $error[$key]). '</span>';
}

?>