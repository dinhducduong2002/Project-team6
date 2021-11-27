<div class="row">
    <div class="col-lg-6">

        <form  action="<?= ADMIN_URL . 'edit-service?id=' . $list_service['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên dịch vụ</label>
                <input name="name_service" type="text" class="form-control" placeholder="Tên dịch vụ" value="<?= $list_service['name_service']?>">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="hidden" name="hidden_image" value="<?= $list_service['image_service'] ?>">
                <input name="image_service" type="file" class="form-control" placeholder="Ảnh" value="<?= $list_service['image_service']?>">
                <img style="border: 1px solid gray;" src="<?=PUBLIC_ASSETS. $list_service['image_service']?>" width="130" alt=""><br>
                <?php if(isset($_SESSION['error'])):?>
                    <span style="color: red;"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></span>
                <?php endif;?>
            </div>
            <button type="submit" name="btnEdit" class="btn btn-success">Cập nhật</button>
            <button type="reset" name="btnreset" class="btn btn-danger">Hủy</button>
        </form>

    </div>
</div>