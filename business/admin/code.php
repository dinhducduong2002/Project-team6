<?php

    if($_SESSION['user']['permission'] == 0){
        function code(){

            $sql = "SELECT * FROM code ";
            $code = executeQuery($sql);
    
            admin_render('code/code.php',[
                'code' => $code,
            ]);
        }
    
        function delete_code(){
    
            $id = $_GET['id'];
            $sql = "DELETE FROM code WHERE id ='$id'";
            executeQuery($sql);
            
            $_SESSION['success'] = "Xóa thành công";
            header("location: " . ADMIN_URL . 'code');
        }
    
        
        function delete_manage_code(){
    
            $id = $_GET['id'];
            $sql = "DELETE FROM code_details WHERE id ='$id'";
            executeQuery($sql);
            
            $_SESSION['success'] = "Xóa thành công";
            header("location: " . ADMIN_URL . 'code');
        }
    
        function manage_code(){
    
            $id = $_GET['id'];
            $sql = "SELECT * FROM code_details WHERE id_code='$id'";
            $code = executeQuery($sql);
    
            admin_render('code/manage_code.php',[
                'code' => $code,
            ]);
        }
    
        function add_code(){
    
            admin_render('code/add_code.php',[
        
    
            ]);
    
            if(isset($_POST['btn_add'])){
    
                extract($_POST);
                
                $regex = "/[\@\#\$\%\^\&\*\(\)\_\+\!\,\=\-\?]/";
    
                if( empty($discount_code) || empty($price_sale) || empty($quantity) )
                {
                    $_SESSION['error'] = "Nhập đầy đủ thông tin";
    
                }else if( preg_match($regex, $discount_code) || preg_match($regex, $price_sale) || preg_match($regex, $quantity) ){
    
                    $_SESSION['error'] = "Không nhập kí tự đặc biệt";
    
                }else{
    
                    $sql = "INSERT INTO code SET discount_code='$discount_code', price_sale='$price_sale', quantity='$quantity'";
                    executeQuery($sql);
    
                    $_SESSION['success'] = "Tạo mới mã giảm giá thành công";
                    
                }
                header("location: " . ADMIN_URL . 'add-code');
    
            }
        }
    }