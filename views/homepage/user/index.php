<div class="col-md-12">
    <div class="text-center">
        <center>
            <?php foreach($acc as $ac) :?>
            <h5 class="c-font-bold c-font-28"><?= $ac['username']?></h5>
            <h5 class="c-font-22">Tài khoản: <?php 
                if($ac['permission'] == 0) {
                    echo "Admin";
                } else if($ac['permission'] == 1) {
                    echo "Cổng tác viên";
                } else if($ac['permission'] == 2) {
                    echo "Thành viên";
                } 
                ?></h5>
            <?php endforeach; ?>
            <button>
                <a href="<?= BASE_URL .'logout' ?>"><i class="fas fa-door-open"></i> Đăng xuất</a>
            </button>

        </center>

    </div>

</div>
<div class="" style="margin-top: 20px;">
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
                            <li><a href="<?= CLIENT_URL . 'user/profile?id=' . $_SESSION['user']['id'] ?> "
                                    class="active">Thông tin tài khoản</a></li>
                            <li><a href="<?= CLIENT_URL . 'user/change-password?id='. $_SESSION['user']['id'] ?>"
                                    class="">Đổi mật khẩu</a></li>
                            <li><a href="<?= CLIENT_URL . 'user/history?id=' . $_SESSION['user']['id'] ?>" class="">Lịch
                                    sử giao dịch</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-layout-sidebar-content ">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Thông tin tài khoản</h3>
                <div class="c-line-left"></div>
            </div>
            <table class="table table-striped">
                <tbody>
                    <?php foreach($acc as $ac) :?>
                    <tr>
                        <th scope="row">ID của bạn:</th>
                        <th><span class="c-font-uppercase"><?= $ac['id']?></span></th>
                    </tr>
                    <tr>
                        <th scope="row">Tên tài khoản:</th>
                        <th><?= $ac['username']?></th>
                    </tr>
                    <tr>
                        <th scope="row">Số dư tài khoản:</th>
                        <td><b class="text-danger"><?= $ac['balance']?> đ</b></td>
                    </tr>
                    <!--                <tr>
                    <th scope="row">Địa chỉ Email:</th>
                    <td>Tanmk1191@gmail.com (<a href="/user/email.html">Cài đặt</a>)</td>
                </tr>-->
                    <tr>
                        <th scope="row">Email:</th>
                        <td><a href="/user/phone.html"><b><i class="text-danger"><?= $ac['email']?></i></b></a></td>
                    </tr>
                    <tr>
                        <th scope="row">Nhóm tài khoản:</th>
                        <td><?php 
                            if($ac['permission'] == 0) {
                                echo "Admin";
                            } else if($ac['permission'] == 1) {
                                echo "Cộng tác viên";
                            } else if($ac['permission'] == 2) {
                                echo "Thành viên";
                            } 
                            ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Ngày tham gia:</th>
                        <td>
                            <?= $ac['create_at']?>
                        </td>
                    </tr>
                    <?php endforeach ;?>
                </tbody>
            </table>
            <!-- END: PAGE CONTENT -->
        </div>
    </div>
</div>