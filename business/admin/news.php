<?php
if($_SESSION['user']['permission'] == 0){
    function index()
{
    $sql = "select * from news";
    $news = executeQuery($sql);

    admin_render('news/index.php', ['news' => $news]);
}

// thêm tin tức
function news_add()
{
    admin_render('news/add.php');
}
// lưu thêm tin tức
function news_save_add()
{
    $title = $_POST['title'];
    $id_user = $_SESSION['user']['id'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    $files = $_FILES['image'];
    $image = "";

    $files_name = uniqid() . '-' . $files['name'];
    move_uploaded_file($files['tmp_name'], './public/uploads/avatars/' . $files_name);
    $image = "uploads/avatars/" . $files_name;

    $sql = "INSERT INTO news(id_user, image, title, content, status) values( '$id_user', '$image', '$title', '$content', '$status')";
    // var_dump($sql);
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'news');
}

//sửa tin tức
function news_edit()
{
    $id = $_GET['id'];
    $sql = "select * from news where id='$id'";
    $news = executeQuery($sql, false);

    admin_render('news/edit.php', ['news' => $news]);
}
//lư sửa tin tức
function news_save_edit()
{
    $file_img = ['jpg', 'PNG', 'gif', 'jpeg'];
    $id = $_GET['id'];
    $title = $_POST['title'];
    $id_user = $_SESSION['user']['id'];
    $content = $_POST['content'];
    $status = $_POST['status'];

    $file = $_FILES['image'];


    if ($file['size'] > 0 && $file['size'] < 2000000) {
        $files_name = uniqid() . '-' . $file['name'];
        $ext = pathinfo($files_name, PATHINFO_EXTENSION);
        if (!in_array($ext, $file_img)) {
            $_SESSION['error'] = "Bạn chỉ được nhập vào file ảnh";
        } else {
            move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $files_name);
            $image = "uploads/avatars/" . $files_name;
        }
    } else {
        $image = $_POST['hidden_image'];
    }

    $sql = "UPDATE news set 
                        id_user = '$id_user',
                        image = '$image', 
                        title = '$title',
                        content = '$content', 
                        status = '$status' 
                        where id=$id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'news');
}

//xóa tin tức
function news_delete()
{
    $id = $_GET['id'];
    $sql = " delete from news where id=$id";
    executeQuery($sql);
    header("location: " . ADMIN_URL . 'news');
}

}