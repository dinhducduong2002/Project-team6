<?php
function pay(){
    $sql = "SELECT * FROM account WHERE username='".$_SESSION["user"]['username']."'";
    $data_pay = executeQuery($sql);

    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id='$id'";
    $sql_data_products = executeQuery($sql);

    $cp_ctv = $sql_data_products[0]['cp_ctv'];
    $sql = "SELECT * FROM account WHERE id='$cp_ctv'";
    $sql_data_ctv = executeQuery($sql);

    client_render('product/pay.php',[

        'data_pay' => $data_pay,
        'sql_data_products' => $sql_data_products,
    ]
    );

    if(isset($_POST['btnAdd'])){
        
        $price = $sql_data_products[0]['price'];
        $name_account = $sql_data_products[0]['username'];
        $password_account = $sql_data_products[0]['password'];
        $surplus = $data_pay[0]['balance'] - $sql_data_products[0]['price'];
        $content = $sql_data_products[0]['category'];
        $id_ctv = $sql_data_products[0]['cp_ctv'];
        $name_product = $sql_data_products[0]['name_product'];
        $server_tk = $sql_data_products[0]['server'];
        $id_product = $sql_data_products[0]['id'];

        $price_ctv = $sql_data_ctv[0]['balance'] + $sql_data_products[0]['price'];

        $id_user = $_SESSION['user']['id'];
        $sql = "INSERT INTO account_purchase_history SET id_user='$id_user', price='$price', name_account='$name_account', password_account='$password_account', surplus='$surplus',
                content='$content', id_ctv='$id_ctv', name_product='$name_product', id_product='$id_product',server='$server_tk'";
        executeQuery($sql);
        
        $sql = "UPDATE account SET balance='$surplus' WHERE id='$id_user'";
        executeQuery($sql);

        $sql = "UPDATE account SET balance='$price_ctv' WHERE id='$cp_ctv'";
        executeQuery($sql);

        $sql = "UPDATE products SET status='1' WHERE id='$id'";
        executeQuery($sql);
        
        $_SESSION['success'] = "Thanh toán thành công";
        header("location: " . CLIENT_URL . 'user/history');
    }
}
