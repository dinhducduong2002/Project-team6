<?php
function sp_index()
{
    if ($_SESSION['user']['permission'] == 0) {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $data = 10;
        $sql = "SELECT * FROM products";
        $result = executeQuery($sql);
        $number = count($result);
        $pagea = ceil($number / $data);
        $pages = ($page - 1) * $data;
        $sql = "SELECT * FROM products ORDER BY create_at DESC LIMIT $pages,$data";
        $ds_sp = executeQuery($sql);
        admin_render('products/sp-index.php', [
            'ds_sp' => $ds_sp,
            'pagea' => $pagea,
        ]);
    } else if ($_SESSION['user']['permission'] = 1) {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $data = 10;
        $sql = "SELECT * FROM products";
        $result = executeQuery($sql);
        $number = count($result);
        $pagea = ceil($number / $data);
        $pages = ($page - 1) * $data;
        $sql = "SELECT * FROM products where cp_ctv='".$_SESSION['user']['id']."' ORDER BY create_at DESC LIMIT $pages,$data";
        $ds_sp = executeQuery($sql);
        admin_render('products/sp-index.php', [
            'ds_sp' => $ds_sp,
            'pagea' => $pagea,
        ]);
    }

    
}

function sp_remove()
{
    // lấy id từ đường dẫn
    $id = $_GET['id'];
    // thực thi câu lệnh xóa dựa vào id
    $sql = "delete from products where id = $id";
    executeQuery($sql);
    $$_SESSION['success'] = "Thêm sản phẩm thành công";
    header("location: " . ADMIN_URL . 'sp-index');
}

function sp_add_form()
{
    $error = [
        'username' => '',
        'password' => '',
        'name_product' => '',
        'price' => '',
        'server' => '',
        'description' => '',
        'image_thumnail' => '',
        'image_detail' => ''
    ];
    $file_img = ['jpg', 'PNG', 'gif', 'jpeg'];
    $sql = "SELECT * FROM categorys";
    $ds_cate = executeQuery($sql);
    $sql = "SELECT * FROM tbserver";
    $ds_sv = executeQuery($sql);



    if (isset($_POST['btn_add'])) {
        extract($_POST);
        if (empty($username)) {
            $error['username'] = "Vui lòng nhập tài khoản nick";
        }
        if (empty($password)) {
            $error['password'] = "Vui lòng nhập mật khẩu nick";
        }
        if (empty($name_product)) {
            $error['name_product'] = "Vui lòng nhập tên";
        }
        if (empty($price)) {
            $error['price'] = "Vui lòng nhập giá";
        }
        if (empty($server)) {
            $error['server'] = "Vui lòng nhập server";
        }
        if (empty($description)) {
            $error['description'] = "Vui lòng nhập mô tả";
        }
        
        
        if (isset($_FILES['image_thumnail'])) {
            $file = $_FILES['image_thumnail'];
            $image_thumnail = "";
            if ($file['size'] > 0 && $file['size'] < 2000000) {
                $filename = uniqid() . '-' . $file['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($ext, $file_img)) {
                    $error['image_thumnail'] = "Bạn chỉ được nhập vào file ảnh";
                } else {
                    move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
                    $image_thumnail = "uploads/avatars/" . $filename;
                }
            } else {
                $image_thumnail = "";
            }
        }
        if (isset($_FILES['image_detail'])) {
            $files = $_FILES['image_detail'];
            $file_names = $files['name'];
            
            if ($file['size'] > 0 && $file['size'] < 2000000) {
                $filename = uniqid() . '-' . $file['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($ext, $file_img)) {
                    $error['image_detail'] = "Bạn chỉ được nhập vào file ảnh";
                } else {
                    foreach ($file_names as $key => $value) {

                        move_uploaded_file($files['tmp_name'][$key], './public/uploads/avatars/' . $value);
                        
                    }
                }
            } else {
                $image_detail = "";
            }
        }
        if (!array_filter($error)) {
            $sql = "INSERT INTO products SET username='$username', password='$password', name_product='$name_product',
            price='$price', server='$server', planet='$planet',
            category='$category', porata='$porata', description='$description', cp_ctv='" .  $_SESSION['user']['id'] . "',
            image_thumnail='$image_thumnail'";
            executeQuery($sql);
            $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
            $id_pr = executeQuery($sql);
            $pro = $id_pr[0]['id'];
            foreach ($file_names as $key => $value) {
                $file_namess = "uploads/avatars/" . $value;
                $sql = "INSERT INTO product_image SET product_id='$pro', img_url='$file_namess'";
                executeQuery($sql);
            }
            $$_SESSION['success'] = "Thêm mới sản phẩm thành công";
            header("location: " . ADMIN_URL . 'sp-index');
        }
    }
    admin_render('products/sp-add.php', [
        'ds_cate' => $ds_cate,
        'ds_sv' => $ds_sv,
        'ds_cate_er' => $error,
    ]);
}
function sp_edit_form()
{
    $error = [
        'username' => '',
        'password' => '',
        'name_product' => '',
        'price' => '',
        'server' => '',
        'description' => '',
        'image_thumnail' => ''
    ];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    $sql = "SELECT * FROM products where id='$id'";
    $pro_edit = executeQuery($sql, $getAll = false);
    $file_img = ['jpg', 'PNG', 'gif', 'jpeg'];
    $sql = "SELECT * FROM categorys";
    $ds_cate = executeQuery($sql);
    $sql = "SELECT * FROM tbserver";
    $ds_sv = executeQuery($sql);



    if (isset($_POST['btn_Edit'])) {
        extract($_POST);
        if (empty($username)) {
            $error['username'] = "Vui lòng nhập tài khoản nick";
        }
        if (empty($password)) {
            $error['password'] = "Vui lòng nhập mật khẩu nick";
        }
        if (empty($name_product)) {
            $error['name_product'] = "Vui lòng nhập tên";
        }
        if (empty($price)) {
            $error['price'] = "Vui lòng nhập giá";
        }
        if (empty($server)) {
            $error['server'] = "Vui lòng nhập server";
        }
        if (empty($description)) {
            $error['description'] = "Vui lòng nhập mô tả";
        }

        if (isset($_FILES['image_thumnail'])) {
            $file = $_FILES['image_thumnail'];
            $image_thumnail = "";
            if ($file['size'] > 0 && $file['size'] < 2000000) {
                $filename = uniqid() . '-' . $file['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($ext, $file_img)) {
                    $error['image_thumnail'] = "Bạn chỉ được nhập vào file ảnh";
                } else {
                    move_uploaded_file($file['tmp_name'], './public/uploads/avatars/' . $filename);
                    $image_thumnail = "uploads/avatars/" . $filename;
                }
            } else {
                $image_thumnail = $_POST['thumb_anh'];
            }
        }
        if (!array_filter($error)) {
            $sql = "UPDATE products SET username='$username', password='$password', name_product='$name_product',
                price='$price', server='$server', planet='$planet',
                category='$category', porata='$porata', description='$description', cp_ctv='" .  $_SESSION['user']['id'] . "',
                image_thumnail='$image_thumnail' WHERE id='" . $_GET['id'] . "'";
            executeQuery($sql);
            // $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
            // $id_pr = executeQuery($sql);
            // $pro = $id_pr[0]['id'];
            // foreach ($file_names as $key => $value) {
            //     $sql = "INSERT INTO product_image SET product_id='$pro', img_url='$value'";
            //     executeQuery($sql);
            // }
            $_SESSION['success'] = "Cập nhật sản phẩm thành công";
            header("location: " . ADMIN_URL . 'sp-index');
        }
    }
    admin_render('products/sp-edit.php', [
        'ds_cate' => $ds_cate,
        'ds_sv' => $ds_sv,
        'pro_edit' => $pro_edit,
        'pro_edit_er' => $error,
    ]);
}
