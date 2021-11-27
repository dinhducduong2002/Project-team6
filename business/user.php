<?php
function index(){

    $sql = "SELECT * FROM account where id='".$_SESSION['user']['id']."'";
    $acc = executeQuery($sql);
    client_render('user/index.php', ['acc' => $acc]);
}
function history(){
    
    $sql = "SELECT * FROM account_purchase_history where id_user='".$_SESSION['user']['id']."' ";
    $aph = executeQuery($sql);
    client_render('user/history.php', ['aph' => $aph]);
}
function change_password(){
    client_render('user/change-password.php');
}