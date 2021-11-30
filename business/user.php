<?php
function index(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM account where id=$id";
    $acc = executeQuery($sql);
    client_render('user/index.php', ['acc' => $acc]);
}
function history(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM account_purchase_history where id_user=$id ";
    $aph = executeQuery($sql);
    client_render('user/history.php', ['aph' => $aph]);
}
function change_password(){
    if(isset($_POST['btnSub'])){
        $username=$_SESSION['user']['username'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $passwordHash = password_hash($newpassword, PASSWORD_DEFAULT);
        $confirmpassword = $_POST['confirmpassword'];
            
        if (empty($password)) {
            $_SESSION['password'] = "Bạn cần nhập vào mật khẩu cũ";
        }
        if (empty($newpassword)) {
            $_SESSION['newpassword'] = 'Bạn cần nhập vào mật khẩu mới';
        }else if (strlen($newpassword) < 6) {
            $_SESSION['newpassword'] = 'Mật khẩu tối thiểu 6 ký tự';
        }
        if (empty($confirmpassword)) {
            $_SESSION['confirmpassword'] = 'Bạn cần nhập lại mật khẩu mới';
        }else if ($confirmpassword != $newpassword) {
            $_SESSION['confirmpassword'] = 'Xác nhận mật khẩu không khớp';
        }
        else {
            $sql="SELECT * FROM account where id = '".$_SESSION['user']['id']."' ";
            $check_user = executeQuery($sql);
            if($check_user){
                if (password_verify($password, $check_user[0]['password']) != $password) {
                $_SESSION['password'] = "Bạn nhập sai mật khẩu";
              }
              else {   
                $sql = "UPDATE account SET password='$passwordHash' where id = '".$_SESSION['user']['id']."' ";
                executeQuery($sql);
                $_SESSION['success'] = "Đổi mật khẩu thành công";
            }
            }  
        }
       
        }  
    client_render('user/change-password.php');
}