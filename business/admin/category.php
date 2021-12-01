<?php 

function category(){
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $data = 10;
    $sql = "SELECT * FROM categorys";
    $result = executeQuery($sql);
    $number = count($result);
    $pagea = ceil($number / $data);
    $pages = ($page - 1) * $data;
    $sql = "SELECT * FROM categorys ORDER BY created_at DESC LIMIT $pages,$data";
    $ds_category = executeQuery($sql);
    admin_render('categorys/manager-category.php',[
        'ds_category' => $ds_category,
        'pagea' => $pagea,
    ]);
}

function delete_category(){
    $id = $_GET['id'];
    $sql = "delete from categorys where id = $id";
    executeQuery($sql);
    $_SESSION['success'] = "Xóa thành công";
    header("location: " . ADMIN_URL . 'manager-category');
}

function add_category(){
    admin_render('categorys/add-category.php');
    $file_img = ['jpg', 'PNG', 'gif', 'jpeg'];
    
    if(isset($_POST['btnEdit'])){
        $name_cate = $_POST['name_cate'];
        $id_cate = $_POST['id_cate'];
        $file = $_FILES['image_cate'];
        $image_cate = "";
        if ($file['size'] > 0 && $file['size'] < 2000000) {
                $filename = uniqid() . '-' . $file['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($ext, $file_img)) {
                    $_SESSION['error'] = "Bạn chỉ được nhập vào file ảnh";
                }else{
                    move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
                    $image_cate = "uploads/avatars/" . $filename;
                }
                
        } else {
            $image_cate = "";
        }
        if(!isset($_SESSION['error'])){
            $sql = "INSERT INTO categorys set id_cate='$id_cate', name_cate='$name_cate', image_cate='$image_cate'";
        executeQuery($sql);
        $_SESSION['success'] = "Thêm thành công";
        header("location: ".ADMIN_URL."manager-category");
        }
        
    }
}
function edit_category(){
    $file_img = ['jpg', 'PNG', 'gif', 'jpeg'];
    $id = $_GET['id'];
    $sql = "SELECT * from categorys where id = $id";
    $list_cate = executeQuery($sql, $getAll = false);
    admin_render('categorys/edit-category.php', [
        'list_cate' => $list_cate
    ]);
    
    $file_img = ['jpg', 'PNG', 'gif', 'jpeg'];
    
    if(isset($_POST['btnEdit'])){
        $name_cate = $_POST['name_cate'];
        $id_cate = $_POST['id_cate'];
        $file = $_FILES['image_cate'];
        $image_cate = "";
        if ($file['size'] > 0 && $file['size'] < 2000000) {
                $filename = uniqid() . '-' . $file['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($ext, $file_img)) {
                    $_SESSION['error'] = "Bạn chỉ được nhập vào file ảnh";
                }else{
                    move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
                    $image_cate = "uploads/avatars/" . $filename;
                }
                
        } else {
            $image_cate = $_POST['hidden_image'];
        }
        if(!isset($_SESSION['error'])){
            $sql = "update categorys set id_cate='$id_cate', name_cate='$name_cate', image_cate='$image_cate' where id='".$_GET['id']."'";
        executeQuery($sql);
        $_SESSION['success'] = "Sửa thành công";
        header("location: ".ADMIN_URL."manager-category");
        }
        
    }
}

?>