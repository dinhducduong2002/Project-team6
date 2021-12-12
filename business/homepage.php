<?php
function index(){
    
    $sql = "SELECT * FROM services";
    $services = executeQuery($sql);
    $sql = "SELECT * FROM categorys";
    $category = executeQuery($sql);
    

    client_render('trang-chu.php',[
        'ser' => $services,
        'categorys' => $category,
    ]);
}

?>