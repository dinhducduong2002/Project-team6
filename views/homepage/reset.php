<div class="limiter">
        <form action="" method="post">
        <?php if (isset($_SESSION['success'])) : ?>
                    <div style="color:green;"  role="alert">
                    <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
        <div class="wrap-input100 validate-input m-b-23" data-validate="Email Không Đúng">
                    <span class="label-input100">EMAIL</span>
                    <input class="input100" type="email" name="email" placeholder="Email Của Bạn"
                    value="<?php if(isset($email)){echo $email;}?>">
                    <span class="focus-input100" data-symbol="&#xf15a;"></span>
                    <span
                        style="color: red;"><?php if (isset($_SESSION['email'])) {echo $_SESSION['email'];}unset($_SESSION['email']) ?></span>
                </div>
            <button type="submit" name="btnSub" class="btn btn-primary btn-block">Gửi</button>
        </form>
</div>