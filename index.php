<?php

require_once './commons/app_config.php';
require_once './commons/helpers.php';
require_once './dao/system_dao.php';
$url = isset($_GET['url']) ? $_GET['url'] : "/";
switch ($url) {
        /////////////////// CLIENT ////////////////////
    case '/':
        require_once './business/homepage.php';
        index();
        break;
    case 'san-pham':
        require_once './business/products.php';
        products_index();
        break;
    case 'san-pham/detail':
        require_once './business/products.php';
        products_detail();
        break;
    case 'login':
        require_once './business/auth.php';
        login();
        break;
    case 'register':
        require_once './business/auth.php';
        register();
        break;
    case 'san-pham/pay':
        require_once './business/pay.php';
        pay();
        break;
        ///////////////// ADMIN ///////////////////
    case 'cp-admin/dashboard':
        require_once './business/admin/dashboard.php';
        dashboard_info();
        break;
    case 'cp-admin/tai-khoan':
        require_once "./business/admin/account.php";
        account_index();
        break;
    case 'cp-admin/tai-khoan/tao-moi':
        require_once "./business/admin/account.php";
        account_add_form();
        break;
    case 'cp-admin/tai-khoan/luu-tao-moi':
        require_once "./business/admin/account.php";
        account_save_add();
        break;
    case 'cp-admin/tai-khoan/sua':
        require_once "./business/admin/account.php";
        account_edit_form();
        break;
    case 'cp-admin/tai-khoan/luu-sua':
        require_once "./business/admin/account.php";
        account_save_edit();
        break;
    case 'cp-admin/tai-khoan/xoa':
        require_once "./business/admin/account.php";
        account_remove();
        break;
    default:
        echo "Đường dẫn bạn đang truy cập chưa được định nghĩa";
        break;
}

?>