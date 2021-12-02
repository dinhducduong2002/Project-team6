<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách mã giảm giá</h2>
        <hr>
        <a class="btn btn-primary" href="<?= ADMIN_URL . 'add-code' ?>">Tạo mã giảm giá</a>
        <br>
        <br>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-lg-1">STT</th>
                        <th>Mã giảm giá</th>
                        <th>Khuyến mại</th>
                        <th>Số lượng mã giảm giá</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($code as $index => $cate) : ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?= $cate['discount_code'] ?></td>
                            <td><?php echo number_format($cate['price_sale'], 0, '', '.'); ?>%</td>
                            <td><?= $cate['quantity'] ?></td>
                            <td>
                                <a class="btn btn-success" href="<?= ADMIN_URL . 'manage-code?id=' . $cate['id'] ?>">Quản lí</a>
                                <a onclick="confrim_remove_bill('<?= ADMIN_URL . 'delete-code?id=' . $cate['id'] ?>','<?= $cate['id'] ?>')" href="javascript:;" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>