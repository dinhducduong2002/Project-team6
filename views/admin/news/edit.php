<form action="<?= ADMIN_URL . 'news/save-edit?id=' . $news['id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6">
            <form role="form">

                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input type="hidden" name="hidden_image" value="<?= $news['image'] ?>">
                    <input class="form-control" type="file" name="image">
                    <img src="<?= PUBLIC_ASSETS . $news['image'] ?>" alt="" width="200">
                </div>

                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input class="form-control" type="text" name="title" placeholder="tiêu đề tin tức" value="<?= $news['title'] ?>" required="">
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <br>
                    <textarea name="content" id="" cols="75" rows="10"><?= $news['content'] ?></textarea required="">
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status">

                        <?php if ($news['status'] == 0) : ?>
                            <option selected value="0">hiện thị</option>
                            <option value="1">không hiện thị</option>
                        <?php elseif ($news['status'] == 1) : ?>
                            <option value="0">hiện thị</option>
                            <option selected value="1">không hiện thị</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Người đăng:</label>
                    <?php echo ($_SESSION['user']['username']); ?>
                </div>
                <div class="d-flex justify-content-center">
                    <button name="btn" class="btn btn-primary btn-sm">Sửa</button>
                    &nbsp;
                    <a href="<?= ADMIN_URL . 'news' ?>" class="btn btn-sm btn-danger">Hủy</a>

                </div>

            </form>
        </div>
    </div>
</form>