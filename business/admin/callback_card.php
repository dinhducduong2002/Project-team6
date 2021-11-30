<?php
if (isset($_GET['status']) && $_GET['code'] && $_GET['serial'] && $_GET['trans_id'] && $_GET['telco'] && $_GET['callback_sign']) {

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

// 	// ĐÂY LÀ CHỖ LƯU LOG THẺ NẠP VÀO FILE ĐỂ KIỂM TRA KẾT QUẢ XEM SAO, NẾU BẠN DÙNG WEBSITE THẬT THÌ NHỚ BỎ ĐI NHÉ
	$open = "lognapthe.txt";
	file_put_contents($open,$_GET['status'].'|'.$_GET['message'].'|'.$_GET['value'].'|'.$_GET['code'].'|'.$_GET['serial'].'|'.$_GET['telco'].'|'.$_GET['trans_id'].PHP_EOL, FILE_APPEND);
    $code=$_GET['code'];
    $amount = $_GET['amount'];
        	if ($status == 1) 
        	{
        	
                 $db->query("UPDATE `lichsunap` SET `status`='Thành công' where `mathe`='$code'");
                 $result=$db->query("SELECT * FROM `lichsunap` WHERE `mathe`='$code'")->fetch();
                 $tien=$result['amount'];
                 $user=$result['user'];
                 $db->query("UPDATE `user` SET `money`=`money`+'$tien' where `user`='$user'");
        
        	} 
        	else{
        	    $db->query("UPDATE `lichsunap` SET `status`='Thất bại' where `mathe`='$code'");
        	}
       

	} else {
        
	// LƯU LẠI LOG CHỮ KÝ MD5 SAI (NHỚ BÓ ĐI NẾU CHẠY WEBSITE THẬT)
	$open = "lognapthe.txt";
	file_put_contents($open,'CHỮ KÝ MD5 KHÔNG HỢP LỆ'.PHP_EOL, FILE_APPEND);
	}
} else {
	die('cút lẹ nào');
}