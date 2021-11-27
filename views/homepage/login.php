<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" method="post">
                <span class="login100-form-title p-b-40">
                    Đăng Nhập
                </span>

                <div class="wrap-input100 m-b-23">
                    <span class="label-input100">Tài Khoản</span>
                    <input class="input100" type="text" name="username" placeholder="Tài Khoản Của Web"
                        value="<?php if(isset($username)){echo $username;}?>">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                    <span
                        style="color: red;"><?php if (isset($_SESSION['username'])) {echo $_SESSION['username'];}unset($_SESSION['username']) ?></span>
                </div>

                <div class="wrap-input100 ">
                    <span class="label-input100">Mật Khẩu</span>
                    <input class="input100" type="password" name="password" placeholder="Mật Khẩu"
                        value="<?php if(isset($password)){echo $password;}?>">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                    <span
                        style="color: red;"><?php if (isset($_SESSION['password'])) {echo $_SESSION['password'];}unset($_SESSION['password']) ?></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        Quên Mật Khẩu
                    </a>
                </div>
                <span style="color: red;"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];} unset($_SESSION['error'])?></span><br>
                <?php if(isset($_SESSION['status'])):?>
                    <span style="color: red;"><?php echo $_SESSION['status']; unset($_SESSION['status'])?></span>
                <?php endif;?>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit" name="btnSub">
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
                                style="padding-right: 50px; color: white;" href="register">Tạo Tài
                                Khoản</a></button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>