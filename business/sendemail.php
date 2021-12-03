<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function email_form(){
    client_render('/reset.php');
}

function submit_email(){
    $code = substr(rand(0,99999),0,6 );
    $_SESSION['code']=$code;
    $recceiver = $_POST['recceiver'];
    $subject = "Quên Mật Khẩu";
    $content="Mã xác nhận của bạn là: <span style='color:green;'>".$code."</span>";
    $sql="SELECT * FROM account where email = '$recceiver' ";
        $check_email = executeQuery($sql, $getAll = true);
        if (!$check_email) {
            header("location: " . CLIENT_URL . 'send-email');
            $_SESSION['recceiver'] = "Email chưa liên kết với Tài Khoản nào";
          }
          else {
            $_SESSION['email'] = $recceiver;
        //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->CharSet    = 'UTF-8';
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = EMAIL_ADRESS;                     //SMTP username
        $mail->Password   = EMAIL_SECRET;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(EMAIL_ADRESS, 'Shop-Nick-Cùi');

        $mail->addAddress($recceiver);     //Add a recipient

        $mail->addReplyTo('duyncph15719@fpt.edu.vn', 'Shop-Nick-Cùi');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->AltBody = $content;

        $mail->send();
        
    } catch (Exception $e) {
        header("location: " . CLIENT_URL . 'send-email');

        $_SESSION['close'] = "Vui lòng nhập email";
    }     
        }
    
}

?>