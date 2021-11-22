<?php
session_start();
<<<<<<< Updated upstream
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
	
=======
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
>>>>>>> Stashed changes
    client_render('/register.php');
}
function logout(){
    client_render('/logout.php');
}
function profile(){
    echo "thông tin ca nhân";
}
