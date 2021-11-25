<?php
session_start();

function admin_render($viewpath, $data = []){

    extract($data);
    $businessView = "./views/admin/" . $viewpath;
    include_once './views/admin/layouts/main.php';
}
function client_render($viewpath, $data = []){
    
    extract($data);
    $businessView = "./views/homepage/" .$viewpath;
    include_once './views/homepage/san-pham.php';
}
function errors_render($viewpath, $data = []){
    
    extract($data);
    $businessView = "./views/homepage/" .$viewpath;
    include_once './views/homepage/error404.php';
}

?>