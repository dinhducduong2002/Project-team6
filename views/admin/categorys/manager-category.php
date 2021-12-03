<div class="row">
    <div class="col-lg-12">
        <h2>Danh sách danh mục</h2>
        <span><a href="add-category">Thêm danh mục</a></span>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <hr>

        <div class="table-responsive">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-lg-1">id</th>
                        <th>Tên dịch vụ</th>
                        <th>ảnh dịch vụ</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($ds_category as $index => $key):?>
                        <tr>
                        <td><?php echo $index + 1; ?></td>
                            <td><?= $key['name_cate'] ?></td>
                            <td><img src="<?=PUBLIC_ASSETS. $key['image_cate']?>" width="100"></td>
                            <td><?= $key['created_at'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="<?= ADMIN_URL . 'edit-category?id=' . $key['id'] ?>">Sửa</a>
                                <a onclick="confrim_remove('<?= ADMIN_URL . 'delete-category?id=' . $key['id'] ?>'
                                ,'<?= $key['name_cate'] ?>')" href="javascript:;"
                                 class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        <?php for ($i = 1; $i <= $pagea; $i++) : ?>
            <li class="page-item">
                <a class="page-link" href="manager-category?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        
    </ul>
</nav>