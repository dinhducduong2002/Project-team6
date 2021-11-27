<?php
function manager_ctv(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $data = 2;
    $sql = "SELECT * FROM account where permission=0 or permission=1";
    $result = executeQuery($sql);
    $number = count($result);
    $page = ceil($number / $data);
    $pages = ($page - 1) * $data;
    $sql = "SELECT * FROM account WHERE permission=0 or permission=1 ORDER BY create_at DESC LIMIT $pages,$data";
    $ds_ctv = executeQuery($sql);
    admin_render('account/manager-ctv.php',[
        'ds_ctv' => $ds_ctv,
        'page' => $page
    ]);

}
function delete_ctv(){
    $id = $_GET['id'];
    $sql = "delete from account where id = $id";
    executeQuery($sql);
    $_SESSION['success'] = "Xóa thành công";
    header("location: " . ADMIN_URL . 'manager-ctv');
}
function edit_ctv(){
    $id = $_GET['id'];
<<<<<<< Updated upstream
    $sql = "SELECT * from account where id = $id";
    $user = executeQuery($sql);
    admin_render('account/edit-ctv.php', [
        'user' => $user
    ]);
    if(isset($_POST['btnEdit'])){
        $balance = $_POST['balance'];
        $status = $_POST['status'];
        $permission = $_POST['permission'];

        $sql = "UPDATE account set balance='$balance', status='$status', permission='$permission' where id='$id'";
        executeQuery($sql);
        $_SESSION['success'] = "Cập nhật thành công";
        header("location: ".ADMIN_URL."manager-ctv");
    }
=======
    $sql = "SELECT from account where id='$id'";
    $user = executeQuery($sql);
    admin_render('account/edit-ctv.php');
>>>>>>> Stashed changes
}
function manager_client(){
    $sql = "SELECT * FROM account where permission=2";
    $ds_ctv = executeQuery($sql);
    admin_render('account/manager-client.php',[
        'ds_client' => $ds_ctv,
    ]);
}
function delete_client(){
    $id = $_GET['id'];
    $sql = "delete from account where id = $id";
    executeQuery($sql);
    $_SESSION['success'] = "Xóa thành công";
    header("location: " . ADMIN_URL . 'manager-client');
}
function edit_client(){
    $id = $_GET['id'];
    $sql = "SELECT * from account where id = $id";
    $user = executeQuery($sql);
    admin_render('account/edit-client.php', [
        'user_client' => $user
    ]);
    if(isset($_POST['btnEdit'])){
        $balance = $_POST['balance'];
        $status = $_POST['status'];
        $permission = $_POST['permission'];

        $sql = "UPDATE account set balance='$balance', status='$status', permission='$permission' where id='$id'";
        executeQuery($sql);
        $_SESSION['success'] = "Cập nhật thành công";
        header("location: ".ADMIN_URL."manager-client");
    }
}

// function account_remove(){
//     // lấy id từ đường dẫn
//     $id = $_GET['id'];
//     // thực thi câu lệnh xóa dựa vào id
//     $sql = "delete from users where id = $id";
//     executeQuery($sql);
//     header("location: " . ADMIN_URL . 'tai-khoan');
// }

// function account_add_form(){

//     admin_render('account/add-form.php');
// }
// function account_save_add(){
//     // nhận dữ liệu từ form gửi lên
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     // mã hóa mật khẩu
//     $passwordHash = password_hash($password, PASSWORD_DEFAULT);
//     // lưu ảnh vào thư mục public/uploads
//     $file = $_FILES['avatar'];
//     $avatar = "";
//     // Lưu ảnh
//     if($file['size'] > 0){
//         $filename = uniqid() . '-' . $file['name'];
//         move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
//         $avatar = "uploads/avatars/" . $filename;
//     }

//     // tạo ra câu sql insert tài khoản mới
//     $sql = "insert into users 
//                 (name, email, password, avatar) 
//             values 
//                 ('$name', '$email', '$passwordHash', '$avatar')";
//     // Thực thi câu sql với db
//     executeQuery($sql);
//     header("location: " . ADMIN_URL . 'tai-khoan');
// }

// function account_edit_form(){
//     $id = $_GET['id'];
//     $sql = "select * from users where id = $id";
//     $user = executeQuery($sql, false);
//     admin_render('account/edit-form.php', [
//         'user' => $user
//     ]);
// }

// function account_save_edit(){
//     // lấy ra thông tin cũ của dữ liệu vừa submit lên
//     $id = $_GET['id'];
//     $sql = "select * from users where id = $id";
//     $oldData = executeQuery($sql, false);
//     // nhận dữ liệu từ form gửi lên
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     // lưu ảnh vào thư mục public/uploads
//     $file = $_FILES['avatar'];
//     $avatar = $oldData['avatar'];
//     // Lưu ảnh
//     if($file['size'] > 0){
//         $filename = uniqid() . '-' . $file['name'];
//         move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
//         $avatar = "uploads/avatars/" . $filename;
//     }

//     // tạo ra câu sql insert tài khoản mới
//     $sql = "update users 
//             set
//                 name = '$name', 
//                 email = '$email', 
//                 avatar = '$avatar' 
//             where id = $id";
//     // Thực thi câu sql với db
//     executeQuery($sql);
//     header("location: " . ADMIN_URL . 'tai-khoan');
// }
