<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
    <div class="col-md-5 mx-auto my-1 ">
        <h3 class="display-6 fw-normal">DANH MỤC GAME</h3>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<div class="container d-flex flex-wrap gap-lg-5 ">
    <?php foreach($categorys as $key):?>
    <div class="card" style="width: 18rem;">
        <img src="<?=PUBLIC_ASSETS. $key['image_cate']?>" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <h5 class="card-title"><?= $key['name_cate']?></h5>
            <p class="card-text">Tài khoản</p>
            <a href="<?= CLIENT_URL . 'san-pham?id=' . $key['id_cate'] ?>" class=" btn btn-danger">MUA NGAY</a>
        </div>
    </div>
    <?php endforeach;?>
</div>