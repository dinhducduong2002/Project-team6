
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop nick cùi</title>
    <?php include_once "./views/homepage/layout_site/style.php" ?>
</head>

<body>
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
                    <a class="logo m-4" href="#"><img src="<?= CLIENT_ASSETS ?>images/logo.jpg" alt="50"
                            height="50"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.html">TRANG CHỦ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">DỊCH VỤ GAME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">MUA THẺ</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    NẠP TIỀN
                                </a>
                                <ul class="dropdown-menu active" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">NẠP TIỀN TỰ ĐỘNG</a></li>
                                    <li><a class="dropdown-item" href="#">NẠP TIỀN TỪ ATM/VÍ ĐIỆN TỬ</a></li>
                                </ul>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link active" href="#">TIN TỨC</a>
                            </li>
                        </ul>
                        <div class="account">
                            <a href="dangnhap.html" class="btn border border-secondary me-2">ĐĂNG NHẬP</a>
                            <a href="dangky.html" class="btn border border-secondary me-2">ĐĂNG KÍ</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- /header -->

    <!-- banner -->
    <?php include_once "./views/homepage/layout_site/banner.php" ?>
    <!-- /banner -->
    <main>
        <div class="dichvu">
            <?php include_once "./views/homepage/layout_site/dich-vu.php" ?>
        </div>
        <div class="danhmuc">
            <?php include_once "./views/homepage/layout_site/danh-muc.php" ?>
        </div>
        <?php include_once $businessView; ?>
    </main>
    <!--/main  -->
    <footer class="p-5 bg-dark">
        <div class="container">
            <div class="row">
                <h4 class="text-center text-white fs-6">Website bán nick game được vận hành bởi nhóm 6 dự án 1 FPOLY
                </h4>
            </div>
        </div>
    </footer>
</body>

</html>