<div class="title alert alert-success">
    DANH MỤC GAME NGỌC RỒNG
</div>
<div class="d-flex gap-2">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Tìm kiếm</span>
        </div>
        <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Tìm kiếm" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Mã số</span>
        </div>
        <input type="text" class="form-control" placeholder="Mã số" aria-label="Mã số" aria-describedby="basic-addon1">
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
<div class="danhmuc p-3">
    <div class="container d-flex flex-wrap gap-4 p-3">
        <?php foreach($data["Product"] as $cate):?>
            <div class="card" style="width: 18rem;">
            <img src="./mvc/Views/images/Sbcs9ooDuN_1623164443.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <span class="text-danger">#<?= $cate['id']?></span><br>
                        Hành tinh: <span class="text-danger"><?= $cate['planet']?></span><br>
                        Bông tai: <span class="text-danger"><?php if($cate['porata'] == 0){echo "Không";}else if($cate['porata']==1){echo "Có";}?></span><br>
                        Server: <span class="text-danger"><?= $cate['server']?></span>
                    </div>
                </div>
                <div class="btn border-danger">
                    <strike><?php echo number_format($cate['price_old'], 0, '', '.'); ?>đ</strike>
                    <p class="card-text"><?php echo number_format($cate['price'], 0, '', '.'); ?>đ</p>
                </div>
                <a href="HomeController/DetailProduct/<?php echo $cate['id'] ?>" class="border border-white btn btn-primary">CHI TIẾT</a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <nav class="text-right py-3" aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>