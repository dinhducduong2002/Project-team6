<header class="p-3 text-white">
    <div class="container">
        <div class="row">
            <div class="col d-flex gap-2 fs-5">
                <div class="fb">
                    <a href=""><i class="fab fa-facebook"></i></a>
                </div>
                <div class="ytb">
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col">
                <p style="text-align: right; color: black;">Liên hệ: 0123456</p>
            </div>
        </div>
        <hr style="color: black;">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="logo m-4" href="<?= BASE_URL ?>"><img src="<?= CLIENT_ASSETS ?>images/logo.jpg" alt="50"
                        height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">DỊCH VỤ GAME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="">MUA THẺ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                NẠP TIỀN
                            </a>
                            <ul class="dropdown-menu active" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= BASE_URL .'user/brickcard' ?>">NẠP TIỀN TỰ ĐỘNG</a></li>
                                <li><a class="dropdown-item" href="#">NẠP TIỀN TỪ ATM/VÍ ĐIỆN TỬ</a></li>
                            </ul>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link active" href="<?= BASE_URL . 'tin-tuc' ?>">TIN TỨC</a>
                        </li>
                    </ul>

                    <div class="account">
                        <?php if(isset($_SESSION["user"])):?>

                        <?php if($_SESSION['user']['permission'] == 0):?>
                        <a href="<?= BASE_URL .'cp-admin/dashboard' ?>" class="btn border border-secondary me-2">
                            <i class="fas fa-users-cog"></i>
                            Quản trị </a>
                        <a href="<?= BASE_URL .'user/profile'?>"
                            class="btn border border-secondary me-2">
                            <i class="far fa-user"></i>
                            <?php echo $_SESSION["user"]['username'];?><span>(<?php echo number_format( $_SESSION['user']['balance'], 0, '', '.'); ?> đ)</span></a>

                        <?php elseif($_SESSION['user']['permission'] == 2):?>
                        <a href="<?= BASE_URL .'user/profile'?>"
                            class="btn border border-secondary me-2">
                            <i class="far fa-user"></i>
                            <?php echo $_SESSION["user"]['username'];?><span>(<?php echo number_format( $_SESSION['user']['balance'], 0, '', '.'); ?> đ)</span></a>

                        <?php elseif($_SESSION['user']['permission'] == 1):?>
                        <a href="<?= BASE_URL .'cp-admin/dashboard' ?>" class="btn border border-secondary me-2"><i class="fas fa-users-cog"></i>
                         QUẢN TRỊ</a>
                        <a href="<?= BASE_URL .'user/profile'?>"
                            class="btn border border-secondary me-2">
                            <i class="far fa-user"></i>
                            <?php echo $_SESSION["user"]['username'];?><span>(<?php echo number_format( $_SESSION['user']['balance'], 0, '', '.'); ?> đ)</span></a>
                        <?php endif;?>

                        <?php else:?>
                        <a href="<?= BASE_URL .'login' ?>" class="btn border border-secondary me-2">ĐĂNG NHẬP</a>
                        <a href="<?= BASE_URL .'register' ?>" class="btn border border-secondary me-2">ĐĂNG KÍ</a>
                        <?php endif;?>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</header>