<div class="row-2">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
        <?php foreach ($data_account as $cate) : ?> 
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-amount">Số Dư Của Bạn:</label>
                <div class="col-sm-5">
                    <label class="col-sm-2 control-label text-primary" for="input-amount"><?php echo number_format($cate['balance'], 0, '', '.'); ?>VND</label>
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-amount">Số Tiền Rút Phải Lớn Hơn:</label>
                <div class="col-sm-5">
                    <label class="col-sm-2 control-label text-danger" for="input-amount">100.000VND</label>
                </div>
            </div>
        <?php endforeach; ?>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-amount">Số Tiền Rút</label>
                <div class="col-sm-5">
                    <input style="margin: 0px 0px 7px 0px;" type="text" name="money" value="<?php if( isset($money) ){ echo $money; }; ?>" placeholder="Số tiền rút" id="input-amount" class="form-control" required="">
                    <span style="color: red;"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];} unset($_SESSION['error'])?></span>
                    <span style="color: blue;"><?php if(isset($_SESSION['success'])){echo $_SESSION['success'];} unset($_SESSION['success'])?></span>
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-bank-name">Ngân Hàng</label>
                <div class="col-sm-5">
                    <input type="text" name="banking" value="<?php if( isset($banking) ){ echo $banking; }; ?>" placeholder="Ngân Hàng" id="input-bank-name" class="form-control" required="">
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-bank-account">Số Tài khoản</label>
                <div class="col-sm-5">
                    <input type="text" name="account_number" value="<?php if( isset($account_number) ){ echo $account_number; }; ?>" placeholder="Số Tài khoản" id="input-bank-account" class="form-control" required="">
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-bank-owner">Tên Chủ Thẻ</label>
                <div class="col-sm-5">
                    <input type="text" name="account_holder" value="<?php if( isset($account_holder) ){ echo $account_holder; }; ?>" placeholder="Tên Chủ Thẻ" id="input-bank-owner" class="form-control" required="">
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-bank-branch">Chi Nhánh</label>
                <div class="col-sm-5">
                    <input type="text" name="bank_branch" value="<?php if( isset($bank_branch) ){ echo $bank_branch; }; ?>" placeholder="Chi Nhánh" id="input-bank-branch" class="form-control" required="">
                </div>
            </div>
        </fieldset>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-bank-branch"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-success" value="<?= $cate['id'] ?>" name="btn_add" onclick="return confirm('Bạn chắc chắn đã chuyển khuyển cho hóa đơn này chưa?')">Tạo đơn rút tiền</button>
            </div>
        </div>
    </form>
</div>
