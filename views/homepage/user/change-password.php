<div class="c-layout-page" style="margin-top: 20px;">
    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
                    <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
                    <div class="c-content-title-3 c-title-md c-theme-border">
                        <h3 class="c-left c-font-uppercase">Menu tài khoản</h3>
                        <div class="c-line c-dot c-dot-left "></div>
                    </div>

                    <div class="c-content-ver-nav">
                        <ul class="c-menu c-arrow-dot c-square c-theme">
                            <li><a href="<?= CLIENT_URL ?>user/profile" class="active">Thông tin tài khoản</a></li>
                            <li><a href="<?= CLIENT_URL ?>user/change-password" class="">Đổi mật khẩu</a></li>
                            <li><a href="<?= CLIENT_URL ?>user/history" class="">Lịch sử giao dịch</a></li>
                        </ul>
                    </div>
                <form style="width:50%; margin:auto;" class="login100-form validate-form" method="post">
                <span class="login100-form-title p-b-30">
                    Đổi Mật Khẩu
                </span>
                <?php if (isset($_SESSION['success'])) : ?>
                    <div  role="alert">
                    <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
                <div class="wrap-input100 m-b-23">
                    <span class="label-input100"  >Tài Khoản :</span>  <?php echo($_SESSION['user']['username']);?>
                </div>

                <div class="wrap-input100 ">
                    <span class="label-input100">Mật Khẩu Cũ</span>
                    <input class="input100" type="password" name="password" placeholder="Mật Khẩu"
                        value="<?php if(isset($password)){echo $password;}?>">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                    <span
                        style="color: red;"><?php if (isset($_SESSION['password'])) {echo $_SESSION['password'];}unset($_SESSION['password']) ?></span>
                </div>

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
        </div>
        <div class="c-layout-sidebar-content ">
            <h1>Chức năng đang được nhóm hoàn thiện</h1>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->


    <!-- END: PAGE CONTENT -->
</div>