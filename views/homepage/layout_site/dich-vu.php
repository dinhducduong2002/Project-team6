
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
    <div class="col-md-5 mx-auto my-4 ">
        <h3 class="display-6 fw-normal">DỊCH VỤ NỔI BẬT</h3>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<div" class="container d-flex flex-wrap gap-lg-5">
    <?php foreach($ser as $key):?>
        <a href="">
        <div class="card " style="width: 18rem;">
        
        <img src="<?=PUBLIC_ASSETS. $key['image_service']?>" class="card-img-top" alt="...">
        </div>
        </a>
    <?php endforeach;?>
    
</div>