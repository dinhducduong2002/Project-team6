<?php foreach($product as $pro):?>
<div class="row d-flex p-4">
    <div class="col">
        <div class="col">
            <span class="">Mã số: #<?= $pro['id']?></span>

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
        <h5>HÀNH TINH: <h5 class="text-danger"><?= $pro['planet']?></h5>
        </h5>
        <h5>SERVER: <h5 class="text-danger"><?= $pro['server']?></h5>
        </h5>
        <h5>BÔNG TAI: <h5 class="text-danger">
                <?php if($pro['porata'] == 0){echo "Có";}else if($pro['porata']){echo "Không";}?></h5>
        </h5>
    </div>
    <div class="col">
        </h5>
        <h5>ĐĂNG KÍ: <h5 class="text-danger">
                <?php if($pro['type_register'] == 0){echo "Đăng kí ảo";}else if($pro['type_register']==1){echo "Đăng kí thật";}?>
            </h5>
        </h5>
    </div>
    <div class="col">
        <h5>NỔI BẬT: <h5 class="text-danger"><?= $pro['description']?></h5>
        </h5>
    </div>
</div>
<div class="">
    <hr>
</div>
<div class="images text-center m-1">
    <div class="col m-4">
        <img src="<?= CLIENT_ASSETS ?>images/90rx4f9oeG_1623147714.jpg" alt="350" height="350">
    </div>
    <div class="col m-4">
        <img src="<?= CLIENT_ASSETS ?>images/90rx4f9oeG_1623147714.jpg" alt="350" height="350">
    </div>
    <div class="col m-4">
        <img src="<?= CLIENT_ASSETS ?>images/90rx4f9oeG_1623147714.jpg" alt="350" height="350">
    </div>
    <div class="col m-4">
        <img src="<?= CLIENT_ASSETS ?>images/90rx4f9oeG_1623147714.jpg" alt="350" height="350">
    </div>
    <div class="col m-4">
        <a class="btn btn-primary">MUA NGAY</a>
    </div>
</div>
<?php endforeach;?>
<div class="title text-center">
    <h3>TÀI KHOẢN LIÊN QUAN</h3>
</div>
<div class="danhmuc p-3">
    <div class="container d-flex flex-wrap gap-4 p-3">
        <div class="card" style="width: 18rem;">
            <img src="<?= CLIENT_ASSETS ?>images/Sbcs9ooDuN_1623164443.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        Hành tinh: <span class="text-danger">XAYDA</span><br>
                        Bông tai: <span class="text-danger">Có</span><br>
                        Server: <span class="text-danger">1</span><br>
                        Sơ Sinh Có Đệ: <span class="text-danger">Không</span>
                    </div>
                </div>
                <div class="btn border-danger">
                    <strike>10000đ</strike>
                    <p class="card-text">Giá: 100000Đ</p>
                </div>
                <a href="#" class="border border-white btn btn-primary">CHI TIẾT</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="<?= CLIENT_ASSETS ?>images/Sbcs9ooDuN_1623164443.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        Hành tinh: <span class="text-danger">XAYDA</span><br>
                        Bông tai: <span class="text-danger">Có</span><br>
                        Server: <span class="text-danger">1</span><br>
                        Sơ Sinh Có Đệ: <span class="text-danger">Không</span>
                    </div>
                </div>
                <div class="btn border-danger">
                    <strike>10000đ</strike>
                    <p class="card-text">Giá: 100000Đ</p>
                </div>
                <a href="#" class="border border-white btn btn-primary">CHI TIẾT</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="<?= CLIENT_ASSETS ?>images/Sbcs9ooDuN_1623164443.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        Hành tinh: <span class="text-danger">XAYDA</span><br>
                        Bông tai: <span class="text-danger">Có</span><br>
                        Server: <span class="text-danger">1</span><br>
                        Sơ Sinh Có Đệ: <span class="text-danger">Không</span>
                    </div>
                </div>
                <div class="btn border-danger">
                    <strike>10000đ</strike>
                    <p class="card-text">Giá: 100000Đ</p>
                </div>
                <a href="#" class="border border-white btn btn-primary">CHI TIẾT</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="<?= CLIENT_ASSETS ?>images/Sbcs9ooDuN_1623164443.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        Hành tinh: <span class="text-danger">XAYDA</span><br>
                        Bông tai: <span class="text-danger">Có</span><br>
                        Server: <span class="text-danger">1</span><br>
                        Sơ Sinh Có Đệ: <span class="text-danger">Không</span>
                    </div>
                </div>
                <div class="btn border-danger">
                    <strike>10000đ</strike>
                    <p class="card-text">Giá: 100000Đ</p>
                </div>
                <a href="#" class="border border-white btn btn-primary">CHI TIẾT</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="<?= CLIENT_ASSETS ?>images/Sbcs9ooDuN_1623164443.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        Hành tinh: <span class="text-danger">XAYDA</span><br>
                        Bông tai: <span class="text-danger">Có</span><br>
                        Server: <span class="text-danger">1</span><br>
                        Sơ Sinh Có Đệ: <span class="text-danger">Không</span>
                    </div>
                </div>
                <div class="btn border-danger">
                    <strike>10000đ</strike>
                    <p class="card-text">Giá: 100000Đ</p>
                </div>
                <a href="#" class="border border-white btn btn-primary">CHI TIẾT</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="<?= CLIENT_ASSETS ?>images/Sbcs9ooDuN_1623164443.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        Hành tinh: <span class="text-danger">XAYDA</span><br>
                        Bông tai: <span class="text-danger">Có</span><br>
                        Server: <span class="text-danger">1</span><br>
                        Sơ Sinh Có Đệ: <span class="text-danger">Không</span>
                    </div>
                </div>
                <div class="btn border-danger">
                    <strike>10000đ</strike>
                    <p class="card-text">Giá: 100000Đ</p>
                </div>
                <a href="#" class="border border-white btn btn-primary">CHI TIẾT</a>
            </div>
        </div>
    </div>
    <nav class="text-right" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>