<?php
function pay(){

    extract($_POST);

    $sql = "SELECT * FROM account WHERE username='".$_SESSION["user"]['username']."'";
    $data_pay = executeQuery($sql);

    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id='$id'";
    $sql_data_products = executeQuery($sql);

    $cp_ctv = $sql_data_products[0]['cp_ctv'];
    $sql = "SELECT * FROM account WHERE id='$cp_ctv'";
    $sql_data_ctv = executeQuery($sql);


    if(!empty($discount_code)){

        $sql = "SELECT * FROM code WHERE discount_code='$discount_code'";
        $data_code = executeQuery($sql);
    }

    
    $sql = "SELECT * FROM code_details WHERE name_account='".$_SESSION['user']['username']."'";
    $data_code_details = executeQuery($sql); 

    client_render('product/pay.php',[

        'data_pay' => $data_pay,
        'sql_data_products' => $sql_data_products,  

    ]
    );

    $regex = "/[\@\#\$\%\^\&\*\(\)\_\+\!\,\=\-\?]/";

    if(isset($_POST['btn_code'])){   

        if(empty($discount_code)){  

            $_SESSION['error'] = "Bạn chưa nhập mã giảm giá";

        }else if(preg_match($regex, $discount_code)){

            $_SESSION['error'] = "Mã giảm giá không chứa kí tự đặc biệt";

        }else{
    
            if($discount_code != $data_code[0]['discount_code']){

                $_SESSION['error'] = "Mã giảm giá không tồn tại";

            }else if($data_code[0]['quantity'] <= 0){

                $_SESSION['error'] = "Mã giảm giá đã hết lượt sử dụng";
    
            }else if($_SESSION['user']['permission'] == 0 || $_SESSION['user']['permission'] == 1){

                $_SESSION['error'] = "Tài khoản Admin và CTV không áp dụng mã giảm giá";
    
            }else if($data_code_details[0]['name_account'] == $_SESSION['user']['username'] && $data_code[0]['id'] == $data_code_details[0]['id_code']){

                $_SESSION['error'] = "Bạn đã sử dụng mã 1 lần";
    
            }else{

                $price_code = ($sql_data_products[0]['price'] * $data_code[0]['price_sale']) / 100;
                $_SESSION['price_code'] = $sql_data_products[0]['price'] - $price_code;
                $_SESSION['code'] = $data_code[0]['id'];

                $_SESSION['success'] = "Sử dụng mã giảm giá thành công";

            }  
        
        }
        header("location: " . CLIENT_URL . 'san-pham/pay?id='. $sql_data_products[0]['id']);

    }



    if(isset($_POST['btnAdd'])){
        
        if(isset($_SESSION['price_code'])){

            $price = $_SESSION['price_code'];

        }else{

            $price = $sql_data_products[0]['price'];
        }
        
        $name_account = $sql_data_products[0]['username'];
        $password_account = $sql_data_products[0]['password'];
        $surplus = $data_pay[0]['balance'] - $price;
        $id_ctv = $sql_data_products[0]['cp_ctv'];
        $name_product = $sql_data_products[0]['name_product'];
        $server_tk = $sql_data_products[0]['server'];
        $id_product = $sql_data_products[0]['id'];

        $price_ctv = $sql_data_ctv[0]['balance'] + $sql_data_products[0]['price'];

        $id_user = $_SESSION['user']['id'];
        $sql = "INSERT INTO tblhistory SET id_user='$id_user', price='$price', name_account='$name_account', password_account='$password_account', surplus='$surplus',
         id_ctv='$id_ctv', name_product='$name_product', id_product='$id_product',server='$server_tk'";
         
        executeQuery($sql);
        
        if($id_user != $id_ctv){

            $sql = "UPDATE account SET balance='$surplus' WHERE id='$id_user'";
            executeQuery($sql);

            $sql = "UPDATE account SET balance='$price_ctv' WHERE id='$id_ctv'";
            executeQuery($sql);

        }


        $sql = "UPDATE products SET status='1' WHERE id='$id'";
        executeQuery($sql);

        if(isset($_SESSION['price_code'])){

            $sql = "INSERT INTO code_details SET id_code='".$_SESSION['code']."', name_account='".$_SESSION['user']['username']."', price='".$sql_data_products[0]['price']."',
            reduced_price='$price', id_products='".$sql_data_products[0]['id']."'";
            executeQuery($sql);

            $quantity = $data_code[0]['quantity'] - 1;
            $sql = "UPDATE code SET quantity='$quantity' WHERE id='".$data_code[0]['id']."'";
            executeQuery($sql);

        }

        unset($_SESSION['price_code']);
        unset($_SESSION['code']);
        $_SESSION['success'] = "Thanh toán thành công";
        
        header("location: " . CLIENT_URL . 'user/history');
    }
}
