<?php
function index(){
    $sql = "SELECT news.id,news.content,news.title, news.image,news.created_at,news.id_user, account.username FROM news, account where news.id_user=account.id";
    $news = executeQuery($sql);
    tin_tuc_render('news/index.php', ['news' => $news]);
}
function detail(){
    $id = $_GET['id'];
    $sql = "SELECT news.id,news.content,news.title, news.image,news.created_at,news.id_user, account.username FROM news, account where news.id='$id' and news.id_user=account.id ";
    $nd = executeQuery($sql);
    tin_tuc_render('news/detail.php',['nd' => $nd]);
}