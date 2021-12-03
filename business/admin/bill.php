<?php
    function bill(){
       
        if($_SESSION['user']['permission'] == 0){
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $data = 10;
            $sql = "SELECT * FROM account_purchase_history";
            $result = executeQuery($sql);
            $number = count($result);
            $pagea = ceil($number / $data);
            $pages = ($page - 1) * $data;
            $sql = "SELECT * FROM account_purchase_history ORDER BY created_at DESC LIMIT $pages,$data";
            $data_bill = executeQuery($sql);
            admin_render('bill/manager-bill.php',[
                'data_bill' => $data_bill,
                'pagea' => $pagea,
            ]);

        }else if($_SESSION['user']['permission'] == 1){
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            $data = 10;
            $sql = "SELECT * FROM account_purchase_history";
            $result = executeQuery($sql);
            $number = count($result);
            $pagea = ceil($number / $data);
            $pages = ($page - 1) * $data;
            $sql = "SELECT * FROM account_purchase_history where id_ctv='".$_SESSION['user']['id']."' ORDER BY created_at DESC LIMIT $pages,$data";
            $data_bill = executeQuery($sql);
            admin_render('bill/manager-bill.php',[
                'data_bill' => $data_bill,
                'pagea' => $pagea,
            ]);

            
        }
        

        if(isset($_POST['btn_update'])){

            extract($_POST);

            $sql = "SELECT * FROM account_purchase_history WHERE id='$btn_update'";
            $data_bill_one = executeQuery($sql);

            $id = $data_bill_one[0]['id'];
            $id_user = $data_bill_one[0]['id_user'];
            $id_ctv = $data_bill_one[0]['id_ctv'];

            $sql = "SELECT * FROM account WHERE id='$id_user'";
            $data_account_kh = executeQuery($sql);

            $sql = "SELECT * FROM account WHERE id='$id_ctv'";
            $data_account_ctv = executeQuery($sql);

            $surplus = $data_account_kh[0]['balance'] + $data_bill_one[0]['price'];
            $price_ctv = $data_account_ctv[0]['balance'] - $data_bill_one[0]['price'];

            $sql = "UPDATE account_purchase_history SET status='1' WHERE id='$id'";
            executeQuery($sql);
            
            $sql = "UPDATE account SET balance='$surplus' WHERE id='$id_user'";
            executeQuery($sql);

            $sql = "UPDATE account SET balance='$price_ctv' WHERE id='$id_ctv'";
            executeQuery($sql);

            $_SESSION['success'] = "Hoàn lại tiền thành công";
            header("location: " . ADMIN_URL . 'manager-bill');

        }

    }

    function delete_bill(){

        $id = $_GET['id'];
        $sql = "DELETE FROM account_purchase_history WHERE id ='$id'";
        executeQuery($sql);
        
        $_SESSION['success'] = "Xóa thành công";
        header("location: " . ADMIN_URL . 'manager-bill');

    }