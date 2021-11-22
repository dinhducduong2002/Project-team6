<<<<<<< Updated upstream
<?php

require_once './commons/app_config.php';
require_once './commons/helpers.php';
require_once './dao/system_dao.php';
$user = isset($_SESSION[AUTH]) ? $_SESSION[AUTH] : null;
$msg = isset($_GET['msg']) ? $_GET['msg'] : "";
?>
=======
>>>>>>> Stashed changes

<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop nick cùi</title>
    <link href="<?= CLIENT_ASSETS ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= CLIENT_ASSETS ?>css/mystyle.css" rel="stylesheet">
    <script src="<?= CLIENT_ASSETS ?>js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= CLIENT_ASSETS ?>css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- /header -->
    <!-- /banner -->
    <main>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
<<<<<<< Updated upstream
                    <form class="login100-form validate-form"><?php if ($msg != ""): ?>
                        <?php if ($msg != ""){ ?>
                            <h5 style="color: red; text-align: center;"><?php echo $msg ?></h5>  
                            <?php } ?>    
                            <?php endif ;?>
                        <span class="login100-form-title p-b-49">
                            Đăng Nhập
                        </span>
                        <div class="wrap-input100 validate-input m-b-23" data-validate="Tài Khoản Không Đúng">
=======
                    <form class="login100-form validate-form" method="post">
                        <span class="login100-form-title p-b-49">
                            Đăng Nhập
                        </span>

                        <div class="wrap-input100 m-b-23">
>>>>>>> Stashed changes
                            <span class="label-input100">Tài Khoản</span>
                            <input class="input100" type="text" name="username" placeholder="Tài Khoản Của Web" value="<?php if(isset($username)){echo $username;}?>">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
<<<<<<< Updated upstream
                            
                        </div>
                        
                        
                        <div class="wrap-input100 validate-input" data-validate="Mật Khẩu Không Đúng">
=======
                            <span style="color: red;"><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];}unset($_SESSION['username']) ?></span>
                        </div>

                        <div class="wrap-input100 ">
>>>>>>> Stashed changes
                            <span class="label-input100">Mật Khẩu</span>
                            <input class="input100" type="password" name="password" placeholder="Mật Khẩu" value="<?php if(isset($password)){echo $password;}?>">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
<<<<<<< Updated upstream
                            
=======
                            <span style="color: red;"><?php if (isset($_SESSION['password'])) {echo $_SESSION['password'];}unset($_SESSION['password']) ?></span>
>>>>>>> Stashed changes
                        </div>
                        
                        <div class="text-right p-t-8 p-b-31">
                            <a href="#">
                                Quên Mật Khẩu
                            </a>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
<<<<<<< Updated upstream
                                <input type="hidden" name="request_name" value="login"/>
                                <button name="login-btn" class="login100-form-btn">
=======
                                <button class="login100-form-btn" type="submit" name="btnSub">
>>>>>>> Stashed changes
                                    Đăng Nhập
                                </button>
                            </div>
                        </div>

                        <div class="txt1 text-center p-t-54 p-b-20">
                            <span>
                                Hoặc Đăng Ký Bằng
                            </span>
                        </div>

                        <div class="flex-c-m">
                            <a href="#" class="login100-social-item bg1">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="" class="txt2" style="padding-left: 50px;">
                                <button style="border: solid; border-radius: 10px; padding: 10px; background-color: rgb(219, 55, 55); color: white"><a style="padding-right: 50px; color: white;" href="">Tạo Tài
                                        Khoản</a></button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>

        <!--===============================================================================================-->
        <script src="<?= CLIENT_ASSETS ?>vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?= CLIENT_ASSETS ?>vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?= CLIENT_ASSETS ?>vendor/bootstrap/js/popper.js"></script>
        <script src="<?= CLIENT_ASSETS ?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?= CLIENT_ASSETS ?>vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="<?= CLIENT_ASSETS ?>vendor/daterangepicker/moment.min.js"></script>
        <script src="<?= CLIENT_ASSETS ?>vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="<?= CLIENT_ASSETS ?>vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="<?= CLIENT_ASSETS ?>js/main.js"></script>

    </main>
</body>

</html>