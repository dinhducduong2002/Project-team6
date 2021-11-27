<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách cộng tác viên</h2>
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
                        <th>Tên tài khoản</th>
                        <th class="col-lg-2">Email</th>
                        <th>Số dư</th>
                        <th>Trạng thái</th>
                        <th>Loại tài khoản</th>
                        <th>Ngày tham gia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ds_ctv as $index => $key) : ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?= $key['username'] ?></td>
                            <td><?= $key['email'] ?></td>
                            <td><?php echo number_format($key['balance'], 0, '', '.'); ?>đ</td>
                            <td><?php if ($key['status'] == 0) {
                                    echo "Khóa";
                                } else if ($key['status'] == 1) {
                                    echo "Hoạt động";
                                } ?></td>
                            <td><?php if ($key['permission'] == 0) {
                                    echo "Admin";
                                } else if ($key['permission'] == 1) {
                                    echo "Cộng tác viên";
                                } ?></td>
                            <td><?= $key['create_at'] ?></td>
                            <td><a href="<?= ADMIN_URL . 'edit-ctv?id=' . $key['id'] ?>">Sửa</a></td>
                            <td><a href="<?= ADMIN_URL . 'delete-ctv?id=' . $key['id'] ?>">Xóa</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <?php for ($i = 1; $i <= $page; $i++) : ?>
                            <?php if ($i != $page) : ?>
                                <a class="page-link" href="http://localhost/Project-team6/cp-admin/manager-ctv?page=<?= $i ?>"><?= $i ?></a>
                            <?php else : ?>
                                <a class="page-link" href="http://localhost/Project-team6/cp-admin/manager-ctv?page=<?= $i ?>"><?= $i ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>