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
    <link rel="stylesheet" type="text/css"
        href="<?= CLIENT_ASSETS ?>fonts/iconic/css/material-design-iconic-font.min.css">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 
		$error = array(); 

// BƯỚC 2: NẾU NGƯỜI DÙNG SUBMIT FORM
    if (is_submit('login'))
    {    
    // lấy tên đăng nhập và mật khẩu
    $username = input_post('username');
    $password = input_post('password');
     
    // Kiểm tra tên đăng nhập
    if (empty($username)){
        $error['username'] = 'Bạn chưa nhập tên đăng nhập';
    }
     
    // Kiểm tra mật khẩu
    if (empty($password)){
        $error['password'] = 'Bạn chưa nhập mật khẩu';
    }
     
    // Nếu không có lỗi
    if (!$error)
    {
        // include file xử lý database user
        include_once('dao/user.php');
         
        // lấy thông tin user theo username
        $user = db_user_get_by_username($username);
         
        // Nếu không có kết quả
        if (empty($user)){
            $error['username'] = 'Tên đăng nhập không đúng';
        }
        // nếu có kết quả nhưng sai mật khẩu
        else if ($user['password'] != md5($password)){
            $error['password'] = 'Mật khẩu bạn nhập không đúng';
        }
         
        // nếu mọi thứ ok thì tức là đăng nhập thành công 
        // nên thực hiện redirect sang trang chủ
        if (!$error){
            set_logged($user['username'], $user['level']);
            redirect(base_url('admin/?m=common&a=dashboard'));
        }
    }
    }
    ?>
    <!-- /header -->
    <!-- /banner -->
    <main>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <form class="login100-form validate-form">
                        <span class="login100-form-title p-b-49">
                            Đăng Nhập
                        </span>
                        <?php show_error($error, 'username'); ?>
                        <div class="wrap-input100 validate-input m-b-23" data-validate="Tài Khoản Không Đúng">
                            <span class="label-input100">Tài Khoản</span>
                            <input class="input100" type="text" name="username" placeholder="Tài Khoản Của Web">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                            
                        </div>
                        
                        
                        <div class="wrap-input100 validate-input" data-validate="Mật Khẩu Không Đúng">
                            <span class="label-input100">Mật Khẩu</span>
                            <input class="input100" type="password" name="pass" placeholder="Mật Khẩu">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                            
                        </div>
                        
                        <div class="text-right p-t-8 p-b-31">
                            <a href="#">
                                Quên Mật Khẩu
                            </a>
                        </div>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <input type="hidden" name="request_name" value="login"/>
                                <button name="login-btn" class="login100-form-btn">
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
                                <button
                                    style="border: solid; border-radius: 10px; padding: 10px; background-color: rgb(219, 55, 55); color: white"><a
                                        style="padding-right: 50px; color: white;" href="./dangky.html">Tạo Tài
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