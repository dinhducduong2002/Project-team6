<?php

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
                            $_SESSION['user'] = [
                                "id" => $user['id'],
                                "username" => $user['username'],
                                "permission" => $user['permission'],
                            ];
                            header("location: ".BASE_URL."");
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
function logout(){
    client_render('/logout.php');
}
function profile(){
    echo "thông tin ca nhân";
}