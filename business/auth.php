<?php
session_start();
require_once './commons/app_config.php';
require_once './commons/helpers.php';
require_once './dao/system_dao.php';

function login(){
    if(isset($_POST['btnSub'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (empty($username)) {
            $_SESSION['username'] = "Bạn cần nhập vào tài khoản";
        }
        if (empty($password)) {
            $_SESSION['password'] = "Bạn cần nhập vào mật khẩu";
        } else {
            $sql = "SELECT * from account WHERE username='" . $_POST['username'] . "'";
            $user = executeQuery($sql);
            if ($user) {
                foreach ($user as $key) {
                    if ($key['username']) {
                        if (password_verify($password, $key['password'])) {
                            if($key['permission'] == 0){
                                $_SESSION['admin'] = $_POST['username'];
                                header("location: ".BASE_URL."");
                            }else if($key['permission'] == 1){
                                $_SESSION['client'] = $_POST['username'];
                                header("location: ".BASE_URL."");
                            }else if($key['permission'] == 1){
                                $_SESSION['ctv'] = $_POST['username'];
                                header("location: ".BASE_URL."");
                            }
                        } else {
                            $_SESSION['password'] = "Mật khẩu không đúng";
                        }
                    }
                }
            } else {
                $_SESSION['username'] = "Tài khoản chưa tồn tại";
            }
        }
    }
    client_render('/login.php');
}
function register(){
    if(isset($_POST['btnSub'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT into account SET username='$username',password='$passwordHash'";
        executeQuery($sql);
    }
    client_render('/register.php');
}

