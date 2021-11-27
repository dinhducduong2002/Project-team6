<?php 

function service(){
    $sql = "SELECT * FROM service";
    $ds_service = executeQuery($sql);
    admin_render('service/manager-service.php',[
        'ds_service' => $ds_service,
    ]);
}
function edit_service(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM service where id='$id'";
    $list_service = executeQuery($sql);
    
    admin_render('service/edit-service.php',[
        'list_service' => $list_service,
    ]);
    
    $file_img = ['jpg', 'PNG', 'gif', 'jpeg'];
    if(isset($_POST['btnEdit'])){
        $name_service = $_POST['name_service'];
        $file = $_FILES['image'];
        $image = "";
        if ($file['size'] > 0 && $file['size'] < 2000000) {
            $image = $file['name'];
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            if (!in_array($ext, $file_img)) {
                $_SESSION['error'] = "Bạn chỉ được nhập vào file ảnh";
            }
        } else {
            $image = $_POST['hidden_image'];
        }
    
        $sql = "UPDATE service set name_service='$name_service', image='$image where id='$id'";
        executeQuery($sql);
        if(!isset($_SESSION['error'])){
            
            $_SESSION['success'] = "Cập nhật thành công";
            move_uploaded_file($file['tmp_name'], "../admin/pages/products/images_products/" . $image);
            header("location: ".ADMIN_URL."manager-service");
        }
        
    }
    
    
    
}
?>