<?php 

function service(){
    $sql = "SELECT * FROM service";
    $services = executeQuery($sql);
    client_render('trang-chu.php',[
        'ser' => $services
    ]);
}

?>