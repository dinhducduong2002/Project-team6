<?php foreach ($product as $pro) : ?>
    <div class="row d-flex p-4">
        <div class="col">
            <div class="col">
                <span class="">Mã số: <?= $pro['id'] ?></span>

            </div>
        </div>
        <div class="col text-danger">
            <h4><?php echo number_format($pro['price'], 0, '', '.'); ?>đ</h4>
        </div>
        <div class="col">
            <div class="col">
                <a href="<?= CLIENT_URL . 'san-pham/pay?id=' . $pro['id'] ?>" class="btn btn-primary me-2">Mua ngay</a>
                <a href="" class="btn btn-success me-2">Nạp thẻ cào</a>
            </div>
        </div>
    </div>
    <div class="">
        <hr>
    </div>
    <div class="row">
        <div class="col fs-6">
            <h5>HÀNH TINH: <h5 class="text-danger"><?php if ($pro['planet'] == 0) {
                                                        echo "NAMEC";
                                                    } elseif ($pro['planet'] == 1) {
                                                        echo "TRÁI ĐẤT";
                                                    } elseif ($pro['planet'] == 2) {
                                                        echo "XAYDA";
                                                    } ?></h5>
            </h5>
            <h5>SERVER: <h5 class="text-danger"><?= $pro['server'] ?></h5>
            </h5>
            <h5>BÔNG TAI: <h5 class="text-danger">
                    <?php if ($pro['porata'] == 0) {
                        echo "Có";
                    } else if ($pro['porata']) {
                        echo "Không";
                    } ?></h5>
            </h5>
        </div>
        <div class="col">
            </h5>
            <h5>ĐĂNG KÍ: <h5 class="text-danger">
                    <?php if ($pro['type_register'] == 0) {
                        echo "Đăng kí ảo";
                    } else if ($pro['type_register'] == 1) {
                        echo "Đăng kí thật";
                    } ?>
                </h5>
            </h5>
        </div>
        <div class="col">
            <h5>NỔI BẬT: <h5 class="text-danger"><?= $pro['description'] ?></h5>
            </h5>
        </div>
    </div>
    <div class="">
        <hr>
    </div>
    <div class="images text-center m-1">
        <?php foreach ($product_detail as $key) : ?>
            <div class="col m-4">
                <img src="<?= PUBLIC_ASSETS . $key['img_url'] ?>" width="350" height="350">
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
<div class="title text-center">
    <h3>TÀI KHOẢN LIÊN QUAN</h3>
</div>
<div class="danhmuc p-3">
    <div class="container d-flex flex-wrap gap-4 p-3">
        <?php foreach ($product_sp as $pro) : ?>
            <div class="card" style="width: 18rem;">
                <img src="<?= PUBLIC_ASSETS . $pro['image_thumnail'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <span class="text-danger">#<?= $pro['id'] ?></span><br>
                            Hành tinh: <span class="text-danger"><?php if ($pro['planet'] == 0) {
                                                                        echo "NAMEC";
                                                                    } elseif ($pro['planet'] == 1) {
                                                                        echo "TRÁI ĐẤT";
                                                                    } elseif ($pro['planet'] == 2) {
                                                                        echo "XAYDA";
                                                                    } ?></span><br>
                            Bông tai: <span class="text-danger"><?php if ($pro['porata'] == 0) {
                                                                    echo "Có";
                                                                } elseif ($pro['porata'] == 1) {
                                                                    echo "Không";
                                                                } ?></span><br>
                            Server: <span class="text-danger"><?= $pro['server'] ?></span>
                        </div>
                    </div>
                    <div class="btn border-danger">
                        <strike><?php echo number_format($pro['price_old'], 0, '', '.'); ?>đ</strike>
                        <p class="card-text"><?php echo number_format($pro['price'], 0, '', '.'); ?>đ</p>
                    </div>
                    <a href="<?= CLIENT_URL . 'san-pham/detail?id=' . $pro['id'] ?>" class="border border-white btn btn-primary">CHI TIẾT</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>