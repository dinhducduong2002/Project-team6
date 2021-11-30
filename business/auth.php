<?php
require_once DIR_ROOT."/commons/mailer/mail.php";

// login

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

// đăng ký



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
        $_SESSION['success'] = "Đăng Ký tài khoản thành công";
        header("location: " . CLIENT_URL . 'login');
    }
    }    
    client_render('/register.php');
}
// đăng xuất
function logout(){
    client_render('/logout.php');
}
function profile(){
    echo "thông tin ca nhân";
}

// quên mật khẩu
function reset_form() {
    if(isset($_POST['btnSub'])){
        $email = $_POST['email'];
        $sql = "SELECT * FROM account WHERE email = '$email'";
        $user = executeQuery($sql, false);
        if (empty($email)) {
            $_SESSION['email'] = 'Vui lòng điền thông tin';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email'] = 'Email sai định dạng';
        } else if (empty($user)) {
            $_SESSION['email'] = 'Email không tồn tại trong hệ thống';
            var_dump($_SESSION['email']);
            die;
        } else {
            $token = base64_encode(uniqid().$email);
            $user_id = $user['id'];
            $start_time = date("Y-m-d H:i:s");
            $end_time = date("Y-m-d H:i:s", strtotime("+60 minutes"));
    
            $sql = "INSERT INTO account_tokens (user_id, access_token, start_time, end_time) VALUES ('$user_id', '$token', '$start_time', '$end_time')";
            executeQuery($sql);
    
            $verify_btn = 'Cập nhật mật khẩu';
            $verify_url = BASE_URL.('quen-mat-khau/cap-nhat-mat-khau?token='.$token);
            $mail_content = "Xin chào ".$user['username']."!.<br><br>Bạn đã đã có yêu cầu đổi mật khẩu. Bạn hãy bấm vào nút dưới đây để cập nhật lại mật khẩu cho tài khoản, liên kết có thời hạn 60 phút:";
            $mail_subject = '[SHOP-NICK-CÙI] Quên mật khẩu';
            sendEmail($email, $mail_subject, $mail_content, $verify_btn, $verify_url);
            $_SESSION['success'] = "Một liên kết đã được gửi vào địa chỉ email bạn cung cấp"; 
        }
        }
    client_render('/reset.php');
}