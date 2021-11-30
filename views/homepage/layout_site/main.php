
<!DOCTYPE html>
<html lang="en">

<body>
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
    <?php include_once "./views/homepage/layout_site/footer.php" ?>
</body>

</html>