<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6">
            <form role="form">
                <div class="form-group">
                    <label>Tên Nick</label>
                    <input class="form-control" value="<?= $pro_edit['username'] ?>" type="text" name="username" id="" placeholder="Enter text">
                    <?php if (!empty($pro_edit_er['username'])) : ?>
                        <span style="color: red;"><?php echo $pro_edit_er['username'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Pass Nick</label>
                    <input class="form-control" value="<?= $pro_edit['password'] ?>" type="text" name="password" id="" placeholder="Enter text">
                    <?php if (!empty($pro_edit_er['password'])) : ?>
                        <span style="color: red;"><?php echo $pro_edit_er['password'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input class="form-control" value="<?= $pro_edit['name_product'] ?>" type="text" name="name_product" id="" placeholder="Enter text">
                    <?php if (!empty($pro_edit_er['name_product'])) : ?>
                        <span style="color: red;"><?php echo $pro_edit_er['name_product'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Giá Nick</label>
                    <input class="form-control" value="<?= $pro_edit['price'] ?>" type="number" name="price" id="" placeholder="Enter text">
                    <?php if (!empty($pro_edit_er['price'])) : ?>
                        <span style="color: red;"><?php echo $pro_edit_er['price'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Vũ Trụ</label>
                    <select name="server" class="form-control" id="">
                        <?php foreach ($ds_sv as $cate) : ?>
                            <?php if ($cate['id_cate'] == $pro_edit['server']) : ?>
                                <option selected value="<?= $cate['id_server'] ?>"><?= $cate['name_server'] ?></option>
                            <?php else : ?>
                                <option value="<?= $cate['id_server'] ?>"><?= $cate['name_server'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($pro_edit_er['server'])) : ?>
                        <span style="color: red;"><?php echo $pro_edit_er['server'] ?></span><br>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Hành Tinh</label><br>
                    <select name="planet" id="form-control">
                        <?php if ($pro_edit['planet'] == 0) : ?>
                            <option value="0" selected>NAMEC</option>
                            <option value="1">TRÁI ĐẤT</option>
                            <option value="2">XAYDA</option>
                        <?php elseif ($pro_edit['planet'] == 1) : ?>
                            <option value="0">NAMEC</option>
                            <option value="1" selected>TRÁI ĐẤT</option>
                            <option value="2">XAYDA</option>
                        <?php elseif ($pro_edit['planet'] == 2) : ?>
                            <option value="0">NAMEC</option>
                            <option value="1">TRÁI ĐẤT</option>
                            <option value="2" selected>XAYDA</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Danh mục sản phẩm</label>
                    <select name="category" class="form-control">
                        <?php foreach ($ds_cate as $cate) : ?>
                            <?php if ($cate['id_cate'] == $pro_edit['category']) : ?>
                                <option selected value="<?= $cate['id_cate'] ?>"><?= $cate['name_cate'] ?></option>
                            <?php else : ?>
                                <option value="<?= $cate['id_cate'] ?>"><?= $cate['name_cate'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Ảnh Đại Diện</label>
                    <input type="hidden" name="thumb_anh" value="<?= $pro_edit['image_thumnail'] ?>"><br>
                    <input class="form-control" value="<?= $pro_edit['image_thumnail'] ?>" type="file" name="image_thumnail" id="" placeholder="">
                    <img style="border: 1px solid gray;" src="<?= PUBLIC_ASSETS . $pro_edit['image_thumnail'] ?>" width="130" alt=""><br>
                </div>
                <?php if (!empty($pro_edit_er['image_thumnail'])) : ?>
                    <span style="color: red;"><?php echo $pro_edit_er['image_thumnail'] ?></span><br>
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
                    <label>Mã CTV:</label> <?php echo ($_SESSION['user']['id']); ?>
                </div>

                <div class="form-group">
                    <label>Mô Tả</label><br>
                    <textarea name="description" id="" cols="50" rows="5"><?= $pro_edit['description'] ?></textarea>
                </div>
                <?php if (!empty($pro_edit_er['description'])) : ?>
                    <span style="color: red;"><?php echo $pro_edit_er['description'] ?></span><br>
                <?php endif; ?>
                <div class="d-flex justify-content-center">
                    <button name="btn_Edit" type="submit" class="btn btn-primary">Cập nhật</button>
                    &nbsp;
                    <a href="<?= ADMIN_URL . 'sp-index' ?>" class="btn btn-danger">Hủy</a>
                </div>

            </form>

        </div>
    </div>
</form>