<?php
function products_index(){
    $sql = "select * from products";
    $products = executeQuery($sql);

    client_render('product/index.php', [
        'dsSanPham' => $products,
    ]);
}
function products_detail(){
    $id = $_GET['id'];
    $sql = "select * from products where id = $id";
    $product = executeQuery($sql);
    client_render('product/detail.php',[
        'product' => $product,
    ]);
}