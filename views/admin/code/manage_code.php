<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách mã giảm giá</h2>
        <hr>
        <div class="table-responsive">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-lg-1">STT</th>
                        <th>ID mã giảm giá</th>
                        <th>Mã sản phẩm</th>
                        <th>Khách hàng áp dụng</th>
                        <th>Giá sản phẩm</th>
                        <th>Giá sau khi sử dụng</th>
                        <th>Ngày sử dụng</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($code as $index => $cate) : ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td>#<?= $cate['id_code'] ?></td>
                            <td>#<?= $cate['id_products'] ?></td>
                            <td><?= $cate['name_account'] ?></td>
                            <td><?php echo number_format($cate['price'], 0, '', '.'); ?>đ</td>
                            <td><?php echo number_format($cate['reduced_price'], 0, '', '.'); ?>đ</td>
                            <td><?= $cate['date_at'] ?></td>
                            <td>
                                <a onclick="confrim_remove_bill('<?= ADMIN_URL . 'delete-manage-code?id=' . $cate['id'] ?>','<?= $cate['id'] ?>')" href="javascript:;" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>