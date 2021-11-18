<div class="row">
    <div class="title alert alert-success">
        DANH MỤC GAME NGỌC RỒNG
    </div>
    <div class="d-flex gap-2">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Tìm kiếm</span>
            </div>
            <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Tìm kiếm"
                aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Mã số</span>
            </div>
            <input type="text" class="form-control" placeholder="Mã số" aria-label="Mã số"
                aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" type="button">Server</span>
            </div>
            <select class="custom-select" id="inputGroupSelect03">
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
            <select class="custom-select" id="inputGroupSelect03">
                <option selected>Giá tiền</option>
                <option value="1">One</option>
                <option value="2">Two</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" type="button">Trạng thái</span>
            </div>
            <select class="custom-select" id="inputGroupSelect03">
                <option selected>Trạng thái</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div class="">
        <a href="" class="btn btn-danger me-2">Tìm kiếm</a>
        <a href="" class="btn btn-success me-2">Tất cả</a>
    </div>
</div>
<div class="container d-flex flex-wrap gap-4 p-3">
    <?php foreach($dsSanPham as $pro):?>
    <div class="card" style="width: 18rem;">
        <img src="./mvc/Views/images/Sbcs9ooDuN_1623164443.gif" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <span class="text-danger">#<?= $pro['id']?></span><br>
                    Hành tinh: <span class="text-danger"><?= $pro['name']?></span><br>
                    Bông tai: <span class="text-danger"><?= $pro['detail']?></span><br>
                    Server: <span class="text-danger"><?= $pro['quantity']?></span>
                </div>
            </div>
            <div class="btn border-danger">
                <strike><?php echo number_format($pro['price'], 0, '', '.'); ?>đ</strike>
                <p class="card-text"><?php echo number_format($pro['price'], 0, '', '.'); ?>đ</p>
            </div>
            <a href="<?= CLIENT_URL . 'san-pham/detail?id=' . $pro['id'] ?>"
                class="border border-white btn btn-primary">CHI TIẾT</a>
        </div>
    </div>
    <?php endforeach;?>
</div>