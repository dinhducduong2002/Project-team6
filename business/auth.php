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
                            if($key['status'] == 1){
                                $_SESSION["user"] = [
                                    "id" => $key['id'],
                                    "username" => $key['username'],
                                    "password" => $key['password'],
                                    "email" => $key['email'],
                                    "balance" => $key['balance'],
                                    "status" => $key['status'],
                                    "permission" => $key['permission'],
                                    "create_at" => $key['create_at'],
                                ];
                                header("location: ".BASE_URL."");
                            }else{
                                $_SESSION['status'] = "Tài khoản của bạn đã bị khóa do vi phạm tiêu chuẩn cộng đồng của chúng tôi";
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
function set_session($key, $value) {
    $_SESSION[$key] = $value;
}
function register(){
    if(isset($_POST['btnSub'])){
        $_SESSION = [];
        $username = $_POST['username'];
        $email=$_POST['email'];
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $confirm_password = $_POST['pass1'];

    if (empty($username)) {
        $_SESSION['username'] = "Bạn cần nhập vào tài khoản";
    }
    if (empty($email)) {
        $_SESSION['email'] = 'Vui lòng điền thông tin';
    }  
    if (empty($password)) {
        $_SESSION['password'] = 'Vui lòng điền thông tin';
    } else if (strlen($password) < 6) {
        $_SESSION['password'] = 'Mật khẩu tối thiểu 6 ký tự';
    }
    if (empty($confirm_password)) {
        $_SESSION['pass1'] = 'Vui lòng điền xác nhận mật khẩu';
    } else if ($confirm_password != $password) {
        $_SESSION['pass1'] = 'Xác nhận mật khẩu không khớp';
    }
    $sql="SELECT * FROM account where username = '$username' ";
        $check_user = executeQuery($sql, $getAll = true);
        if ($check_user == $username) {
            $_SESSION['username'] = "Tên tài khoản đã tồn tại";
          }
    $sql="SELECT * FROM account where email = '$email' ";
        $check_email = executeQuery($sql, $getAll = true);
        if ($check_email) {
            $_SESSION['email'] = "Email đã tồn tại";
          }
    else {   
        $sql = "INSERT into account SET username='$username', email='$email', password='$passwordHash'";
        executeQuery($sql);
        $_SESSION['success'] = "Thêm tài khoản thành công";
        header("location: " . CLIENT_URL . 'login');
    }
    }    
    client_render('/register.php');
}
function logout(){
    client_render('/logout.php');
}
function profile(){
    echo "thông tin ca nhân";
}