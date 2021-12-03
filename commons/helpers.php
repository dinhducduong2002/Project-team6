<?php

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
function tin_tuc_render($viewpath, $data = []){
    
    extract($data);
    $businessView = "./views/homepage/" .$viewpath;
    include_once './views/homepage/tin-tuc.php';
}
function errors_render($viewpath, $data = []){
    
    extract($data);
    $businessView = "./views/homepage/" .$viewpath;
    include_once './views/homepage/error404.php';
}
function getUserBalance(){
    if(!isset($_SESSION['user'])){
        return 0;
        
    }else{
        $sql = "SELECT * FROM account where id='".$_SESSION['user']['id']."'";
        $balances = executeQuery($sql);
        return $balances[0]['balance'];
    }
    
}
?>