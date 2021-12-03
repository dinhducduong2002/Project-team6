<?php
function products_index(){
    if(isset($_POST['btnSearch'])){
        $id = $_GET['id'];
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $data = 12;
        $sql = "SELECT * from products where status=0 and category='$id' and name_product LIKE '%" . $_POST['keyword'] . "%'";
        $result = executeQuery($sql);
        $number = count($result);
        $pagea = ceil($number / $data);
        $pages = ($page - 1) * $data;
        $sql = "SELECT * from products where status=0 and category='$id' and name_product LIKE '%" . $_POST['keyword'] . "%' ORDER BY create_at DESC LIMIT $pages,$data";
        $products = executeQuery($sql);
        
        client_render('product/index.php', [
            'dsSanPham' => $products,
            'pagea' => $pagea,
        ]);
    }else{
        $id = $_GET['id'];
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $data = 12;
        $sql = "SELECT * from products where status=0 and category='$id'";
        $result = executeQuery($sql);
        $number = count($result);
        $pagea = ceil($number / $data);
        $pages = ($page - 1) * $data;
        $sql = "SELECT * from products where status=0 and category='$id' ORDER BY create_at DESC LIMIT $pages,$data";
        $products = executeQuery($sql);
        
        client_render('product/index.php', [
            'dsSanPham' => $products,
            'pagea' => $pagea,
        ]);
    }
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