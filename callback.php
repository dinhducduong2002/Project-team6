<?php 

include "dao/system_dao.php";
if (isset($_GET['status']) && $_GET['code'] && $_GET['serial'] && $_GET['trans_id'] && $_GET['telco'] && $_GET['callback_sign']) {

	$command = 'charging';  // Nap the
        $url = 'https://thesieure.com/chargingws/v2';
        $partner_id = '4963118361';
        $partner_key = 'd176b200a03f6ff675163d595eadd459';
	// TRẠNG THÁI
	$status = $_GET['status'];
	// MÃ THẺ NẠP
	$code = $_GET['code'];
	// SERIAL THẺ NẠP
	$serial = $_GET['serial'];
	// TRẠNG THÁI TIN NHẮN (THẤT BẠI - THÀNH CÔNG) TỪ THESIEURE
	$message = $_GET['message'];
	// MỆNH GIÁ GỐC THẺ NẠP
	$real_money = $_GET['value'];
	// MỆNH GIÁ THỰC NHẬN
	$geted_money = $_GET['amount'];
	// NHÀ MẠNG THẺ CÀO
	$nhamang = $_GET['telco'];
	// ĐƠN GIAO DỊCH BÊN THESIEURE
	$trans_id = $_GET['trans_id'];
	// KIỂM TRA CHỮ KÝ MD5
	$check_sign = md5($partner_key.$code.$serial);

	// KIỂM TRA CHỮ KÝ HỢP LỆ TRÁNH TRƯỜNG HỢP BUG
	if ($_GET['callback_sign'] == $check_sign) {

	// ĐÂY LÀ CHỖ LƯU LOG THẺ NẠP VÀO FILE ĐỂ KIỂM TRA KẾT QUẢ XEM SAO, NẾU BẠN DÙNG WEBSITE THẬT THÌ NHỚ BỎ ĐI NHÉ
	$open = "lognapthe.txt";
	file_put_contents($open,$_GET['status'].'|'.$_GET['message'].'|'.$_GET['value'].'|'.$_GET['code'].'|'.$_GET['serial'].'|'.$_GET['telco'].'|'.$_GET['trans_id'].PHP_EOL, FILE_APPEND);

	if ($status == 1) {
		$id_user = $_SESSION['user']['id'];
		$sql = "UPDATE loadcard SET status='Thẻ đúng' where code='$code'";//cập nhật trạng thái
		executeQuery($sql);

		$sql = "SELECT * FROM loadcard where code='".$_GET['code']."'";//
		$result_code = executeQuery($sql);
		$user = $result_code[0]['id_user'];
		$sql = "SELECT * FROM account where id='$id_user'";//lấy thông tin user
		$result_user = executeQuery($sql);

		$new_balance = $result_user['balance'] + $result_code['amount'];
		$sql = "UPDATE account SET balance='2000' where id='$user'";//cập nhật lại trạng thái tiền cho khách hàng
		executeQuery($sql);
		

	} else{
		$sql = "UPDATE loadcard SET status='Thẻ lỗi' where code='$code'";
		executeQuery($sql);
	}

	} else {

	// LƯU LẠI LOG CHỮ KÝ MD5 SAI (NHỚ BÓ ĐI NẾU CHẠY WEBSITE THẬT)
	$open = "lognapthe.txt";
	file_put_contents($open,'CHỮ KÝ MD5 KHÔNG HỢP LỆ'.PHP_EOL, FILE_APPEND);
	}
} 

?>