<form action="<?= ADMIN_URL . 'news/save-add' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6">

            <form role="form">

                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input class="form-control" type="file" name="image" required="">
                </div>

                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input class="form-control" type="text" name="title" placeholder="tiêu đề tin tức" required="">
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <br>
                    <textarea name="content" id="" cols="75" rows="10"></textarea required="">
                </div>
                
                <div class="form-group">
                    <label>Người đăng:</label>
                    <?php echo ($_SESSION['user']['username']); ?>
                </div>
                <div class="d-flex justify-content-center">
                    
                    <button name="btn" class="btn btn-primary btn-sm">Lưu</button>
                    &nbsp;
                    <a href="<?= ADMIN_URL . 'news' ?>" class="btn btn-sm btn-danger">Hủy</a>
                </div>

            </form>

        </div>
    </div>
</form>