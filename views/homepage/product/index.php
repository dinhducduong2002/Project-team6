<div class="row">
    <div class="title alert alert-success">
        DANH MỤC GAME NGỌC RỒNG
    </div>
    <form action="" method="post">
        <div class="d-flex gap-2">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tìm kiếm</span>
                </div>
                <input type="text" class="form-control" placeholder="Tìm kiếm" name="keyword" aria-label="Tìm kiếm" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Mã số</span>
                </div>
                <input name="keyword_id" type="text" class="form-control" placeholder="Mã số" aria-label="Mã số" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" type="button">Server</span>
                </div>
                <select class="custom-select" name="keyword_sv" id="inputGroupSelect03">
                    <option selected>Server</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" type="button">Giá tiền</span>
                </div>
                <select name="keyword_mon" class="custom-select" id="inputGroupSelect03">
                    <option selected>Giá tiền</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                </select>
            </div>

        </div>
        <div class="">
            <button href="" name="btnSearch" class="btn btn-danger me-2">Tìm kiếm</button>
            <button href="" name="btnSearchAll" class="btn btn-success me-2">Tất cả</button>
        </div>
    </form>
</div>
<div class="container d-flex flex-wrap gap-4 p-3">
    <?php foreach ($dsSanPham as $pro) : ?>
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