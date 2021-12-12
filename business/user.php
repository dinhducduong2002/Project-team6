<?php
function index()
{

    $sql = "SELECT * FROM account where id='" . $_SESSION['user']['id'] . "'";
    $acc = executeQuery($sql);
    client_render('user/index.php', ['acc' => $acc]);
}
function history()
{

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $data = 10;
    $sql = "SELECT * FROM tblhistory where id_user='" . $_SESSION['user']['id'] . "'";
    $result = executeQuery($sql);
    $number = count($result);
    $pagea = ceil($number / $data);
    $pages = ($page - 1) * $data;
    $sql = "SELECT * FROM tblhistory where id_user='" . $_SESSION['user']['id'] . "' ORDER BY created_at DESC LIMIT $pages,$data";
    $aph = executeQuery($sql);

    client_render('user/history.php', [
        'aph' => $aph,
        'pagea' => $pagea
    ]);
}
function history_card()
{


    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $data = 10;
    $sql = "SELECT * FROM loadcard where id_user='" . $_SESSION['user']['id'] . "'";
    $result = executeQuery($sql);
    $number = count($result);
    $pagea = ceil($number / $data);
    $pages = ($page - 1) * $data;
    $sql = "SELECT * FROM loadcard where id_user='" . $_SESSION['user']['id'] . "' ORDER BY created_at DESC LIMIT $pages,$data";
    $aph = executeQuery($sql);

    client_render('user/history_card.php', [
        'aph' => $aph,
        'pagea' => $pagea
    ]);

}
function change_password(){
    if(isset($_POST['btnSub'])){
        $username=$_SESSION['user']['username'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $passwordHash = password_hash($newpassword, PASSWORD_DEFAULT);
        $confirmpassword = $_POST['confirmpassword'];
            
        if (empty($password)) {
            $_SESSION['password'] = "Bạn cần nhập vào mật khẩu cũ";
        }
        if (empty($newpassword)) {
            $_SESSION['newpassword'] = 'Bạn cần nhập vào mật khẩu mới';
        }else if (strlen($newpassword) < 6) {
            $_SESSION['newpassword'] = 'Mật khẩu tối thiểu 6 ký tự';
        }
        if (empty($confirmpassword)) {
            $_SESSION['confirmpassword'] = 'Bạn cần nhập lại mật khẩu mới';
        }else if ($confirmpassword != $newpassword) {
            $_SESSION['confirmpassword'] = 'Xác nhận mật khẩu không khớp';
        }
        else {
            $sql="SELECT * FROM account where id = '".$_SESSION['user']['id']."' ";
            $check_user = executeQuery($sql);
            if($check_user){
                if (password_verify($password, $check_user[0]['password']) != $password) {
                $_SESSION['password'] = "Bạn nhập sai mật khẩu";
              }
              else {   
                $sql = "UPDATE account SET password='$passwordHash' where id = '".$_SESSION['user']['id']."' ";
                executeQuery($sql);
                $_SESSION['success'] = "Đổi mật khẩu thành công";
            }
            }  
        }
       
        }  
    client_render('user/change-password.php');
}

function post_card()
{
    $return = '';
    if (isset($_POST['submit-doithe'])) {
        $code = $_POST['code_card'];
        $serial = $_POST['seri'];
        $telco = $_POST['type'];
        $amount = $_POST['amount'];
        $command = 'charging';  // Nap the
        $url = 'https://thesieure.com/chargingws/v2';
        $partner_id = '4963118361';
        $partner_key = 'd176b200a03f6ff675163d595eadd459';
        // RANDOM YÊU CẦU ID (KHÔNG THAY ĐỔI)
        $request_id = rand(100000000, 999999999);

        // ĐẶT GIÁ TRỊ MẢNG THÀNH NULL TRÁNH LỖI
        $POSTGET = array();

        // YÊU CẦU ID
        $POSTGET['request_id'] = $request_id;

        // MÃ THẺ NẠP TỪ POST USER
        $POSTGET['code'] = $code;

        // PARTENER ID (CONFIG TRONG PHẦN CONFIG.PHP)
        $POSTGET['partner_id'] = $partner_id;

        // SERI THẺ CÀO TỪ POST USER
        $POSTGET['serial'] = $serial;

        // NHÀ MẠNG TỪ POST USER
        $POSTGET['telco'] = $telco;

        // LỆNH (MẶC ĐỊNH: NẠP THẺ)
        $POSTGET['command'] = $command;

        // SẮP XẾP MẢNG
        ksort($POSTGET);

        //CHỮ KÝ KHI ĐỔI THẺ
        $sign = $partner_key;

        //Đặt chữ ký MD5 vào item
        foreach ($POSTGET as $item) {
            $sign .= $item;
        }

        //CHUYỂN CHỮ KÝ SANG ĐỊNH DẠNG MD5 (BẮT BUỘC)
        $mysign = md5($sign);

        // MỆNH GIÁ THẺ TỪ POST USER
        $POSTGET['amount'] = $amount;

        // CHỮ KÝ MD5
        $POSTGET['sign'] = $mysign;

        // XUẤT RA URL ĐỂ GỬI LÊN TSR
        $data = http_build_query($POSTGET);
        // CHẠY CURL
        $ch = curl_init();
        // QUÁ TRÌNH GỬI LÊN TSR (ĐỪNG THAY ĐỔI)
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $SERVER_NAME = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        curl_setopt($ch, CURLOPT_REFERER, $SERVER_NAME);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        // ĐÓNG GỬI LÊN TSR
        curl_close($ch);

        // XUẤT RA JSON (STD CLASS)
        $return = json_decode($result);
        $id_user = $_SESSION['user']['id'];
        if (isset($return->status)) {

            if ($return->status == 99) {
                $sql = "INSERT INTO loadcard set id_user='$id_user', request_id='$request_id', code='$code', serial='$serial', amount='$amount', telco='$telco', status='Chờ duyệt'";
                executeQuery($sql);
                $_SESSION['success'] = "Gửi thẻ thành công hệ thống duyệt trong 5s";
                header("location: " . CLIENT_URL . 'user/history_card');
                
            }else {
                $_SESSION['error'] = "Mã thẻ lỗi vui lòng nhập lại";
            }
        } else {
            //Code thực hiện mặc định tại đây
        }
    }
    client_render('user/brickcard.php');
}
