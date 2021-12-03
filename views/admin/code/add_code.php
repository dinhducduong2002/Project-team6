<div class="row-2">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-amount">Mã code</label>
                <div class="col-sm-5">
                    <input style="margin: 0px 0px 7px 0px;" type="text" name="discount_code" value="<?php if( isset($discount_code) ){ echo $discount_code; }; ?>" placeholder="Mã code" id="input-amount" class="form-control" required="">
                    <span style="color: red;"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];} unset($_SESSION['error'])?></span>
                    <span style="color: blue;"><?php if(isset($_SESSION['success'])){echo $_SESSION['success'];} unset($_SESSION['success'])?></span>
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-bank-name">Giảm giá ( % )</label>
                <div class="col-sm-5">
                    <input type="number" name="price_sale" value="<?php if( isset($price_sale) ){ echo $price_sale; }; ?>" placeholder="Giảm giá ( % )" id="input-bank-name" class="form-control" required="">
                </div>
            </div>

            <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-bank-account">Số lượng mã giảm giá</label>
                <div class="col-sm-5">
                    <input type="number" name="quantity" value="<?php if( isset($quantity) ){ echo $quantity; }; ?>" placeholder="Số lượng mã giảm giá" id="input-bank-account" class="form-control" required="">
                </div>
            </div>
        </fieldset>
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-bank-branch"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-success" name="btn_add" onclick="return confirm('Bạn chắc chắn muốn tạo mã giảm giá này chưa?')">Tạo mã giảm giá</button>
            </div>
        </div>
    </form>
</div>
