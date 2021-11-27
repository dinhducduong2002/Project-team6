<?php 

function service(){
    $sql = "SELECT * FROM services";
    $ds_service = executeQuery($sql);
    admin_render('service/manager-service.php',[
        'ds_service' => $ds_service,
    ]);
}
function edit_service(){
    $file_img = ['jpg', 'PNG', 'gif', 'jpeg'];
    $id = $_GET['id'];
    $sql = "SELECT * from services where id = $id";
    $list_service = executeQuery($sql, $getAll = false);
    admin_render('service/edit-service.php', [
        'list_service' => $list_service
    ]);
    if(isset($_POST['btnEdit'])){
        $name_service = $_POST['name_service'];
        $file = $_FILES['image_service'];
        $image_service = "";
        if ($file['size'] > 0 && $file['size'] < 2000000) {
                $filename = uniqid() . '-' . $file['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($ext, $file_img)) {
                    $_SESSION['error'] = "Bạn chỉ được nhập vào file ảnh";
                }else{
                    move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
                    $image_service = "uploads/avatars/" . $filename;
                }
                
        } else {
            $image_service = $_POST['hidden_image'];
        }
        if(!isset($_SESSION['error'])){
            $sql = "UPDATE services set name_service='$name_service', image_service='$image_service' where id='$id'";
        executeQuery($sql);
        $_SESSION['success'] = "Cập nhật thành công";
        header("location: ".ADMIN_URL."manager-service");
        }
        
    }
}
?>