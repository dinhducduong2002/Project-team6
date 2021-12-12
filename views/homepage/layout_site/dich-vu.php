
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
    <div class="col-md-5 mx-auto my-4 ">
        <h3 class="display-6 fw-normal">DỊCH VỤ NỔI BẬT</h3>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<div class="col-md-12 col-xs-12 container d-flex gap-lg-4">
    <?php foreach($ser as $key):?>
        <a href="">
        <div class="card">
        
        <img src="<?=PUBLIC_ASSETS. $key['image_service']?>" class="card-img-top" >
        </div>
        </a>
    <?php endforeach;?>
    
</div>