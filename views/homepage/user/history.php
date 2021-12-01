<div class="c-layout-page" style="margin-top: 20px;">
    <div class="container">
        <div class="c-layout-sidebar-menu c-theme ">
            <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
                    <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
                    <div class="c-content-title-3 c-title-md c-theme-border">
                        <h3 class="c-left c-font-uppercase">Menu tài khoản</h3>
                        <div class="c-line c-dot c-dot-left "></div>
                    </div>

                    <div class="c-content-ver-nav">
                        <ul class="c-menu c-arrow-dot c-square c-theme">
                            <li><a href="<?= CLIENT_URL . 'user/profile' ?>" class="active">Thông tin tài khoản</a></li>
                            <li><a href="<?= CLIENT_URL . 'user/change-password' ?>" class="">Đổi mật khẩu</a></li>
                            <li><a href="<?= CLIENT_URL . 'user/history' ?>" class="">Lịch
                                    sử giao dịch</a></li>
                            <li><a href="<?= CLIENT_URL . 'user/history_card' ?>" class="">Lịch
                                    sử nạp tiền</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-layout-sidebar-content ">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Lịch sử giao dịch</h3>
                <div class="c-line-left"></div>
            </div><br>
            <form class="form-horizontal form-find m-b-20" role="form" method="get">

                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square">
                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-rtl="false">
                                <span class="input-group-btn">
                                    <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                <input type="text" class="form-control c-square c-theme" name="started_at" autocomplete="off" placeholder="Từ ngày" value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square">
                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-rtl="false">
                                <span class="input-group-btn">
                                    <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                <input type="text" class="form-control c-square c-theme" name="ended_at" autocomplete="off" placeholder="Đến ngày" value="">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                        <a class="btn c-btn-square m-b-10 btn-danger" href="#">Tất
                            cả</a>
                    </div>
                </div>

                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            </form>
            <table class="table table-hover table-custom-res">
                <tbody>
                    <tr>
                        <th>Thời gian</th>
                        <th>ID</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Server</th>
                        <th>Số tiền</th>
                        <th>Số dư cuối</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                    </tr>
                </tbody>
                <?php foreach ($aph as $aph) : ?>
                    <tr>
                        <td><?= $aph['created_at'] ?></td>
                        <td>#<?= $aph['id'] ?></td>
                        <td><?= $aph['name_account'] ?></td>
                        <td><?= $aph['password_account'] ?></td>
                        <td><?= $aph['server'] ?></td>
                        <td><?= $aph['price'] ?></td>
                        <td><?= $aph['surplus'] ?></td>
                        <td><?= $aph['content'] ?></td>
                        <td>
                            <?php if ($aph['status'] == 0) : ?>
                                <span style="color: green;"><?php echo "Đã thanh toán"; ?></span>
                            <?php elseif ($aph['status'] == 1) : ?>
                                <span style="color: red;"><?php echo "Hoàn lại tiền"; ?></span>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
                <tbody>
                </tbody>
            </table>
            <!-- END: PAGE CONTENT -->
            <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

            </div>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->
    <nav aria-label="...">
        <ul class="pagination pagination-sm">
            <?php for ($i = 1; $i <= $pagea; $i++) : ?>
                <li class="page-item">
                    <a class="page-link" href="history?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>

    <!-- END: PAGE CONTENT -->
</div>