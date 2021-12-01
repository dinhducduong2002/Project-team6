<div class="row-2">
    <div class="col-lg-6">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label>Tài Khoản Nick</label>
                <input class="form-control" type="text" name="username" id="" placeholder="Tài Khoản Nick">
                <?php if (!empty($ds_cate_er['username'])) : ?>
                    <span style="color: red;"><?php echo $ds_cate_er['username'] ?></span><br>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Mật Khẩu Nick</label>
                <input class="form-control" type="text" name="password" id="" placeholder="Mật Khẩu Nick" value="<?php if (isset($password)) {
                                                                                                                        echo $password;
                                                                                                                    } ?>">
                <?php if (!empty($ds_cate_er['password'])) : ?>
                    <span style="color: red;"><?php echo $ds_cate_er['password'] ?></span><br>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Tên Sản Phẩm</label>
                <input class="form-control" type="text" name="name_product" id="" placeholder="Tên Sản Phẩm">
                <?php if (!empty($ds_cate_er['name_product'])) : ?>
                    <span style="color: red;"><?php echo $ds_cate_er['name_product'] ?></span><br>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Giá Nick</label>
                <input class="form-control" type="number" name="price" id="" placeholder="Giá Nick">
                <?php if (!empty($ds_cate_er['price'])) : ?>
                    <span style="color: red;"><?php echo $ds_cate_er['price'] ?></span><br>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Vũ Trụ</label>
                <select name="server" class="form-control" id="">
                <?php foreach ($ds_sv as $cate) : ?>
                        <option value="<?= $cate['id_server'] ?>"><?= $cate['name_server'] ?></option> <br>
                    <?php endforeach; ?>
                </select>
                <?php if (!empty($ds_cate_er['server'])) : ?>
                    <span style="color: red;"><?php echo $ds_cate_er['server'] ?></span><br>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Hành Tinh</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="planet" id="planet1" value="0" checked>NAMEC
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="planet" id="planet2" value="1">Trái Đất
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="planet" id="planet3" value="2">XAYDA
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Danh mục sản phẩm</label>
                <select name="category" class="form-control">
                    <?php foreach ($ds_cate as $cate) : ?>
                        <option value="<?= $cate['id_cate'] ?>"><?= $cate['name_cate'] ?></option> <br>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Ảnh Đại Diện</label>
                <input class="form-control" type="file" name="image_thumnail" id="" placeholder="" required="">
            </div>
            <?php if (!empty($ds_cate_er['image_thumnail'])) : ?>
                <span style="color: red;"><?php echo $ds_cate_er['image_thumnail'] ?></span><br>
            <?php endif; ?>

            <div class="form-group">
                <label>Ảnh chi tiết</label>
                <input class="form-control" type="file" name="image_detail[]" multiple="multiple" required=""/>
            </div>
            <?php if (!empty($ds_cate_er['image_detail'])) : ?>
                <span style="color: red;"><?php echo $ds_cate_er['image_detail'] ?></span><br>
            <?php endif; ?>
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
                <label>Mã CTV: #</label> <?php echo ($_SESSION['user']['id']); ?>
            </div>
            <div class="form-group">
                <label>Mô Tả</label>
                <textarea name="description" id="" cols="90" rows="10"></textarea>
                <?php if (!empty($ds_cate_er['description'])) : ?>
                    <span style="color: red;"><?php echo $ds_cate_er['description'] ?></span><br>
                <?php endif; ?>
            </div>

            <div class="d-flex justify-content-center">
                <button name="btn_add" type="submit" class="btn btn-primary ">Thêm mới</button>
                &nbsp;
                <a href="<?= ADMIN_URL . 'sp-index' ?>" class="btn btn-danger">Hủy</a>

            </div>
        </form>
    </div>
</div>