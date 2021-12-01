<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <form class="login100-form validate-form" method="post">
                <span class="login100-form-title p-b-49">
                    Đăng Ký
                </span>

                <div class="wrap-input100 validate-input m-b-23" data-validate="Tài Khoản Không Đúng">
                    <span class="label-input100">Tài Khoản</span>
                    <input class="input100" type="text" name="username" placeholder="Tài Khoản Của Web" value="<?php if (isset($username)) {
                                                                                                                    echo $username;
                                                                                                                } ?>">
                    <span class="focus-input100" data-symbol="&#xf205;"></span>
                    <?php if (!empty($error['username'])) : ?>
                        <span style="color: red;"><?php echo $error['username'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="wrap-input100 validate-input m-b-23" data-validate="Email Không Đúng">
                    <span class="label-input100">EMAIL</span>
                    <input class="input100" type="email" name="email" placeholder="Email Của Bạn" value="<?php if (isset($email)) {
                                                                                                                echo $email;
                                                                                                            } ?>">
                    <span class="focus-input100" data-symbol="&#xf15a;"></span>
                    <?php if (!empty($error['email'])) : ?>
                        <span style="color: red;"><?php echo $error['email'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Mật Khẩu Không Đúng">
                    <span class="label-input100">Mật Khẩu</span>
                    <input class="input100" type="password" name="password" placeholder="Mật Khẩu" value="<?php if (isset($password)) {
                                                                                                                echo $password;
                                                                                                            } ?>">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                    <?php if (!empty($error['password'])) : ?>
                        <span style="color: red;"><?php echo $error['password'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Mật Khẩu Không Đúng">
                    <span class="label-input100">Nhập Lại Mật Khẩu</span>
                    <input class="input100" type="password" name="pass1" placeholder="Nhập Lại Mật Khẩu" value="<?php if (isset($confirm_password)) {
                                                                                                                    echo $confirm_password;
                                                                                                                } ?>">
                    <span class="focus-input100" data-symbol="&#xf191;"></span>
                    <?php if (!empty($error['pass1'])) : ?>
                        <span style="color: red;"><?php echo $error['pass1'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a style="font-size: 18px;" href="login">
                        Đã Có Tài Khoản
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" name="btnSub" type="submit">
                            Đăng Ký
                        </button>
                    </div>
                </div>

                <div class="txt1 text-center p-t-24 p-b-20">
                    <span>
                        Hoặc Đăng Ký Bằng
                    </span>
                </div>

                <div class="flex-c-m">
                    <a href="#" class="login100-social-item bg1">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>