<?php
ob_start();
session_start();

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
    case 'tin-tuc':
        require_once './business/news.php';
        index();
        break;
    case 'tin-tuc/detail':
        require_once './business/news.php';
        detail();
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
    case 'cp-admin/manager-bill':
        require_once "./business/admin/bill.php";
        bill();
        break;

    case 'cp-admin/delete-bill':
        require_once "./business/admin/bill.php";
        delete_bill();
        break;

    case 'cp-admin/manager-service':
        require_once "./business/admin/service.php";
        service();
        break;
    
    case 'cp-admin/edit-service':
        require_once "./business/admin/service.php";
        edit_service();
        break;
    
    default:
        require_once "./business/error404.php";
        index();
    break;
}
