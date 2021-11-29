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
    $sql = "SELECT * FROM categorys";
    $ds_cate = executeQuery($sql);
    admin_render('products/sp-add.php',[
        'ds_cate' => $ds_cate, 
    ]);
}
function sp_save_add(){
    $errors= [];
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
    $file = $_FILES['image_thumnail'];
    $galery = $_FILES['galery'];
    $avatar = "";
    $galery1=array();
    //check
    if (empty($username)) {
        $errors['username'] = 'Vui lòng điền thông tin';
    }
    if (empty($password)) {
        $errors['password'] = 'Vui lòng điền thông tin';
    }
    if (empty($nameproduct)) {
        $errors['name_product'] = 'Vui lòng điền thông tin';
    }
    if (empty($price)) {
        $errors['price]'] = 'Vui lòng điền thông tin';
    }
    if (empty($sever)) {
        $errors['server'] = 'Vui lòng chọn thông tin';
    }
    if (empty($planet)) {
        $errors['planet'] = 'Vui lòng chọn thông tin';
    }
    if ($file['size'] == 0) {
        $errors['image_thumnail'] = 'Vui lòng chọn hình ảnh';
    }
    if (empty($category)) {
        $errors['category'] = 'Vui lòng điền thông tin';
    }
    if (empty($porata)) {
        $errors['porata'] = 'Vui lòng điền thông tin';
    }
    if (empty($description)) {
        $errors['description'] = 'Vui lòng điền thông tin';
    }
    // hàm check up nhiều ảnh
    for ($i = 0; $i < count($galery['name']); $i++) {
        $name_img = stripslashes($galery['name'][$i]);
        $source_img = $galery['tmp_name'][$i];
        $path_img = "./public/uploads/avatars/" . $name_img;
        if(move_uploaded_file($source_img, $path_img)){
            $galery1[]= $path_img;
        }
    }
   
    // Lưu ảnh
    if($file['size'] > 0 && $file['size']<2000000){
        $filename = uniqid() . '-' . $file['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }
    // tạo ra câu sql insert tài khoản mới
    $sql = "INSERT INTO products 
    (username, password, name_product, price, server, planet, category, image_thumnail, image, porata, cp_ctv, description) 
 VALUES 
    ('$username', '$password', '$nameproduct', '$price', '$sever', '$planet', '$category', '$avatar', '$galery1', '$porata', '$cpCTV', '$description');";
    // Thực thi câu sql với db
    if(empty($errors)){
        executeQuery($sql); 
    }
    if (empty($errors)) {
        $_SESSION['success'] = "Thêm sản phẩm thành công";
        header("location: " . ADMIN_URL . 'sp-index');
    } 
   
}

/*function sp_edit_form(){
    $id = $_GET['id'];
    $product = "select * from products where id = $id";
    $ds_pro = executeQuery($product);
    $sql = "SELECT * FROM categorys";
    $ds_cate = executeQuery($sql);
    admin_render('products/sp-edit.php',[
        'ds_cate' => $ds_cate,
        'ds_pro' =>$user,
    ]);
}

function sp_save_edit(){
    // lấy ra thông tin cũ của dữ liệu vừa submit lên
    $id = $_GET['id'];
    $sql = "select * from products where id = $id";
    $oldData = executeQuery($sql, false);
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
    $file_img = ['jpg','PNG','gif','jpeg','JFIF'];
    $file = $_FILES['image_thumnail'];
    $galery = $_FILES['galery'];
    $avatar = $oldData['avatar'];
    $galery1=array();

    // hàm check up nhiều ảnh
    for ($i = 0; $i < count($galery['name']); $i++) {
        $name_img = stripslashes($galery['name'][$i]);
        $source_img = $galery['tmp_name'][$i];
        $path_img = "./public/uploads/avatars/" . $name_img;
        if(move_uploaded_file($source_img, $path_img)){
            $galery1[]= $path_img;
        }
    }
    // check
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
        $errors['server'] = "Vui lòng nhập sever";
    }
    if(empty($description)){
        $errors['description'] = "Vui lòng nhập mô tả";
    }
    // Lưu ảnh
    if($file['size'] > 0 && $file['size']<2000000){
        $filename = uniqid() . '-' . $file['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!in_array($ext,$file_img)){
            $errors['image_thumnail'] = "Bạn chỉ được nhập vào file ảnh";;
        }
        else{
            $image = "";
        }
        move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
        $avatar = "uploads/avatars/" . $filename;
    }
    // tạo ra câu sql insert tài khoản mới
    $sql = "UPDATE products SET
                     username='$username',
                     password='$password',
                     name_product='$nameproduct', 
                     price='$price', 
                     server='$sever', 
                     planet='$planet', 
                     category='$category', 
                     image_thumnail='$avatar', 
                     image='$galery1', 
                     porata='$porata', 
                     cp_ctv='$cpCTV', 
                     description='$description'
                     WHERE id=$id";
    // Thực thi câu sql với db
    //if(!array_filter($errors)){
        executeQuery($sql);
       
        $_SESSION['success'] = "Sửa sản phẩm thành công";
        header("location: " . ADMIN_URL . 'sp-index');
    //}
}*/
   

?>