<?php
function index(){
    client_render('user/index.php');
}
function history(){
    $sql = "select * from account_purchase_history";
    $aph = executeQuery($sql);
    client_render('user/history.php', ['aph' => $aph]);
}
function change_password(){
    client_render('user/change-password.php');
}