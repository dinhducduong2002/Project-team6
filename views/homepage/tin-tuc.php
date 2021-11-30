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
    <?php include_once "./views/homepage/layout_site/footer.php" ?>
</body>

</html>