<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách lịch sử nạp card</h2>
        <hr>
        <div class="table-responsive">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-lg-1">STT</th>
                        <th>ID tài khoản nạp</th>
                        <th>Mã giao dịch</th>
                        <th>Mã thẻ</th>
                        <th>Serial</th>
                        <th>Mệnh giá</th>
                        <th>Loại thẻ</th>
                        <th>Trạng thái</th>
                        <th>Thời gian nạp</th>
                        <th>Thời gian thành công</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($card as $index => $cate) : ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td>#<?= $cate['id_user'] ?></td>
                            <td>#<?= $cate['request_id'] ?></td>
                            <td><?= $cate['code'] ?></td>
                            <td><?= $cate['serial'] ?></td>
                            <td><?php echo number_format($cate['amount'], 0, '', '.'); ?>đ</td>
                            <td><?= $cate['telco'] ?></td>
                            <td>
                                <?php if ($cate['status'] == 'Thẻ đúng') : ?>
                                    <span style="color: green;"><?php echo "Thẻ đúng"; ?></span>
                                <?php elseif ($cate['status'] == 'Thẻ lỗi') : ?>
                                    <span style="color: red;"><?php echo "Thẻ lỗi"; ?></span>
                                <?php elseif ($cate['status'] == 'Chờ duyệt') : ?>
                                    <span style="color: darkorange"><?php echo "Chờ duyệt"; ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $cate['created_at'] ?></td>
                            <td><?= $cate['update_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        <li class="page-item">
            <a class="page-link" href="#" tabindex="-1">1</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
    </ul>
</nav>