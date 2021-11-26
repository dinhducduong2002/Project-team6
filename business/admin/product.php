+<?php
function sp_index(){
    $sql = "select * from products";
    $ds_sp = executeQuery($sql);

    admin_render('products/sp-index.php', [
        'ds_sp' => $ds_sp,
    ]);
}

function sp_remove(){
    // lấy id từ đường dẫn
    $id = $_GET['id'];
    // thực thi câu lệnh xóa dựa vào id
    $sql = "delete from products where id = $id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'sp-index');
}

function sp_add_form(){

    admin_render('products/sp-add.php');
}
function sp_save_add(){
    // nhận dữ liệu từ form gửi lên
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nameproduct = $_POST['name_product'];
    $price = $_POST['price'];
    $sever = $_POST['server'];
    $planet = $_POST['planet'];
    $category = $_POST['category'];
    $porata = $_POST['porata'];
    $cpCTV = $_POST['cp_ctv'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $create = $_POST['create_at'];
    // lưu ảnh vào thư mục public/uploads
    $file = $_FILES['image_thumnail'];
    $avatar = "";
    // Lưu ảnh
    if($file['size'] > 0){
        $filename = uniqid() . '-' . $file['name'];
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }

    // tạo ra câu sql insert tài khoản mới
    $sql = "insert into products 
                (username, password, name_product, price, server, planet, category, image_thumnail, porata, cp_ctv, description, status, create_at) 
            values 
                ('$username', '$password', '$nameproduct', '$price', '$sever', '$planet', '$category', '$avatar', '$porata', '$cpCTV', '$description', '$status', '$create')";
    // Thực thi câu sql với db
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'sp-index');
}
/*
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
*/
?>