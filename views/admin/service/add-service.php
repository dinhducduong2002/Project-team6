<div class="row">
    <div class="col-lg-6">

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Mã dịch vụ</label>
                <input name="id_service" type="text" class="form-control" placeholder="Mã dịch vụ">
            </div>
            <div class="form-group">
                <label>Tên dịch vụ</label>
                <input name="name_service" type="text" class="form-control" placeholder="Tên dịch vụ">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input name="image_service" type="file" class="form-control" placeholder="Ảnh">
            </div><br>
            <?php if(isset($_SESSION['error'])):?>
                    <span style="color: red;"><?php echo $_SESSION['error'];unset($_SESSION['error'])?></span>
                <?php endif;?>
            <button type="submit" name="btnEdit" class="btn btn-success">Thêm</button>
            <button type="reset" name="btnreset" class="btn btn-danger">Hủy</button>
        </form>

    </div>
</div>