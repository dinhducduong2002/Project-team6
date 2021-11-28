<form action="<?= ADMIN_URL . 'sp-edit'. $user['id']?>"  method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-6">

        <form role="form">

            <div class="form-group">
                <label>Tên Nick</label>
                <input class="form-control" value="<?= $user['username'] ?>" type="text" name="username" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Pass Nick</label>
                <input class="form-control" value="<?= $user['password'] ?>" type="text" name="password" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Tên Sản Phẩm</label>
                <input class="form-control" value="<?= $user['name_product'] ?>" type="text" name="name_product" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Giá Nick</label>
                <input class="form-control" value="<?= $user['price'] ?>" type="number" name="price" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>SEVER</label>
                <input class="form-control" value="<?= $user['server'] ?>" type="number" name="server" id="" placeholder="Enter text">
            </div>

            <div class="form-group">
                <label>Hành Tinh</label>
                <select name="planet" id="form-control">
                <?php if ($user['planet']) : ?>
                            <option selected value="<?= $user['planet'] ?>"></option>
                <?php else : ?>
                            <option value="<?= $user['planet'] ?>"></option>
                <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
            <label>Danh mục sản phẩm</label>
            <select name="category" class="form-control">
            <?php foreach ($ds_cate as $cate) : ?>
                        <?php if ($cate['id_categorys'] == $user['category']) : ?>
                            <option selected value="<?= $cate['id_categorys'] ?>"><?= $cate['name_cate'] ?></option>
                        <?php else : ?>
                            <option value="<?= $cate['id_categorys'] ?>"><?= $cate['name_cate'] ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
            </select>
        </div>

            <div class="form-group">
                <label>Ảnh Đại Diện</label>
                <input class="form-control" value="<?= $user['image_thumnail'] ?>" type="file" name="image_thumnail" id="" placeholder="">
            </div>
            <?php if(isset($_SESSION['image_thumnail'])) echo $_SESSION['image_thumnail']?>

            <div class="form-group">
                <label>Ảnh chi tiết</label>
                <input class="form-control" type="file" name="galery[]" multiple/>
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
                <input class="form-control" value="<?= $user['description']?>" type="text" name="description" id="" placeholder="">
            </div>

            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'sp-index'?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;
                <button name="btn"  class="btn btn-primary btn-sm">Lưu</button>
            </div>

        </form>

    </div>
</div>
</form>