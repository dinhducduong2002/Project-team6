<form action="<?= ADMIN_URL . ''?>"  method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-6">

        <form role="form">

            <div class="form-group">
                <label>Tên Nick</label>
                <input class="form-control" type="text" name="username" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Pass Nick</label>
                <input class="form-control" type="text" name="password" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Tên Sản Phẩm</label>
                <input class="form-control" type="text" name="name_product" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Giá Nick</label>
                <input class="form-control" type="number" name="price" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>SEVER</label>
                <input class="form-control" type="text" name="server" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Loại Nick</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="category" id="category1" value="0" checked>Nick Tầm Trung
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="category" id="category2" value="1">Nick Vip
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="category" id="category3" value="2">Nick Vip PRO
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label>Ảnh Đại Diện</label>
                <input class="form-control" type="file" name="image_thumnail" id="" placeholder="">
            </div>

            <div class="form-group">
                <label>Ảnh 1</label>
                <input class="form-control" type="file" name="image1l" id="" placeholder="">
            </div>

            <div class="form-group">
                <label>Ảnh 2</label>
                <input class="form-control" type="file" name="image2" id="" placeholder="">
            </div>

            <div class="form-group">
                <label>Ảnh 3</label>
                <input class="form-control" type="file" name="image3" id="" placeholder="">
            </div>

            <div class="form-group">
                <label>Ảnh 4</label>
                <input class="form-control" type="file" name="image4" id="" placeholder="">
            </div>

            <div class="form-group">
                <label>Bông Tai</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="porata" id="porata1" value="0" checked>Không Có Bông Tai
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="porata" id="porata2" value="1">Có Bông Tai
                    </label>
                </div>
            </div>

            <div class="form-group">
            <label>Mã CTV:</label>  <?php echo($_SESSION['user']['id']);?>
            </div>

            <div class="form-group">
                <label>Mô Tả</label>
                <input class="form-control" type="text" name="description" id="" placeholder="">
            </div>

            <div class="form-group">
                <label>Trạng Thái</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" id="status1" value="0" checked>Đang Giao Bán
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" id="status2" value="1">Đã Bán
                    </label>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'sp'?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;
                <button type="button" class="btn btn-primary btn-sm">Lưu</button>
            </div>

        </form>

    </div>
</div>
</form>