<?php
function products_index(){
    $id = $_GET['id'];
    $sql = "SELECT * from products where status=0 and category='$id'";
    $products = executeQuery($sql);


    client_render('product/index.php', [
        'dsSanPham' => $products,
    ]);
}
function products_detail(){
    $id = $_GET['id'];
    $sql = "select * from products where id = $id";
    $product = executeQuery($sql);
    $id_pr = $product[0]['id'];
    $id_ct = $product[0]['category'];
    $sql = "SELECT * FROM `product_image` WHERE product_id='$id_pr'";
    $product_detail = executeQuery($sql);
    $sql = "SELECT * FROM products where category='$id_ct' limit 4";
    $product_sp = executeQuery($sql);
    client_render('product/detail.php',[
        'product' => $product,
        'product_detail' => $product_detail,
        'product_sp' => $product_sp,
    ]);
}