<?php

    function pay_banking(){
        
        if($_SESSION['user']['permission'] == 1){

            $sql = "SELECT * FROM pay_banking WHERE id_ctv='".$_SESSION['user']['id']."'";
            $pay_banking = executeQuery($sql);

        }else{

            $sql = "SELECT * FROM pay_banking";
            $pay_banking = executeQuery($sql);

        }

        admin_render('pay-banking/pay-banking.php',[
    
            'pay_banking' => $pay_banking,

        ]);

        if(isset($_POST['btn_update'])){

            extract($_POST);

            $sql = "UPDATE pay_banking SET status='1' WHERE id='$btn_update'";
            executeQuery($sql);
            

            $_SESSION['success'] = "Xác nhận đã chuyển khoản thành công";
            header("location: " . ADMIN_URL . 'pay-banking');

        }
    }

    function delete_pay_banking(){

        $id = $_GET['id'];
        $sql = "DELETE FROM pay_banking WHERE id ='$id'";
        executeQuery($sql);
        
        $_SESSION['success'] = "Xóa thành công";
        header("location: " . ADMIN_URL . 'pay-banking');

    }

    function add_pay_banking(){

        $sql = "SELECT * FROM account WHERE id='".$_SESSION['user']['id']."'";
        $data_account = executeQuery($sql);

        admin_render('pay-banking/add-pay-banking.php',[
    
            'data_account' => $data_account,

        ]);

        if(isset($_POST['btn_add'])){

            extract($_POST);
            
            $regex = "/[\@\#\$\%\^\&\*\(\)\_\+\!\,\=\-\?]/";

            if( empty($money) || empty($banking) || empty($account_number) || empty($account_holder) || empty($bank_branch) )
            {
                $_SESSION['error'] = "Nhập đầy đủ thông tin❗";

            }else if( preg_match($regex, $money) || preg_match($regex, $banking) || preg_match($regex, $account_number) || preg_match($regex, $account_holder) || preg_match($regex, $bank_branch)){

                $_SESSION['error'] = "Không nhập kí tự đặc biệt❗";

            }else if(empty($money)){

                $_SESSION['error'] = "Bạn chưa nhập số tiền rút❗";

            }else if($money < 100000){

                $_SESSION['error'] = "Số tiền chưa đủ 100k nhé❗";

            }else if($money > $_SESSION['user']['balance']){

                $_SESSION['error'] = "Số dư tài khoản của bạn không đủ❗";

            }else if(empty($banking)){

                $_SESSION['error'] = "Bạn chưa nhập Ngân Hàng của bạn❗";

            }else if(empty($account_number)){

                $_SESSION['error'] = "Số tài khoản của bạn còn trống❗";

            }else if(empty($account_holder)){

                $_SESSION['error'] = "Tên chủ thẻ trống❗";

            }else if(empty($bank_branch)){

                $_SESSION['error'] = "Vui lòng điền chi nhánh❗";

            }else{

                $money_surplus = $_SESSION['user']['balance'] - $money;
                $sql = "UPDATE account SET balance='$money_surplus' WHERE id='".$_SESSION['user']['id']."'";
                executeQuery($sql);

                $money_discount = ( $money * 55 ) / 100 ;
                $sql = "INSERT INTO pay_banking SET id_ctv='".$_SESSION['user']['id']."', money='$money', banking='$banking', account_number='$account_number', account_holder='$account_holder', bank_branch='$bank_branch', money_discount='$money_discount'";
                executeQuery($sql);

                $_SESSION['success'] = "Tạo lệnh rút tiền thành công tiền sẽ được cộng sau ngày 29-30 cuối tháng✅";
                
            }

            header("location: " . ADMIN_URL . 'add-pay-banking');

        }

    }