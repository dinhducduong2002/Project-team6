<div class="limiter">
    <div class="container-login100">

        <form style="width:50%; margin:auto;" class="login100-form validate-form" method="post">
            <span class="login100-form-title p-b-30">
                Đổi Mật Khẩu
            </span>
            <?php if (isset($_SESSION['success'])) : ?>
            <div role="alert">
                <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
            </div>
            <?php endif; ?>
            
            <div class="wrap-input100 ">
                <span class="label-input100">Mật Khẩu Mới</span>
                <input class="input100" type="password" name="newpassword" placeholder="Mật Khẩu"
                    value="<?php if(isset($newpassword)){echo $newpassword;}?>">
                <span class="focus-input100" data-symbol="&#xf190;"></span>
                <span
                    style="color: red;"><?php if (isset($_SESSION['newpassword'])) {echo $_SESSION['newpassword'];}unset($_SESSION['newpassword']) ?></span>
            </div>

            <div class="wrap-input100 ">
                <span class="label-input100">Nhập Lại Mật Khẩu Mới</span>
                <input class="input100" type="password" name="confirmpassword" placeholder="Mật Khẩu"
                    value="<?php if(isset($confirmpassword)){echo $confirmpassword;}?>">
                <span class="focus-input100" data-symbol="&#xf190;"></span>
                <span
                    style="color: red;"><?php if (isset($_SESSION['confirmpassword'])) {echo $_SESSION['confirmpassword'];}unset($_SESSION['confirmpassword']) ?></span>
            </div>
            <br>
            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn" type="submit" name="btnSub">
                        Cập Nhập
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>