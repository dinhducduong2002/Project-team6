<div class="row">
    <div class="col-lg-6">

        <form role="form" method="post" enctype="multipart/form-data">
            <?php foreach($list_service as $key):?>
            <div class="form-group">
                <label>Tên dịch vụ</label>
                <input name="name_service" type="text" class="form-control" placeholder="Tên dịch vụ" value="<?= $key['name_service']?>">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="hidden" name="hidden_image" value="<?= $key['image'] ?>">
                <input name="image" type="file" class="form-control" placeholder="Ảnh" value="<?= $key['image']?>">
                <img style="border: 1px solid gray;" src="<?=PUBLIC_ASSETS. $key['image']?>" width="130" alt="">
            </div>
            <?php endforeach;?>
            <button type="submit" name="btnEdit" class="btn btn-success">Cập nhật</button>
            <button type="reset" name="btnreset" class="btn btn-danger">Hủy</button>
        </form>

    </div>
</div>