<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['error'] = "Vui lòng đăng nhập để tiếp tục";
    header("location: " . BASE_URL . "login");
} else {
}
?>

<div class="page-content">
    <div class="form-v8-content">
        <div class="form-left">
            <?php foreach ($sql_data_products as $key) : ?>
                <img src="<?= PUBLIC_ASSETS . $key['image_thumnail'] ?>" width="450" height="300">
            <?php endforeach; ?>
        </div>
        <div class="form-right">
            <div class="tab">
                <div class="tab-inner">
                    <button class="tablinks" onclick="openCity(event, 'sign-up')" id="defaultOpen">Thanh Toán</button>
                </div>
                <div class="tab-inner">
                    <button class="tablinks" onclick="openCity(event, 'sign-in')">Tài Khoản</button>
                </div>
            </div>
            <form class="form-detail" method="post">
                <div class="tabcontent" id="sign-up">
                    <?php foreach ($data_pay as $cate) : ?>
                        <?php foreach ($sql_data_products as $cate1) : ?>
                            <div class="form_acc">
                                <span>Tài khoản: </span><b name="username"><?= $cate['username'] ?></b><br>
                                <hr>
                                <span>Số dư: </span><b name="balance"><?php echo number_format($cate['balance'], 0, '', '.'); ?>đ</b><br>
                                <hr>
                                <span>Giá tiền: </span><b name="price"><?php echo number_format($cate1['price'], 0, '', '.'); ?>đ</b><br>
                                <hr>
                                <span>Tổng tiền: </span><b>
                                    <?php if (isset($_SESSION['price_code'])) { ?>
                                        <?php echo number_format($_SESSION['price_code'], 0, '', '.'); ?>đ (đã áp dụng mã giảm giá)
                                    <?php } else { ?>
                                        <?php echo number_format($cate1['price'], 0, '', '.'); ?>đ
                                    <?php } ?>
                                </b><br><br>
                            </div>
                            <br>
                            <div class="form-row">
                                <label class="form-row-inner">
                                    <span class="label" style="color: red; font-size: 15px;"><?php if (isset($_SESSION['error'])) {
                                                                                                    echo $_SESSION['error'];
                                                                                                }
                                                                                                unset($_SESSION['error']) ?></span>
                                    <span class="label" style="color: green; font-size: 15px;"><?php if (isset($_SESSION['success'])) {
                                                                                                    echo $_SESSION['success'];
                                                                                                }
                                                                                                unset($_SESSION['success']) ?></span><br>
                                    <input type="text" name="discount_code" id="comfirm_password" class="input-text">
                                    <span class="label">Nhập mã giảm giá: ( Nếu có )</span>
                                    <span class="border"></span>
                                </label>
                            </div>
                            <div class="form-row-last">
                                <input type="submit" name="btn_code" class="register" value="Sử dụng"><br>
                                <hr>
                            </div>
                            <?php if ($cate['balance'] < $cate1['price']) { ?>
                                <div class="form-row-last">
                                    <span class="label_1">Bạn không đủ số dư để mua tài khoản này. Bạn chọn hình thức nạp bằng cách click vào nút bên dưới.</span><br><br>
                                    <hr>
                                </div>
                                <div class="form-row-last">
                                    <div class="row_top">
                                        <a class="form-row-last-close" href="<?= CLIENT_URL . 'user/brickcard' ?>">Thẻ Cào</a>
                                        <a class="form-row-last-close" href="">MoMo</a>
                                        <a class="form-row-last-close" href="">Ngân Hàng</a>
                                        <a class="form-row-last-close" href="<?= CLIENT_URL . 'san-pham/detail?id=' . $cate1['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn thoát không?')">Thoát</a>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="form-row-last">
                                    <div class="row_top">
                                        <button class="form-row-last-close" name="btnAdd" type="submit" onclick="return confirm('Bạn chắc chắn muốn thanh toán mã sản phẩm #<?= $cate1['id'] ?> không?')">Thanh Toán</button>
                                        <a class="form-row-last-close" href="<?= CLIENT_URL . 'san-pham/detail?id=' . $cate1['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn thoát không?')">Thoát</a>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>

                <div class="tabcontent" id="sign-in">
                    <?php foreach ($sql_data_products as $cate) : ?>
                        <div class="form_acc">
                            <span>Mã tài khoản: </span><b>#<?= $cate['id'] ?></b><br>
                            <hr>
                            <span>Vũ trụ: </span><b><?= $cate['server'] ?> Sao</b><br>
                            <hr>
                            <span>Hành tinh: </span>
                                <?php if($cate['planet'] == 0):?>
                                    <span>NAMEC</span>
                                <?php elseif($cate['planet'] == 1):?>
                                    <span>TRÁI ĐẤT</span>
                                <?php elseif($cate['planet'] == 2):?>
                                    <span>XAYDA</span>
                                <?php endif;?>
                            <br>
                            <hr>
                            <span>Danh mục:
                                <?php if ($cate['category'] == 1) { ?>
                            </span><b>Nick sơ sinh</b><br>
                        <?php } ?>

                        <?php if ($cate['category'] == 2) { ?>
                            </span><b>Nick tầm trung</b><br>
                        <?php } ?>

                        <?php if ($cate['category'] == 3) { ?>
                            </span><b>Nick vip</b><br>
                        <?php } ?>
                        <?php if ($cate['category'] == 4) { ?>
                            </span><b>Nick siêu phẩm</b><br>
                        <?php } ?>
                        <hr>
                        <span>Tổng tiền: </span><b>
                            <?php if (isset($_SESSION['price_code'])) { ?>
                                <?php echo number_format($_SESSION['price_code'], 0, '', '.'); ?>đ (đã áp dụng mã giảm giá)
                            <?php } else { ?>
                                <?php echo number_format($cate1['price'], 0, '', '.'); ?>đ
                            <?php } ?>
                        </b><br><br>
                        </div>
                        <div class="form-row-last">
                            <?php foreach ($data_pay as $cate) : ?>
                                <?php if ($cate['balance'] < $cate1['price']) { ?>
                                    <div class="form-row-last">
                                        <span class="label_1">Bạn không đủ số dư để mua tài khoản này. Bạn chọn hình thức nạp bằng cách click vào nút bên dưới.</span><br><br>
                                        <hr>
                                    </div>
                                    <div class="form-row-last">
                                        <div class="row_top">
                                            <a class="form-row-last-close" href="<?= CLIENT_URL . 'user/brickcard' ?>">Thẻ Cào</a>
                                            <a class="form-row-last-close" href="">MoMo</a>
                                            <a class="form-row-last-close" href="">Ngân Hàng</a>
                                            <a class="form-row-last-close" href="<?= CLIENT_URL . 'san-pham/detail?id=' . $cate1['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn thoát không?')">Thoát</a>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-row-last">
                                        <div class="row_top">
                                            <button class="form-row-last-close" name="btnAdd" type="submit" onclick="return confirm('Bạn chắc chắn muốn thanh toán mã sản phẩm #<?= $cate1['id'] ?> không?')">Thanh Toán</button>
                                            <a class="form-row-last-close" href="<?= CLIENT_URL . 'san-pham/detail?id=' . $cate1['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn thoát không?')">Thoát</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endforeach; ?>
                        </div>

                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>