<div class="col-md-12">
    <div class="text-center" style="">
        <center>
            <!-- <img class="img-responsive img-thumbnail hidden-xs" width="256" height="256" src="/assets/frontend/images/unknown-avatar.jpg" alt=""> -->
            <h5 class="c-font-bold c-font-28">148680150817473@facebook.com</h5>
            <h5 class="c-font-22">Tài khoản: Thành viên</h5>
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
                            <li><a href="<?= CLIENT_URL ?>user/profile" class="active">Thông tin tài khoản</a></li>
                            <li><a href="<?= CLIENT_URL ?>user/change-password" class="">Đổi mật khẩu</a></li>
                            <li><a href="<?= CLIENT_URL ?>user/history" class="">Lịch sử giao dịch</a></li>
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
                    <tr>
                        <th scope="row">ID của bạn:</th>
                        <th><span class="c-font-uppercase">461249</span></th>
                    </tr>
                    <tr>
                        <th scope="row">Tên tài khoản:</th>
                        <th>148680150817473@facebook.com</th>
                    </tr>
                    <tr>
                        <th scope="row">Số dư tài khoản:</th>
                        <td><b class="text-danger">0đ</b></td>
                    </tr>
                    <!--                <tr>
                    <th scope="row">Địa chỉ Email:</th>
                    <td>Tanmk1191@gmail.com (<a href="/user/email.html">Cài đặt</a>)</td>
                </tr>-->
                    <tr>
                        <th scope="row">Bảo mật ODP:</th>
                        <td><a href="/user/phone.html"><b><i class="text-danger">Thêm số điện thoại</i></b></a></td>
                    </tr>
                    <tr>
                        <th scope="row">Nhóm tài khoản:</th>
                        <td>Thành viên</td>
                    </tr>
                    <tr>
                        <th scope="row">Ngày tham gia:</th>
                        <td>
                            10/11/2021
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- END: PAGE CONTENT -->
        </div>
    </div>
</div>