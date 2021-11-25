<?php
function product_index(){
    $sql = "select * from products";
    $users = executeQuery($sql);

    admin_render('product/index.php', [
        'dsSanpham' => $users,
    ]);
}

function product_remove(){
    // lấy id từ đường dẫn
    $id = $_GET['id'];
    // thực thi câu lệnh xóa dựa vào id
    $sql = "delete from products where id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'san-pham');
}

function product_add_form(){

    admin_render('product/add-formsp.php');
}
function product_save_add(){
    // nhận dữ liệu từ form gửi lên
    $name = $_POST['name'];
    $password = $_POST['password'];
    // lưu ảnh vào thư mục public/uploads
    $file = $_FILES['avatar'];
    $avatar = "";
    // Lưu ảnh
    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }

    // tạo ra câu sql insert tài khoản mới
    $sql = "insert into users 
                (name, email, password, avatar) 
            values 
                ('$name', '$email', '$passwordHash', '$avatar')";
    // Thực thi câu sql với db
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'san-pham');
}

function product_edit_form(){
    $id = $_GET['id'];
    $sql = "select * from users where id = $id";
    $user = executeQuery($sql, false);
    admin_render('product/edit-form.php', [
        'user' => $user
    ]);
}

function product_save_edit(){
    // lấy ra thông tin cũ của dữ liệu vừa submit lên
    $id = $_GET['id'];
    $sql = "select * from users where id = $id";
    $oldData = executeQuery($sql, false);
    // nhận dữ liệu từ form gửi lên
    $name = $_POST['name'];
    $email = $_POST['email'];
    // lưu ảnh vào thư mục public/uploads
    $file = $_FILES['avatar'];
    $avatar = $oldData['avatar'];
    // Lưu ảnh
    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }

    // tạo ra câu sql insert tài khoản mới
    $sql = "update users 
            set
                name = '$name', 
                email = '$email', 
                avatar = '$avatar' 
            where id = $id";
    // Thực thi câu sql với db
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'san-pham');
}

?>