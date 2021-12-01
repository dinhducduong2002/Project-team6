<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách hóa đơn rút tiền ( Từ CTV )</h2>
        <br>
        <a class="btn btn-primary" href="<?= ADMIN_URL . 'add-pay-banking' ?>">Rút tiền</a>
        <hr>
        <h5 class="alert alert-success">Lệnh rút tiền của bạn sẽ được xử lí vào ngày 29 - 30 cuối tháng ( Vui lòng đợi cuối tháng để lĩnh lương nhé )</h5>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <form action="" method="post">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Id_CTV</th>
                            <th class="col-lg-1">Ngày rút</th>
                            <th>Số tiền rút</th>
                            <th>Tiền nhận được ( -45% )</th>
                            <th>Trạng thái</th>
                            <th>Ngân hàng</th>
                            <th class="col-lg-2">Chủ tài khoản</th>
                            <th>Số TK</th>
                            <th>Chi nhánh</th>
                            <?php if ($_SESSION['user']['permission'] == 0) : ?>
                                <th>Chức năng</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pay_banking as $cate) : ?>
                            <tr>
                                <td><?= $cate['id'] ?></td>
                                <td>#<?= $cate['id_ctv'] ?></td>
                                <td><?= $cate['date_created'] ?></td>
                                <td><?php echo number_format($cate['money'], 0, '', '.'); ?> VND</td>
                                <td><?php echo number_format($cate['money_discount'], 0, '', '.'); ?> VND</td>
                                <td>
                                    <?php if ($cate['status'] == 0) { ?><span style="color: red;"><?php echo "Đang xử lí"; ?></span><?php } ?>
                                    <?php if ($cate['status'] == 1) { ?><span style="color: green;"><?php echo "Đã chuyển khoản"; ?></span><?php } ?>
                                </td>
                                <td><?= $cate['banking'] ?></td>
                                <td><?= $cate['account_holder'] ?></td>
                                <td><?= $cate['account_number'] ?></td>
                                <td><?= $cate['bank_branch'] ?></td>
                                <td>
                                    <?php if ($_SESSION['user']['permission'] == 0) : ?>
                                        <?php if ($cate['status'] == 0) { ?><button type="submit" class="btn btn-success" value="<?= $cate['id'] ?>" name="btn_update" onclick="return confirm('Bạn chắc chắn đã chuyển khuyển cho hóa đơn này chưa?')">Xác nhận chuyển khoản</button><?php } ?>
                                        <a onclick="confrim_remove('<?= ADMIN_URL . 'delete-pay-banking?id=' . $cate['id'] ?>'
                                ,'<?= $cate['id'] ?>')" href="javascript:;" class="btn btn-danger">Xóa</a>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        <?php for ($i = 1; $i <= $pagea; $i++) : ?>
            <li class="page-item">
                <a class="page-link" href="pay-banking?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

    </ul>
</nav>