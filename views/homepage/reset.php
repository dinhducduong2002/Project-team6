<form action="<?= CLIENT_URL . 'send-email/submit' ?>" method="post">
    <div class="col-6 offset-3">
        <div class="form-group">
        <?php if (isset($_SESSION['success'])) : ?>
                    <div style="color:green;"  role="alert">
                    <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            <label for="">Người nhận</label>
            <input type="text" name="recceiver"value="<?php if(isset($recceiver)){echo $recceiver;}?>" class="form-control" placeholder="địa chỉ email người nhận">
            <span
                        style="color: red;"><?php if (isset($_SESSION['recceiver'])) {echo $_SESSION['recceiver'];}unset($_SESSION['recceiver']) ?></span>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Gửi</button>
        </div>
        <br>
    </div>
</form>