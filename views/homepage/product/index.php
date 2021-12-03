<div>
    <div class="title alert alert-success">
        DANH MỤC GAME NGỌC RỒNG
    </div>
    <form action="" method="post">
        <div class="col-3">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Tìm kiếm</span>
                </div>
                <input type="text" class="form-control" placeholder="Tìm kiếm" name="keyword" aria-label="Tìm kiếm" aria-describedby="basic-addon1">
            </div>


        </div>
        <div class="">
            <button type="submit" name="btnSearch" class="btn btn-danger me-2">Tìm kiếm</button>
            <button type="submit" name="btnSearchAll" class="btn btn-success me-2">Tất cả</button>
        </div>
    </form>
</div>
<span style="color: red;">Hiện đang có <?php echo count($dsSanPham); ?> tài khoản</span>
<br>
<div class="d-flex flex-wrap gap-4">
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
<br>
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        <?php for ($i = 1; $i <= $pagea; $i++) : ?>
            <li class="page-item">
                <a class="page-link" href="san-pham?id=<?= $_GET['id'] ?>&page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>