<?php
ob_start();
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
    case 'logout':
        require_once './business/auth.php';
        logout();
        break;
    case 'san-pham/pay':
        require_once './business/pay.php';
        pay();
        break;
    case 'user/profile':
        require_once './business/user.php';
        index();
        break;
    case 'user/change-password':
        require_once './business/user.php';
        change_password();
        break;
    case 'user/history':
        require_once './business/user.php';
        history();
        break;
        ///////////////// ADMIN ///////////////////
    case 'cp-admin/dashboard':
        require_once './business/admin/dashboard.php';
        dashboard_info();
        break;
    
    case 'cp-admin/manager-ctv':
        require_once "./business/admin/account.php";
        manager_ctv();
        break;
    
    case 'cp-admin/manager-client':
        require_once "./business/admin/account.php";
        manager_client();
        break;
    
    case 'cp-admin/chart':
        require_once "./business/admin/chart.php";
        chart();
        break;
    
    case 'cp-admin/delete-ctv':
        require_once "./business/admin/account.php";
        delete_ctv();
        break;
    
    case 'cp-admin/edit-ctv':
        require_once "./business/admin/account.php";
        edit_ctv();
        break;
    case 'cp-admin/sp-index':
        require_once "./business/admin/product.php";
        sp_index();
        break;
    case 'cp-admin/delete-sp':
        require_once "./business/admin/product.php";
        sp_remove();
        break;
    case 'cp-admin/sp-add-form':
        require_once "./business/admin/product.php";
        sp_add_form();
        break;
    case 'cp-admin/sp-add':
        require_once "./business/admin/product.php";
        sp_save_add();
        break;
    case 'cp-admin/sp-edit-form':
        require_once "./business/admin/product.php";
        sp_edit_form();
        break;
    case 'cp-admin/sp-edit':
        require_once "./business/admin/product.php";
        sp_save_edit();
        break;
    default:
        require_once "./business/error404.php";
        index();
    break;
}

?>