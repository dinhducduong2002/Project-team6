<?php
ob_start();
session_start();
require_once './vendor/PHPMailer/src/Exception.php';
require_once './vendor/PHPMailer/src/PHPMailer.php';
require_once './vendor/PHPMailer/src/SMTP.php';
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
    case 'user/history_card':
        require_once './business/user.php';
        history_card();
        break;
    case 'user/brickcard':
        require_once './business/user.php';
        post_card();
        break;
    case 'tin-tuc':
        require_once './business/news.php';
        index();
        break;
    case 'tin-tuc/detail':
        require_once './business/news.php';
        detail();
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
    
    case 'cp-admin/delete-client':
        require_once "./business/admin/account.php";
        delete_client();
        break;
    
    case 'cp-admin/edit-client':
        require_once "./business/admin/account.php";
        edit_client();
        break;
            
    case 'cp-admin/manager-bill':
        require_once "./business/admin/bill.php";
        bill();
        break;

    case 'cp-admin/delete-bill':
        require_once "./business/admin/bill.php";
        delete_bill();
        break;
    
    case 'cp-admin/card':
        require_once "./business/admin/card.php";
        card();
        break;

    case 'cp-admin/manager-service':
        require_once "./business/admin/service.php";
        service();
        break;
    
    case 'cp-admin/card':
        require_once "./business/admin/card.php";
        card();
        break;

    case 'cp-admin/manager-service':
        require_once "./business/admin/service.php";
        service();
        break;
    
    case 'cp-admin/edit-service':
        require_once "./business/admin/service.php";
        edit_service();
        break;
    
    case 'cp-admin/delete-service':
        require_once "./business/admin/service.php";
        delete_service();
        break;
    
    case 'cp-admin/add-service':
        require_once "./business/admin/service.php";
        add_service();
        break;
    //
    case 'cp-admin/manager-category':
        require_once "./business/admin/category.php";
        category();
        break;
    
    case 'cp-admin/edit-category':
        require_once "./business/admin/category.php";
        edit_category();
        break;
    
    case 'cp-admin/delete-category':
        require_once "./business/admin/category.php";
        delete_category();
        break;
    
    case 'cp-admin/add-category':
        require_once "./business/admin/category.php";
        add_category();
        break;
    //
    case 'cp-admin/pay-banking':
        require_once "./business/admin/pay_banking.php";
        pay_banking();
        break;
    
    case 'cp-admin/delete-pay-banking':
        require_once "./business/admin/pay_banking.php";
        delete_pay_banking();
        break;

    case 'cp-admin/add-pay-banking':
        require_once "./business/admin/pay_banking.php";
        add_pay_banking();
        break;
     //// quản trị tin tức ////
     case 'cp-admin/news':
        require_once "./business/admin/news.php";
        index();
        break;
    case 'cp-admin/news/add':
        require_once "./business/admin/news.php";
        news_add();
        break;
    case 'cp-admin/news/save-add':
        require_once "./business/admin/news.php";
        news_save_add();
        break;

    case 'cp-admin/news/edit':
        require_once "./business/admin/news.php";
        news_edit();
        break;
    case 'cp-admin/news/save-edit':
        require_once "./business/admin/news.php";
        news_save_edit();
        break;
    case 'cp-admin/news/delete':
        require_once "./business/admin/news.php";
        news_delete();
        break;
    //
    case 'cp-admin/card':
        require_once "./business/admin/card.php";
        card();
        break;
    //
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
    case 'cp-admin/sp-edit-form':
        require_once "./business/admin/product.php";
        sp_edit_form();
        break;
    //
    case 'send-email':
        require_once "./business/sendemail.php";
        email_form();
        break;
    case 'send-email/submit':
        require_once "./business/sendemail.php";
        submit_email();
        break;
    case 'verification':
        require_once "./business/auth.php";
        verification_form();
        break;
    case 'reset-pass':
        require_once './business/auth.php';
        reset_password();
        break;
    //
    default:
        require_once "./business/error404.php";
        index();
    break;
}
