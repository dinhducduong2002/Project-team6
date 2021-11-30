<ul class="nav navbar-nav side-nav">
    <li class="active">
        <a href="<?= ADMIN_URL . 'dashboard' ?>"><i class="fa fa-fw fa-dashboard"></i> Trang quản trị</a>
    </li>
    <?php if ($_SESSION['user']['permission'] == 0) : ?>

        <li>
            <a href="<?= ADMIN_URL . 'manager-ctv' ?>"><i class="fa fa-fw fa-bar-chart-o"></i> Quản lý cộng tác viên</a>
        </li>
        <li>
            <a href="<?= ADMIN_URL . 'manager-client' ?>"><i class="fa fa-fw fa-table"></i> Quản lý tài khoản</a>
        </li>
        <li>
            <a href="<?= ADMIN_URL . 'manager-service' ?>"><i class="fa fa-fw fa-table"></i> Quản lý dịch vụ</a>
        </li>
        <li>
            <a href="<?= ADMIN_URL . 'manager-client' ?>"><i class="fa fa-fw fa-table"></i> Quản lý danh mục</a>
        </li>
        <li>
            <a href="<?= ADMIN_URL . 'card' ?>"><i class="fa fa-fw fa-book"></i> Quản lý lịch sử nạp thẻ</a>
        </li>
    <?php endif; ?>
    <?php if ($_SESSION['user']['permission'] == 1 || $_SESSION['user']['permission'] == 0) : ?>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Quản lý sản phẩm <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="<?= ADMIN_URL . 'sp-index' ?>">Danh sách sản phẩm</a>
                </li>
                <li>
                    <a href="<?= ADMIN_URL . 'sp-add-form' ?>">Thêm sản phẩm</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?= ADMIN_URL . 'manager-bill' ?>"><i class="fa fa-fw fa-desktop"></i> Quản lý hóa đơn</a>
        </li>
        <li>
            <a href="<?= ADMIN_URL . 'pay-banking' ?>"><i class="fa fa-fw fa-bank"></i> Rút tiền</a>
        </li>

    <?php endif; ?>
    <?php if ($_SESSION['user']['permission'] == 0) : ?>
        <li>
            <a href="<?= ADMIN_URL . 'manager-card' ?>"><i class="fa fa-fw fa-desktop"></i> Quản lý nạp tiền</a>
        </li>
        <li>
            <a href="<?= ADMIN_URL . 'news' ?>"><i class="fa fa-fw fa-wrench"></i> Quản lý tin tức</a>
        </li>
        <li>
            <a href="<?= ADMIN_URL . 'chart' ?>"><i class="fa fa-fw fa-dashboard"></i> Thống kê</a>
        </li>
    <?php endif; ?>
</ul>