<?php
function pay(){
    $sql_data_pay = "SELECT * FROM account WHERE username='".$_SESSION["user"]['username']."'";
    $data_pay = executeQuery($sql_data_pay);

    $id = $_GET['id'];
    $sql_data_products = "SELECT * FROM products WHERE id='$id'";
    $sql_data_products = executeQuery($sql_data_products);

    client_render('product/pay.php',[

        'data_pay' => $data_pay,
        'sql_data_products' => $sql_data_products,
    ]
    );

    if(isset($_POST['btnAdd'])){
        $username = $_SESSION['client'];
        $sql = "UPDATE account_purchase_history SET name_account='$username' WHERE $username='".$_SESSION['client']."'";
        executeQuery($sql);
    }
}
