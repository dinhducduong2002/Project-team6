<?php

function manager_ctv()
{
    if ($_SESSION['user']['permission'] == 0) {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $data = 10;
        $sql = "SELECT * FROM account where permission=0 or permission=1";
        $result = executeQuery($sql);
        $number = count($result);
        $pagea = ceil($number / $data);
        $pages = ($page-1) * $data;
        $sql = "SELECT * FROM account WHERE permission=0 or permission=1 ORDER BY create_at DESC LIMIT $pages,$data";
        $ds_ctv = executeQuery($sql);
        admin_render(
            'account/manager-ctv.php',
            [
                'ds_ctv' => $ds_ctv,
                'pagea' => $pagea,

            ],
            [
                'customize/js/list.js'
            ]
        );
    }
}
function delete_ctv()
{
    
    if ($_SESSION['user']['permission'] == 0) {
        $id = $_GET['id'];
        $sql = "delete from account where id = $id";
        executeQuery($sql);
        $_SESSION['success'] = "Xóa thành công";
        header("location: " . ADMIN_URL . 'manager-ctv');
    }
}
function edit_ctv()
{
    if ($_SESSION['user']['permission'] == 0) {
        $id = $_GET['id'];
        $sql = "SELECT * from account where id = $id";
        $user = executeQuery($sql);
        admin_render('account/edit-ctv.php', [
            'user' => $user
        ]);
        if (isset($_POST['btnEdit'])) {
            $balance = $_POST['balance'];
            $status = $_POST['status'];
            $permission = $_POST['permission'];

            $sql = "UPDATE account set balance='$balance', status='$status', permission='$permission' where id='$id'";
            executeQuery($sql);
            $_SESSION['success'] = "Cập nhật thành công";
            header("location: " . ADMIN_URL . "manager-ctv");
        }
    }
}
function manager_client()
{
    if ($_SESSION['user']['permission'] == 0) {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $data = 10;
        $sql = "SELECT * FROM account where permission=2";
        $result = executeQuery($sql);
        $number = count($result);
        $pagea = ceil($number / $data);
        $pages = ($page - 1) * $data;
        $sql = "SELECT * FROM account WHERE permission=2 ORDER BY create_at DESC LIMIT $pages,$data";
        $ds_client = executeQuery($sql);

        admin_render('account/manager-client.php', [
            'ds_client' => $ds_client,
            'pagea' => $pagea,
        ]);
    }
}
function delete_client()
{
    if ($_SESSION['user']['permission'] == 0) {
        $id = $_GET['id'];
        $sql = "delete from account where id = $id";
        executeQuery($sql);
        $_SESSION['success'] = "Xóa thành công";
        header("location: " . ADMIN_URL . 'manager-client');
    }
}
function edit_client()
{
    if ($_SESSION['user']['permission'] == 0) {
        $id = $_GET['id'];
        $sql = "SELECT * from account where id = $id";
        $user_client = executeQuery($sql);
        admin_render('account/edit-client.php', [
            'user_client' => $user_client
        ]);
        if (isset($_POST['btnEdit'])) {
            $balance = $_POST['balance'];
            $status = $_POST['status'];
            $permission = $_POST['permission'];

            $sql = "UPDATE account set balance='$balance', status='$status', permission='$permission' where id='$id'";
            executeQuery($sql);
            $_SESSION['success'] = "Cập nhật thành công";
            header("location: " . ADMIN_URL . 'manager-client');
        }
    }
}

?>
