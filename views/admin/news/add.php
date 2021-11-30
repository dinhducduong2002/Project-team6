<form action="<?= ADMIN_URL . 'news/save-add' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6">

            <form role="form">

                <div class="form-group">
                    <label>Ảnh đại diện</label>
                    <input class="form-control" type="file" name="image">
                </div>

                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input class="form-control" type="text" name="title" placeholder="tiêu đề tin tức">
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <br>
                    <textarea name="content" id="" cols="75" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" id="">
                        <option value="0">hiện thị</option>
                        <option value="1">không hiện thị</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Người đăng:</label>
                    <?php echo($_SESSION['user']['username']);?>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="<?= ADMIN_URL . 'news'?>" class="btn btn-sm btn-danger">Hủy</a>
                    &nbsp;
                    <button name="btn" class="btn btn-primary btn-sm">Lưu</button>
                </div>

            </form>

        </div>
    </div>
</form>