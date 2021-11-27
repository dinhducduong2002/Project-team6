<?php
function index(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM account where id=$id";
    $acc = executeQuery($sql);
    client_render('user/index.php', ['acc' => $acc]);
}
function history(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM account_purchase_history where id_user=$id ";
    $aph = executeQuery($sql);
    client_render('user/history.php', ['aph' => $aph]);
}
function change_password(){
    client_render('user/change-password.php');
}