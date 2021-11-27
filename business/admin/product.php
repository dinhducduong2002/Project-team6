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
    $_SESSION['success'] = "Thêm sản phẩm thành công";
    header("location: " . ADMIN_URL . 'sp-index');
}

function sp_add_form(){
    $sqla = "SELECT * FROM products";
    $catea = executeQuery($sqla);
    $sql = "SELECT * FROM categorys";
    $ds_cate = executeQuery($sql);
    admin_render('products/sp-add.php',[
        'ds_cate' => $cate, 
    ]);
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
    $cpCTV = $_SESSION['user']['id'];
    $description = $_POST['description'];
    // lưu ảnh vào thư mục public/uploads
    $file = $_FILES['image_thumnail'];
    $file1 = $_FILES['image1'];
    $avatar = "";
 
    
    /* check
    if(empty($username)){
        $errors['username'] = "Vui lòng nhập tên Nick";
    }
    if(empty($password)){
        $errors['password'] = "Vui lòng nhập mk Nick";
    }
    if(empty($nameproduct)){
        $errors['name_product'] = "Vui lòng tên sản phẩm";
    }
    if(empty($price) || $price < 0){
        $errors['price'] = "Vui lòng nhập giá sản phẩm";
    }
    if(empty($sever)){
        $errors['server'] = "Vui lòng chọn sever";
    }
    if(empty($planet)){
        $errors['planet'] = "Vui lòng chọn hành tinh";
    }
    if(empty($category)){
        $errors['category'] = "Vui lòng chọn loại Nick";
    }
    if(empty($porata)){
        $errors['porata'] = "Vui lòng chọn danh mục";
    }
    if(empty($description)){
        $errors['description'] = "Vui lòng nhập mô tả";
    }
    // Lưu ảnh
    $file_img = ['jpg','PNG','gif','jpeg','JFIF'];
    if($file['size'] > 0 && $file['size']<2000000){
        $filename = uniqid() . '-' . $file['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$file_img)){
            $errors['images'] = "Bạn chỉ được nhập vào file ảnh";;
        }
        else{
            $image = "";
        }
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }*/
    // tạo ra câu sql insert tài khoản mới
    $sql = "insert into products 
                (username, password, name_product, price, server, planet, category, image_thumnail, porata, cp_ctv, description) 
            values 
                ('$username', '$password', '$nameproduct', '$price', '$sever', '$planet', '$category', '$avatar', '$porata', '$cpCTV', '$description')";
    // Thực thi câu sql với db
    //if(!array_filter($errors)){
        executeQuery($sql);
      //  move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
      //  $avatar = "uploads/avatars/" . $filename;
       // $_SESSION['success'] = "Thêm sản phẩm thành công";
        header("location: " . ADMIN_URL . 'sp-index');
    }
   

/*
function sp_edit_form(){
    $sql = "SELECT * FROM categorys";
    $cate = executeQuery($sql);
    admin_render('products/sp-edit.php',[
        'ds_cate' => $cate, 
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