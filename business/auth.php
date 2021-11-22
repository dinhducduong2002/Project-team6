<?php
session_start();
require_once './commons/app_config.php';
require_once './commons/helpers.php';
require_once './dao/system_dao.php';
function login(){
<<<<<<< Updated upstream
    $username = $_GET['username'];
    $password =$_GET['password'];
    $sql="select * from users where username = '$username' and password = '$password'";
    $user = executeQuery($sql);
            client_render('/login.php');
}
=======
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    if ($username != "" && $password != "") {
    $sql="select * from account where username = '$username'";
    $user = executeQuery($sql,false);
    if ($user && ($password  $user['password'])) {
        $_SESSION[AUTH] = [
            "id" => $user['id'],
            "username" => $user['username'],
            "password" => $user['password'],
        ];
        header('location: ' . BASE_URL);
        die;
    }
}
echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
die;
    }
            client_render('/login.php');

>>>>>>> Stashed changes
    

function register(){
	
    client_render('/register.php');
}