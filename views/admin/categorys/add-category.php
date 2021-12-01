<div class="row">
    <div class="col-lg-6">

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Mã dịch vụ</label>
                <input name="id_cate" type="text" class="form-control" placeholder="Mã danh mục" required="">
            </div>
            <div class="form-group">
                <label>Tên dịch vụ</label>
                <input name="name_cate" type="text" class="form-control" placeholder="Tên danh mục" required="">
            </div>
            <div class="form-group">
                <label>Ảnh</label>
                <input name="image_cate" type="file" class="form-control" placeholder="Ảnh" required="">
            </div><br>
            <span style="color: red;"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];} unset($_SESSION['error'])?></span><br>
            <button type="submit" name="btnEdit" class="btn btn-success">Thêm</button>
            <button type="reset" name="btnreset" class="btn btn-danger">Hủy</button>
        </form>

    </div>
</div>