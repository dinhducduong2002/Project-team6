<?php

function login()
{
    if (isset($_POST['btnSub'])) {
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
                            if ($key['status'] == 1) {
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
                                header("location: " . BASE_URL . "");
                            } else {
                                $_SESSION['error'] = "Tài khoản của bạn đã bị khóa do vi phạm tiêu chuẩn cộng đồng của chúng tôi";
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

function set_session($key, $value)
{
    $_SESSION[$key] = $value;
}
function register()
{
    $error = [
        'username' => '',
        'email' => '',
        'password' => '',
        'pass1' => ''
    ];
    if (isset($_POST['btnSub'])) {
        $_SESSION = [];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $confirm_password = $_POST['pass1'];

        if (empty($username)) {
            $error['username'] = "Bạn cần nhập vào tài khoản";
        }
        if (strlen($username) < 10) {
            $error['username'] = "Tài khoản quá ngắn";
        }
        $regexx = "/[\@\#\$\%\^\&\*\(\)\_\+\!\,\=\-\?]/";
        if (preg_match($regexx, $username)) {
            $error['username'] = "Tài khoản không được chứa kí tự đặc biệt";
        }
        if (empty($email)) {
            $error['email'] = 'Vui lòng điền thông tin';
        } else {
            $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
            if (!preg_match($regex, $email)) {
                $error['email'] = "Vui lòng nhập đúng định dạng email";
            }
        }
        if (empty($password)) {
            $error['password'] = 'Vui lòng điền thông tin';
        } else if (strlen($password) < 6) {
            $error['password'] = 'Mật khẩu tối thiểu 6 ký tự';
        }
        if (empty($confirm_password)) {
            $error['pass1'] = 'Vui lòng điền xác nhận mật khẩu';
        } else if ($confirm_password != $password) {
            $error['pass1'] = 'Xác nhận mật khẩu không khớp';
        }
        $sql = "SELECT * FROM account where username = '$username' ";
        $check_user = executeQuery($sql, $getAll = true);
        if ($check_user == $username) {
            $error['username'] = "Tên tài khoản đã tồn tại";
        }
        $sql = "SELECT * FROM account where email = '$email' ";
        $check_email = executeQuery($sql, $getAll = true);
        if ($check_email) {
            $error['email'] = "Email đã tồn tại";
        } else {
            if (!array_filter($error)) {
                $sql = "INSERT into account SET username='$username', email='$email', password='$passwordHash'";
                executeQuery($sql);
                $_SESSION['success'] = "Đăng Ký tài khoản thành công";
                header("location: " . CLIENT_URL . 'login');
            }
        }
    }
    client_render('/register.php', [
        'error' => $error
    ]);
}
// đăng xuất
function logout()
{
    client_render('/logout.php');
}

// quên mật khẩu
// nhập mã xác nhận
function verification_form()
{
    if (isset($_POST['btn'])) {
        $recceiver = $_POST['recceiver'];
        if (empty($recceiver)) {
            $_SESSION['recceiver'] = 'Vui lòng điền thông tin';
        } else if ($recceiver != $_SESSION['code']) {
            $_SESSION['recceiver'] = 'Mã xác nhận không đúng ! ';
        } else {

            header("location: " . CLIENT_URL . 'reset-pass');
        }
    }
    client_render('/verification.php');
}
// đổi mật khẩu sau khi nhập đúng mã

function reset_password()
{
    if (isset($_POST['btnSub'])) {
        $newpassword = $_POST['newpassword'];
        $passwordHash = password_hash($newpassword, PASSWORD_DEFAULT);
        $confirmpassword = $_POST['confirmpassword'];

        if (empty($newpassword)) {
            $_SESSION['newpassword'] = 'Bạn cần nhập vào mật khẩu mới';
        } else if (strlen($newpassword) < 6) {
            $_SESSION['newpassword'] = 'Mật khẩu tối thiểu 6 ký tự';
        }
        if (empty($confirmpassword)) {
            $_SESSION['confirmpassword'] = 'Bạn cần nhập lại mật khẩu mới';
        } else if ($confirmpassword != $newpassword) {
            $_SESSION['confirmpassword'] = 'Xác nhận mật khẩu không khớp';
        } else {
            $sql = "UPDATE account SET password='$passwordHash' where email = '" . $_SESSION['email'] . "'  ";
            executeQuery($sql);
            unset($_SESSION['email']);
            $_SESSION['success'] = "Đổi mật khẩu thành công";
            // header("location: login");
        }
    }


    client_render('/resetpass.php');
}
