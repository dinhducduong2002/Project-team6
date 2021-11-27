<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách dịch vụ</h2>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <hr>

        <div class="table-responsive">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-lg-1">id</th>
                        <th>Tên dịch vụ</th>
                        <th>ảnh dịch vụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ds_service as $index => $key) : ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?= $key['name_service'] ?></td>
                            <td><img src="<?=PUBLIC_ASSETS. $pro['image']?>"></td>
                            <td><?= $key['created_at'] ?></td>
                            <td><a href="<?= ADMIN_URL . 'edit-service?id=' . $key['id'] ?>">Sửa</a></td>
                            <td><a href="<?= ADMIN_URL . 'delete-service?id=' . $key['id'] ?>">Xóa</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>