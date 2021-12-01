<div class="row">
    <div class="col-lg-6">

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên dịch vụ</label>
                <input name="name_cate" type="text" class="form-control" placeholder="Tên dịch vụ" value="<?= $list_cate['name_cate']?>" required="">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input type="hidden" name="hidden_image" value="<?= $list_cate['image_cate'] ?>" required="">
                <input name="image_cate" type="file" class="form-control" placeholder="Ảnh" value="<?= $list_cate['image_cate']?>" >
                <img style="border: 1px solid gray;" src="<?=PUBLIC_ASSETS. $list_cate['image_cate']?>" width="130" alt=""><br>
                <?php if(isset($_SESSION['error'])):?>
                    <span style="color: red;"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></span>
                <?php endif;?>
            </div>
            <button type="submit" name="btnEdit" class="btn btn-success">Cập nhật</button>
            <button type="reset" name="btnreset" class="btn btn-danger">Hủy</button>
        </form>

    </div>
</div>