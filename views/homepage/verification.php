<form action="" method="post">
    <div class="col-6 offset-3">
    <?php if (isset($_SESSION['success'])) : ?>
                    <div style="color:green;"  role="alert">
                    <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
        <div class="form-group">
            <label for="">MÃ Xác Nhận</label>
            <input type="text" name="recceiver" class="form-control" placeholder="Mã xác nhận" 
            value="<?php if(isset($recceiver)){echo $recceiver;}?>">
            <span style="color: red;">
            <?php if (isset($_SESSION['recceiver'])) {echo $_SESSION['recceiver'];}unset($_SESSION['recceiver']) ?>
        </span>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <button type="submit" name="btn" class="btn btn-primary">Gửi</button>
        </div>
        <br>
    </div>
</form>