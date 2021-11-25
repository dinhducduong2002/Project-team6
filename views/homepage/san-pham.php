
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
    <?php include_once "./views/homepage/layout_site/menu.php" ?>
    <!-- /header -->

    <main class="container">
        <!-- do du lieu -->
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